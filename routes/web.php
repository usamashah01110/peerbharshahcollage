<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AcademicSessionController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AdmissionApplicationController;
use App\Http\Controllers\ApplicationDocumentController;
use App\Http\Controllers\ApplicationQualificationController;
use App\Http\Controllers\CourseOutlineController;
use App\Http\Controllers\NewsEventController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ScholarshipApplicationController;
use App\Http\Controllers\ScholarshipApplicationDocumentController;
use App\Http\Controllers\TeacherSubjectAssignmentController;
use App\Http\Controllers\TeacherProgramController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\MeritListController;
use App\Http\Controllers\PublicScholarshipController;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/aboutus', [MainController::class, 'aboutus'])->name('about');
Route::get('/contactus', [MainController::class, 'contact'])->name('contact');

Route::get('/admissions/intermediate', fn () => view('admissions.intermediate'))->name('admissions.intermediate');
Route::get('/admissions/bachelorofscience', fn () => view('admissions.bachelorofscience'))->name('admissions.bachelorofscience');
Route::get('/admissions/howtoapply', fn () => view('admissions.howtoapply'))->name('admissions.howtoapply');

Route::get('/profile/pre-medical', [MainController::class, 'preMedical'])->name('pre.medical');
Route::get('/profile/pre-engineering', [MainController::class, 'preEngineering'])->name('pre.engineering');
Route::get('/profile/arts', [MainController::class, 'arts'])->name('arts');
Route::get('/profile/commerce', [MainController::class, 'commerce'])->name('commerce');
Route::get('/profile/bs', [MainController::class, 'bs'])->name('bs.programs');
Route::get('/profile/general-science', [MainController::class, 'generalScience'])->name('general.science');

Route::get('/studentlife', fn () => view('student-life'))->name('studentlife');

/*
| News & Events (public)
*/
Route::get('/news', [MainController::class, 'news'])->name('news.index');
Route::get('/news/{newsEvent}', [MainController::class, 'newsShow'])->name('news.show');

/*
| Scholarships (public) — list, detail, and online application
*/
Route::get('/scholarships', [PublicScholarshipController::class, 'index'])->name('scholarships.index');
Route::get('/scholarships/{slug}/apply', [PublicScholarshipController::class, 'applyForm'])->name('scholarships.apply.form');
Route::post('/scholarships/{slug}/apply', [PublicScholarshipController::class, 'apply'])->name('scholarships.apply');
Route::get('/scholarships/{slug}', [PublicScholarshipController::class, 'show'])->name('scholarships.show');

/*
|--------------------------------------------------------------------------
| Protected Routes (Auth)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |----------------------------------------------------------------------
    | Admin Panel CRUDs (all entities from migrations)
    |----------------------------------------------------------------------
    */
    Route::prefix('admin')->name('admin.')->group(function () {

        // Core academic structure
        Route::resource('departments', DepartmentController::class);
        Route::resource('academic-sessions', AcademicSessionController::class)->except(['show']);
        Route::resource('teachers', TeacherController::class);
        Route::resource('programs', ProgramController::class);
        Route::resource('semesters', SemesterController::class);
        Route::resource('subjects', SubjectController::class);

        // Pivot / assignments
        Route::resource('teacher-subject-assignments', TeacherSubjectAssignmentController::class)->except(['show']);
        Route::resource('teacher-programs', TeacherProgramController::class)->except(['show']);

        // Admissions flow
        Route::resource('admission-applications', AdmissionApplicationController::class);
        Route::resource('application-documents', ApplicationDocumentController::class)->except(['show']);
        Route::resource('application-qualifications', ApplicationQualificationController::class)->except(['show']);
        Route::resource('students', StudentController::class);
        Route::resource('admissions', AdmissionController::class)->except(['show']);
        Route::resource('merit-lists', MeritListController::class)->except(['show']);

        // Scholarships flow
        Route::resource('scholarships', ScholarshipController::class);
        Route::resource('scholarship-applications', ScholarshipApplicationController::class);
        Route::resource('scholarship-application-documents', ScholarshipApplicationDocumentController::class)->except(['show']);

        // Content / supporting
        Route::resource('course-outlines', CourseOutlineController::class)->except(['show']);
        Route::resource('news-events', NewsEventController::class)->except(['show']);
        Route::resource('materials', MaterialController::class)->except(['show']);
    });
});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', fn () => view('admin.dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/admin/dashboard', fn () => view('admin.dashboard'))
    ->middleware(['auth'])
    ->name('admin.dashboard');

require __DIR__.'/auth.php';
