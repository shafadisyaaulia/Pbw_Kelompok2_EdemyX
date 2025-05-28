<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Manage Courses - EdemyX')</title>

    {{-- CSS Anda --}}
    <link rel="stylesheet" href="{{ asset('css/course.css') }}"> {{-- Pastikan path dan nama file benar --}}
    {{-- Jika styling status, pagination, dll ada di CSS terpisah, link juga --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    {{-- Font Awesome (Hanya satu) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- Styling tambahan jika diperlukan (misal untuk pesan sukses) --}}
    <style>
        .alert-success {
            color: #155724; background-color: #d4edda; border-color: #c3e6cb;
            padding: .75rem 1.25rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: .25rem;
        }
        /* Styling untuk status badge (jika belum ada di CSS utama) */
        .status { padding: 3px 8px; border-radius: 10px; font-size: 0.75rem; font-weight: 500; color: #fff; display: inline-block; text-transform: capitalize;}
        .status.published { background-color: #d1e7dd; color: #0f5132;}
        .status.archived { background-color: #f8d7da; color: #721c24;}
        .status.pending { background-color: #fff3cd; color: #664d03;}
        .status.draft { background-color: #e2e3e5; color: #41464b;}
    </style>

</head>
<body>
    <div class="container">
        <!-- Navbar -->
        <header class="navbar">
            {{-- ... (Navbar Anda - pastikan link profile benar: route('profile.show')) ... --}}
             <div class="left-section">
                <div class="logo"><a href="{{ route('admin.dashboard') }}" style="text-decoration: none; color: inherit;">EdemyX</a></div>
                <nav>
                    <a href="#">Explore ▾</a>
                    <a href="{{ route('courses.index') }}">Courses</a> {{-- Route publik --}}
                    <a href="{{ route('categories.index') }}">Categories</a> {{-- Route publik --}}
                </nav>
            </div>
            <div class="search-container">
                <input type="text" class="search-bar" placeholder="Search for courses...">
                <i class="fas fa-search search-icon"></i>
            </div>
            <div class="icons">
                <span class="icon"><a href="{{-- route('wishlist') --}}" style="color: inherit;"><i class="fas fa-heart"></i></a></span>
                <span class="icon"><a href="{{-- route('notifications') --}}" style="color: inherit;"><i class="fas fa-bell"></i><span class="notification-badge">3</span></a></span>
                {{-- Link ke profile (bisa pakai route user biasa) --}}
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
                    {{-- Pastikan semua route name benar --}}
                    <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-th"></i> Dashboard</a></li>
                    <li><a href="{{ route('admin.users.index') }}"><i class="fas fa-users"></i> Manage Users</a></li>
                    <li class="active"><i class="fas fa-book"></i> Manage Courses</li>
                    <li><a href="#"><i class="fas fa-chalkboard-teacher"></i> Manage Classes</a></li>
                    <li><a href="#"><i class="fas fa-credit-card"></i> Payments & Finance</a></li>
                    <li><a href="#"><i class="fas fa-certificate"></i> Certificates</a></li>
                    <li><a href="#"><i class="fas fa-chart-line"></i> Reports & Analytics</a></li>
                    <li><a href="#"><i class="fas fa-calendar"></i> Schedule</a></li>
                    <li><a href="#"><i class="fas fa-history"></i> Activity Logs</a></li>
                    <li><a href="{{ route('profile.show') }}"><i class="fas fa-user"></i> Profile</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
                    <li><a href="#"><i class="fas fa-question-circle"></i> Help Center</a></li>
                </ul>
            </aside>
            <!-- Main Content -->
            <main class="main-content">
                <div class="page-header">
                    <h1>Manage Courses</h1>
                    <div class="actions">
                        <button class="btn btn-outline"><i class="fas fa-filter"></i> Filter</button>
                        <button class="btn btn-outline"><i class="fas fa-sort"></i> Sort</button>
                        <a href="{{ route('admin.courses.create') }}" class="add-course-btn btn"><i class="fas fa-plus"></i> Add Course</a>
                    </div>
                </div>

                 {{-- Menampilkan Pesan Sukses --}}
                 @if (session('success'))
                    <div class="alert-success">
                        {{ session('success') }}
                    </div>
                 @endif

                <!-- Stats Cards -->
                 {{-- Anda bisa mengisi data ini dari controller nanti --}}
                <div class="stats-cards">
                     <div class="stat-card"> <div class="stat-icon blue"><i class="fas fa-book"></i></div> <div class="stat-info"> <h3>Total Courses</h3><p class="stat-number">{{ $courses->total() ?? 'N/A' }}</p><p class="stat-change positive"><i class="fas fa-arrow-up"></i> ...%</p> </div> </div>
                     <div class="stat-card"> <div class="stat-icon green"><i class="fas fa-user-graduate"></i></div> <div class="stat-info"> <h3>Active Enrollments</h3><p class="stat-number">...</p><p class="stat-change positive"><i class="fas fa-arrow-up"></i> ...%</p> </div> </div>
                     <div class="stat-card"> <div class="stat-icon orange"><i class="fas fa-star"></i></div> <div class="stat-info"> <h3>Average Rating</h3><p class="stat-number">...</p><p class="stat-change positive"><i class="fas fa-arrow-up"></i> ...</p> </div> </div>
                     <div class="stat-card"> <div class="stat-icon purple"><i class="fas fa-dollar-sign"></i></div> <div class="stat-info"> <h3>Revenue</h3><p class="stat-number">...</p><p class="stat-change positive"><i class="fas fa-arrow-up"></i> ...%</p> </div> </div>
                </div>

                <!-- Course Management -->
                <div class="course-management">
                    <div class="filter-controls">
                        {{-- Filter bisa diisi dari controller nanti --}}
                        <div class="search-box"> <i class="fas fa-search"></i> <input type="text" placeholder="Search courses..."> </div>
                        <div class="filter-group">
                            <select> <option>All Categories</option> {{-- Loop $categories --}} </select>
                            <select> <option>All Status</option> <option>Published</option> <option>Draft</option> <option>Archived</option> <option>Pending</option> </select>
                            <select> <option>All Instructors</option> {{-- Loop $instructors --}} </select>
                        </div>
                    </div>

                    <!-- Courses Table -->
                    <div class="courses-table-container">
                        <table class="courses-table">
                            <thead>
                                <tr>
                                    <th>COURSE NAME</th>
                                    <th>CATEGORY</th>
                                    <th>INSTRUCTOR</th>
                                    <th>ENROLLED</th> {{-- Kolom ini mungkin perlu data tambahan --}}
                                    <th>RATING</th>
                                    <th>STATUS</th>
                                    <th>PRICE</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            {{-- =============================================== --}}
                            {{-- ===== AWAL BAGIAN TBODY DINAMIS ===== --}}
                            {{-- =============================================== --}}
                            <tbody>
                                @forelse($courses as $course) {{-- Loop data $courses dari Controller --}}
                                <tr>
                                    <td class="course-info">
                                        {{-- Tampilkan thumbnail jika ada --}}
                                        @if($course->thumbnail)
                                            {{-- Pastikan storage link bekerja dan path benar --}}
                                            <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}" width="60">
                                        @else
                                            {{-- Gambar default jika tidak ada thumbnail --}}
                                            <img src="{{ asset('images/default-course.jpg') }}" alt="Default thumbnail" width="60">
                                        @endif
                                        <div>
                                            {{-- Tampilkan judul dari database --}}
                                            <h4><a href="{{ route('admin.courses.show', $course) }}" title="View Details">{{ $course->title }}</a></h4>
                                            {{-- Tampilkan tanggal dari database --}}
                                            <p>Created: {{ $course->created_at->format('M d, Y') }}</p>
                                        </div>
                                    </td>
                                    {{-- Tampilkan nama kategori (gunakan relasi & null safe operator) --}}
                                    <td>{{ $course->category?->name ?? 'N/A' }}</td>
                                    {{-- Tampilkan nama instruktur (gunakan relasi & null safe operator) --}}
                                    <td>{{ $course->instructor?->name ?? 'N/A' }}</td>
                                    {{-- Kolom Enrolled - Perlu data dari relasi students/enrollments nanti --}}
                                    <td>{{-- $course->students_count ?? 0 --}} - </td>
                                    {{-- Tampilkan rating --}}
                                    <td>{{ number_format($course->rating, 1) }} <i class="fas fa-star gold"></i></td>
                                    {{-- Tampilkan status dengan class dinamis --}}
                                    <td><span class="status {{ strtolower($course->status ?? 'draft') }}">{{ ucfirst($course->status ?? 'Draft') }}</span></td>
                                    {{-- Tampilkan harga --}}
                                    <td>${{ number_format($course->price, 2) }}</td>
                                    {{-- Kolom Actions (menggunakan $course->id) --}}
                                    <td class="actions">
                                        <a href="{{ route('admin.courses.edit', $course) }}" class="action-btn" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.courses.show', $course) }}" class="action-btn" title="View"><i class="fas fa-eye"></i></a>
                                        <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn" title="Delete" onclick="return confirm('Are you sure you want to delete \'{{ $course->title }}\'?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                {{-- Pesan jika tidak ada kursus di database --}}
                                <tr>
                                    <td colspan="8" style="text-align: center; padding: 20px;">No courses found in the database. <a href="{{ route('admin.courses.create') }}">Add the first one?</a></td>
                                </tr>
                                @endforelse
                            </tbody>
                             {{-- =============================================== --}}
                            {{-- ===== AKHIR BAGIAN TBODY DINAMIS ===== --}}
                            {{-- =============================================== --}}
                        </table>
                    </div>

                    <!-- Pagination -->
                     {{-- Tampilkan link pagination jika menggunakan paginate() di Controller --}}
                     @if ($courses instanceof \Illuminate\Pagination\LengthAwarePaginator)
                         <div class="pagination" style="margin-top: 20px;">
                             {{-- Informasi pagination (misal: Showing 1 to 10 of 25 results) --}}
                             <div class="pagination-info">
                                 Showing {{ $courses->firstItem() }} to {{ $courses->lastItem() }} of {{ $courses->total() }} courses
                             </div>
                              {{-- Kontrol pagination (link halaman) --}}
                             <div class="pagination-controls">
                                 {{ $courses->links() }} {{-- Render link pagination standar Laravel --}}
                             </div>
                             {{-- Dropdown Rows per page (perlu logic JS/backend tambahan) --}}
                             <div class="per-page">
                                 <label>Rows per page:</label>
                                 <select> <option>10</option> <option>25</option> <option>50</option> </select>
                             </div>
                         </div>
                     @endif

                </div> {{-- Akhir .course-management --}}
            </main>
        </div>
    </div>
    {{-- <script src="{{ asset('js/manage-courses.js') }}"></script> --}}
</body>
</html>