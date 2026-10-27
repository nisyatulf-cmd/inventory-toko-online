@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<p>
    <label>Nama</label><br>
    <input type="text" name="name" value="{{ old('name', $supplier->name ?? '') }}" required>
</p>
<p>
    <label>Telepon</label><br>
    <input type="text" name="phone" value="{{ old('phone', $supplier->phone ?? '') }}">
</p>
<p>
    <label>Alamat</label><br>
    <textarea name="address" rows="3">{{ old('address', $supplier->address ?? '') }}</textarea>
</p>
<button type="submit">Simpan</button>
<a href="{{ route('suppliers.index') }}">Batal</a>