# Studi Kasus - Tugas Pemrograman Web

Repositori ini berisi beberapa studi kasus (mini project) yang dibuat sebagai bagian dari tugas produktif. Setiap folder merupakan aplikasi mandiri yang dapat dijalankan secara independen.

## Daftar Project

| Folder | Deskripsi |
|--------|-----------|
| `sistem-data-siswa` | Sistem manajemen data siswa dengan fitur CRUD (Create, Read, Update, Delete). Menggunakan struktur MVC sederhana (controllers, models, views). |
| `sistem-kasir-kantin` | Sistem kasir kantin untuk mencatat penjualan makanan dan minuman. Memuat daftar menu (makanan & minuman) dan proses transaksi sederhana. |
| `sistem-peminjaman-kendaraan` | Sistem peminjaman kendaraan yang mencatat data mobil, motor, dan transaksi peminjaman. |
| `sistem-perpustakaan` | Sistem manajemen perpustakaan untuk mencatat buku, anggota, dan transaksi peminjaman/pengembalian. |
| `sistem-produk-laravel` | Sistem manajemen produk yang dibangun menggunakan framework Laravel. Menggunakan Composer untuk dependensi PHP dan npm/Vite untuk aset front-end. |

## Cara Menjalankan

### Untuk Project PHP Biasa (sistem-data-siswa, sistem-kasir-kantin, sistem-peminjaman-kendaraan, sistem-perpustakaan)
1. Pastikan PHP versi 7.4+ terinstal dan aktif.
2. Masuk ke folder project masing‑misalnya:
   ```bash
   cd sistem-data-siswa
   ```
3. Jalankan server built‑in PHP:
   ```bash
   php -S localhost:8000
   ```
4. Buka browser dan akses `http://localhost:8000`.

### Untuk Project Laravel (sistem-produk-laravel)
1. Pastikan Anda telah menginstal Composer, Node.js, dan npm.
2. Masuk ke folder:
   ```bash
   cd sistem-produk-laravel
   ```
3. Install dependensi PHP:
   ```bash
   composer install
   ```
4. Install dependensi JavaScript:
   ```bash
   npm install
   ```
5. Salin file `.env.example` menjadi `.env` dan atur konfigurasi database.
6. Generate kunci aplikasi:
   ```bash
   php artisan key:generate
   ```
7. Jalankan migrasi database (jika ada):
   ```bash
   php artisan migrate
   ```
8. Jalankan server pengembangan:
   ```bash
   php artisan serve
   ```
9. Pada terminal terpisah, jalankan Vite untuk aset front‑end:
   ```bash
   npm run dev
   ```
10. Buka `http://localhost:8000` di browser.

## Lisensi

Tugas ini dibuat untuk keperluan akademik.