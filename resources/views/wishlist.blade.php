<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Wishlist')</title>

    {{-- ==== KOREKSI PATH CSS ==== --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> {{-- Pastikan style.css ada di public/css/ --}}

    {{-- Anda mungkin perlu Font Awesome jika akan ada tombol remove/detail --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> --}}
</head>
<body>
    <header>
        <h1>Wishlist</h1>
        <nav>
            <ul>
                {{-- ==== PERBAIKAN LINK NAVIGASI ==== --}}
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/user-dashboard') }}">Dashboard</a></li>
                <li><a href="{{ url('/profile') }}">Profile</a></li>
                <li><a href="{{ url('/my-courses') }}">My Courses</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Daftar Wishlist</h2>
            <ul>
                {{-- ==== DATA DINAMIS SEHARUSNYA ==== --}}
                {{-- Idealnya loop @forelse($wishlistItems as $item) --}}

                {{-- Contoh Pesan Jika Wishlist Kosong --}}
                <li>Belum ada kursus dalam wishlist Anda.</li>

                {{-- Contoh Item Wishlist (dalam loop @forelse) --}}
                {{--
                @forelse($wishlistItems as $item)
                    <li>
                        <div class="wishlist-item"> {{-- Beri class untuk styling --}}
                            <img src="{{ asset('storage/' . $item->course->image) }}" alt="{{ $item->course->title }}" width="100"> {{-- Contoh gambar --}}
                            <div class="wishlist-details">
                                <h4>{{ $item->course->title }}</h4>
                                <p>by {{ $item->course->instructor->name ?? 'N/A' }}</p>
                                <a href="{{ url('/courses/' . $item->course->slug) }}">View Course</a> {{-- Link ke detail kursus --}}
                            </div>
                            <div class="wishlist-actions">
                                {{-- Tombol Remove (perlu form POST/DELETE) --}}
                                <form action="{{ route('wishlist.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="remove-btn">Remove</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @empty
                    <li>Belum ada kursus dalam wishlist Anda.</li>
                @endforelse
                --}}

            </ul>
        </section>
    </main>
    <footer>
        <p>© 2025 Project PBW. All rights reserved.</p>
    </footer>
     {{-- Jika ada JS khusus untuk wishlist (misalnya remove via AJAX) --}}
    {{-- <script src="{{ asset('js/wishlist.js') }}"></script> --}}
</body>
</html>