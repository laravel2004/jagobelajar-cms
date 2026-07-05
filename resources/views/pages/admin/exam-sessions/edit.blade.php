<x-layouts.admin :title="'Edit Sesi Ujian - '.config('app.name')">
    <form method="POST" action="{{ route('admin.exam-sessions.update', $examSession) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <section class="overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5]">
            <div class="relative bg-[radial-gradient(circle_at_85%_10%,rgba(254,183,0,0.35),transparent_28%),linear-gradient(135deg,#0b2f8f,#0043c6_48%,#1e5af0)] p-6 text-white sm:p-8">
                <a href="{{ route('admin.exam-sessions.index') }}" class="inline-flex text-sm font-bold text-white/80 transition hover:text-white">&larr; Kembali</a>
                <div class="mt-5 grid gap-6 lg:grid-cols-[1fr_320px] lg:items-end">
                    <div>
                        <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-bold uppercase tracking-[0.2em] ring-1 ring-white/20">Edit Tryout Detail</span>
                        <h2 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">{{ $examSession->title ?? $examSession->name }}</h2>
                        <p class="mt-3 text-sm leading-7 text-white/80">Field di bawah mengikuti card dan detail yang tampil di halaman publik `/tryout`.</p>
                    </div>
                    <div class="rounded-3xl bg-white/12 p-4 ring-1 ring-white/20 backdrop-blur">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-white/70">Source irt-quiz</p>
                        <p class="mt-2 font-bold">{{ $examSession->name }}</p>
                        <p class="mt-1 text-sm text-white/75">{{ $examSession->subject ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </section>

        @if ($errors->any())
            <div class="rounded-2xl bg-rose-50 px-4 py-3 text-sm font-medium text-rose-700 ring-1 ring-rose-100">{{ $errors->first() }}</div>
        @endif

        <div class="grid gap-6 xl:grid-cols-[1.35fr_0.8fr]">
            <section class="rounded-[2rem] bg-white p-5 shadow-[0_14px_45px_rgba(20,27,44,0.06)] ring-1 ring-[#e6eaf5] sm:p-6">
                <div>
                    <h3 class="text-lg font-extrabold text-[#141b2c]">Konten Publik</h3>
                    <p class="text-sm text-[#8a93a8]">Ini yang muncul di card `/tryout` dan halaman detail tryout.</p>
                </div>

                <div class="mt-5 grid gap-4 md:grid-cols-2">
                    <label class="md:col-span-2">
                        <span class="mb-2 block text-sm font-bold text-[#141b2c]">Judul Tryout</span>
                        <input name="title" value="{{ old('title', $examSession->title) }}" class="w-full rounded-2xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Contoh: Try Out TKA SD Paket 1">
                    </label>

                    <label class="md:col-span-2">
                        <span class="mb-2 block text-sm font-bold text-[#141b2c]">Slug Detail</span>
                        <input name="slug" value="{{ old('slug', $examSession->slug) }}" class="w-full rounded-2xl border-[#d9def1] px-4 py-3 text-sm" placeholder="try-out-tka-sd-paket-1">
                    </label>

                    <label>
                        <span class="mb-2 block text-sm font-bold text-[#141b2c]">Harga Normal</span>
                        <input name="price" type="number" value="{{ old('price', $examSession->price) }}" class="w-full rounded-2xl border-[#d9def1] px-4 py-3 text-sm" placeholder="0">
                    </label>

                    <label>
                        <span class="mb-2 block text-sm font-bold text-[#141b2c]">Harga Promo</span>
                        <input name="sale_price" type="number" value="{{ old('sale_price', $examSession->sale_price) }}" class="w-full rounded-2xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Opsional">
                    </label>

                    <label class="rounded-2xl bg-[#f9f9ff] p-4 ring-1 ring-[#e6eaf5]">
                        <span class="flex items-center justify-between gap-3 text-sm font-bold text-[#141b2c]">
                            Aktifkan Harga Promo Premium
                            <input type="checkbox" name="is_promo_active" value="1" @checked(old('is_promo_active', $examSession->is_promo_active)) class="h-5 w-5 rounded border-[#d9def1] text-[#0043c6]">
                        </span>
                        <span class="mt-2 block text-xs leading-5 text-[#8a93a8]">Jika aktif, harga paket premium memakai harga promo.</span>
                    </label>

                    <label class="rounded-2xl bg-[#f9f9ff] p-4 ring-1 ring-[#e6eaf5]">
                        <span class="flex items-center justify-between gap-3 text-sm font-bold text-[#141b2c]">
                            Aktifkan Paket Gratis
                            <input type="checkbox" name="is_free_package_active" value="1" @checked(old('is_free_package_active', $examSession->is_free_package_active)) class="h-5 w-5 rounded border-[#d9def1] text-[#0043c6]">
                        </span>
                        <span class="mt-2 block text-xs leading-5 text-[#8a93a8]">Jika aktif, detail tryout menampilkan tombol gratis dan premium sekaligus.</span>
                    </label>

                    <label>
                        <span class="mb-2 block text-sm font-bold text-[#141b2c]">Status Publish</span>
                        <select name="status" class="w-full rounded-2xl border-[#d9def1] px-4 py-3 text-sm">
                            @foreach (['draft' => 'Draft', 'active' => 'Active / Tampil', 'inactive' => 'Inactive / Sembunyi'] as $value => $label)
                                <option value="{{ $value }}" @selected(old('status', $examSession->status) === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </label>

                    <label>
                        <span class="mb-2 block text-sm font-bold text-[#141b2c]">Urutan Card</span>
                        <input name="sort_order" type="number" value="{{ old('sort_order', $examSession->sort_order) }}" class="w-full rounded-2xl border-[#d9def1] px-4 py-3 text-sm" placeholder="0">
                    </label>

                    <label class="md:col-span-2">
                        <span class="mb-2 block text-sm font-bold text-[#141b2c]">Deskripsi Detail</span>
                        <textarea name="description" rows="8" class="w-full rounded-2xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Deskripsi yang tampil di detail tryout">{{ old('description', $examSession->description) }}</textarea>
                    </label>

                    <label class="md:col-span-2">
                        <span class="mb-2 block text-sm font-bold text-[#141b2c]">Gambar Card & Detail</span>
                        <input type="file" name="image" accept="image/*" class="w-full rounded-2xl border border-dashed border-[#d9def1] px-4 py-3 text-sm">
                    </label>
                </div>
            </section>

            <aside class="space-y-6">
                <section class="overflow-hidden rounded-[2rem] bg-white shadow-[0_14px_45px_rgba(20,27,44,0.06)] ring-1 ring-[#e6eaf5]">
                    <div class="relative aspect-[16/9] bg-[radial-gradient(circle_at_75%_25%,rgba(254,183,0,0.55),transparent_30%),linear-gradient(135deg,#0043c6,#1e5af0)]">
                        @if ($examSession->image_path)
                            <img src="{{ asset('storage/'.$examSession->image_path) }}" alt="{{ $examSession->title }}" class="h-full w-full object-cover">
                        @else
                            <div class="grid h-full w-full place-items-center text-white"><span class="rounded-2xl bg-white/15 px-5 py-3 text-3xl font-extrabold ring-1 ring-white/25">{{ strtoupper(substr($examSession->title ?? $examSession->name, 0, 3)) }}</span></div>
                        @endif
                    </div>
                    <div class="p-5">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#0043c6]">Preview Card</p>
                        <h3 class="mt-2 text-xl font-extrabold text-[#141b2c]">{{ old('title', $examSession->title) }}</h3>
                        <p class="mt-2 line-clamp-2 text-sm leading-6 text-[#5f667d]">{{ old('description', $examSession->description) ?: 'Belum ada deskripsi.' }}</p>
                    </div>
                </section>

                <section class="rounded-[2rem] bg-white p-5 shadow-[0_14px_45px_rgba(20,27,44,0.06)] ring-1 ring-[#e6eaf5]">
                    <h3 class="text-lg font-extrabold text-[#141b2c]">Data Jadwal dari irt-quiz</h3>
                    <div class="mt-4 grid gap-3 text-sm text-[#434655]">
                        <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Mata Pelajaran</span><strong>{{ $examSession->subject ?? '-' }}</strong></div>
                        <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Tanggal</span><strong>{{ optional($examSession->starts_at)->format('d M Y') ?? '-' }}</strong></div>
                        <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Mulai</span><strong>{{ optional($examSession->starts_at)->format('H:i') ?? '-' }}</strong></div>
                        <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>Selesai</span><strong>{{ optional($examSession->ends_at)->format('H:i') ?? '-' }}</strong></div>
                        <div class="flex items-center justify-between rounded-2xl bg-[#f9f9ff] px-4 py-3"><span>External ID</span><strong>{{ $examSession->external_id }}</strong></div>
                    </div>
                </section>

                <button class="w-full rounded-2xl bg-[#0043c6] px-5 py-4 text-sm font-extrabold text-white shadow-[0_14px_28px_rgba(0,67,198,0.24)] transition hover:-translate-y-0.5 hover:bg-[#003ab1]">Simpan Perubahan</button>
            </aside>
        </div>
    </form>
</x-layouts.admin>

