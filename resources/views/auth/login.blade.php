<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coffee House - Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
    @include('components.headerKedua')

  <div class="card-login">
    <h1>Coffe Colon</h1>
    <p>Selamat datang pengunjung ☕️</p>

    <!-- Laravel form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

      <div class="container-input">

        <!-- Email -->
        <div class="form-group">
          <input id="email" type="email" name="email"
                 value="{{ old('email') }}"
                 placeholder="Email" required autofocus autocomplete="username">
          @error('email')
            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
          @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
          <input id="password" type="password" name="password"
                 placeholder="Password" required autocomplete="current-password">
          @error('password')
            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <!-- Remember me + Forgot password -->
      <div class="options flex items-center justify-between">

        <label>
          <input id="remember_me" type="checkbox" name="remember"> Ingat saya
        </label>

        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}">Lupa password?</a>
        @endif
      </div>

      <!-- Submit -->
      <button type="submit" class="btn-login">
        <i class="fas fa-mug-hot"></i> Masuk
      </button>
    </form>

    <!-- Register -->
    <div class="footer">
        @if (Route::has('register'))
          Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
        @endif
    </div>
  </div>
</body>

</html>
