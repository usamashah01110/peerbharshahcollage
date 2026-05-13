<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('scholarship_application_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')
                ->constrained('scholarship_applications')
                ->cascadeOnDelete();
            $table->enum('document_type', [
                'cnic',
                'transcript',
                'income_certificate',
                'recommendation_letter',
                'photo',
                'other',
            ]);
            $table->string('file_path', 500);
            $table->timestamp('uploaded_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scholarship_application_documents');
    }
};
