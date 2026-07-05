<x-layouts.admin :title="($bimbel->exists ? 'Edit Bimbel' : 'Tambah Bimbel').' - '.config('app.name')">
    <form method="POST" enctype="multipart/form-data" action="{{ $bimbel->exists ? route('admin.bimbel.update', $bimbel) : route('admin.bimbel.store') }}" class="space-y-6">
        @csrf
        @if ($bimbel->exists)
            @method('PUT')
        @endif

        <section class="rounded-[2rem] bg-white p-4 shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5] sm:p-6 lg:p-8 space-y-5">
            <div class="grid gap-5 lg:grid-cols-[1fr_320px]">
                <div class="space-y-5">
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Nama Bimbel</label>
                        <input name="name" value="{{ old('name', $bimbel->name) }}" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm">
                        @error('name') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Slug</label>
                        <input name="slug" value="{{ old('slug', $bimbel->slug) }}" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="kosongkan untuk auto">
                        @error('slug') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Deskripsi</label>
                        <textarea name="description" rows="5" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm">{{ old('description', $bimbel->description) }}</textarea>
                        @error('description') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="space-y-5 rounded-3xl bg-[#f9f9ff] p-5 ring-1 ring-[#e6eaf5]">
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Upload Gambar</label>
                        @if ($bimbel->image_path)
                            <img src="{{ asset('storage/'.$bimbel->image_path) }}" alt="{{ $bimbel->name }}" class="mt-3 aspect-video w-full rounded-2xl object-cover">
                        @endif
                        <input type="file" name="image" accept="image/*" class="mt-3 w-full rounded-xl border border-[#d9def1] bg-white px-4 py-3 text-sm">
                        @error('image') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Label Singkat</label>
                        <input name="short_label" value="{{ old('short_label', $bimbel->short_label) }}" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Live Zoom">
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Level</label>
                        <input name="level" value="{{ old('level', $bimbel->level) }}" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="SD - SMP">
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Jadwal</label>
                        <input name="schedule" value="{{ old('schedule', $bimbel->schedule) }}" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="2x per minggu">
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Metode</label>
                        <input name="method" value="{{ old('method', $bimbel->method) }}" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="Live Zoom">
                    </div>
                    <div>
                        <label class="text-sm font-bold text-[#141b2c]">Jumlah Sesi</label>
                        <input type="number" name="sessions_count" value="{{ old('sessions_count', $bimbel->sessions_count) }}" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" min="1">
                    </div>
                </div>
            </div>

            <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
                <div>
                    <label class="text-sm font-bold text-[#141b2c]">Harga Normal</label>
                    <input type="number" name="price" value="{{ old('price', $bimbel->price ?: 0) }}" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" min="0">
                </div>
                <div>
                    <label class="text-sm font-bold text-[#141b2c]">Harga Promo</label>
                    <input type="number" name="sale_price" value="{{ old('sale_price', $bimbel->sale_price) }}" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" min="0">
                </div>
                <div>
                    <label class="text-sm font-bold text-[#141b2c]">Link Grup WA</label>
                    <input name="grup_wa" value="{{ old('grup_wa', $bimbel->grup_wa) }}" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm" placeholder="https://chat.whatsapp.com/...">
                </div>
            </div>

            <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
                <label class="flex items-center gap-3 text-sm font-bold text-[#141b2c]"><input type="checkbox" name="is_promo_active" value="1" @checked(old('is_promo_active', $bimbel->is_promo_active ?? false))> Aktifkan Promo</label>
                <div>
                    <label class="text-sm font-bold text-[#141b2c]">Status</label>
                    <select name="status" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm">
                        @foreach (['draft' => 'Draft', 'active' => 'Active', 'inactive' => 'Inactive'] as $value => $label)
                            <option value="{{ $value }}" @selected(old('status', $bimbel->status ?: 'draft') === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-sm font-bold text-[#141b2c]">Urutan</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $bimbel->sort_order ?: 0) }}" class="mt-2 w-full rounded-xl border-[#d9def1] px-4 py-3 text-sm">
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.bimbel.index') }}" class="rounded-2xl bg-[#f1f3ff] px-6 py-3 text-sm font-extrabold text-[#0043c6]">Batal</a>
                <button class="rounded-2xl bg-[#0043c6] px-6 py-3 text-sm font-extrabold text-white">Simpan</button>
            </div>
        </section>
    </form>
</x-layouts.admin>
