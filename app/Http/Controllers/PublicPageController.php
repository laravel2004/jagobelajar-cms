<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\BlogPost;
use App\Models\Bimbel;
use App\Models\Discussion;
use App\Models\ExamSession;
use App\Models\Material;
use App\Models\HomePageContent;
use App\Models\Quiz;
use Illuminate\Contracts\View\View;

class PublicPageController extends Controller
{
    public function home(): View
    {
        $content = HomePageContent::query()->firstOrCreate([], [
            'hero_badge' => 'Bimbel & Try Out Online #BelajarJadiJago',
            'hero_title' => 'Raih Prestasi Terbaikmu Bersama Jago Belajar',
            'hero_description' => 'Bimbel dan try out online untuk siswa SD - SMP - SMA | TKA | OSN. Bimbel online interaktif dibimbing tutor berpengalaman, materi dan latihan soal terstruktur, akses try out premium, analisis hasil belajar.',
            'hero_benefits' => ['Bimbel Online Seru', 'Try Out Berkualitas', 'Tutor Berpengalaman', 'Analisis Hasil Belajar'],
            'hero_primary_cta_label' => 'Daftar Bimbel',
            'hero_primary_cta_url' => '/materi',
            'hero_secondary_cta_label' => 'Lihat Paket Belajar',
            'hero_secondary_cta_url' => '#program',
            'hero_image_alt' => 'Siswa Jago Belajar',
            'hero_image_path' => null,
            'feature_title' => 'Kenapa Memilih Jago Belajar?',
            'feature_items' => [
                ['title' => 'Bimbel Online Interaktif', 'description' => 'Dibimbing tutor berpengalaman', 'icon' => 'chat', 'badge' => 'bg-rose-100 text-rose-500'],
                ['title' => 'Materi Terstruktur', 'description' => 'Pahami materi mulai dari konsepnya', 'icon' => 'account_tree', 'badge' => 'bg-emerald-100 text-emerald-600'],
                ['title' => 'Belajar Lebih Fokus', 'description' => 'Kelas dibatasi maksimal 10 siswa', 'icon' => 'center_focus_strong', 'badge' => 'bg-blue-100 text-blue-600'],
                ['title' => 'Belajar Fleksibel', 'description' => 'Akses soal dan rekaman belajar kapan saja', 'icon' => 'schedule', 'badge' => 'bg-yellow-100 text-yellow-600'],
                ['title' => 'Kualitas Terjamin', 'description' => 'Soal HOTS terupdate sesuai kerangka asesmen', 'icon' => 'stars', 'badge' => 'bg-indigo-100 text-indigo-600'],
                ['title' => 'Try Out Terbaik', 'description' => 'Analisis hasil belajar & peringkat nasional', 'icon' => 'monitoring', 'badge' => 'bg-cyan-100 text-cyan-600'],
            ],
            'program_title' => 'Program Lengkap Jago Belajar',
            'program_description' => 'Semua kebutuhan belajarmu ada di sini!',
            'program_items' => [
                ['title' => 'TRY OUT ONLINE', 'subtitle' => 'SD ? SMP ? SMA', 'border' => 'border-[#0043c6]', 'color' => 'text-[#0043c6]', 'background' => 'bg-[#dce1ff]', 'button' => 'Lihat Semua Try Out'],
                ['title' => 'BIMBEL REGULER', 'subtitle' => 'SD ? SMP ? SMA', 'border' => 'border-emerald-500', 'color' => 'text-emerald-600', 'background' => 'bg-emerald-100', 'button' => 'Lihat Program Reguler'],
                ['title' => 'PRIVAT ONLINE', 'subtitle' => 'INTENSIF & EKSKLUSIF', 'border' => 'border-[#4a36c4]', 'color' => 'text-[#4a36c4]', 'background' => 'bg-[#e4dfff]', 'button' => 'Lihat Program Privat'],
            ],
            'gallery_title' => 'Dokumentasi JagoanBelajar Seru',
            'gallery_items' => [
                ['label' => 'BIMBEL ONLINE', 'badge' => 'Live Class'],
                ['label' => 'TRY OUT', 'badge' => 'Premium'],
                ['label' => 'KELAS SERU', 'badge' => 'Interaktif'],
            ],
            'testimonials_title' => 'Apa Kata Mereka?',
            'testimonials' => [
                ['name' => 'Syafiq', 'role' => 'Siswa Jago Belajar', 'quote' => 'Matematika 70, B. Indonesia 86,67. Makasih atas bimbingannya!'],
                ['name' => 'Naufal', 'role' => 'Siswa Jago Belajar', 'quote' => 'Mtk n B. Indo semua 83,33. Terima kasih ilmunya kak!'],
                ['name' => 'Arnetta', 'role' => 'Siswa Jago Belajar', 'quote' => 'Untuk nilai mtk dan bindo nya sama 83.33. Worth mantapp nilainya!'],
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
        ]);
        $content->fill(array_filter([
            'hero_badge' => $content->hero_badge,
            'hero_title' => $content->hero_title,
            'hero_description' => $content->hero_description,
            'hero_benefits' => $content->hero_benefits ?: ['Bimbel Online Seru', 'Try Out Berkualitas', 'Tutor Berpengalaman', 'Analisis Hasil Belajar'],
            'hero_primary_cta_label' => $content->hero_primary_cta_label ?: 'Daftar Bimbel',
            'hero_primary_cta_url' => $content->hero_primary_cta_url ?: '/materi',
            'hero_secondary_cta_label' => $content->hero_secondary_cta_label ?: 'Lihat Paket Belajar',
            'hero_secondary_cta_url' => $content->hero_secondary_cta_url ?: '#program',
            'hero_image_alt' => $content->hero_image_alt,
            'hero_image_path' => $content->hero_image_path,
            'feature_title' => $content->feature_title,
            'feature_items' => $content->feature_items,
            'program_title' => $content->program_title,
            'program_description' => $content->program_description,
            'program_items' => $content->program_items,
            'gallery_title' => $content->gallery_title,
            'gallery_items' => $content->gallery_items,
            'testimonials_title' => $content->testimonials_title,
            'testimonials' => $content->testimonials,
            'cta_title' => $content->cta_title,
            'cta_description' => $content->cta_description,
            'cta_primary_label' => $content->cta_primary_label,
            'cta_primary_url' => $content->cta_primary_url,
            'cta_secondary_label' => $content->cta_secondary_label,
            'cta_secondary_url' => $content->cta_secondary_url,
            'footer_description' => $content->footer_description ?: 'Platform belajar untuk membantu siswa Indonesia belajar lebih terarah, latihan lebih konsisten, dan siap menghadapi ujian dengan percaya diri.',
            'footer_primary_label' => $content->footer_primary_label ?: 'Mulai Belajar',
            'footer_primary_url' => $content->footer_primary_url ?: '/materi',
            'footer_secondary_label' => $content->footer_secondary_label ?: 'Gabung Forum',
            'footer_secondary_url' => $content->footer_secondary_url ?: '/forum',
            'footer_menu_title' => $content->footer_menu_title ?: 'Menu',
            'footer_menu_items' => $content->footer_menu_items ?: [['label' => 'Keunggulan', 'url' => '/#keunggulan'], ['label' => 'Try Out', 'url' => '/materi'], ['label' => 'Forum Diskusi', 'url' => '/forum'], ['label' => 'Testimoni', 'url' => '/#testimoni']],
            'footer_contact_title' => $content->footer_contact_title ?: 'Kontak',
            'footer_contact_items' => $content->footer_contact_items ?: ['Instagram: @jagobelajar', 'Email: halo@jagobelajar.id', 'WhatsApp: +62 812-3456-7890'],
            'footer_copyright' => $content->footer_copyright ?: '? :year Jago Belajar. Semua hak dilindungi.',
            'footer_tagline' => $content->footer_tagline ?: 'Belajar lebih mudah, hasil lebih maksimal.',
            'footer_logo_path' => $content->footer_logo_path,
        ], fn ($value) => $value !== null && $value !== ''));
        $content->saveQuietly();

        return view('pages.public.home', [
            'content' => $content,
            'featuredMaterials' => Material::query()->latest()->take(3)->get(),
            'latestDiscussions' => Discussion::query()->latest()->take(3)->get(),
            'stats' => [
                'materials' => Material::query()->count(),
                'quizzes' => Quiz::query()->count(),
                'discussions' => Discussion::query()->count(),
                'categories' => Category::query()->count(),
            ],
        ]);
    }

    public function materials(): View
    {
        return view('pages.public.materials', [
            'materials' => Material::query()->latest()->paginate(9),
        ]);
    }

    public function quizzes(): View
    {
        return view('pages.public.quizzes', [
            'quizzes' => Quiz::query()->latest()->paginate(9),
        ]);
    }

    public function tryout(): View
    {
        return view('pages.public.tryout', [
            'examSessions' => ExamSession::query()
                ->where('status', 'active')
                ->orderBy('sort_order')
                ->orderBy('starts_at')
                ->get(),
        ]);
    }

    public function bimbel(): View
    {
        return view('pages.public.bimbel', [
            'bimbels' => Bimbel::query()->where('status', 'active')->orderBy('sort_order')->latest()->get(),
        ]);
    }

    public function bimbelDetail(string $slug): View
    {
        return view('pages.public.bimbel-detail', [
            'bimbel' => Bimbel::query()->where('status', 'active')->where('slug', $slug)->firstOrFail(),
        ]);
    }

    public function tryoutDetail(string $slug): View
    {
        return view('pages.public.tryout-detail', [
            'examSession' => ExamSession::query()
                ->where('status', 'active')
                ->where('slug', $slug)
                ->firstOrFail(),
        ]);
    }

    public function forum(): View
    {
        return view('pages.public.forum', [
            'discussions' => Discussion::query()->latest()->paginate(9),
        ]);
    }


    public function keunggulan(): View
    {
        return view('pages.public.keunggulan', [
            'content' => HomePageContent::query()->firstOrCreate([], [
                'feature_title' => 'Kenapa Memilih Jago Belajar?',
                'feature_items' => [
                    ['title' => 'Tutor Berpengalaman', 'description' => 'Didampingi tutor yang terbiasa mengajar siswa SD sampai SMA.', 'icon' => 'teacher', 'badge' => 'bg-[#dce1ff] text-[#0043c6]'],
                    ['title' => 'Materi Bertahap', 'description' => 'Materi disusun dari dasar, latihan, sampai evaluasi agar siswa tidak lompat konsep.', 'icon' => 'book', 'badge' => 'bg-[#fff2c7] text-[#7c5800]'],
                    ['title' => 'Try Out Berkala', 'description' => 'Simulasi ujian membantu siswa melatih strategi pengerjaan dan manajemen waktu.', 'icon' => 'clipboard', 'badge' => 'bg-[#e8f7ef] text-[#1c9b5e]'],
                ],
            ]),
        ]);
    }

    public function blog(): View
    {
        return view('pages.public.blog', [
            'posts' => BlogPost::query()->where('is_published', true)->latest('published_at')->latest()->get(),
        ]);
    }

    public function blogDetail(string $slug): View
    {
        return view('pages.public.blog-detail', [
            'post' => BlogPost::query()->where('slug', $slug)->where('is_published', true)->firstOrFail(),
        ]);
    }
}
