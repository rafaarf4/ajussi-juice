<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $fillable = [
        'id_user',
        'total_harga',
        'status',
        'tanggal_pesan',
        'rating',
        'ulasan'
    ];

    // Hubungan ke detail_pesanan
    public function details()
    {
        return $this->hasMany(DetailPesanan::class, 'id_pesanan', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function ulasan()
    {
        return $this->hasOne(Ulasan::class, 'id_pesanan');
    }


}
