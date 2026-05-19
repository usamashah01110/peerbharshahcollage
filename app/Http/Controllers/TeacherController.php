<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Department;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('department')->latest()->get();
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        $departments = Department::orderBy('name')->get();
        return view('admin.teachers.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id'    => 'required|string|max:30|unique:teachers,employee_id',
            'first_name'     => 'required|string|max:80',
            'last_name'      => 'required|string|max:80',
            'email'          => 'required|email|max:150|unique:teachers,email',
            'phone'          => 'nullable|string|max:20',
            'cnic'           => 'nullable|string|max:20|unique:teachers,cnic',
            'gender'         => 'nullable|in:male,female,other',
            'date_of_birth'  => 'nullable|date',
            'department_id'  => 'required|exists:departments,id',
            'designation'    => 'required|in:professor,associate_professor,assistant_professor,lecturer,instructor,visiting',
            'qualification'  => 'nullable|string|max:200',
            'specialisation' => 'nullable|string|max:200',
            'joining_date'   => 'nullable|date',
            'bio'            => 'nullable|string',
            'status'         => 'required|in:active,inactive,on_leave,retired',
            'profile_image'  => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $name = time() . '.' . $request->file('profile_image')->getClientOriginalExtension();
            $request->file('profile_image')->move(public_path('teachers'), $name);
            $validated['profile_image'] = $name;
        }

        Teacher::create($validated);

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Teacher added successfully.');
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $departments = Department::orderBy('name')->get();
        return view('admin.teachers.edit', compact('teacher', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validated = $request->validate([
            'employee_id'    => 'required|string|max:30|unique:teachers,employee_id,' . $id,
            'first_name'     => 'required|string|max:80',
            'last_name'      => 'required|string|max:80',
            'email'          => 'required|email|max:150|unique:teachers,email,' . $id,
            'phone'          => 'nullable|string|max:20',
            'cnic'           => 'nullable|string|max:20|unique:teachers,cnic,' . $id,
            'gender'         => 'nullable|in:male,female,other',
            'date_of_birth'  => 'nullable|date',
            'department_id'  => 'required|exists:departments,id',
            'designation'    => 'required|in:professor,associate_professor,assistant_professor,lecturer,instructor,visiting',
            'qualification'  => 'nullable|string|max:200',
            'specialisation' => 'nullable|string|max:200',
            'joining_date'   => 'nullable|date',
            'bio'            => 'nullable|string',
            'status'         => 'required|in:active,inactive,on_leave,retired',
            'profile_image'  => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $name = time() . '.' . $request->file('profile_image')->getClientOriginalExtension();
            $request->file('profile_image')->move(public_path('teachers'), $name);
            $validated['profile_image'] = $name;
        }

        $teacher->update($validated);

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Teacher updated successfully.');
    }

    public function destroy($id)
    {
        Teacher::findOrFail($id)->delete();
        return redirect()->route('admin.teachers.index')
            ->with('success', 'Teacher deleted successfully.');
    }
}
