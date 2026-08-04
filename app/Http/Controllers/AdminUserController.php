<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');

        return view('pages.admin.users.index', [
            'users' => User::query()
                ->when($search, function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%")
                          ->orWhere('email', 'like', "%{$search}%");
                })
                ->withCount('packages')
                ->latest()
                ->paginate(12)
                ->withQueryString(),
            'search' => $search,
        ]);
    }

    public function show(User $user): View
    {
        return view('pages.admin.users.show', [
            'user' => $user->load(['packages' => fn ($query) => $query->latest()]),
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }
}
