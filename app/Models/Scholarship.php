<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'type',
        'award_amount',
        'fee_waiver_percentage',
        'duration_semesters',
        'eligibility_criteria',
        'minimum_cgpa',
        'maximum_family_income',
        'eligible_program_ids',
        'eligible_semesters',
        'application_open_date',
        'application_close_date',
        'max_recipients',
        'status',
        'featured_image',
        'created_by',
    ];

    protected $casts = [
        'eligible_program_ids'   => 'array',
        'eligible_semesters'     => 'array',
        'application_open_date'  => 'datetime',
        'application_close_date' => 'datetime',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function applications()
    {
        return $this->hasMany(ScholarshipApplication::class);
    }
}
