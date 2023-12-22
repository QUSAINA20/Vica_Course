<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function durations()
    {
        return $this->hasMany(Duration::class);
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
