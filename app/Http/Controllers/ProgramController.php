<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Department;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
 public function index()
{
    $programs = Program::with('department')->get();
    return view('admin.programs.index', compact('programs'));
}
   public function create()
{
    $departments = Department::all();
    return view('admin.programs.create', compact('departments'));
}

 public function store(Request $request)
{
    $request->validate([
        'program_code' => 'required',
        'program_name' => 'required',
        'department_id' => 'required|exists:departments,id'
    ]);

    Program::create([
        'program_code' => $request->program_code,
        'program_name' => $request->program_name,
        'department_id' => $request->department_id,
    ]);

    return redirect()->route('programs.index')
        ->with('success', 'Program created successfully');
}

    public function edit(Program $program)
    {
        $departments = Department::all();
        return view('admin.programs.edit', compact('program', 'departments'));
    }

    public function update(Request $request, Program $program)
    {
        $request->validate([
            'program_code' => 'required',
            'program_name' => 'required',
            'department_id' => 'required'
        ]);

        $program->update($request->all());

        return redirect()->route('programs.index')
            ->with('success', 'Program updated successfully');
    }

    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->route('programs.index')
            ->with('success', 'Program deleted successfully');
    }
    public function delete(Program $program)
{
    return view('admin.programs.delete', compact('program'));
}
}