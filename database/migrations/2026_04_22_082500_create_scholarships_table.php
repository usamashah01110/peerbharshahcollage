<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('slug', 220)->unique();
            $table->text('description');
            $table->enum('type', ['merit', 'need_based', 'sports', 'minority', 'disability', 'other'])
                ->default('merit');
            $table->decimal('award_amount', 10, 2)->nullable();
            $table->decimal('fee_waiver_percentage', 5, 2)->nullable();
            $table->unsignedTinyInteger('duration_semesters')->nullable();
            $table->text('eligibility_criteria');
            $table->decimal('minimum_cgpa', 3, 2)->nullable();
            $table->decimal('maximum_family_income', 12, 2)->nullable();
            $table->json('eligible_program_ids')->nullable();
            $table->json('eligible_semesters')->nullable();
            $table->dateTime('application_open_date');
            $table->dateTime('application_close_date');
            $table->unsignedSmallInteger('max_recipients')->nullable();
            $table->enum('status', ['draft', 'open', 'closed', 'archived'])->default('draft');
            $table->string('featured_image', 255)->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->index(['application_open_date', 'application_close_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};
