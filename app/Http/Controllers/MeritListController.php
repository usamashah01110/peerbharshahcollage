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
        $meritLists = MeritList::with(['student', 'program'])->get();
        return view('admin.merit_lists.index', compact('meritLists'));
    }

    public function create()
    {
        $students = Student::all();
        $programs = Program::all();
        return view('admin.merit_lists.create', compact('students', 'programs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'program_id' => 'required',
            'marks' => 'required|integer'
        ]);

        MeritList::create($request->all());

        return redirect()->route('merit_lists.index')->with('success', 'Merit added!');
    }

    public function edit(MeritList $meritList)
    {
        $students = Student::all();
        $programs = Program::all();
        return view('merit_lists.edit', compact('meritList', 'students', 'programs'));
    }

    public function update(Request $request, MeritList $meritList)
    {
        $request->validate([
            'student_id' => 'required',
            'program_id' => 'required',
            'marks' => 'required|integer'
        ]);

        $meritList->update($request->all());

        return redirect()->route('merit_lists.index')->with('success', 'Updated!');
    }

    public function destroy(MeritList $meritList)
    {
        $meritList->delete();
        return redirect()->route('merit_lists.index')->with('success', 'Deleted!');
    }
}