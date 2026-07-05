<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class AdminUserController extends Controller
{
    public function index(): View
    {
        return view('pages.admin.users.index', [
            'users' => User::query()
                ->withCount('packages')
                ->latest()
                ->paginate(12),
        ]);
    }

    public function show(User $user): View
    {
        return view('pages.admin.users.show', [
            'user' => $user->load(['packages' => fn ($query) => $query->latest()]),
        ]);
    }
}
