<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'phone', 'course_id', 'city_id', 'email'];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function city()
    {
        return $this->belongsTo(city::class);
    }
}
