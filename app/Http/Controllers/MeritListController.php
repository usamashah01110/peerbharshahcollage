<?php

namespace App\Http\Controllers;

use App\Models\MeritList;
use App\Models\Student;
use App\Models\Program;
use Illuminate\Http\Request;

class MeritListController extends Controller
{
    public function index()
    {
        $meritLists = MeritList::with(['student', 'program'])->latest()->get();
        return view('admin.merit_lists.index', compact('meritLists'));
    }

    public function create()
    {
        $students = Student::orderBy('first_name')->get();
        $programs = Program::orderBy('name')->get();
        return view('admin.merit_lists.create', compact('students', 'programs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'program_id' => 'required|exists:programs,id',
            'marks'      => 'required|integer|min:0',
        ]);

        MeritList::create($validated);

        return redirect()->route('admin.merit-lists.index')
            ->with('success', 'Merit list entry added.');
    }

    public function edit($id)
    {
        $meritList = MeritList::findOrFail($id);
        $students  = Student::orderBy('first_name')->get();
        $programs  = Program::orderBy('name')->get();
        return view('admin.merit_lists.edit', compact('meritList', 'students', 'programs'));
    }

    public function update(Request $request, $id)
    {
        $meritList = MeritList::findOrFail($id);

        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'program_id' => 'required|exists:programs,id',
            'marks'      => 'required|integer|min:0',
        ]);

        $meritList->update($validated);

        return redirect()->route('admin.merit-lists.index')
            ->with('success', 'Merit list entry updated.');
    }

    public function destroy($id)
    {
        MeritList::findOrFail($id)->delete();
        return redirect()->route('admin.merit-lists.index')
            ->with('success', 'Merit list entry deleted.');
    }
}
