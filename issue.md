# Issue: Tambah Field `jenjang` pada Paket Bundle, Sesi Ujian, dan Filter Try Out

**Prioritas:** Medium
**Estimasi:** 3-5 jam
**Target:** Junior Developer / AI Model

---

## Ringkasan

Tambahkan field `jenjang` (jenjang pendidikan: SD, SMP, SMA, dll.) ke dua entitas utama — **Paket Bundle** (`exam_bundles`) dan **Sesi Ujian** (`exam_sessions`) — agar konten dapat dikategorikan berdasarkan jenjang. Selanjutnya, tampilkan filter dan search berdasarkan `jenjang` di halaman publik **Try Out** (`/tryout`), mirip dengan yang sudah ada di halaman **Bimbel** (`/bimbel`).

---

## Referensi Kode yang Perlu Dipahami Sebelum Implementasi

Sebelum mulai, **baca dan pahami** file-file berikut:

| File | Keterangan |
|---|---|
| `app/Models/ExamBundle.php` | Model Paket Bundle |
| `app/Models/ExamSession.php` | Model Sesi Ujian |
| `app/Models/Bimbel.php` | Referensi: field `level` di sini mirip dengan `jenjang` yang akan dibuat |
| `app/Http/Controllers/AdminExamBundleController.php` | Controller admin bundle (store & update) |
| `app/Http/Controllers/AdminExamSessionController.php` | Controller admin sesi ujian (update) |
| `app/Http/Controllers/PublicPageController.php` | Controller halaman publik (method `tryout()` dan `bimbel()`) |
| `resources/views/pages/admin/exam-bundles/create.blade.php` | Form create bundle |
| `resources/views/pages/admin/exam-bundles/edit.blade.php` | Form edit bundle |
| `resources/views/pages/admin/exam-sessions/edit.blade.php` | Form edit sesi ujian |
| `resources/views/pages/public/tryout.blade.php` | Halaman publik tryout (akan ditambahkan filter) |
| `resources/views/pages/public/bimbel.blade.php` | **REFERENSI UTAMA** untuk filter & search — salin polanya |

---

## Nilai yang Dipakai untuk `jenjang`

Gunakan nilai string berikut (konsisten di seluruh codebase):

```
'SD', 'SMP', 'SMA', 'TKA', 'OSN', 'Umum'
```

> **Catatan:** Lihat model `Bimbel.php` — field `level` di sana menggunakan string bebas.
> Untuk `jenjang` di ExamBundle dan ExamSession, **gunakan dropdown/select** dengan opsi tetap
> agar konsisten dan bisa difilter dengan tepat.

---

## Tahapan Implementasi

---

### Tahap 1 — Migrasi Database

**Tujuan:** Tambah kolom `jenjang` ke dua tabel: `exam_bundles` dan `exam_sessions`.

**Yang harus dilakukan:**

1. Buat file migrasi baru untuk `exam_bundles`:
```
php artisan make:migration add_jenjang_to_exam_bundles_table
```

2. Isi method `up()` dan `down()` migrasi `exam_bundles`:
```php
public function up(): void
{
    Schema::table('exam_bundles', function (Blueprint $table) {
        $table->string('jenjang')->nullable()->after('name');
    });
}

public function down(): void
{
    Schema::table('exam_bundles', function (Blueprint $table) {
        $table->dropColumn('jenjang');
    });
}
```

3. Buat file migrasi baru untuk `exam_sessions`:
```
php artisan make:migration add_jenjang_to_exam_sessions_table
```

4. Isi method `up()` dan `down()` migrasi `exam_sessions`:
```php
public function up(): void
{
    Schema::table('exam_sessions', function (Blueprint $table) {
        $table->string('jenjang')->nullable()->after('name');
    });
}

public function down(): void
{
    Schema::table('exam_sessions', function (Blueprint $table) {
        $table->dropColumn('jenjang');
    });
}
```

5. Jalankan migrasi:
```
php artisan migrate
```

---

### Tahap 2 — Update Model

**Tujuan:** Daftarkan field `jenjang` ke dalam `$fillable` di kedua model.

**File: `app/Models/ExamBundle.php`**

Tambahkan `'jenjang'` ke dalam array `$fillable` (letakkan setelah `'name'`):
```php
protected $fillable = [
    'external_id', 'name', 'jenjang', 'slug', 'title', 'description', 'image_path',
    'price', 'sale_price', 'is_promo_active', 'is_free_package_active',
    'free_package_start_date', 'free_package_end_date', 'status', 'sort_order',
    'source_updated_at', 'last_fetched_at', 'published_at',
];
```

**File: `app/Models/ExamSession.php`**

