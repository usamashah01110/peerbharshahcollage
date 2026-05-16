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

    // Store teacher
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|unique:teachers',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:teachers',
            'department_id' => 'required',
            'designation' => 'required',
            'status' => 'required',
        ]);

        Teacher::create($request->all());

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Teacher Added Successfully');
    }

    // Edit form
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);

        $departments = Department::all();

        return view(
            'admin.teachers.edit',
            compact('teacher', 'departments')
        );
    }

    // Update teacher
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $request->validate([
            'employee_id' => 'required|unique:teachers,employee_id,' . $id,
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:teachers,email,' . $id,
            'department_id' => 'required',
        ]);

        $teacher->update($request->all());

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Teacher Updated Successfully');
    }

    // Delete teacher
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);

        $teacher->delete();

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Teacher Deleted Successfully');
    }
}