<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catat Penjualan - Toko Nisya</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7fe; padding: 30px; }
        .container { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); max-width: 600px; margin: 0 auto; }
        h1 { color: #1e293b; margin-bottom: 20px; font-size: 22px; }
        .btn-back { display: inline-block; background: #64748b; color: white; padding: 8px 14px; border-radius: 8px; text-decoration: none; margin-bottom: 20px; font-size: 14px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; font-weight: 600; color: #334155; margin-bottom: 8px; font-size: 14px; }
        input, select { width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; }
        .btn-submit { background: #2563eb; color: white; border: none; padding: 12px 20px; border-radius: 8px; cursor: pointer; font-size: 15px; font-weight: 600; width: 100%; }
        .btn-submit:hover { background: #1d4ed8; }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('penjualan.index') }}" class="btn-back"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
        <h1><i class="fa-solid fa-cash-register" style="color: #2563eb;"></i> Form Catat Penjualan</h1>

        @if ($errors->any())
            <div style="background: #ffeeec; color: #b91c1c; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 13px;">
                <ul style="margin-left: 15px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('penjualan.store') }}">
            @csrf
            
            <div class="form-group">
                <label>Tanggal Penjualan</label>
                <input type="date" name="date" value="{{ old('date', date('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
                <label>Pilih Produk</label>
                <select name="product_id" required>
                    <option value="">-- Pilih Produk --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->nama_produk ?? $product->name ?? 'Produk #' . $product->id }} (Stok: {{ $product->stok ?? $product->stock ?? 0 }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Jumlah (Qty)</label>
                <input type="number" name="qty" min="1" value="1" required>
            </div>

            <div class="form-group">
                <label>Total Harga (Rp)</label>
                <input type="number" name="total_price" placeholder="Contoh: 50000" required>
            </div>

            <button type="submit" class="btn-submit"><i class="fa-solid fa-save"></i> Simpan Penjualan</button>
        </form>
    </div>
</body>
</html>