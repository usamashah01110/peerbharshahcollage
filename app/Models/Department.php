<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher; 

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'description',
        'hod_name',
        'phone',
        'email',
        'status'
    ];
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}