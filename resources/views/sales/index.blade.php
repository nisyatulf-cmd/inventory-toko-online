<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan - Toko Nisya</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7fe; padding: 30px; }
        .container { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        h1 { color: #1e293b; margin-bottom: 20px; }
        .btn-back { display: inline-block; background: #2563eb; color: white; padding: 10px 15px; border-radius: 8px; text-decoration: none; margin-bottom: 20px; }
        .btn-add { display: inline-block; background: #16a34a; color: white; padding: 10px 15px; border-radius: 8px; text-decoration: none; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #e2e8f0; padding: 12px; text-align: left; font-size: 14px; }
        th { background: #f8fafc; color: #475569; }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('dashboard') }}" class="btn-back"><i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard</a>
        
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h1><i class="fa-solid fa-cash-register" style="color: #2563eb;"></i> Data Penjualan</h1>
            <a href="{{ route('penjualan.create') }}" class="btn-add"><i class="fa-solid fa-plus"></i> Catat Penjualan</a>
        </div>

        @if (session('success'))
            <div style="background: #f0fdf4; color: #16a34a; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sales as $sale)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sale->product->nama_produk ?? '-' }}</td>
                        <td>{{ $sale->qty }}</td>
                        <td>Rp {{ number_format($sale->total_price, 0, ',', '.') }}</td>
                        <td>{{ $sale->date ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; color: #94a3b8;">Belum ada data penjualan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>