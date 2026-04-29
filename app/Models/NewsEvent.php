<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsEvent extends Model
{
    protected $fillable = [
        'title',
        'description',
        'event_date',
        'type',
        'department_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}