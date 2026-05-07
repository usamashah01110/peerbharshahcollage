<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Department;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // Show all teachers
    public function index()
    {
        $teachers = Teacher::with('department')->get();
        return view('admin.teachers.index', compact('teachers'));
    }

    // Create form
    public function create()
    {
        $departments = Department::all();
        return view('admin.teachers.create', compact('departments'));
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'department_id' => 'required'
        ]);

        Teacher::create($request->all());

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher Added');
    }

    // Edit
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $departments = Department::all();

        return view('admin.teachers.edit', compact('teacher', 'departments'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'department_id' => 'required'
        ]);

        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());

        return redirect()->route('admin.teachers.index')->with('success', 'Updated Successfully');
    }

    // Delete
    public function destroy($id)
    {
        Teacher::destroy($id);
        return redirect()->route('admin.teachers.index')->with('success', 'Deleted Successfully');
    }
}