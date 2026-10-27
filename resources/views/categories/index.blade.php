<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kategori</title>
    <style>
        body { font-family: sans-serif; padding: 2rem; }
        h1 { color: #2563eb; }
        table { border-collapse: collapse; width: 100%; margin-top: 1rem; }
        th { background: #2563eb; color: #fff; text-align: left; padding: .6rem; }
        td { border-bottom: 1px solid #ddd; padding: .6rem; }
        .btn { background: #2563eb; color: #fff; padding: .3rem .7rem; border: 0; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Kategori</h1>
    <a href="{{ route('dashboard') }}">&larr; Dashboard</a> |
    <a href="{{ route('categories.create') }}">+ Tambah Kategori</a>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif
    @error('delete') <p style="color:#dc2626">{{ $message }}</p> @enderror

    <table>
        <tr><th>No</th><th>Nama</th><th>Jumlah Produk</th><th>Aksi</th></tr>
        @forelse ($categories as $category)
            <tr>
                <td>{{ $categories->firstItem() + $loop->index }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->products_count }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category) }}">Edit</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">Belum ada kategori.</td></tr>
        @endforelse
    </table>

    <div style="margin-top:1rem">{{ $categories->links() }}</div>
</body>
</html>