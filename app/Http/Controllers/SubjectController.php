<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Semester;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('semester.program')->latest()->get();
        return view('admin.subjects.index', compact('subjects'));
    }

    public function create()
    {
        $semesters = Semester::with('program')->orderBy('program_id')->orderBy('semester_number')->get();
        return view('admin.subjects.create', compact('semesters'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'semester_id'  => 'required|exists:semesters,id',
            'name'         => 'required|string|max:150',
            'code'         => 'required|string|max:20',
            'credit_hours' => 'nullable|integer|min:0|max:20',
            'description'  => 'nullable|string',
            'is_elective'  => 'nullable|boolean',
            'is_active'    => 'nullable|boolean',
        ]);

        $validated['is_elective'] = $request->boolean('is_elective');
        $validated['is_active']   = $request->boolean('is_active', true);

        Subject::create($validated);

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Subject added successfully.');
    }

    public function edit($id)
    {
        $subject   = Subject::findOrFail($id);
        $semesters = Semester::with('program')->orderBy('program_id')->orderBy('semester_number')->get();
        return view('admin.subjects.edit', compact('subject', 'semesters'));
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $validated = $request->validate([
            'semester_id'  => 'required|exists:semesters,id',
            'name'         => 'required|string|max:150',
            'code'         => 'required|string|max:20',
            'credit_hours' => 'nullable|integer|min:0|max:20',
            'description'  => 'nullable|string',
            'is_elective'  => 'nullable|boolean',
            'is_active'    => 'nullable|boolean',
        ]);

        $validated['is_elective'] = $request->boolean('is_elective');
        $validated['is_active']   = $request->boolean('is_active', true);

        $subject->update($validated);

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Subject updated successfully.');
    }

    public function destroy($id)
    {
        Subject::findOrFail($id)->delete();
        return redirect()->route('admin.subjects.index')
            ->with('success', 'Subject deleted successfully.');
    }
}
