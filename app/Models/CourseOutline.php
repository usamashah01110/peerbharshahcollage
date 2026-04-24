<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course; // 🔹 IMPORTANT FIX

class CourseOutline extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'outline_text'
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}