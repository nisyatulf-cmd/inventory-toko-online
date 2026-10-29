  <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f3f4f6; margin: 0; padding: 30px; }
        .box { max-width: 560px; margin: 0 auto; background: #fff; padding: 24px; border-radius: 10px; }
        h1 { color: #1d4ed8; margin-top: 0; }
        label { display: block; margin: 14px 0 6px; font-weight: bold; }
        input, select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box; }
        .row { display: flex; gap: 12px; }
        .row > div { flex: 1; }
        button { margin-top: 18px; padding: 10px 20px; background: #2563eb; color: #fff; border: 0; border-radius: 6px; cursor: pointer; }
        a { margin-left: 10px; color: #555; }
        .error { background: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 6px; }
    </style>
</head>
<body>
    <div class="box">
        <h1>Tambah Produk</h1>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <label for="sku">SKU</label>
            <input type="text" id="sku" name="sku" value="{{ old('sku') }}">

            <label for="name">Nama produk</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">

            <label for="category_id">Kategori</label>
            <select id="category_id" name="category_id">
                <option value="">-- Pilih kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <div class="row">
                <div>
                    <label for="purchase_price">Harga beli</label>
                    <input type="number" id="purchase_price" name="purchase_price" min="0" value="{{ old('purchase_price') }}">
                </div>
                <div>
                    <label for="selling_price">Harga jual</label>
                    <input type="number" id="selling_price" name="selling_price" min="0" value="{{ old('selling_price') }}">
                </div>
            </div>

            <div class="row">
                <div>
                    <label for="stock">Stok awal</label>
                    <input type="number" id="stock" name="stock" min="0" value="{{ old('stock', 0) }}">
                </div>
                <div>
                    <label for="minimum_stock">Stok minimum</label>
                    <input type="number" id="minimum_stock" name="minimum_stock" min="0" value="{{ old('minimum_stock', 5) }}">
                </div>
            </div>

            <button type="submit">Simpan</button>
            <a href="{{ route('products.index') }}">Batal</a>
        </form>
    </div>
</body>
</html>