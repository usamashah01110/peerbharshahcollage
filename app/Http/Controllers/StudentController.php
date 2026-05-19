<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Program;
use App\Models\AcademicSession;
use App\Models\AdmissionApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with(['program', 'session', 'application'])->latest()->get();
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        $programs     = Program::orderBy('name')->get();
        $sessions     = AcademicSession::orderBy('start_date', 'desc')->get();
        $applications = AdmissionApplication::orderBy('id', 'desc')->get();
        return view('admin.students.create', compact('programs', 'sessions', 'applications'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateStudent($request);

        if ($request->hasFile('profile_image')) {
            $name = time() . '.' . $request->file('profile_image')->getClientOriginalExtension();
            $request->file('profile_image')->move(public_path('students'), $name);
            $validated['profile_image'] = $name;
        }

        Student::create($validated);

        return redirect()->route('admin.students.index')
            ->with('success', 'Student added successfully.');
    }

    public function edit($id)
    {
        $student      = Student::findOrFail($id);
        $programs     = Program::orderBy('name')->get();
        $sessions     = AcademicSession::orderBy('start_date', 'desc')->get();
        $applications = AdmissionApplication::orderBy('id', 'desc')->get();
        return view('admin.students.edit', compact('student', 'programs', 'sessions', 'applications'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $validated = $this->validateStudent($request, $id);

        if ($request->hasFile('profile_image')) {
            if ($student->profile_image && File::exists(public_path('students/' . $student->profile_image))) {
                File::delete(public_path('students/' . $student->profile_image));
            }
            $name = time() . '.' . $request->file('profile_image')->getClientOriginalExtension();
            $request->file('profile_image')->move(public_path('students'), $name);
            $validated['profile_image'] = $name;
        }

        $student->update($validated);

        return redirect()->route('admin.students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        Student::findOrFail($id)->delete();
        return redirect()->route('admin.students.index')
            ->with('success', 'Student deleted successfully.');
    }

    private function validateStudent(Request $request, $id = null): array
    {
        $idSuffix = $id ? ',' . $id : '';

        return $request->validate([
            'registration_number'      => 'required|string|max:30|unique:students,registration_number' . $idSuffix,
            'roll_number'              => 'nullable|string|max:30',
            'first_name'               => 'required|string|max:80',
            'last_name'                => 'required|string|max:80',
            'father_name'              => 'nullable|string|max:150',
            'email'                    => 'required|email|max:150|unique:students,email' . $idSuffix,
            'phone'                    => 'nullable|string|max:20',
            'cnic'                     => 'nullable|string|max:20|unique:students,cnic' . $idSuffix,
            'date_of_birth'            => 'nullable|date',
            'gender'                   => 'nullable|in:male,female,other',
            'address'                  => 'nullable|string',
            'city'                     => 'nullable|string|max:80',
            'province'                 => 'nullable|string|max:80',
            'profile_image'            => 'nullable|image|max:2048',
            'program_id'               => 'required|exists:programs,id',
            'admission_session_id'     => 'required|exists:academic_sessions,id',
            'current_semester'         => 'nullable|integer|min:1|max:20',
            'enrollment_date'          => 'required|date',
            'status'                   => 'required|in:active,inactive,graduated,dropped,suspended,on_leave',
            'admission_application_id' => 'nullable|exists:admission_applications,id',
        ]);
    }
}
