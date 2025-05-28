{{-- Komentar: File ini kemungkinan besar akan di-include di view lain menggunakan @include('popup') --}}
{{-- Pastikan popup.css ada di public/css/ dan popup.js ada di public/js/ --}}

{{-- Anda mungkin tidak memerlukan tag <html>, <head>, <body> jika ini hanya komponen include --}}
{{-- Jika ini *memang* halaman penuh (meskipun aneh untuk popup), biarkan struktur HTML dasar --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Confirmation</title> {{-- Title ini mungkin tidak akan pernah terlihat --}}

    {{-- ==== KOREKSI PATH CSS ==== --}}
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}">
</head>
<body>

    {{-- Popup Container --}}
    {{-- Sebaiknya popup ini memiliki style 'display: none;' secara default di popup.css --}}
    {{-- dan ditampilkan oleh JavaScript saat diperlukan --}}
    <div class="popup" id="confirmationPopup">
        <div class="popup-content">
            <div class="icon-container">
                {{-- Icon '!' - mungkin bisa diganti Font Awesome jika Anda mau --}}
                {{-- <i class="fas fa-exclamation-triangle"></i> --}}
                <i class="exclamation">!</i>
            </div>
            <div class="popup-text">
                 {{-- Teks ini statis (logout). Jika popup ini reusable, teks ini perlu dinamis --}}
                <h2>Are you sure?</h2>
                <p>Are you sure you want to logout from your account?</p>
            </div>
            <div class="popup-buttons">
                 {{-- Tombol ini memanggil fungsi JS yang harus ada di popup.js --}}
                <button class="cancel-btn" onclick="closePopup()">Cancel</button>
                <button class="confirm-btn" onclick="confirmAction()">Confirm</button>
            </div>
        </div>
    </div>

    {{-- ==== KOREKSI PATH JS ==== --}}
    <script src="{{ asset('js/popup.js') }}"></script>

    {{-- Contoh bagaimana file ini mungkin di-include di view lain (misal: layouts/app.blade.php) --}}
    {{--
    ...
    @include('popup') {{-- Asumsi popup.blade.php ada di resources/views/popup.blade.php --}}
    ...
    --}}

</body> {{-- Tag body mungkin tidak perlu jika ini komponen include --}}
</html> {{-- Tag html mungkin tidak perlu jika ini komponen include --}}