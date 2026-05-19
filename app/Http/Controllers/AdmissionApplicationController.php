<?php

namespace App\Http\Controllers;

use App\Models\AdmissionApplication;
use App\Models\Program;
use App\Models\AcademicSession;
use App\Models\Student;
use Illuminate\Http\Request;

class AdmissionApplicationController extends Controller
{
    public function index()
    {
        $applications = AdmissionApplication::with(['program', 'session', 'student'])->latest()->get();
        return view('admin.admission_applications.index', compact('applications'));
    }

    public function create()
    {
        $programs = Program::orderBy('name')->get();
        $sessions = AcademicSession::orderBy('start_date', 'desc')->get();
        $students = Student::orderBy('first_name')->get();
        return view('admin.admission_applications.create', compact('programs', 'sessions', 'students'));
    }

    public function show($id)
    {
        $application = AdmissionApplication::with(['program', 'session', 'student', 'qualifications', 'documents'])->findOrFail($id);
        return view('admin.admission_applications.show', compact('application'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateApplication($request);
        AdmissionApplication::create($validated);

        return redirect()->route('admin.admission-applications.index')
            ->with('success', 'Application created successfully.');
    }

    public function edit($id)
    {
        $application = AdmissionApplication::findOrFail($id);
        $programs    = Program::orderBy('name')->get();
        $sessions    = AcademicSession::orderBy('start_date', 'desc')->get();
        $students    = Student::orderBy('first_name')->get();
        return view('admin.admission_applications.edit', compact('application', 'programs', 'sessions', 'students'));
    }

    public function update(Request $request, $id)
    {
        $application = AdmissionApplication::findOrFail($id);
        $validated = $this->validateApplication($request, $id);
        $application->update($validated);

        return redirect()->route('admin.admission-applications.index')
            ->with('success', 'Application updated successfully.');
    }

    public function destroy($id)
    {
        AdmissionApplication::findOrFail($id)->delete();
        return redirect()->route('admin.admission-applications.index')
            ->with('success', 'Application deleted successfully.');
    }

    private function validateApplication(Request $request, $id = null): array
    {
        $unique = 'unique:admission_applications,application_number' . ($id ? ',' . $id : '');

        return $request->validate([
            'application_number'      => 'required|string|max:30|' . $unique,
            'applied_program_id'      => 'required|exists:programs,id',
            'session_id'              => 'required|exists:academic_sessions,id',
            'first_name'              => 'required|string|max:80',
            'last_name'               => 'required|string|max:80',
            'father_name'             => 'required|string|max:150',
            'mother_name'             => 'nullable|string|max:150',
            'cnic'                    => 'required|string|max:20',
            'date_of_birth'           => 'required|date',
            'gender'                  => 'required|in:male,female,other',
            'nationality'             => 'nullable|string|max:50',
            'religion'                => 'nullable|string|max:50',
            'marital_status'          => 'nullable|in:single,married,divorced,widowed',
            'email'                   => 'required|email|max:150',
            'phone'                   => 'required|string|max:20',
            'alternate_phone'         => 'nullable|string|max:20',
            'present_address'         => 'required|string',
            'permanent_address'       => 'nullable|string',
            'city'                    => 'required|string|max:80',
            'province'                => 'required|string|max:80',
            'postal_code'             => 'nullable|string|max:15',
            'guardian_name'           => 'required|string|max:150',
            'guardian_relation'       => 'required|string|max:50',
            'guardian_cnic'           => 'nullable|string|max:20',
            'guardian_phone'          => 'nullable|string|max:20',
            'guardian_occupation'     => 'nullable|string|max:100',
            'guardian_monthly_income' => 'nullable|numeric|min:0',
            'emergency_contact_name'  => 'nullable|string|max:150',
            'emergency_contact_phone' => 'nullable|string|max:20',
            'status'                  => 'required|in:draft,submitted,under_review,shortlisted,admitted,rejected,waitlisted,withdrawn',
            'test_score'              => 'nullable|numeric|min:0|max:100',
            'interview_score'         => 'nullable|numeric|min:0|max:100',
            'merit_score'             => 'nullable|numeric|min:0|max:100',
            'review_notes'            => 'nullable|string',
            'student_id'              => 'nullable|exists:students,id',
        ]);
    }
}
