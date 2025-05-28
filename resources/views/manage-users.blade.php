{{-- filepath: resources/views/manage-users.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User - EdemyX</title>
    <link rel="stylesheet" href="{{ asset('css/users.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div class="container">
        <!-- Navbar dan Sidebar ... (biarkan seperti kode Anda) -->
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
         <div class="dashboard-container">
            <!-- Sidebar -->
            <aside class="sidebar">
            <ul>
                {{-- Pastikan semua route name benar --}}
                <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-th"></i> Dashboard</a></li>
                <li class="active"><a href="#"><i class="fas fa-users"></i> Manage Users</a></li>
                <li><a href="{{ route('admin.courses.index') }}"><i class="fas fa-book"></i> Manage Courses</a></li>
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

        <main class="main-content slide-in">
            <!-- <div class="page-header">
                <h1>Manage Users</h1>
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add User</a>
            </div> -->

            <!-- Pesan sukses -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Error validasi -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Add User Form -->
            <div class="add-user-form fade-in">
                <h2 class="form-title">Add New User</h2>
                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label>Name*</label>
                            <input type="text" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" name="email" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Role*</label>
                            <select name="role" required>
                                <option value="">Select Role</option>
                                <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                                <option value="instructor" {{ old('role') == 'instructor' ? 'selected' : '' }}>Instructor</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="moderator" {{ old('role') == 'moderator' ? 'selected' : '' }}>Moderator</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" name="phone_number" value="{{ old('phone_number') }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Password*</label>
                            <input type="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password*</label>
                            <input type="password" name="password_confirmation" required>
                        </div>
                        <div class="form-group">
                            <label>Status*</label>
                            <select name="status" required>
                                <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </div>
                </form>
            </div>

            <!-- User List -->
            <div class="user-list fade-in">
                <h2 class="form-title">Recent Users</h2>
                <table class="user-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Registered</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>
                                <span class="status-badge status-{{ $user->status }}">{{ ucfirst($user->status) }}</span>
                            </td>
                            <td>{{ $user->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user) }}" class="action-btn action-edit"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn action-delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    {{ $users->links() }}
                </div>
            </div>
        </main>
    </div>
</body>
</html>