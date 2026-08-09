<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('scholarship_applications', function (Blueprint $table) {
            $table->id();
            $table->string('application_number', 30)->unique();
            $table->foreignId('scholarship_id')->constrained('scholarships')->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();

            $table->decimal('family_monthly_income', 12, 2)->nullable();
            $table->string('father_occupation', 150)->nullable();
            $table->unsignedTinyInteger('number_of_dependents')->nullable();
            $table->string('other_scholarships', 255)->nullable();
            $table->decimal('current_cgpa', 3, 2)->nullable();
            $table->unsignedTinyInteger('current_semester')->nullable();
            $table->text('reason_for_applying')->nullable();
            $table->text('achievements')->nullable();

            $table->enum('status', [
                'draft',
                'submitted',
                'under_review',
                'approved',
                'rejected',
                'awarded',
                'withdrawn',
            ])->default('draft');
            $table->decimal('awarded_amount', 10, 2)->nullable();
            $table->decimal('awarded_percentage', 5, 2)->nullable();
            $table->text('review_notes')->nullable();
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamp('submitted_at')->nullable();
            $table->timestamps();

            $table->unique(['scholarship_id', 'student_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scholarship_applications');
    }
};
