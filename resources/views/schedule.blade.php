<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Schedule | EdemyX')</title>

    {{-- ==== KOREKSI PATH CSS ==== --}}
    <link rel="stylesheet" href="{{ asset('css/navbar-sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- Link eksternal Font Awesome - SUDAH BENAR --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body> {{-- Pastikan semua konten ada di dalam body --}}
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
                        {{-- ==== KOREKSI PATH GAMBAR PROFILE & DATA DINAMIS ==== --}}
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
        <main class="main-content"> {{-- Pastikan main content membungkus sidebar & konten --}}
            <!-- Sidebar -->
            <aside class="sidebar">
                <ul class="sidebar-menu">
                    {{-- Link Sidebar User --}}
                    <li><a href="{{ url('/dashboard') }}"><i class="fas fa-th-large"></i> Dashboard</a></li>
                    <li><a href="{{ url('/my-courses') }}"><i class="fas fa-book"></i> My Courses</a></li>
                    <li><a href="{{ url('/certificates') }}"><i class="fas fa-certificate"></i> Certificates</a></li>
                    <li><a href="{{ url('/progress') }}"><i class="fas fa-chart-line"></i> Progress</a></li>
                    {{-- Halaman Aktif --}}
                    <li class="active"><i class="fas fa-calendar"></i> Schedule</li>
                    <li><a href="{{ url('/profile') }}"><i class="fas fa-user"></i> Profile</a></li>
                </ul>
            </aside>

            {{-- Konten Schedule --}}
            <div class="schedule-content"> {{-- Ganti <section> pembungkus jika perlu --}}
                <section class="schedule-section">
                    <h2>Upcoming Schedule</h2>
                    <div class="schedule-container">
                        {{-- ==== DATA DINAMIS SEHARUSNYA ==== --}}
                        {{-- Idealnya loop @forelse($scheduleItems as $item) --}}

                        {{-- Contoh Statis 1 --}}
                        <div class="schedule-card">
                            <h3>Web Development Class</h3>
                            <p><strong>Date:</strong> July 25, 2024</p>
                            <p><strong>Time:</strong> 10:00 AM - 12:00 PM</p>
                            <p><strong>Instructor:</strong> Jane Smith</p>
                            {{-- Mungkin tombol Join/Reminder? <a href="#" class="btn">Join</a> --}}
                        </div>

                        {{-- Contoh Statis 2 --}}
                        <div class="schedule-card">
                            <h3>Python for Data Science</h3>
                            <p><strong>Date:</strong> July 26, 2024</p>
                            <p><strong>Time:</strong> 02:00 PM - 04:00 PM</p>
                            <p><strong>Instructor:</strong> Robert Johnson</p>
                        </div>

                        {{-- Contoh Statis 3 --}}
                        <div class="schedule-card">
                            <h3>UI/UX Design Fundamentals</h3>
                            <p><strong>Date:</strong> July 27, 2024</p>
                            <p><strong>Time:</strong> 09:00 AM - 11:00 AM</p>
                            <p><strong>Instructor:</strong> Sarah Williams</p>
                        </div>

                        {{-- Contoh Pesan Jika Tidak Ada Jadwal (dalam @forelse) --}}
                        {{--
                        @forelse($scheduleItems as $item)
                            <div class="schedule-card">
                                <h3>{{ $item->title }}</h3>
                                <p><strong>Date:</strong> {{ $item->start_time->format('F d, Y') }}</p>
                                <p><strong>Time:</strong> {{ $item->start_time->format('h:i A') }} - {{ $item->end_time->format('h:i A') }}</p>
                                <p><strong>Instructor:</strong> {{ $item->instructor->name ?? 'N/A' }}</p>
                                <a href="{{ $item->join_url ?? '#' }}" class="btn">Join Session</a>
                            </div>
                        @empty
                            <p>No upcoming schedule found.</p>
                        @endforelse
                        --}}
                    </div>
                </section>
            </div> {{-- Akhir dari schedule-content --}}
        </main> {{-- Akhir dari .main-content --}}

    {{-- ==== PERBAIKAN STRUKTUR FOOTER & SCRIPT ==== --}}
    <!-- Footer -->
    <footer class="footer">
        <p>© 2025 EdemyX, Inc. All rights reserved.</p>
    </footer>

    {{-- ==== KOREKSI PATH JS ==== --}}
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/profile.js') }}"></script>

</body>
</html>