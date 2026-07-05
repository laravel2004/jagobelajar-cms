<x-layouts.public :title="'Try Out - '.config('app.name')">
    <section class="bg-[#f9f9ff] py-12 sm:py-16">
        <div class="jb-container">
            <div class="max-w-2xl">
                <h1 class="text-3xl font-extrabold tracking-tight text-[#141b2c] sm:text-4xl">Try Out</h1>
                <p class="mt-3 text-sm leading-7 text-[#5f667d] sm:text-base">Pilih simulasi ujian sesuai jenjang, lengkap dengan jadwal pelaksanaan dan detail paket.</p>
            </div>

            <div class="mt-8 grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                @forelse ($examSessions as $examSession)
                    @php($hasPromo = $examSession->is_promo_active && $examSession->sale_price !== null && $examSession->sale_price < $examSession->price)
                    @php($displayPrice = $hasPromo ? $examSession->sale_price : $examSession->price)
                    <article class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]">
                        <div class="relative grid aspect-[16/9] place-items-center overflow-hidden bg-[radial-gradient(circle_at_75%_25%,rgba(254,183,0,0.55),transparent_30%),linear-gradient(135deg,#0043c6,#1e5af0)] text-white">
                            @if ($examSession->image_path)
                                <img src="{{ asset('storage/'.$examSession->image_path) }}" alt="{{ $examSession->title ?? $examSession->name }}" class="h-full w-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/35 via-transparent to-transparent"></div>
                            @else
                                <div class="absolute inset-0 bg-[radial-gradient(circle_at_25%_20%,rgba(255,255,255,0.22),transparent_24%),radial-gradient(circle_at_80%_18%,rgba(254,183,0,0.45),transparent_24%),linear-gradient(135deg,#0043c6,#1e5af0)]"></div>
                                <div class="relative flex flex-col items-center text-center">
                                    <span class="grid h-16 w-16 place-items-center rounded-2xl bg-white/15 text-2xl font-extrabold ring-1 ring-white/25 backdrop-blur">{{ strtoupper(substr($examSession->title ?? $examSession->name, 0, 2)) }}</span>
                                    <span class="mt-3 rounded-full bg-white/15 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.16em] ring-1 ring-white/20">Try Out</span>
                                </div>
                            @endif
                            <div class="absolute left-4 top-4 flex flex-col gap-2">
                                @if ($hasPromo)
                                    <span class="rounded-full bg-rose-500 px-3 py-1 text-xs font-bold text-white shadow-sm">Promo</span>
                                @endif
                                <span class="rounded-full bg-[#feb700] px-3 py-1 text-xs font-bold text-[#271900]">{{ $displayPrice > 0 ? 'Rp'.number_format($displayPrice, 0, ',', '.') : 'Gratis' }}</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#0043c6]">{{ optional($examSession->starts_at)->translatedFormat('l, d F Y') ?? '-' }}</p>
                            <h2 class="mt-3 text-xl font-extrabold text-[#141b2c]">{{ $examSession->title ?? $examSession->name }}</h2>
                            <p class="mt-3 text-sm leading-6 text-[#5f667d]">{{ \Illuminate\Support\Str::limit(strip_tags($examSession->description ?: 'Try out ini dirancang sebagai simulasi yang mendekati ujian sesungguhnya.'), 110) }}</p>
                            <div class="mt-4">
                                @if ($hasPromo)
                                    <div class="flex items-end gap-2">
                                        <span class="text-2xl font-extrabold text-rose-500">Rp{{ number_format($displayPrice, 0, ',', '.') }}</span>
                                        <span class="pb-0.5 text-sm text-[#8a93a8] line-through">Rp{{ number_format($examSession->price, 0, ',', '.') }}</span>
                                    </div>
                                    <p class="mt-1 text-xs font-bold uppercase tracking-[0.16em] text-rose-500">Hemat Rp{{ number_format($examSession->price - $displayPrice, 0, ',', '.') }}</p>
                                @else
                                    <p class="text-lg font-extrabold text-[#141b2c]">{{ $displayPrice > 0 ? 'Rp'.number_format($displayPrice, 0, ',', '.') : 'Gratis' }}</p>
                                @endif
                            </div>
                            <div class="mt-5 grid gap-3 text-sm text-[#434655]">
                                <div class="flex items-center justify-between rounded-2xl bg-[#f1f3ff] px-4 py-3"><span>Mapel</span><strong>{{ $examSession->subject ?? '-' }}</strong></div>
                                <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Jadwal</span><strong>{{ optional($examSession->starts_at)->format('H:i') ?? '-' }} - {{ optional($examSession->ends_at)->format('H:i') ?? '-' }}</strong></div>
                            </div>
                            <a href="{{ route('tryout.detail', $examSession->slug) }}" class="mt-6 inline-flex w-full justify-center rounded-2xl bg-[#feb700] px-5 py-3 text-sm font-extrabold text-[#271900] transition hover:bg-[#ffca35]">Lihat Detail</a>
                        </div>
                    </article>
                @empty
                    <div class="rounded-3xl bg-white p-8 text-sm text-[#64708b] ring-1 ring-[#e9edff] lg:col-span-3">Belum ada sesi ujian aktif.</div>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.public>
