<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Calendar')</title>

    {{-- Link CSS ini SUDAH BENAR --}}
    <link rel="stylesheet" href="{{ asset('css/navbar-sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- Link JS ini SUDAH BENAR --}}
    <script src="{{ asset('js/script.js') }}" defer></script>
    {{-- Link Font Awesome (eksternal) SUDAH BENAR --}}
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <h1>Calendar</h1>
    </header>
    <nav>
        <ul>
            {{-- ==== PERUBAHAN DI SINI ==== --}}
            {{-- Menggunakan helper url() untuk menunjuk ke route Laravel --}}
            {{-- Asumsi nama file .blade.php Anda mencerminkan route yang diinginkan --}}
            {{-- (Anda harus mendefinisikan route ini di routes/web.php) --}}

            <li><a href="{{ url('/') }}">Home</a></li> {{-- Mengarah ke root URL ('/') --}}
            <li><a href="{{ url('/user-dashboard') }}">Dashboard</a></li> {{-- Mengarah ke URL '/user-dashboard' --}}
            <li><a href="{{ url('/profile') }}">Profile</a></li> {{-- Mengarah ke URL '/profile' --}}
            <li><a href="{{ url('/my-courses') }}">My Courses</a></li> {{-- Mengarah ke URL '/my-courses' --}}
            <li><a href="{{ url('/schedule') }}">Schedule</a></li> {{-- Mengarah ke URL '/schedule' --}}
            <li><a href="{{ url('/progress') }}">Progress</a></li> {{-- Mengarah ke URL '/progress' --}}
            <li><a href="{{ url('/wishlist') }}">Wishlist</a></li> {{-- Mengarah ke URL '/wishlist' --}}
            <li><a href="{{ url('/calendar') }}">Calendar</a></li> {{-- Mengarah ke URL '/calendar' (halaman ini) --}}
        </ul>
    </nav>
    <main>
        <section class="upcoming-events">
            <div class="section-header">
                <h3>Upcoming Live Sessions</h3>
            </div>
            <div class="events-list">
                <div class="event-card">
                    <div class="event-date">
                        <span class="day">25</span>
                        <span class="month">Mar</span>
                    </div>
                    <div class="event-details">
                        <h4>Web Application Security Workshop</h4>
                        <p><i class="fas fa-clock"></i> 14:00 - 16:00</p>
                        <p><i class="fas fa-user"></i> Instructor: Alex Turner</p>
                    </div>
                    <a href="#" class="join-btn">Set Reminder</a> {{-- Biarkan href="#" jika ini untuk aksi JS --}}
                </div>
                <div class="event-card">
                    <div class="event-date">
                        <span class="day">28</span>
                        <span class="month">Mar</span>
                    </div>
                    <div class="event-details">
                        <h4>Career in Web Development Q&A</h4>
                        <p><i class="fas fa-clock"></i> 19:00 - 20:30</p>
                        <p><i class="fas fa-user"></i> Panel Discussion</p>
                    </div>
                    <a href="#" class="join-btn">Set Reminder</a> {{-- Biarkan href="#" jika ini untuk aksi JS --}}
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>© 2025 Project PBW. All rights reserved.</p>
    </footer>
</body>
</html>