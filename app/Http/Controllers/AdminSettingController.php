<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminSettingController extends Controller
{
    /**
     * Show the payment settings form.
     */
    public function editPayment(): View
    {
        $activeGateway = Setting::get('active_payment_gateway', 'midtrans');
        
        return view('pages.admin.settings.payment', compact('activeGateway'));
    }

    /**
     * Update the payment settings.
     */
    public function updatePayment(Request $request): RedirectResponse
    {
        $request->validate([
            'active_payment_gateway' => 'required|in:midtrans,doku',
        ]);

        Setting::updateOrCreate(
            ['key' => 'active_payment_gateway'],
            ['value' => $request->active_payment_gateway]
        );

        return redirect()->route('admin.settings.payment')->with('success', 'Payment gateway settings updated successfully.');
    }
}
