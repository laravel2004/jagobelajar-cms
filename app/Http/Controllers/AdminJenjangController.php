<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class AdminJenjangController extends Controller
{
    public function index(): View
    {
        $jenjangs = Jenjang::orderBy('id')->get();
        return view('pages.admin.jenjangs.index', compact('jenjangs'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:jenjangs,name'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:jenjangs,slug'],
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['name']);

        Jenjang::create($validated);

        return back()->with('status', 'Jenjang berhasil ditambahkan.');
    }

    public function update(Request $request, Jenjang $jenjang): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:jenjangs,name,'.$jenjang->id],
            'slug' => ['nullable', 'string', 'max:255', 'unique:jenjangs,slug,'.$jenjang->id],
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['name']);

        $jenjang->update($validated);

        return back()->with('status', 'Jenjang berhasil diperbarui.');
    }

    public function destroy(Jenjang $jenjang): RedirectResponse
    {
        if ($jenjang->examSessions()->exists() || $jenjang->examBundles()->exists()) {
            return back()->withErrors(['destroy' => 'Jenjang tidak dapat dihapus karena sedang digunakan oleh Sesi Ujian atau Paket Bundle.']);
        }

        $jenjang->delete();

        return back()->with('status', 'Jenjang berhasil dihapus.');
    }
}
