<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'image'];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            // Assuming $this->image is in the format 'public/category_images/filename.png'
            $basePath = 'storage';
            $imagePath = str_replace('public/', '', $this->image);

            return url("$basePath/$imagePath");
        }

        return null;
    }
}
