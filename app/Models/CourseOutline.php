<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseOutline extends Model
{
    use HasFactory;

    protected $table = 'course_outlines';

    protected $fillable = [
        'program_id',
        'description',
        'objectives',
        'topics',
        'file',
    ];

    public function program()
    {
        return $this->belongsTo(
            Program::class,
            'program_id'
        );
    }
}