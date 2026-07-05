<?php

namespace App\Http\Controllers;

use App\Models\Bimbel;
use App\Models\ExamSession;
use App\Models\Payment;
use App\Models\UserPackage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MidtransNotificationController extends Controller
{
    public function handle(Request $request): JsonResponse
    {
        if ($request->isMethod('get')) {
            return response()->json(['status' => 'ok']);
        }

        $orderId = $request->input('order_id');
        $statusCode = $request->input('status_code');
        $grossAmount = $request->input('gross_amount');
        $signatureKey = $request->input('signature_key');

        if (blank($orderId)) {
            Log::warning('Midtrans notification missing order_id', $request->all());
            return response()->json(['status' => 'ok']);
        }

        $payment = Payment::where('order_id', $orderId)->first();
        if (! $payment) {
            Log::warning('Midtrans notification payment not found', $request->all());
            return response()->json(['status' => 'ok']);
        }

        $serverKey = config('services.midtrans.server_key');
        $expectedSignature = hash('sha512', $orderId.$statusCode.$grossAmount.$serverKey);

        if (! blank($signatureKey) && ! hash_equals($expectedSignature, (string) $signatureKey)) {
            Log::warning('Midtrans notification invalid signature', $request->all());
            return response()->json(['status' => 'ok']);
        }

        $transactionStatus = $request->input('transaction_status');
        $fraudStatus = $request->input('fraud_status');

        if (in_array($transactionStatus, ['capture', 'settlement'], true) && ($fraudStatus === null || $fraudStatus === 'accept')) {
            $payment->update([
                'payment_status' => 'paid',
                'paid_at' => now(),
            ]);

            if ($payment->package_type === 'bimbel') {
                $bimbel = Bimbel::find($payment->package_id);
                UserPackage::updateOrCreate([
                    'user_id' => $payment->user_id,
                    'package_type' => 'bimbel',
                    'package_id' => $payment->package_id,
                ], [
                    'package_name' => $bimbel?->name ?? 'Bimbel',
                    'status' => 'registered',
                    'registered_at' => now(),
                    'join_url' => $bimbel?->grup_wa,
                ]);
            }

            if ($payment->package_type === 'tryout') {
                $examSession = ExamSession::find($payment->package_id);
                $endpointBase = rtrim(config('services.irt_quiz.premium_register_endpoint'), '/');
                $endpoint = $endpointBase.'/'.$examSession->source_code.'/register-premium';

                try {
                    $response = Http::asJson()->timeout(15)->post($endpoint, [
                        'name' => $payment->user->name,
                        'email' => $payment->user->email,
                        'password' => $payment->user->password,
                        'whatsapp' => $payment->user->whatsapp ?? '-',
                        'phone' => $payment->user->whatsapp ?? '-',
                        'address' => $payment->user->address,
                    ]);

                    if ($response->successful()) {
                        UserPackage::updateOrCreate([
                            'user_id' => $payment->user_id,
                            'package_type' => 'tryout',
                            'package_id' => $payment->package_id,
                        ], [
                            'package_name' => $examSession?->title ?? $examSession?->name ?? 'Tryout',
                            'status' => 'registered',
                            'registered_at' => now(),
                            'external_session_id' => $examSession?->external_id,
                            'join_url' => $response->json('join_url') ?: rtrim(config('services.irt_quiz.base_url'), '/').'/dashboard',
                        ]);
                    }
                } catch (\Throwable $exception) {
                    Log::error('Premium tryout register failed', ['order_id' => $orderId, 'message' => $exception->getMessage()]);
                }
            }
        } elseif (in_array($transactionStatus, ['deny', 'cancel', 'expire'], true)) {
            $payment->update(['payment_status' => strtolower($transactionStatus)]);
        }

        return response()->json(['status' => 'ok']);
    }
}
