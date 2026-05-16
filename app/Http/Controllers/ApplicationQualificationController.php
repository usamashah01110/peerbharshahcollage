<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationQualification;
use App\Models\AdmissionApplication;

class ApplicationQualificationController extends Controller
{
    /**
     * Display listing
     */
 public function index()
{
    $qualifications = ApplicationQualification::with('application')
                        ->orderBy('id', 'desc')
                        ->get();

    return view(
        'admin.applicationqualifications.index',
        compact('qualifications')
    );
}

    /**
     * Show create form
     */
    public function create()
    {
        $applications = AdmissionApplication::all();

        return view(
            'admin.applicationqualifications.create',
            compact('applications')
        );
    }

    /**
     * Store data
     */
    public function store(Request $request)
    {
        $request->validate([
            'application_id'   => 'required|exists:admission_applications,id',
            'level'            => 'required',
            'institution'      => 'required|max:200',
            'board_university' => 'required|max:150',
            'passing_year'     => 'required|digits:4',
            'obtained_marks'   => 'required|numeric',
            'total_marks'      => 'required|numeric',
            'percentage'       => 'required|numeric',
            'grade'            => 'nullable|max:10',
            'major_subjects'   => 'nullable|max:255',
        ]);

        ApplicationQualification::create([
            'application_id'   => $request->application_id,
            'level'            => $request->level,
            'institution'      => $request->institution,
            'board_university' => $request->board_university,
            'passing_year'     => $request->passing_year,
            'obtained_marks'   => $request->obtained_marks,
            'total_marks'      => $request->total_marks,
            'percentage'       => $request->percentage,
            'grade'            => $request->grade,
            'major_subjects'   => $request->major_subjects,
        ]);

        return redirect()
            ->route('admin.applicationqualifications.index')
            ->with('success', 'Qualification Added Successfully');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $qualification = ApplicationQualification::findOrFail($id);

        $applications = AdmissionApplication::all();

        return view(
            'admin.applicationqualifications.edit',
            compact('qualification', 'applications')
        );
    }

    /**
     * Update data
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'application_id'   => 'required|exists:admission_applications,id',
            'level'            => 'required',
            'institution'      => 'required|max:200',
            'board_university' => 'required|max:150',
            'passing_year'     => 'required|digits:4',
            'obtained_marks'   => 'required|numeric',
            'total_marks'      => 'required|numeric',
            'percentage'       => 'required|numeric',
            'grade'            => 'nullable|max:10',
            'major_subjects'   => 'nullable|max:255',
        ]);

        $qualification = ApplicationQualification::findOrFail($id);

        $qualification->update([
            'application_id'   => $request->application_id,
            'level'            => $request->level,
            'institution'      => $request->institution,
            'board_university' => $request->board_university,
            'passing_year'     => $request->passing_year,
            'obtained_marks'   => $request->obtained_marks,
            'total_marks'      => $request->total_marks,
            'percentage'       => $request->percentage,
            'grade'            => $request->grade,
            'major_subjects'   => $request->major_subjects,
        ]);

        return redirect()
            ->route('admin.applicationqualifications.index')
            ->with('success', 'Qualification Updated Successfully');
    }

    /**
     * Delete data
     */
    public function destroy($id)
    {
        $qualification = ApplicationQualification::findOrFail($id);

        $qualification->delete();

        return redirect()
            ->route('admin.applicationqualifications.index')
            ->with('success', 'Qualification Deleted Successfully');
    }
}