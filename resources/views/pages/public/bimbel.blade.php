<x-layouts.public :title="'Bimbel - '.config('app.name')">
    <section class="bg-[#f9f9ff] py-12 sm:py-16">
        <div class="jb-container">
            <div class="max-w-2xl">
                <h1 class="text-3xl font-extrabold tracking-tight text-[#141b2c] sm:text-4xl">Bimbel</h1>
                <p class="mt-3 text-sm leading-7 text-[#5f667d] sm:text-base">Pilih paket bimbel yang sesuai dengan kebutuhan belajar, target nilai, dan ritme belajar siswa.</p>
            </div>
            <div class="mt-8 grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                @forelse ($bimbels as $bimbel)
                    @php($hasPromo = $bimbel->has_promo)
                    <article class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]">
                        <div class="aspect-[16/9] overflow-hidden bg-[radial-gradient(circle_at_75%_25%,rgba(255,255,255,0.18),transparent_28%),linear-gradient(135deg,#0043c6,#1e5af0)]">
                            @if ($bimbel->image_path)
                                <img src="{{ asset('storage/'.$bimbel->image_path) }}" alt="{{ $bimbel->name }}" class="h-full w-full object-cover">
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="flex flex-wrap items-center gap-2">
                                <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#0043c6]">{{ $bimbel->short_label ?: 'Paket Bimbel' }}</p>
                                @if ($hasPromo)
                                    <span class="rounded-full bg-rose-500 px-3 py-1 text-xs font-bold text-white">Promo</span>
                                @endif
                            </div>
                            <h2 class="mt-3 text-xl font-extrabold text-[#141b2c]">{{ $bimbel->name }}</h2>
                            <div class="mt-5 grid gap-3 text-sm text-[#434655]">
                                <div class="flex items-center justify-between rounded-2xl bg-[#f1f3ff] px-4 py-3"><span>Jadwal</span><strong>{{ $bimbel->schedule ?: '-' }}</strong></div>
                                <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Metode</span><strong>{{ $bimbel->method ?: '-' }}</strong></div>
                                <div class="rounded-2xl bg-[#f9f9ff] px-4 py-3">
                                    <div class="flex items-center justify-between gap-3">
                                        <span>Harga</span>
                                        <div class="text-right">
                                            @if ($hasPromo)
                                                <p class="text-base font-extrabold text-rose-500">Rp{{ number_format($bimbel->display_price, 0, ',', '.') }}</p>
                                                <p class="text-xs text-[#8a93a8] line-through">Rp{{ number_format($bimbel->price, 0, ',', '.') }}</p>
                                            @else
                                                <p class="text-base font-extrabold text-[#141b2c]">Rp{{ number_format($bimbel->price, 0, ',', '.') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-5 border-t border-[#e9edff] pt-5 text-sm leading-6 text-[#5f667d]">{{ \Illuminate\Support\Str::limit($bimbel->description, 95) }}</p>
                            <a href="{{ route('bimbel.detail', $bimbel->slug) }}" class="mt-6 inline-flex w-full justify-center rounded-2xl bg-[#feb700] px-5 py-3 text-sm font-extrabold text-[#271900] transition hover:bg-[#ffca35]">Lihat Detail Bimbel</a>
                        </div>
                    </article>
                @empty
                    <div class="rounded-3xl bg-white p-6 text-sm text-[#5f667d] ring-1 ring-[#e9edff]">Belum ada paket bimbel.</div>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.public>
