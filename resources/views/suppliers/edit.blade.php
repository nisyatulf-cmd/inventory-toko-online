<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Supplier</title>
</head>
<body style="font-family: sans-serif; padding: 2rem;">
    <h1>Edit Supplier</h1>

    <form method="POST" action="{{ route('suppliers.update', $supplier) }}">
        @csrf
        @method('PUT')
        @include('suppliers._form')
    </form>
</body>
</html>