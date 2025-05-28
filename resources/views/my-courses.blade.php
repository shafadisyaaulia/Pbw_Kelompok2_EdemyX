<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Courses - EdemyX')</title>

    {{-- ==== KOREKSI PATH CSS ==== --}}
    <link rel="stylesheet" href="{{ asset('css/navbar-sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- Link eksternal Font Awesome - SUDAH BENAR --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
        <!-- Unified Navigation -->
        <nav class="navbar">
            <div class="navbar-container">
                <div class="navbar-left">
                    <div class="logo">
                        {{-- Link ke Halaman Utama --}}
                        <a href="{{ url('/') }}">EdemyX</a>
                    </div>
                    <ul class="nav-links">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle">Explore <i class="fas fa-chevron-down"></i></a>
                            <div class="dropdown-menu">
                                {{-- Konten Dropdown (biarkan '#' jika placeholder) --}}
                                <div class="dropdown-container">
                                    <div class="dropdown-column">
                                        <h4>Explore Certifications</h4>
                                        <ul>
                                            <li><a href="#">Certification Prep</a></li>
                                            <li><a href="#">Development</a></li>
                                            <li><a href="#">Business</a></li>
                                            <li><a href="#">Finance & Accounting</a></li>
                                            <li><a href="#">IT & Software</a></li>
                                        </ul>
                                    </div>
                                    <div class="dropdown-column">
                                        <h4>Popular Categories</h4>
                                        <ul>
                                            <li><a href="#">Engineering</a></li>
                                            <li><a href="#">Humanities</a></li>
                                            <li><a href="#">Mathematics</a></li>
                                            <li><a href="#">Science</a></li>
                                            <li><a href="#">Online Education</a></li>
                                        </ul>
                                    </div>
                                    <div class="dropdown-column">
                                        <h4>Special Topics</h4>
                                        <ul>
                                            <li><a href="#">Language Learning</a></li>
                                            <li><a href="#">Teacher Training</a></li>
                                            <li><a href="#">Test Preparation</a></li>
                                            <li><a href="#">Teaching & Academics</a></li>
                                            <li><a href="#">Social Sciences</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                         {{-- Link ke Halaman Courses & Categories --}}
                        <li><a href="{{ url('/courses') }}">Courses</a></li>
                        <li><a href="{{ url('/categories') }}">Categories</a></li>
                    </ul>
                </div>
                <div class="navbar-center">
                    <div class="search-bar">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search for courses...">
                    </div>
                </div>
                <div class="navbar-right">
                    {{-- Link ke Wishlist & Notifications --}}
                    <a href="{{ url('/wishlist') }}" class="nav-icon"><i class="fas fa-heart"></i></a>
                    <a href="{{ url('/notifications') }}" class="nav-icon"><i class="fas fa-bell"></i></a>
                    <div class="user-menu">
                         {{-- ==== KOREKSI PATH GAMBAR PROFILE ==== --}}
                        <img src="{{ asset('images/profile.jpg') }}" alt="Profile Picture" class="user-avatar profile-pic">
                        <div class="user-dropdown">
                             {{-- Link Dropdown User --}}
                            <a href="{{ url('/dashboard') }}">Dashboard</a>
                            <a href="{{ url('/my-courses') }}">My Courses</a>
                            <a href="{{ url('/profile') }}">Profile</a>
                            <a href="{{ url('/settings') }}">Settings</a>
                            {{-- Link Logout (mungkin perlu form POST) --}}
                            <a href="{{ url('/logout') }}">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>


    <!-- Main Content -->
    <main class="main-content">
        <!-- Sidebar -->
        <aside class="sidebar">
            <ul class="sidebar-menu">
                 {{-- Link Sidebar User --}}
                <li><a href="{{ url('/dashboard') }}"><i class="fas fa-th-large"></i> Dashboard</a></li>
                {{-- Halaman Aktif --}}
                <li class="active"><i class="fas fa-book"></i> My Courses</li>
                <li><a href="{{ url('/certificates') }}"><i class="fas fa-certificate"></i> Certificates</a></li>
                <li><a href="{{ url('/progress') }}"><i class="fas fa-chart-line"></i> Progress</a></li>
                <li><a href="{{ url('/schedule') }}"><i class="fas fa-calendar"></i> Schedule</a></li>
                <li><a href="{{ url('/profile') }}"><i class="fas fa-user"></i> My Profile</a></li>
            </ul>
        </aside>

        <!-- My Courses Content -->
        <div class="dashboard-content">
            <h2>My Courses</h2>
            <p>Here are the courses you are currently enrolled in.</p>

            <div class="course-cards">
                {{-- ==== BAGIAN LOOP DINAMIS (SUDAH BENAR JIKA GAMBAR DI STORAGE) ==== --}}
                {{-- Pastikan variabel $courses dikirim dari Controller --}}
                @isset($courses) {{-- Tambahkan pengecekan jika $courses mungkin tidak ada --}}
                    @forelse($courses as $course) {{-- Gunakan forelse untuk menangani jika tidak ada kursus --}}
                        <div class="course-card">
                            <div class="course-thumbnail">
                                {{-- Path ini benar jika gambar ada di storage/app/public dan symbolic link dibuat --}}
                                <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}">
                            </div>
                            <div class="course-details">
                                <h4>{{ $course->title }}</h4>
                                <p class="instructor">Instructor: {{ $course->instructor->name ?? 'N/A' }}</p> {{-- Asumsi ada relasi instructor --}}
                                <p class="progress-text">Progress: {{ $course->pivot->progress ?? $course->progress ?? 0 }}%</p> {{-- Cek progress dari pivot table atau field course --}}
                                <div class="progress-bar" style="width: {{ $course->pivot->progress ?? $course->progress ?? 0 }}%"></div>
                                {{-- Tombol Continue harus link ke course player dengan ID kursus --}}
                                <a href="{{ url('/course-player/' . $course->id) }}" class="continue-btn">Continue</a> {{-- Ganti /course-player/ dengan route yang benar --}}
                            </div>
                        </div>
                    @empty
                        <p>You are not enrolled in any courses yet.</p> {{-- Pesan jika tidak ada kursus --}}
                    @endforelse
                @else
                    <p>Could not load courses.</p> {{-- Pesan jika variabel $courses tidak ada --}}
                @endisset
                {{-- ==== AKHIR BAGIAN LOOP DINAMIS ==== --}}

                {{-- ==== HAPUS BAGIAN STATIS DI BAWAH INI ==== --}}
                {{-- <div class="course-card"> ... Python course ... </div> --}}
                {{-- <div class="course-card"> ... UI/UX course ... </div> --}}
                {{-- ==== AKHIR BAGIAN YANG DIHAPUS ==== --}}
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>© 2025 EdemyX, Inc. All rights reserved.</p>
    </footer>

    {{-- ==== KOREKSI PATH JS ==== --}}
    <script src="{{ asset('js/my-courses.js') }}"></script>
    <script src="{{ asset('js/profile.js') }}"></script>
</body>
</html>