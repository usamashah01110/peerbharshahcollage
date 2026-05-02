<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;
use App\Models\ScholarshipApplication;
use App\Models\Student;

class ScholarshipApplicationController extends Controller
{
   public function index()
{
    $applications = ScholarshipApplication::with(['student','scholarship'])->get();

    return view('admin.scholarship_applications.index', compact('applications'));
}

    public function create()
    {
        $scholarships = Scholarship::all();
        $students = Student::all();

      return view('admin.scholarship_applications.create', compact('scholarships','students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'scholarship_id' => 'required',
            'document' => 'required|file',
        ]);

        $file = $request->file('document')->store('documents');

        ScholarshipApplication::create([
            'student_id' => $request->student_id,
            'scholarship_id' => $request->scholarship_id,
            'document_path' => $file,
            'status' => 'pending',
            'applied_at' => now()
        ]);

        return redirect()->route('scholarships.index')->with('success','Applied Successfully');
    }

    public function destroy($id)
    {
        ScholarshipApplication::findOrFail($id)->delete();
        return redirect()->back()->with('success','Deleted');
    }
}