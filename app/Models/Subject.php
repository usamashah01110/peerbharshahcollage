<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'semester_id',
        'name',
        'code',
        'credit_hours',
        'description',
        'is_elective',
        'is_active',
    ];

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}