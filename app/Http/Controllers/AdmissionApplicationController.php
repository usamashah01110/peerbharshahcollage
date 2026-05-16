<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdmissionApplication;
use App\Models\Program;
use App\Models\AcademicSession;

class AdmissionApplicationController extends Controller
{
    public function index()
    {
        $applications = AdmissionApplication::with([
                'program',
                'session'
            ])
            ->orderBy('id', 'desc')
            ->get();

        return view(
            'admin.admissionapplications.index',
            compact('applications')
        );
    }

    public function create()
    {
        $programs = Program::all();

        $sessions = AcademicSession::all();

        return view(
            'admin.admissionapplications.create',
            compact('programs', 'sessions')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'application_number' => 'required|unique:admission_applications',

            'applied_program_id' => 'required|exists:programs,id',

            'session_id' => 'required|exists:academic_sessions,id',

            'first_name' => 'required|max:80',

            'last_name' => 'required|max:80',

            'father_name' => 'required|max:150',

            'cnic' => 'required|max:20',

            'date_of_birth' => 'required|date',

            'gender' => 'required',

            'email' => 'required|email',

            'phone' => 'required|max:20',

            'present_address' => 'required',

            'city' => 'required|max:80',

            'province' => 'required|max:80',

            'guardian_name' => 'required|max:150',

            'guardian_relation' => 'required|max:50',
        ]);

        AdmissionApplication::create($request->all());

        return redirect()
            ->route('admin.admissionapplications.index')
            ->with(
                'success',
                'Application Created Successfully'
            );
    }

    public function edit($id)
    {
        $application = AdmissionApplication::findOrFail($id);

        $programs = Program::all();

        $sessions = AcademicSession::all();

        return view(
            'admin.admissionapplications.edit',
            compact(
                'application',
                'programs',
                'sessions'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $application = AdmissionApplication::findOrFail($id);

        $request->validate([

            'application_number' =>
                'required|unique:admission_applications,application_number,' . $id,

            'applied_program_id' => 'required',

            'session_id' => 'required',

            'first_name' => 'required',

            'last_name' => 'required',

            'father_name' => 'required',

            'cnic' => 'required',

            'date_of_birth' => 'required',

            'gender' => 'required',

            'email' => 'required|email',

            'phone' => 'required',

            'present_address' => 'required',

            'city' => 'required',

            'province' => 'required',

            'guardian_name' => 'required',

            'guardian_relation' => 'required',
        ]);

        $application->update($request->all());

        return redirect()
            ->route('admin.admissionapplications.index')
            ->with(
                'success',
                'Application Updated Successfully'
            );
    }

    public function destroy($id)
    {
        $application = AdmissionApplication::findOrFail($id);

        $application->delete();

        return redirect()
            ->route('admin.admissionapplications.index')
            ->with(
                'success',
                'Application Deleted Successfully'
            );
    }
}