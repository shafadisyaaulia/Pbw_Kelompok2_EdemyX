<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_user', function (Blueprint $table) {
            $table->id(); // Primary key untuk tabel pivot ini

            // Foreign key ke tabel users
            $table->foreignId('user_id')
                  ->constrained('users') // Menunjuk ke tabel 'users'
                  ->onDelete('cascade'); // Jika user dihapus, entri pivot ini juga dihapus

            // Foreign key ke tabel courses
            $table->foreignId('course_id')
                  ->constrained('courses') // Menunjuk ke tabel 'courses'
                  ->onDelete('cascade'); // Jika course dihapus, entri pivot ini juga dihapus

            // Kolom tambahan yang Anda butuhkan di pivot
            $table->integer('progress')->default(0)->nullable(); // Kolom progress (misal: persentase)

            $table->timestamps(); // Kolom created_at dan updated_at

            // Optional: Pastikan user tidak bisa enroll ke course yang sama dua kali
            $table->unique(['user_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_user');
    }
};