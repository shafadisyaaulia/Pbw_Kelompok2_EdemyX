<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; // Impor model
use Illuminate\Support\Str; // Impor Str

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Mobile Development',
            'Data Science',
            'Design',
            'Business',
            'Web Development',
        ];

        foreach ($categories as $categoryName) {
            Category::firstOrCreate( // firstOrCreate: Buat jika belum ada
                ['slug' => Str::slug($categoryName)], // Cari berdasarkan slug
                ['name' => $categoryName]        // Data untuk dibuat jika tidak ditemukan
            );
        }
    }
}