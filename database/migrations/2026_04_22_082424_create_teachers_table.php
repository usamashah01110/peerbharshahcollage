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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();

            // 🔹 Basic Info
            $table->string('name');
            $table->string('designation')->nullable(); // Lecturer, Assistant Prof etc

            // 🔹 Contact Info
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            // 🔹 Professional Info
            $table->string('qualification')->nullable(); // MSc, MPhil etc
            $table->string('experience')->nullable(); // 5 years etc

            // 🔹 Relationship
            $table->foreignId('department_id')
                  ->constrained()
                  ->onDelete('cascade');

            // 🔹 Status
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};