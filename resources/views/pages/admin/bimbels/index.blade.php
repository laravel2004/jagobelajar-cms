<x-layouts.admin :title="'Bimbel - '.config('app.name')">
    <div class="space-y-6">
        @if (session('status'))
            <div class="rounded-2xl bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700 ring-1 ring-emerald-100">{{ session('status') }}</div>
        @endif

        <section class="overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5]">
            <div class="relative bg-[radial-gradient(circle_at_85%_10%,rgba(254,183,0,0.35),transparent_28%),linear-gradient(135deg,#0b2f8f,#0043c6_48%,#1e5af0)] p-6 text-white sm:p-8">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-bold uppercase tracking-[0.2em] ring-1 ring-white/20">CMS Module</span>
                        <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">Bimbel</h1>
                        <p class="mt-3 max-w-2xl text-sm leading-7 text-white/80">Kelola paket bimbel yang tampil di halaman publik.</p>
                    </div>
                    <a href="{{ route('admin.bimbel.create') }}" class="inline-flex items-center justify-center rounded-2xl bg-[#feb700] px-5 py-3 text-sm font-extrabold text-[#271900] transition hover:bg-[#ffca35]">Tambah Bimbel</a>
                </div>
            </div>

            <div class="divide-y divide-[#e9edff]">
                @forelse ($bimbels as $bimbel)
                    <div class="flex flex-col gap-4 p-4 sm:p-6 md:flex-row md:items-center md:justify-between">
                        <div class="flex min-w-0 items-start gap-4">
                            @if ($bimbel->image_path)
                                <img src="{{ asset('storage/'.$bimbel->image_path) }}" alt="{{ $bimbel->name }}" class="h-20 w-28 rounded-2xl object-cover ring-1 ring-[#e9edff]">
                            @else
                                <div class="grid h-20 w-28 place-items-center rounded-2xl bg-[#f1f3ff] text-xs font-bold text-[#0043c6] ring-1 ring-[#e9edff]">No Image</div>
                            @endif
                            <div class="min-w-0">
                                <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#8a93a8]">{{ $bimbel->status }}</p>
                                <h2 class="mt-1 text-xl font-extrabold text-[#141b2c]">{{ $bimbel->name }}</h2>
                                <p class="mt-2 max-w-3xl text-sm leading-6 text-[#5f667d]">{{ $bimbel->description }}</p>
                                <p class="mt-2 text-sm text-[#434655]">Harga: <strong>{{ $bimbel->has_promo ? 'Rp'.number_format($bimbel->display_price, 0, ',', '.') : 'Rp'.number_format($bimbel->price, 0, ',', '.') }}</strong></p>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('admin.bimbel.edit', $bimbel) }}" class="rounded-xl bg-[#f1f3ff] px-4 py-2 text-sm font-bold text-[#0043c6]">Edit</a>
                            <form method="POST" action="{{ route('admin.bimbel.destroy', $bimbel) }}" onsubmit="return confirm('Hapus bimbel ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="rounded-xl bg-rose-50 px-4 py-2 text-sm font-bold text-rose-600">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="p-6 text-sm text-[#5f667d]">Belum ada bimbel.</div>
                @endforelse
            </div>
        </section>

        {{ $bimbels->links() }}
    </div>
</x-layouts.admin>
