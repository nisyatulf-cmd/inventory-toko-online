<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Supplier - Toko Nisya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-4" style="max-width: 560px;">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h4 class="fw-bold text-primary mb-4">Tambah Supplier</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('supplier.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_supplier" class="form-label">Nama</label>
                        <input type="text" id="nama_supplier" name="nama_supplier"
                               class="form-control" value="{{ old('nama_supplier') }}">
                    </div>

                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" id="telepon" name="telepon"
                               class="form-control" value="{{ old('telepon') }}">
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea id="alamat" name="alamat" rows="3"
                                  class="form-control">{{ old('alamat') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary fw-bold">Simpan</button>
                    <a href="{{ route('supplier.index') }}" class="btn btn-light">Batal</a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>