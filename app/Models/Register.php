<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'phone', 'course_id', 'duration_id', 'email'];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function duration()
    {
        return $this->belongsTo(Duration::class);
    }
}
