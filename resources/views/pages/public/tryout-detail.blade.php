<x-layouts.public :title="($examSession->title ?? $examSession->name).' - '.config('app.name')">
<div x-data="{ openFree: false }">
    @php($hasPromo = $examSession->is_promo_active && $examSession->sale_price !== null && $examSession->sale_price < $examSession->price)
    @php($displayPrice = $examSession->is_promo_active && $examSession->sale_price !== null ? $examSession->sale_price : $examSession->price)
    <section class="relative overflow-hidden bg-[#f9f9ff] py-12 sm:py-16">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_82%_12%,rgba(254,183,0,0.25),transparent_28%),radial-gradient(circle_at_12%_18%,rgba(30,90,240,0.18),transparent_32%)]"></div>
        <div class="jb-container relative">
            <a href="{{ route('tryout.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-[#0043c6] transition hover:text-[#003ab1]">&larr; Kembali ke Try Out</a>

            @if (session('status'))
                <div class="mt-4 rounded-2xl bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700 ring-1 ring-emerald-100">{{ session('status') }}</div>
            @endif
            @if ($errors->any())
                <div class="mt-4 rounded-2xl bg-rose-50 px-4 py-3 text-sm font-medium text-rose-700 ring-1 ring-rose-100">{{ $errors->first() }}</div>
            @endif

            <div class="mt-6 grid gap-8 lg:grid-cols-[1.5fr_0.9fr] lg:items-start">
                <article class="overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_50px_rgba(20,27,44,0.12)] ring-1 ring-[#e9edff]">
                    <div class="relative aspect-[16/7] bg-[radial-gradient(circle_at_75%_25%,rgba(254,183,0,0.55),transparent_30%),linear-gradient(135deg,#0043c6,#1e5af0)]">
                        @if ($examSession->image_path)
                            <img src="{{ asset('storage/'.$examSession->image_path) }}" alt="{{ $examSession->title ?? $examSession->name }}" class="h-full w-full object-cover">
                        @else
                            <div class="grid h-full w-full place-items-center text-white">
                                <span class="rounded-2xl bg-white/15 px-5 py-3 text-4xl font-extrabold ring-1 ring-white/25">{{ strtoupper(substr($examSession->title ?? $examSession->name, 0, 3)) }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-4 sm:p-6 lg:p-8">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#0043c6]">{{ optional($examSession->starts_at)->translatedFormat('l, d F Y') ?? '-' }}</p>
                        <h1 class="mt-3 text-3xl font-extrabold tracking-tight text-[#141b2c] sm:text-4xl">{{ $examSession->title ?? $examSession->name }}</h1>
                        <p class="mt-4 text-sm leading-7 text-[#5f667d] sm:text-base">{{ $examSession->description ?: 'Try out ini dirancang sebagai simulasi yang mendekati ujian sesungguhnya, sehingga siswa dapat mengukur kesiapan belajar dengan lebih jujur dan terstruktur.' }}</p>

                        <div class="mt-6 grid gap-3 text-sm text-[#434655] grid-cols-1 sm:grid-cols-2">
                            <div class="flex items-center justify-between rounded-2xl bg-[#f1f3ff] px-4 py-3"><span>Mapel</span><strong>{{ $examSession->subject ?? '-' }}</strong></div>
                            <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Tanggal Mulai</span><strong>{{ optional($examSession->starts_at)->translatedFormat('d M Y') ?? '-' }}</strong></div>
                            <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Jam Mulai</span><strong>{{ optional($examSession->starts_at)->format('H:i') ?? '-' }}</strong></div>
                            <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Tanggal Selesai</span><strong>{{ optional($examSession->ends_at)->translatedFormat('d M Y') ?? '-' }}</strong></div>
                            <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Jam Selesai</span><strong>{{ optional($examSession->ends_at)->format('H:i') ?? '-' }}</strong></div>
                            <div class="rounded-2xl bg-[#fff5f5] px-4 py-3 sm:col-span-2">
                                <div class="flex items-center justify-between gap-4">
                                    <span>Harga</span>
                                    <div class="text-right">
                                        @if ($hasPromo)
                                            <p class="text-lg font-extrabold text-rose-500">Rp{{ number_format($displayPrice, 0, ',', '.') }}</p>
                                            <p class="text-xs text-[#8a93a8] line-through">Rp{{ number_format($examSession->price, 0, ',', '.') }}</p>
                                        @else
                                            <p class="text-lg font-extrabold text-[#141b2c]">{{ $displayPrice > 0 ? 'Rp'.number_format($displayPrice, 0, ',', '.') : 'Gratis' }}</p>
                                        @endif
                                    </div>
                                </div>
                                @if ($hasPromo)
                                    <p class="mt-2 text-xs font-bold uppercase tracking-[0.16em] text-rose-500">Promo aktif - Hemat Rp{{ number_format($examSession->price - $displayPrice, 0, ',', '.') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </article>

                <aside class="h-fit rounded-[2rem] bg-white p-6 shadow-[0_18px_50px_rgba(20,27,44,0.12)] ring-1 ring-[#e9edff] lg:sticky lg:top-28">
                    <p class="text-sm font-bold text-[#0043c6]">Ringkasan Paket</p>
                    <h2 class="mt-2 text-2xl font-extrabold text-[#141b2c]">{{ $examSession->title ?? $examSession->name }}</h2>
                    <div class="mt-5 grid gap-3 text-sm text-[#434655]">
                        @if ($hasPromo)
                            <div class="rounded-2xl bg-[#fff5f5] px-4 py-3 ring-1 ring-rose-100">
                                <p class="text-xs font-bold uppercase tracking-[0.16em] text-rose-500">Promo Premium</p>
                                <div class="mt-2 flex items-end justify-between gap-3">
                                    <div>
                                        <p class="text-xl font-extrabold text-rose-500">Rp{{ number_format($displayPrice, 0, ',', '.') }}</p>
                                        <p class="text-xs text-[#8a93a8] line-through">Rp{{ number_format($examSession->price, 0, ',', '.') }}</p>
                                    </div>
                                    <span class="rounded-full bg-rose-500 px-3 py-1 text-xs font-bold text-white">Hemat Rp{{ number_format($examSession->price - $displayPrice, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        @endif
                        <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3 ring-1 ring-[#e9edff]"><span>Tanggal Mulai</span><strong>{{ optional($examSession->starts_at)->format('d M Y') ?? '-' }}</strong></div>
                        <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3 ring-1 ring-[#e9edff]"><span>Tanggal Selesai</span><strong>{{ optional($examSession->ends_at)->format('d M Y') ?? '-' }}</strong></div>
                    </div>
                    <div class="mt-6 grid gap-3 sm:grid-cols-1">
                        @if ($examSession->is_free_package_active)
                            <button type="button" @click="openFree = true" class="inline-flex w-full justify-center rounded-2xl bg-emerald-500 px-5 py-4 text-sm font-extrabold text-white shadow-[0_14px_24px_rgba(16,185,129,0.22)] transition hover:-translate-y-0.5 hover:bg-emerald-600">Daftar Paket Gratis</button>
                        @endif
                        <form method="POST" action="{{ route('tryout.checkout', $examSession) }}">
                            @csrf
                            <button class="inline-flex w-full justify-center rounded-2xl bg-[#feb700] px-5 py-4 text-sm font-extrabold text-[#271900] shadow-[0_14px_24px_rgba(254,183,0,0.22)] transition hover:-translate-y-0.5 hover:bg-[#ffca35]">Daftar Paket Premium</button>
                        </form>
                    </div>
                    <p class="mt-4 text-center text-xs leading-5 text-[#737687]">Admin bisa lengkapi harga, gambar, dan deskripsi di dashboard sebelum publish.</p>
                </aside>
            </div>
        </div>

        <div x-cloak x-show="openFree" class="fixed inset-0 z-[9999] flex items-center justify-center px-4" @keydown.escape.window="openFree = false">
            <div class="absolute inset-0 bg-[#141b2c]/60 backdrop-blur-sm" @click="openFree = false"></div>
            <div class="relative w-full max-w-lg rounded-[2rem] bg-white p-6 shadow-[0_20px_60px_rgba(20,27,44,0.22)] ring-1 ring-[#e6eaf5]">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#0043c6]">Konfirmasi Pendaftaran</p>
                        <h3 class="mt-2 text-2xl font-extrabold text-[#141b2c]">Daftar Paket Gratis?</h3>
                    </div>
                    <button type="button" @click="openFree = false" class="text-[#8a93a8] transition hover:text-[#141b2c]">&larr;</button>
                </div>
                <div class="mt-6 flex gap-3">
                    <button type="button" @click="openFree = false" class="inline-flex flex-1 justify-center rounded-2xl border border-[#d9def1] bg-white px-5 py-3 text-sm font-bold text-[#0043c6]">Batal</button>
                    <form method="POST" action="{{ route('tryout.free-register', $examSession) }}" class="flex-1">
                        @csrf
                        <button class="inline-flex w-full justify-center rounded-2xl bg-[#0043c6] px-5 py-3 text-sm font-bold text-white">Ya, Daftarkan</button>
                    </form>
                </div>
            </div>
        </div>
</div>
</x-layouts.public>

