<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'department_id',
        'code',
        'name',
        'degree_level',
        'total_semesters',
        'duration_years',
        'total_credit_hours',
        'description',
        'fee_per_semester',
        'is_active',
    ];

    // Relationship
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function semesters()
{
    return $this->hasMany(Semester::class);
}
}