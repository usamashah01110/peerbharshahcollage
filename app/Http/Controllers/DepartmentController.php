<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
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
    public function store(StoreDepartmentRequest  $request)
    {
        $validated = $request->validated();
        $validated['code'] = strtoupper($validated['code']);

        Department::create($validated);

        return redirect()
            ->route('admin.departments.index')
            ->with('success', 'Department created successfully.');
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
        $department = Department::findOrFail($id);

        $validated = $request->validate([
            'name'             => 'required|string|min:2|max:150',
            'code'             => 'required|string|min:2|max:20|regex:/^[A-Za-z0-9\-_]+$/|unique:departments,code,' . $department->id,
            'description'      => 'nullable|string|max:1000',
            'hod_id'           => 'nullable|integer|exists:users,id',
            'established_date' => 'nullable|date|before_or_equal:today',
            'is_active'        => 'required|boolean',
        ]);

        $validated['code'] = strtoupper($validated['code']);

        $department->update($validated);

        return redirect()
            ->route('admin.departments.index')
            ->with('success', 'Department updated successfully.');
    }

    // Delete
    public function destroy($id)
    {
        Department::destroy($id);
        return redirect()->route('admin.departments.index')->with('success', 'Deleted Successfully');
    }
}
