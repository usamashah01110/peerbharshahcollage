<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Semester;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('semester')->latest()->get();

        return view('admin.subjects.index', compact('subjects'));
    }

    public function create()
    {
        $semesters = Semester::all();

        return view('admin.subjects.create', compact('semesters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'semester_id' => 'required',
            'name' => 'required',
            'code' => 'required',
        ]);

        Subject::create([
            'semester_id' => $request->semester_id,
            'name' => $request->name,
            'code' => $request->code,
            'credit_hours' => $request->credit_hours,
            'description' => $request->description,
            'is_elective' => $request->has('is_elective'),
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Subject Added Successfully');
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        $semesters = Semester::all();

        return view('admin.subjects.edit', compact('subject', 'semesters'));
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $request->validate([
            'semester_id' => 'required',
            'name' => 'required',
            'code' => 'required',
        ]);

        $subject->update([
            'semester_id' => $request->semester_id,
            'name' => $request->name,
            'code' => $request->code,
            'credit_hours' => $request->credit_hours,
            'description' => $request->description,
            'is_elective' => $request->has('is_elective'),
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Subject Updated Successfully');
    }

    public function destroy($id)
    {
        Subject::findOrFail($id)->delete();

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Subject Deleted Successfully');
    }
}