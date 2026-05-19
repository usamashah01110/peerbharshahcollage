<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::with('program')->orderBy('program_id')->orderBy('semester_number')->get();
        return view('admin.semesters.index', compact('semesters'));
    }

    public function create()
    {
        $programs = Program::orderBy('name')->get();
        return view('admin.semesters.create', compact('programs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_id'      => 'required|exists:programs,id',
            'semester_number' => [
                'required', 'integer', 'min:1', 'max:20',
                Rule::unique('semesters')->where(fn ($q) => $q->where('program_id', $request->program_id)),
            ],
            'name'            => 'required|string|max:50',
        ]);

        Semester::create($validated);

        return redirect()->route('admin.semesters.index')
            ->with('success', 'Semester added successfully.');
    }

    public function edit($id)
    {
        $semester = Semester::findOrFail($id);
        $programs = Program::orderBy('name')->get();
        return view('admin.semesters.edit', compact('semester', 'programs'));
    }

    public function update(Request $request, $id)
    {
        $semester = Semester::findOrFail($id);

        $validated = $request->validate([
            'program_id'      => 'required|exists:programs,id',
            'semester_number' => [
                'required', 'integer', 'min:1', 'max:20',
                Rule::unique('semesters')->where(fn ($q) => $q->where('program_id', $request->program_id))->ignore($id),
            ],
            'name'            => 'required|string|max:50',
        ]);

        $semester->update($validated);

        return redirect()->route('admin.semesters.index')
            ->with('success', 'Semester updated successfully.');
    }

    public function destroy($id)
    {
        Semester::findOrFail($id)->delete();
        return redirect()->route('admin.semesters.index')
            ->with('success', 'Semester deleted successfully.');
    }
}
