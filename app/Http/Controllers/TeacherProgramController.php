<?php

namespace App\Http\Controllers;

use App\Models\TeacherProgram;
use App\Models\Teacher;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeacherProgramController extends Controller
{
    public function index()
    {
        $assignments = TeacherProgram::with(['teacher', 'program'])->latest('id')->get();
        return view('admin.teacher_programs.index', compact('assignments'));
    }

    public function create()
    {
        $teachers = Teacher::orderBy('first_name')->get();
        $programs = Program::orderBy('name')->get();
        return view('admin.teacher_programs.create', compact('teachers', 'programs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'teacher_id'    => 'required|exists:teachers,id',
            'program_id'    => [
                'required', 'exists:programs,id',
                Rule::unique('teacher_programs')->where(fn ($q) => $q->where('teacher_id', $request->teacher_id)),
            ],
            'assigned_date' => 'nullable|date',
        ]);

        TeacherProgram::create($validated);

        return redirect()->route('admin.teacher-programs.index')
            ->with('success', 'Teacher-program assignment created successfully.');
    }

    public function edit($id)
    {
        $assignment = TeacherProgram::findOrFail($id);
        $teachers   = Teacher::orderBy('first_name')->get();
        $programs   = Program::orderBy('name')->get();
        return view('admin.teacher_programs.edit', compact('assignment', 'teachers', 'programs'));
    }

    public function update(Request $request, $id)
    {
        $assignment = TeacherProgram::findOrFail($id);

        $validated = $request->validate([
            'teacher_id'    => 'required|exists:teachers,id',
            'program_id'    => [
                'required', 'exists:programs,id',
                Rule::unique('teacher_programs')->where(fn ($q) => $q->where('teacher_id', $request->teacher_id))->ignore($id),
            ],
            'assigned_date' => 'nullable|date',
        ]);

        $assignment->update($validated);

        return redirect()->route('admin.teacher-programs.index')
            ->with('success', 'Teacher-program assignment updated successfully.');
    }

    public function destroy($id)
    {
        TeacherProgram::findOrFail($id)->delete();
        return redirect()->route('admin.teacher-programs.index')
            ->with('success', 'Teacher-program assignment deleted successfully.');
    }
}
