<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scholarship; // 🔹 IMPORTANT FIX

class ScholarshipApplication extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'scholarship_id',
        'student_name',
        'documents_path',
        'status'
    ];


    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class);
    }
}