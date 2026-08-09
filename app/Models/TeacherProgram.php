<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherProgram extends Model
{
    public $timestamps = false;

    protected $table = 'teacher_programs';

    protected $fillable = [
        'teacher_id',
        'program_id',
        'assigned_date',
    ];

    protected $casts = [
        'assigned_date' => 'date',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
