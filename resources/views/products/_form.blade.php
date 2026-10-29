@php $product = $product ?? null; @endphp

<label for="sku">SKU</label>
<input type="text" id="sku" name="sku" value="{{ old('sku', $product->sku ?? '') }}">

<label for="name">Nama produk</label>
<input type="text" id="name" name="name" value="{{ old('name', $product->name ?? '') }}">

<label for="category_id">Kategori</label>
<select id="category_id" name="category_id">
    <option value="">-- Pilih kategori --</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}"
            {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
</select>

<div class="row">
    <div>
        <label for="purchase_price">Harga beli</label>
        <input type="number" id="purchase_price" name="purchase_price" min="0" value="{{ old('purchase_price', $product->purchase_price ?? '') }}">
    </div>
    <div>
        <label for="selling_price">Harga jual</label>
        <input type="number" id="selling_price" name="selling_price" min="0" value="{{ old('selling_price', $product->selling_price ?? '') }}">
    </div>
</div>

<div class="row">
    <div>
        <label for="stock">Stok</label>
        <input type="number" id="stock" name="stock" min="0" value="{{ old('stock', $product->stock ?? 0) }}">
    </div>
    <div>
        <label for="minimum_stock">Stok minimum</label>
        <input type="number" id="minimum_stock" name="minimum_stock" min="0" value="{{ old('minimum_stock', $product->minimum_stock ?? 5) }}">
    </div>
</div>