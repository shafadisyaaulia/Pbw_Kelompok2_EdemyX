<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course; // Tetap diperlukan jika Anda ingin type hint
use Illuminate\Support\Facades\Auth; // <-- WAJIB: Untuk mendapatkan user yang login
use Illuminate\View\View; // <-- Baik untuk type hinting return

class CourseController extends Controller 
{
    /**
     * Menampilkan kursus yang diikuti oleh pengguna yang sedang login.
     * (Sebaiknya ganti nama method ini jadi myCourses jika controllernya
     *  bukan hanya untuk kursus, tapi ini akan bekerja jika rute Anda
     *  sudah menunjuk ke metode index ini untuk /my-courses)
     */
    public function index(): View 
    {
        // 1. Pastikan pengguna sudah login
        if (!Auth::check()) {
            // Jika belum login, redirect ke halaman login
            // Nama rute 'login' adalah default Laravel, sesuaikan jika berbeda
            return redirect()->route('login')->with('error', 'You must be logged in to view your courses.');
        }

        // 2. Dapatkan objek pengguna yang sedang login
        $user = Auth::user();

        // 3. Ambil kursus HANYA yang terhubung ke user ini via relasi 'courses'
        //    Gunakan with('instructor') untuk Eager Loading (lebih efisien)
        //    jika Anda perlu menampilkan nama instruktur di view.
        $enrolledCourses = $user->courses()->with('instructor')->get();
        // Jika butuh kategori juga: $user->courses()->with(['instructor', 'category'])->get();


        // 4. Kirim data kursus yang sudah difilter ke view
        //    Pastikan nama variabel di view adalah 'courses'
        return view('my-courses', ['courses' => $enrolledCourses]);
    }
}