<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Department;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::with('department')->latest()->get();
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        $departments = Department::orderBy('name')->get();
        return view('admin.programs.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'department_id'      => 'required|exists:departments,id',
            'name'               => 'required|string|max:150',
            'code'               => 'required|string|max:20|unique:programs,code',
            'degree_level'       => 'required|in:intermediate,bachelor,master,mphil,phd,diploma,certificate',
            'total_semesters'    => 'required|integer|min:1|max:20',
            'duration_years'     => 'required|numeric|min:0.5|max:10',
            'total_credit_hours' => 'nullable|integer|min:0',
            'description'        => 'nullable|string',
            'fee_per_semester'   => 'nullable|numeric|min:0',
            'is_active'          => 'required|boolean',
        ]);

        Program::create($validated);

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program added successfully.');
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        $departments = Department::orderBy('name')->get();
        return view('admin.programs.edit', compact('program', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $validated = $request->validate([
            'department_id'      => 'required|exists:departments,id',
            'name'               => 'required|string|max:150',
            'code'               => 'required|string|max:20|unique:programs,code,' . $id,
            'degree_level'       => 'required|in:intermediate,bachelor,master,mphil,phd,diploma,certificate',
            'total_semesters'    => 'required|integer|min:1|max:20',
            'duration_years'     => 'required|numeric|min:0.5|max:10',
            'total_credit_hours' => 'nullable|integer|min:0',
            'description'        => 'nullable|string',
            'fee_per_semester'   => 'nullable|numeric|min:0',
            'is_active'          => 'required|boolean',
        ]);

        $program->update($validated);

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program updated successfully.');
    }

    public function destroy($id)
    {
        Program::findOrFail($id)->delete();
        return redirect()->route('admin.programs.index')
            ->with('success', 'Program deleted successfully.');
    }
}
