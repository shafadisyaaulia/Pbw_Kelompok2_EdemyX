<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Sebaiknya title dinamis berdasarkan kursus/pelajaran --}}
    <title>@yield('title', 'Course Player')</title>
    {{-- Link CSS ini SUDAH BENAR --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        {{-- Judul ini mungkin perlu dinamis berdasarkan kursus --}}
        <h1>Web Development Bootcamp</h1>
    </header>

    {{-- ==== PERBAIKAN STRUKTUR HTML ==== --}}
    {{-- Kontainer utama untuk video dan sidebar --}}
    <div class="course-player-container" style="display: flex; /* Contoh: Gunakan flexbox untuk layout */">

        <main class="course-content" style="flex-grow: 1; /* Contoh: Video mengambil ruang lebih banyak */ margin-right: 20px; /* Contoh: Spasi antara video dan sidebar */">
            <!-- Video Player Section -->
            <section class="video-section">
                {{-- iFrame YouTube (link eksternal) - TIDAK PERLU DIUBAH --}}
                <iframe
                    width="100%"
                    height="400"
                    src="https://www.youtube.com/embed/CJYJJoXetHQ"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>

                {{-- Judul/deskripsi pelajaran - Mungkin perlu dinamis --}}
                <h2>Introduction to Web Development</h2>
                <p>Welcome to the Web Development Bootcamp! In this lesson, you'll get an overview of what you'll learn.</p>
                <div class="progress">
                    <span>Progress: 75%</span>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 75%;"></div>
                    </div>
                </div>
            </section>
             {{-- Tag </main> yang asli dipindahkan ke bawah setelah <aside> ditutup (dalam struktur yang diperbaiki) atau dihapus jika layoutnya seperti ini --}}
        </main> {{-- Akhir dari main content area --}}

        <!-- Course Sidebar -->
        {{-- Sidebar diletakkan sebagai saudara dari main content di dalam container --}}
        <aside class="course-sidebar" style="width: 300px; /* Contoh: Lebar tetap sidebar */ flex-shrink: 0; /* Contoh: Agar sidebar tidak menyusut */">
            <h3>Course Content</h3>
            <ul>
                {{-- Link ini masih placeholder (#). Biarkan untuk sekarang. --}}
                {{-- Nantinya, link ini mungkin perlu diubah menjadi: --}}
                {{-- href="{{ url('/course-player') }}?course=webdev&lesson=1" --}}
                {{-- Atau dikontrol oleh JavaScript untuk memuat konten pelajaran. --}}
                <li><a href="#">1. Introduction to Web Development</a></li>
                <li><a href="#">2. HTML Basics</a></li>
                <li><a href="#">3. CSS Fundamentals</a></li>
                <li><a href="#">4. JavaScript Essentials</a></li>
                <li><a href="#">5. Responsive Design</a></li>
                <li><a href="#">6. Frontend Frameworks</a></li>
                <li><a href="#">7. Backend Development</a></li>
                <li><a href="#">8. Deployment & Hosting</a></li>
            </ul>
        </aside> {{-- Akhir dari sidebar --}}
        {{-- Tag </main> yang kedua dihapus karena tidak diperlukan dalam struktur ini --}}

    </div> {{-- Akhir dari .course-player-container --}}

    <footer>
        <p>© 2024 Web Development Bootcamp</p>
    </footer>

    {{-- Jika halaman ini memerlukan JavaScript khusus, tambahkan di sini: --}}
    {{-- <script src="{{ asset('js/course-player.js') }}"></script> --}}
</body>
</html>