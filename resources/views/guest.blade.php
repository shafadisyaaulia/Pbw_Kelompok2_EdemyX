<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EdemyX - Aplikasi Pengelolaan Kursus Online')</title>

    {{-- ==== KOREKSI PATH CSS ==== --}}
    <link rel="stylesheet" href="{{ asset('css/index.css') }}"> {{-- Pastikan index.css ada di public/css --}}
    {{-- Link eksternal Font Awesome - SUDAH BENAR --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     {{-- Tambahkan Font Awesome Brands jika belum ada (untuk ikon sosial media di footer jika ada) --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css"> --}}
</head>
<body>
    <!-- Side Navbar -->
    <nav class="sidenav" id="sidenav">
        <div class="sidenav-header">
            {{-- ==== PERBAIKAN LINK ==== --}}
            <a href="{{ url('/') }}" class="logo">EdemyX</a> {{-- Link ke Home --}}
            <button class="close-btn" id="close-btn">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <ul class="nav-list">
             {{-- ==== PERBAIKAN LINK ==== --}}
            <li><a href="{{ url('/') }}" class="active"><i class="fas fa-home"></i> Home</a></li>
            <li class="nav-dropdown-container">
                <a href="#" class="dropdown-toggle"><i class="fas fa-user"></i> Pengguna <i class="fas fa-chevron-down"></i></a>
                <ul class="nav-dropdown">
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Sign Up</a></li>
                    <li><a href="{{ url('/user-dashboard') }}">Dashboard User</a></li>
                    <li><a href="{{ url('/my-courses') }}">My Courses</a></li>
                    <li><a href="{{ url('/certificates') }}">Certificates</a></li>
                    <li><a href="{{ url('/progress') }}">Progress</a></li>
                    <li><a href="{{ url('/schedule') }}">Schedule</a></li>
                    <li><a href="{{ url('/profile') }}">Profile</a></li>
                </ul>
            </li>
            <li class="nav-dropdown-container">
                <a href="#" class="dropdown-toggle"><i class="fas fa-user-shield"></i> Admin <i class="fas fa-chevron-down"></i></a>
                <ul class="nav-dropdown">
                    <li><a href="{{ url('/admin/dashboard') }}">Dashboard Admin</a></li>
                    <li><a href="{{ url('/admin/manage-users') }}">Manage Users</a></li>
                    <li><a href="{{ url('/admin/manage-courses') }}">Manage Courses</a></li>
                </ul>
            </li>
             {{-- Link Internal Halaman (Anchor) - Tetap sama --}}
            <li><a href="#features"><i class="fas fa-star"></i> Fitur</a></li>
            <li><a href="#team"><i class="fas fa-users"></i> Tim Pengembang</a></li>
        </ul>
        <div class="sidenav-footer">
            {{-- Mungkin bisa tambahkan link login/register di sini juga --}}
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Mobile Header -->
        <header class="mobile-header" id="mobile-header">
            <button class="menu-toggle" id="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
            {{-- ==== PERBAIKAN LINK ==== --}}
            <a href="{{ url('/') }}" class="mobile-logo">EdemyX</a> {{-- Link ke Home --}}
        </header>

        <!-- Hero Section -->
        <section class="hero" id="hero">
            <div class="hero-content">
                <h1 class="hero-title">EdemyX - Aplikasi Pengelolaan Kursus Online</h1>
                <p class="hero-subtitle">Tingkatkan keterampilan Anda dengan platform pembelajaran interaktif yang fleksibel dan mudah digunakan</p>
                <div class="btn-container">
                     {{-- ==== PERBAIKAN LINK ==== --}}
                    <a href="{{ url('/login') }}" class="btn btn-primary">Mulai Belajar</a>
                    <a href="{{ url('/register') }}" class="btn btn-secondary">Daftar Sekarang</a>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features" id="features">
            <div class="container">
                <div class="section-title">
                    <h2>Kenapa Memilih EdemyX?</h2>
                </div>
                <div class="features-grid">
                    {{-- Konten Fitur 1 --}}
                    <div class="feature-card">
                        <div class="feature-icon"><i class="fas fa-laptop-code"></i></div>
                        <h3>Pembelajaran Interaktif</h3>
                        <p>Kursus online dengan konten interaktif yang memudahkan proses pembelajaran dan meningkatkan pemahaman.</p>
                    </div>
                    {{-- Konten Fitur 2 --}}
                    <div class="feature-card">
                        <div class="feature-icon"><i class="fas fa-certificate"></i></div>
                        <h3>Sertifikat Resmi</h3>
                        <p>Dapatkan sertifikat resmi setelah menyelesaikan kursus untuk menunjang karir dan portfolio Anda.</p>
                    </div>
                    {{-- Konten Fitur 3 --}}
                    <div class="feature-card">
                        <div class="feature-icon"><i class="fas fa-chart-line"></i></div>
                        <h3>Pantau Progres</h3>
                        <p>Fitur tracking progres membantu Anda memantau perkembangan belajar dengan mudah dan efektif.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="team" id="team">
            <div class="container">
                <div class="section-title">
                    <h2>Tim Pengembang</h2>
                </div>
                <div class="team-grid">
                    {{-- Card Tim 1 --}}
                    <div class="team-card" style="background-color: #2A2C65;">
                        <div class="team-info">
                            <h3>Shafa Disya Aulia</h3><p>NPM: 2308107010002</p>
                            <div class="team-pages"><h4>Halaman yang Dibuat:</h4><ul><li>User Dashboard</li><li>My Courses</li><li>Certificates</li><li>Progress</li><li>Schedule</li></ul></div>
                        </div>
                        <div class="team-img-container">
                             {{-- ==== KOREKSI PATH GAMBAR ==== --}}
                            <img src="{{ asset('images/member1.jpg') }}" alt="Shafa Disya Aulia" class="team-img">
                        </div>
                    </div>
                    {{-- Card Tim 2 --}}
                    <div class="team-card" style="background-color: #2A2C65;">
                         <div class="team-info">
                            <h3>Nadia Maghdalena</h3><p>NPM: 2308107010045</p>
                            <div class="team-pages"><h4>Halaman yang Dibuat:</h4><ul><li>Dashboard Admin</li><li>Manage Users</li><li>Manage Courses</li></ul></div>
                        </div>
                        <div class="team-img-container">
                            <img src="{{ asset('images/member2.jpg') }}" alt="Nadia Maghdalena" class="team-img">
                        </div>
                    </div>
                    {{-- Card Tim 3 --}}
                    <div class="team-card" style="background-color: #2A2C65;">
                        <div class="team-info">
                            <h3>Muhammad Azani Irvand</h3><p>NPM: 2308107010026</p>
                            <div class="team-pages"><h4>Halaman yang Dibuat:</h4><ul><li>Login</li><li>Sign Up</li></ul></div>
                        </div>
                        <div class="team-img-container">
                             <img src="{{ asset('images/member3.jpg') }}" alt="Muhammad Azani Irvand" class="team-img">
                        </div>
                    </div>
                    {{-- Card Tim 4 --}}
                     <div class="team-card" style="background-color: #2A2C65;">
                        <div class="team-info dark-text"> {{-- Perhatikan dark-text jika diperlukan --}}
                            <h3>Halim Elsa Putra</h3><p>NPM: 2308107010062</p>
                            <div class="team-pages"><h4>Halaman yang Dibuat:</h4><ul><li>Profile</li><li>Pop Up</li></ul></div>
                        </div>
                        <div class="team-img-container">
                             <img src="{{ asset('images/member4.jpg') }}" alt="Halim Elsa Putra" class="team-img">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Back to Top Button -->
        <div class="back-to-top" id="back-to-top">
            <i class="fas fa-arrow-up"></i>
        </div>
    </main> {{-- Akhir dari Main Content --}}

    {{-- ==== PERBAIKAN STRUKTUR: Footer di luar Main Content ==== --}}
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">EdemyX</div>
                <div class="copyright">
                    <p>© 2025 EdemyX - Aplikasi Pengelolaan Kursus Online. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    {{-- ==== JAVASCRIPT INLINE (Biarkan untuk sementara, pindahkan ke file .js nanti) ==== --}}
    <script>
        // Toggle sidebar
        const menuToggle = document.getElementById('menu-toggle');
        const closeBtn = document.getElementById('close-btn');
        const sidenav = document.getElementById('sidenav');
        if (menuToggle && sidenav) {
            menuToggle.addEventListener('click', function() {
                sidenav.classList.add('active');
            });
        }
        if (closeBtn && sidenav) {
            closeBtn.addEventListener('click', function() {
                sidenav.classList.remove('active');
            });
        }

        // Toggle dropdown
        const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                // Tutup dropdown lain yang mungkin terbuka
                dropdownToggles.forEach(otherToggle => {
                    if (otherToggle !== this) {
                        otherToggle.parentElement.classList.remove('open');
                    }
                });
                // Buka/tutup dropdown yang diklik
                this.parentElement.classList.toggle('open');
            });
        });
        // Tutup dropdown jika klik di luar
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.nav-dropdown-container')) {
                document.querySelectorAll('.nav-dropdown-container.open').forEach(container => {
                    container.classList.remove('open');
                });
            }
        });

        // Back to top button
        const backToTopButton = document.getElementById('back-to-top');
        if (backToTopButton) {
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopButton.classList.add('visible');
                } else {
                    backToTopButton.classList.remove('visible');
                }
            });

            backToTopButton.addEventListener('click', function() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        // Header scroll effect
        const mobileHeader = document.getElementById('mobile-header');
        if (mobileHeader) {
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 50) {
                    mobileHeader.classList.add('scrolled');
                } else {
                    mobileHeader.classList.remove('scrolled');
                }
            });
        }
    </script>
    {{-- Jika ada script eksternal lain, tambahkan di sini --}}
    {{-- <script src="{{ asset('js/guest.js') }}"></script> --}}
</body>
</html>