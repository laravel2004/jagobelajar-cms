@php($homeContent = $content ?? null)
@php($programCopy = $homeContent->program_items ?? [])
@php($featureItems = $homeContent->feature_items ?? [])
@php($galleryItems = $homeContent->gallery_items ?? [])
@php($testimonialItems = $homeContent->testimonials ?? [])
<x-layouts.public :title="'Jago Belajar - Jadi Juara di Setiap Ujian'">
    <section class="relative overflow-hidden bg-[#f9f9ff]">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_75%_20%,rgba(182,196,255,0.45),transparent_34%),linear-gradient(135deg,rgba(241,243,255,0.92),rgba(255,255,255,0.82)_48%,rgba(249,249,255,1))]"></div>
        <div class="jb-container relative grid items-center gap-8 py-10 sm:py-14 lg:min-h-[690px] lg:grid-cols-[0.88fr_1.12fr] lg:gap-10 lg:py-24">
            <div class="max-w-2xl text-center lg:text-left">
                <span class="inline-flex max-w-full items-center gap-2 rounded-full bg-[#dce1ff] px-4 py-2 text-left text-[11px] font-semibold text-[#003ab1] shadow-sm sm:text-xs">
                    <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 7.5 12 3l9 4.5-9 4.5z" /><path d="M7 10v4.8c0 1.2 2.2 2.7 5 2.7s5-1.5 5-2.7V10" /><path d="M21 8v6" /><path d="M21 14.5v.5" /></svg>
                    {{ $homeContent->hero_badge ?? 'Bimbel & Try Out Online #BelajarJadiJago' }}
                </span>

                <h1 class="mt-6 text-3xl font-extrabold leading-tight tracking-[-0.04em] text-[#0043c6] sm:text-4xl lg:text-[56px] lg:leading-[1.06]">
                    {{ $homeContent->hero_title ?? 'Raih Prestasi Terbaikmu Bersama Jago Belajar' }}
                </h1>

                <p class="mx-auto mt-5 max-w-xl text-sm leading-7 text-[#434655] sm:text-base lg:mx-0">
                    {{ $homeContent->hero_description ?? 'Bimbel dan try out online untuk siswa SD - SMP - SMA | TKA | OSN. Bimbel online interaktif dibimbing tutor berpengalaman, materi dan latihan soal terstruktur, akses try out premium, analisis hasil belajar.' }}
                </p>

                <div class="mx-auto mt-7 grid max-w-xl gap-3 text-left text-sm font-semibold text-[#141b2c] sm:grid-cols-2 lg:mx-0">
                    <div class="flex items-center gap-3"><span class="grid h-5 w-5 place-items-center rounded-full bg-[#0043c6] text-[11px] text-white">✓</span>{{ $homeContent->hero_benefits[0] ?? 'Bimbel Online Seru' }}</div>
                    <div class="flex items-center gap-3"><span class="grid h-5 w-5 place-items-center rounded-full bg-[#0043c6] text-[11px] text-white">✓</span>{{ $homeContent->hero_benefits[1] ?? 'Try Out Berkualitas' }}</div>
                    <div class="flex items-center gap-3"><span class="grid h-5 w-5 place-items-center rounded-full bg-[#0043c6] text-[11px] text-white">✓</span>{{ $homeContent->hero_benefits[2] ?? 'Tutor Berpengalaman' }}</div>
                    <div class="flex items-center gap-3"><span class="grid h-5 w-5 place-items-center rounded-full bg-[#0043c6] text-[11px] text-white">✓</span>{{ $homeContent->hero_benefits[3] ?? 'Analisis Hasil Belajar' }}</div>
                </div>

                <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row lg:justify-start">
                    <a href="{{ $homeContent->hero_primary_cta_url ?? route('materials.index') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#feb700] px-7 py-4 text-sm font-bold text-[#271900] shadow-[0_14px_24px_rgba(254,183,0,0.25)] transition hover:-translate-y-0.5 hover:bg-[#ffca35]">
                        {{ $homeContent->hero_primary_cta_label ?? 'Daftar Bimbel' }}
                        <span aria-hidden="true">→</span>
                    </a>
                    <a href="{{ $homeContent->hero_secondary_cta_url ?? '#program' }}" class="inline-flex items-center justify-center rounded-xl border-2 border-[#0043c6] bg-white/70 px-7 py-4 text-sm font-bold text-[#0043c6] transition hover:-translate-y-0.5 hover:bg-[#dce1ff]">
                        {{ $homeContent->hero_secondary_cta_label ?? 'Lihat Paket Belajar' }}
                    </a>
                </div>
            </div>

            <div class="relative mx-auto mt-4 hidden w-full max-w-[620px] justify-center md:flex md:max-w-[760px] lg:mt-0 lg:max-w-[980px] lg:-mr-16 lg:justify-self-end xl:-mr-24">
                <div class="absolute inset-x-0 bottom-0 mx-auto h-[86%] w-[94%] rounded-[3rem] bg-[radial-gradient(circle_at_50%_35%,rgba(255,255,255,0.92),rgba(220,225,255,0.68)_40%,rgba(220,225,255,0.18)_68%,transparent_100%)] blur-2xl"></div>
                <div class="absolute bottom-4 left-1/2 h-32 w-[84%] -translate-x-1/2 rounded-full bg-[#0043c6]/12 blur-3xl"></div>
                <div class="absolute left-10 top-8 h-28 w-28 rounded-full bg-[#feb700]/28 blur-3xl"></div>
                <img
                    src="{{ $homeContent->hero_image_path ? asset($homeContent->hero_image_path) : asset('images/no-bg-hero.png') }}"
                    alt="{{ $homeContent->hero_image_alt ?? 'Siswa Jago Belajar' }}"
                    class="relative z-10 w-[104%] max-w-none object-contain drop-shadow-[0_28px_34px_rgba(20,27,44,0.18)] sm:w-[108%] lg:w-[108%] lg:scale-125 lg:drop-shadow-[0_36px_44px_rgba(20,27,44,0.22)] xl:scale-[1.32]"
                >
            </div>
        </div>
    </section>

    <section id="keunggulan" class="bg-white py-12 sm:py-16">
        <div class="jb-container">
            <div class="text-center">
                <h2 class="text-2xl font-bold tracking-tight text-[#141b2c] sm:text-3xl">{{ $homeContent->feature_title ?? 'Kenapa Memilih Jago Belajar?' }}</h2>
                <div class="mx-auto mt-3 h-1 w-16 rounded-full bg-[#feb700]"></div>
            </div>

            <div class="mx-auto mt-8 grid max-w-5xl justify-items-center gap-5 sm:grid-cols-2 lg:mt-10 lg:grid-cols-3">
                @foreach (($featureItems ?: [
                    ['title' => 'Bimbel Online Interaktif', 'description' => 'Dibimbing tutor berpengalaman', 'icon' => 'chat', 'badge' => 'bg-rose-100 text-rose-500'],
                    ['title' => 'Materi Terstruktur', 'description' => 'Pahami materi mulai dari konsepnya', 'icon' => 'account_tree', 'badge' => 'bg-emerald-100 text-emerald-600'],
                    ['title' => 'Belajar Lebih Fokus', 'description' => 'Kelas dibatasi maksimal 10 siswa', 'icon' => 'center_focus_strong', 'badge' => 'bg-blue-100 text-blue-600'],
                    ['title' => 'Belajar Fleksibel', 'description' => 'Akses soal dan rekaman belajar kapan saja', 'icon' => 'schedule', 'badge' => 'bg-yellow-100 text-yellow-600'],
                    ['title' => 'Kualitas Terjamin', 'description' => 'Soal HOTS terupdate sesuai kerangka asesmen', 'icon' => 'stars', 'badge' => 'bg-indigo-100 text-indigo-600'],
                    ['title' => 'Try Out Terbaik', 'description' => 'Analisis hasil belajar & peringkat nasional', 'icon' => 'monitoring', 'badge' => 'bg-cyan-100 text-cyan-600'],
                ]) as $feature)
                    @php($title = $feature['title'])
                    @php($desc = $feature['description'])
                    @php($icon = $feature['icon'])
                    @php($tone = $feature['badge'])
                    <article class="w-full max-w-[320px] rounded-2xl bg-white p-5 text-center shadow-[0_8px_26px_rgba(20,27,44,0.08)] ring-1 ring-[#e9edff] transition hover:-translate-y-1">
                        <div class="mx-auto grid h-12 w-12 place-items-center rounded-xl {{ $tone }}">
                            @if ($icon === 'chat')
                                <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6.5A2.5 2.5 0 0 1 6.5 4h11A2.5 2.5 0 0 1 20 6.5v7A2.5 2.5 0 0 1 17.5 16H10l-4.5 4v-4.5A2.5 2.5 0 0 1 4 13.5z"/></svg>
                            @elseif ($icon === 'account_tree')
                                <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M6 5v14"/><path d="M6 12h5"/><path d="M11 12v-4"/><path d="M11 8h4"/><path d="M11 16h4"/><path d="M15 8v8"/><path d="M15 12h3"/><circle cx="6" cy="5" r="1.2"/><circle cx="6" cy="19" r="1.2"/><circle cx="11" cy="8" r="1.2"/><circle cx="15" cy="8" r="1.2"/><circle cx="15" cy="16" r="1.2"/><circle cx="18" cy="12" r="1.2"/></svg>
                            @elseif ($icon === 'center_focus_strong')
                                <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="5" width="14" height="14" rx="3"/><path d="M9 12h6"/><path d="M12 9v6"/></svg>
                            @elseif ($icon === 'schedule')
                                <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8"/><path d="M12 8v4l3 2"/><path d="M8 4V2"/><path d="M16 4V2"/></svg>
                            @elseif ($icon === 'stars')
                                <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3 1.9 4.7 5.1.4-3.9 3.3 1.2 5-4.3-2.8-4.3 2.8 1.2-5L5 8.1l5.1-.4Z"/><path d="m19 13 1 2.5 2.5.2-1.9 1.6.6 2.5-2.2-1.4-2.2 1.4.6-2.5-1.9-1.6 2.5-.2Z"/></svg>
                            @else
                                <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a7 7 0 0 1 7 7c0 4.2-4.2 8.3-6.2 10-.4.3-.8.3-1.2 0C9.7 18.3 5.5 14.2 5.5 10a6.5 6.5 0 0 1 6.5-7Z"/><circle cx="12" cy="10" r="2.2"/></svg>
                            @endif
                        </div>
                        <h3 class="mt-4 text-sm font-bold text-[#141b2c]">{{ $title }}</h3>
                        <p class="mt-2 text-xs leading-5 text-[#434655]">{{ $desc }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section id="program" class="bg-[#eef2ff] py-16">
        <div class="jb-container">
            <div class="text-center">
                <h2 class="text-2xl font-bold tracking-tight text-[#141b2c] sm:text-3xl">{{ $homeContent->program_title ?? 'Program Lengkap Jago Belajar' }}</h2>
                <p class="mt-2 text-[#434655]">{{ $homeContent->program_description ?? 'Semua kebutuhan belajarmu ada di sini!' }}</p>
            </div>

            <div class="mt-8 grid gap-6 md:grid-cols-2 lg:mt-10 lg:grid-cols-3">
                @foreach (($programCopy ?: [[
                    'title' => 'TRY OUT ONLINE',
                    'subtitle' => 'SD ? SMP ? SMA',
                    'border' => 'border-[#0043c6]',
                    'color' => 'text-[#0043c6]',
                    'background' => 'bg-[#dce1ff]',
                    'button' => 'Lihat Semua Try Out',
                    'points' => [
                        ['title' => 'TKA SD SMP SMA', 'description' => 'Taklukkan TKA dengan latihan soal'],
                        ['title' => 'UTS UAS SD SMP SMA', 'description' => 'Jadi juara kelas, perbanyak latihan soal'],
                        ['title' => 'OSN & UTBK', 'description' => 'Wujudkan mimpi dengan latihan soal'],
                    ],
                ], [
                    'title' => 'BIMBEL REGULER',
                    'subtitle' => 'SD ? SMP ? SMA',
                    'border' => 'border-emerald-500',
                    'color' => 'text-emerald-600',
                    'background' => 'bg-emerald-100',
                    'button' => 'Lihat Program Reguler',
                    'points' => [
                        ['title' => 'TKA SD SMP SMA', 'description' => 'Persiapkan TKA mulai dari konsep materi'],
                        ['title' => 'Matematika IPA B Inggris', 'description' => 'Jadi ambis kelas SD SMP SMA'],
                        ['title' => 'OSN SD Matematika', 'description' => 'Jadi jagoan OSN'],
                    ],
                ], [
                    'title' => 'PRIVAT ONLINE',
                    'subtitle' => 'INTENSIF & EKSKLUSIF',
                    'border' => 'border-[#4a36c4]',
                    'color' => 'text-[#4a36c4]',
                    'background' => 'bg-[#e4dfff]',
                    'button' => 'Lihat Program Privat',
                    'points' => [
                        ['title' => 'Tutor Berpengalaman', 'description' => 'Mentor dari PTN ternama'],
                        ['title' => 'Jadwal Fleksibel', 'description' => 'Atur sesuai waktu luangmu'],
                        ['title' => 'Materi Personal', 'description' => 'Sesuai kebutuhan spesifikmu'],
                    ],
                ]]) as $program)
                    @php($programPoints = $program['points'] ?? [['title' => 'TKA SD SMP SMA', 'description' => 'Taklukkan TKA dengan latihan soal'], ['title' => 'UTS UAS SD SMP SMA', 'description' => 'Jadi juara kelas, perbanyak latihan soal'], ['title' => 'OSN & UTBK', 'description' => 'Wujudkan mimpi dengan latihan soal']])
                    <article class="flex flex-col overflow-hidden rounded-2xl border-t-4 {{ $program['border'] ?? 'border-[#0043c6]' }} bg-white p-8 shadow-[0_10px_32px_rgba(20,27,44,0.08)] {{ $loop->iteration === 2 ? 'lg:-translate-y-2' : '' }}">
                        <h3 class="text-lg font-bold {{ $program['color'] ?? 'text-[#0043c6]' }}">{{ $program['title'] }}</h3>
                        <p class="mt-1 text-xs font-bold uppercase tracking-wider text-[#434655]">{{ $program['subtitle'] }}</p>
                        <ul class="mt-7 space-y-5">
                            @foreach ($programPoints as $point)
                                <li class="flex gap-3">
                                    <span class="grid h-9 w-9 shrink-0 place-items-center rounded-lg {{ $program['background'] ?? 'bg-[#dce1ff]' }} {{ $program['color'] ?? 'text-[#0043c6]' }}">
                                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <path d="M3 7.5 12 3l9 4.5-9 4.5z" />
                                            <path d="M7 10v4.8c0 1.2 2.2 2.7 5 2.7s5-1.5 5-2.7V10" />
                                            <path d="M21 8v6" />
                                            <path d="M21 14.5v.5" />
                                        </svg>
                                    </span>
                                    <span>
                                        <span class="block text-sm font-bold text-[#141b2c]">{{ $point['title'] }}</span>
                                        <span class="mt-1 block text-xs text-[#434655]">{{ $point['description'] }}</span>
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ $homeContent->hero_primary_cta_url ?? route('materials.index') }}" class="mt-8 inline-flex w-full items-center justify-center rounded-xl border-2 {{ $program['border'] ?? 'border-[#0043c6]' }} py-3 text-sm font-bold {{ $program['color'] ?? 'text-[#0043c6]' }} transition hover:bg-[#f1f3ff]">{{ $program['button'] ?? 'Lihat Program' }}</a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-[#f9f9ff] py-12 sm:py-16">
        <div class="jb-container">
            <div class="text-center">
                <h2 class="text-2xl font-bold tracking-tight text-[#141b2c] sm:text-3xl">{{ $homeContent->gallery_title ?? 'Dokumentasi JagoanBelajar Seru' }}</h2>
                <div class="mx-auto mt-3 h-1 w-16 rounded-full bg-[#feb700]"></div>
            </div>
            <div x-data="gallerySlider()" x-init="start()" @mouseenter="stop()" @mouseleave="start()" class="mt-8 lg:mt-10">
                <div class="relative overflow-hidden rounded-2xl">
                    <div class="flex transition-transform duration-700 ease-out" :style="`transform: translateX(-${active * 100}%);`">
                        @foreach (($galleryItems ?: [['label' => 'BIMBEL ONLINE', 'badge' => 'Live Class', 'image' => null], ['label' => 'TRY OUT', 'badge' => 'Premium', 'image' => null], ['label' => 'KELAS SERU', 'badge' => 'Interaktif', 'image' => null]]) as $item)
                            <div class="w-full shrink-0">
                                <div class="group overflow-hidden rounded-xl bg-[#141b2c] shadow-[0_12px_30px_rgba(20,27,44,0.12)]">
                                    <div class="relative aspect-[16/9] overflow-hidden">
                                        <img src="{{ !empty($item['image']) ? asset($item['image']) : asset('images/no-bg-hero.png') }}" alt="{{ $item['label'] }}" class="h-full w-full object-cover">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                                        <div class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1 text-xs font-bold text-[#141b2c]">{{ $item['badge'] }}</div>
                                        <div class="absolute inset-x-0 bottom-0 p-5 text-white">
                                            <p class="text-lg font-bold sm:text-xl">{{ $item['label'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button type="button" @click="prev()" class="absolute left-3 top-1/2 grid h-10 w-10 -translate-y-1/2 place-items-center rounded-full bg-white/85 text-[#141b2c] shadow transition hover:bg-white">&#10094;</button>
                    <button type="button" @click="next()" class="absolute right-3 top-1/2 grid h-10 w-10 -translate-y-1/2 place-items-center rounded-full bg-white/85 text-[#141b2c] shadow transition hover:bg-white">&#10095;</button>
                </div>
                <div class="mt-4 flex justify-center gap-2">
                    @foreach (($galleryItems ?: [1,2,3]) as $index => $item)
                        <button type="button" @click="goTo({{ $index }})" :class="active === {{ $index }} ? 'bg-[#0043c6] w-6' : 'bg-[#c3c5d8] w-2'" class="h-2 rounded-full transition-all"></button>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="testimoni" class="bg-[#f9f9ff] py-12 sm:py-16">
        <div class="jb-container">
            <div class="text-center">
                <h2 class="text-2xl font-bold tracking-tight text-[#141b2c] sm:text-3xl">{{ $homeContent->testimonials_title ?? 'Apa Kata Mereka?' }}</h2>
                <div class="mx-auto mt-3 h-1 w-16 rounded-full bg-[#feb700]"></div>
            </div>
            <div x-data="testimonialSlider()" x-init="start()" @mouseenter="stop()" @mouseleave="start()" class="mt-8 lg:mt-10">
                <div class="overflow-hidden rounded-2xl">
                    <div class="flex gap-5 transition-transform duration-700 ease-out" :style="trackStyle()">
                        @foreach (($testimonialItems ?: [['name' => 'Syafiq', 'role' => 'Siswa Jago Belajar', 'quote' => 'Matematika 70, B. Indonesia 86,67. Makasih atas bimbingannya!', 'image' => null], ['name' => 'Naufal', 'role' => 'Siswa Jago Belajar', 'quote' => 'Mtk n B. Indo semua 83,33. Terima kasih ilmunya kak!', 'image' => null], ['name' => 'Arnetta', 'role' => 'Siswa Jago Belajar', 'quote' => 'Untuk nilai mtk dan bindo nya sama 83.33. Worth mantapp nilainya!', 'image' => null]]) as $testimonial)
                            <article class="w-full shrink-0 md:w-[calc(50%-10px)] lg:w-[calc(33.333%-13.333px)] overflow-hidden rounded-2xl bg-white shadow-[0_10px_30px_rgba(20,27,44,0.08)] ring-1 ring-[#e9edff]">
                                <div class="relative aspect-[4/3] overflow-hidden bg-[#f1f3ff]">
                                    <img src="{{ !empty($testimonial['image']) ? asset($testimonial['image']) : asset('images/no-bg-hero.png') }}" alt="{{ $testimonial['name'] }}" class="h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
                                    <div class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1 text-xs font-bold text-[#141b2c]">Chat Screenshot</div>
                                    <div class="absolute bottom-4 left-4 rounded-full bg-[#0043c6] px-3 py-1 text-xs font-bold text-white">{{ $testimonial['name'] }}</div>
                                </div>
                                <div class="p-6">
                                    <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#64708b]">{{ $testimonial['role'] }}</p>
                                    <p class="mt-3 text-sm leading-7 text-[#434655]">&ldquo;{{ $testimonial['quote'] }}&rdquo;</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
                <div class="mt-4 flex items-center justify-center gap-2">
                    <button type="button" @click="prev()" class="grid h-9 w-9 place-items-center rounded-full border border-[#d9def1] bg-white text-[#141b2c] transition hover:bg-[#f6f8ff]">&#10094;</button>
                    <template x-for="dot in dotCount" :key="dot">
                        <button type="button" @click="goTo(dot - 1)" :class="active === dot - 1 ? 'bg-[#0043c6] w-6' : 'bg-[#c3c5d8] w-2'" class="h-2 rounded-full transition-all"></button>
                    </template>
                    <button type="button" @click="next()" class="grid h-9 w-9 place-items-center rounded-full border border-[#d9def1] bg-white text-[#141b2c] transition hover:bg-[#f6f8ff]">&#10095;</button>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#f9f9ff] py-12 sm:py-16">
        <div class="jb-container">
            <div class="overflow-hidden rounded-3xl bg-[radial-gradient(circle_at_80%_20%,rgba(30,90,240,0.95),transparent_32%),linear-gradient(135deg,#0043c6,#014fe6)] px-5 py-10 text-center text-white shadow-[0_18px_44px_rgba(0,67,198,0.25)] sm:px-8 sm:py-14">
                <h2 class="text-2xl font-extrabold tracking-tight sm:text-3xl">{{ $homeContent->cta_title ?? 'Siap Raih Skor Terbaikmu?' }}</h2>
                <p class="mx-auto mt-4 max-w-2xl text-sm leading-7 text-[#edf0ff]">{{ $homeContent->cta_description ?? 'Mulai perjalanan belajarmu bersama Jago Belajar sekarang juga!' }}</p>
                <div class="mt-8 flex flex-col justify-center gap-4 sm:flex-row">
                    <a href="{{ $homeContent->cta_primary_url ?? route('materials.index') }}" class="rounded-xl bg-[#feb700] px-8 py-4 text-sm font-bold text-[#271900] transition hover:-translate-y-0.5 hover:bg-[#ffca35]">{{ $homeContent->cta_primary_label ?? 'Daftar Bimbel Sekarang!' }}</a>
                    <a href="{{ $homeContent->cta_secondary_url ?? '#program' }}" class="rounded-xl border border-white/35 bg-white/10 px-8 py-4 text-sm font-bold text-white transition hover:-translate-y-0.5 hover:bg-white/20">{{ $homeContent->cta_secondary_label ?? 'Lihat Program Bimbel' }}</a>
                </div>
            </div>
        </div>
    </section>


<script>
    function gallerySlider() {
        return {
            active: 0,
            total: {{ count($galleryItems ?: [['label' => 'BIMBEL ONLINE'], ['label' => 'TRY OUT'], ['label' => 'KELAS SERU']]) }},
            timer: null,
            start() {
                this.stop();
                if (this.total < 2) return;
                this.timer = setInterval(() => this.next(), 3500);
            },
            stop() {
                if (this.timer) clearInterval(this.timer);
            },
            next() {
                this.active = (this.active + 1) % this.total;
            },
            prev() {
                this.active = (this.active - 1 + this.total) % this.total;
            },
            goTo(index) {
                this.active = index;
            },
        }
    }

    function testimonialSlider() {
        return {
            active: 0,
            total: {{ count($testimonialItems ?: [['name' => 'Syafiq'], ['name' => 'Naufal'], ['name' => 'Arnetta']]) }},
            visible() {
                if (window.innerWidth >= 1024) return 3;
                if (window.innerWidth >= 768) return 2;
                return 1;
            },
            get maxIndex() {
                return Math.max(0, this.total - this.visible());
            },
            get dotCount() {
                return this.maxIndex + 1;
            },
            timer: null,
            start() {
                this.stop();
                if (this.total <= this.visible()) return;
                this.timer = setInterval(() => this.next(), 4000);
                window.addEventListener('resize', () => {
                    if (this.active > this.maxIndex) this.active = this.maxIndex;
                }, { passive: true });
            },
            stop() {
                if (this.timer) clearInterval(this.timer);
            },
            next() {
                this.active = this.active >= this.maxIndex ? 0 : this.active + 1;
            },
            prev() {
                this.active = this.active <= 0 ? this.maxIndex : this.active - 1;
            },
            goTo(index) {
                this.active = index;
            },
            trackStyle() {
                const gap = 20;
                const itemWidth = (100 / this.visible());
                return `transform: translateX(calc(-${this.active * itemWidth}% - ${this.active * gap}px / ${this.visible()}));`;
            }
        }
    }
</script>
</x-layouts.public>



