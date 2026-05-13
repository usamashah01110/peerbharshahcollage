<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id', 30)->unique();
            $table->string('first_name', 80);
            $table->string('last_name', 80);
            $table->string('email', 150)->unique();
            $table->string('phone', 20)->nullable();
            $table->string('cnic', 20)->unique()->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            $table->enum('designation', [
                'professor',
                'associate_professor',
                'assistant_professor',
                'lecturer',
                'instructor',
                'visiting',
            ])->default('lecturer');
            $table->string('qualification', 200)->nullable();
            $table->string('specialisation', 200)->nullable();
            $table->date('joining_date')->nullable();
            $table->string('profile_image', 255)->nullable();
            $table->text('bio')->nullable();
            $table->enum('status', ['active', 'inactive', 'on_leave', 'retired'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
