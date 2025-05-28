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
    Schema::table('courses', function (Blueprint $table) {
        // Kolom yang sudah ada: id, title, description, price, timestamps
        // Tambahkan kolom baru setelah 'description'
        $table->string('slug')->unique()->nullable()->after('title');
        $table->foreignId('category_id')->nullable()->after('description')
              ->constrained('categories') // Relasi ke tabel categories
              ->onDelete('set null'); // Jika kategori dihapus, set null di course
        $table->foreignId('instructor_id')->nullable()->after('category_id')
              ->constrained('users') // Relasi ke tabel users
              ->onDelete('set null'); // Jika user (instruktur) dihapus, set null
        $table->string('level')->nullable()->after('price'); // beginner, intermediate, advanced
        $table->string('status')->default('draft')->after('level'); // draft, published, archived, pending
        $table->string('thumbnail')->nullable()->after('status'); // Path gambar
        $table->float('rating', 2, 1)->default(0)->after('thumbnail'); // Contoh: 4.5 (2 digit total, 1 di belakang koma)
        // Kolom 'enrolled' biasanya tidak disimpan langsung, tapi dihitung dari relasi
        // Kita bisa menambahkannya jika benar-benar perlu, tapi biasanya tidak
        // $table->integer('enrolled_count')->default(0)->after('rating');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            // Urutan drop penting jika ada foreign key
            $table->dropForeign(['instructor_id']);
            $table->dropForeign(['category_id']);
            $table->dropColumn(['slug', 'category_id', 'instructor_id', 'level', 'status', 'thumbnail', 'rating']);
        });
    }
};
