<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function projects()
    {
        return $this->belongsTo(Project::class, 'id_project', 'id');
    }

    protected function getImageUrlAttribute()
    {
        $image = $this->image;
        if (!str_contains($image, 'http')){
            return asset('storage/' . $image);
        }
        return $image;
    }
}
