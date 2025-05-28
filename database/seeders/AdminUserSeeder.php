<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan model User diimpor
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat Admin 1
        User::create([
            'name' => 'Muhammad Azani Irvand',
            'email' => 'Azani@example.com', // Ganti dengan email admin yang valid
            'password' => Hash::make('12345678'), // !!! GANTI DENGAN PASSWORD KUAT !!!
            'role' => 'admin', // Pastikan nilai ini sesuai dengan sistem Anda
            'email_verified_at' => now(), // Verifikasi email jika diperlukan
            // Tambahkan field lain jika diperlukan
        ]);

        // Membuat Admin 2
        User::firstOrCreate([
            'name' => 'Shafa Disya Aulia',
            'email' => 'Shafa@example.com', // Ganti dengan email admin yang valid
            'password' => Hash::make('12345678'), // !!! GANTI DENGAN PASSWORD KUAT !!!
            'role' => 'admin', // Pastikan nilai ini sesuai dengan sistem Anda
            'email_verified_at' => now(), // Verifikasi email jika diperlukan
            // Tambahkan field lain jika diperlukan
        ]);

        // Membuat Admin 3
        User::create([
            'name' => 'Nadia Magdalena',
            'email' => 'nadia@example.com', // Ganti dengan email admin yang valid
            'password' => Hash::make('12345678'), // !!! GANTI DENGAN PASSWORD KUAT !!!
            'role' => 'admin', // Pastikan nilai ini sesuai dengan sistem Anda
            'email_verified_at' => now(), // Verifikasi email jika diperlukan
            // Tambahkan field lain jika diperlukan
        ]);

        // Membuat Admin 4
        User::create([
            'name' => 'Halim Elsa Putri',
            'email' => 'Halim@example.com', // Ganti dengan email admin yang valid
            'password' => Hash::make('12345678'), // !!! GANTI DENGAN PASSWORD KUAT !!!
            'role' => 'admin', // Pastikan nilai ini sesuai dengan sistem Anda
            'email_verified_at' => now(), // Verifikasi email jika diperlukan
            // Tambahkan field lain jika diperlukan
        ]);

        // Anda bisa menambahkan User::create() lagi di sini jika ada admin lain
        }
        }// Instruktur
        $instructors = [
            ['name' => 'Michael Lee', 'email' => 'michael.lee@example.com'],
            ['name' => 'David Chen', 'email' => 'david.chen@example.com'],
            ['name' => 'Johnson', 'email' => 'johnson.whatever@example.com'], // Perlu nama lengkap?
            ['name' => 'Maria Rodriguez', 'email' => 'maria.rodriguez@example.com'],
            ['name' => 'John Smith', 'email' => 'john.smith@example.com'],
        ];

        foreach ($instructors as $instructor) {
            User::firstOrCreate(
                ['email' => $instructor['email']], // Cari berdasarkan email
                [
                    'name' => $instructor['name'],
                    'password' => Hash::make('password_instructor_default'), // GANTI PASSWORD
                    'role' => 'instructor', // Set role
                    'email_verified_at' => now(), // Verifikasi otomatis untuk contoh
                ]
            );
}
