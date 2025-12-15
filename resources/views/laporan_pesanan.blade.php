<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pesanan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #666; padding: 6px; text-align: left; }
        th { background: #eee; }
        h2 { text-align: center; margin-bottom: 0; }
    </style>
</head>
<body>

    <h2>LAPORAN PESANAN AJUSSI JUICE</h2>
    <p style="text-align:center;">Per {{ $tanggal }}</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->user->nama ?? '-' }}</td>
                <td>{{ date('d/m/Y H:i', strtotime($p->created_at)) }}</td>
                <td>Rp {{ number_format($p->total_harga, 0, ',', '.') }}</td>
                <td>{{ $p->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3 style="margin-top:20px;">Total Pendapatan:  
        Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
    </h3>

</body>
</html>
