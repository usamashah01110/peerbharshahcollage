<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ScholarshipApplicationController;
use App\Http\Controllers\MeritListController;
use App\Http\Controllers\NewsEventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Public Pages
Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/about-us', [MainController::class, 'about'])->name('about');
Route::get('/contact-us', [MainController::class, 'contact'])->name('contact');

// Admissions Pages
Route::get('/admissions/intermediate', [MainController::class, 'intermediate'])->name('admissions.intermediate');
Route::get('/admissions/bachelorofscience', [MainController::class, 'bachelorofscience'])->name('admissions.bs');
Route::get('/admissions/howtoapply', [MainController::class, 'howtoapply'])->name('admissions.howtoapply');

// Programs Pages
Route::get('/programs/pre-medical', [MainController::class, 'preMedical'])->name('pre.medical');
Route::get('/programs/pre-engineering', [MainController::class, 'preEngineering'])->name('pre.engineering');
Route::get('/programs/arts', [MainController::class, 'arts'])->name('arts');
Route::get('/programs/commerce', [MainController::class, 'commerce'])->name('commerce');
Route::get('/programs/bs', [MainController::class, 'bs'])->name('bs.programs');
Route::get('/programs/general-science', [MainController::class, 'generalScience'])->name('general.science');

// Student Life
Route::get('/studentlife', fn () => view('studentlife'))->name('studentlife');


/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('scholarships', ScholarshipController::class);
    Route::resource('scholarship-applications', ScholarshipApplicationController::class);
    Route::resource('merit-lists', MeritListController::class);
    Route::resource('news-events', NewsEventController::class);
    Route::resource('courses', CourseController::class);
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
