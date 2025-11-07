<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar EcoBank</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="login-body">
  <div class="login-container">
    <div class="login-card">
      <h1>🌿 EcoBank</h1>
      <h2>Buat Akun Baru</h2>
      
      @if(session('error'))
        <div class="error-message" style="color: red; text-align:center; margin-bottom: 10px;">
          {{ session('error') }}
        </div>
      @endif

      @if(session('success'))
        <div class="success-message" style="color: green; text-align:center; margin-bottom: 10px;">
          {{ session('success') }}
        </div>
      @endif

      <form action="{{ route('register.process') }}" method="POST">
        @csrf

        <div class="form-group">
          <label for="username">Nama Pengguna</label>
          <input type="text" id="username" name="username" placeholder="Masukkan username" required>
        </div>

        <div class="form-group">
          <label for="password">Kata Sandi</label>
          <input type="password" id="password" name="password" placeholder="Masukkan password" required>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Masukkan email" required>
        </div>

        <div class="form-group">
          <label for="no_hp">Nomor HP</label>
          <input type="text" id="no_hp" name="no_hp" placeholder="Masukkan nomor HP" required>
        </div>

        <button type="submit" class="btn-login">Daftar</button>
      </form>

      <p class="register-text">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
    </div>
  </div>
</body>
</html>
