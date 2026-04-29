<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scholarship_applications', function (Blueprint $table) {
    $table->id();
   $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
$table->foreignId('scholarship_id')->constrained('scholarships')->cascadeOnDelete();
    $table->string('document_path');
    $table->string('status');
    $table->timestamp('applied_at');
    $table->timestamps();
});

    }
    public function down(): void
    {
        Schema::dropIfExists('scholarship_applications');
    }
};
