<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ExamBundle;
use App\Models\ExamSession;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class AdminExamBundleController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');

        $totalBundles = ExamBundle::count();
        $publishedCount = ExamBundle::where('status', 'active')->count();
        $draftCount = ExamBundle::where('status', 'draft')->count();
        $inactiveCount = ExamBundle::where('status', 'inactive')->count();

        $examBundles = ExamBundle::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('name', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pages.admin.exam-bundles.index', compact(
            'examBundles', 'totalBundles', 'publishedCount', 'draftCount', 'inactiveCount', 'search'
        ));
    }

    public function create(): View
    {
        $allSessions = ExamSession::orderBy('name')->get();
        return view('pages.admin.exam-bundles.create', compact('allSessions'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:exam_bundles,slug'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'integer', 'min:0'],
            'sale_price' => ['nullable', 'integer', 'min:0'],
            'is_promo_active' => ['nullable', 'boolean'],
            'is_free_package_active' => ['nullable', 'boolean'],
            'status' => ['required', 'in:draft,active,inactive'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'max:4096'],
            'session_ids' => ['nullable', 'array'],
            'session_ids.*' => ['exists:exam_sessions,id'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('exam-bundles', 'public');
        }

        if ($validated['status'] === 'active' && (blank($validated['title']) || blank($validated['description']) || blank($imagePath))) {
            return back()->withErrors(['status' => 'Lengkapi judul, deskripsi, dan gambar sebelum publish.'])->withInput();
        }

        $bundle = ExamBundle::create([
            'name' => $validated['name'],
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'sale_price' => $validated['sale_price'],
            'is_promo_active' => $request->boolean('is_promo_active'),
            'is_free_package_active' => $request->boolean('is_free_package_active'),
            'status' => $validated['status'],
            'sort_order' => $validated['sort_order'],
            'image_path' => $imagePath,
            'published_at' => $validated['status'] === 'active' ? now() : null,
        ]);
        
        $bundle->sessions()->sync($request->input('session_ids', []));

        return redirect()->route('admin.exam-bundles.index')->with('status', 'Paket bundle berhasil ditambahkan.');
    }

    public function edit(ExamBundle $examBundle): View
    {
        $allSessions = ExamSession::orderBy('name')->get();
        return view('pages.admin.exam-bundles.edit', compact('examBundle', 'allSessions'));
    }

    public function update(Request $request, ExamBundle $examBundle): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:exam_bundles,slug,'.$examBundle->id],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'integer', 'min:0'],
            'sale_price' => ['nullable', 'integer', 'min:0'],
            'is_promo_active' => ['nullable', 'boolean'],
            'is_free_package_active' => ['nullable', 'boolean'],
            'status' => ['required', 'in:draft,active,inactive'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'max:4096'],
            'session_ids' => ['nullable', 'array'],
            'session_ids.*' => ['exists:exam_sessions,id'],
        ]);

        $imagePath = $examBundle->image_path;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('exam-bundles', 'public');
        }

        if ($validated['status'] === 'active' && (blank($validated['title']) || blank($validated['description']) || blank($imagePath))) {
            return back()->withErrors(['status' => 'Lengkapi judul, deskripsi, dan gambar sebelum publish.'])->withInput();
        }

        $examBundle->update([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'sale_price' => $validated['sale_price'],
            'is_promo_active' => $request->boolean('is_promo_active'),
            'is_free_package_active' => $request->boolean('is_free_package_active'),
            'status' => $validated['status'],
            'sort_order' => $validated['sort_order'],
            'image_path' => $imagePath,
            'published_at' => $validated['status'] === 'active' ? now() : null,
        ]);
        
        $examBundle->sessions()->sync($request->input('session_ids', []));

        return redirect()->route('admin.exam-bundles.index')->with('status', 'Paket bundle diperbarui.');
    }
}
