# Implementasi Upload Bukti pada Pendaftaran Tryout Gratis

## Latar Belakang
Saat ini, ketika pengguna mengklik tombol "Daftar Paket Gratis" pada halaman detail tryout (misalnya `http://localhost:8000/tryout/...`), sistem memunculkan sebuah modal konfirmasi sederhana yang langsung mengeksekusi pendaftaran jika diklik "Ya, Daftarkan".
Kebutuhan bisnis yang baru mengharuskan pengguna yang mendaftar paket gratis untuk mengunggah dua buah bukti:
1. Bukti follow Instagram (IG) atau TikTok Jagobelajar.
2. Bukti komentar pada postingan Jagobelajar.

Issue ini berisi rancangan teknis (blueprint) untuk diimplementasikan oleh developer (Junior Programmer atau AI model).

---

## Tahapan Implementasi

### 1. Update Database Schema & Model (Backend)
Kita perlu tempat untuk menyimpan path (lokasi file) dari gambar bukti yang di-upload oleh user. Data pendaftaran tryout saat ini disimpan di tabel `user_packages`.
- **Buat Migration:** Buat migration baru (contoh: `php artisan make:migration add_proofs_to_user_packages_table`).
- **Isi Migration:** Tambahkan kolom `proof_follow_path` (string, nullable) dan `proof_comment_path` (string, nullable) ke dalam tabel `user_packages`.
- **Update Model:** Buka `app/Models/UserPackage.php` dan tambahkan `proof_follow_path` serta `proof_comment_path` ke dalam properti `$fillable`.

### 2. Penyesuaian View Modal Pendaftaran (Frontend)
Kita perlu merombak modal konfirmasi agar menampilkan field upload file.
- **File Target:** Buka `resources/views/pages/public/tryout-detail.blade.php`.
- **Cari Modal:** Cari bagian yang memiliki atribut `x-show="openFree"`.
- **Modifikasi Form:** 
  - Pastikan tag `<form>` memiliki atribut `enctype="multipart/form-data"` agar dapat memproses upload file.
  - Tambahkan label dan input untuk Bukti Follow: `<input type="file" name="proof_follow" accept="image/*" required>`.
  - Tambahkan label dan input untuk Bukti Komen: `<input type="file" name="proof_comment" accept="image/*" required>`.
  - Styling input-input tersebut agar serasi dengan desain form menggunakan utility class Tailwind CSS yang sudah digunakan di halaman tersebut (misalnya menambahkan class `rounded-xl`, `border`, `px-4`, `py-3`, dll).

### 3. Penanganan Upload File & Validasi di Controller (Backend)
Setelah form dikirim, backend harus memvalidasi gambar, menyimpannya, lalu menyambungkannya dengan catatan `UserPackage` yang baru.
- **File Target:** Buka `app/Http/Controllers/FreePackageRegistrationController.php`.
- **Validasi Request:** Pada method `store`, sebelum melakukan request ke service eksternal, tambahkan validasi untuk memastikan gambar diunggah dengan benar:
  ```php
  $request->validate([
      'proof_follow' => ['required', 'image', 'max:4096'],
      'proof_comment' => ['required', 'image', 'max:4096'],
  ]);
  ```
- **Simpan File (Storage):** 
  ```php
  $proofFollowPath = $request->file('proof_follow')->store('proofs/follow', 'public');
  $proofCommentPath = $request->file('proof_comment')->store('proofs/comment', 'public');
  ```
- **Update Penyimpanan Database:** Pada bagian di mana `UserPackage::updateOrCreate(...)` dieksekusi, tambahkan pengisian data bukti tersebut:
  ```php
  UserPackage::updateOrCreate(
      [ ... ],
      [
          // ... field-field sebelumnya
          'proof_follow_path' => $proofFollowPath,
          'proof_comment_path' => $proofCommentPath,
      ]
  );
  ```

### 4. Hal Tambahan & Testing (QA)
- **Symlink Storage:** Jika environment lokal belum memiliki symlink ke public folder, jalankan command `php artisan storage:link`.
- **Tampilkan Error:** Pastikan view menampilkan error validasi (`$errors->first('proof_follow')`) bila user salah upload gambar.
- **Verifikasi Admin (Opsional):** Jika paket gratis yang mengunggah bukti perlu "Pending Verification" dari admin, maka sesuaikan logika call ke API `irt_quiz` agar dilakukan hanya setelah disetujui admin. Jika hanya butuh pencatatan saja (seperti sistem sekarang), lanjutkan integrasi API seperti biasa.

---
Silakan ikuti instruksi di atas secara bertahap (step-by-step) untuk mengimplementasikan fitur tersebut. Pastikan untuk selalu melakukan testing setelah menyelesaikan setiap tahapan.
