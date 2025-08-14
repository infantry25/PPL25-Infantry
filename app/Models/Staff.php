<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

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

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
