<?php

namespace App\Http\Controllers;

use App\Models\HomePageContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminFeatureController extends Controller
{
    public function index(): View
    {
        return view('pages.admin.features.index', [
            'content' => HomePageContent::query()->firstOrCreate([], $this->defaults()),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'feature_title' => ['required', 'string', 'max:255'],
            'feature_items' => ['required', 'array', 'min:1'],
            'feature_items.*.title' => ['required', 'string', 'max:255'],
            'feature_items.*.description' => ['required', 'string', 'max:255'],
            'feature_items.*.icon' => ['required', 'string', 'max:50'],
            'feature_items.*.badge' => ['required', 'string', 'max:255'],
        ]);

        $content = HomePageContent::query()->firstOrCreate([], $this->defaults());
        $content->update([
            'feature_title' => $validated['feature_title'],
            'feature_items' => array_values($validated['feature_items']),
        ]);

        return back()->with('status', 'CMS keunggulan berhasil diperbarui.');
    }

    private function defaults(): array
    {
        return [
            'feature_title' => 'Kenapa Memilih Jago Belajar?',
            'feature_items' => [
                ['title' => 'Tutor Berpengalaman', 'description' => 'Didampingi tutor yang terbiasa mengajar siswa SD sampai SMA.', 'icon' => 'teacher', 'badge' => 'bg-[#dce1ff] text-[#0043c6]'],
                ['title' => 'Materi Bertahap', 'description' => 'Materi disusun dari dasar, latihan, sampai evaluasi agar siswa tidak lompat konsep.', 'icon' => 'book', 'badge' => 'bg-[#fff2c7] text-[#7c5800]'],
                ['title' => 'Try Out Berkala', 'description' => 'Simulasi ujian membantu siswa melatih strategi pengerjaan dan manajemen waktu.', 'icon' => 'clipboard', 'badge' => 'bg-[#e8f7ef] text-[#1c9b5e]'],
            ],
        ];
    }
}
