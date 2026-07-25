# Perencanaan Fitur Paket Bundle Sesi Ujian (Tryout)

Dokumen ini berisi tahapan-tahapan implementasi fitur **Paket Bundle** untuk sesi ujian (tryout) yang ditujukan kepada programmer atau AI assistant yang akan mengerjakan task ini.

## Latar Belakang & Persyaratan
1. Mengembangkan fitur **Paket Bundle** berdasarkan halaman Admin Sesi Ujian (`http://127.0.0.1:8000/admin/sesi-ujian`).
2. Fitur ini akan menggabungkan beberapa sesi ujian menjadi satu paket bundling (misal: "Bundel Tryout UTBK 5 Sesi").
3. Berpengaruh ke landing page tryout untuk menampilkan katalog paket bundle kepada user.
4. Data paket bundle juga diambil (*fetch*) dari API eksternal (`irt_quiz` atau endpoint sejenis) secara otomatis.

---

## Tahapan Implementasi

### Tahap 1: Persiapan Database & Model
Kita perlu menyimpan data bundle dan relasinya dengan sesi ujian (Many-to-Many).
1. **Buat tabel `exam_bundles`**:
   - Menampung informasi paket bundle (seperti `external_id`, `name`, `slug`, `description`, `price`, `sale_price`, `status`, `image_path`, dll).
2. **Buat pivot table `exam_bundle_session`**:
   - Menampung relasi antara bundle dan sesi ujian (`exam_bundle_id`, `exam_session_id`).
3. **Buat / Update Model Eloquent**:
   - Buat model `ExamBundle.php`.
   - Update model `ExamSession.php` untuk memiliki relasi `belongsToMany(ExamBundle::class)`.
   - Setup mass-assignment (`$fillable`) dan *casts* yang diperlukan.

### Tahap 2: Integrasi Fetching API Eksternal
Proses fetch data yang saat ini ada di `AdminExamSessionController` perlu disesuaikan atau dibuat endpoint khusus untuk bundle.
1. **Update Konfigurasi API**:
   - Tambahkan endpoint untuk bundle di `config/services.php` (misal: `irt_quiz.exam_bundles_endpoint`).
2. **Buat Logika Fetch Bundle**:
   - Tambahkan method `fetchBundles` di Controller (misal `AdminExamBundleController`) atau modifikasi logika fetch yang sudah ada agar juga me-request data bundle.
   - Parsing JSON response: lakukan iterasi pada data bundle, simpan/update ke tabel `exam_bundles` dengan `updateOrCreate` menggunakan parameter `external_id`.
   - Sinkronisasi Relasi (*Sync*): Hubungkan setiap bundle yang di-fetch dengan `ExamSession` terkait (menggunakan fungsi `->sync()`).

### Tahap 3: Pembuatan Modul Admin Bundle
Admin harus bisa melihat, mengubah, dan mem-publish paket bundle.
1. **Buat Controller & Route Admin**:
   - Controller: `AdminExamBundleController` (Resource Controller).
   - Route: `/admin/exam-bundles` (index, edit, update).
2. **Tampilan (View) Daftar & Edit**:
   - Buat file view `index.blade.php` untuk bundle dengan tabel daftar paket (mirip dengan admin sesi ujian, termasuk paginasi dan pencarian).
   - Buat file view `edit.blade.php` agar admin bisa menambahkan judul, deskripsi, gambar, mengatur harga, promo, dan mengubah status menjadi `active`.

### Tahap 4: Update Tampilan Public (Landing Page Tryout)
Landing page harus membedakan antara pendaftaran Sesi Ujian satuan (Single Session) dan pendaftaran Paket Bundle.
1. **Modifikasi `PublicPageController`**:
   - Pada method `tryout()`, panggil juga data bundle yang berstatus `active` (e.g. `ExamBundle::where('status', 'active')->get()`).
   - Pada method `tryoutDetail()`, tambahkan logika untuk menampilkan detail bundle berdasarkan slug.
2. **Update View Landing Page (`tryout.blade.php` & `tryout-detail.blade.php`)**:
   - Buat section baru untuk memamerkan "Paket Bundling Pilihan".
   - Tampilkan informasi diskon/hemat jika membeli bundle dibanding satuan.
   - Pada halaman detail, berikan rincian/daftar *Sesi Ujian* apa saja yang akan didapatkan di dalam paket bundle tersebut.

### Tahap 5: Update Modul Checkout & Registrasi
Modul checkout saat ini (seperti `TryoutCheckoutController` dan `FreePackageRegistrationController`) perlu bisa memproses pembelian *bundle*.
1. **Pembelian Bundle**:
   - Buat `BundleCheckoutController` atau gabungkan ke `TryoutCheckoutController` dengan mengecek tipe item.
   - Jika *checkout bundle*, otomatis daftarkan / beri akses (`attach`) user ke *semua* sesi ujian yang terhubung dengan bundle tersebut (setelah pembayaran berhasil).
2. **Free Registration**:
   - Jika bundle tersebut *free*, daftarkan user ke seluruh sesi di dalam bundle tersebut sekaligus, bypass payment gateway Midtrans.

---
**Catatan untuk Developer Selanjutnya:**
Pastikan selalu menggunakan `DB::transaction()` saat memproses checkout paket bundle yang berisi multiple sesi, untuk memastikan semua akses diberikan dengan aman tanpa partial data.
