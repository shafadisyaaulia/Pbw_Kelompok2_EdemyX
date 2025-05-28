document.addEventListener("DOMContentLoaded", function () {

    const fileInput = document.getElementById("profilePictureInput"); // ID input file dari Blade
    const previewImage = document.getElementById("previewImage"); // ID gambar pratinjau utama di modal
    const otherProfilePics = document.querySelectorAll(".profile-pic:not(#previewImage)"); // Gambar profil lain (misal: di navbar, di header)

    // Fungsi untuk memperbarui HANYA tampilan pratinjau gambar di halaman
    function updateImagePreviews(src) {
        if (previewImage) {
            previewImage.src = src; // Update pratinjau utama
        }
        // Update juga gambar profil lain yang terlihat jika ada
        otherProfilePics.forEach(img => {
            img.src = src;
        });
    }

    // Listener HANYA untuk input file gambar
    if (fileInput) {
        fileInput.addEventListener("change", function (event) {
            const file = event.target.files[0];

            if (file && file.type.startsWith('image/')) { // Pastikan itu file gambar
                const reader = new FileReader();

                reader.onload = function (e) {
                    // e.target.result berisi data URL Base64 dari gambar
                    // Gunakan ini HANYA untuk menampilkan pratinjau di browser
                    updateImagePreviews(e.target.result);

                    // TIDAK ADA penyimpanan ke localStorage di sini.
                };

                reader.onerror = function(e) {
                    console.error("File reading error:", e);
                    // Mungkin tampilkan pesan error ke pengguna jika perlu
                }

                reader.readAsDataURL(file); // Baca file sebagai Data URL (Base64)
            } else if (file) {
                // Jika file dipilih tapi bukan gambar
                console.warn("File yang dipilih bukan gambar:", file.type);
                // Anda bisa menambahkan pesan error di sini jika mau
                // Atau reset pratinjau ke gambar sebelumnya (jika Anda menyimpan src awal)
            }
        });
    }

    
}); 