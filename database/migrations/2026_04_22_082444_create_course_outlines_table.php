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

          
            $table->foreignId('course_id')
                  ->constrained()
                  ->onDelete('cascade');

           
            $table->text('outline_text');
            $table->string('week')->nullable(); // Week 1, Week 2 etc
            $table->string('topic_title')->nullable(); // optional heading

           
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('course_outlines');
    }
};