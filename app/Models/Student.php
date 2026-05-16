<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [

        'registration_number',
        'roll_number',
        'first_name',
        'last_name',
        'father_name',
        'email',
        'phone',
        'cnic',
        'date_of_birth',
        'gender',
        'address',
        'city',
        'province',
        'profile_image',
        'program_id',
        'admission_session_id',
        'current_semester',
        'enrollment_date',
        'status',
        'admission_application_id',
    ];

    public function program()
    {
        return $this->belongsTo(
            Program::class,
            'program_id'
        );
    }

    public function session()
    {
        return $this->belongsTo(
            AcademicSession::class,
            'admission_session_id'
        );
    }

    public function application()
    {
        return $this->belongsTo(
            AdmissionApplication::class,
            'admission_application_id'
        );
    }
}