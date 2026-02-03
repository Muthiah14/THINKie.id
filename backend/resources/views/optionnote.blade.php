<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Option - {{ config('app.name') }}</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    
    <link rel="stylesheet" href="{{ asset('css/styleoption.css') }}" />
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
                    <img src="{{ auth()->user()->image ? asset(auth()->user()->image) . '?' . time() : asset('pct/profile.jpeg') }}" alt="img" class="profile-image">
                </a>
                <a href="{{ url('project/notification') }}">
                    <i class="fa-solid fa-bell"></i>
                </a>
                <br><br>
                <h1>HELLO, {{ Auth::user()->username ?? 'New User' }}</h1>
                <p>How are you today?</p>
            </div>
        </header>

        <form action="{{ route('optionnote') }}" method="GET" class="search-bar">
            <input type="text" name="query" placeholder="Search" />
            <button type="submit">Search</button>
        </form>

        <div class="icon-row">
            <div class="icon-box">
                {{-- ID trigger untuk JavaScript pop-up --}}
                <a href="javascript:void(0)" id="openPopup">
                    <img src="{{ asset('pct/Group 165.png') }}" alt="Note Option" />
                </a>
            </div>
            <div class="icon-box">
                <a href="{{ url('/option-list') }}">
                    <img src="{{ asset('pct/list.png') }}" alt="List Option" />
                </a>
            </div>
        </div>

        <br /><br />
        <h2>Activity History</h2>
    </div>

    <div class="overlay" onclick="window.location.href='{{ url('/dashboard') }}'">
        <div class="popup" onclick="event.stopPropagation()">
            <a href="{{ url('/private-note') }}">
                <button class="btn btn-private">Private</button>
            </a>
            <a href="{{ url('/public-note') }}">
                <button class="btn btn-public">Public</button>
            </a>
        </div>
    </div>    <script>
        const overlay = document.getElementById('popupOverlay');
        const openBtn = document.getElementById('openPopup');
        const closeBtn = document.getElementById('closePopup');

        // Buka Pop-up
        openBtn.addEventListener('click', () => {
            overlay.style.display = 'flex';
        });

        // Tutup jika klik overlay (area luar)
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) {
                overlay.style.display = 'none';
            }
        });

        // Tutup jika klik tombol cancel
        closeBtn.addEventListener('click', () => {
            overlay.style.display = 'none';
        });
    </script>
</body>
</html>