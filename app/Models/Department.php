<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
        'hod_id',
        'established_date',
        'is_active',
    ];

    protected $casts = [
        'established_date' => 'date',
        'is_active'        => 'boolean',
    ];

    public function hod()
    {
        return $this->belongsTo(Teacher::class, 'hod_id');
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function newsEvents()
    {
        return $this->hasMany(NewsEvent::class);
    }
}
