@if ($errors->any())
    <ul class="error">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<label>SKU</label>
<input type="text" name="sku" value="{{ old('sku', $product->sku ?? '') }}">

<label>Nama</label>
<input type="text" name="name" value="{{ old('name', $product->name ?? '') }}">

<label>Kategori</label>
<select name="category_id">
    <option value="">-- Pilih kategori --</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}"
            {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
</select>

<label>Harga Beli</label>
<input type="number" name="purchase_price" min="0" value="{{ old('purchase_price', $product->purchase_price ?? '') }}">

<label>Harga Jual</label>
<input type="number" name="selling_price" min="0" value="{{ old('selling_price', $product->selling_price ?? '') }}">

<label>Stok</label>
<input type="number" name="stock" min="0" value="{{ old('stock', $product->stock ?? 0) }}">

<label>Stok Minimum</label>
<input type="number" name="minimum_stock" min="0" value="{{ old('minimum_stock', $product->minimum_stock ?? 0) }}">

<button type="submit">Simpan</button>
<a href="{{ route('products.index') }}">Batal</a>