<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coffee House - Lupa Password</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <style>
        body {
        font-family: 'Poppins', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: linear-gradient(to bottom right, #f3ebe7, #e4d1c6, #fdfcfb);
        color: #422b21;
        }
  </style>
  @include('components.headerKedua')

  <div class="card-login">
    <h1>Lupa Password</h1>
    <p>Masukkan email kamu, nanti kami kirim link reset password 📩</p>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
      @csrf

      <div class="form-group">
        <input id="email" type="email" name="email"
               value="{{ old('email') }}"
               placeholder="Email"
               required autofocus>
        @error('email')
          <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn-login">
        Kirim Link Reset
      </button>
    </form>

    <div class="footer">
      <p>Sudah ingat password? <a href="{{ route('login') }}">Login</a></p>
    </div>
  </div>
</body>
</html>
