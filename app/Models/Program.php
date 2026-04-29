<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['program_code', 'program_name', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function courseOutline()
    {
        return $this->hasOne(CourseOutline::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}