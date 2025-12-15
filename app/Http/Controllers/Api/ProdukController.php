<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return Produk::all();
    }

    // ✅ Ambil satu produk
    public function show(Produk $produk)
    {
        return $produk;
    }

    // ✅ Update produk
    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|string'
        ]);

        $produk->update($validated);

        return response()->json([
            'message' => 'Produk berhasil diperbarui!',
            'produk' => $produk
        ]);
    }

    // ✅ Hapus produk
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return response()->json([
        'message' => 'Produk berhasil dihapus!'
        ]);
    }

    public function store(Request $request)
{
    // HAPUS dd() — jangan biarkan di production/testing!

    $validated = $request->validate([
        'nama_produk' => 'required|string|max:255',
        'kategori' => 'required|string|max:255',
        'harga' => 'required|numeric|min:0',
        'deskripsi' => 'nullable|string',
        'gambar' => 'nullable|string', // ✅ Perbaiki dari 'nullable<string>' jadi 'nullable|string'
        // Pastikan 'id_admin' juga divalidasi jika dikirim dari frontend
    ]);

    $validated['id_admin'] = 1; // ⚠️ Sementara hardcode

    $produk = Produk::create($validated);

    return response()->json([
        'message' => 'Produk berhasil ditambahkan!',
        'produk' => $produk
    ], 201);
}
}