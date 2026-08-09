<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipApplication;
use App\Models\Scholarship;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ScholarshipApplicationController extends Controller
{
    public function index()
    {
        $applications = ScholarshipApplication::with(['student', 'scholarship'])->latest()->get();
        return view('admin.scholarship_applications.index', compact('applications'));
    }

    public function create()
    {
        $scholarships = Scholarship::orderBy('name')->get();
        $students     = Student::orderBy('first_name')->get();
        return view('admin.scholarship_applications.create', compact('scholarships', 'students'));
    }

    public function show($id)
    {
        $application = ScholarshipApplication::with(['student', 'scholarship', 'documents'])->findOrFail($id);
        return view('admin.scholarship_applications.show', compact('application'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateApplication($request);
        ScholarshipApplication::create($validated);

        return redirect()->route('admin.scholarship-applications.index')
            ->with('success', 'Scholarship application created.');
    }

    public function edit($id)
    {
        $application  = ScholarshipApplication::findOrFail($id);
        $scholarships = Scholarship::orderBy('name')->get();
        $students     = Student::orderBy('first_name')->get();
        return view('admin.scholarship_applications.edit', compact('application', 'scholarships', 'students'));
    }

    public function update(Request $request, $id)
    {
        $application = ScholarshipApplication::findOrFail($id);
        $validated = $this->validateApplication($request, $id);
        $application->update($validated);

        return redirect()->route('admin.scholarship-applications.index')
            ->with('success', 'Scholarship application updated.');
    }

    public function destroy($id)
    {
        ScholarshipApplication::findOrFail($id)->delete();
        return redirect()->route('admin.scholarship-applications.index')
            ->with('success', 'Scholarship application deleted.');
    }

    private function validateApplication(Request $request, $id = null): array
    {
        $unique = 'unique:scholarship_applications,application_number' . ($id ? ',' . $id : '');

        return $request->validate([
            'application_number'    => 'required|string|max:30|' . $unique,
            'scholarship_id'        => [
                'required', 'exists:scholarships,id',
                Rule::unique('scholarship_applications')
                    ->where(fn ($q) => $q->where('student_id', $request->student_id))
                    ->ignore($id),
            ],
            'student_id'            => 'required|exists:students,id',
            'family_monthly_income' => 'nullable|numeric|min:0',
            'father_occupation'     => 'nullable|string|max:150',
            'number_of_dependents'  => 'nullable|integer|min:0|max:50',
            'other_scholarships'    => 'nullable|string|max:255',
            'current_cgpa'          => 'nullable|numeric|min:0|max:4',
            'current_semester'      => 'nullable|integer|min:1|max:20',
            'reason_for_applying'   => 'nullable|string',
            'achievements'          => 'nullable|string',
            'status'                => 'required|in:draft,submitted,under_review,approved,rejected,awarded,withdrawn',
            'awarded_amount'        => 'nullable|numeric|min:0',
            'awarded_percentage'    => 'nullable|numeric|min:0|max:100',
            'review_notes'          => 'nullable|string',
        ]);
    }
}
