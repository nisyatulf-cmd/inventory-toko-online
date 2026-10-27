<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Catat Pembelian - Toko Online</title>
</head>
<body style="font-family: sans-serif; padding: 2rem;">
    <h1 style="color: #1a56db;">Catat Pembelian</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('purchases.store') }}">
        @csrf
        <p>
            <label>Supplier</label><br>
            <select name="supplier_id" required>
                <option value="">-- Pilih supplier --</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" @selected(old('supplier_id') == $supplier->id)>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </p>
        <p>
            <label>Tanggal</label><br>
            <input type="date" name="purchase_date" value="{{ old('purchase_date', date('Y-m-d')) }}" required>
        </p>

        <h3>Barang</h3>
        <table border="1" cellpadding="8" cellspacing="0" id="items-table">
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga Beli (satuan)</th>
                <th></th>
            </tr>
        </table>
        <p><button type="button" onclick="addRow()">+ Tambah Barang</button></p>

        <button type="submit" style="background: #1a56db; color: white; border: 0; padding: 0.5rem 1rem;">Simpan</button>
        <a href="{{ route('purchases.index') }}">Batal</a>
    </form>

    <script>
        const products = @json($products->map(fn ($p) => ['id' => $p->id, 'name' => $p->name, 'price' => $p->purchase_price]));
        let rowIndex = 0;

        function addRow() {
            const options = products
                .map(p => `<option value="${p.id}" data-price="${p.price}">${p.name}</option>`)
                .join('');

            const row = document.createElement('tr');
            row.innerHTML = `
                <td>
                    <select name="items[${rowIndex}][product_id]" required onchange="fillPrice(this)">
                        <option value="">-- Pilih produk --</option>
                        ${options}
                    </select>
                </td>
                <td><input type="number" name="items[${rowIndex}][quantity]" min="1" value="1" required></td>
                <td><input type="number" name="items[${rowIndex}][unit_price]" min="0" required></td>
                <td><button type="button" onclick="this.closest('tr').remove()">Hapus</button></td>
            `;
            document.getElementById('items-table').appendChild(row);
            rowIndex++;
        }

        // Harga beli otomatis terisi dari data produk
        function fillPrice(select) {
            const price = select.selectedOptions[0].dataset.price;
            if (price !== undefined) {
                select.closest('tr').querySelector('input[name$="[unit_price]"]').value = price;
            }
        }

        addRow();
    </script>
</body>
</html>