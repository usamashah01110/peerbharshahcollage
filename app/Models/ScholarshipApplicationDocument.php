<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScholarshipApplicationDocument extends Model
{
    public $timestamps = false;

    protected $table = 'scholarship_application_documents';

    protected $fillable = [
        'application_id',
        'document_type',
        'file_path',
        'uploaded_at',
    ];

    protected $casts = [
        'uploaded_at' => 'datetime',
    ];

    public function application()
    {
        return $this->belongsTo(ScholarshipApplication::class, 'application_id');
    }
}