Tambahkan `'jenjang'` ke dalam array `$fillable` (letakkan setelah `'name'`):
```php
protected $fillable = [
    'external_id', 'source_code', 'source_slug', 'name', 'jenjang', 'subject',
    'starts_at', 'ends_at', 'source_updated_at', 'last_fetched_at',
    'slug', 'title', 'description', 'image_path', 'price', 'sale_price',
    'is_promo_active', 'is_free_package_active', 'status', 'published_at', 'sort_order',
];
```

---

### Tahap 3 — Update Controller Admin: Paket Bundle

**File: `app/Http/Controllers/AdminExamBundleController.php`**

**A. Method `store()` — tambahkan validasi dan simpan `jenjang`:**

Di dalam `$request->validate([...])`, tambahkan baris baru:
```php
'jenjang' => ['nullable', 'string', 'in:SD,SMP,SMA,TKA,OSN,Umum'],
```

Di dalam array `ExamBundle::create([...])`, tambahkan baris baru:
```php
'jenjang' => $validated['jenjang'] ?? null,
```

**B. Method `update()` — lakukan perubahan yang sama persis:**

Di dalam `$request->validate([...])`, tambahkan:
```php
'jenjang' => ['nullable', 'string', 'in:SD,SMP,SMA,TKA,OSN,Umum'],
```

Di dalam array `$examBundle->update([...])`, tambahkan:
```php
'jenjang' => $validated['jenjang'] ?? null,
```

---

### Tahap 4 — Update Controller Admin: Sesi Ujian

**File: `app/Http/Controllers/AdminExamSessionController.php`**

**Method `update()` — tambahkan validasi dan simpan `jenjang`:**

Di dalam `$request->validate([...])`, tambahkan:
```php
'jenjang' => ['nullable', 'string', 'in:SD,SMP,SMA,TKA,OSN,Umum'],
```

Di dalam array `$examSession->update([...])`, tambahkan:
```php
'jenjang' => $validated['jenjang'] ?? null,
```

> **Catatan:** Sesi ujian tidak punya method `store()` di admin karena datanya diambil via
> `fetch()` dari endpoint eksternal irt-quiz. Hanya `update()` yang perlu diubah.

---

### Tahap 5 — Update View Admin: Form Create Paket Bundle

**File: `resources/views/pages/admin/exam-bundles/create.blade.php`**

Tambahkan field `jenjang` di dalam section **"Informasi Dasar"** (div dengan class `rounded-xl border`),
setelah field `name` (Nama/Judul Bundle Internal), di dalam `<div class="grid grid-cols-1 md:grid-cols-2 gap-4">`.

Sisipkan HTML berikut:
```html
<div>
    <label class="mb-1 block text-sm font-medium text-gray-700">Jenjang Pendidikan</label>
    <select name="jenjang" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
        <option value="">-- Pilih Jenjang --</option>
        @foreach (['SD', 'SMP', 'SMA', 'TKA', 'OSN', 'Umum'] as $j)
            <option value="{{ $j }}" {{ old('jenjang') === $j ? 'selected' : '' }}>{{ $j }}</option>
        @endforeach
    </select>
    <p class="text-xs text-gray-500 mt-1">Pilih jenjang pendidikan untuk memudahkan filter.</p>
</div>
```

---

### Tahap 6 — Update View Admin: Form Edit Paket Bundle

**File: `resources/views/pages/admin/exam-bundles/edit.blade.php`**

Tambahkan field yang sama dengan Tahap 5, tetapi gunakan nilai dari `$examBundle->jenjang`
untuk pre-populate (mengisi nilai yang sudah tersimpan).

Sisipkan HTML berikut di posisi yang sama (setelah field `name`):
```html
<div>
    <label class="mb-1 block text-sm font-medium text-gray-700">Jenjang Pendidikan</label>
    <select name="jenjang" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
        <option value="">-- Pilih Jenjang --</option>
        @foreach (['SD', 'SMP', 'SMA', 'TKA', 'OSN', 'Umum'] as $j)
            <option value="{{ $j }}" {{ old('jenjang', $examBundle->jenjang) === $j ? 'selected' : '' }}>{{ $j }}</option>
        @endforeach
    </select>
    <p class="text-xs text-gray-500 mt-1">Pilih jenjang pendidikan untuk memudahkan filter.</p>
</div>
```

> **Perbedaan dari Tahap 5:** Di `old()`, tambahkan argumen kedua `$examBundle->jenjang`
> agar nilai tersimpan muncul saat halaman edit dibuka.

---

### Tahap 7 — Update View Admin: Form Edit Sesi Ujian

**File: `resources/views/pages/admin/exam-sessions/edit.blade.php`**

