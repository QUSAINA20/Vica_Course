<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'duration_id', 'teacher_id', 'title', 'description', 'image', 'price', 'currency'];

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
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function duration()
    {
        return $this->belongsTo(Duration::class);
    }

    public function cities()
    {
        return $this->belongsToMany(City::class);
    }

    public function registers()
    {
        return $this->hasMany(Register::class);
    }
}
