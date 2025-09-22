<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coffee House - Register</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://unpkg.com/feather-icons"></script>
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
    <h1>Coffe Colon</h1>
    <p>Daftar untuk mulai menikmati layanan kami ☕️</p>

    <!-- Laravel Register Form -->
    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="container-input">

        <!-- Name -->
        <div class="form-group">
          <input id="name" type="text" name="name"
                 value="{{ old('name') }}"
                 placeholder="Nama Lengkap" required autofocus autocomplete="name">
          @error('name')
            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
          @enderror
        </div>

        <!-- Email -->
        <div class="form-group">
          <input id="email" type="email" name="email"
                 value="{{ old('email') }}"
                 placeholder="Email" required autocomplete="username">
          @error('email')
            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
          @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
          <input id="password" type="password" name="password"
                 placeholder="Password" required autocomplete="new-password">
          @error('password')
            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
          @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
          <input id="password_confirmation" type="password"
                 name="password_confirmation"
                 placeholder="Konfirmasi Password" required autocomplete="new-password">
          @error('password_confirmation')
            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
          @enderror
        </div>

      </div>

      <!-- Submit -->
      <button type="submit" class="btn-login">
        <i class="fas fa-user-plus"></i> Daftar
      </button>
    </form>

    <!-- Login link -->
    <div class="footer">
      <p>Sudah punya akun?
        <a href="{{ route('login') }}">Login</a>
      </p>
    </div>
  </div>
</body>

</html>
