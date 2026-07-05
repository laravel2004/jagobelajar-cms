<?php

namespace App\Http\Controllers;

use App\Models\ExamSession;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class AdminExamSessionController extends Controller
{
    public function index(): View
    {
        return view('pages.admin.exam-sessions.index', [
            'examSessions' => ExamSession::query()->orderByDesc('starts_at')->latest()->get(),
        ]);
    }

    public function fetch(Request $request): RedirectResponse
    {
        $endpoint = config('services.irt_quiz.exam_sessions_endpoint');
        abort_if(blank($endpoint), 422, 'Endpoint sesi ujian belum diatur.');

        try {
            $response = Http::timeout(15)->get($endpoint);
        } catch (\Throwable $exception) {
            return back()->withErrors(['fetch' => 'Gagal terhubung ke endpoint sesi ujian: '.$exception->getMessage()]);
        }

        if (! $response->successful()) {
            return back()->withErrors(['fetch' => 'Gagal mengambil data sesi ujian. HTTP '.$response->status()]);
        }

        $items = $response->json('data', []);
        $fetched = 0;

        foreach ($items as $item) {
            if (blank($item['external_id'] ?? null) || blank($item['name'] ?? null)) {
                continue;
            }

            $slug = Str::slug($item['slug'] ?? $item['name']);
            $baseSlug = $slug;
            $counter = 2;
            while (ExamSession::query()->where('slug', $slug)->where('external_id', '!=', (string) $item['external_id'])->exists()) {
                $slug = $baseSlug.'-'.$counter++;
            }

            ExamSession::updateOrCreate(
                ['external_id' => (string) $item['external_id']],
                [
                    'source_code' => $item['code'] ?? null,
                    'source_slug' => $item['slug'] ?? null,
                    'name' => $item['name'],
                    'subject' => is_array($item['subjects'] ?? null) ? implode(', ', $item['subjects']) : ($item['subject'] ?? null),
                    'starts_at' => filled($item['starts_at'] ?? null) ? Carbon::parse($item['starts_at']) : null,
                    'ends_at' => filled($item['ends_at'] ?? null) ? Carbon::parse($item['ends_at']) : null,
                    'source_updated_at' => $item['updated_at'] ?? null,
                    'last_fetched_at' => now(),
                    'slug' => $slug,
                    'title' => ExamSession::query()->where('external_id', (string) $item['external_id'])->value('title') ?? $item['name'],
                    'status' => ExamSession::query()->where('external_id', (string) $item['external_id'])->value('status') ?? 'draft',
                    'sort_order' => ExamSession::query()->where('external_id', (string) $item['external_id'])->value('sort_order') ?? 0,
                    'price' => ExamSession::query()->where('external_id', (string) $item['external_id'])->value('price') ?? 0,
                    'sale_price' => ExamSession::query()->where('external_id', (string) $item['external_id'])->value('sale_price'),
                    'is_promo_active' => ExamSession::query()->where('external_id', (string) $item['external_id'])->value('is_promo_active') ?? false,
                    'is_free_package_active' => ExamSession::query()->where('external_id', (string) $item['external_id'])->value('is_free_package_active') ?? false,
                    'description' => ExamSession::query()->where('external_id', (string) $item['external_id'])->value('description'),
                    'image_path' => ExamSession::query()->where('external_id', (string) $item['external_id'])->value('image_path'),
                ]
            );

            $fetched++;
        }

        return back()->with('status', "Fetch selesai. Data diproses: {$fetched}");
    }

    public function edit(ExamSession $examSession): View
    {
        return view('pages.admin.exam-sessions.edit', compact('examSession'));
    }

    public function update(Request $request, ExamSession $examSession): RedirectResponse
    {
        $validated = $request->validate([
            'slug' => ['required', 'string', 'max:255', 'unique:exam_sessions,slug,'.$examSession->id],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'integer', 'min:0'],
            'sale_price' => ['nullable', 'integer', 'min:0'],
            'is_promo_active' => ['nullable', 'boolean'],
            'is_free_package_active' => ['nullable', 'boolean'],
            'status' => ['required', 'in:draft,active,inactive'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);

        $imagePath = $examSession->image_path;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('exam-sessions', 'public');
        }

        if ($validated['status'] === 'active' && (blank($validated['title']) || blank($validated['description']) || blank($imagePath))) {
            return back()->withErrors(['status' => 'Lengkapi judul, deskripsi, dan gambar sebelum publish.'])->withInput();
        }

        $examSession->update([
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

        return redirect()->route('admin.exam-sessions.index')->with('status', 'Sesi ujian diperbarui.');
    }
}
