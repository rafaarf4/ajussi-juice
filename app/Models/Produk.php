<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    // ✅ Tambahkan ini
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'id_admin',
        'nama_produk',
        'kategori',
        'harga',
        'deskripsi',
        'gambar'
    ];

    public $timestamps = false;
}