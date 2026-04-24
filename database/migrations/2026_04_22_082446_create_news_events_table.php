<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('news_events', function (Blueprint $table) {
            $table->id();

            
            $table->string('title');
            $table->text('description')->nullable();

         
            $table->string('type'); 
            
            $table->date('event_date')->nullable();
            $table->string('location')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('news_events');
    }
};