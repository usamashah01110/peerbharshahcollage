<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/about-us', [MainController::class, 'aboutus'])->name('aboutus');


// ================= ADMISSIONS =================
Route::get('/admissions/intermediate', function () {
    return view('intermediate');
})->name('intermediate');

Route::get('/admissions/bachelorofscience', function () {
    return view('bachelorofscience');
})->name('bachelorofscience');

Route::get('/programs', function () {
    return view('programs');
})->name('programs');


// ================= BS DEPARTMENTS (NEW ADD) =================
Route::get('/bs/{dept}', function ($dept) {

    $data = [

        'physics' => [
            'title' => 'BS Physics',
            'overview' => 'Physics is the study of matter, energy and natural laws.',
            'subjects' => 'Mechanics, Electromagnetism, Quantum Physics',
            'books' => 'Halliday & Resnick, Young Freedman'
        ],

        'chemistry' => [
            'title' => 'BS Chemistry',
            'overview' => 'Chemistry studies substances and chemical reactions.',
            'subjects' => 'Organic, Inorganic, Physical Chemistry',
            'books' => 'Atkins, Morrison Boyd'
        ],

        'mathematics' => [
            'title' => 'BS Mathematics',
            'overview' => 'Mathematics is the study of numbers and logic.',
            'subjects' => 'Algebra, Calculus, Statistics',
            'books' => 'Kreyszig, Thomas Calculus'
        ],

        'computer-science' => [
            'title' => 'BS Computer Science',
            'overview' => 'CS focuses on programming, AI and software systems.',
            'subjects' => 'Programming, AI, DBMS, Web Development',
            'books' => 'CLRS, Clean Code'
        ],

        'zoology' => [
            'title' => 'BS Zoology',
            'overview' => 'Study of animals and biological systems.',
            'subjects' => 'Animal Biology, Genetics, Ecology',
            'books' => 'Zoology by Miller'
        ],

        'botany' => [
            'title' => 'BS Botany',
            'overview' => 'Study of plants and plant science.',
            'subjects' => 'Plant Physiology, Taxonomy, Ecology',
            'books' => 'Botany by Raven'
        ],

    ];

    if (!isset($data[$dept])) {
        abort(404);
    }

    return view('department.show', $data[$dept]);

});
Route::get('/admissions/howtoapply', function () {
    return view('howtoapply');
})->name('howtoapply');

Route::get('/programs/curriculum/pre_medical', function () {
    return view('profile.premedical');
})->name('pre.medical');
Route::get('/programs/curriculum/pre_engineering', function () {
    return view('profile.preengineering');
})->name('pre.engineering');

Route::get('/programs/curriculum/arts', function () {
    return view('profile.arts');
})->name('arts');
Route::get('/programs/curriculum/commerce', function () {
    return view('profile.commerce');
})->name('commerce');
Route::get('/programs/curriculum/bs_programs', function () {
    return view('profile.bsprograms');
})->name('bs.programs');
Route::get('/programs/curriculum/general_science', function () {
    return view('profile.generalscience');
})->name('general.science');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// ================= PROFILE =================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';