<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - Toko Nisya</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7fe; padding: 30px; }
        .container { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        h1 { color: #1e293b; margin-bottom: 20px; }
        .btn-back { display: inline-block; background: #2563eb; color: white; padding: 10px 15px; border-radius: 8px; text-decoration: none; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #e2e8f0; padding: 12px; text-align: left; font-size: 14px; }
        th { background: #f8fafc; color: #475569; }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('dashboard') }}" class="btn-back"><i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard</a>
        <h1><i class="fa-solid fa-file-lines" style="color: #2563eb;"></i> Laporan Toko Nisya</h1>
        
        <div style="display: flex; gap: 20px; margin-bottom: 30px;">
            <div style="background: #eff6ff; padding: 20px; border-radius: 10px; flex: 1;">
                <h3 style="color: #1e293b; font-size: 14px; margin-bottom: 5px;">Total Pembelian</h3>
                <p style="font-size: 24px; font-weight: bold; color: #2563eb;">Rp {{ number_format($totalPembelian, 0, ',', '.') }}</p>
            </div>
            <div style="background: #f0fdf4; padding: 20px; border-radius: 10px; flex: 1;">
                <h3 style="color: #1e293b; font-size: 14px; margin-bottom: 5px;">Total Penjualan</h3>
                <p style="font-size: 24px; font-weight: bold; color: #16a34a;">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</p>
            </div>
        </div>

        <h3>Riwayat Pembelian</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Supplier</th>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @forelse($purchases as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->supplier->nama_supplier ?? '-' }}</td>
                    <td>{{ $p->product->nama_produk ?? '-' }}</td>
                    <td>{{ $p->qty }}</td>
                    <td>Rp {{ number_format($p->total_price, 0, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #94a3b8;">Belum ada data pembelian.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>