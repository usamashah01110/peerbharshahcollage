<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'program_id',
        'semester_number',
        'name',
    ];

    // Relationship
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}