<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    protected $table = 'configurations';

    protected $guarded = ['id'];

    protected function getImageUrlAttribute()
    {
        $image = $this->logo;
        if (!str_contains($image, 'http')){
            return asset('storage/' . $image);
        }
        return $image;
    }

    protected function getIconUrlAttribute()
    {
        $image = $this->icon;
        if (!str_contains($image, 'http')){
            return asset('storage/' . $image);
        }
        return $image;
    }
}
