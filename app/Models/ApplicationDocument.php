<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationDocument extends Model
{
    public $timestamps = false;

    protected $table = 'application_documents';

    protected $fillable = [
        'application_id',
        'document_type',
        'file_path',
        'file_size_kb',
        'mime_type',
        'uploaded_at',
    ];

    protected $casts = [
        'uploaded_at' => 'datetime',
    ];

    public function application()
    {
        return $this->belongsTo(AdmissionApplication::class, 'application_id');
    }
}
