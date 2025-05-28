<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EdemyX - User Dashboard')</title>

    {{-- ==== KOREKSI PATH CSS ==== --}}
    <link rel="stylesheet" href="{{ asset('css/navbar-sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- Link eksternal Font Awesome - SUDAH BENAR --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    {{-- Tambahkan Font Awesome Brands jika belum ada (untuk ikon sosial media di footer) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css">
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
                     {{-- Link ke Courses & Categories (Placeholder, sesuaikan jika ada halamannya) --}}
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
                    <img src="{{ asset(Auth::user()->profile_picture ?? 'images/profile.jpg') }}" alt="Profile" class="user-avatar">
                    <div class="user-dropdown">
                        {{-- Link Dropdown User --}}
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                        <a href="{{ url('/my-courses') }}">My Courses</a>
                        <a href="{{ url('/profile') }}">Profile</a>
                        <a href="{{ url('/settings') }}">Settings</a> {{-- Sesuaikan URL settings --}}
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

    <!-- Main Content -->
    <main class="main-content">
        <!-- Sidebar -->
        <aside class="sidebar">
            <ul class="sidebar-menu">
                 {{-- Link Sidebar User --}}
                 {{-- Halaman Aktif --}}
                <li class="active"><i class="fas fa-th-large"></i> Dashboard</li>
                <li><a href="{{ url('/my-courses') }}"><i class="fas fa-book"></i> My Courses</a></li>
                <li><a href="{{ url('/certificates') }}"><i class="fas fa-certificate"></i> Certificates</a></li>
                <li><a href="{{ url('/progress') }}"><i class="fas fa-chart-line"></i> Progress</a></li>
                <li><a href="{{ url('/schedule') }}"><i class="fas fa-calendar"></i> Schedule</a></li> {{-- Perbaiki link schedule --}}
                <li><a href="{{ url('/profile') }}"><i class="fas fa-user"></i> Profile</a></li>
            </ul>
        </aside>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <div class="welcome-section">
                {{-- ==== DATA DINAMIS ==== --}}
                <h2>Welcome back, {{ Auth::user()->name ?? 'Edemyer' }}!</h2>
                <p>Continue learning and developing your skills.</p>
            </div>

            {{-- Courses You May Like (Data Dinamis) --}}
            <section class="recommended-courses">
                 {{-- ... (Konten direkomendasikan - Idealnya dari Controller) ... --}}
                 <div class="section-header">
                    <h3>Courses You May Like</h3>
                 </div>
                 <div class="course-cards">
                     {{-- Contoh Statis (Hapus/ganti dengan loop dinamis) --}}
                     <div class="course-card">
                        <div class="course-thumbnail">
                             {{-- ==== KOREKSI PATH GAMBAR ==== --}}
                            <img src="{{ asset('images/fullstack.jpg') }}" alt="Full Stack Development">
                        </div>
                        <div class="course-details">
                            <h4>Full Stack Web Development</h4>
                            <p class="instructor">by David Miller</p>
                            <p class="course-info">Learn frontend & backend development with real projects.</p>
                             {{-- ==== KOREKSI LINK ==== (Asumsi link ke detail kursus publik) --}}
                            <a href="{{-- url('/courses/fullstack-slug') --}}" class="enroll-btn">Enroll Now</a> {{-- Ganti dengan URL/Route detail kursus --}}
                        </div>
                    </div>
                    <div class="course-card">
                        <div class="course-thumbnail">
                            <img src="{{ asset('images/UIUX.png') }}" alt="UI/UX Design">
                        </div>
                        <div class="course-details">
                            <h4>UI/UX Design Fundamentals</h4>
                            <p class="instructor">by Sarah Lee</p>
                            <p class="course-info">Master user experience & interface design for web and mobile apps.</p>
                            <a href="{{-- url('/courses/uiux-slug') --}}" class="enroll-btn">Enroll Now</a>
                        </div>
                    </div>
                 </div>
            </section>

            {{-- Progress Overview (Data Dinamis) --}}
            <div class="progress-overview">
                <h3>Your Progress</h3>
                <div class="progress-cards">
                    {{-- Idealnya data ini diambil dari agregasi data user di Controller --}}
                    <div class="progress-card">
                        <div class="progress-icon"><i class="fas fa-book"></i></div>
                        <div class="progress-details"><h4>Courses Enrolled</h4><p>{{-- $enrolledCount ?? 0 --}} Courses</p></div>
                    </div>
                    <div class="progress-card">
                        <div class="progress-icon"><i class="fas fa-certificate"></i></div>
                        <div class="progress-details"><h4>Certificates Earned</h4><p>{{-- $certificatesCount ?? 0 --}} Certificates</p></div>
                    </div>
                    <div class="progress-card">
                        <div class="progress-icon"><i class="fas fa-clock"></i></div>
                        <div class="progress-details"><h4>Hours Spent</h4><p>{{-- $hoursSpent ?? 0 --}} Hours</p></div>
                    </div>
                    <div class="progress-card">
                        <div class="progress-icon"><i class="fas fa-tasks"></i></div>
                        <div class="progress-details"><h4>Assignments</h4><p>{{-- $assignmentsCompleted ?? 0 --}} Completed</p></div>
                    </div>
                </div>
            </div>

            {{-- Current Courses (Data Dinamis) --}}
            <section class="current-courses">
                <div class="section-header">
                    <h3>Continue Learning</h3>
                    {{-- ==== KOREKSI LINK ==== --}}
                    <a href="{{ url('/my-courses') }}" class="view-all">View All</a>
                </div>
                <div class="course-cards">
                     {{-- Idealnya loop @forelse($currentCourses as $course) --}}
                     {{-- Contoh Statis (Hapus/ganti dengan loop dinamis) --}}
                    <div class="course-card">
                        <div class="course-thumbnail">
                             {{-- ==== KOREKSI PATH GAMBAR ==== --}}
                            <img src="{{ asset('images/webdev.jpg') }}" alt="Web Development">
                            <div class="progress-indicator"><div class="progress-bar" style="width: 75%"></div></div>
                        </div>
                        <div class="course-details">
                            <h4>Complete Web Development Bootcamp</h4><p class="instructor">by Jane Smith</p>
                            <div class="course-progress"><span class="progress-text">75% Complete</span><span class="time-left">2h 15m left</span></div>
                             {{-- ==== KOREKSI LINK ==== --}}
                            <a href="{{ url('/course-player/1') }}" class="continue-btn">Continue</a> {{-- Ganti '1' dengan ID kursus --}}
                        </div>
                    </div>
                    <div class="course-card">
                        <div class="course-thumbnail">
                            <img src="{{ asset('images/python.jpg') }}" alt="Python Course">
                            <div class="progress-indicator"><div class="progress-bar" style="width: 35%"></div></div>
                        </div>
                        <div class="course-details">
                            <h4>Python for Data Science</h4><p class="instructor">by Robert Johnson</p>
                            <div class="course-progress"><span class="progress-text">35% Complete</span><span class="time-left">8h 45m left</span></div>
                             {{-- ==== KOREKSI LINK ==== --}}
                            <a href="{{ url('/course-player/2') }}" class="continue-btn">Continue</a> {{-- Ganti '2' dengan ID kursus --}}
                        </div>
                    </div>
                    <div class="course-card">
                        <div class="course-thumbnail">
                             {{-- Perhatikan nama file gambar, mungkin UIUX.png? --}}
                            <img src="{{ asset('images/UIUX.png') }}" alt="UX Design">
                            <div class="progress-indicator"><div class="progress-bar" style="width: 60%"></div></div>
                        </div>
                        <div class="course-details">
                            <h4>UI/UX Design Fundamentals</h4><p class="instructor">by Sarah Williams</p>
                            <div class="course-progress"><span class="progress-text">60% Complete</span><span class="time-left">4h 30m left</span></div>
                             {{-- ==== KOREKSI LINK ==== --}}
                            <a href="{{ url('/course-player/3') }}" class="continue-btn">Continue</a> {{-- Ganti '3' dengan ID kursus --}}
                        </div>
                    </div>
                </div>
            </section>

            {{-- Recommended Courses (Data Dinamis) --}}
            <section class="recommended-courses">
                <div class="section-header">
                    <h3>Recommended for You</h3>
                     {{-- ==== KOREKSI LINK ==== --}}
                    <a href="{{-- url('/recommendations') --}}" class="view-all">View All</a> {{-- Ganti dengan URL/Route rekomendasi --}}
                </div>
                <div class="course-cards">
                    {{-- Idealnya loop @forelse($recommendedCourses as $course) --}}
                     {{-- Contoh Statis (Hapus/ganti dengan loop dinamis) --}}
                    <div class="course-card">
                        <div class="course-thumbnail">
                             {{-- ==== KOREKSI PATH GAMBAR ==== --}}
                            <img src="{{ asset('images/jskonsep.png') }}" alt="JavaScript Course">
                            <span class="course-tag">Popular</span>
                        </div>
                        <div class="course-details">
                            <h4>Advanced JavaScript Concepts</h4><p class="instructor">by David Miller</p>
                            <div class="course-stats"><span><i class="fas fa-star"></i> 4.8 (2.4k reviews)</span><span><i class="fas fa-user"></i> 12.5k students</span></div>
                            <div class="course-price"><span class="price">$49.99</span><span class="original-price">$99.99</span></div>
                             {{-- Tombol Wishlist perlu JS atau form --}}
                            <a href="#" class="wishlist-btn" data-course="Advanced JavaScript Concepts" aria-label="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                     <div class="course-card">
                        <div class="course-thumbnail">
                             {{-- Perhatikan nama file gambar, mungkin thecomplete-react.jpeg? --}}
                            <img src="{{ asset('images/Thecomplate.jpeg') }}" alt="React Course">
                            <span class="course-tag">Bestseller</span>
                        </div>
                        <div class="course-details">
                            <h4>React - The Complete Guide</h4><p class="instructor">by Michael Brown</p>
                            <div class="course-stats"><span><i class="fas fa-star"></i> 4.9 (3.8k reviews)</span><span><i class="fas fa-user"></i> 18.2k students</span></div>
                            <div class="course-price"><span class="price">$59.99</span><span class="original-price">$119.99</span></div>
                            <a href="#" class="wishlist-btn" data-course="The Complete Guide" aria-label="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="course-card">
                        <div class="course-thumbnail">
                             <img src="{{ asset('images/ML.jpg') }}" alt="Machine Learning">
                             <span class="course-tag">New</span>
                        </div>
                        <div class="course-details">
                            <h4>Machine Learning A-Z</h4><p class="instructor">by Jennifer Lee</p>
                            <div class="course-stats"><span><i class="fas fa-star"></i> 4.7 (1.9k reviews)</span><span><i class="fas fa-user"></i> 9.8k students</span></div>
                            <div class="course-price"><span class="price">$69.99</span><span class="original-price">$129.99</span></div>
                            <a href="#" class="wishlist-btn" data-course="Machine Learning A-Z" aria-label="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Upcoming Events (Data Dinamis) --}}
            <section class="upcoming-events">
                <div class="section-header">
                    <h3>Upcoming Live Sessions</h3>
                    {{-- ==== KOREKSI LINK ==== --}}
                    <a href="{{ url('/calendar') }}" class="view-all">View Calendar</a> {{-- Atau link ke /schedule ? --}}
                </div>
                <div class="events-list">
                     {{-- Idealnya loop @forelse($upcomingEvents as $event) --}}
                     {{-- Contoh Statis (Hapus/ganti dengan loop dinamis) --}}
                    <div class="event-card">
                        <div class="event-date"><span class="day">25</span><span class="month">Mar</span></div>
                        <div class="event-details"><h4>Web Application Security Workshop</h4><p><i class="fas fa-clock"></i> 14:00 - 16:00</p><p><i class="fas fa-user"></i> Instructor: Alex Turner</p></div>
                        <a href="#" class="join-btn">Set Reminder</a> {{-- Perlu JS/Backend --}}
                    </div>
                    <div class="event-card">
                        <div class="event-date"><span class="day">28</span><span class="month">Mar</span></div>
                        <div class="event-details"><h4>Career in Web Development Q&A</h4><p><i class="fas fa-clock"></i> 19:00 - 20:30</p><p><i class="fas fa-user"></i> Panel Discussion</p></div>
                        <a href="#" class="join-btn">Set Reminder</a>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-grid">
                <div class="footer-column">
                    <div class="footer-logo"><h2>EdemyX</h2><p>Learn without limits</p></div>
                    <div class="social-icons">
                        {{-- Link Sosial Media --}}
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h4>About</h4>
                    <ul>
                        {{-- Link Footer About --}}
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Investors</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Community</h4>
                    <ul>
                         {{-- Link Footer Community --}}
                        <li><a href="#">Partners</a></li>
                        <li><a href="#">Affiliate Program</a></li>
                        <li><a href="#">Become an Instructor</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Support</h4>
                    <ul>
                         {{-- Link Footer Support --}}
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2025 EdemyX, Inc. All rights reserved.</p>
            </div>
        </div>
    </footer>

    {{-- ==== KOREKSI PATH JS ==== --}}
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/profile.js') }}"></script> {{-- Mungkin tidak perlu profile.js di sini? --}}
</body>
</html>