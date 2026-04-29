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
            $table->text('description');

            $table->date('event_date')->nullable();
            $table->string('type')->default('news');
            $table->foreignId('department_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('news_events');
    }
};