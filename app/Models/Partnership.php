<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getFileUrlAttribute()
    {
        if (!$this->file) {
            return null;
        }

        $url = asset('storage/app/public/' . $this->file);
        return str_replace('main/public', 'main/', $url);
    }
}
