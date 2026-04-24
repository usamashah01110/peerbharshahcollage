<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseOutline; // 🔹 IMPORTANT FIX

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'course_code',
        'credit_hours',
        'semester',
        'program',
        'status'
    ];

    public function outline()
    {
        return $this->hasOne(CourseOutline::class);
    }
}