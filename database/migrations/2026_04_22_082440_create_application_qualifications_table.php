<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('application_qualifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('admission_applications')->cascadeOnDelete();
            $table->enum('level', [
                'matric',
                'o_level',
                'intermediate',
                'a_level',
                'bachelor',
                'master',
                'other',
            ]);
            $table->string('institution', 200);
            $table->string('board_university', 150);
            $table->year('passing_year');
            $table->decimal('obtained_marks', 7, 2);
            $table->decimal('total_marks', 7, 2);
            $table->decimal('percentage', 5, 2);
            $table->string('grade', 10)->nullable();
            $table->string('major_subjects', 255)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('application_qualifications');
    }
};
