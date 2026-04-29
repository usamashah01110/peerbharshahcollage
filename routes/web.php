<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ScholarshipApplicationController;
use App\Http\Controllers\MeritListController;
use App\Http\Controllers\NewsEventController;

Route::prefix('admin')->middleware(['auth'])->group(function () {
Route::resource('programs', ProgramController::class);
 Route::resource('students', StudentController::class);


});



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

// Programs Pages
Route::get('/profile/pre-medical', fn () => view('profile.premedical'))->name('pre.medical');
Route::get('/profile/pre-engineering', fn () => view('profile.preengineering'))->name('pre.engineering');
Route::get('/profile/arts', fn () => view('profile.arts'))->name('arts');
Route::get('/profile/commerce', fn () => view('profile.commerce'))->name('commerce');
Route::get('/profile/bs', fn () => view('profile.bs'))->name('bs.programs');
Route::get('/profile/general-science', fn () => view('profile.generalscience'))->name('general.science');

// Student Life
Route::get('/studentlife', fn () => view('studentlife'))->name('studentlife');

/*
|--------------------------------------------------------------------------
| Dashboard Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    
    Route::resource('scholarships', ScholarshipController::class);
    Route::resource('scholarship-applications', ScholarshipApplicationController::class);
    Route::resource('merit-lists', MeritListController::class);
    Route::resource('news-events', NewsEventController::class);
});

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';