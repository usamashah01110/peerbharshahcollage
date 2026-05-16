<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationQualification extends Model
{
    use HasFactory;

    protected $table = 'application_qualifications';

    public $timestamps = false;

    protected $fillable = [
        'application_id',
        'level',
        'institution',
        'board_university',
        'passing_year',
        'obtained_marks',
        'total_marks',
        'percentage',
        'grade',
        'major_subjects',
    ];

    public function application()
    {
        return $this->belongsTo(
            AdmissionApplication::class,
            'application_id'
        );
    }
}