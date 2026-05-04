<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ScholarshipApplicationController;
use App\Http\Controllers\MeritListController;
use App\Http\Controllers\NewsEventController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\CourseOutlineController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Pages
Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/aboutus', [MainController::class, 'aboutus'])->name('about');
Route::get('/contactus', [MainController::class, 'contact'])->name('contact');

// Admissions Pages
Route::get('/admissions/intermediate', fn () => view('admissions.intermediate'))->name('admissions.intermediate');
Route::get('/admissions/bachelorofscience', fn () => view('admissions.bachelorofscience'))->name('admissions.bachelorofscience');
Route::get('/admissions/howtoapply', fn () => view('admissions.howtoapply'))->name('admissions.howtoapply');
Route::get('/profile/pre-medical', [MainController::class, 'preMedical'])->name('pre.medical');
Route::get('/profile/pre-engineering', [MainController::class, 'preEngineering'])->name('pre.engineering');
Route::get('/profile/arts', [MainController::class, 'arts'])->name('arts');
Route::get('/profile/commerce', [MainController::class, 'commerce'])->name('commerce');
Route::get('/profile/bs', [MainController::class, 'bs'])->name('bs.programs');
Route::get('/profile/general-science', [MainController::class, 'generalScience'])->name('general.science');
Route::get('/profile/pre-medical', fn () => view('profile.premedical'))->name('pre.medical');
Route::get('/profile/pre-engineering', fn () => view('profile.preengineering'))->name('pre.engineering');
Route::get('/profile/arts', fn () => view('profile.arts'))->name('arts');
Route::get('/profile/commerce', fn () => view('profile.commerce'))->name('commerce');
Route::get('/profile/bs', fn () => view('profile.bs'))->name('bs.programs');
Route::get('/profile/general-science', fn () => view('profile.generalscience'))->name('general.science');

// Student Life
Route::get('/studentlife', fn () => view('student-life'))->name('studentlife');


/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('admin')->group(function () {
        Route::resource('programs', ProgramController::class);
        Route::resource('students', StudentController::class);
        Route::resource('merit_lists', MeritListController::class);
        Route::resource('scholarship_applications', scholarshipapplicationController::class);
        Route::resource('materials', MaterialController::class);
        Route::resource('departments', DepartmentController::class);
        Route::resource('scholarships', ScholarshipController::class);
        Route::resource('teachers', TeacherController::class);
        Route::resource('news-events', NewsEventController::class);
        Route::resource('course_outlines', CourseOutlineController::class);
    });

});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
