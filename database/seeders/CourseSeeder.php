<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil ID Kategori (Asumsi sudah di-seed sebelumnya)
        $mobileDevId = Category::where('slug', 'mobile-development')->first()->id ?? null;
        $dataScienceId = Category::where('slug', 'data-science')->first()->id ?? null;
        $designId = Category::where('slug', 'design')->first()->id ?? null;
        $businessId = Category::where('slug', 'business')->first()->id ?? null;
        $webDevId = Category::where('slug', 'web-development')->first()->id ?? null;

        // Ambil ID Instruktur (Asumsi sudah di-seed sebelumnya)
        $michaelId = User::where('email', 'michael.lee@example.com')->first()->id ?? null;
        $davidId = User::where('email', 'david.chen@example.com')->first()->id ?? null;
        $johnsonId = User::where('email', 'johnson.whatever@example.com')->first()->id ?? null;
        $mariaId = User::where('email', 'maria.rodriguez@example.com')->first()->id ?? null;
        $johnId = User::where('email', 'john.smith@example.com')->first()->id ?? null;

        // Hapus data kursus lama jika perlu (hati-hati)
        // Course::query()->delete();

        $coursesData = [
            [
                'title' => 'Coding Course For Beginners', 'category_id' => $mobileDevId, 'instructor_id' => $michaelId,
                'rating' => 4.6, 'status' => 'published', 'price' => 79.99, 'thumbnail' => 'thumbnails/course 1.jpg',
                'description' => 'Learn coding fundamentals focusing on mobile development.', 'level' => 'beginner'
            ],
            [
                'title' => 'Python For Data Science', 'category_id' => $dataScienceId, 'instructor_id' => $davidId,
                'rating' => 4.9, 'status' => 'published', 'price' => 99.99, 'thumbnail' => 'thumbnails/course 2.png',
                'description' => 'Master Python for data analysis, visualization, and machine learning.', 'level' => 'intermediate'
            ],
            [
                'title' => 'UI/UX Design Mini Course', 'category_id' => $designId, 'instructor_id' => $johnsonId,
                'rating' => 4.7, 'status' => 'published', 'price' => 69.99, 'thumbnail' => 'thumbnails/course 3.png',
                'description' => 'A quick introduction to UI/UX design principles and tools.', 'level' => 'beginner'
            ],
            [
                'title' => 'Business Analytics Fundamentals', 'category_id' => $businessId, 'instructor_id' => $mariaId,
                'rating' => 4.5, 'status' => 'archived', 'price' => 59.99, 'thumbnail' => 'thumbnails/course 4.png',
                'description' => 'Understand the basics of analyzing business data for insights.', 'level' => 'beginner'
            ],
            [
                'title' => 'Javascript Full Course', 'category_id' => $webDevId, 'instructor_id' => $johnId,
                'rating' => 4.8, 'status' => 'archived', 'price' => 74.99, 'thumbnail' => 'thumbnails/course 5.png',
                'description' => 'Comprehensive JavaScript course covering basics to advanced topics.', 'level' => 'intermediate'
            ],
        ];

        foreach ($coursesData as $data) {
            // Tambahkan slug secara otomatis
            $data['slug'] = Str::slug($data['title']);
            // Buat kursus jika belum ada berdasarkan title (atau slug)
            Course::firstOrCreate(
                ['slug' => $data['slug']], // Cari berdasarkan slug
                $data                   // Data lengkap untuk dibuat
            );
        }
    }
}