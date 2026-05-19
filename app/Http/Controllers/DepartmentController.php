<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::with('hod')->latest()->get();
        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        $teachers = Teacher::orderBy('first_name')->get();
        return view('admin.departments.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:150',
            'code'             => 'required|string|max:20|unique:departments,code',
            'description'      => 'nullable|string',
            'hod_id'           => 'nullable|exists:teachers,id',
            'established_date' => 'nullable|date',
            'is_active'        => 'required|boolean',
        ]);

        $validated['code'] = strtoupper($validated['code']);
        Department::create($validated);

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department created successfully.');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        $teachers = Teacher::orderBy('first_name')->get();
        return view('admin.departments.edit', compact('department', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        $validated = $request->validate([
            'name'             => 'required|string|max:150',
            'code'             => 'required|string|max:20|unique:departments,code,' . $department->id,
            'description'      => 'nullable|string',
            'hod_id'           => 'nullable|exists:teachers,id',
            'established_date' => 'nullable|date',
            'is_active'        => 'required|boolean',
        ]);

        $validated['code'] = strtoupper($validated['code']);
        $department->update($validated);

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department updated successfully.');
    }

    public function destroy($id)
    {
        Department::findOrFail($id)->delete();
        return redirect()->route('admin.departments.index')
            ->with('success', 'Department deleted successfully.');
    }
}
