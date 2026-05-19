<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScholarshipApplication extends Model
{
    protected $fillable = [
        'application_number',
        'scholarship_id',
        'student_id',
        'family_monthly_income',
        'father_occupation',
        'number_of_dependents',
        'other_scholarships',
        'current_cgpa',
        'current_semester',
        'reason_for_applying',
        'achievements',
        'status',
        'awarded_amount',
        'awarded_percentage',
        'review_notes',
        'reviewed_by',
        'reviewed_at',
        'submitted_at',
    ];

    protected $casts = [
        'reviewed_at'  => 'datetime',
        'submitted_at' => 'datetime',
    ];

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function documents()
    {
        return $this->hasMany(ScholarshipApplicationDocument::class, 'application_id');
    }
}
