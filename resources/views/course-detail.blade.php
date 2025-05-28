<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Course Dashboard')</title>
    {{-- Link CSS ini SUDAH BENAR (sesuai struktur public/css/) --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header>
        <h1>Dashboard Kursus</h1>
    </header>

    <section class="course-cards">
        {{-- Course Card 1 --}}
        <div class="course-card" data-course="webdev">
            <div class="course-thumbnail">
                {{-- Menggunakan asset() untuk gambar. Pastikan webdev.jpg ada di public/images/ --}}
                <img src="{{ asset('images/webdev.jpg') }}" alt="Web Development">
                <div class="progress-indicator">
                    <div class="progress-bar" style="width: 75%"></div>
                </div>
            </div>
            <div class="course-details">
                <h4>Complete Web Development Bootcamp</h4>
                <p class="instructor">by Jane Smith</p>
                <div class="course-progress">
                    <span class="progress-text">75% Complete</span>
                    <span class="time-left">2h 15m left</span>
                </div>
                {{-- Menggunakan url() untuk link internal. Query parameter tetap dipertahankan. --}}
                {{-- Asumsi ada route /course-player yang akan Anda buat. --}}
                <a href="{{ url('/course-player') }}?course=webdev" class="continue-btn">Continue</a>
            </div>
        </div>

        {{-- Course Card 2 --}}
        <div class="course-card" data-course="python">
            <div class="course-thumbnail">
                 {{-- Menggunakan asset() untuk gambar. Pastikan python.jpg ada di public/images/ --}}
                <img src="{{ asset('images/python.jpg') }}" alt="Python Course">
                <div class="progress-indicator">
                    <div class="progress-bar" style="width: 35%"></div>
                </div>
            </div>
            <div class="course-details">
                <h4>Python for Data Science</h4>
                <p class="instructor">by Robert Johnson</p>
                <div class="course-progress">
                    <span class="progress-text">35% Complete</span>
                    <span class="time-left">8h 45m left</span>
                </div>
                 {{-- Menggunakan url() untuk link internal. Query parameter tetap dipertahankan. --}}
                <a href="{{ url('/course-player') }}?course=python" class="continue-btn">Continue</a>
            </div>
        </div>

        {{-- Course Card 3 --}}
        <div class="course-card" data-course="uiux">
            <div class="course-thumbnail">
                 {{-- Menggunakan asset() untuk gambar. Pastikan UIUX.png ada di public/images/ --}}
                <img src="{{ asset('images/UIUX.png') }}" alt="UX Design">
                <div class="progress-indicator">
                    <div class="progress-bar" style="width: 60%"></div>
                </div>
            </div>
            <div class="course-details">
                <h4>UI/UX Design Fundamentals</h4>
                <p class="instructor">by Sarah Williams</p>
                <div class="course-progress">
                    <span class="progress-text">60% Complete</span>
                    <span class="time-left">4h 30m left</span>
                </div>
                 {{-- Menggunakan url() untuk link internal. Query parameter tetap dipertahankan. --}}
                <a href="{{ url('/course-player') }}?course=uiux" class="continue-btn">Continue</a>
            </div>
        </div>
    </section>

    {{-- Menggunakan asset() untuk file JS. Pastikan script.js ada di public/js/ --}}
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>