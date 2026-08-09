<?php

namespace App\Http\Controllers;

use App\Models\ApplicationQualification;
use App\Models\AdmissionApplication;
use Illuminate\Http\Request;

class ApplicationQualificationController extends Controller
{
    public function index()
    {
        $qualifications = ApplicationQualification::with('application')->latest('id')->get();
        return view('admin.application_qualifications.index', compact('qualifications'));
    }

    public function create(Request $request)
    {
        $applications = AdmissionApplication::orderBy('id', 'desc')->get();
        $selectedApplicationId = $request->query('application_id');
        return view('admin.application_qualifications.create', compact('applications', 'selectedApplicationId'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'application_id'   => 'required|exists:admission_applications,id',
            'level'            => 'required|in:matric,o_level,intermediate,a_level,bachelor,master,other',
            'institution'      => 'required|string|max:200',
            'board_university' => 'required|string|max:150',
            'passing_year'     => 'required|digits:4|integer|min:1950|max:' . (date('Y') + 1),
            'obtained_marks'   => 'required|numeric|min:0',
            'total_marks'      => 'required|numeric|min:1',
            'percentage'       => 'required|numeric|min:0|max:100',
            'grade'            => 'nullable|string|max:10',
            'major_subjects'   => 'nullable|string|max:255',
        ]);

        ApplicationQualification::create($validated);

        return redirect()->route('admin.application-qualifications.index')
            ->with('success', 'Qualification added successfully.');
    }

    public function edit($id)
    {
        $qualification = ApplicationQualification::findOrFail($id);
        $applications  = AdmissionApplication::orderBy('id', 'desc')->get();
        return view('admin.application_qualifications.edit', compact('qualification', 'applications'));
    }

    public function update(Request $request, $id)
    {
        $qualification = ApplicationQualification::findOrFail($id);

        $validated = $request->validate([
            'application_id'   => 'required|exists:admission_applications,id',
            'level'            => 'required|in:matric,o_level,intermediate,a_level,bachelor,master,other',
            'institution'      => 'required|string|max:200',
            'board_university' => 'required|string|max:150',
            'passing_year'     => 'required|digits:4|integer|min:1950|max:' . (date('Y') + 1),
            'obtained_marks'   => 'required|numeric|min:0',
            'total_marks'      => 'required|numeric|min:1',
            'percentage'       => 'required|numeric|min:0|max:100',
            'grade'            => 'nullable|string|max:10',
            'major_subjects'   => 'nullable|string|max:255',
        ]);

        $qualification->update($validated);

        return redirect()->route('admin.application-qualifications.index')
            ->with('success', 'Qualification updated successfully.');
    }

    public function destroy($id)
    {
        ApplicationQualification::findOrFail($id)->delete();
        return redirect()->route('admin.application-qualifications.index')
            ->with('success', 'Qualification deleted successfully.');
    }
}
