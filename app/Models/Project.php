<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
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

    public function categories()
    {
        return $this->belongsTo(Category::class, 'id_kategori');
    }

    public function project_images()
    {
        return $this->hasMany(ProjectImage::class, 'id_project', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
