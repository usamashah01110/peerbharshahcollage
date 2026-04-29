<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
       Schema::create('course_outlines', function (Blueprint $table) {
            $table->id();

            $table->foreignId('program_id')
                  ->unique() 
                  ->constrained()
                  ->cascadeOnDelete();

            $table->text('description')->nullable();
            $table->text('objectives')->nullable();
            $table->text('topics')->nullable();

            $table->string('file')->nullable();

            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('course_outlines');
    }
};