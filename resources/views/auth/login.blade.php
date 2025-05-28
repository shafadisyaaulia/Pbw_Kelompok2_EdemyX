{{-- File: resources/views/auth/login.blade.php --}}
{{-- Menggunakan struktur HTML dari desain Anda, dengan penyesuaian untuk Breeze --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login')</title> {{-- Title dari desain Anda --}}

    {{-- CSS dari desain Anda --}}
    <link rel="stylesheet" href="{{ asset('css/style-login-daftar.css') }}">

    {{-- Tambahkan styling untuk pesan error server-side jika perlu --}}
    <style>
        .server-error {
            color: #dc3545; /* Contoh warna merah untuk error */
            font-size: 0.875em;
            margin-top: .25rem;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Welcome to EdemyX</h1>
        <h3>Login as User</h3>

        {{-- Tempat menampilkan error validasi client-side JS Anda (jika ada) --}}
        <p id="errors-message"></p>

        {{-- Menampilkan status session (misalnya setelah reset password) --}}
        <x-auth-session-status class="mb-4" :status="session('status')" /> {{-- Anda mungkin perlu styling untuk ini --}}

        {{-- Form disesuaikan untuk Breeze --}}
        <form id="form" method="POST" action="{{ route('login') }}"> 
            @csrf {{-- Token CSRF WAJIB --}}

            {{-- Input Email --}}
            <div class="input-group"> 
                <label for="email-input" class="input-icon"> 
                    <span>@</span>
                </label>
                <input type="email" name="email" id="email-input" placeholder="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            </div>
             @error('email')
                 <div class="server-error">{{ $message }}</div>
             @enderror

            {{-- Input Password --}}
            <div class="input-group" style="margin-top: 1rem;"> 
                <label for="password-input" class="input-icon"> 
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm240-200q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80Z"/></svg>
                </label>
                <input type="password" name="password" id="password-input" placeholder="password" required autocomplete="current-password">
            </div>
            @error('password')
                 <div class="server-error">{{ $message }}</div>
             @enderror
            

            {{-- Remember Me (Tambahan dari Breeze) --}}
            <div class="remember-me-container"> 
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>{{ __('Remember me') }}</span> 
                </label>
            </div>

            {{-- Tombol Login & Forgot Password --}}
            <div class="form-actions">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                 {{-- Tombol Login Anda --}}
                <button type="submit">Login</button>
            </div>
        </form>

        {{-- Link ke halaman lain dari desain Anda --}}
        <p style="margin-top: 1.5rem;">Don't have an account?
            <a href="{{ route('register') }}">Sign Up as User</a> {{-- Menggunakan route name --}}
        </p>
        <p>Login as Admin?
            <a href="{{ route('admin.login.form') }}">Login as Admin</a> {{-- Menggunakan route name --}}
        </p>
    </div>

    {{-- Script dari desain Anda --}}
    <script type="text/javascript" src="{{ asset('js/validation.js') }}" defer></script>
</body>
</html>