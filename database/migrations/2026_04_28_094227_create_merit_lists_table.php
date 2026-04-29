<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('merit_lists', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
$table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
$table->foreignId('program_id')->constrained('programs')->cascadeOnDelete();
            $table->integer('marks');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('merit_lists');
    }
};