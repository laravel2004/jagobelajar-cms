<x-layouts.public :title="'Bimbel - '.config('app.name')">
    @php
        $levels = collect($bimbels)->pluck('level')->filter()->unique()->values();
    @endphp
    <section class="bg-[#f9f9ff] py-12 sm:py-16">
        <div class="jb-container">
            <div class="max-w-2xl">
                <h1 class="text-3xl font-extrabold tracking-tight text-[#141b2c] sm:text-4xl">Bimbel</h1>
                <p class="mt-3 text-sm leading-7 text-[#5f667d] sm:text-base">Pilih paket bimbel yang sesuai dengan kebutuhan belajar, target nilai, dan ritme belajar siswa.</p>
            </div>

            <div class="mt-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div class="relative w-full sm:max-w-xs">
                    <input type="text" id="searchInput" placeholder="Cari paket bimbel..." class="w-full rounded-xl border border-gray-200 bg-white py-2.5 pl-10 pr-4 text-sm text-[#141b2c] shadow-sm outline-none transition focus:border-[#0043c6] focus:ring-1 focus:ring-[#0043c6]">
                    <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                @if($levels->isNotEmpty())
                <div class="flex flex-nowrap gap-2 overflow-x-auto pb-1 sm:pb-0 hide-scrollbar" id="levelFilters">
                    <button type="button" class="filter-btn active shrink-0 rounded-full bg-[#0043c6] px-4 py-2 text-sm font-semibold text-white transition" data-level="all">Semua</button>
                    @foreach ($levels as $level)
                        <button type="button" class="filter-btn shrink-0 rounded-full bg-[#f1f3ff] px-4 py-2 text-sm font-semibold text-[#0043c6] transition hover:bg-[#dce1ff]" data-level="{{ $level }}">{{ $level }}</button>
                    @endforeach
                </div>
                @endif
            </div>

            <div class="mt-8 grid gap-6 sm:grid-cols-2 xl:grid-cols-3" id="bimbelGrid">
                @forelse ($bimbels as $bimbel)
                    @php($hasPromo = $bimbel->has_promo)
                    <article class="bimbel-item overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]" data-name="{{ strtolower($bimbel->name) }}" data-level="{{ $bimbel->level }}">
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
                            <p class="mt-5 border-t border-[#e9edff] pt-5 text-sm leading-6 text-[#5f667d]">{!! nl2br(e(\Illuminate\Support\Str::limit($bimbel->description, 95))) !!}</p>
                            <a href="{{ route('bimbel.detail', $bimbel->slug) }}" class="mt-6 inline-flex w-full justify-center rounded-2xl bg-[#feb700] px-5 py-3 text-sm font-extrabold text-[#271900] transition hover:bg-[#ffca35]">Lihat Detail Bimbel</a>
                        </div>
                    </article>
                @empty
                    <div class="rounded-3xl bg-white p-6 text-sm text-[#5f667d] ring-1 ring-[#e9edff]">Belum ada paket bimbel.</div>
                @endforelse
            </div>
            <div id="noResults" class="hidden mt-8 rounded-3xl bg-white p-8 text-center text-sm text-[#5f667d] ring-1 ring-[#e9edff]">
                Tidak ada paket bimbel yang sesuai dengan pencarian Anda.
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchInput');
            const filterBtns = document.querySelectorAll('.filter-btn');
            const bimbelItems = document.querySelectorAll('.bimbel-item');
            const noResults = document.getElementById('noResults');
            const bimbelGrid = document.getElementById('bimbelGrid');

            let currentLevel = 'all';
            let currentSearch = '';

            function filterBimbels() {
                let visibleCount = 0;

                bimbelItems.forEach(item => {
                    const name = item.dataset.name || '';
                    const level = item.dataset.level || '';

                    const matchesSearch = name.includes(currentSearch);
                    const matchesLevel = currentLevel === 'all' || level === currentLevel;

                    if (matchesSearch && matchesLevel) {
                        item.style.display = 'block';
                        visibleCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });

                if (visibleCount === 0 && bimbelItems.length > 0) {
                    bimbelGrid.classList.add('hidden');
                    noResults.classList.remove('hidden');
                } else {
                    bimbelGrid.classList.remove('hidden');
                    noResults.classList.add('hidden');
                }
            }

            if (searchInput) {
                searchInput.addEventListener('input', (e) => {
                    currentSearch = e.target.value.toLowerCase();
                    filterBimbels();
                });
            }

            filterBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    // Update active state
                    filterBtns.forEach(b => {
                        b.classList.remove('bg-[#0043c6]', 'text-white', 'active');
                        b.classList.add('bg-[#f1f3ff]', 'text-[#0043c6]');
                    });
                    
                    e.currentTarget.classList.remove('bg-[#f1f3ff]', 'text-[#0043c6]');
                    e.currentTarget.classList.add('bg-[#0043c6]', 'text-white', 'active');

                    currentLevel = e.currentTarget.dataset.level;
                    filterBimbels();
                });
            });
        });
    </script>
</x-layouts.public>
