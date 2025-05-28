<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - EdemyX')</title>

    {{-- ==== Link CSS ==== --}}
    {{-- Pastikan nama file CSS Anda benar dan ada di public/css/ --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> {{-- Sesuaikan jika nama file CSS berbeda --}}

    {{-- Font Awesome (Hanya satu versi) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    {{-- Animate.css --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <!-- Navbar -->
    <header class="navbar">
        <div class="left-section">
            {{-- Gunakan route() untuk link internal --}}
            <div class="logo"><a href="{{ route('admin.dashboard') }}" style="text-decoration: none; color: inherit;">EdemyX</a></div>
            <nav>
                <a href="#">Explore ▾</a> {{-- Biarkan jika ini dropdown JS --}}
                <a href="{{ route('courses.index') }}">Courses</a> {{-- Asumsi route publik --}}
                <a href="{{ route('categories.index') }}">Categories</a> {{-- Asumsi route publik --}}
            </nav>
        </div>
        <div class="search-container">
            <input type="text" class="search-bar" placeholder="Search for courses...">
            <i class="fas fa-search search-icon"></i>
        </div>
        <div class="icons">
            {{-- Ganti dengan route jika fungsional --}}
            <span class="icon"><a href="{{-- route('wishlist') --}}" style="color: inherit;"><i class="fas fa-heart"></i></a></span>
            <span class="icon"><a href="{{-- route('notifications') --}}" style="color: inherit;"><i class="fas fa-bell"></i><span class="notification-badge">3</span></a></span>
            {{-- Link Profile Admin --}}
            <a href="{{ route('profile.show') }}" class="profile-link"> 
                <i class="fas fa-user"></i>
                <span>Profile</span>
            </a>
        </div>
    </header>

    <!-- Layout -->
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <ul>
                 {{-- Gunakan route() dengan prefix admin. --}}
                <li class="active"><i class="fas fa-th"></i> Dashboard</li> {{-- Aktif, tidak perlu link --}}
                <li><a href="{{ route('admin.users.index') }}"><i class="fas fa-users"></i> Manage Users</a></li>
                <li><a href="{{ route('admin.courses.index') }}"><i class="fas fa-book"></i> Manage Courses</a></li>
                <li><a href="#" data-section="classes"><i class="fas fa-chalkboard-teacher"></i> Manage Classes</a></li>
                <li><a href="#" data-section="payments"><i class="fas fa-credit-card"></i> Payments & Finance</a></li>
                <li><a href="#" data-section="certificates"><i class="fas fa-certificate"></i> Certificates</a></li>
                <li><a href="#" data-section="reports"><i class="fas fa-chart-line"></i> Reports & Analytics</a></li>
                <li><a href="#" data-section="schedule"><i class="fas fa-calendar"></i> Schedule</a></li>
                <li><a href="#" data-section="logs"><i class="fas fa-history"></i> Activity Logs</a></li>
                <li><a href="{{ route('profile.show') }}" data-section="profile"><i class="fas fa-user"></i> Profile</a></li>
                <li><a href="#" data-section="settings"><i class="fas fa-cog"></i> Settings</a></li>
                <li><a href="#" data-section="help"><i class="fas fa-question-circle"></i> Help Center</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="content">
            {{-- ==== AWAL KONTEN YANG DISALIN DARI HTML ==== --}}

            <div class="welcome-banner animate__animated animate__fadeIn">
                <h2>Welcome back, Admin!</h2>
                <p>Empower learners and shape the future as you continue managing and enhancing your online courses!</p>
            </div>

            <!-- Stats Overview Section -->
            <section class="dashboard-section animate__animated animate__fadeIn">
                <div class="section-header">
                    <h2><i class="fas fa-chart-bar"></i> Platform Overview</h2>
                    <div class="time-filters">
                        <span class="time-filter active">Today</span>
                        <span class="time-filter">Week</span>
                        <span class="time-filter">Month</span>
                        <span class="time-filter">Year</span>
                    </div>
                </div>
                <div class="stats-container">
                    {{-- Nanti data ini akan dinamis dari Controller --}}
                    <div class="stat-card animate__animated animate__fadeInUp">
                        <div class="stat-icon"><i class="fas fa-users"></i></div>
                        <div class="stat-info">
                            <h3>Total Users</h3><p class="stat-value">12.3k</p><p class="stat-trend positive"><i class="fas fa-arrow-up"></i> 3%</p>
                        </div>
                    </div>
                    <div class="stat-card animate__animated animate__fadeInUp" style="animation-delay: 0.1s">
                        <div class="stat-icon"><i class="fas fa-video"></i></div>
                        <div class="stat-info">
                            <h3>Monthly Views</h3><p class="stat-value">21.6k</p><p class="stat-trend positive"><i class="fas fa-arrow-up"></i> 5%</p>
                        </div>
                    </div>
                    <div class="stat-card animate__animated animate__fadeInUp" style="animation-delay: 0.2s">
                        <div class="stat-icon"><i class="fas fa-user-graduate"></i></div>
                        <div class="stat-info">
                            <h3>Active Students</h3><p class="stat-value">34.4k</p><p class="stat-trend positive"><i class="fas fa-arrow-up"></i> 8%</p>
                        </div>
                    </div>
                    <div class="stat-card animate__animated animate__fadeInUp" style="animation-delay: 0.3s">
                        <div class="stat-icon"><i class="fas fa-percentage"></i></div>
                        <div class="stat-info">
                            <h3>Completion Rate</h3><p class="stat-value">15.6%</p><p class="stat-trend negative"><i class="fas fa-arrow-down"></i> 2%</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- User Statistics -->
            <section class="dashboard-section animate__animated animate__fadeIn" style="animation-delay: 0.2s">
                <div class="section-header">
                    <h2><i class="fas fa-user-friends"></i> User Statistics</h2>
                </div>
                <div class="stats-container two-cols">
                     {{-- Nanti data ini akan dinamis dari Controller --}}
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-user"></i></div>
                        <div class="stat-info"><h3>Students</h3><p class="stat-value">10.5k</p></div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                        <div class="stat-info"><h3>Instructors</h3><p class="stat-value">1.2k</p></div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-crown"></i></div>
                        <div class="stat-info"><h3>Admins</h3><p class="stat-value">45</p></div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-user-plus"></i></div>
                        <div class="stat-info"><h3>New Registrations</h3><p class="stat-value">152</p><p class="stat-trend positive"><i class="fas fa-arrow-up"></i> 12%</p></div>
                    </div>
                </div>
            </section>

            <!-- Course Statistics -->
            <section class="dashboard-section animate__animated animate__fadeIn" style="animation-delay: 0.3s">
                <div class="section-header">
                    <h2><i class="fas fa-graduation-cap"></i> Course Statistics</h2>
                </div>
                <div class="stats-container two-cols">
                     {{-- Nanti data ini akan dinamis dari Controller --}}
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-book-open"></i></div>
                        <div class="stat-info"><h3>Total Courses</h3><p class="stat-value">248</p></div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-play-circle"></i></div>
                        <div class="stat-info"><h3>Active Courses</h3><p class="stat-value">387</p></div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-pencil-alt"></i></div>
                        <div class="stat-info"><h3>Draft Courses</h3><p class="stat-value">43</p></div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-clock"></i></div>
                        <div class="stat-info"><h3>Pending Review</h3><p class="stat-value">20</p></div>
                    </div>
                </div>
            </section>

            <!-- Additional Stats Row -->
            <div class="two-column-layout">
                <!-- Device Distribution Section -->
                <section class="dashboard-section animate__animated animate__fadeIn" style="animation-delay: 0.4s">
                    <div class="section-header">
                        <h2><i class="fas fa-mobile-alt"></i> Device Distribution</h2>
                    </div>
                    <div class="section-container">
                        <div class="chart-container">
                            <div class="donut-chart">
                                {{-- Perbaiki Path Gambar --}}
                                <img src="{{ asset('images/devicedistributionchart.png') }}" alt="Device Distribution Chart" class="chart-image">
                            </div>
                        </div>
                        <div class="view-all-container">
                            <button class="view-all-btn">View All</button>
                        </div>
                    </div>
                </section>

                <!-- Student Registration Trend -->
                <section class="dashboard-section animate__animated animate__fadeIn" style="animation-delay: 0.5s">
                    <div class="section-header">
                        <h2><i class="fas fa-chart-line"></i> Student Registration Trend</h2>
                    </div>
                    <div class="section-container">
                        <div class="chart-container wide">
                             {{-- Perbaiki Path Gambar --}}
                            <img src="{{ asset('images/registrationtrend.png') }}" alt="Student Registration Trend" class="chart-image">
                        </div>
                        <div class="view-all-container">
                            <button class="view-all-btn">View All</button>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Course Management -->
            <section class="dashboard-section animate__animated animate__fadeIn" style="animation-delay: 0.8s">
                <div class="section-header">
                    <h2><i class="fas fa-book"></i> Recent Course Submissions</h2>
                </div>
                <div class="section-container">
                     {{-- Tabel ini nanti akan diisi data dinamis --}}
                     <table class="user-table">
                        <thead>
                            <tr class="t"><th>ID</th><th>Title</th><th>Instructor</th><th>Status</th><th>Enrollment</th><th>Created</th><th>Actions</th></tr>
                        </thead>
                        <tbody>
                            {{-- Contoh Baris Statis (Hapus jika menggunakan loop) --}}
                            <tr>
                                <td>101</td><td>Advanced Python Programming</td><td>Dr. Kim</td><td><span class="status-badge status-pending">Pending</span></td><td>320 students</td><td>Mar 20, 2025</td>
                                <td>
                                    {{-- Nanti tombol ini akan submit form atau link ke route --}}
                                    <button class="action-btn action-approve"><i class="fas fa-check"></i> Approve</button>
                                    <button class="action-btn action-reject"><i class="fas fa-times"></i> Reject</button>
                                </td>
                            </tr>
                            <tr>
                                <td>102</td><td>Web Development Bootcamp</td><td>Jane Doe</td><td><span class="status-badge status-approved">Approved</span></td><td>450 students</td><td>Mar 18, 2025</td>
                                <td>
                                    <button class="action-btn action-view"><i class="fas fa-eye"></i> View</button>
                                    <button class="action-btn action-edit"><i class="fas fa-edit"></i> Edit</button>
                                </td>
                            </tr>
                            {{-- Tambahkan baris lain jika perlu untuk contoh --}}
                        </tbody>
                    </table>
                    <div class="view-more">
                        <a href="{{ route('admin.courses.index') }}">View More ></a> {{-- Link ke halaman manage courses --}}
                    </div>
                </div>
            </section>

            <!-- User Management -->
            <section class="dashboard-section animate__animated animate__fadeIn" style="animation-delay: 0.9s">
                <div class="section-header">
                    <h2><i class="fas fa-users"></i> Recent User Activity</h2>
                </div>
                <div class="section-container">
                     {{-- Tabel ini nanti akan diisi data dinamis --}}
                     <table class="user-table">
                        <thead>
                            <tr class="t"><th>Name</th><th>Email</th><th>Role</th><th>Status</th><th>Created Date</th><th>Actions</th></tr>
                        </thead>
                        <tbody>
                             {{-- Contoh Baris Statis (Hapus jika menggunakan loop) --}}
                            <tr>
                                <td>John Doe</td><td>john.doe@example.com</td><td>Student</td><td><span class="status-badge status-active">Active</span></td><td>Mar 15, 2025</td>
                                <td>
                                    {{-- Nanti tombol ini akan link ke route edit atau submit form delete --}}
                                    <button class="action-btn action-edit"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="action-btn action-delete"><i class="fas fa-trash"></i> Delete</button>
                                </td>
                            </tr>
                             <tr>
                                <td>Sarah Johnson</td><td>sarah.j@example.com</td><td>Instructor</td><td><span class="status-badge status-active">Active</span></td><td>Mar 12, 2025</td>
                                <td>
                                    <button class="action-btn action-edit"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="action-btn action-delete"><i class="fas fa-trash"></i> Delete</button>
                                </td>
                            </tr>
                             {{-- Tambahkan baris lain jika perlu untuk contoh --}}
                        </tbody>
                    </table>
                    <div class="view-more">
                        <a href="{{ route('admin.users.index') }}">View More ></a> {{-- Link ke halaman manage users --}}
                    </div>
                </div>
            </section>

            <!-- Activity Log -->
            <section class="dashboard-section animate__animated animate__fadeIn" style="animation-delay: 1.2s">
                <div class="section-header">
                    <h2><i class="fas fa-history"></i> System Activity Log</h2>
                </div>
                <div class="section-container">
                    <div class="activity-container">
                         {{-- Nanti list ini akan dinamis --}}
                        <div class="activity-item animate__animated animate__fadeIn">
                            <div class="activity-icon"><i class="fas fa-check-circle"></i></div>
                            <div class="activity-content"><p><strong>Admin</strong> approved "Advanced Python Programming" course</p><span class="activity-time">1 hour ago</span></div>
                        </div>
                        <div class="activity-item animate__animated animate__fadeIn" style="animation-delay: 0.1s">
                            <div class="activity-icon"><i class="fas fa-user-plus"></i></div>
                            <div class="activity-content"><p>New user registered: <strong>Lily Johnson</strong> (Student)</p><span class="activity-time">2 hours ago</span></div>
                        </div>
                         <div class="activity-item">
                            <div class="activity-icon"><i class="fas fa-upload"></i></div>
                            <div class="activity-content"><p>Instructor Dr. Kim uploaded new course</p><span class="activity-time">3 hours ago</span></div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon"><i class="fas fa-certificate"></i></div>
                            <div class="activity-content"><p>15 certificates issued for "JavaScript Fundamentals"</p><span class="activity-time">5 hours ago</span></div>
                        </div>
                    </div>
                     {{-- Mungkin ada link ke halaman log lengkap --}}
                     {{-- <div class="view-more"><a href="#">View Full Log ></a></div> --}}
                </div>
            </section>

             {{-- ==== AKHIR KONTEN YANG DISALIN DARI HTML ==== --}}
        </main>
    </div>
    {{-- Container utama ditutup di sini --}}
    </div>

    {{-- Jika ada JS khusus untuk dashboard admin --}}
    {{-- <script src="{{ asset('js/admin-dashboard.js') }}"></script> --}}
</body>
</html>