Tambahkan field `jenjang` di section **"Konten Publik"** (`<section>` dengan h3 "Konten Publik"),
di dalam `<div class="mt-5 grid gap-4 md:grid-cols-2">`.
Letakkan setelah field **Judul Tryout** (field `title`).

> **PERHATIAN:** File ini menggunakan styling CSS yang berbeda dari file bundle.
> Gunakan `rounded-2xl` dan `border-[#d9def1]` — BUKAN `rounded-lg border-gray-300`.

Sisipkan HTML berikut:
```html
<label class="md:col-span-2">
    <span class="mb-2 block text-sm font-bold text-[#141b2c]">Jenjang Pendidikan</span>
    <select name="jenjang" class="w-full rounded-2xl border-[#d9def1] px-4 py-3 text-sm">
        <option value="">-- Pilih Jenjang --</option>
        @foreach (['SD', 'SMP', 'SMA', 'TKA', 'OSN', 'Umum'] as $j)
            <option value="{{ $j }}" {{ old('jenjang', $examSession->jenjang) === $j ? 'selected' : '' }}>{{ $j }}</option>
        @endforeach
    </select>
</label>
```

---

### Tahap 8 — Update Controller Publik

**File: `app/Http/Controllers/PublicPageController.php`**

Cari method `tryout()` (sekitar baris 150). Saat ini bentuknya adalah:
```php
public function tryout(): View
{
    return view('pages.public.tryout', [
        'examSessions' => ExamSession::query()
            ->where('status', 'active')
            ->orderBy('sort_order')
            ->orderBy('starts_at')
            ->get(),
        'examBundles' => \App\Models\ExamBundle::query()
            ->where('status', 'active')
            ->orderBy('sort_order')
            ->latest()
            ->get(),
    ]);
}
```

**Ubah menjadi** (tambahkan `$jenjangList` agar bisa dipakai di view untuk render tombol filter):
```php
public function tryout(): View
{
    // Kumpulkan semua nilai jenjang unik dari kedua tabel yang aktif
    $sessionJenjang = ExamSession::where('status', 'active')
        ->whereNotNull('jenjang')
        ->pluck('jenjang');
    $bundleJenjang = \App\Models\ExamBundle::where('status', 'active')
        ->whereNotNull('jenjang')
        ->pluck('jenjang');
    $jenjangList = $sessionJenjang->merge($bundleJenjang)->unique()->sort()->values();

    return view('pages.public.tryout', [
        'examSessions' => ExamSession::query()
            ->where('status', 'active')
            ->orderBy('sort_order')
            ->orderBy('starts_at')
            ->get(),
        'examBundles' => \App\Models\ExamBundle::query()
            ->where('status', 'active')
            ->orderBy('sort_order')
            ->latest()
            ->get(),
        'jenjangList' => $jenjangList,
    ]);
}
```

---

### Tahap 9 — Update View Publik: Halaman Try Out

**File: `resources/views/pages/public/tryout.blade.php`**

Ini tahap terpenting — yang langsung terlihat oleh pengguna publik.
**Baca dulu `bimbel.blade.php`** sebagai referensi karena polanya identik.

**A. Tambahkan class `tryout-item` dan `data-` attributes ke setiap card `<article>`:**

Untuk card Sesi Ujian (di dalam `@forelse ($examSessions as $examSession)`), cari baris:
```html
<article class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]">
```
Ubah menjadi:
```html
<article class="tryout-item overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]"
         data-title="{{ strtolower($examSession->title ?? $examSession->name) }}"
         data-jenjang="{{ $examSession->jenjang }}">
```

Untuk card Paket Bundle (di dalam `@foreach ($examBundles as $bundle)`), cari baris:
```html
<article class="overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff] border-2 border-[#feb700]/50 relative">
```
Ubah menjadi:
```html
<article class="tryout-item overflow-hidden rounded-3xl bg-white shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff] border-2 border-[#feb700]/50 relative"
         data-title="{{ strtolower($bundle->title ?? $bundle->name) }}"
         data-jenjang="{{ $bundle->jenjang }}">
```

**B. Tambahkan UI Search + Filter Jenjang** setelah penutup `</div>` dari `<div class="max-w-2xl">`:

