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

class DokuNotificationController extends Controller
{
    public function handle(Request $request): JsonResponse
    {
        if ($request->isMethod('get')) {
            return response()->json(['status' => 'ok']);
        }

        // TODO for Junior Programmer: Adjust based on Doku Jokul Payload structure.
        // Usually it is nested under `order.invoice_number` and `transaction.status`.
        $orderId = $request->input('order.invoice_number');
        $transactionStatus = $request->input('transaction.status');
        
        if (blank($orderId)) {
            Log::warning('Doku notification missing order_id', $request->all());
            return response()->json(['status' => 'ok']);
        }

        $payment = Payment::where('order_id', $orderId)->first();
        if (! $payment) {
            Log::warning('Doku notification payment not found', $request->all());
            return response()->json(['status' => 'ok']);
        }

        $secretKey = config('services.doku.secret_key');
        $signatureHeader = $request->header('Signature');
        
        if ($signatureHeader && $secretKey) {
            $clientId = $request->header('Client-Id');
            $requestId = $request->header('Request-Id');
            $requestTimestamp = $request->header('Request-Timestamp');
            $path = $request->getPathInfo(); // e.g. /doku/notification

            $payload = $request->getContent();
            $digest = base64_encode(hash('sha256', $payload, true));

            $componentSignature = "Client-Id:" . $clientId . "\n" .
                "Request-Id:" . $requestId . "\n" .
                "Request-Timestamp:" . $requestTimestamp . "\n" .
                "Request-Target:" . $path . "\n" .
                "Digest:" . $digest;

            $expectedSignature = "HMACSHA256=" . base64_encode(hash_hmac('sha256', $componentSignature, $secretKey, true));

            if (!hash_equals($expectedSignature, $signatureHeader)) {
                Log::warning('Doku notification invalid signature', [
                    'expected' => $expectedSignature,
                    'received' => $signatureHeader,
                    'order_id' => $orderId
                ]);
                return response()->json(['status' => 'forbidden'], 403);
            }
        }

        if (in_array(strtolower($transactionStatus), ['success', 'paid'], true)) {
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
                    Log::error('Premium tryout register failed (Doku)', ['order_id' => $orderId, 'message' => $exception->getMessage()]);
                }
            }

            if ($payment->package_type === 'bundle') {
                $bundle = \App\Models\ExamBundle::with('sessions')->find($payment->package_id);
                if ($bundle) {
                    foreach ($bundle->sessions as $examSession) {
                        if (blank($examSession->source_code)) continue;

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
                                    'package_id' => $examSession->id,
                                ], [
                                    'package_name' => $examSession->title ?? $examSession->name ?? 'Tryout',
                                    'status' => 'registered',
                                    'registered_at' => now(),
                                    'external_session_id' => $examSession->external_id,
                                    'join_url' => $response->json('join_url') ?: rtrim(config('services.irt_quiz.base_url'), '/').'/dashboard',
                                ]);
                            }
                        } catch (\Throwable $exception) {
                            Log::error('Premium tryout register failed from bundle (Doku)', ['order_id' => $orderId, 'bundle_id' => $bundle->id, 'session_id' => $examSession->id, 'message' => $exception->getMessage()]);
                        }
                    }
                }
            }
        } elseif (in_array(strtolower($transactionStatus), ['failed', 'expired', 'canceled'], true)) {
            $payment->update(['payment_status' => 'failed']);
        }

        return response()->json(['status' => 'ok']);
    }
}
