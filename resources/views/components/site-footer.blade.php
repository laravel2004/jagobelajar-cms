@php($footerContent = \App\Models\HomePageContent::query()->first() ?? new \App\Models\HomePageContent())
<footer class="border-t border-[#e9edff] bg-white">
    <div class="jb-container py-12">
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-[1.4fr_1fr_1fr]">
            <div>
                <a href="{{ route('home') }}" class="inline-flex">
                    <img src="{{ $footerContent->footer_logo_path ? asset($footerContent->footer_logo_path) : asset('images/logo.png') }}" alt="Jago Belajar" class="h-16 w-auto md:h-24" />
                </a>
                <p class="mt-4 max-w-md text-sm leading-6 text-[#6a7085]">{{ $footerContent->footer_description ?: 'Platform belajar untuk membantu siswa Indonesia belajar lebih terarah, latihan lebih konsisten, dan siap menghadapi ujian dengan percaya diri.' }}</p>
                <div class="mt-6 flex flex-col gap-3 text-sm sm:flex-row sm:flex-wrap">
                    <a href="{{ $footerContent->footer_primary_url ?: route('materials.index') }}" class="inline-flex justify-center rounded-full bg-[#0043c6] px-4 py-2 font-semibold text-white transition hover:bg-[#003ab1]">{{ $footerContent->footer_primary_label ?: 'Mulai Belajar' }}</a>
                    <a href="{{ $footerContent->footer_secondary_url ?: route('forum.index') }}" class="inline-flex justify-center rounded-full border border-[#d9def1] px-4 py-2 font-semibold text-[#40465a] transition hover:border-[#0043c6] hover:text-[#0043c6]">{{ $footerContent->footer_secondary_label ?: 'Gabung Forum' }}</a>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-bold uppercase tracking-[0.18em] text-[#0043c6]">{{ $footerContent->footer_menu_title ?: 'Menu' }}</h3>
                <ul class="mt-4 space-y-3 text-sm text-[#5f667d]">
                    @foreach (($footerContent->footer_menu_items ?: [['label' => 'Keunggulan','url' => '/#keunggulan'],['label' => 'Try Out','url' => '/materi'],['label' => 'Forum Diskusi','url' => '/forum'],['label' => 'Testimoni','url' => '/#testimoni']]) as $item)
                        <li><a href="{{ $item['url'] }}" class="transition hover:text-[#0043c6]">{{ $item['label'] }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-bold uppercase tracking-[0.18em] text-[#0043c6]">{{ $footerContent->footer_contact_title ?: 'Kontak' }}</h3>
                <ul class="mt-4 space-y-3 text-sm text-[#5f667d]">
                    @foreach (($footerContent->footer_contact_items ?: ['Instagram: @jagobelajar', 'Email: halo@jagobelajar.id', 'WhatsApp: +62 812-3456-7890']) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="mt-10 flex flex-col gap-3 border-t border-[#e9edff] pt-6 text-sm text-[#737687] md:flex-row md:items-center md:justify-between">
            <p>{{ str_replace(':year', date('Y'), $footerContent->footer_copyright ?: '? :year Jago Belajar. Semua hak dilindungi.') }}</p>
            <p>{{ $footerContent->footer_tagline ?: 'Belajar lebih mudah, hasil lebih maksimal.' }}</p>
        </div>
    </div>
</footer>
