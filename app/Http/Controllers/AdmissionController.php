<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Student;
use App\Models\Program;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
    {
        $admissions = Admission::with(['student', 'program'])->latest()->get();
        return view('admin.admissions.index', compact('admissions'));
    }

    public function create()
    {
        $students = Student::orderBy('first_name')->get();
        $programs = Program::orderBy('name')->get();
        return view('admin.admissions.create', compact('students', 'programs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id'     => 'required|exists:students,id',
            'program_id'     => 'required|exists:programs,id',
            'admission_date' => 'required|date',
            'status'         => 'required|string|max:50',
        ]);

        Admission::create($validated);

        return redirect()->route('admin.admissions.index')
            ->with('success', 'Admission added successfully.');
    }

    public function edit($id)
    {
        $admission = Admission::findOrFail($id);
        $students  = Student::orderBy('first_name')->get();
        $programs  = Program::orderBy('name')->get();
        return view('admin.admissions.edit', compact('admission', 'students', 'programs'));
    }

    public function update(Request $request, $id)
    {
        $admission = Admission::findOrFail($id);

        $validated = $request->validate([
            'student_id'     => 'required|exists:students,id',
            'program_id'     => 'required|exists:programs,id',
            'admission_date' => 'required|date',
            'status'         => 'required|string|max:50',
        ]);

        $admission->update($validated);

        return redirect()->route('admin.admissions.index')
            ->with('success', 'Admission updated successfully.');
    }

    public function destroy($id)
    {
        Admission::findOrFail($id)->delete();
        return redirect()->route('admin.admissions.index')
            ->with('success', 'Admission deleted successfully.');
    }
}
