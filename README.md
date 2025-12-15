# Ajussi Juice - Sistem Pemesanan Online

Ajussi Juice adalah aplikasi berbasis web yang dirancang untuk membantu pelanggan melakukan pemesanan minuman secara online serta memudahkan admin dalam mengelola data produk dan pesanan.
Aplikasi ini dibangun menggunakan React.js (Frontend) dan Laravel (Backend) dengan pendekatan RESTful API, serta dilengkapi dengan fitur autentikasi, pembayaran, dan manajemen pesanan secara real-time.

## 1. Teknologi yang Digunakan

1. Frontend menggunakan **React.js** dengan **Vite** sebagai bundler.
2. Backend menggunakan **Laravel 11** sebagai REST API.
3. Database menggunakan **MySQL**.
4. Library pendukung: **Bootstrap / Tailwind CSS** untuk styling, **React Router DOM** untuk navigasi, **Laravel Eloquent ORM** untuk manajemen data, dan **Fetch API** untuk komunikasi frontend-backend.

## 2. Fitur Utama

### a. Fitur untuk User (Pelanggan)

1. Login dan logout.
2. Melihat daftar produk yang tersedia di Ajussi Juice.
3. Melihat detail produk seperti harga, gambar, dan deskripsi.
4. Menambahkan produk ke keranjang belanja.
5. Melihat dan mengedit isi keranjang.
6. Melakukan pemesanan (checkout).
7. Melakukan pembayaran secara online melalui metode **BCA**, **BRI**, atau **QRIS**, serta mengunggah bukti transfer.
8. Melihat riwayat pesanan berdasarkan status.
9. Memberikan rating dan ulasan setelah pesanan selesai.
10. Status pesanan ditampilkan dengan warna berbeda:

    * Menunggu → Merah
    * Diproses → Kuning
    * Siap diambil → Hijau
    * Selesai → Biru

### b. Fitur untuk Admin (Pengelola Sistem)

1. Login sebagai admin untuk mengakses dashboard pengelolaan data.
2. Melihat daftar produk yang tersedia.
3. Menambahkan produk baru.
4. Mengedit informasi produk seperti nama, harga, dan gambar.
5. Menghapus produk dari daftar.
6. Melihat semua pesanan pelanggan.
7. Mengubah status pesanan (menunggu, diproses, siap diambil, atau selesai).
8. Mengunduh laporan pesanan dalam format PDF untuk keperluan administrasi.

## 3. Struktur Project

1. Project Ajussi Juice memiliki dua bagian utama yaitu **backend (Laravel)** dan **frontend (React)**.
2. Folder **backend** berisi konfigurasi Laravel, meliputi controller, model, routes, migration, dan file `.env` untuk konfigurasi database.
3. Folder **frontend** berisi kode React, mencakup:

   * `src/pages` → berisi halaman utama seperti Home, Katalog, Keranjang, PesananUser, Payment, dan halaman Admin.
   * `src/layouts` dan `src/components` → untuk tampilan umum seperti navbar, footer, dan elemen antarmuka yang digunakan berulang.
4. File `.gitignore` digunakan untuk mengabaikan file yang tidak perlu diunggah seperti `node_modules` dan `vendor`.
5. File `README.md` berisi dokumentasi project dan `LICENSE` untuk lisensi.

## 4. Instalasi dan Konfigurasi

1. **Clone Repository**

   ```
   git clone https://github.com/username/ajussi-juice.git
   cd ajussi-juice
   ```

2. **Instalasi Backend (Laravel)**

   ```
   cd backend
   composer install
   cp .env.example .env
   ```

   * Sesuaikan konfigurasi database di file `.env`.
   * Jalankan:

     ```
     php artisan key:generate
     php artisan migrate --seed
     php artisan serve
     ```
   * Backend berjalan di: `http://127.0.0.1:8000`

3. **Instalasi Frontend (React)**

   ```
   cd frontend
   npm install
   ```

   * Buat file `.env` dan isi:

     ```
     VITE_API_URL=http://127.0.0.1:8000
     ```
   * Jalankan server frontend:

     ```
     npm run dev
     ```
   * Frontend berjalan di: `http://localhost:5173`

4. **Menjalankan Aplikasi**

   * Jalankan backend dan frontend secara bersamaan agar sistem terhubung dengan baik.

## 5. Alur Sistem

1. User login terlebih dahulu.
2. Melihat daftar produk dan menambahkan produk ke keranjang.
3. Melakukan checkout → data dikirim ke backend dan disimpan di database.
4. Pesanan muncul di halaman **Riwayat Pesanan (PesananUser)**.
5. User melanjutkan ke halaman **Pembayaran** untuk mengunggah bukti transfer.
6. Admin memverifikasi pembayaran dan mengubah status pesanan menjadi **diproses**, **siap diambil**, atau **selesai**.
7. Setelah status **selesai**, user dapat memberikan **rating dan ulasan** terhadap produk.

## 6. Endpoint API Utama

1. `POST /api/register` → Registrasi user baru.
2. `POST /api/login` → Login user atau admin.
3. `GET /api/produk` → Menampilkan semua produk.
4. `GET /api/produk/{id}` → Menampilkan detail produk.
5. `POST /api/produk` → Menambah produk baru (admin).
6. `PUT /api/produk/{id}` → Mengedit produk (admin).
7. `DELETE /api/produk/{id}` → Menghapus produk (admin).
8. `GET /api/pesanan` → Menampilkan semua pesanan (admin).
9. `GET /api/pesanan-user/{id_user}` → Menampilkan pesanan user tertentu.
10. `POST /api/pesanan` → Membuat pesanan baru dari keranjang user.
11. `PUT /api/pesanan/{id}` → Mengubah status pesanan.
12. `GET /api/pesanan/pdf` → Mengunduh laporan pesanan dalam format PDF.

## 7. Catatan Pengembangan

1. Pastikan koneksi antara backend dan frontend berjalan dengan benar.
2. Endpoint API yang digunakan frontend harus sesuai dengan base URL di file `.env` frontend.
3. Semua data produk, pesanan, dan detail pesanan diatur melalui model Laravel **Produk**, **Pesanan**, dan **DetailPesanan**.
4. Sistem menggunakan relasi **one-to-many** antara tabel **Pesanan** dan **DetailPesanan**.

## 8. Pengembang

Project ini dikembangkan oleh tim:

1. Rafa Ayu Radhyafitri 
2. Tazkia Putri Hidayati
3. Albani Daffa Restu Amba
4. Muhammad Naufal Arif 
Project: Ajussi Juice — UMKM Lokal Indonesia

=======
# ajussi-juice
Sistem Pemesanan Online Ajussi Juice
