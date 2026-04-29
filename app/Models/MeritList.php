<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeritList extends Model
{
    protected $fillable = [
        'student_id',
        'program_id',
        'marks'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}