```html
<div class="mt-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <div class="relative w-full sm:max-w-xs">
        <input type="text" id="tryoutSearch" placeholder="Cari tryout atau bundle..."
               class="w-full rounded-xl border border-gray-200 bg-white py-2.5 pl-10 pr-4 text-sm text-[#141b2c] shadow-sm outline-none transition focus:border-[#0043c6] focus:ring-1 focus:ring-[#0043c6]">
        <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
    </div>
    @if(isset($jenjangList) && $jenjangList->isNotEmpty())
    <div class="flex flex-nowrap gap-2 overflow-x-auto pb-1 sm:pb-0 hide-scrollbar" id="jenjangFilters">
        <button type="button" class="jenjang-btn active shrink-0 rounded-full bg-[#0043c6] px-4 py-2 text-sm font-semibold text-white transition" data-jenjang="all">Semua</button>
        @foreach ($jenjangList as $jenjang)
            <button type="button" class="jenjang-btn shrink-0 rounded-full bg-[#f1f3ff] px-4 py-2 text-sm font-semibold text-[#0043c6] transition hover:bg-[#dce1ff]" data-jenjang="{{ $jenjang }}">{{ $jenjang }}</button>
        @endforeach
    </div>
    @endif
</div>
```

**C. Tambahkan JavaScript** di akhir file, tepat sebelum tag penutup `</x-layouts.public>`:

```html
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('tryoutSearch');
        const filterBtns  = document.querySelectorAll('.jenjang-btn');
        const tryoutItems = document.querySelectorAll('.tryout-item');

        let currentJenjang = 'all';
        let currentSearch  = '';

        function filterTryouts() {
            tryoutItems.forEach(item => {
                const title   = item.dataset.title   || '';
                const jenjang = item.dataset.jenjang || '';

                const matchesSearch  = title.includes(currentSearch);
                const matchesJenjang = currentJenjang === 'all' || jenjang === currentJenjang;

                item.style.display = (matchesSearch && matchesJenjang) ? '' : 'none';
            });
        }

        if (searchInput) {
            searchInput.addEventListener('input', e => {
                currentSearch = e.target.value.toLowerCase();
                filterTryouts();
            });
        }

        filterBtns.forEach(btn => {
            btn.addEventListener('click', e => {
                filterBtns.forEach(b => {
                    b.classList.remove('bg-[#0043c6]', 'text-white', 'active');
                    b.classList.add('bg-[#f1f3ff]', 'text-[#0043c6]');
                });
                e.currentTarget.classList.remove('bg-[#f1f3ff]', 'text-[#0043c6]');
                e.currentTarget.classList.add('bg-[#0043c6]', 'text-white', 'active');

                currentJenjang = e.currentTarget.dataset.jenjang;
                filterTryouts();
            });
        });
    });
</script>
```

> **Referensi:** JavaScript ini identik dengan yang ada di `bimbel.blade.php` baris 75-136.
> Hanya nama variabel dan selector class yang berbeda.

---

## Checklist Akhir Sebelum Selesai

Setelah semua tahap selesai, verifikasi hal-hal berikut:

- [ ] `php artisan migrate` berjalan tanpa error
- [ ] Field `jenjang` muncul di form **create** Paket Bundle (`/admin/paket-bundle/create`)
- [ ] Field `jenjang` muncul di form **edit** Paket Bundle (`/admin/paket-bundle/{id}/edit`)
- [ ] Field `jenjang` muncul di form **edit** Sesi Ujian (`/admin/sesi-ujian/{id}/edit`)
- [ ] Data `jenjang` tersimpan benar ke database saat klik Simpan di admin
- [ ] Halaman `/tryout` menampilkan bar filter jenjang (hanya muncul jika ada data)
- [ ] Klik tombol filter jenjang di `/tryout` memfilter card dengan benar
- [ ] Search di `/tryout` berfungsi bersamaan dengan filter jenjang
- [ ] Card tanpa `jenjang` tetap tampil saat filter "Semua" aktif
- [ ] Tidak ada error PHP di Laravel log (`storage/logs/laravel.log`)
- [ ] Tidak ada error JavaScript di browser console

---

## Catatan Penting

1. **Jangan ubah** method `fetch()` di `AdminExamSessionController.php`. Field `jenjang`
   pada sesi ujian diisi manual via form edit admin, tidak dari endpoint eksternal.

2. **Jangan hapus** field atau logika yang sudah ada. Semua perubahan bersifat **additive**
   (menambah), bukan mengganti.

3. Filter di `/tryout` bekerja **client-side** (JavaScript murni), bukan server-side query —
   konsisten dengan pola yang sudah ada di `/bimbel`.

4. Jika `$jenjangList` kosong (belum ada data `jenjang` diisi), bar filter tidak akan muncul
   — sudah dihandle dengan `@if(isset($jenjangList) && $jenjangList->isNotEmpty())`.

5. Styling Blade antara form **bundle** dan **sesi ujian** berbeda — bundle pakai `rounded-lg
   border-gray-300`, sesi ujian pakai `rounded-2xl border-[#d9def1]`. Jangan tertukar.
