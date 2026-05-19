<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'employee_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'cnic',
        'gender',
        'date_of_birth',
        'department_id',
        'designation',
        'qualification',
        'specialisation',
        'joining_date',
        'profile_image',
        'bio',
        'status',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'joining_date'  => 'date',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function subjectAssignments()
    {
        return $this->hasMany(TeacherSubjectAssignment::class);
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'teacher_programs')
            ->withPivot('assigned_date');
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
