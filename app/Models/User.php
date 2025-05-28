<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // =============================================
    // TAMBAHKAN RELASI INI
    // =============================================

    /**
     * The courses that the user is enrolled in.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courses(): BelongsToMany
    {
        // Argumen kedua adalah nama tabel pivot. Sesuaikan jika nama tabel Anda berbeda.
        // 'course_user' adalah nama konvensi standar Laravel.
        return $this->belongsToMany(Course::class, 'course_user')
                    ->withPivot('progress') // Ambil kolom 'progress' dari tabel pivot
                    // ->withPivot('kolom_lain_jika_ada') // Tambahkan kolom pivot lain jika perlu
                    ->withTimestamps();    // Asumsikan tabel pivot punya kolom created_at & updated_at
    }

    // =============================================
    // Akhir penambahan relasi
    // =============================================

    // Anda mungkin juga butuh relasi jika user bisa menjadi instructor
    // Ini biasanya tidak diperlukan di model User jika relasi utama
    // adalah Course -> belongsTo(User::class, 'instructor_id')
    // public function instructedCourses() { ... }
}
