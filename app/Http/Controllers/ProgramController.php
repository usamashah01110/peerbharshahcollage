<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Department;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    // Show all programs
    public function index()
    {
        $programs = Program::with('department')->get();

        return view('admin.programs.index', compact('programs'));
    }

    // Create form
    public function create()
    {
        $departments = Department::all();

        return view('admin.programs.create', compact('departments'));
    }

    // Store program
    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required',
            'code' => 'required|unique:programs',
            'name' => 'required',
            'degree_level' => 'required',
            'total_semesters' => 'required|numeric',
            'duration_years' => 'required|numeric',
        ]);

        Program::create($request->all());

        return redirect()
            ->route('admin.programs.index')
            ->with('success', 'Program Added Successfully');
    }

    // Edit form
    public function edit($id)
    {
        $program = Program::findOrFail($id);

        $departments = Department::all();

        return view(
            'admin.programs.edit',
            compact('program', 'departments')
        );
    }

    // Update program
    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $request->validate([
            'department_id' => 'required',
            'code' => 'required|unique:programs,code,' . $id,
            'name' => 'required',
            'degree_level' => 'required',
            'total_semesters' => 'required|numeric',
            'duration_years' => 'required|numeric',
        ]);

        $program->update($request->all());

        return redirect()
            ->route('admin.programs.index')
            ->with('success', 'Program Updated Successfully');
    }

    // Delete program
    public function destroy($id)
    {
        $program = Program::findOrFail($id);

        $program->delete();

        return redirect()
            ->route('admin.programs.index')
            ->with('success', 'Program Deleted Successfully');
    }
}