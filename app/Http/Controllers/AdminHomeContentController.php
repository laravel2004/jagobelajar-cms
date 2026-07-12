<?php

namespace App\Http\Controllers;

use App\Models\HomePageContent;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminHomeContentController extends Controller
{
    public function edit(): View
    {
        return view('pages.admin.home-content', [
            'content' => $this->content(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'hero_badge' => ['required', 'string', 'max:255'],
            'hero_title' => ['required', 'string', 'max:255'],
            'hero_description' => ['required', 'string'],
            'hero_benefits' => ['required', 'array', 'min:1'],
            'hero_benefits.*' => ['required', 'string', 'max:255'],
            'hero_primary_cta_label' => ['required', 'string', 'max:255'],
            'hero_primary_cta_url' => ['required', 'string', 'max:255'],
            'hero_secondary_cta_label' => ['required', 'string', 'max:255'],
            'hero_secondary_cta_url' => ['required', 'string', 'max:255'],
            'hero_image_alt' => ['required', 'string', 'max:255'],
            'hero_image' => ['nullable', 'image', 'max:4096'],
            'feature_title' => ['required', 'string', 'max:255'],
            'feature_items' => ['required', 'array', 'min:1'],
            'feature_items.*.title' => ['required', 'string', 'max:255'],
            'feature_items.*.description' => ['required', 'string', 'max:255'],
            'feature_items.*.icon' => ['required', 'string', 'max:50'],
            'feature_items.*.badge' => ['required', 'string', 'max:255'],
            'program_title' => ['required', 'string', 'max:255'],
            'program_description' => ['required', 'string'],
            'program_items' => ['required', 'array'],
            'program_items.*.title' => ['required', 'string', 'max:255'],
            'program_items.*.subtitle' => ['required', 'string', 'max:255'],
            'program_items.*.border' => ['required', 'string', 'max:255'],
            'program_items.*.color' => ['required', 'string', 'max:255'],
            'program_items.*.background' => ['required', 'string', 'max:255'],
            'program_items.*.button' => ['required', 'string', 'max:255'],
            'program_items.*.url' => ['required', 'string', 'max:255'],
            'program_items.*.points' => ['required', 'array', 'min:1'],
            'program_items.*.points.*.title' => ['required', 'string', 'max:255'],
            'program_items.*.points.*.description' => ['required', 'string', 'max:255'],
            'gallery_title' => ['required', 'string', 'max:255'],
            'testimonials_title' => ['required', 'string', 'max:255'],
            'gallery_items' => ['nullable', 'array'],
            'gallery_items.*.label' => ['nullable', 'string', 'max:255'],
            'gallery_items.*.badge' => ['nullable', 'string', 'max:255'],
            'gallery_images.*' => ['nullable', 'image', 'max:4096'],
            'testimonials' => ['nullable', 'array'],
            'testimonials.*.name' => ['nullable', 'string', 'max:255'],
            'testimonials.*.role' => ['nullable', 'string', 'max:255'],
            'testimonials.*.quote' => ['nullable', 'string'],
            'testimonial_images.*' => ['nullable', 'image', 'max:4096'],
            'cta_title' => ['required', 'string', 'max:255'],
            'cta_description' => ['required', 'string'],
            'cta_primary_label' => ['required', 'string', 'max:255'],
            'cta_primary_url' => ['required', 'string', 'max:255'],
            'cta_secondary_label' => ['required', 'string', 'max:255'],
            'cta_secondary_url' => ['required', 'string', 'max:255'],
            'footer_description' => ['required', 'string'],
            'footer_logo' => ['nullable', 'image', 'max:4096'],
            'footer_primary_label' => ['required', 'string', 'max:255'],
            'footer_primary_url' => ['required', 'string', 'max:255'],
            'footer_secondary_label' => ['required', 'string', 'max:255'],
            'footer_secondary_url' => ['required', 'string', 'max:255'],
            'footer_menu_title' => ['required', 'string', 'max:255'],
            'footer_menu_items' => ['required', 'array', 'min:1'],
            'footer_menu_items.*.label' => ['required', 'string', 'max:255'],
            'footer_menu_items.*.url' => ['required', 'string', 'max:255'],
            'footer_contact_title' => ['required', 'string', 'max:255'],
            'footer_contact_items' => ['required', 'array', 'min:1'],
            'footer_contact_items.*' => ['required', 'string', 'max:255'],
            'footer_copyright' => ['required', 'string', 'max:255'],
            'footer_tagline' => ['required', 'string', 'max:255'],
        ]);

        $content = $this->content();
        $heroImagePath = $content->hero_image_path;
        if ($request->hasFile('hero_image')) {
            $heroImagePath = $this->storeImage($request->file('hero_image'), $content->hero_image_path, 'hero');
        }
        $footerLogoPath = $content->footer_logo_path;
        if ($request->hasFile('footer_logo')) {
            $footerLogoPath = $this->storeImage($request->file('footer_logo'), $content->footer_logo_path, 'footer');
        }

        $galleryItems = array_values($validated['gallery_items'] ?? []);
        foreach ($galleryItems as $index => &$item) {
            $item['image'] = $content->gallery_items[$index]['image'] ?? null;
            if ($request->hasFile("gallery_images.$index")) {
                $item['image'] = $this->storeImage($request->file("gallery_images.$index"), $item['image'], 'gallery');
            }
        }
        unset($item);

        $testimonials = array_values($validated['testimonials'] ?? []);
        foreach ($testimonials as $index => &$item) {
            $item['image'] = $content->testimonials[$index]['image'] ?? null;
            if ($request->hasFile("testimonial_images.$index")) {
                $item['image'] = $this->storeImage($request->file("testimonial_images.$index"), $item['image'], 'testimonials');
            }
        }
        unset($item);

        $programItems = array_values($validated['program_items']);
        foreach ($programItems as $index => &$item) {
            $item['points'] = array_values(array_filter($item['points'] ?? [], fn ($point) => filled($point['title'] ?? null) || filled($point['description'] ?? null))) ?: $this->defaults()['program_items'][$index]['points'];
        }
        unset($item);

        $content->fill([
            'hero_badge' => $validated['hero_badge'],
            'hero_title' => $validated['hero_title'],
            'hero_description' => $validated['hero_description'],
            'hero_benefits' => array_values(array_filter($validated['hero_benefits'])),
            'hero_primary_cta_label' => $validated['hero_primary_cta_label'],
            'hero_primary_cta_url' => $validated['hero_primary_cta_url'],
            'hero_secondary_cta_label' => $validated['hero_secondary_cta_label'],
            'hero_secondary_cta_url' => $validated['hero_secondary_cta_url'],
            'hero_image_alt' => $validated['hero_image_alt'],
            'hero_image_path' => $heroImagePath,
            'feature_title' => $validated['feature_title'],
            'feature_items' => array_values(array_filter($validated['feature_items'], fn ($item) => filled($item['title'] ?? null) || filled($item['description'] ?? null) || filled($item['icon'] ?? null) || filled($item['badge'] ?? null))) ?: $this->defaults()['feature_items'],
            'program_title' => $validated['program_title'],
            'program_description' => $validated['program_description'],
            'program_items' => array_values(array_map(function (array $item): array {
                $item['points'] = array_values(array_filter($item['points'] ?? [], fn ($point) => filled($point['title'] ?? null) || filled($point['description'] ?? null)));

                return $item;
            }, $validated['program_items'])),
            'gallery_title' => $validated['gallery_title'],
            'testimonials_title' => $validated['testimonials_title'],
            'gallery_items' => array_values(array_filter($galleryItems, fn ($item) => filled($item['label'] ?? null) || filled($item['badge'] ?? null) || filled($item['image'] ?? null))) ?: $this->defaults()['gallery_items'],
            'testimonials' => array_values(array_filter($testimonials, fn ($item) => filled($item['name'] ?? null) || filled($item['role'] ?? null) || filled($item['quote'] ?? null) || filled($item['image'] ?? null))) ?: $this->defaults()['testimonials'],
            'cta_title' => $validated['cta_title'],
            'cta_description' => $validated['cta_description'],
            'cta_primary_label' => $validated['cta_primary_label'],
            'cta_primary_url' => $validated['cta_primary_url'],
            'cta_secondary_label' => $validated['cta_secondary_label'],
            'cta_secondary_url' => $validated['cta_secondary_url'],
            'footer_description' => $validated['footer_description'],
            'footer_primary_label' => $validated['footer_primary_label'],
            'footer_primary_url' => $validated['footer_primary_url'],
            'footer_secondary_label' => $validated['footer_secondary_label'],
            'footer_secondary_url' => $validated['footer_secondary_url'],
            'footer_menu_title' => $validated['footer_menu_title'],
            'footer_menu_items' => array_values(array_filter($validated['footer_menu_items'], fn ($item) => filled($item['label'] ?? null) || filled($item['url'] ?? null))) ?: $this->defaults()['footer_menu_items'],
            'footer_contact_title' => $validated['footer_contact_title'],
            'footer_contact_items' => array_values(array_filter($validated['footer_contact_items'])) ?: $this->defaults()['footer_contact_items'],
            'footer_copyright' => $validated['footer_copyright'],
            'footer_tagline' => $validated['footer_tagline'],
            'footer_logo_path' => $footerLogoPath,
        ])->save();

        return back()->with('status', 'Konten beranda berhasil disimpan.');
    }

    private function content(): HomePageContent
    {
        $content = HomePageContent::query()->firstOrCreate([], $this->defaults());
        foreach ($this->defaults() as $key => $value) {
            if (($content->{$key} === null || $content->{$key} === '') && $value !== null && $value !== '') {
                $content->{$key} = $value;
            }
        }
        $content->saveQuietly();

        return $content;
    }


    private function storeImage($file, ?string $currentPath, string $folder): string
    {
        if ($currentPath) {
            $existing = public_path($currentPath);
            if (File::exists($existing)) {
                File::delete($existing);
            }
        }

        $directory = public_path('images/cms/'.$folder);
        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();
        $file->move($directory, $filename);

        return 'images/cms/'.$folder.'/'.$filename;
    }

    private function defaults(): array
    {
        return [
            'hero_badge' => 'Bimbel & Try Out Online #BelajarJadiJago',
            'hero_title' => 'Raih Prestasi Terbaikmu Bersama Jago Belajar',
            'hero_description' => 'Bimbel dan try out online untuk siswa SD - SMP - SMA | TKA | OSN. Bimbel online interaktif dibimbing tutor berpengalaman, materi dan latihan soal terstruktur, akses try out premium, analisis hasil belajar.',
            'hero_benefits' => ['Bimbel Online Seru', 'Try Out Berkualitas', 'Tutor Berpengalaman', 'Analisis Hasil Belajar'],
            'hero_primary_cta_label' => 'Daftar Bimbel',
            'hero_primary_cta_url' => '/materi',
            'hero_secondary_cta_label' => 'Lihat Paket Belajar',
            'hero_secondary_cta_url' => '#program',
            'hero_image_alt' => 'Siswa Jago Belajar',
            'feature_title' => 'Kenapa Memilih Jago Belajar?',
            'feature_items' => [
                ['title' => 'Bimbel Online Interaktif', 'description' => 'Dibimbing tutor berpengalaman', 'icon' => 'chat', 'badge' => 'bg-rose-100 text-rose-500'],
                ['title' => 'Materi Terstruktur', 'description' => 'Pahami materi mulai dari konsepnya', 'icon' => 'account_tree', 'badge' => 'bg-emerald-100 text-emerald-600'],
                ['title' => 'Belajar Lebih Fokus', 'description' => 'Kelas dibatasi maksimal 10 siswa', 'icon' => 'center_focus_strong', 'badge' => 'bg-blue-100 text-blue-600'],
                ['title' => 'Belajar Fleksibel', 'description' => 'Akses soal dan rekaman belajar kapan saja', 'icon' => 'schedule', 'badge' => 'bg-yellow-100 text-yellow-600'],
                ['title' => 'Kualitas Terjamin', 'description' => 'Soal HOTS terupdate sesuai kerangka asesmen', 'icon' => 'stars', 'badge' => 'bg-indigo-100 text-indigo-600'],
                ['title' => 'Try Out Terbaik', 'description' => 'Analisis hasil belajar & peringkat nasional', 'icon' => 'monitoring', 'badge' => 'bg-cyan-100 text-cyan-600'],
            ],
            'program_title' => 'Program Belajar',
            'program_description' => 'Semua blok program di bawah tetap sama layout-nya, yang diubah hanya copywriting.',
            'program_items' => [
                ['title' => 'TRY OUT ONLINE', 'subtitle' => 'SD ? SMP ? SMA', 'border' => 'border-[#0043c6]', 'color' => 'text-[#0043c6]', 'background' => 'bg-[#dce1ff]', 'button' => 'Lihat Semua Try Out', 'url' => '/materi', 'points' => [['title' => 'TKA SD SMP SMA', 'description' => 'Taklukkan TKA dengan latihan soal'], ['title' => 'UTS UAS SD SMP SMA', 'description' => 'Jadi juara kelas, perbanyak latihan soal'], ['title' => 'OSN & UTBK', 'description' => 'Wujudkan mimpi dengan latihan soal']]],
                ['title' => 'BIMBEL ONLINE', 'subtitle' => 'Interaktif & fleksibel', 'border' => 'border-[#feb700]', 'color' => 'text-[#7a5400]', 'background' => 'bg-[#fff1c4]', 'button' => 'Daftar Bimbel', 'url' => '/materi', 'points' => [['title' => 'TKA SD SMP SMA', 'description' => 'Persiapkan TKA mulai dari konsep materi'], ['title' => 'Matematika IPA B Inggris', 'description' => 'Jadi ambis kelas SD SMP SMA'], ['title' => 'OSN SD Matematika', 'description' => 'Jadi jagoan OSN']]],
                ['title' => 'KELAS INTENSIF', 'subtitle' => 'Belajar lebih fokus', 'border' => 'border-[#22c55e]', 'color' => 'text-[#1c9b5e]', 'background' => 'bg-[#dcfce7]', 'button' => 'Lihat Jadwal', 'url' => '#', 'points' => [['title' => 'Tutor Berpengalaman', 'description' => 'Mentor dari PTN ternama'], ['title' => 'Jadwal Fleksibel', 'description' => 'Atur sesuai waktu luangmu'], ['title' => 'Materi Personal', 'description' => 'Sesuai kebutuhan spesifikmu']]],
            ],
            'gallery_title' => 'Dokumentasi JagoanBelajar Seru',
            'testimonials_title' => 'Apa Kata Mereka?',
            'gallery_items' => [
                ['label' => 'BIMBEL ONLINE', 'badge' => 'Live Class', 'image' => null],
                ['label' => 'TRY OUT', 'badge' => 'Premium', 'image' => null],
                ['label' => 'KELAS SERU', 'badge' => 'Interaktif', 'image' => null],
            ],
            'testimonials' => [
                ['name' => 'Syafiq', 'role' => 'Siswa Jago Belajar', 'quote' => 'Matematika 70, B. Indonesia 86,67. Makasih atas bimbingannya!', 'image' => null],
                ['name' => 'Naufal', 'role' => 'Siswa Jago Belajar', 'quote' => 'Mtk n B. Indo semua 83,33. Terima kasih ilmunya kak!', 'image' => null],
                ['name' => 'Arnetta', 'role' => 'Siswa Jago Belajar', 'quote' => 'Untuk nilai mtk dan bindo nya sama 83.33. Worth mantapp nilainya!', 'image' => null],
            ],
            'cta_title' => 'Siap Raih Skor Terbaikmu?',
            'cta_description' => 'Mulai perjalanan belajarmu bersama Jago Belajar sekarang juga!',
            'cta_primary_label' => 'Daftar Bimbel Sekarang!',
            'cta_primary_url' => '/materi',
            'cta_secondary_label' => 'Lihat Program Bimbel',
            'cta_secondary_url' => '#program',
            'footer_description' => 'Platform belajar untuk membantu siswa Indonesia belajar lebih terarah, latihan lebih konsisten, dan siap menghadapi ujian dengan percaya diri.',
            'footer_primary_label' => 'Mulai Belajar',
            'footer_primary_url' => '/materi',
            'footer_secondary_label' => 'Gabung Forum',
            'footer_secondary_url' => '/forum',
            'footer_menu_title' => 'Menu',
            'footer_menu_items' => [
                ['label' => 'Keunggulan', 'url' => '/#keunggulan'],
                ['label' => 'Try Out', 'url' => '/materi'],
                ['label' => 'Forum Diskusi', 'url' => '/forum'],
                ['label' => 'Testimoni', 'url' => '/#testimoni'],
            ],
            'footer_contact_title' => 'Kontak',
            'footer_contact_items' => ['Instagram: @jagobelajar', 'Email: halo@jagobelajar.id', 'WhatsApp: +62 812-3456-7890'],
            'footer_copyright' => '? :year Jago Belajar. Semua hak dilindungi.',
            'footer_tagline' => 'Belajar lebih mudah, hasil lebih maksimal.',
            'footer_logo_path' => null,
            'hero_image_path' => null,
        ];
    }
}
