<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    use HasFactory;
    protected $fillable = ['from', 'to', 'title'];


    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function registers()
    {
        return $this->hasMany(Register::class);
    }
}
