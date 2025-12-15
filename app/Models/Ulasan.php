<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = 'ulasan';

    protected $fillable = [
        'id_pesanan',
        'id_user',
        'rating',
        'ulasan'
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
