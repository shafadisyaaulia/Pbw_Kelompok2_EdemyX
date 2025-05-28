{{-- File: resources/views/admin/courses/show.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Course Detail: {{ $course->title }}</title>
    {{-- Link ke CSS --}}
    <link rel="stylesheet" href="{{ asset('css/courses.css') }}">
    {{-- Font Awesome jika perlu --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    {{-- Styling untuk status badge (jika belum ada di courses.css) --}}
    <style>
        .status { padding: 3px 8px; border-radius: 10px; font-size: 0.8rem; font-weight: 500; color: #fff; display: inline-block; text-transform: capitalize;}
        .status.published { background-color: #d1e7dd; color: #0f5132;}
        .status.archived { background-color: #f8d7da; color: #721c24;}
        .status.pending { background-color: #fff3cd; color: #664d03;}
        .status.draft { background-color: #e2e3e5; color: #41464b;}
    </style>
</head>
<body class="admin-form-page"> {{-- Class body agar background sama --}}

    {{-- Sertakan layout admin jika ada --}}
    {{-- @include('layouts.admin_navigation') --}}

    <div class="course-detail-container"> {{-- Gunakan class container show --}}
        <h1>Course Detail: {{ $course->title }}</h1>

        <div class="detail-item">
            <strong>ID:</strong> <span>{{ $course->id }}</span>
        </div>
        <div class="detail-item">
            <strong>Slug:</strong> <span>{{ $course->slug }}</span>
        </div>
        <div class="detail-item">
            <strong>Category:</strong> <span>{{ $course->category?->name ?? 'N/A' }}</span>
        </div>
        <div class="detail-item">
            <strong>Instructor:</strong> <span>{{ $course->instructor?->name ?? 'N/A' }}</span>
        </div>
        <div class="detail-item">
            <strong>Price:</strong> <span>${{ number_format($course->price, 2) }}</span>
        </div>
        <div class="detail-item">
            <strong>Level:</strong> <span>{{ ucfirst($course->level ?? 'N/A') }}</span>
        </div>
         <div class="detail-item">
            <strong>Status:</strong>
            <span class="status {{ strtolower($course->status ?? 'draft') }}">{{ ucfirst($course->status ?? 'N/A') }}</span>
        </div>
        <div class="detail-item">
            <strong>Rating:</strong> <span>{{ number_format($course->rating, 1) }} / 5.0</span>
        </div>
        <div class="detail-item">
            <strong>Description:</strong>
            <p>{!! nl2br(e($course->description)) !!}</p>
        </div>
        <div class="detail-item">
            <strong>Thumbnail:</strong>
             @if($course->thumbnail)
                <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="Thumbnail">
             @else
                <span>No thumbnail provided.</span>
             @endif
        </div>
        <div class="detail-item">
            <strong>Created At:</strong> <span>{{ $course->created_at->format('M d, Y H:i:s') }}</span>
        </div>
         <div class="detail-item">
            <strong>Last Updated:</strong> <span>{{ $course->updated_at->format('M d, Y H:i:s') }}</span>
        </div>

        <div class="detail-actions"> {{-- Area tombol --}}
            <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete \'{{ $course->title }}\'?')">
                    Delete
                </button>
            </form>
            <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Back to List</a>
        </div>

    </div> {{-- Akhir .course-detail-container --}}

</body>
</html>