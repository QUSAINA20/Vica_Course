<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'city_id', 'date_from', 'date_to'];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }


    public function registers()
    {
        return $this->hasMany(Register::class);
    }
}
