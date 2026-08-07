<x-layouts.admin>
    <x-slot:title>
        Tambah Paket Bundle Baru
    </x-slot:title>

    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Tambah Paket Bundle</h2>
            <p class="text-sm text-gray-500">Buat bundle baru dengan menggabungkan beberapa sesi ujian.</p>
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

    <form action="{{ route('admin.exam-bundles.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        @csrf

        <div class="lg:col-span-2 space-y-6">
            <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2 border-gray-100">Informasi Dasar</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Nama/Judul Bundle Internal</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Nama Tampil (Landing Page)</label>
                        <input type="text" id="input-title" name="title" value="{{ old('title') }}" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Slug URL</label>
                        <div class="flex items-center rounded-lg border border-gray-300 bg-gray-50 px-3 text-gray-500 text-sm">
                            <span>/tryout/bundle/</span>
                            <input type="text" id="input-slug" name="slug" value="{{ old('slug') }}" class="w-full bg-transparent p-2.5 outline-none font-mono" required>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Deskripsi Lengkap</label>
                        <textarea name="description" rows="5" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between mb-4 border-b pb-2 border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800">Sesi Ujian yang Termasuk</h3>
                </div>
                <p class="text-sm text-gray-500 mb-4">Pilih sesi ujian apa saja yang akan didapatkan user ketika membeli bundle ini.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 max-h-[400px] overflow-y-auto p-2 border border-gray-200 rounded-lg bg-gray-50">
                    @foreach ($allSessions as $session)
                        <label class="flex items-start gap-3 p-3 bg-white border border-gray-200 rounded-lg cursor-pointer hover:bg-blue-50 transition">
                            <input type="checkbox" name="session_ids[]" value="{{ $session->id }}" class="mt-1 w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500" {{ in_array($session->id, old('session_ids', [])) ? 'checked' : '' }}>
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
                            <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft (Disembunyikan)</option>
                            <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active (Bisa Dibeli)</option>
                            <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive (Ditutup)</option>
                        </select>
                        <p class="text-xs text-gray-500 mt-1.5">Untuk status Active, Anda wajib mengisi deskripsi dan cover banner.</p>
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Urutan Tampil (Sort Order)</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <p class="text-xs text-gray-500 mt-1">Makin kecil nilainya, makin awal tampil (0 paling atas).</p>
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Banner / Cover Bundle</label>
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
                        <input type="number" name="price" value="{{ old('price', 0) }}" min="0" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                    </div>

                    <label class="flex items-center gap-2 cursor-pointer mt-4 p-3 bg-gray-50 border border-gray-200 rounded-lg">
                        <input type="checkbox" name="is_promo_active" value="1" {{ old('is_promo_active') ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <span class="text-sm font-medium text-gray-700">Aktifkan Harga Promo</span>
                    </label>

                    <div x-data="{ isFreePackageActive: {{ old('is_free_package_active') ? 'true' : 'false' }} }">
                        <label class="flex items-center gap-2 cursor-pointer mt-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg">
                            <input type="checkbox" name="is_free_package_active" value="1" x-model="isFreePackageActive" class="w-4 h-4 text-emerald-600 rounded border-emerald-300 focus:ring-emerald-500">
                            <span class="text-sm font-medium text-emerald-700">Aktifkan Paket Gratis</span>
                        </label>

                        <div x-show="isFreePackageActive" x-transition class="mt-3 p-4 bg-white border border-emerald-100 rounded-lg shadow-sm grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">Tanggal Mulai Gratis</label>
                                <input type="datetime-local" name="free_package_start_date" value="{{ old('free_package_start_date') }}" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500">
                                @error('free_package_start_date') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">Tanggal Berakhir Gratis</label>
                                <input type="datetime-local" name="free_package_end_date" value="{{ old('free_package_end_date') }}" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500">
                                @error('free_package_end_date') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Harga Promo (Rp)</label>
                        <input type="number" name="sale_price" value="{{ old('sale_price') }}" min="0" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-6 py-3 text-sm font-bold text-white shadow-md hover:bg-blue-700 transition">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                Tambah Bundle
            </button>
        </div>
    </form>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const titleInput = document.getElementById('input-title');
            const slugInput = document.getElementById('input-slug');
            
            if (titleInput && slugInput) {
                titleInput.addEventListener('input', function () {
                    let slug = titleInput.value
                        .toLowerCase()
                        .replace(/[^\w\s-]/g, '') // Remove non-word chars
                        .replace(/[\s_-]+/g, '-') // Swap spaces and underscores for hyphens
                        .replace(/^-+|-+$/g, ''); // Trim hyphens from start/end
                    slugInput.value = slug;
                });
            }
        });
    </script>
    @endpush
</x-layouts.admin>
