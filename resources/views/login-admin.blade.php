{{-- File: resources/views/login-admin.blade.php --}}

<!DOCTYPE html>
<html lang="en"> {{-- Sebaiknya gunakan lang="id" jika targetnya Indonesia --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Login')</title>

    {{-- Link CSS Anda (Sudah Benar) --}}
    <link rel="stylesheet" href="{{ asset('css/style-login-daftar.css') }}">

    {{-- CSS Tambahan untuk menampilkan error server-side --}}
    <style>
        /* Pastikan styling .server-error dan .status-message sudah ada di CSS utama atau di sini */
        .server-error {
            color: #f06272; /* Warna dari CSS Anda */
            font-size: 0.8em;
            text-align: left;
            width: 100%;
            padding-left: 60px; /* Sesuaikan agar pas */
            margin-top: 3px;
            display: block; /* Pastikan tampil */
        }
        .status-message {
             padding: 10px;
             margin-bottom: 15px;
             border-radius: 4px;
             background-color: #d1e7dd;
             color: #0f5132;
             border: 1px solid #badbcc;
             text-align: center; /* Buat rata tengah */
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Welcome to EdemyX</h1>
        <h2>Login as Admin</h2>

        {{-- Pesan error dari JavaScript client-side Anda (jika ada) --}}
        <p id="errors-message"></p>

        {{-- Menampilkan pesan status session (jika ada redirect dengan pesan) --}}
        @if (session('status'))
            <div class="status-message">
                {{ session('status') }}
            </div>
        @endif

        {{-- Menampilkan error login umum (kredensial salah) --}}
        {{-- Error ini biasanya ditampilkan jika Auth::attempt gagal --}}
         @if ($errors->has('email') || $errors->has('password')) {{-- Cek error di kedua field --}}
             <div class="server-error" style="text-align: center; padding-left: 0; margin-bottom: 10px;">
                 {{ $errors->first('email') ?: $errors->first('password') }} {{-- Tampilkan error pertama yg muncul --}}
             </div>
         @endif


        {{-- Form disesuaikan untuk route submit login admin --}}
        <form id="form" method="POST" action="{{ route('admin.login.submit') }}"> {{-- Pastikan route name ini benar --}}
            @csrf {{-- Token CSRF --}}

            {{-- Input Email --}}
            {{-- Tambahkan class input-group --}}
            <div class="input-group">
                {{-- Tambahkan class input-icon --}}
                <label for="email-input-admin" class="input-icon">
                    <span>@</span>
                </label>
                {{-- name="email", id="email-input-admin" --}}
                <input type="email" name="email" id="email-input-admin" placeholder="email admin" value="{{ old('email') }}" required autofocus>
            </div>
            {{-- Tidak perlu menampilkan error spesifik email lagi jika sudah ada error umum di atas --}}

            {{-- Input Password --}}
             {{-- Tambahkan class input-group --}}
            <div class="input-group" style="margin-top: 1rem;">
                 {{-- Tambahkan class input-icon --}}
                <label for="password-input-admin" class="input-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm240-200q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80Z"/></svg> {{-- Ganti fill ke currentColor agar bisa diwarnai CSS --}}
                </label>
                {{-- name="password", id="password-input-admin" --}}
                <input type="password" name="password" id="password-input-admin" placeholder="password" required>
            </div>
             {{-- Tidak perlu menampilkan error spesifik password --}}


            {{-- Tombol Login --}}
            {{-- Tambahkan class form-actions --}}
            <div class="form-actions" style="justify-content: center;"> {{-- Ratakan ke tengah jika hanya ada tombol --}}
                <button type="submit">Login</button>
            </div>
        </form>

        {{-- Link ke halaman login user --}}
         {{-- Tambahkan class auth-links --}}
        <div class="auth-links">
            <p>Login as User?
                <a href="{{ route('login') }}">Login as User</a> {{-- Pastikan route name ini benar --}}
            </p>
        </div>
    </div>

    {{-- Script JS Anda (Jika Ada yang Spesifik untuk Halaman Ini) --}}
    {{-- <script src="{{ asset('js/validation-admin.js') }}" defer></script> --}}
     {{-- Atau jika pakai validation.js yang sama: --}}
     <script src="{{ asset('js/validation.js') }}" defer></script>
</body>
</html>