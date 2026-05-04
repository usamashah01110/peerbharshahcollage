<?php

namespace App\Http\Controllers;

use App\Models\CourseOutline;
use App\Models\Program;
use Illuminate\Http\Request;

class CourseOutlineController extends Controller
{
    public function index()
{
    $outlines = CourseOutline::with('program')->get();
    return view('admin.course_outlines.index', compact('outlines'));
}

public function create()
{
    $programs = Program::all();
    return view('admin.course_outlines.create', compact('programs'));
}

    public function store(Request $request)
    {
        $data = $request->validate([
            'program_id' => 'required|unique:course_outlines',
            'description' => 'nullable',
            'objectives' => 'nullable',
            'topics' => 'nullable',
            'file' => 'nullable|file'
        ]);

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('uploads', 'public');
        }

        CourseOutline::create($data);

        return redirect()->route('course_outlines.index')->with('success', 'Created');
    }

    public function edit($id)
    {
        $outline = CourseOutline::findOrFail($id);
        $programs = Program::all();

        return view('course_outlines.edit', compact('outline', 'programs'));
    }

    public function update(Request $request, $id)
    {
        $outline = CourseOutline::findOrFail($id);

        $data = $request->validate([
            'program_id' => 'required|unique:course_outlines,program_id,' . $id,
            'description' => 'nullable',
            'objectives' => 'nullable',
            'topics' => 'nullable',
            'file' => 'nullable|file'
        ]);

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('uploads', 'public');
        }

        $outline->update($data);

        return redirect()->route('course_outlines.index')->with('success', 'Updated');
    }

    public function destroy($id)
    {
        CourseOutline::findOrFail($id)->delete();
        return redirect()->route('course_outlines.index')->with('success', 'Deleted');
    }
}