<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'department_id',
        'name',
        'code',
        'degree_level',
        'total_semesters',
        'duration_years',
        'total_credit_hours',
        'description',
        'fee_per_semester',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function semesters()
    {
        return $this->hasMany(Semester::class);
    }

    public function courseOutline()
    {
        return $this->hasOne(CourseOutline::class);
    }

    public function admissionApplications()
    {
        return $this->hasMany(AdmissionApplication::class, 'applied_program_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }

    public function meritLists()
    {
        return $this->hasMany(MeritList::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_programs')
            ->withPivot('assigned_date');
    }
}
