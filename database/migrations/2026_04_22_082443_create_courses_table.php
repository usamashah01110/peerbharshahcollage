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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            // 🔹 Course Info
            $table->string('course_name');
            $table->string('course_code')->unique()->nullable(); // CS101 etc
            $table->integer('credit_hours')->nullable();

            // 🔹 Academic Info
            $table->string('semester')->nullable(); // 1st, 2nd etc
            $table->string('program')->nullable();   // BSCS, BSIT etc

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
        Schema::dropIfExists('courses');
    }
};