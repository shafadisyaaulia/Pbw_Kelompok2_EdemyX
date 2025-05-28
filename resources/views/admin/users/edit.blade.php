{{-- filepath: resources/views/admin/users/edit.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User - EdemyX</title>
    <link rel="stylesheet" href="{{ asset('css/users.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.users.update', $user) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Name*</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
            </div>
            <div class="form-group">
                <label>Email*</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>
            <div class="form-group">
                <label>Role*</label>
                <select name="role" required>
                    <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Student</option>
                    <option value="instructor" {{ $user->role == 'instructor' ? 'selected' : '' }}>Instructor</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="moderator" {{ $user->role == 'moderator' ? 'selected' : '' }}>Moderator</option>
                </select>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="tel" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
            </div>
            <div class="form-group">
                <label>Status*</label>
                <select name="status" required>
                    <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="pending" {{ $user->status == 'pending' ? 'selected' : '' }}>Pending</option>
                </select>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update User</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>