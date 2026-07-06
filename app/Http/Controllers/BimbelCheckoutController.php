<?php

namespace App\Http\Controllers;

use App\Models\Bimbel;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BimbelCheckoutController extends Controller
{
    public function store(Request $request, Bimbel $bimbel): RedirectResponse
    {
        if (! $request->user()) {
            return redirect()->guest(route('login'));
        }

        $user = $request->user();
        $grossAmount = (int) $bimbel->display_price;
        $orderId = 'BIMBEL-'.$bimbel->id.'-'.$user->id.'-'.now()->format('YmdHis');

        $payment = Payment::create([
            'user_id' => $user->id,
            'package_type' => 'bimbel',
            'package_id' => $bimbel->id,
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
                'id' => 'bimbel-'.$bimbel->id,
                'price' => $grossAmount,
                'quantity' => 1,
                'name' => Str::limit($bimbel->name, 50),
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
                'finish' => route('bimbel.payment.success', $payment),
            ],
            'enabled_payments' => ['gopay', 'shopeepay', 'bank_transfer', 'cstore'],
        ];

        $serverKey = config('services.midtrans.server_key');
        $baseUrl = config('services.midtrans.is_production') ? 'https://app.midtrans.com' : 'https://app.sandbox.midtrans.com';

        $response = Http::withBasicAuth($serverKey, '')
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

    public function success(Request $request, Payment $payment): View|RedirectResponse
    {
        if ($request->user()?->id !== $payment->user_id && $request->query('order_id') !== $payment->order_id) {
            abort(403);
        }

        return view('pages.public.bimbel-payment-success', [
            'payment' => $payment,
            'bimbel' => Bimbel::find($payment->package_id),
            'isPending' => $payment->payment_status !== 'paid',
        ]);
    }
}
