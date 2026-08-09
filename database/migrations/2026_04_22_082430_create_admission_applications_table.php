<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('admission_applications', function (Blueprint $table) {
            $table->id();
            $table->string('application_number', 30)->unique();
            $table->foreignId('applied_program_id')->constrained('programs')->cascadeOnDelete();
            $table->foreignId('session_id')->constrained('academic_sessions')->cascadeOnDelete();

            // Personal information
            $table->string('first_name', 80);
            $table->string('last_name', 80);
            $table->string('father_name', 150);
            $table->string('mother_name', 150)->nullable();
            $table->string('cnic', 20);
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('nationality', 50)->nullable();
            $table->string('religion', 50)->nullable();
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed'])->nullable();

            // Contact
            $table->string('email', 150);
            $table->string('phone', 20);
            $table->string('alternate_phone', 20)->nullable();
            $table->text('present_address');
            $table->text('permanent_address')->nullable();
            $table->string('city', 80);
            $table->string('province', 80);
            $table->string('postal_code', 15)->nullable();

            // Guardian
            $table->string('guardian_name', 150);
            $table->string('guardian_relation', 50);
            $table->string('guardian_cnic', 20)->nullable();
            $table->string('guardian_phone', 20)->nullable();
            $table->string('guardian_occupation', 100)->nullable();
            $table->decimal('guardian_monthly_income', 12, 2)->nullable();

            // Emergency contact
            $table->string('emergency_contact_name', 150)->nullable();
            $table->string('emergency_contact_phone', 20)->nullable();

            // Application status & scoring
            $table->enum('status', [
                'draft',
                'submitted',
                'under_review',
                'shortlisted',
                'admitted',
                'rejected',
                'waitlisted',
                'withdrawn',
            ])->default('draft');
            $table->decimal('test_score', 5, 2)->nullable();
            $table->decimal('interview_score', 5, 2)->nullable();
            $table->decimal('merit_score', 5, 2)->nullable();
            $table->text('review_notes')->nullable();
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamp('submitted_at')->nullable();

            // Linked student (FK added in a later migration once students table exists)
            $table->unsignedBigInteger('student_id')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admission_applications');
    }
};
