<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // ✅ Gunakan Hash::make() atau bcrypt()

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 🔹 Admin dummy
        DB::table('admins')->insert([
            'nama' => 'Admin Utama',
            'username' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 🔹 Produk dummy (10 item)
        DB::table('produk')->insert([
            [
                'id_admin' => 1,
                'nama_produk' => 'Jus Alpukat',
                'kategori' => 'Jus',
                'harga' => 15000,
                'deskripsi' => 'Jus segar dari alpukat pilihan.',
                'gambar' => 'jus-alpukat.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_admin' => 1,
                'nama_produk' => 'Jus Mangga',
                'kategori' => 'Jus',
                'harga' => 13000,
                'deskripsi' => 'Rasa manis dan segar dari buah mangga matang.',
                'gambar' => 'jus-mangga.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_admin' => 1,
                'nama_produk' => 'Keripik Pisang',
                'kategori' => 'Camilan',
                'harga' => 10000,
                'deskripsi' => 'Keripik pisang gurih manis renyah setiap gigitan.',
                'gambar' => 'keripik-pisang.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_admin' => 1,
                'nama_produk' => 'Kentang Goreng',
                'kategori' => 'Camilan',
                'harga' => 12000,
                'deskripsi' => 'Kentang goreng renyah dengan saus pilihan.',
                'gambar' => 'kentang-goreng.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_admin' => 1,
                'nama_produk' => 'Nasi Goreng Spesial',
                'kategori' => 'Makanan',
                'harga' => 20000,
                'deskripsi' => 'Nasi goreng lengkap dengan telur dan ayam suwir.',
                'gambar' => 'nasi-goreng.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_admin' => 1,
                'nama_produk' => 'Mie Goreng Pedas',
                'kategori' => 'Makanan',
                'harga' => 18000,
                'deskripsi' => 'Mie goreng pedas khas rumahan.',
                'gambar' => 'mie-goreng.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_admin' => 1,
                'nama_produk' => 'Es Teh Manis',
                'kategori' => 'Minuman',
                'harga' => 5000,
                'deskripsi' => 'Es teh manis segar untuk pelepas dahaga.',
                'gambar' => 'es-teh-manis.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_admin' => 1,
                'nama_produk' => 'Kopi Susu Gula Aren',
                'kategori' => 'Minuman',
                'harga' => 15000,
                'deskripsi' => 'Kopi susu kekinian dengan gula aren asli.',
                'gambar' => 'kopi-susu.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_admin' => 1,
                'nama_produk' => 'Jus Stroberi',
                'kategori' => 'Jus',
                'harga' => 14000,
                'deskripsi' => 'Jus stroberi segar dengan sedikit rasa asam manis.',
                'gambar' => 'jus-stroberi.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_admin' => 1,
                'nama_produk' => 'Roti Bakar Coklat Keju',
                'kategori' => 'Camilan',
                'harga' => 16000,
                'deskripsi' => 'Roti bakar isi coklat dan keju leleh, cocok untuk teman ngopi.',
                'gambar' => 'roti-bakar.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 🔹 User dummy (tanpa no_hp)
        DB::table('users')->insert([
            'nama' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}