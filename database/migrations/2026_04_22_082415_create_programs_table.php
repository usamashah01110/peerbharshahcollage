<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            $table->string('name', 150);
            $table->string('code', 20)->unique();
            $table->enum('degree_level', [
                'intermediate',
                'bachelor',
                'master',
                'mphil',
                'phd',
                'diploma',
                'certificate',
            ]);
            $table->unsignedTinyInteger('total_semesters');
            $table->decimal('duration_years', 3, 1);
            $table->unsignedSmallInteger('total_credit_hours')->nullable();
            $table->text('description')->nullable();
            $table->decimal('fee_per_semester', 10, 2)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
