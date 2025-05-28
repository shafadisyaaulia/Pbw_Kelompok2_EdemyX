<!DOCTYPE html>
<html lang="en"> {{-- Ganti ke "id" jika perlu --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Profile - EdemyX')</title>

    {{-- CSS Anda --}}
    <link rel="stylesheet" href="{{ asset('css/navbar-sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/popup.css') }}"> --}} {{-- Uncomment jika styling modal/popup terpisah --}}

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Styling untuk error server-side (contoh) --}}
    <style>
        .server-error { color: #dc3545; font-size: 0.875em; margin-top: .25rem; display: block; }
        .form-group .server-error { padding-left: 0; /* Sesuaikan jika perlu */ }
         /* Styling untuk status message (jika digunakan) */
         .status-message {
             padding: 10px;
             margin-bottom: 15px;
             border-radius: 4px;
             background-color: #d1e7dd;
             color: #0f5132;
             border: 1px solid #badbcc;
             text-align: center;
        }
    </style>
</head>
<body>
      <!-- Unified Navigation -->
      <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-left">
                <div class="logo">
                    <a href="{{ url('/') }}">EdemyX</a>
                </div>
                <ul class="nav-links">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">Explore <i class="fas fa-chevron-down"></i></a>
                        <div class="dropdown-menu">
                           <div class="dropdown-container"> {{-- Konten dropdown --}} </div>
                        </div>
                    </li>
                    <li><a href="{{ route('courses.index') }}">Courses</a></li> {{-- Gunakan route name --}}
                    <li><a href="{{ route('categories.index') }}">Categories</a></li> {{-- Gunakan route name --}}
                </ul>
            </div>
            <div class="navbar-center">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search for courses...">
                </div>
            </div>
            <div class="navbar-right">
                <a href="{{ route('wishlist') }}" class="nav-icon"><i class="fas fa-heart"></i></a> {{-- Gunakan route name --}}
                <a href="{{ route('notifications') }}" class="nav-icon"><i class="fas fa-bell"></i></a> {{-- Gunakan route name --}}
                <div class="user-menu">
                    {{-- Tampilkan gambar profil user yg login, fallback ke default --}}
                    <img src="{{ asset(Auth::user()->profile_picture ?? 'images/profile.jpg') }}" alt="Profile Picture" id="profile-pic-nav" class="user-avatar profile-pic">
                    <div class="user-dropdown">
                        <a href="{{ route('dashboard') }}">Dashboard</a> {{-- Gunakan route name --}}
                        <a href="{{ route('my-courses') }}">My Courses</a> {{-- Gunakan route name --}}
                        <a href="{{ route('profile.show') }}">Profile</a> {{-- Gunakan route name --}}
                        <a href="{{ route('settings') }}">Settings</a> {{-- Gunakan route name --}}
                        {{-- Form Logout --}}
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form-nav').submit();">
                            Logout
                        </a>
                        <form id="logout-form-nav" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{-- Konten Utama (Sidebar + Profile Content) --}}
    <div class="main-content">
        <!-- Sidebar -->
        <aside class="sidebar">
            <ul class="sidebar-menu">
                <li><a href="{{ route('dashboard') }}"><i class="fas fa-th-large"></i> Dashboard</a></li>
                <li><a href="{{ route('my-courses') }}"><i class="fas fa-book"></i> My Courses</a></li>
                <li><a href="{{ route('certificates') }}"><i class="fas fa-certificate"></i> Certificates</a></li>
                <li><a href="{{ route('progress') }}"><i class="fas fa-chart-line"></i> Progress</a></li>
                <li><a href="{{ route('schedule') }}"><i class="fas fa-calendar"></i> Schedule</a></li>
                <li class="active"><i class="fas fa-user"></i> Profile</li> {{-- Tandai Aktif --}}
            </ul>
        </aside>

        {{-- Konten Profile --}}
        <div class="profile-content">
            <div class="profile-section">

                {{-- Menampilkan pesan sukses setelah update profile --}}
                @if (session('status') === 'profile-updated')
                    <div class="status-message">
                       Profile updated successfully!
                    </div>
                @endif

                <div class="profile-header">
                    <div class="profile-image-container">
                        <div class="profile-image">
                            {{-- Tampilkan gambar profil user yg login --}}
                            <img src="{{ asset(Auth::user()->profile_picture ?? 'images/profile.jpg') }}" alt="Profile Picture" class="profile-pic" id="profile-pic-main">
                        </div>
                    </div>

                    <div class="profile-info">
                        {{-- Tampilkan data user yg login --}}
                        <div class="info-item">
                            <i class="fas fa-user"></i>
                            <div class="info-content">
                                <label>NAME</label>
                                <p id="name">{{ Auth::user()->name ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-envelope"></i>
                            <div class="info-content">
                                <label>EMAIL ADDRESS</label>
                                <p id="email">{{ Auth::user()->email ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-phone"></i>
                            <div class="info-content">
                                <label>PHONE NUMBER</label>
                                {{-- Sesuaikan 'phone_number' jika nama kolom beda --}}
                                <p id="phone">{{ Auth::user()->phone_number ?? 'Not Set' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="profile-actions">
                        {{-- Tombol buka modal edit --}}
                        <button class="edit-profile-btn" onclick="showEditModal()">
                            <i class="fas fa-pen"></i> EDIT PROFILE
                        </button>
                        {{-- Tombol buka popup logout --}}
                        <button class="logout-btn" onclick="showPopup()">
                            <i class="fas fa-sign-out-alt"></i> LOGOUT
                        </button>
                    </div>
                </div>
            </div>
        </div> {{-- Akhir profile-content --}}
    </div> {{-- Akhir main-content --}}

    <!-- Popup Konfirmasi Logout -->
    <div class="popup" id="confirmationPopup" style="display: none;">
        <div class="popup-content">
            <div class="icon-container"><i class="exclamation">!</i></div>
            <div class="popup-text"><h2>Are you sure?</h2><p>Are you sure you want to logout?</p></div>
            <div class="popup-buttons">
                <button class="cancel-btn" onclick="closePopup()">Cancel</button>
                <button class="confirm-btn" onclick="document.getElementById('logout-form-popup').submit();">Logout</button>
            </div>
        </div>
    </div>
    <form id="logout-form-popup" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>

    <!-- Modal Edit Profile -->
    <div class="modal" id="editProfileModal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Profile</h2>
                <button type="button" class="close-modal-btn" onclick="closeEditModal()" style="background:none; border:none; font-size: 1.5rem; cursor:pointer;">×</button>
            </div>
            {{-- Form diedit untuk mengirim ke route update profile Breeze --}}
            <form id="editProfileForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH') {{-- Breeze menggunakan PATCH untuk update profile --}}

                {{-- Input Gambar Profile --}}
                <div class="form-group">
                    <label>Profile Picture</label>
                    <div class="profile-upload">
                        <img id="previewImage" src="{{ asset(Auth::user()->profile_picture ?? 'images/profile.jpg') }}" alt="Profile Picture Preview">
                        {{-- name="profile_picture" (sesuaikan jika controller beda) --}}
                        <input type="file" id="profilePictureInput" name="profile_picture" accept="image/*">
                        <label for="profilePictureInput" class="upload-btn"><i class="fas fa-camera"></i> Change Photo</label>
                    </div>
                    @error('profile_picture') <span class="server-error">{{ $message }}</span> @enderror
                </div>

                {{-- Input Nama --}}
                <div class="form-group">
                    <label for="editName">Name</label>
                    {{-- name="name" (sesuai request ProfileController) --}}
                    <input type="text" id="editName" name="name" value="{{ old('name', Auth::user()->name ?? '') }}" required>
                    @error('name') <span class="server-error">{{ $message }}</span> @enderror
                </div>

                {{-- Input Email --}}
                <div class="form-group">
                    <label for="editEmail">Email Address</label>
                    {{-- name="email" (sesuai request ProfileController) --}}
                    <input type="email" id="editEmail" name="email" value="{{ old('email', Auth::user()->email ?? '') }}" required>
                    @error('email') <span class="server-error">{{ $message }}</span> @enderror
                </div>

                {{-- Input Phone Number --}}
                <div class="form-group">
                    <label for="editPhone">Phone Number</label>
                    {{-- name="phone_number" (sesuaikan dengan nama field di DB & validasi) --}}
                    <input type="tel" id="editPhone" name="phone_number" value="{{ old('phone_number', Auth::user()->phone_number ?? '') }}">
                    @error('phone_number') <span class="server-error">{{ $message }}</span> @enderror
                </div>

                <div class="modal-actions">
                    <button type="button" class="cancel-btn" onclick="closeEditModal()">Cancel</button>
                    <button type="submit" class="save-btn">Save Changes</button>
                </div>
            </form>

            {{-- Form Hapus Akun (dari Breeze - jika Anda inginkan) --}}
            {{-- Anda perlu styling & logic konfirmasi tambahan untuk ini --}}
            {{--
            <hr style="margin: 20px 0;">
            <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                @csrf
                @method('delete')
                <h3 style="color: red;">Delete Account</h3>
                <p>Once your account is deleted, all of its resources and data will be permanently deleted.</p>
                <button type="submit" style="background-color: red; color: white; padding: 5px 10px; border: none; cursor: pointer; margin-top: 10px;">Delete Account</button>
            </form>
            --}}

        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>© 2025 EdemyX, Inc. All rights reserved.</p>
    </footer>

  {{-- JS Anda --}}
  <script src="{{ asset('js/profile.js') }}"></script>
  {{-- JS Inline untuk modal & preview --}}
  <script>
    function showPopup() { document.getElementById('confirmationPopup').style.display = 'flex'; }
    function closePopup() { document.getElementById('confirmationPopup').style.display = 'none'; }
    function showEditModal() { document.getElementById('editProfileModal').style.display = 'flex'; }
    function closeEditModal() { document.getElementById('editProfileModal').style.display = 'none'; }

    window.onclick = function(event) {
        const popup = document.getElementById('confirmationPopup');
        const modal = document.getElementById('editProfileModal');
        if (event.target == popup) closePopup();
        if (event.target == modal) closeEditModal();
    }
  </script>
</body>
</html>