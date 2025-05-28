<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Certificates - EdemyX')</title>

    {{-- Link CSS ini SUDAH BENAR (sesuai struktur public/css/) --}}
    <link rel="stylesheet" href="{{ asset('css/navbar-sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Link Font Awesome (eksternal CDN) SUDAH BENAR --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
      <!-- Unified Navigation -->
      <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-left">
                <div class="logo">
                    {{-- Menggunakan url() untuk link home --}}
                    <a href="{{ url('/') }}">EdemyX</a>
                </div>
                <ul class="nav-links">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">Explore <i class="fas fa-chevron-down"></i></a>
                        <div class="dropdown-menu">
                            {{-- Konten dropdown ... biarkan link '#' jika itu placeholder --}}
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
                    {{-- Menggunakan url() untuk link internal --}}
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
                {{-- Menggunakan url() untuk link internal --}}
                <a href="{{ url('/wishlist') }}" class="nav-icon"><i class="fas fa-heart"></i></a>
                <a href="{{ url('/notifications') }}" class="nav-icon"><i class="fas fa-bell"></i></a>
                <div class="user-menu">
                    {{-- ==== KOREKSI PATH GAMBAR ==== --}}
                    {{-- Menggunakan asset() dengan path langsung ke public/images/ --}}
                    <img src="{{ asset('images/profile.jpg') }}" alt="Profile Picture" class="user-avatar profile-pic">
                    <div class="user-dropdown">
                        {{-- Menggunakan url() untuk link internal --}}
                        <a href="{{ url('/user-dashboard') }}">Dashboard</a>
                        <a href="{{ url('/my-courses') }}">My Courses</a>
                        <a href="{{ url('/profile') }}">Profile</a>
                        <a href="{{ url('/settings') }}">Settings</a>
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
                {{-- Menggunakan url() untuk link internal --}}
                <li><a href="{{ url('/dashboard') }}"><i class="fas fa-th-large"></i> Dashboard</a></li>
                <li><a href="{{ url('/my-courses') }}"><i class="fas fa-book"></i> My Courses</a></li>
                <li class="active"><a href="{{ url('/certificates') }}"><i class="fas fa-certificate"></i> Certificates</a></li>
                <li><a href="{{ url('/progress') }}"><i class="fas fa-chart-line"></i> Progress</a></li>
                <li><a href="{{ url('/schedule') }}"><i class="fas fa-calendar"></i> Schedule</a></li>
                <li><a href="{{ url('/profile') }}"><i class="fas fa-user"></i> My Profile</a></li>
            </ul>
        </aside>

        <!-- Certificates Content -->
        <div class="dashboard-content">
            <h2>My Certificates</h2>
            <p>Here are the certificates you have earned.</p>

            <div class="certificate-cards">
                <div class="certificate-card">
                    {{-- Gambar placeholder eksternal, tidak perlu diubah --}}
                    <img src="https://via.placeholder.com/300x200" alt="Web Dev Certificate">
                    <h4>Web Development Bootcamp</h4>
                    <p>Issued by: EdemyX</p>
                    <button class="download-btn">Download</button>
                </div>
                <div class="certificate-card">
                    <img src="https://via.placeholder.com/300x200" alt="Python Certificate">
                    <h4>Python for Data Science</h4>
                    <p>Issued by: EdemyX</p>
                    <button class="download-btn">Download</button>
                </div>
                <div class="certificate-card">
                    <img src="https://via.placeholder.com/300x200" alt="UX Design Certificate">
                    <h4>UI/UX Design Fundamentals</h4>
                    <p>Issued by: EdemyX</p>
                    <button class="download-btn">Download</button>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>© 2025 EdemyX, Inc. All rights reserved.</p>
    </footer>

    {{-- ==== KOREKSI PATH JS ==== --}}
    {{-- Menggunakan asset() dengan path langsung ke public/js/ --}}
    <script src="{{ asset('js/certificates.js') }}"></script>
    <script src="{{ asset('js/profile.js') }}"></script>
</body>
</html>