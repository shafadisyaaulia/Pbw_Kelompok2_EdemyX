<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Impor HasMany untuk relasi ke Course

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', // Nama kategori
        'slug', // Slug URL (biasanya digenerate otomatis)
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // Tidak ada cast khusus yang umum diperlukan di sini,
        // kecuali jika Anda punya kolom boolean atau date lain.
    ];

    /**
     * Mendapatkan semua kursus yang termasuk dalam kategori ini.
     * Relasi one-to-many: Satu kategori bisa memiliki banyak kursus.
     */
    public function courses(): HasMany
    {
        // Laravel akan secara otomatis mengasumsikan foreign key
        // di tabel 'courses' adalah 'category_id'
        return $this->hasMany(Course::class);
    }

     /**
     * (Opsional) Mengubah field yang digunakan untuk route model binding.
     * Jika Anda ingin URL seperti /categories/web-development
     */
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}