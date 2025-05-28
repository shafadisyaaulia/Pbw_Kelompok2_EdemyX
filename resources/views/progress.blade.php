<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Progress - EdemyX')</title>

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
                        {{-- Link ke Home --}}
                        <a href="{{ url('/') }}">EdemyX</a>
                    </div>
                    <ul class="nav-links">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle">Explore <i class="fas fa-chevron-down"></i></a>
                            <div class="dropdown-menu">
                                {{-- Konten Dropdown --}}
                                <div class="dropdown-container">
                                    {{-- Kolom dropdown --}}
                                </div>
                            </div>
                        </li>
                        {{-- Link ke Courses & Categories --}}
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
                        <img src="{{ asset(Auth::user()->profile_picture ?? 'images/profile.jpg') }}" alt="Profile Picture" class="user-avatar profile-pic">
                        <div class="user-dropdown">
                            {{-- Link Dropdown User --}}
                            <a href="{{ url('/user-dashboard') }}">Dashboard</a>
                            <a href="{{ url('/my-courses') }}">My Courses</a>
                            <a href="{{ url('/profile') }}">Profile</a>
                            <a href="{{ url('/settings') }}">Settings</a>
                             {{-- Link Logout (pakai form POST) --}}
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

     {{-- ==== PERBAIKAN STRUKTUR MAIN CONTENT ==== --}}
     <div class="main-content"> {{-- Gunakan div sebagai pembungkus --}}
        <!-- Sidebar -->
        <aside class="sidebar">
            <ul class="sidebar-menu">
                {{-- Link Sidebar User --}}
                <li><a href="{{ url('/dashboard') }}"><i class="fas fa-th-large"></i> Dashboard</a></li>
                <li><a href="{{ url('/my-courses') }}"><i class="fas fa-book"></i> My Courses</a></li>
                <li><a href="{{ url('/certificates') }}"><i class="fas fa-certificate"></i> Certificates</a></li>
                {{-- Halaman Aktif --}}
                <li class="active"><i class="fas fa-chart-line"></i> Progress</li>
                <li><a href="{{ url('/schedule') }}"><i class="fas fa-calendar"></i> Schedule</a></li>
                <li><a href="{{ url('/profile') }}"><i class="fas fa-user"></i> Profile</a></li>
            </ul>
        </aside>

        {{-- Konten Progress (bukan <main> lagi) --}}
        <div class="progress-content"> {{-- Ganti <main> kedua dengan <div> --}}
            <section class="progress-section">
                <h1>My Progress</h1>
                <p>Here is your progress in the courses you are enrolled in.</p>

                {{-- Struktur Awal Agak Aneh, saya gabungkan --}}
                <div class="course-cards courses-container"> {{-- Gabungkan class --}}

                    {{-- ==== DATA DINAMIS SEHARUSNYA ==== --}}
                    {{-- Idealnya loop @forelse($enrolledCourses as $enrollment) --}}

                    {{-- Contoh Statis 1 (struktur dari awal file) --}}
                    <div class="course-card">
                        <div class="course-thumbnail">
                             {{-- ==== KOREKSI PATH GAMBAR & DATA DINAMIS ==== --}}
                             {{-- Ganti dengan gambar kursus yang benar --}}
                            <img src="{{ asset('images/webdev.jpg') }}" alt="Web Development">
                        </div>
                         {{-- Detail course progress (perlu digabung dari struktur bawah) --}}
                        <div class="course-details"> {{-- Tambahkan div ini --}}
                            <h3>Complete Web Development Bootcamp</h3>
                            <p>Instructor: Jane Smith</p>
                            <p class="progress-text">Progress: <span class="progress-percent">75%</span></p>
                            <div class="progress-bar" style="width: 75%;"></div>
                        </div>
                    </div>

                    {{-- Contoh Statis 2 (struktur dari bagian bawah file) --}}
                    <div class="course-card">
                        {{-- ==== KOREKSI PATH GAMBAR & DATA DINAMIS ==== --}}
                        <img src="{{ asset('images/course2.png') }}" alt="Course 2"> {{-- Pastikan course2.png ada --}}
                        <h3>Python for Data Science</h3>
                        <p>Instructor: Robert Johnson</p>
                        <p class="progress-text">Progress: <span class="progress-percent">35%</span></p>
                        <div class="progress-bar" style="width: 35%;"></div>
                    </div>

                    {{-- Contoh Statis 3 (struktur dari bagian bawah file) --}}
                    <div class="course-card">
                         {{-- ==== KOREKSI PATH GAMBAR & DATA DINAMIS ==== --}}
                        <img src="{{ asset('images/course3.png') }}" alt="Course 3"> {{-- Pastikan course3.png ada --}}
                        <h3>UI/UX Design Fundamentals</h3>
                        <p>Instructor: Sarah Williams</p>
                        <p class="progress-text">Progress: <span class="progress-percent">60%</span></p>
                        <div class="progress-bar" style="width: 60%;"></div>
                    </div>

                     {{-- Contoh Pesan Jika Tidak Ada Kursus (dalam @forelse) --}}
                     {{--
                     @forelse($enrolledCourses as $enrollment)
                         <div class="course-card">
                             <div class="course-thumbnail">
                                 <img src="{{ asset('storage/' . $enrollment->course->image) }}" alt="{{ $enrollment->course->title }}">
                             </div>
                             <div class="course-details">
                                 <h3>{{ $enrollment->course->title }}</h3>
                                 <p>Instructor: {{ $enrollment->course->instructor->name ?? 'N/A' }}</p>
                                 <p class="progress-text">Progress: <span class="progress-percent">{{ $enrollment->progress ?? 0 }}%</span></p>
                                 <div class="progress-bar" style="width: {{ $enrollment->progress ?? 0 }}%;"></div>
                             </div>
                         </div>
                     @empty
                         <p>You haven't made any progress yet.</p>
                     @endforelse
                     --}}

                </div> {{-- Akhir dari .course-cards .courses-container --}}
            </section>
        </div> {{-- Akhir dari progress-content --}}

    </div> {{-- Akhir dari .main-content (div pembungkus) --}}

    <!-- Footer -->
    {{-- Footer harus di dalam <body> --}}
    <footer class="footer">
        <p>© 2025 EdemyX, Inc. All rights reserved.</p>
    </footer>

    {{-- ==== KOREKSI PATH JS ==== --}}
    <script src="{{ asset('js/progress.js') }}"></script> {{-- Ganti 'progess' menjadi 'progress' --}}
    <script src="{{ asset('js/profile.js') }}"></script>

</body> {{-- Footer dipindahkan ke sebelum tag ini --}}
</html>