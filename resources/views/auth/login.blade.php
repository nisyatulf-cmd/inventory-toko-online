<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login - Toko Online</title>
<style>
body{margin:0;font-family:'Segoe UI',system-ui,sans-serif;background:#f2f7ff;color:#1f2937;padding:2rem}
.card{max-width:400px;margin:3rem auto;background:#fff;border-radius:16px;padding:1.6rem;box-shadow:0 2px 8px rgba(29,111,242,.12)}
h1{margin:0 0 1rem;color:#1553c7;font-size:1.5rem}
label{display:block;font-weight:600;margin:.9rem 0 .3rem}
input{width:100%;box-sizing:border-box;padding:.65rem .8rem;border:1px solid #e5e7eb;border-radius:10px;font-size:.95rem}
.err{color:#e11d48;font-size:.85rem;margin-top:.25rem}
.btn{width:100%;margin-top:1.3rem;background:#1d6ff2;color:#fff;border:0;padding:.7rem;border-radius:10px;font-weight:600;cursor:pointer}
</style>
</head>
<body>
<div class="card">
  <h1>Login</h1>
  <form method="POST" action="{{ url('/login') }}">
    @csrf

    <label>Email</label>
    <input type="email" name="email" value="{{ old('email') }}" autofocus>
    @error('email')<div class="err">{{ $message }}</div>@enderror

    <label>Password</label>
    <input type="password" name="password">
    @error('password')<div class="err">{{ $message }}</div>@enderror

    <button type="submit" class="btn">Masuk</button>
  </form>
</div>
</body>
</html>