<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign Up Page</title>
  <link rel="stylesheet" href="{{ asset('css/styleregis.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet"/>
</head>
<body>
  <div class="container">
    <div class="form-box">
      <a href="{{ route('welcome') }}" class="back-btn">
        <i class="fas fa-arrow-left"></i>
      </a>

      <h1><strong>LET'S GET</strong><br><strong>STARTED</strong></h1>
      <br>
      

      {{-- Menampilkan error validasi --}}
      @if ($errors->any())
        <div style="color: red; margin:10px 0;">
          @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif

      <form id="formRegister" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="input-group">
          <label><i class="fas fa-envelope"></i></label>
          <input 
            type="email" 
            name="email"
            id="email"
            placeholder="Email" 
            autocomplete="new-email" 
            required
          >
        </div>

        <div class="input-group">
          <label><i class="fas fa-lock"></i></label>
          <input 
            type="password" 
            name="password"
            id="password"
            placeholder="Password" 
            autocomplete="new-password" 
            required
          >
          <i class="fas fa-eye toggle-password" onclick="toggleVisibility('password', this)"></i>
        </div>

        <div class="input-group">
          <label><i class="fas fa-lock"></i></label>
          <input 
            type="password" 
            name="password_confirmation"
            id="confirmPassword"
            placeholder="Confirm Password" 
            autocomplete="new-password" 
            required
          >
          <i class="fas fa-eye toggle-password" onclick="toggleVisibility('confirmPassword', this)"></i>
        </div>

        <button type="submit" class="signup-btn">SIGN UP</button>
        <br><br><br><br>
      </form>

      <p class="login-link">
        Already have an account? <a href="{{ route('login.form') }}">Login</a>
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
