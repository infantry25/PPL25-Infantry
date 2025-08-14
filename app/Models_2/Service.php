<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'id_kategori', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    protected function getImageUrlAttribute()
    {
        $image = $this->image;
        if (!str_contains($image, 'http')) {
            return asset('storage/' . $image);
        }
        return $image;
    }
}
