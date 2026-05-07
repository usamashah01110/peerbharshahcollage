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
        $admissions = Admission::with(['student','program'])->get();
        return view('admin.admissions.index', compact('admissions'));
    }

    public function create()
    {
        $students = Student::all();
        $programs = Program::all();

        return view('admin.admissions.create', compact('students','programs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'program_id' => 'required',
            'admission_date' => 'required|date',
            'status' => 'required'
        ]);

        Admission::create($request->all());

        return redirect()->route('admin.admissions.index')
            ->with('success','Admission Created');
    }

    public function edit(Admission $admission)
    {
        $students = Student::all();
        $programs = Program::all();

        return view('admin.admissions.edit', compact('admission','students','programs'));
    }

    public function update(Request $request, Admission $admission)
    {
        $request->validate([
            'student_id' => 'required',
            'program_id' => 'required',
            'admission_date' => 'required|date',
            'status' => 'required'
        ]);

        $admission->update($request->all());

        return redirect()->route('admin.admissions.index')
            ->with('success','Updated Successfully');
    }

    public function destroy(Admission $admission)
    {
        $admission->delete();

        return redirect()->route('admin.admissions.index')
            ->with('success','Deleted Successfully');
    }
}