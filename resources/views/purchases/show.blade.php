<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pembelian - Toko Online</title>
</head>
<body style="font-family: sans-serif; padding: 2rem;">
    <h1 style="color: #1a56db;">Detail Pembelian #{{ $purchase->id }}</h1>
    <p><a href="{{ route('purchases.index') }}">&larr; Daftar Pembelian</a></p>

    <p>Tanggal: {{ $purchase->purchase_date->format('d/m/Y') }}</p>
    <p>Supplier: {{ $purchase->supplier->name }}</p>
    <p>Petugas: {{ $purchase->user->name }}</p>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr style="background: #1a56db; color: white;">
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Subtotal</th>
        </tr>
        @foreach ($purchase->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rp {{ number_format($item->unit_price, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3"><strong>Total</strong></td>
            <td><strong>Rp {{ number_format($purchase->total, 0, ',', '.') }}</strong></td>
        </tr>
    </table>
</body>
</html>