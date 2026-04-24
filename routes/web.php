<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ScholarshipApplicationController;
use App\Http\Controllers\MeritListController;
use App\Http\Controllers\NewsEventController;

Route::prefix('admin')->middleware(['auth'])->group(function () {

    
    Route::resource('courses', CourseController::class);

});



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Pages
Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/about-us', [MainController::class, 'about'])->name('about');
Route::get('/contact-us', [MainController::class, 'contact'])->name('contact');

// Admissions Pages
Route::get('/admissions/intermediate', fn () => view('admissions.intermediate'))->name('admissions.intermediate');
Route::get('/admissions/bachelorofscience', fn () => view('admissions.bs'))->name('admissions.bs');
Route::get('/admissions/howtoapply', fn () => view('admissions.howtoapply'))->name('admissions.howtoapply');

// Programs Pages
Route::get('/programs/pre-medical', fn () => view('programs.pre-medical'))->name('pre.medical');
Route::get('/programs/pre-engineering', fn () => view('programs.pre-engineering'))->name('pre.engineering');
Route::get('/programs/arts', fn () => view('programs.arts'))->name('arts');
Route::get('/programs/commerce', fn () => view('programs.commerce'))->name('commerce');
Route::get('/programs/bs', fn () => view('programs.bs'))->name('bs.programs');
Route::get('/programs/general-science', fn () => view('programs.general-science'))->name('general.science');

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