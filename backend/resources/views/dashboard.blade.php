<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />

    {{-- Font Awesome --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/styleboard.css') }}" />
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <div>
                <a href="{{ url('project/folder') }}">
                    <i class="fa-solid fa-square-plus"></i>
                </a>
                <a href="{{ url('editProfile') }}">
                    <img src="{{ asset('pct/profile.jpeg') }}" alt="img" class="profile-image">
                </a>
                <a href="{{ url('project/notification') }}">
                    <i class="fa-solid fa-bell"></i>
                </a>
                <br><br>
                <h1>HELLO, {{ Auth::user()->username ?? 'New User' }}</h1>
                <p>How are you today?</p>
            </div>
        </header>

        <!-- Search -->
        <div class="search-bar">
            <input type="text" placeholder="Search" />
            <button>Search</button>
        </div>

        <!-- Icon buttons -->
        <div class="icon-row">
            <div class="icon-box">
                <a href="{{ url('project/optionnote') }}">
                    <img src="{{ asset('pct/Group 165.png') }}" alt="">
                </a>
            </div>
            <div class="icon-box">
                <a href="{{ url('project/optionlist') }}">
                    <img src="{{ asset('pct/list.png') }}" alt="">
                </a>
            </div>
        </div>

        <!-- Activity History -->
        <br><br>
        <h2>Activity History</h2>
    </div>
</body>
</html>
