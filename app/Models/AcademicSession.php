<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicSession extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'session_type',
        'start_date',
        'end_date',
        'is_current',
        'is_admissions_open',
        'admissions_open_date',
        'admissions_close_date',
    ];

    protected $casts = [
        'start_date'            => 'date',
        'end_date'              => 'date',
        'admissions_open_date'  => 'date',
        'admissions_close_date' => 'date',
        'is_current'            => 'boolean',
        'is_admissions_open'    => 'boolean',
    ];

    public function admissionApplications()
    {
        return $this->hasMany(AdmissionApplication::class, 'session_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'admission_session_id');
    }

    public function teacherSubjectAssignments()
    {
        return $this->hasMany(TeacherSubjectAssignment::class, 'session_id');
    }
}
