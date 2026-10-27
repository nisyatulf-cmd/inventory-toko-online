<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tambah Produk - Toko Online</title>
<style>
body{margin:0;font-family:'Segoe UI',system-ui,sans-serif;background:#f2f7ff;color:#1f2937;padding:2rem}
.card{max-width:520px;margin:0 auto;background:#fff;border-radius:16px;padding:1.6rem;box-shadow:0 2px 8px rgba(29,111,242,.12)}
h1{margin:0 0 1rem;color:#1553c7;font-size:1.5rem}
label{display:block;font-weight:600;margin:.9rem 0 .3rem}
input,select{width:100%;padding:.65rem .8rem;border:1px solid #e5e7eb;border-radius:10px;font-size:.95rem}
.err{color:#e11d48;font-size:.85rem;margin-top:.25rem}
.row{display:flex;gap:.8rem}
.row>div{flex:1}
.btn{background:#1d6ff2;color:#fff;border:0;padding:.7rem 1.2rem;border-radius:10px;font-weight:600;cursor:pointer;text-decoration:none;display:inline-block}
.btn-light{background:#e6f0ff;color:#1d6ff2}
.actions{display:flex;gap:.5rem;margin-top:1.3rem}
</style>
</head>
<body>
<div class="card">
  <h1>Tambah Produk</h1>
  <form method="POST" action="{{ route('products.store') }}">
    @csrf

    <label>SKU</label>
    <input type="text" name="sku" value="{{ old('sku') }}">
    @error('sku')<div class="err">{{ $message }}</div>@enderror

    <label>Nama produk</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')<div class="err">{{ $message }}</div>@enderror

    <label>Kategori</label>
    <select name="category_id">
      <option value="">-- Pilih kategori --</option>
      @foreach ($categories as $category)
        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
      @endforeach
    </select>
    @error('category_id')<div class="err">{{ $message }}</div>@enderror

    <div class="row">
      <div>
        <label>Harga beli</label>
        <input type="number" name="purchase_price" min="0" value="{{ old('purchase_price') }}">
        @error('purchase_price')<div class="err">{{ $message }}</div>@enderror
      </div>
      <div>
        <label>Harga jual</label>
        <input type="number" name="selling_price" min="0" value="{{ old('selling_price') }}">
        @error('selling_price')<div class="err">{{ $message }}</div>@enderror
      </div>
    </div>

    <div class="row">
      <div>
        <label>Stok awal</label>
        <input type="number" name="stock" min="0" value="{{ old('stock', 0) }}">
        @error('stock')<div class="err">{{ $message }}</div>@enderror
      </div>
      <div>
        <label>Stok minimum</label>
        <input type="number" name="minimum_stock" min="0" value="{{ old('minimum_stock', 5) }}">
        @error('minimum_stock')<div class="err">{{ $message }}</div>@enderror
      </div>
    </div>

    <div class="actions">
      <button type="submit" class="btn">Simpan</button>
      <a href="{{ route('products.index') }}" class="btn btn-light">Batal</a>
    </div>
  </form>
</div>
</body>
</html>