<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'email', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }

    public function meritLists()
    {
        return $this->hasMany(MeritList::class);
    }

    public function scholarshipApplications()
    {
        return $this->hasMany(ScholarshipApplication::class);
    }
}