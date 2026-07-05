<x-layouts.public :title="$bimbel->name.' - '.config('app.name')">
    @php($hasPromo = $bimbel->has_promo)
    @php($displayPrice = $bimbel->display_price)
    <section class="relative overflow-hidden bg-[#f9f9ff] py-12 sm:py-16">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_82%_12%,rgba(254,183,0,0.22),transparent_28%),radial-gradient(circle_at_12%_18%,rgba(30,90,240,0.16),transparent_32%)]"></div>
        <div class="jb-container relative">
            <a href="{{ route('bimbel.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-[#0043c6] transition hover:text-[#003ab1]">&larr; Kembali ke daftar bimbel</a>

            <div class="mt-6 grid gap-8 lg:grid-cols-[1fr_380px]">
                <article class="overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_50px_rgba(20,27,44,0.12)] ring-1 ring-[#e9edff]">
                    <div class="aspect-[16/7] overflow-hidden bg-[radial-gradient(circle_at_75%_25%,rgba(255,255,255,0.18),transparent_28%),linear-gradient(135deg,#0043c6,#1e5af0)]">
                        @if ($bimbel->image_path)
                            <img src="{{ asset('storage/'.$bimbel->image_path) }}" alt="{{ $bimbel->name }}" class="h-full w-full object-cover">
                        @endif
                    </div>

                    <div class="p-4 sm:p-6 lg:p-8">
                        @if ($hasPromo)
                            <span class="inline-flex rounded-full bg-rose-500 px-4 py-2 text-xs font-extrabold text-white">Promo Aktif</span>
                        @endif
                        <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-[#141b2c] sm:text-5xl">{{ $bimbel->name }}</h1>

                        <div class="mt-6 grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
                            @foreach ([['Jadwal', $bimbel->schedule ?: '-'], ['Metode', $bimbel->method ?: '-'], ['Level', $bimbel->level ?: '-']] as [$label, $value])
                                <div class="rounded-2xl bg-[#f1f3ff] p-4">
                                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#0043c6]">{{ $label }}</p>
                                    <p class="mt-2 text-lg font-extrabold text-[#141b2c]">{{ $value }}</p>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-8 rounded-3xl bg-[#fff8df] p-6 ring-1 ring-[#ffdea8]">
                            <h2 class="text-xl font-extrabold text-[#271900]">Alur Belajar</h2>
                            <div class="mt-5 grid gap-3 sm:grid-cols-3">
                                @foreach ([['1', 'Pilih paket'], ['2', 'Gabung grup'], ['3', 'Mulai belajar']] as [$number, $text])
                                    <div class="flex items-center gap-3 rounded-2xl bg-white/70 p-4">
                                        <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-[#feb700] text-sm font-extrabold text-[#271900]">{{ $number }}</span>
                                        <span class="text-sm font-bold text-[#271900]">{{ $text }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-8 border-t border-[#e9edff] pt-8">
                            <h2 class="text-2xl font-extrabold text-[#141b2c]">Deskripsi Bimbel</h2>
                            <p class="mt-4 text-sm leading-7 text-[#5f667d] sm:text-base">{{ $bimbel->description }}</p>
                        </div>
                    </div>
                </article>

                <aside class="h-fit rounded-[2rem] bg-white p-6 shadow-[0_18px_50px_rgba(20,27,44,0.12)] ring-1 ring-[#e9edff] lg:sticky lg:top-28">
                    <p class="text-sm font-bold text-[#0043c6]">Ringkasan Paket</p>
                    <h2 class="mt-2 text-2xl font-extrabold text-[#141b2c]">{{ $bimbel->short_label ?: 'Bimbel' }}</h2>
                    <div class="mt-5 grid gap-3 text-sm text-[#434655]">
                        @if ($hasPromo)
                            <div class="rounded-2xl bg-[#fff5f5] px-4 py-3 ring-1 ring-rose-100">
                                <p class="text-xs font-bold uppercase tracking-[0.16em] text-rose-500">Promo Bimbel</p>
                                <div class="mt-2 flex items-end justify-between gap-3">
                                    <div>
                                        <p class="text-xl font-extrabold text-rose-500">Rp{{ number_format($displayPrice, 0, ',', '.') }}</p>
                                        <p class="text-xs text-[#8a93a8] line-through">Rp{{ number_format($bimbel->price, 0, ',', '.') }}</p>
                                    </div>
                                    <span class="rounded-full bg-rose-500 px-3 py-1 text-xs font-bold text-white">Hemat Rp{{ number_format($bimbel->price - $displayPrice, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        @else
                            <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3 ring-1 ring-[#e9edff]"><span>Harga</span><strong>Rp{{ number_format($bimbel->price, 0, ',', '.') }}</strong></div>
                        @endif
                        <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3 ring-1 ring-[#e9edff]"><span>Jumlah Sesi</span><strong>{{ $bimbel->sessions_count ?: '-' }}</strong></div>
                        <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3 ring-1 ring-[#e9edff]"><span>Metode</span><strong>{{ $bimbel->method ?: '-' }}</strong></div>
                    </div>
                    <form method="POST" action="{{ route('bimbel.checkout', $bimbel) }}" class="mt-6">
                        @csrf
                        <button class="inline-flex w-full justify-center rounded-2xl bg-[#feb700] px-5 py-4 text-sm font-extrabold text-[#271900] shadow-[0_14px_24px_rgba(254,183,0,0.22)] transition hover:-translate-y-0.5 hover:bg-[#ffca35]">Daftar Sekarang</button>
                    </form>
                </aside>
            </div>
        </div>
    </section>
</x-layouts.public>
