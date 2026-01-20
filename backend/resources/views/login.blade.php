<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Page</title>
  <link rel="stylesheet" href="{{ asset('css/stylelogin.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet"/>
</head>
<body>
  <div class="container">
    <div class="form-box">
      <a href="{{ url('/') }}" class="back-btn">
        <i class="fas fa-arrow-left"></i>
      </a>

      <h1>
        <strong>HEY,</strong><br>
        <strong>WELCOME</strong><br>
        <strong>BACK</strong>
      </h1><br>
      <br>

      {{-- Menampilkan error validasi --}}
      @if ($errors->any())
        <div style="color:red; margin:10px 0;">
          @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif

      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="input-group">
          <label><i class="fas fa-envelope"></i></label>
          <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-group">
          <label><i class="fas fa-lock"></i></label>
          <input type="password" name="password" placeholder="Password" id="password" required>
          <i class="fas fa-eye toggle-password" onclick="toggleVisibility('password', this)"></i>
        </div>

        <div class="forget-pass">
          <p><a href="#">Forgot Password?</a></p>
        </div>

        <button type="submit" class="signup-btn">LOG IN</button>
        <br>
        <br>
        <br>
        <br>
      </form>

      <p class="login-link">
        Don’t have an account? <a href="{{ route('register.form') }}">Sign Up</a>
      </p>
    </div>
  </div>

  <script>
    function toggleVisibility(id, el) {
      const input = document.getElementById(id);
      if (input.type === "password") {
        input.type = "text";
        el.classList.remove("fa-eye");
        el.classList.add("fa-eye-slash");
      } else {
        input.type = "password";
        el.classList.remove("fa-eye-slash");
        el.classList.add("fa-eye");
      }
    }
  </script>
</body>
</html>
