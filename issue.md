# Issue: Implementasi Doku Payment Gateway & Sistem Switcher (Settings)

## Deskripsi
Saat ini sistem pembayaran utama menggunakan Midtrans. Kita membutuhkan integrasi payment gateway alternatif menggunakan **Doku**. Tujuannya adalah sebagai *fallback* (cadangan); apabila Midtrans sedang mengalami gangguan, admin dapat dengan mudah mengubah payment gateway yang aktif ke Doku melalui UI admin tanpa perlu melakukan perubahan kode.

## Tahapan Implementasi

Mohon ikuti tahapan-tahapan di bawah ini secara berurutan untuk mengimplementasikan fitur tersebut.

### Tahap 1: Persiapan Database & Model untuk Settings (Sistem Switcher)
Kita membutuhkan tempat untuk menyimpan pengaturan payment gateway yang aktif agar bisa diubah melalui UI.
1. **Buat Migration Tabel Settings:**
   - Jalankan perintah `php artisan make:migration create_settings_table`.
   - Buat skema tabel dengan kolom: `id`, `key` (string, unique), `value` (text/string, nullable), dan `timestamps`.
2. **Buat Model Setting:**
   - Jalankan `php artisan make:model Setting`.
   - Tambahkan property `$fillable = ['key', 'value'];`.
   - (Opsional) Buat helper method di dalam model (contoh: `public static function get($key, $default = null)`) untuk memudahkan pemanggilan setting.
3. **Buat Seeder:**
   - Buat `SettingSeeder` yang akan mengisi data awal: `key` = `active_payment_gateway`, `value` = `midtrans`.
   - Jalankan seeder ini agar database default langsung mengarah ke midtrans.

### Tahap 2: Konfigurasi Environment & Services Doku
1. **Update `.env` dan `.env.example`:**
   - Tambahkan variabel kredensial Doku (misal Doku Jokul):
     ```env
     DOKU_CLIENT_ID=
     DOKU_SECRET_KEY=
     DOKU_IS_PRODUCTION=false
     ```
2. **Update `config/services.php`:**
   - Tambahkan block konfigurasi `doku` yang memetakan *environment variable* di atas, sehingga strukturnya mirip dengan blok `midtrans` yang sudah ada.

### Tahap 3: Membuat Modul UI Admin untuk Settings
1. **Routes:**
   - Tambahkan route baru di `routes/web.php` dalam grup middleware admin, contoh: `Route::get('/admin/settings/payment', [AdminSettingController::class, 'edit'])` dan `Route::post('/admin/settings/payment', [AdminSettingController::class, 'update'])`.
2. **Controller:**
   - Buat `AdminSettingController.php`.
   - Method `edit`: Mengambil nilai saat ini dari tabel `settings` (key `active_payment_gateway`) dan mengembalikannya ke view.
   - Method `update`: Melakukan validasi input, lalu memperbarui atau membuat record `active_payment_gateway` dengan value baru (`midtrans` atau `doku`).
3. **View & Sidebar Admin:**
   - Buat file Blade baru untuk form (contoh form dengan Radio Button atau Dropdown untuk memilih antara Midtrans dan Doku).
   - Tambahkan tautan "Payment Settings" di sidebar layout admin agar mudah diakses.

### Tahap 4: Implementasi Inti Integrasi API Doku
1. **Buat Service Khusus Doku:**
   - (Opsional tapi disarankan) Buat kelas service, misalnya `app/Services/DokuService.php` untuk menangani *request* *generate payment link* ke API Doku (mirip Midtrans Snap).
2. **Buat Controller Notification Doku:**
   - Jalankan `php artisan make:controller DokuNotificationController`.
   - Di dalam controller ini, buat logika untuk menerima *callback/webhook* dari Doku ketika transaksi sukses dibayar.
   - Logikanya harus mirip dengan `MidtransNotificationController`: memvalidasi *signature* dari Doku, mencari data di tabel `payments` berdasarkan `order_id`, lalu mengubah status `payment_status` menjadi `paid`.
3. **Routes Webhook:**
   - Daftarkan route webhook Doku (misal: `/api/payment/doku-notification`).
   - **Penting:** Kecualikan route ini dari proteksi CSRF di dalam file `bootstrap/app.php` (tambahkan di bagian `->withMiddleware(function (Middleware $middleware) { $middleware->validateCsrfTokens(except: [...]); })`), sama seperti saat Midtrans dikonfigurasi.

### Tahap 5: Modifikasi Flow Checkout (Routing Pembayaran)
Saat ini checkout langsung memanggil Midtrans. Kita harus membuatnya dinamis.
1. Buka semua file controller yang menangani checkout (misalnya: `BundleCheckoutController`, `BimbelCheckoutController`, `TryoutCheckoutController`).
2. Di bagian method `store()` atau saat generate payment, ambil nilai gateway aktif:
   ```php
   $activeGateway = \App\Models\Setting::where('key', 'active_payment_gateway')->first()->value ?? 'midtrans';
   ```
3. Buat percabangan logika (*if-else*):
   - Jika `midtrans`: Eksekusi kode Guzzle/Http *post* ke Midtrans Snap seperti biasa, lalu *redirect* ke `snap_redirect_url`.
   - Jika `doku`: Eksekusi logika *generate payment link* Doku (memanggil API Doku), simpan token/URL, lalu *redirect* user ke halaman pembayaran Doku.

### Tahap 6: Testing (Quality Assurance)
Sebelum merilis ke production, pastikan melakukan pengujian berikut di environment lokal/staging (menggunakan mode Sandbox):
1. Uji **Midtrans**: Ubah setting ke Midtrans di admin. Lakukan checkout, pastikan user diarahkan ke Midtrans, bayar simulasi, dan pastikan callback `MidtransNotificationController` berhasil memproses `paid`.
2. Uji **Doku**: Ubah setting ke Doku di admin. Lakukan checkout, pastikan user diarahkan ke payment link Doku, lakukan bayar simulasi di portal Doku Sandbox, dan pastikan callback `DokuNotificationController` memproses status dengan benar.
3. Uji **UI Admin**: Coba ganti-ganti pengaturan bolak-balik untuk memastikan sistem switcher menyimpan setting dengan tepat di database.

---
**Catatan untuk Junior Programmer / AI:**
Fokus pada clean code dan gunakan metode abstraksi yang baik pada Tahap 5 agar kode tidak berulang (contoh: gunakan *Service class* atau *interface* untuk memanggil gateway). Jangan merubah proses bisnis checkout (harga promo, dll), cukup modifikasi ke mana data API dikirimkan.
