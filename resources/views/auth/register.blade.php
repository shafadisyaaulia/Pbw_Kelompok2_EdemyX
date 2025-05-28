{{-- File: resources/views/auth/register.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sign Up')</title>

    {{-- Link ke CSS yang sama dengan Login --}}
    <link rel="stylesheet" href="{{ asset('css/style-login-daftar.css') }}">

    {{-- JS validasi jika perlu --}}
    {{-- <script type="text/javascript" src="{{ asset('js/validation.js') }}" defer></script> --}}

    {{-- Styling inline untuk error server-side (atau pindahkan ke CSS) --}}
    <style>
        .server-error {
            color: #f06272; /* Sesuaikan dengan warna di CSS Anda */
            font-size: 0.8em;
            text-align: left;
            width: 100%;
            padding-left: 60px; /* Sesuaikan agar sejajar input */
            margin-top: 3px;
            display: block;
        }
        .validation-summary {
             color: #f06272; background-color: #fef2f2; border: 1px solid #f06272;
             padding: 10px 15px; border-radius: 5px; margin-bottom: 20px;
             width: min(400px, 100%); /* Lebar sama dengan form */
             text-align: left;
        }
        .validation-summary ul { margin: 0; padding: 0 0 0 20px; list-style-type: disc; }
        .validation-summary li { margin-bottom: 5px; }
    </style>
</head>
<body>
    {{-- Gunakan class .wrapper seperti di login --}}
    <div class="wrapper">
        <h1>Sign Up</h1>

        {{-- Tempat error JS (jika ada) --}}
        <p id="errors-message"></p>

        {{-- Menampilkan error validasi server-side --}}
        @if ($errors->any())
             <div class="validation-summary">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form menggunakan struktur dan class yang sama dengan login --}}
        <form id="form" method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Input Nama Lengkap --}}
            <div class="input-group"> {{-- Class input-group --}}
                <label for="name-input" class="input-icon"> {{-- Class input-icon --}}
                    {{-- Ganti ikon jika mau --}}
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Z"/></svg>
                </label>
                <input type="text" name="name" id="name-input" placeholder="Full Name" value="{{ old('name') }}" required autofocus autocomplete="name">
            </div>
            @error('name') <div class="server-error">{{ $message }}</div> @enderror

            {{-- Input Email --}}
            <div class="input-group" style="margin-top: 1rem;"> {{-- Class input-group --}}
                <label for="email-input" class="input-icon"> {{-- Class input-icon --}}
                    <span>@</span>
                </label>
                <input type="email" name="email" id="email-input" placeholder="email" value="{{ old('email') }}" required autocomplete="username">
            </div>
             @error('email') <div class="server-error">{{ $message }}</div> @enderror

            {{-- Input Password --}}
            <div class="input-group" style="margin-top: 1rem;"> {{-- Class input-group --}}
                <label for="password-input" class="input-icon"> {{-- Class input-icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm240-200q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80Z"/></svg>
                </label>
                <input type="password" name="password" id="password-input" placeholder="password" required autocomplete="new-password">
            </div>
             @error('password') <div class="server-error">{{ $message }}</div> @enderror

            {{-- Input Konfirmasi Password --}}
            <div class="input-group" style="margin-top: 1rem;"> {{-- Class input-group --}}
                <label for="password-confirmation" class="input-icon"> {{-- Class input-icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm240-200q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80Z"/></svg>
                </label>
                <input type="password" name="password_confirmation" id="password-confirmation" placeholder="Repeat Password" required autocomplete="new-password">
            </div>
             @error('password_confirmation') <div class="server-error">{{ $message }}</div> @enderror


            {{-- Tombol Sign Up & Link Already Registered? --}}
            <div class="form-actions"> {{-- Class sama dengan login --}}
                <a href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <button type="submit">Sign Up</button> {{-- Tombol ini akan menggunakan gaya default dari .form-actions button --}}
            </div>
        </form>

         {{-- Link ke halaman Login Admin --}}
        <div class="auth-links"> 
            <p>Login as Admin?
                <a href="{{ route('admin.login.form') }}">Login as Admin</a>
            </p>
        </div>
    </div> {{-- Akhir .wrapper --}}
</body>
</html>