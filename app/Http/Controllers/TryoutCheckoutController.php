<?php

namespace App\Http\Controllers;

use App\Models\ExamSession;
use App\Models\Payment;
use App\Models\UserPackage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TryoutCheckoutController extends Controller
{
    public function store(Request $request, ExamSession $examSession): RedirectResponse
    {
        if (! $request->user()) {
            return redirect()->guest(route('login'));
        }

        if (! $examSession->status || blank($examSession->source_code)) {
            return back()->withErrors(['payment' => 'Sesi ujian tidak tersedia.']);
        }

        $user = $request->user();
        $grossAmount = (int) (($examSession->is_promo_active && $examSession->sale_price !== null && $examSession->sale_price < $examSession->price) ? $examSession->sale_price : $examSession->price);
        $orderId = 'TRYOUT-'.$examSession->id.'-'.$user->id.'-'.now()->format('YmdHis');

        $payment = Payment::create([
            'user_id' => $user->id,
            'package_type' => 'tryout',
            'package_id' => $examSession->id,
            'order_id' => $orderId,
            'gross_amount' => $grossAmount,
            'payment_status' => 'pending',
        ]);

        $payload = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $grossAmount,
            ],
            'item_details' => [[
                'id' => 'tryout-'.$examSession->id,
                'price' => $grossAmount,
                'quantity' => 1,
                'name' => Str::limit($examSession->title ?? $examSession->name, 50),
            ]],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->whatsapp ?? '-',
                'shipping_address' => [
                    'first_name' => $user->name,
                    'address' => $user->address ?? '-',
                ],
            ],
            'callbacks' => [
                'finish' => route('tryout.payment.success', $payment),
            ],
            'enabled_payments' => ['gopay', 'shopeepay', 'bank_transfer', 'cstore'],
        ];

        $baseUrl = config('services.midtrans.is_production') ? 'https://app.midtrans.com' : 'https://app.sandbox.midtrans.com';
        $response = Http::withBasicAuth(config('services.midtrans.server_key'), '')
            ->acceptJson()
            ->post($baseUrl.'/snap/v1/transactions', $payload);

        if (! $response->successful()) {
            $payment->delete();
            return back()->withErrors(['payment' => 'Gagal membuat transaksi pembayaran.']);
        }

        $payment->update([
            'snap_token' => $response->json('token'),
            'snap_redirect_url' => $response->json('redirect_url'),
        ]);

        return redirect()->away($payment->snap_redirect_url);
    }

    public function success(Request $request, Payment $payment): View
    {
        if ($request->user()?->id !== $payment->user_id && $request->query('order_id') !== $payment->order_id) {
            abort(403);
        }

        return view('pages.public.tryout-payment-success', [
            'payment' => $payment,
            'examSession' => ExamSession::find($payment->package_id),
            'isPending' => $payment->payment_status !== 'paid',
        ]);
    }
}
