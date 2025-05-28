<!DOCTYPE html>
<html>
<head>
    <title>Add New Course</title>
    {{-- Link ke CSS baru --}}
    <link rel="stylesheet" href="{{ asset('css/courses.css') }}">
    {{-- Jika perlu CSS dasar lain (misal font), link juga --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> --}}
</head>
<body class="admin-form-page"> {{-- Tambahkan class ke body --}}

    <div class="course-form-container"> {{-- Ganti class container --}}
        <h1>Add New Course</h1>

        @if ($errors->any())
            <div class="alert-danger">
                <strong>Whoops! Something went wrong.</strong>
                <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
            </div>
        @endif

        <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Course Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                @error('description') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id" required>
                    <option value="">-- Select Category --</option>
                    @isset($categories)
                        @foreach($categories as $id => $name)
                            <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    @endisset
                </select>
                @error('category_id') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="instructor_id">Instructor:</label>
                 <select name="instructor_id" id="instructor_id" required>
                    <option value="">-- Select Instructor --</option>
                     @isset($instructors)
                        @foreach($instructors as $id => $name)
                            <option value="{{ $id }}" {{ old('instructor_id') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                     @endisset
                </select>
                @error('instructor_id') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" step="0.01" min="0" value="{{ old('price', 0) }}" required>
                @error('price') <span class="error">{{ $message }}</span> @enderror
            </div>

             <div class="form-group">
                <label for="level">Level:</label>
                <select name="level" id="level">
                    <option value="">-- Select Level --</option>
                    <option value="beginner" {{ old('level') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                    <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="advanced" {{ old('level') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                </select>
                @error('level') <span class="error">{{ $message }}</span> @enderror
            </div>

             <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" required>
                    <option value="draft" {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending Review</option>
                </select>
                @error('status') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="thumbnail">Thumbnail:</label>
                <input type="file" id="thumbnail" name="thumbnail" accept="image/*">
                @error('thumbnail') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-actions"> {{-- Bungkus tombol --}}
                 <a href="{{ route('admin.courses.index') }}" class="btn cancel-btn">Cancel</a>
                <button type="submit">Save Course</button>
            </div>
        </form>
    </div> {{-- Akhir .course-form-container --}}

</body>
</html>