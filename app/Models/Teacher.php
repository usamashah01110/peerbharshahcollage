<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department; // 🔹 IMPORTANT FIX

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'designation',
        'email',
        'phone',
        'qualification',
        'experience',
        'department_id',
        'status'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}