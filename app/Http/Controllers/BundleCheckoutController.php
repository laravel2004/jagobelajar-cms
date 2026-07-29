<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ExamBundle;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\UserPackage;
use Illuminate\Support\Facades\Log;

class BundleCheckoutController extends Controller
{
    public function store(Request $request, string $slug): View|RedirectResponse
    {
        if (! $request->user()) {
            return redirect()->guest(route('login'));
        }

        $bundle = ExamBundle::where('slug', $slug)->firstOrFail();
        if ($bundle->status !== 'active') {
            return back()->withErrors(['payment' => 'Paket bundle tidak tersedia.']);
        }

        $user = $request->user();
        $grossAmount = (int) (($bundle->is_promo_active && $bundle->sale_price !== null && $bundle->sale_price < $bundle->price) ? $bundle->sale_price : $bundle->price);

        $orderId = 'BUNDLE-'.$bundle->id.'-'.$user->id.'-'.now()->format('YmdHis');

        $payment = Payment::create([
            'user_id' => $user->id,
            'package_type' => 'bundle',
            'package_id' => $bundle->id,
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
                'id' => 'bundle-'.$bundle->id,
                'price' => $grossAmount,
                'quantity' => 1,
                'name' => Str::limit('Bundle: ' . ($bundle->title ?? $bundle->name), 50),
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
                'finish' => route('bundle.payment.success', $payment),
                'error' => route('user.dashboard'),
                'unfinish' => route('user.dashboard'),
            ],
            'enabled_payments' => ['gopay', 'shopeepay', 'dana', 'bank_transfer', 'cstore'],
        ];

        $activeGateway = \App\Models\Setting::get('active_payment_gateway', 'midtrans');

        if ($activeGateway === 'doku') {
            $dokuService = new \App\Services\DokuService();
            $dokuPaymentUrl = $dokuService->generatePaymentLink($payment, $payload['customer_details'], $payload['item_details']);

            if (! $dokuPaymentUrl) {
                $payment->delete();
                return back()->withErrors(['payment' => 'Gagal membuat transaksi Doku.']);
            }

            $payment->update([
                'snap_redirect_url' => $dokuPaymentUrl, // Reuse column for simplicity
            ]);

            return redirect()->away($dokuPaymentUrl);
        }

        // Midtrans Fallback/Default
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

        return view('pages.public.midtrans-overlay', compact('payment'));
    }

    public function success(Request $request, Payment $payment): View
    {
        if ($request->user()?->id !== $payment->user_id && $request->query('order_id') !== $payment->order_id) {
            abort(403);
        }

        return view('pages.public.bundle-payment-success', [
            'payment' => $payment,
            'bundle' => ExamBundle::find($payment->package_id),
            'isPending' => $payment->payment_status !== 'paid',
        ]);
    }
}