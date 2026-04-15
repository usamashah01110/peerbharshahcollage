<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function bachelorOfScience() {

    $programs = [
        (object)['name' => 'Physics', 'image' => null],
        (object)['name' => 'Chemistry', 'image' => null],
        (object)['name' => 'Mathematics', 'image' => null],
        (object)['name' => 'Computer Science', 'image' => null],
        (object)['name' => 'Zoology', 'image' => null],
        (object)['name' => 'Botany', 'image' => null],
    ];

    return view('bachelorofscience', compact('programs'));
}
};
