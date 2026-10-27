<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Catat Penjualan - Toko Online</title>
</head>
<body style="font-family: sans-serif; padding: 2rem;">
    <h1 style="color: #1a56db;">Catat Penjualan</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('sales.store') }}">
        @csrf
        <p>
            <label>Tanggal</label><br>
            <input type="date" name="sale_date" value="{{ old('sale_date', date('Y-m-d')) }}" required>
        </p>

        <h3>Barang</h3>
        <table border="1" cellpadding="8" cellspacing="0" id="items-table">
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga Jual</th>
                <th></th>
            </tr>
        </table>
        <p><button type="button" onclick="addRow()">+ Tambah Barang</button></p>

        <button type="submit" style="background: #1a56db; color: white; border: 0; padding: 0.5rem 1rem;">Simpan</button>
        <a href="{{ route('sales.index') }}">Batal</a>
    </form>

    <script>
        const products = @json($products->map(fn ($p) => ['id' => $p->id, 'name' => $p->name, 'price' => $p->selling_price, 'stock' => $p->stock]));
        let rowIndex = 0;

        function addRow() {
            const options = products
                .map(p => `<option value="${p.id}" data-price="${p.price}" data-stock="${p.stock}">${p.name} (stok ${p.stock})</option>`)
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
                <td class="price-cell">-</td>
                <td><button type="button" onclick="this.closest('tr').remove()">Hapus</button></td>
            `;
            document.getElementById('items-table').appendChild(row);
            rowIndex++;
        }

        // Harga jual hanya ditampilkan; harga sebenarnya diambil server dari database
        function fillPrice(select) {
            const opt = select.selectedOptions[0];
            const cell = select.closest('tr').querySelector('.price-cell');
            const qty = select.closest('tr').querySelector('input[type=number]');
            if (opt.dataset.price) {
                cell.textContent = 'Rp ' + Number(opt.dataset.price).toLocaleString('id-ID');
                qty.max = opt.dataset.stock;
            } else {
                cell.textContent = '-';
                qty.removeAttribute('max');
            }
        }

        addRow();
    </script>
</body>
</html>