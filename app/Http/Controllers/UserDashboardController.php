<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course; // Import model Course
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UserDashboardController extends Controller
{
    public function index(): View|RedirectResponse
    {
        // Periksa Role (jika diperlukan, atau pindahkan ke middleware)
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Ambil beberapa kursus terbaru yang sudah di-publish
        $latestCourses = Course::where('status', 'published') // Filter kursus yang siap tampil
                              ->orderBy('created_at', 'desc') // Urutkan dari yang paling baru
                              ->with('instructor') // Eager load instructor jika perlu ditampilkan
                              ->take(4) // Ambil misal 4 kursus terbaru
                              ->get();

        // Anda juga bisa mengambil data lain untuk dashboard di sini
        // Misalnya: jumlah kursus yang sedang diikuti user, progress rata-rata, dll.
        // $enrolledCount = Auth::user()->courses()->count();

        // Kirim data ke view dashboard pengguna
        return view('user-dashboard', [
            'latestCourses' => $latestCourses,
            // 'enrolledCount' => $enrolledCount, // Contoh data lain
        ]);
    }
}