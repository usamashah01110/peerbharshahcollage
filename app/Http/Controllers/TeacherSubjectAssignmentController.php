<?php

namespace App\Http\Controllers;

use App\Models\TeacherSubjectAssignment;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\AcademicSession;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeacherSubjectAssignmentController extends Controller
{
    public function index()
    {
        $assignments = TeacherSubjectAssignment::with(['teacher', 'subject.semester.program', 'session'])
            ->latest('id')->get();
        return view('admin.teacher_subject_assignments.index', compact('assignments'));
    }

    public function create()
    {
        $teachers = Teacher::orderBy('first_name')->get();
        $subjects = Subject::with('semester.program')->orderBy('name')->get();
        $sessions = AcademicSession::orderBy('start_date', 'desc')->get();
        return view('admin.teacher_subject_assignments.create', compact('teachers', 'subjects', 'sessions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'subject_id' => [
                'required', 'exists:subjects,id',
                Rule::unique('teacher_subject_assignments')->where(fn ($q) => $q
                    ->where('teacher_id', $request->teacher_id)
                    ->where('session_id', $request->session_id)),
            ],
            'session_id' => 'required|exists:academic_sessions,id',
            'section'    => 'nullable|string|max:10',
            'is_active'  => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        TeacherSubjectAssignment::create($validated);

        return redirect()->route('admin.teacher-subject-assignments.index')
            ->with('success', 'Assignment created successfully.');
    }

    public function edit($id)
    {
        $assignment = TeacherSubjectAssignment::findOrFail($id);
        $teachers   = Teacher::orderBy('first_name')->get();
        $subjects   = Subject::with('semester.program')->orderBy('name')->get();
        $sessions   = AcademicSession::orderBy('start_date', 'desc')->get();
        return view('admin.teacher_subject_assignments.edit', compact('assignment', 'teachers', 'subjects', 'sessions'));
    }

    public function update(Request $request, $id)
    {
        $assignment = TeacherSubjectAssignment::findOrFail($id);

        $validated = $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'subject_id' => [
                'required', 'exists:subjects,id',
                Rule::unique('teacher_subject_assignments')->where(fn ($q) => $q
                    ->where('teacher_id', $request->teacher_id)
                    ->where('session_id', $request->session_id))->ignore($id),
            ],
            'session_id' => 'required|exists:academic_sessions,id',
            'section'    => 'nullable|string|max:10',
            'is_active'  => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        $assignment->update($validated);

        return redirect()->route('admin.teacher-subject-assignments.index')
            ->with('success', 'Assignment updated successfully.');
    }

    public function destroy($id)
    {
        TeacherSubjectAssignment::findOrFail($id)->delete();
        return redirect()->route('admin.teacher-subject-assignments.index')
            ->with('success', 'Assignment deleted successfully.');
    }
}
