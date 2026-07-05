# Issue: Premium Tryout Flow + Auto Register ke irt-quiz

## Tujuan
Membuat flow **Daftar Paket Premium** pada detail tryout di project ini agar user harus membayar dulu, lalu setelah pembayaran berhasil user otomatis didaftarkan ke sesi ujian premium di project `C:\dev\irt-quiz`.

## Scope Fitur
- Buat endpoint baru di `C:\dev\irt-quiz` untuk daftar ke sesi ujian dengan privilege **premium**.
- Integrasikan endpoint tersebut ke tombol **Daftar Paket Premium** di detail tryout project ini.
- User harus checkout dan membayar dulu sebelum registrasi premium dijalankan.
- Setelah pembayaran berhasil, sistem otomatis memanggil endpoint premium di `irt-quiz`.
- Jika pembayaran gagal atau belum lunas, user tidak boleh didaftarkan.

---

## Tahap 1 — Pelajari Flow Gratis yang Sudah Ada

### Yang harus dicek di project ini
- `app/Http/Controllers/FreePackageRegistrationController.php`
- `resources/views/pages/public/tryout-detail.blade.php`
- `resources/views/pages/user/dashboard.blade.php`
- tabel `user_packages`

### Yang harus dicek di `C:\dev\irt-quiz`
- endpoint public daftar sesi ujian gratis yang sudah ada
- controller yang menangani registrasi peserta
- field apa yang dibutuhkan untuk registrasi premium

### Output tahap ini
Pahami perbedaan antara flow gratis dan flow premium, terutama:
- payload request
- privilege/role peserta
- behavior setelah berhasil daftar

---

## Tahap 2 — Tambahkan Endpoint Premium di `irt-quiz`

### Yang harus dibuat di `C:\dev\irt-quiz`
- route baru di `routes/api.php`
- method baru di controller public/session controller

### Contoh tujuan endpoint
Endpoint ini harus menerima request seperti flow gratis, tetapi menambahkan privilege premium pada sesi yang dituju.

### Aturan penting
- Endpoint tetap public, tidak perlu login.
- Endpoint harus mengecek apakah email user sudah ada.
- Jika user belum ada, buat user baru dari data profil yang dikirim.
- Jika user sudah ada, langsung daftarkan ke sesi premium.
- Tambahkan penanda privilege premium pada data pendaftaran.

### Output tahap ini
Endpoint baru yang siap dipanggil dari project CMS ini.

---

## Tahap 3 — Tambahkan Konfigurasi Endpoint di Project Ini

### File yang perlu diubah
- `.env.example`
- `.env`
- `config/services.php`

### Tambahkan env
Misalnya:

```env
IRT_QUIZ_PREMIUM_REGISTER_ENDPOINT=http://127.0.0.1:8001/api/public/exam-sessions
```

### Tujuan
Supaya URL endpoint premium tidak hardcode dan bisa diganti dengan mudah.

---

## Tahap 4 — Siapkan Flow Payment Premium

### Yang harus dipakai
Gunakan flow payment yang sudah dibuat untuk bimbel sebagai referensi utama.

### Hal yang harus direncanakan
- Tombol **Daftar Paket Premium** di detail tryout harus memulai checkout.
- User login wajib sebelum checkout.
- Setelah pembayaran berhasil, sistem memanggil endpoint premium ke `irt-quiz`.
- Hanya user yang sudah paid yang boleh didaftarkan ke sesi premium.

### Output tahap ini
Alur checkout premium yang jelas sebelum registrasi otomatis dijalankan.

---

## Tahap 5 — Buat Tracking Order Premium

### Yang harus disiapkan
Simpan transaksi premium ke tabel payment/order yang sudah ada atau buat jika belum ada.

### Data minimal
- `user_id`
- `package_type` = `tryout`
- `package_id`
- `order_id`
- `gross_amount`
- `payment_status`
- `paid_at`

### Kenapa perlu
Agar sistem bisa tahu kapan pembayaran benar-benar berhasil sebelum daftar ke sesi premium.

---

## Tahap 6 — Auto Register Setelah Payment Berhasil

### Alur yang harus dibuat
1. User klik **Daftar Paket Premium**.
2. Sistem membuat transaksi payment.
3. User menyelesaikan pembayaran.
4. Payment gateway mengirim status berhasil.
5. Sistem memanggil endpoint premium di `irt-quiz`.
6. Jika endpoint sukses, simpan ke `user_packages`.
7. Tampilkan hasil sukses ke user.

### Catatan implementasi
- Panggilan ke `irt-quiz` harus dilakukan **setelah** status pembayaran sukses.
- Jika request ke `irt-quiz` gagal, simpan log error dan tampilkan pesan yang jelas.
- Jangan daftarkan user sebelum payment confirmed.

---

## Tahap 7 — Update Tombol di Detail Tryout

### File yang diubah
- `resources/views/pages/public/tryout-detail.blade.php`

### Yang harus dilakukan
- Tombol **Daftar Paket Premium** tidak lagi dummy.
- Tombol memicu flow checkout premium.
- Setelah bayar sukses, user otomatis didaftarkan ke sesi premium.

### Acceptance
- User guest tetap diarahkan ke login.
- User login bisa checkout.
- Setelah paid, registrasi premium otomatis berjalan.

---

## Tahap 8 — Update Paket Terdaftar di Dashboard

### File yang diubah
- `resources/views/pages/user/dashboard.blade.php`
- `app/Http/Controllers/UserDashboardController.php`

### Yang harus dilakukan
- Paket premium tryout tetap muncul di `Paket Terdaftar`.
- Tombol untuk tryout premium tetap **Masuk ke Ujian**.
- Pastikan `join_url` atau link masuk ke sesi premium tersimpan saat registrasi berhasil.

### Catatan
Jika premium memakai URL khusus dari `irt-quiz`, simpan URL itu ke `user_packages.join_url`.

---

## Tahap 9 — Validasi dan Error Handling

### Yang harus diperiksa
- Payment gagal
- Callback payment tidak masuk
- Endpoint premium `irt-quiz` down
- User sudah terdaftar sebelumnya

### Perilaku yang disarankan
- Jika payment gagal, jangan daftar ke sesi premium.
- Jika user sudah terdaftar, jangan dobel insert.
- Jika endpoint premium gagal, simpan error log dan tampilkan pesan ringan ke user.

---

## Tahap 10 — Testing Manual

### Skenario sukses
1. Buka detail tryout.
2. Klik **Daftar Paket Premium**.
3. Login jika belum login.
4. Selesaikan pembayaran.
5. Pastikan otomatis terdaftar ke sesi premium di `irt-quiz`.
6. Pastikan paket muncul di dashboard user.

### Skenario gagal
- payment gagal
- payment pending
- endpoint `irt-quiz` tidak bisa diakses
- user sudah pernah daftar

### Output tahap ini
Memastikan flow end-to-end berjalan tanpa registrasi sebelum payment sukses.

---

## Acceptance Criteria
- Endpoint premium baru tersedia di `C:\dev\irt-quiz`.
- Flow premium di detail tryout mengharuskan payment dulu.
- Setelah payment berhasil, user otomatis didaftarkan ke sesi premium.
- Paket premium muncul di dashboard user.
- Tidak ada registrasi premium sebelum pembayaran confirmed.
- Semua URL penting disimpan di `.env`.
