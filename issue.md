# Perencanaan Fitur: Batas Waktu Paket Gratis (Paket Bundle)

## Deskripsi Singkat
Fitur ini bertujuan untuk menambahkan batas waktu (start date dan end date) pada pengaktifan paket gratis di dalam entitas Paket Bundle. Nantinya, tombol "Daftar Paket Gratis" di halaman depan (user) hanya akan muncul jika masa berlaku paket gratis masih aktif (belum melewati `end_date`).

## Target Halaman
1. **Admin (Create/Edit)**: `http://localhost:8000/admin/paket-bundle/create` dan `http://localhost:8000/admin/paket-bundle/{id}/edit`
2. **User (Detail Bundle)**: `http://localhost:8000/tryout/bundle/{slug}`

---

## Tahapan Implementasi

### Tahap 1: Persiapan Database (Migration & Model)
1. **Pengecekan Schema Database**:
   - Cek tabel yang menyimpan data Paket Bundle (misalnya `paket_bundles`).
   - Periksa apakah kolom untuk menyimpan tanggal mulai dan berakhirnya paket gratis sudah tersedia (misal: `free_start_date` dan `free_end_date`, atau `start_date` dan `end_date`).
2. **Pembuatan Migration (Jika Belum Ada)**:
   - Buat file migration baru untuk menambahkan kolom `start_date` dan `end_date` (tipe data `timestamp` atau `datetime`, nullable).
   - Jalankan `php artisan migrate`.
3. **Pembaruan Model**:
   - Buka file Model terkait (misalnya `app/Models/PaketBundle.php`).
   - Tambahkan kolom baru tersebut ke dalam properti `$fillable`.
   - Tambahkan casting (opsional tapi direkomendasikan):
     ```php
     protected $casts = [
         'start_date' => 'datetime',
         'end_date' => 'datetime',
     ];
     ```
   - (Opsional) Buat *accessor* atau method pembantu, misalnya `isFreePackageValid()`, yang mengembalikan nilai boolean (true jika tanggal sekarang <= `end_date`).

### Tahap 2: Backend (Controller & Validation)
1. **Pembaruan Form Request / Validasi**:
   - Buka FormRequest atau method controller yang menangani proses simpan (store) dan ubah (update) Paket Bundle.
   - Tambahkan aturan validasi:
     - `start_date`: nullable, date.
     - `end_date`: nullable, date, after_or_equal:start_date.
   - Pastikan validasi ini hanya *required* atau dipertimbangkan jika opsi "Aktifkan paket gratisnya" bernilai `true`.
2. **Pembaruan Controller**:
   - Pastikan data `start_date` dan `end_date` ikut disimpan/diperbarui ke database saat proses simpan. 
   - *Best practice*: Jika fitur paket gratis dimatikan (`false`), pertimbangkan untuk men-set (null) kedua kolom tanggal tersebut agar data tetap bersih.

### Tahap 3: Frontend Admin (Form Create & Edit)
*Asumsi framework yang digunakan (misal: React/Inertia.js atau Blade).*
1. **Lokasi File**: Buka komponen form untuk Create dan Edit Paket Bundle.
2. **Implementasi UI & Logika render kondisi**:
   - Cari input toggle/checkbox untuk "Aktifkan paket gratisnya".
   - Buat *conditional rendering*: Jika nilai "Aktifkan paket gratisnya" adalah `true` (aktif), maka tampilkan dua input tambahan:
     - Input tipe date/datetime untuk `start_date`.
     - Input tipe date/datetime untuk `end_date`.
   - Jika "Aktifkan paket gratisnya" dimatikan (`false`), sembunyikan input tersebut.
   - Hubungkan (bind) state input tersebut ke form data agar bisa disubmit.
3. **Penanganan Error**: Pastikan error feedback validasi dari backend untuk field `start_date` dan `end_date` ditampilkan dengan benar di bawah input terkait.

### Tahap 4: Frontend User (Halaman Detail Bundle)
1. **Lokasi File**: Buka komponen/view untuk halaman detail bundle (contoh rute: `/tryout/bundle/{slug}`).
2. **Pembaruan Logika Tombol Daftar**:
   - Cari elemen UI untuk tombol "Daftar Paket Gratis".
   - Tambahkan logika kondisi untuk memanipulasi visibilitas tombol tersebut.
   - Contoh logika dasar:
     ```javascript
     const currentDate = new Date();
     const endDate = bundle.end_date ? new Date(bundle.end_date) : null;
     
     // Asumsi is_free_enabled merepresentasikan status aktif paket gratis
     const isFreePackageEnabled = bundle.is_free_enabled; 

     // Tampilkan tombol jika paket gratis dicentang/aktif DAN (end_date tidak ada ATAU waktu sekarang masih <= end_date)
     const showFreeButton = isFreePackageEnabled && (!endDate || currentDate <= endDate);

     if (showFreeButton) {
         // Render Tombol "Daftar Paket Gratis"
     }
     ```
   - **Catatan Keamanan Backend**: Pastikan backend juga memvalidasi waktu saat endpoint pendaftaran (klaim) gratis di-hit. Jangan bergantung hanya pada UI (Frontend) untuk menyembunyikan tombol.

### Tahap 5: Testing (Uji Coba Cepat)
1. **Skenario Admin**:
   - Aktifkan paket gratis, set start_date dan end_date, lalu simpan.
   - Coba matikan paket gratis, simpan, pastikan berjalan lancar.
2. **Skenario Frontend User**:
   - Buka detail bundle yang memiliki `end_date` masa lampau (kemarin), pastikan tombol "Daftar Paket Gratis" **tidak muncul**.
   - Buka detail bundle yang memiliki `end_date` masa depan (besok/lusa), pastikan tombol **muncul**.
