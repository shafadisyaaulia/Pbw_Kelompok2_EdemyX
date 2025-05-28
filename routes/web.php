<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// Import Controller yang dibutuhkan
use App\Http\Controllers\ProfileController; // Breeze Profile Controller
use App\Http\Controllers\Auth\AdminLoginController; // Controller Login Admin Kustom Anda
use App\Http\Controllers\Admin\AdminCourseController; // *** IMPORT CONTROLLER KURSUS ADMIN ***
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\CourseController;
// --- Placeholder untuk Controller Masa Depan ---
// use App\Http\Controllers\UserCourseController;
// use App\Http\Controllers\CertificateController;
// use App\Http\Controllers\ProgressController;
// use App\Http\Controllers\ScheduleController;
// use App\Http\Controllers\WishlistController;
// use App\Http\Controllers\NotificationController;
// use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
// use App\Http\Controllers\Admin\AdminProfileController; // Jika perlu

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// == 1. HALAMAN PUBLIK / UMUM ==

// Halaman Utama (Landing Page)
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard'); // Redirect ke route 'dashboard' (akan dicek role di sana)
    }
    return view('guest');
})->name('home');

// Route publik lainnya (contoh)
Route::get('/courses', function () { /* TODO */ return "Halaman Daftar Kursus Publik"; })->name('courses.index');
Route::get('/categories', function () { /* TODO */ return "Halaman Daftar Kategori Publik"; })->name('categories.index');


// == 2. ROUTE AUTENTIKASI ADMIN (KUSTOM) ==
Route::middleware('guest')->group(function() {
    Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
});


// == 3. ROUTE UNTUK USER YANG SUDAH LOGIN (Middleware 'auth') ==
Route::middleware(['auth'])->group(function () {

    // Dashboard User (Penentu Arah setelah Login)
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    // // Route::get('/dashboard', function () {
    //     if (Auth::user()->role === 'admin') {
    //         return redirect()->route('admin.dashboard'); // Arahkan Admin ke Dashboard Admin
    //     }
    //     return view('user-dashboard'); 
    // })->name('dashboard'); // Nama 'dashboard' standar 

    // Halaman-halaman user lainnya
    Route::get('/my-courses', [CourseController::class, 'index'])->name('my-courses');
    Route::get('/certificates', function () { /* TODO */ return view('certificates'); })->name('certificates');
    Route::get('/progress', function () { /* TODO */ return view('progress'); })->name('progress');
    Route::get('/schedule', function () { /* TODO */ return view('schedule'); })->name('schedule');
    Route::get('/calendar', function () { /* TODO */ return view('calendar'); })->name('calendar');
    Route::get('/wishlist', function () { /* TODO */ return view('wishlist'); })->name('wishlist');
    Route::delete('/wishlist/{itemId}', function ($itemId) { /* TODO */ return "Menghapus item wishlist ID: $itemId..."; })->name('wishlist.remove');
    Route::get('/notifications', function () { /* TODO */ return view('notifications'); })->name('notifications');
    Route::get('/settings', function () { return redirect()->route('profile.show'); })->name('settings');
    Route::get('/course-player/{courseId}', function ($courseId) { /* TODO */ return view('course-player'); })->name('course.player');
    Route::get('/course-detail/{courseId}', function ($courseId) { /* TODO */ return view('course-detail'); })->name('course.detail');

    // --- Profile User (Menggunakan Controller Breeze) ---
// Profile (user & admin, view akan menyesuaikan role)
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// == 4. ROUTE UNTUK ADMIN YANG SUDAH LOGIN (Middleware 'auth' & 'admin') ==

// Middleware 'auth' & middleware 'admin' (PASTIKAN ALIAS 'admin' BENAR DI KERNEL)
// Atau gunakan nama class lengkap jika alias masih bermasalah: ['auth', \App\Http\Middleware\EnsureUserIsAdmin::class]
Route::prefix('admin')->name('admin.')->middleware(['auth', \App\Http\Middleware\EnsureUserIsAdmin::class])->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', function () { /* TODO: AdminDashboardController@index */ return view('dashboard-admin'); })->name('dashboard'); // admin.dashboard

    // Logout Admin
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout'); // admin.logout

    // --- CRUD Users (Placeholder - Gunakan Resource Controller nanti) ---
   Route::get('/manage-users', [\App\Http\Controllers\Admin\AdminUserController::class, 'index'])->name('users.index');
    Route::resource('users', \App\Http\Controllers\Admin\AdminUserController::class)->except(['index', 'show']);
    // ===========================================================
    // === AWAL PERBAIKAN ROUTE KURSUS ADMIN ===
    // ===========================================================

    // --- CRUD Courses (Menggunakan Resource Controller) ---
    // Ini akan otomatis membuat route:
    // GET       /admin/courses                  -> courses.index (jika tidak di-except)
    // GET       /admin/courses/create           -> courses.create
    // POST      /admin/courses                  -> courses.store
    // GET       /admin/courses/{course}         -> courses.show
    // GET       /admin/courses/{course}/edit    -> courses.edit
    // PUT/PATCH /admin/courses/{course}         -> courses.update
    // DELETE    /admin/courses/{course}         -> courses.destroy
    // Kita kecualikan index karena ingin URL /manage-courses
    Route::resource('courses', AdminCourseController::class)->except(['index']);

    // Route terpisah untuk menampilkan daftar kursus dengan URL yang diinginkan
    Route::get('/manage-courses', [AdminCourseController::class, 'index'])->name('courses.index'); // admin.courses.index

    // ===========================================================
    // === AKHIR PERBAIKAN ROUTE KURSUS ADMIN ===
    // ===========================================================


    // --- Admin Profile ---
    // Admin bisa menggunakan halaman profile yang sama dengan user, karena sudah dilindungi 'auth'
    // Aksesnya melalui URL /admin/profile, tapi route name-nya tetap 'profile.show' (karena definisi di grup 'auth')
    // Jika Anda memanggil {{ route('admin.profile.show') }}, ini akan error.
    // Untuk link profile admin di sidebar/navbar admin, gunakan: {{ route('profile.show') }}
    // ATAU definisikan ulang route profile KHUSUS di grup admin ini:
    // Route::get('/profile', function() { return view('profile'); })->name('profile.show'); // Ini akan membuat nama admin.profile.show
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Ini akan membuat nama admin.profile.update (Perlu controller admin jika beda logika)


    // Route admin lainnya
    // ...

});


// == 5. MEMUAT ROUTE AUTENTIKASI USER BIASA DARI BREEZE ==
require __DIR__.'/auth.php';
// Route /logout untuk user biasa akan didefinisikan di sini.


// == 6. ROUTE FALLBACK (404 Not Found) ==
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});