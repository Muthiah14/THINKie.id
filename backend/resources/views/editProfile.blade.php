<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profile</title>

    {{-- Google Fonts --}}
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />

    {{-- Font Awesome --}}
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/styleedit.css') }}" />
</head>
<body>
    <div class="container">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="profile-container">
                <img
                  src="{{ Auth::user()->profile ? asset(Auth::user()->profile) : asset('pct/profile.jpeg') }}"
                  alt="profile"
                  class="profile-img"
                  id="profileImage"
                />
                <label for="fileUpload" class="upload-icon">
                  <i class="fa-solid fa-plus"></i>
                </label>
                <input
                  type="file"
                  id="fileUpload"
                  name="profile"
                  accept="image/*"
                  onchange="previewImage(event)"
                />
            </div>

            <div class="back-btn">
                <a href="{{ route('dashboard') }}">
                  <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>

            <!-- Input fields -->
            <input type="text" class="input-box" name="username"
                   placeholder="Edit Username"
                   value="{{ Auth::user()->username ?? '' }}" />

            <input type="text" class="input-box" name="bio"
                   placeholder="Add Bio"
                   value="{{ Auth::user()->bio ?? '' }}" />

            <!-- Save button -->
            <button type="submit" class="btn">SAVE</button>
        </form>
    </div>

    <script>
      function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
          document.getElementById("profileImage").src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
      }
    </script>
</body>
</html>
