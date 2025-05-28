<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Notifications')</title>

    {{-- ==== KOREKSI PATH CSS ==== --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> {{-- Pastikan style.css ada di public/css/ --}}
</head>
<body>
    <header>
        <h1>Notifications</h1>
        <nav>
            <ul>
                {{-- ==== PERBAIKAN LINK NAVIGASI ==== --}}
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/user-dashboard') }}">Dashboard</a></li> {{-- Sesuaikan jika path dashboard berbeda --}}
                <li><a href="{{ url('/profile') }}">Profile</a></li>
                <li><a href="{{ url('/my-courses') }}">My Courses</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Notifikasi Terbaru</h2>
            <ul>
                {{-- Idealnya, ini akan menjadi loop @forelse($notifications as $notification) --}}
                {{-- Contoh jika tidak ada notifikasi: --}}
                <li>Tidak ada notifikasi baru.</li>

                {{-- Contoh jika ada notifikasi: --}}
                {{--
                @forelse($notifications as $notification)
                    <li>
                        {{ $notification->data['message'] ?? 'Notifikasi tidak valid' }}
                        <span class="notification-time">{{ $notification->created_at->diffForHumans() }}</span>
                    </li>
                @empty
                    <li>Tidak ada notifikasi baru.</li>
                @endforelse
                --}}
            </ul>
        </section>
    </main>
    <footer>
        <p>© 2025 Project PBW. All rights reserved.</p>
    </footer>
    {{-- Jika ada JS khusus untuk notifikasi (misalnya real-time update) --}}
    {{-- <script src="{{ asset('js/notifications.js') }}"></script> --}}
</body>
</html>