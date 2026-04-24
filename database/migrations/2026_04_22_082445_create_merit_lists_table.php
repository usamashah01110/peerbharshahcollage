<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('merit_lists', function (Blueprint $table) {
            $table->id();

           
            $table->string('student_name');
            $table->string('father_name')->nullable();
            $table->string('roll_no')->nullable();

            $table->integer('marks');
            $table->float('percentage')->nullable();
            $table->string('program')->nullable(); // BSCS, BSIT etc
            $table->year('year');
            $table->string('status')->default('selected'); // selected / waiting / rejected

            $table->timestamps();
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('merit_lists');
    }
};