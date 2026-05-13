<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number', 30)->unique();
            $table->string('roll_number', 30)->nullable();
            $table->string('first_name', 80);
            $table->string('last_name', 80);
            $table->string('father_name', 150)->nullable();
            $table->string('email', 150)->unique();
            $table->string('phone', 20)->nullable();
            $table->string('cnic', 20)->unique()->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->text('address')->nullable();
            $table->string('city', 80)->nullable();
            $table->string('province', 80)->nullable();
            $table->string('profile_image', 255)->nullable();
            $table->foreignId('program_id')->constrained('programs')->cascadeOnDelete();
            $table->foreignId('admission_session_id')->constrained('academic_sessions')->cascadeOnDelete();
            $table->unsignedTinyInteger('current_semester')->nullable();
            $table->date('enrollment_date');
            $table->enum('status', [
                'active',
                'inactive',
                'graduated',
                'dropped',
                'suspended',
                'on_leave',
            ])->default('active');
            $table->foreignId('admission_application_id')
                ->nullable()
                ->constrained('admission_applications')
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
