<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('application_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('admission_applications')->cascadeOnDelete();
            $table->enum('document_type', [
                'cnic',
                'photo',
                'matric_certificate',
                'fsc_certificate',
                'transcript',
                'character_certificate',
                'domicile',
                'other',
            ]);
            $table->string('file_path', 500);
            $table->unsignedInteger('file_size_kb')->nullable();
            $table->string('mime_type', 50)->nullable();
            $table->timestamp('uploaded_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('application_documents');
    }
};
