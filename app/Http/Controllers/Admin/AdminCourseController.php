<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Category; // Impor Category
use App\Models\User;    // Impor User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str; // Impor Str untuk slug

class AdminCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Eager load relasi category dan instructor
        $courses = Course::with(['category', 'instructor'])
                         ->latest()
                         ->paginate(10); // Gunakan paginate
        return view('manage-courses', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // Ambil data untuk dropdown
        $categories = Category::orderBy('name')->pluck('name', 'id');
        $instructors = User::whereIn('role', ['admin', 'instructor']) // Lebih baik pakai whereIn
                           ->orderBy('name')
                           ->pluck('name', 'id'); // Ambil nama sebagai value, id sebagai key

        return view('admin.courses.create', compact('categories', 'instructors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:courses,title',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'instructor_id' => 'required|exists:users,id',
            'level' => 'nullable|string|max:50', // Sesuaikan aturan
            'status' => 'required|in:draft,published,archived,pending', // Sesuaikan status
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Tambahkan validasi lain jika ada field di $fillable
        ]);

        // Handle Upload Gambar
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail'] = $path;
        }

        // Generate Slug
        $validated['slug'] = Str::slug($validated['title']);

        Course::create($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course): View
    {
         return view('admin.courses.show', compact('course'));
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course): View
    {
        // Ambil data untuk dropdown
        $categories = Category::orderBy('name')->pluck('name', 'id');
        $instructors = User::whereIn('role', ['admin', 'instructor'])
                           ->orderBy('name')
                           ->pluck('name', 'id');

        return view('admin.courses.edit', compact('course', 'categories', 'instructors'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:courses,title,' . $course->id,
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'instructor_id' => 'required|exists:users,id',
            'level' => 'nullable|string|max:50',
            'status' => 'required|in:draft,published,archived,pending',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Tambahkan validasi lain
        ]);

        // Handle Upload Gambar Baru
        if ($request->hasFile('thumbnail')) {
            // Hapus gambar lama
            if ($course->thumbnail && Storage::disk('public')->exists($course->thumbnail)) {
                Storage::disk('public')->delete($course->thumbnail);
            }
            // Simpan gambar baru
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail'] = $path;
        }

        // Generate Slug jika title berubah
        if ($request->title !== $course->title) {
             $validated['slug'] = Str::slug($validated['title']);
        }

        $course->update($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course): RedirectResponse
    {
        // Hapus Gambar Terkait
         if ($course->thumbnail && Storage::disk('public')->exists($course->thumbnail)) {
            Storage::disk('public')->delete($course->thumbnail);
        }

        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully!');
    }
}