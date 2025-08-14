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
        if (!str_contains($image, 'http')){
            return asset('storage/' . $image);
        }
        return $image;
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
