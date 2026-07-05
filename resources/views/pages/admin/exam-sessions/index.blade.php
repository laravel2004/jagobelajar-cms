<x-layouts.admin :title="'Sesi Ujian - '.config('app.name')">
    <div class="space-y-6">
        <section class="overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5]">
            <div class="relative bg-[radial-gradient(circle_at_85%_10%,rgba(254,183,0,0.35),transparent_28%),linear-gradient(135deg,#0b2f8f,#0043c6_48%,#1e5af0)] p-6 text-white sm:p-8">
                <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-black/10 to-transparent"></div>
                <div class="relative flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                    <div class="max-w-2xl">
                        <span class="inline-flex rounded-full bg-white/15 px-3 py-1 text-xs font-bold uppercase tracking-[0.2em] ring-1 ring-white/20">Admin Module</span>
                        <h2 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">Sesi Ujian</h2>
                        <p class="mt-3 text-sm leading-7 text-white/80">Ambil sesi dari irt-quiz, simpan sebagai draft, lalu lengkapi konten sebelum tampil di halaman tryout.</p>
                    </div>
                    <form method="POST" action="{{ route('admin.exam-sessions.fetch') }}">
                        @csrf
                        <button class="inline-flex items-center justify-center rounded-2xl bg-[#feb700] px-5 py-3 text-sm font-extrabold text-[#271900] shadow-[0_16px_32px_rgba(254,183,0,0.28)] transition hover:-translate-y-0.5 hover:bg-[#ffca35]">
                            Fetch Data
                        </button>
                    </form>
                </div>
            </div>
            <div class="grid gap-px bg-[#e9edff] grid-cols-1 sm:grid-cols-2 xl:grid-cols-4">
                <div class="bg-white p-5"><p class="text-xs font-bold uppercase tracking-[0.18em] text-[#8a93a8]">Total Sesi</p><p class="mt-2 text-3xl font-extrabold text-[#141b2c]">{{ $examSessions->count() }}</p></div>
                <div class="bg-white p-5"><p class="text-xs font-bold uppercase tracking-[0.18em] text-[#8a93a8]">Published</p><p class="mt-2 text-3xl font-extrabold text-emerald-600">{{ $examSessions->where('status', 'active')->count() }}</p></div>
                <div class="bg-white p-5"><p class="text-xs font-bold uppercase tracking-[0.18em] text-[#8a93a8]">Draft</p><p class="mt-2 text-3xl font-extrabold text-amber-500">{{ $examSessions->where('status', 'draft')->count() }}</p></div>
                <div class="bg-white p-5"><p class="text-xs font-bold uppercase tracking-[0.18em] text-[#8a93a8]">Inactive</p><p class="mt-2 text-3xl font-extrabold text-slate-500">{{ $examSessions->where('status', 'inactive')->count() }}</p></div>
            </div>
        </section>

        @if (session('status'))
            <div class="rounded-2xl bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700 ring-1 ring-emerald-100">{{ session('status') }}</div>
        @endif
        @if ($errors->any())
            <div class="rounded-2xl bg-rose-50 px-4 py-3 text-sm font-medium text-rose-700 ring-1 ring-rose-100">{{ $errors->first() }}</div>
        @endif

        <section class="rounded-[2rem] bg-white p-4 shadow-[0_14px_45px_rgba(20,27,44,0.06)] ring-1 ring-[#e6eaf5] sm:p-5">
            <div class="mb-5 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-lg font-extrabold text-[#141b2c]">Daftar Sesi</h3>
                    <p class="text-sm text-[#8a93a8]">Urut berdasarkan tanggal mulai terbaru dari irt-quiz.</p>
                </div>
                <span class="rounded-full bg-[#f1f3ff] px-4 py-2 text-xs font-bold uppercase tracking-[0.16em] text-[#0043c6]">{{ $examSessions->count() }} Item</span>
            </div>

            <div class="overflow-hidden rounded-3xl border border-[#e6eaf5]">
                <div class="hidden grid-cols-[1.45fr_1fr_1fr_0.8fr_0.7fr] gap-4 bg-[#f9f9ff] px-5 py-3 text-xs font-bold uppercase tracking-[0.16em] text-[#8a93a8] xl:grid">
                    <span>Sesi</span>
                    <span>Jadwal</span>
                    <span>Mata Pelajaran</span>
                    <span>Harga</span>
                    <span class="text-right">Aksi</span>
                </div>

                <div class="divide-y divide-[#e6eaf5]">
                    @forelse ($examSessions as $examSession)
                        @php($statusClass = ['active' => 'bg-emerald-50 text-emerald-700 ring-emerald-100', 'draft' => 'bg-amber-50 text-amber-700 ring-amber-100', 'inactive' => 'bg-slate-100 text-slate-600 ring-slate-200'][$examSession->status] ?? 'bg-slate-100 text-slate-600 ring-slate-200')
                        <article class="grid gap-4 bg-white p-5 transition hover:bg-[#fbfcff] xl:grid-cols-[1.45fr_1fr_1fr_0.8fr_0.7fr] xl:items-center">
                            <div class="flex gap-4">
                                <div class="relative h-16 w-16 shrink-0 overflow-hidden rounded-2xl bg-[linear-gradient(135deg,#0043c6,#1e5af0)] shadow-sm">
                                    @if ($examSession->image_path)
                                        <img src="{{ asset('storage/'.$examSession->image_path) }}" alt="{{ $examSession->title ?? $examSession->name }}" class="h-full w-full object-cover">
                                    @else
                                        <div class="grid h-full w-full place-items-center text-sm font-extrabold text-white">{{ strtoupper(substr($examSession->title ?? $examSession->name, 0, 2)) }}</div>
                                    @endif
                                </div>
                                <div class="min-w-0">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <h4 class="truncate text-base font-extrabold text-[#141b2c]">{{ $examSession->title ?? $examSession->name }}</h4>
                                        <span class="rounded-full px-2.5 py-1 text-[11px] font-bold ring-1 {{ $statusClass }}">{{ ucfirst($examSession->status) }}</span>
                                    </div>
                                    <p class="mt-1 truncate text-sm text-[#8a93a8]">Source: {{ $examSession->name }}</p>
                                    <p class="mt-2 line-clamp-1 text-sm text-[#5f667d]">{{ $examSession->description ?: 'Belum ada deskripsi. Lengkapi sebelum publish.' }}</p>
                                </div>
                            </div>

                            <div class="rounded-2xl bg-[#f9f9ff] px-4 py-3 text-sm text-[#434655] ring-1 ring-[#edf0ff] xl:bg-transparent xl:px-0 xl:ring-0">
                                <p class="font-bold text-[#141b2c]">{{ optional($examSession->starts_at)->translatedFormat('d M Y') ?? '-' }}</p>
                                <p class="mt-1 text-xs text-[#8a93a8]">{{ optional($examSession->starts_at)->format('H:i') ?? '-' }} - {{ optional($examSession->ends_at)->format('H:i') ?? '-' }} WIB</p>
                            </div>

                            <div class="text-sm text-[#434655]">
                                <span class="inline-flex rounded-full bg-[#f1f3ff] px-3 py-1.5 text-xs font-bold text-[#0043c6]">{{ $examSession->subject ?? 'Belum ada mapel' }}</span>
                            </div>

                            <div class="text-sm">
                                <p class="font-extrabold text-[#141b2c]">Rp{{ number_format($examSession->sale_price ?? $examSession->price, 0, ',', '.') }}</p>
                                @if ($examSession->sale_price)
                                    <p class="text-xs text-[#8a93a8] line-through">Rp{{ number_format($examSession->price, 0, ',', '.') }}</p>
                                @endif
                            </div>

                            <div class="flex justify-end">
                                <a href="{{ route('admin.exam-sessions.edit', $examSession) }}" class="inline-flex items-center justify-center rounded-2xl bg-[#141b2c] px-4 py-2.5 text-sm font-bold text-white transition hover:-translate-y-0.5 hover:bg-[#0043c6]">Edit</a>
                            </div>
                        </article>
                    @empty
                        <div class="p-10 text-center">
                            <div class="mx-auto grid h-14 w-14 place-items-center rounded-2xl bg-[#f1f3ff] text-2xl">&#8635;</div>
                            <h4 class="mt-4 font-extrabold text-[#141b2c]">Belum ada sesi ujian</h4>
                            <p class="mt-2 text-sm text-[#8a93a8]">Klik Fetch Data untuk mengambil sesi dari irt-quiz.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
</x-layouts.admin>

