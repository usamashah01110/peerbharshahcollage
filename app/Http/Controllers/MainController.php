<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\NewsEvent;
use App\Models\Program;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Stats shown on the home and about pages. Falls back to sensible
     * defaults so the page still looks complete when the DB is empty.
     */
    private function siteStats(): array
    {
        $departments = Department::count();
        $students    = Student::count();
        $teachers    = Teacher::count();
        $years       = max(1, (int) now()->year - 2003);

        return [
            'departments' => $departments ?: 7,
            'students'    => $students ?: 1733,
            'teachers'    => $teachers ?: 28,
            'years'       => $years,
            'programs'    => Program::where('is_active', true)->count() ?: 15,
            'alumni'      => ($students ?: 1733) * 1, // displayed as alumni success stories
        ];
    }

    public function index()
    {
        $news = NewsEvent::orderByDesc('event_date')->orderByDesc('id')->take(3)->get();

        $programs = Program::where('is_active', true)
            ->with('department')
            ->orderBy('degree_level')
            ->orderBy('name')
            ->take(4)
            ->get();

        return view('home', [
            'news'     => $news,
            'programs' => $programs,
            'stats'    => $this->siteStats(),
        ]);
    }

    public function about()
    {
        return $this->aboutus();
    }

    public function aboutus()
    {
        $faculty = Teacher::where('status', 'active')
            ->with('department')
            ->orderByRaw('CASE WHEN designation = "professor" THEN 0 WHEN designation = "associate_professor" THEN 1 ELSE 2 END')
            ->take(3)
            ->get();

        return view('aboutus', [
            'faculty' => $faculty,
            'stats'   => $this->siteStats(),
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    /**
     * Public news & events listing.
     */
    public function news()
    {
        $news = NewsEvent::orderByDesc('event_date')->orderByDesc('id')->paginate(9);

        return view('news.index', compact('news'));
    }

    public function newsShow(NewsEvent $newsEvent)
    {
        $related = NewsEvent::where('id', '!=', $newsEvent->id)
            ->orderByDesc('event_date')->orderByDesc('id')
            ->take(3)->get();

        return view('news.show', [
            'item'    => $newsEvent,
            'related' => $related,
        ]);
    }

    // Admissions methods
    public function intermediate()
    {
        return view('admissions.intermediate');
    }

    public function bachelorofscience()
    {
        return view('admissions.bachelorofscience');
    }

    public function howtoapply()
    {
        return view('admissions.howtoapply');
    }

    // Programs methods
    public function preMedical()
    {
        return view('profile.premedical');
    }

    public function preEngineering()
    {
        return view('profile.preengineering');
    }

    public function arts()
    {
        return view('profile.arts');
    }

    public function commerce()
    {
        return view('profile.commerce');
    }

    public function bs()
    {
        return view('profile.bsprograms');
    }

    public function generalScience()
    {
        return view('profile.general-science');
    }
}
