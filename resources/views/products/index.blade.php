<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk - Toko Online</title>
</head>
<body style="font-family: sans-serif; padding: 2rem;">
    <h1 style="color: #1a56db;">Daftar Produk</h1>
    <p><a href="{{ route('dashboard') }}">&larr; Dashboard</a></p>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @can('admin')
        <p><a href="{{ route('products.create') }}">+ Tambah Produk</a></p>
    @endcan

    <form method="GET" action="{{ route('products.index') }}" style="margin-bottom: 1rem;">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari SKU / nama">
        <select name="category_id">
            <option value="">Semua kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(request('category_id') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <button type="submit" style="background: #1a56db; color: white; border: 0; padding: 0.4rem 0.9rem;">Cari</button>
    </form>

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%;">
        <tr style="background: #1a56db; color: white;">
            <th>No</th>
            <th>SKU</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            @can('admin')
                <th>Aksi</th>
            @endcan
        </tr>
        @forelse ($products as $product)
            <tr>
                <td>{{ $products->firstItem() + $loop->index }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>Rp {{ number_format($product->selling_price, 0, ',', '.') }}</td>
                <td style="{{ $product->stock <= $product->minimum_stock ? 'color: red; font-weight: bold;' : '' }}">
                    {{ $product->stock }}
                </td>
                @can('admin')
                    <td>
                        <a href="{{ route('products.edit', $product) }}">Edit</a>
                        <form method="POST" action="{{ route('products.destroy', $product) }}" style="display: inline;" onsubmit="return confirm('Hapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: #1a56db; color: white; border: 0; padding: 0.2rem 0.6rem;">Hapus</button>
                        </form>
                    </td>
                @endcan
            </tr>
        @empty
            <tr>
                <td colspan="7">Belum ada produk.</td>
            </tr>
        @endforelse
    </table>

    <div style="margin-top: 1rem;">
        {{ $products->links() }}
    </div>
</body>
</html>