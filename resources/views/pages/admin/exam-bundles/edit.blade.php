<x-layouts.admin>
    <x-slot:title>
        Edit Paket Bundle: {{ $examBundle->name }}
    </x-slot:title>

    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Edit Paket Bundle</h2>
            <p class="text-sm text-gray-500">Atur tampilan dan informasi bundle untuk landing page.</p>
        </div>
        <a href="{{ route('admin.exam-bundles.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-600 hover:text-gray-900">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-6 rounded-lg bg-red-50 p-4 text-sm text-red-800 border border-red-200 flex items-start gap-3">
            <svg class="h-5 w-5 text-red-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.exam-bundles.update', $examBundle) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        @csrf
        @method('PUT')

        <div class="lg:col-span-2 space-y-6">
            <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2 border-gray-100">Informasi Dasar</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Nama/Judul Bundle Internal</label>
                        <input type="text" name="name" value="{{ old('name', $examBundle->name) }}" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Nama Tampil (Landing Page)</label>
                        <input type="text" name="title" value="{{ old('title', $examBundle->title) }}" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Slug URL</label>
                        <div class="flex items-center rounded-lg border border-gray-300 bg-gray-50 px-3 text-gray-500 text-sm">
                            <span>/tryout/bundle/</span>
                            <input type="text" name="slug" value="{{ old('slug', $examBundle->slug) }}" class="w-full bg-transparent p-2.5 outline-none font-mono" required>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Deskripsi Lengkap</label>
                        <textarea name="description" rows="5" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('description', $examBundle->description) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between mb-4 border-b pb-2 border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800">Sesi Ujian yang Termasuk</h3>
                    <span class="text-xs bg-blue-50 text-blue-700 px-2 py-1 rounded border border-blue-100 font-medium">{{ $examBundle->sessions->count() }} Terpilih</span>
                </div>
                <p class="text-sm text-gray-500 mb-4">Pilih sesi ujian apa saja yang akan didapatkan user ketika membeli bundle ini.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 max-h-[400px] overflow-y-auto p-2 border border-gray-200 rounded-lg bg-gray-50">
                    @foreach ($allSessions as $session)
                        <label class="flex items-start gap-3 p-3 bg-white border border-gray-200 rounded-lg cursor-pointer hover:bg-blue-50 transition">
                            <input type="checkbox" name="session_ids[]" value="{{ $session->id }}" class="mt-1 w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500" {{ (collect(old('session_ids', $examBundle->sessions->pluck('id')))->contains($session->id)) ? 'checked' : '' }}>
                            <div>
                                <p class="text-sm font-medium text-gray-900 leading-tight">{{ $session->title ?? $session->name }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ $session->slug }}</p>
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2 border-gray-100">Pengaturan Publikasi</h3>

                <div class="space-y-4">
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Status Publikasi</label>
                        <select name="status" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                            <option value="draft" {{ old('status', $examBundle->status) === 'draft' ? 'selected' : '' }}>Draft (Disembunyikan)</option>
                            <option value="active" {{ old('status', $examBundle->status) === 'active' ? 'selected' : '' }}>Active (Bisa Dibeli)</option>
                            <option value="inactive" {{ old('status', $examBundle->status) === 'inactive' ? 'selected' : '' }}>Inactive (Ditutup)</option>
                        </select>
                        <p class="text-xs text-gray-500 mt-1.5">Untuk status Active, Anda wajib mengisi deskripsi dan cover banner.</p>
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Urutan Tampil (Sort Order)</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $examBundle->sort_order) }}" min="0" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <p class="text-xs text-gray-500 mt-1">Makin kecil nilainya, makin awal tampil (0 paling atas).</p>
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Banner / Cover Bundle</label>
                        @if ($examBundle->image_path)
                            <div class="mb-2 overflow-hidden rounded-lg border border-gray-200">
                                <img src="{{ Storage::url($examBundle->image_path) }}" alt="{{ $examBundle->title }}" class="w-full h-auto object-cover max-h-48">
                            </div>
                        @endif
                        <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:rounded-full file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-blue-700 hover:file:bg-blue-100">
                        <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG. Rekomendasi: 1200x630px.</p>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2 border-gray-100">Harga & Promo</h3>

                <div class="space-y-4">
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Harga Normal (Rp)</label>
                        <input type="number" name="price" value="{{ old('price', $examBundle->price) }}" min="0" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                    </div>

                    <label class="flex items-center gap-2 cursor-pointer mt-4 p-3 bg-gray-50 border border-gray-200 rounded-lg">
                        <input type="checkbox" name="is_promo_active" value="1" {{ old('is_promo_active', $examBundle->is_promo_active) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <span class="text-sm font-medium text-gray-700">Aktifkan Harga Promo</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer mt-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg">
                        <input type="checkbox" name="is_free_package_active" value="1" {{ old('is_free_package_active', $examBundle->is_free_package_active) ? 'checked' : '' }} class="w-4 h-4 text-emerald-600 rounded border-emerald-300 focus:ring-emerald-500">
                        <span class="text-sm font-medium text-emerald-700">Aktifkan Paket Gratis</span>
                    </label>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Harga Promo (Rp)</label>
                        <input type="number" name="sale_price" value="{{ old('sale_price', $examBundle->sale_price) }}" min="0" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>
                </div>
            </div>



            <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-6 py-3 text-sm font-bold text-white shadow-md hover:bg-blue-700 transition">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" /></svg>
                Simpan Perubahan
            </button>
        </div>
    </form>
</x-layouts.admin>
