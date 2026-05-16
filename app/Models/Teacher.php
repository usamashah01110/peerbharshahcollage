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
        'address',
    ];

    // Relationship
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}