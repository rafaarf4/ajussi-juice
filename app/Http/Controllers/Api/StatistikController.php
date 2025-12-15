<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\User;

class StatistikController extends Controller
{
    public function index()
    {
        return response()->json([
            'totalProduk' => Produk::count(),
            'totalPesanan' => Pesanan::count(),
            'totalUser'    => User::count(),
        ]);
    }
}
