<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category; // Pastikan Category diimpor
use App\Models\User;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * Sesuaikan dengan kolom di tabel Anda (selain id, timestamps)
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
       'category_id',    // Tambahkan category_id
        'instructor_id',  // Tambahkan instructor_id
        'price',
        'level',          // Tambahkan level
        'status',         // Tambahkan status
        'thumbnail', 
    ];

    /**
     * The attributes that should be cast.
     * Konversi tipe data jika perlu.
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2', // Tetap cast price ke decimal
        'rating' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

   // Relasi ke Category (PENTING)
   public function category(): BelongsTo
   {
       // Asumsi foreign key di 'courses' adalah 'category_id'
       return $this->belongsTo(Category::class);
   }

   // Relasi ke User (Instruktur) (PENTING)
   public function instructor(): BelongsTo
   {
       // Asumsi foreign key di 'courses' adalah 'instructor_id'
       // dan primary key di 'users' adalah 'id'
       return $this->belongsTo(User::class, 'instructor_id');
   }

   // Definisikan relasi lain jika perlu (modules, students, reviews)

}