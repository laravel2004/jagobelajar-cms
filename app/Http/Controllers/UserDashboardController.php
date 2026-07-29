<?php

namespace App\Http\Controllers;

use App\Models\ExamSession;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $user = $request->user();

        $paymentQuery = $user->payments()->latest();
        if ($search = $request->input('search')) {
            $paymentQuery->where(function ($q) use ($search) {
                $q->where('order_id', 'like', "%{$search}%")
                  ->orWhere('package_type', 'like', "%{$search}%")
                  ->orWhere('payment_status', 'like', "%{$search}%");
            });
        }
        $payments = $paymentQuery->paginate(10)->withQueryString();

        return view('pages.user.dashboard', [
            'user' => $user,
            'tryoutPackages' => ExamSession::query()->where('status', 'active')->orderByDesc('starts_at')->take(6)->get(),
            'bimbelPackages' => \App\Models\Bimbel::query()->where('status', 'active')->orderBy('sort_order')->take(6)->get(),
            'registeredPackages' => $user->packages()->latest()->get(),
            'payments' => $payments,
        ]);
    }
}
