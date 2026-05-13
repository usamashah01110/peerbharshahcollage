<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
        'hod_id',
        'established_date',
        'is_active',
    ];

    // Optional: cast attributes to proper types
    protected $casts = [
        'established_date' => 'date',
        'is_active'        => 'boolean',
    ];

    // Optional: relationship to the HOD user
    public function hod()
    {
        return $this->belongsTo(User::class, 'hod_id');
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
