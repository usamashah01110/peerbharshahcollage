<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();

          
            $table->string('title');
            $table->text('description')->nullable();

           
            $table->string('type')->nullable(); 
            $table->year('year')->nullable();

            $table->decimal('amount', 10, 2)->nullable();

          
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};