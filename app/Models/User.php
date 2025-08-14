<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected function getImageUrlAttribute()
    {
        $image = $this->image;

        if (!$image) {
            // Kasih default image kalau kosong
            return asset('admin/dist/img/user_unknown.png');
        }

        if (!str_contains($image, 'http')) {
            // Buat URL
            $url = asset('storage/app/public/' . $image);
            // Hapus /public kalau ada
            return str_replace('main/public', 'main', $url);
        }

        return $image;
    }
}
