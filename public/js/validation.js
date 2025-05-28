// File: public/js/validation.js (Versi Perbaikan)

const form = document.getElementById('form');
const firstname_input = document.getElementById('firstname-input'); // Untuk form register
const name_input = document.getElementById('name-input'); // Nama input register Breeze
const email_input = document.getElementById('email-input'); // Untuk form login user & register
const password_input = document.getElementById('password-input'); // Untuk form login user & register
const repeat_password_input = document.getElementById('repeat-password-input'); // Input lama Anda
const password_confirmation_input = document.getElementById('password-confirmation'); // Input konfirmasi Breeze
const errors_message = document.getElementById('errors-message');
const email_input_admin = document.getElementById('email-input-admin'); // Untuk form login admin
const password_input_admin = document.getElementById('password-input-admin'); // Untuk form login admin

// --- PASTIKAN SEMUA ELEMEN DIPILIH DENGAN BENAR ---
// Jika Anda sudah mengganti view auth/register.blade.php sesuai standar Breeze:
// const actual_name_input = name_input ? name_input : firstname_input; // Pilih salah satu yg ada
// const actual_confirmation_input = password_confirmation_input ? password_confirmation_input : repeat_password_input; // Pilih salah satu yg ada
// Jika belum, gunakan ID yang ada di HTML Anda. Kode di bawah ini mengasumsikan Anda sudah pakai ID standar Breeze di register.


if (form) { // Hanya tambahkan listener jika form ditemukan
    form.addEventListener('submit', (e) => {
        // Hapus semua class 'incorrect' sebelum validasi ulang
        clearIncorrectClasses();
        errors_message.innerText = ''; // Bersihkan pesan error lama

        let errors = [];
        let validationPassedClientSide = true;

        // Cek apakah ini form register (berdasarkan input name/password confirmation)
        if (name_input || password_confirmation_input) { // Cek input standar Breeze
            errors = getSignupFormsErrors(
                name_input ? name_input.value : '', // Gunakan name_input jika ada
                email_input ? email_input.value : '',
                password_input ? password_input.value : '',
                password_confirmation_input ? password_confirmation_input.value : '' // Gunakan password_confirmation_input
            );
            if (errors.length > 0) {
                validationPassedClientSide = false;
            }
        }
        // Cek apakah ini form login admin
        else if (email_input_admin && password_input_admin) {
            errors = getLoginFormAdminErrors(email_input_admin.value, password_input_admin.value);
            if (errors.length > 0) {
                validationPassedClientSide = false;
            }
        }
        // Cek apakah ini form login user biasa
        else if (email_input && password_input) {
            errors = getLoginFormUserErrors(email_input.value, password_input.value);
            if (errors.length > 0) {
                validationPassedClientSide = false;
            }
        } else {
             // Form tidak dikenali, biarkan submit normal (atau tambahkan log error)
             console.error("Form type could not be determined for client-side validation.");
             return; // Biarkan submit normal
        }

        // Jika validasi client-side GAGAL, tampilkan error dan hentikan submit
        if (!validationPassedClientSide) {
            e.preventDefault(); // <-- HENTIKAN SUBMIT HANYA JIKA ADA ERROR CLIENT-SIDE
            errors_message.innerText = errors.join(", ");
        }
        // Jika validasi client-side LOLOS, JANGAN panggil e.preventDefault()
        // dan JANGAN lakukan redirect window.location.href.
        // Biarkan form melakukan submit normal ke action URL-nya (ke backend Laravel).

        // HAPUS SEMUA BLOK window.location.href DARI SINI:
        /*
        if (errors.length === 0) {
             window.location.href = '../root/user-dashboard.html'; // HAPUS
        }
        ...
        if (errors.length === 0) {
             window.location.href = '../root/dashboard-admin.html'; // HAPUS
        }
        ...
        if (errors.length === 0) {
             window.location.href = '../root/user-dashboard.html'; // HAPUS
        }
        */
    });
} // Akhir dari if(form)


