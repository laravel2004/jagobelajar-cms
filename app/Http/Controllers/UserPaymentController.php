<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserPaymentController extends Controller
{
    public function pay(Request $request, Payment $payment): View|RedirectResponse
    {
        if ($payment->user_id !== $request->user()->id) {
            abort(403);
        }

        if ($payment->payment_status !== 'pending') {
            return redirect()->route('user.dashboard')->with('status', 'Pembayaran sudah diproses atau tidak berlaku lagi.');
        }

        // If it's a Midtrans payment, it has a snap_token
        if (!blank($payment->snap_token)) {
            return view('pages.public.midtrans-overlay', compact('payment'));
        } 
        
        // If it's a Doku payment, it only has a snap_redirect_url
        if (!blank($payment->snap_redirect_url)) {
            return redirect()->away($payment->snap_redirect_url);
        }

        return redirect()->route('user.dashboard')->with('status', 'URL Pembayaran tidak ditemukan.');
    }
}
