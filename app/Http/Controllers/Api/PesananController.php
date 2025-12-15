<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    // ===========================
    // GET SEMUA PESANAN
    // ===========================
    public function index()
    {
        return Pesanan::with([
            'user:id,nama',
            'details.produk:id_produk,nama_produk,harga'
        ])
        ->orderBy('created_at', 'DESC')
        ->get();
    }

    // ===========================
    // SHOW DETAIL PESANAN
    // ===========================
    public function show($id)
    {
        return Pesanan::with([
            'user:id,nama',
            'details.produk:id_produk,nama_produk,harga'
        ])->findOrFail($id);
    }

    // ===========================
    // STORE ADMIN
    // ===========================
    public function store(Request $request)
    {
        return $this->createOrder($request);
    }

    // ===========================
    // STORE USER
    // ===========================
    public function storeUser(Request $request)
    {
        return $this->createOrder($request);
    }

    // ===========================
    // FUNCTION CREATE ORDER (dipakai dua-duanya)
    // ===========================
    private function createOrder(Request $request)
    {
        $request->validate([
            'id_user' => 'required|integer',
            'items' => 'required|array|min:1',
            'items.*.id_produk' => 'required|integer',
            'items.*.jumlah' => 'required|integer|min:1',
            'items.*.subtotal' => 'required|numeric|min:0',
            'total_harga' => 'required|numeric|min:0',
        ]);

        // Pastikan produk ada berdasarkan id_produk
        $produkIDs = collect($request->items)->pluck('id_produk');
        $produkFound = Produk::whereIn('id_produk', $produkIDs)->pluck('id_produk');

        if ($produkFound->count() !== count($produkIDs)) {
            return response()->json([
                "message" => "Beberapa produk tidak ditemukan",
                "produk_dikirim" => $produkIDs,
                "produk_ada" => $produkFound,
            ], 422);
        }

        // Buat pesanan
        $pesanan = Pesanan::create([
            'id_user'        => $request->id_user,
            'total_harga'    => $request->total_harga,
            'status'         => 'Menunggu',
            'tanggal_pesan'  => now(),
        ]);

        // Insert detail pesanan
        foreach ($request->items as $item) {
            DetailPesanan::create([
                'id_pesanan' => $pesanan->id,
                'id_produk'  => $item['id_produk'],
                'jumlah'     => $item['jumlah'],
                'subtotal'   => $item['subtotal'],
            ]);
        }

        return response()->json([
            'message' => 'Pesanan berhasil dibuat!',
            'pesanan' => $pesanan->load('details.produk')
        ], 201);
    }

    // ===========================
    // UPDATE PESANAN
    // ===========================
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'nullable|string',
            'total_harga' => 'nullable|numeric',
        ]);

        $pesanan = Pesanan::findOrFail($id);

        if ($request->has('status')) {
            $pesanan->status = $request->status;
        }
        if ($request->has('total_harga')) {
            $pesanan->total_harga = $request->total_harga;
        }

        $pesanan->save();

        return response()->json([
            'message' => 'Pesanan berhasil diperbarui',
            'pesanan' => $pesanan,
        ]);
    }

    // ===========================
    // DELETE PESANAN
    // ===========================
    public function destroy($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();

        return response()->json(['message' => 'Pesanan berhasil dihapus']);
    }

    // ===========================
    // GET PESANAN USER
    // ===========================
    public function userOrders($id_user)
    {
        return Pesanan::with([
            'user:id,nama',
            'details.produk:id_produk,nama_produk,harga'
        ])
        ->where('id_user', $id_user)
        ->orderBy('created_at', 'DESC')
        ->get();
    }

    // ===========================
    // DOWNLOAD PDF LAPORAN PESANAN
    // ===========================
    public function downloadPdf()
    {
        $pesanan = Pesanan::with([
            'user:id,nama',
            'details.produk:id_produk,nama_produk,harga'
        ])
        ->orderBy('created_at', 'DESC')
        ->get();

        $totalPendapatan = $pesanan->sum('total_harga');

        $data = [
            'pesanan' => $pesanan,
            'totalPendapatan' => $totalPendapatan,
            'tanggal' => now()->format('d M Y H:i'),
        ];

        $pdf = \PDF::loadView('pdf.laporan_pesanan', $data)
            ->setPaper('A4', 'portrait');

        return $pdf->download('laporan_pesanan_' . date('Ymd_His') . '.pdf');
    }

    public function uploadPayment(Request $request, $id)
{
    $request->validate([
        "bukti_transfer" => "required|image|mimes:jpg,jpeg,png|max:2048"
    ]);

    $pesanan = Pesanan::findOrFail($id);

    // Upload file
    $file = $request->file("bukti_transfer");
    $filename = time() . "_" . $file->getClientOriginalName();
    $file->move(public_path("uploads/bukti"), $filename);

    // Update pesanan
    $pesanan->bukti_transfer = $filename;
    $pesanan->status = "diproses"; // setelah bayar
    $pesanan->save();

    return response()->json([
        "message" => "Pembayaran berhasil diunggah",
        "pesanan" => $pesanan
    ]);
}

}
