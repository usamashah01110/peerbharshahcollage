<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionApplication extends Model
{
    use HasFactory;

    protected $table = 'admission_applications';

    protected $fillable = [

        'application_number',
        'applied_program_id',
        'session_id',

        'first_name',
        'last_name',
        'father_name',
        'mother_name',
        'cnic',
        'date_of_birth',
        'gender',
        'nationality',
        'religion',
        'marital_status',

        'email',
        'phone',
        'alternate_phone',
        'present_address',
        'permanent_address',
        'city',
        'province',
        'postal_code',

        'guardian_name',
        'guardian_relation',
        'guardian_cnic',
        'guardian_phone',
        'guardian_occupation',
        'guardian_monthly_income',

        'emergency_contact_name',
        'emergency_contact_phone',

        'status',
        'test_score',
        'interview_score',
        'merit_score',
        'review_notes',
        'reviewed_by',
        'reviewed_at',
        'submitted_at',

        'student_id',
    ];

    public function program()
    {
        return $this->belongsTo(
            Program::class,
            'applied_program_id'
        );
    }

    public function session()
    {
        return $this->belongsTo(
            AcademicSession::class,
            'session_id'
        );
    }
}