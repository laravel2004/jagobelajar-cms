<?php

namespace App\Http\Controllers;

use App\Models\Bimbel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminBimbelController extends Controller
{
    public function index(): View
    {
        return view('pages.admin.bimbels.index', [
            'bimbels' => Bimbel::query()->latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('pages.admin.bimbels.form', ['bimbel' => new Bimbel()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateBimbel($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);
        $data['is_promo_active'] = $request->boolean('is_promo_active');
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('bimbel', 'public');
        }
        unset($data['image']);

        Bimbel::create($data);

        return redirect()->route('admin.bimbel.index')->with('status', 'Bimbel berhasil ditambahkan.');
    }

    public function edit(Bimbel $bimbel): View
    {
        return view('pages.admin.bimbels.form', ['bimbel' => $bimbel]);
    }

    public function update(Request $request, Bimbel $bimbel): RedirectResponse
    {
        $data = $this->validateBimbel($request, $bimbel->id);
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);
        $data['is_promo_active'] = $request->boolean('is_promo_active');
        if ($request->hasFile('image')) {
            if ($bimbel->image_path) {
                Storage::disk('public')->delete($bimbel->image_path);
            }
            $data['image_path'] = $request->file('image')->store('bimbel', 'public');
        }
        unset($data['image']);

        $bimbel->update($data);

        return redirect()->route('admin.bimbel.index')->with('status', 'Bimbel berhasil diperbarui.');
    }

    public function destroy(Bimbel $bimbel): RedirectResponse
    {
        if ($bimbel->image_path) {
            Storage::disk('public')->delete($bimbel->image_path);
        }
        $bimbel->delete();

        return back()->with('status', 'Bimbel berhasil dihapus.');
    }

    private function validateBimbel(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('bimbels', 'slug')->ignore($ignoreId)],
            'short_label' => ['nullable', 'string', 'max:100'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
            'level' => ['nullable', 'string', 'max:255'],
            'schedule' => ['nullable', 'string', 'max:255'],
            'method' => ['nullable', 'string', 'max:255'],
            'sessions_count' => ['nullable', 'integer', 'min:1', 'max:999'],
            'price' => ['required', 'integer', 'min:0'],
            'sale_price' => ['nullable', 'integer', 'min:0'],
            'grup_wa' => ['nullable', 'url', 'max:255'],
            'status' => ['required', 'in:draft,active,inactive'],
            'sort_order' => ['nullable', 'integer'],
        ]);
    }
}
