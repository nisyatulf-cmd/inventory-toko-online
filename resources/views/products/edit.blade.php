<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk - Toko Online</title>
</head>
<body style="font-family: sans-serif; padding: 2rem;">
    <h1 style="color: #1a56db;">Edit Produk</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')
        <p>
            <label>SKU</label><br>
            <input type="text" name="sku" value="{{ old('sku', $product->sku) }}" required>
        </p>
        <p>
            <label>Nama</label><br>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
        </p>
        <p>
            <label>Kategori</label><br>
            <select name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </p>
        <p>
            <label>Harga Beli</label><br>
            <input type="number" name="purchase_price" min="0" value="{{ old('purchase_price', $product->purchase_price) }}" required>
        </p>
        <p>
            <label>Harga Jual</label><br>
            <input type="number" name="selling_price" min="0" value="{{ old('selling_price', $product->selling_price) }}" required>
        </p>
        <p>
            <label>Stok</label><br>
            <input type="number" name="stock" min="0" value="{{ old('stock', $product->stock) }}" required>
        </p>
        <p>
            <label>Stok Minimum</label><br>
            <input type="number" name="minimum_stock" min="0" value="{{ old('minimum_stock', $product->minimum_stock) }}" required>
        </p>
        <button type="submit" style="background: #1a56db; color: white; border: 0; padding: 0.5rem 1rem;">Simpan</button>
        <a href="{{ route('products.index') }}">Batal</a>
    </form>
</body>
</html>