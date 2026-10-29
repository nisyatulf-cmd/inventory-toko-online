<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Toko Nisya</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eef2ff;
            font-family: Arial, Helvetica, sans-serif;
        }
        .card {
            width: 100%;
            max-width: 380px;
            background: #ffffff;
            border-radius: 12px;
            padding: 32px 28px;
            box-shadow: 0 8px 24px rgba(37, 99, 235, 0.15);
        }
        h1 { margin: 0 0 4px; color: #1d4ed8; font-size: 24px; }
        p.sub { margin: 0 0 24px; color: #6b7280; font-size: 14px; }
        label { display: block; margin-bottom: 6px; font-size: 14px; color: #374151; }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
        }
        input:focus { outline: 2px solid #2563eb; border-color: transparent; }
        button {
            width: 100%;
            padding: 11px;
            background: #2563eb;
            color: #ffffff;
            border: 0;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
        }
        button:hover { background: #1d4ed8; }
        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 10px 12px;
            border-radius: 8px;
            margin-bottom: 16px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Toko Nisya</h1>
        <p class="sub">Masuk untuk mengelola inventaris</p>

        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login.process') }}">
            @csrf

            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}" autofocus>

            <label for="password">Password</label>
            <input type="password" id="password" name="password">

            <button type="submit">Masuk</button>
        </form>
    </div>
</body>
</html>