// --- Fungsi Validasi (Sedikit disesuaikan untuk nama input Breeze) ---

function getSignupFormsErrors(name, email, password, password_confirmation){ // Ubah parameter
    let errors = [];
    const nameInputEl = document.getElementById('name-input'); // Dapatkan elemen berdasarkan ID baru
    const emailInputEl = document.getElementById('email-input');
    const passwordInputEl = document.getElementById('password-input');
    const passwordConfirmationEl = document.getElementById('password-confirmation'); // Dapatkan elemen berdasarkan ID baru

    // Gunakan name (bukan firstname)
    if(name === '' || name == null){
        errors.push('Name is required');
        if (nameInputEl) nameInputEl.parentElement.classList.add('incorrect');
    }

    if(email === '' || email == null){
        errors.push('Email is required');
        if (emailInputEl) emailInputEl.parentElement.classList.add('incorrect');
    }
    if(password === '' || password == null){
        errors.push('Password is required');
        if (passwordInputEl) passwordInputEl.parentElement.classList.add('incorrect');
    }
    if(password.length < 8){
        errors.push("Password must have at least 8 characters");
        if (passwordInputEl) passwordInputEl.parentElement.classList.add('incorrect');
    }
    // Gunakan password_confirmation
    if(password !== password_confirmation){
        errors.push('Passwords do not match');
        if (passwordInputEl) passwordInputEl.parentElement.classList.add('incorrect');
        if (passwordConfirmationEl) passwordConfirmationEl.parentElement.classList.add('incorrect');
    }

    return errors;
}

function getLoginFormUserErrors(email, password){
    let errors = [];
    const emailInputEl = document.getElementById('email-input');
    const passwordInputEl = document.getElementById('password-input');

    if(email === '' || email == null){
        errors.push('Email is required');
        if (emailInputEl) emailInputEl.parentElement.classList.add('incorrect');
    }
    // Hapus validasi panjang password di client-side untuk login, biarkan backend yg cek
    // if(password.length < 8){
    //     errors.push("Password must have at least 8 characters");
    //     if (passwordInputEl) passwordInputEl.parentElement.classList.add('incorrect');
    // }
     if(password === '' || password == null){ // Cukup cek kosong
        errors.push('Password is required');
        if (passwordInputEl) passwordInputEl.parentElement.classList.add('incorrect');
    }


    return errors;
}

function getLoginFormAdminErrors(email, password){
    let errors = [];
    const emailInputAdminEl = document.getElementById('email-input-admin');
    const passwordInputAdminEl = document.getElementById('password-input-admin');

    if(email === '' || email == null){
        errors.push('Email is required');
        if (emailInputAdminEl) emailInputAdminEl.parentElement.classList.add('incorrect');
    }
     if(password === '' || password == null){ // Cukup cek kosong
        errors.push('Password is required');
        if (passwordInputAdminEl) passwordInputAdminEl.parentElement.classList.add('incorrect');
    }

    return errors;
}

// --- Fungsi untuk membersihkan style error ---
function clearIncorrectClasses() {
    const incorrectElements = form.querySelectorAll('.incorrect');
    incorrectElements.forEach(el => {
        el.classList.remove('incorrect');
    });
}


// --- Event listener untuk menghapus style error saat input ---
document.addEventListener('DOMContentLoaded', () => {
    // Daftar semua ID input yang mungkin ada
    const inputIds = [
        'firstname-input', 'name-input', 'email-input', 'password-input',
        'repeat-password-input', 'password-confirmation',
        'email-input-admin', 'password-input-admin'
    ];

    inputIds.forEach(id => {
        const input = document.getElementById(id);
        if (input) { // Hanya tambahkan listener jika elemen ditemukan
            input.addEventListener('input', () => {
                if(input.parentElement.classList.contains('incorrect')){
                    input.parentElement.classList.remove('incorrect');
                    // Mungkin bersihkan pesan error juga?
                    if (errors_message) {
                         errors_message.innerText = '';
                    }
                }
            });
        }
    });
});