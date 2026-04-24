<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'type',
        'year',
        'amount',
        'status'
    ];

    public function applications()
    {
        return $this->hasMany(ScholarshipApplication::class);
    }
}