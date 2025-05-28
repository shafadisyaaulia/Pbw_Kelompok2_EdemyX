<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom 'role', bisa string atau enum
            // Defaultnya 'user' agar user baru otomatis jadi user biasa
            $table->string('role')->default('user')->after('email'); // Atau setelah kolom lain
            // Atau bisa juga boolean: $table->boolean('is_admin')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role'); // Hapus kolom jika rollback
            // Atau $table->dropColumn('is_admin');
        });
    }
};
