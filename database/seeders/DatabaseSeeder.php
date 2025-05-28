<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil Seeder Anda dalam urutan yang benar
        // Pastikan nama class seeder Anda sesuai

        // 1. Panggil Seeder untuk User (Admin & Instruktur)
        $this->call([
            AdminUserSeeder::class, // Atau ganti jika nama seeder user Anda berbeda
            // Tambahkan seeder user lain jika ada (misal InstructorUserSeeder)
        ]);

        // 2. Panggil Seeder untuk Kategori
        $this->call([
            CategorySeeder::class,
        ]);

        // 3. Panggil Seeder untuk Kursus (setelah user dan kategori dibuat)
        $this->call([
            CourseSeeder::class,
        ]);

        // Anda bisa menambahkan pemanggilan seeder lain di bawah ini jika perlu
        // $this->call(OtherSeeder::class);

        // Anda bisa juga menjalankan factory di sini SETELAH seeder utama jika perlu
        // \App\Models\User::factory(5)->create(); // Contoh membuat 5 user biasa tambahan
    }
}
