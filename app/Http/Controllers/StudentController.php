<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Program;
use App\Models\AcademicSession;
use App\Models\AdmissionApplication;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with([
            'program',
            'session',
            'application'
        ])->latest()->get();

        return view(
            'admin.students.index',
            compact('students')
        );
    }

    public function create()
    {
        $programs = Program::all();

        $sessions = AcademicSession::all();

        $applications = AdmissionApplication::all();

        return view(
            'admin.students.create',
            compact(
                'programs',
                'sessions',
                'applications'
            )
        );
    }

    public function store(Request $request)
{
    $request->validate([
        'registration_number' => 'required|unique:students',
        'email' => 'required|email|unique:students',
        'cnic' => 'nullable|unique:students',
        'first_name' => 'required',
        'last_name' => 'required',
        'program_id' => 'required|exists:programs,id',
        'admission_session_id' => 'required|exists:academic_sessions,id',
        'enrollment_date' => 'required|date',
    ]);

    $imageName = null;

    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('students'), $imageName);
    }

    Student::create([
        'registration_number' => $request->registration_number,
        'roll_number' => $request->roll_number,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'father_name' => $request->father_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'cnic' => $request->cnic,
        'date_of_birth' => $request->date_of_birth,
        'gender' => $request->gender,
        'address' => $request->address,
        'city' => $request->city,
        'province' => $request->province,
        'profile_image' => $imageName,
        'program_id' => $request->program_id,
        'admission_session_id' => $request->admission_session_id,
        'current_semester' => $request->current_semester,
        'enrollment_date' => $request->enrollment_date,
        'status' => $request->status,
        'admission_application_id' => $request->admission_application_id,
    ]);

    return redirect()->route('admin.students.index')
        ->with('success', 'Student Added Successfully');
}

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        $programs = Program::all();

        $sessions = AcademicSession::all();

        $applications = AdmissionApplication::all();

        return view(
            'admin.students.edit',
            compact(
                'student',
                'programs',
                'sessions',
                'applications'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([

            'registration_number' =>
                'required|unique:students,registration_number,' . $id,

            'email' =>
                'required|email|unique:students,email,' . $id,

            'cnic' =>
                'nullable|unique:students,cnic,' . $id,
        ]);

        $imageName = $student->profile_image;

        if ($request->hasFile('profile_image')) {

            $image = $request->file('profile_image');

            $imageName =
                time() . '.' .
                $image->getClientOriginalExtension();

            $image->move(
                public_path('students'),
                $imageName
            );
        }

        $student->update([

            'registration_number' =>
                $request->registration_number,

            'roll_number' =>
                $request->roll_number,

            'first_name' =>
                $request->first_name,

            'last_name' =>
                $request->last_name,

            'father_name' =>
                $request->father_name,

            'email' =>
                $request->email,

            'phone' =>
                $request->phone,

            'cnic' =>
                $request->cnic,

            'date_of_birth' =>
                $request->date_of_birth,

            'gender' =>
                $request->gender,

            'address' =>
                $request->address,

            'city' =>
                $request->city,

            'province' =>
                $request->province,

            'profile_image' =>
                $imageName,

            'program_id' =>
                $request->program_id,

            'admission_session_id' =>
                $request->admission_session_id,

            'current_semester' =>
                $request->current_semester,

            'enrollment_date' =>
                $request->enrollment_date,

            'status' =>
                $request->status,

            'admission_application_id' =>
                $request->admission_application_id,
        ]);

        return redirect()
            ->route('admin.students.index')
            ->with(
                'success',
                'Student Updated Successfully'
            );
    }

    public function destroy($id)
    {
        Student::findOrFail($id)->delete();

        return redirect()
            ->route('admin.students.index')
            ->with(
                'success',
                'Deleted Successfully'
            );
    }
}