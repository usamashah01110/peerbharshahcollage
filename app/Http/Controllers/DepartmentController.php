<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // Show all
    public function index()
    {
        $departments = Department::all();
        return view('admin.departments.index', compact('departments'));
    }

    // Create form
    public function create()
    {
        return view('admin.departments.create');
    }

    // Store data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Department::create($request->all());

        return redirect()->route('admin.departments.index')->with('success', 'Department Added');
    }

    // Edit form
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('admin.departments.edit', compact('department'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $department = Department::findOrFail($id);
        $department->update($request->all());

        return redirect()->route('admin.departments.index')->with('success', 'Updated Successfully');
    }

    // Delete
    public function destroy($id)
    {
        Department::destroy($id);
        return redirect()->route('admin.departments.index')->with('success', 'Deleted Successfully');
    }
}