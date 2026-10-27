<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Supplier</title>
</head>
<body style="font-family: sans-serif; padding: 2rem;">
    <h1>Tambah Supplier</h1>

    <form method="POST" action="{{ route('suppliers.store') }}">
        @csrf
        @include('suppliers._form')
    </form>
</body>
</html>