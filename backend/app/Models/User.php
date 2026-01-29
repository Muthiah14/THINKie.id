<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /**
     * Kolom yang bisa diisi mass-assignment.
     *
     * @var list<string>
     */
    protected $fillable = [
        'email',
        'password',
        'username',
        'bio',
        'image', // path foto profil
    ];
    protected static function boot()
{
    parent::boot();

    static::creating(function ($user) {
        if (empty($user->username)) {
            // Ini akan otomatis terisi saat register
            $user->username = 'user_' . Str::lower(Str::random(6));
        }
    });
}

    /**
     * Kolom yang disembunyikan saat serialisasi.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting kolom ke tipe data tertentu.
     *
     * @var array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


}
