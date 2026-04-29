<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name'];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}