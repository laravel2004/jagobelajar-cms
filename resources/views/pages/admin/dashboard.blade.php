<x-layouts.admin :title="'Dashboard - '.config('app.name')">
    <section class="rounded-[1.75rem] border border-[#d9def1] bg-white p-6 shadow-[0_18px_50px_rgba(20,27,44,0.06)] sm:p-8">
        <div class="grid gap-6 lg:grid-cols-[1fr_auto] lg:items-center">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#0043c6]">Overview</p>
                <h2 class="mt-2 text-2xl font-semibold tracking-tight text-[#141b2c] sm:text-3xl">Kelola konten Jago Belajar</h2>
                <p class="mt-3 max-w-2xl text-sm leading-7 text-[#64708b]">Fokus ke bimbel, blog, tryout, dan konten utama website dari satu dashboard.</p>
            </div>
            <a href="{{ route('home') }}" class="inline-flex justify-center rounded-xl bg-[#0043c6] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#003ab1]">Lihat Website</a>
        </div>
    </section>

    <section class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
        @foreach ([
            ['Total Bimbel', $stats['bimbels'] ?? 0, 'bg-[#eef3ff] text-[#0043c6]'],
            ['Total Blog', $stats['blogs'] ?? 0, 'bg-[#fff8df] text-[#7c5800]'],
            ['Total Sesi Ujian', $stats['exam_sessions'] ?? 0, 'bg-[#edf8f2] text-[#1c9b5e]'],
            ['Sesi Aktif', $stats['published_exam_sessions'] ?? 0, 'bg-[#f1efff] text-[#4a36c4]'],
        ] as [$label, $value, $color])
            <article class="rounded-2xl border border-[#e6eaf5] bg-white p-5 shadow-[0_12px_30px_rgba(20,27,44,0.04)]">
                <div class="flex items-center justify-between gap-4">
                    <p class="text-sm font-medium text-[#64708b]">{{ $label }}</p>
                    <span class="grid h-9 w-9 place-items-center rounded-xl {{ $color }} text-xs font-bold">{{ Str::substr($label, 0, 1) }}</span>
                </div>
                <p class="mt-5 text-3xl font-semibold tracking-tight text-[#141b2c]">{{ $value }}</p>
            </article>
        @endforeach
    </section>

    <section class="mt-6 grid gap-6 lg:grid-cols-[1fr_340px]">
        <div class="rounded-2xl border border-[#e6eaf5] bg-white p-5 shadow-[0_12px_30px_rgba(20,27,44,0.04)] sm:p-6">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <h3 class="text-lg font-semibold text-[#141b2c]">Aktivitas Konten</h3>
                    <p class="mt-1 text-sm text-[#64708b]">Ringkasan area admin yang aktif dipakai sekarang.</p>
                </div>
                <span class="rounded-full bg-[#f1f3ff] px-3 py-1 text-xs font-semibold text-[#0043c6]">Hari ini</span>
            </div>
            <div class="mt-5 divide-y divide-[#edf0f7]">
                @foreach ([['CMS Bimbel aktif', 'Kelola paket bimbel dan harga promo'], ['CMS Blog aktif', 'Kelola artikel blog publik'], ['Sesi ujian aktif', 'Update draft dan publish tryout']] as [$title, $desc])
                    <div class="flex items-center justify-between gap-4 py-4 first:pt-0 last:pb-0">
                        <div>
                            <p class="text-sm font-semibold text-[#141b2c]">{{ $title }}</p>
                            <p class="mt-1 text-xs text-[#8a93a8]">{{ $desc }}</p>
                        </div>
                        <span class="h-2 w-2 rounded-full bg-[#0043c6]"></span>
                    </div>
                @endforeach
            </div>
        </div>

        <aside class="rounded-2xl border border-[#e6eaf5] bg-white p-5 shadow-[0_12px_30px_rgba(20,27,44,0.04)] sm:p-6">
            <h3 class="text-lg font-semibold text-[#141b2c]">Aksi Cepat</h3>
            <p class="mt-1 text-sm text-[#64708b]">Shortcut admin yang masih dipakai.</p>
            <div class="mt-5 grid gap-3">
                <a href="{{ route('admin.bimbel.index') }}" class="rounded-xl bg-[#f6f8ff] px-4 py-3 text-sm font-semibold text-[#0043c6] transition hover:bg-[#eef3ff]">Kelola Bimbel</a>
                <a href="{{ route('admin.blogs.index') }}" class="rounded-xl bg-[#fffaf0] px-4 py-3 text-sm font-semibold text-[#7c5800] transition hover:bg-[#fff2c7]">Kelola Blog</a>
                <a href="{{ route('admin.exam-sessions.index') }}" class="rounded-xl bg-[#f0faf5] px-4 py-3 text-sm font-semibold text-[#1c9b5e] transition hover:bg-[#e8f7ef]">Kelola Sesi Ujian</a>
            </div>
        </aside>
    </section>
</x-layouts.admin>
