<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\Program;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    // Show all semesters
    public function index()
    {
        $semesters = Semester::with('program')->get();

        return view('admin.semesters.index', compact('semesters'));
    }

    // Create form
    public function create()
    {
        $programs = Program::all();

        return view('admin.semesters.create', compact('programs'));
    }

    // Store semester
    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required',
            'semester_number' => 'required|numeric|min:1|max:12',
            'name' => 'required',
        ]);

        Semester::create($request->all());

        return redirect()
            ->route('admin.semesters.index')
            ->with('success', 'Semester Added Successfully');
    }

    // Edit form
    public function edit($id)
    {
        $semester = Semester::findOrFail($id);

        $programs = Program::all();

        return view(
            'admin.semesters.edit',
            compact('semester', 'programs')
        );
    }

    // Update semester
    public function update(Request $request, $id)
    {
        $semester = Semester::findOrFail($id);

        $request->validate([
            'program_id' => 'required',
            'semester_number' => 'required|numeric|min:1|max:12',
            'name' => 'required',
        ]);

        $semester->update($request->all());

        return redirect()
            ->route('admin.semesters.index')
            ->with('success', 'Semester Updated Successfully');
    }

    // Delete semester
    public function destroy($id)
    {
        $semester = Semester::findOrFail($id);

        $semester->delete();

        return redirect()
            ->route('admin.semesters.index')
            ->with('success', 'Semester Deleted Successfully');
    }
}