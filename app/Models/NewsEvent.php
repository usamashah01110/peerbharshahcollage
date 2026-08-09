<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsEvent extends Model
{
    use HasFactory;

    protected $table = 'news_events';

    protected $fillable = [
        'title',
        'description',
        'event_date',
        'type',
        'department_id',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
