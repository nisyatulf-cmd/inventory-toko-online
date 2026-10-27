<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori</title>
    <style>
        body { font-family: sans-serif; padding: 2rem; max-width: 480px; }
        input { width: 100%; padding: .5rem; box-sizing: border-box; }
        button { margin-top: 1rem; padding: .6rem 1.2rem; background: #2563eb; color: #fff; border: 0; border-radius: 4px; cursor: pointer; }
        .error { color: #dc2626; }
    </style>
</head>
<body>
    <h1>Tambah Kategori</h1>
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        @error('name') <p class="error">{{ $message }}</p> @enderror
        <label>Nama</label>
        <input type="text" name="name" value="{{ old('name') }}">
        <button type="submit">Simpan</button>
        <a href="{{ route('categories.index') }}">Batal</a>
    </form>
</body>
</html>