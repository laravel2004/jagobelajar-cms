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

        return view('pages.user.dashboard', [
            'user' => $user,
            'tryoutPackages' => ExamSession::query()->where('status', 'active')->orderByDesc('starts_at')->take(6)->get(),
            'bimbelPackages' => collect([
                ['title' => 'Bimbel Reguler', 'description' => 'Belajar rutin dengan tutor berpengalaman.', 'url' => route('bimbel.index')],
                ['title' => 'Bimbel Intensif', 'description' => 'Pendampingan lebih fokus untuk target tertentu.', 'url' => route('bimbel.index')],
            ]),
            'registeredPackages' => $user->packages()->latest()->get(),
        ]);
    }
}
