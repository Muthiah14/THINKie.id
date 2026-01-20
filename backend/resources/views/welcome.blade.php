<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>THINKie</title>

  {{-- CSS --}}
  <link rel="stylesheet" href="{{ asset('css/stylewelcome.css') }}" />

  {{-- Fonts --}}
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="content">
        <h1 class="logo">
          <span class="bold">THINK</span><span class="accent">ie</span>
        </h1>

        <p class="subtitle">
          Make your day more productive starting from yourself with
          <span class="bold">THINKie.</span>
        </p>

        <div class="shapes">
          <img src="{{ asset('pct/logo.png') }}" alt="Logo THINKie" />
        </div>

        <div class="buttons">
          <button class="create-btn">
            <a href="{{ route('register.form') }}" class="createe">
              CREATE ACCOUNT
            </a>
          </button>

          <button class="login-btn">
            <a href="{{ route('login.form') }}" class="logiin">
              LOG IN
            </a>
          </button>
        </div>
      </div>
    </div>
  </div>

  {{-- JS --}}
  <script src="{{ asset('js/welcome.js') }}"></script>
</body>
</html>
