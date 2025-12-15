<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function store(Request $request, $id_pesanan)
    {
        // Validasi input
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'nullable|string|max:500'
        ]);

        // Cek pesanan
        $pesanan = Pesanan::findOrFail($id_pesanan);

        // Pesanan harus sudah selesai
        if ($pesanan->status !== 'selesai') {
            return response()->json([
                'error' => 'Pesanan belum selesai, belum bisa memberi ulasan.'
            ], 400);
        }

        // Cek apakah ulasan sudah ada
        if ($pesanan->ulasan) {
            return response()->json([
                'error' => 'Ulasan sudah pernah diberikan.'
            ], 400);
        }

        // Simpan ulasan
        $ulasan = Ulasan::create([
            'id_pesanan' => $pesanan->id,
            'id_user' => $pesanan->id_user,
            'rating' => $request->rating,
            'ulasan' => $request->ulasan
        ]);

        return response()->json([
            'message' => 'Ulasan berhasil disimpan!',
            'ulasan' => $ulasan
        ], 201);
    }
}
