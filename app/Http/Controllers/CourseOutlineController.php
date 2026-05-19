<?php

namespace App\Http\Controllers;

use App\Models\CourseOutline;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CourseOutlineController extends Controller
{
    public function index()
    {
        $courseOutlines = CourseOutline::with('program')->latest()->get();
        return view('admin.course_outlines.index', compact('courseOutlines'));
    }

    public function create()
    {
        $programs = Program::doesntHave('courseOutline')->orderBy('name')->get();
        return view('admin.course_outlines.create', compact('programs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_id'  => 'required|exists:programs,id|unique:course_outlines,program_id',
            'description' => 'nullable|string',
            'objectives'  => 'nullable|string',
            'topics'      => 'nullable|string',
            'file'        => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        if ($request->hasFile('file')) {
            $name = time() . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('course_outlines'), $name);
            $validated['file'] = $name;
        }

        CourseOutline::create($validated);

        return redirect()->route('admin.course-outlines.index')
            ->with('success', 'Course outline added successfully.');
    }

    public function edit($id)
    {
        $courseOutline = CourseOutline::findOrFail($id);
        $programs      = Program::orderBy('name')->get();
        return view('admin.course_outlines.edit', compact('courseOutline', 'programs'));
    }

    public function update(Request $request, $id)
    {
        $courseOutline = CourseOutline::findOrFail($id);

        $validated = $request->validate([
            'program_id'  => 'required|exists:programs,id|unique:course_outlines,program_id,' . $id,
            'description' => 'nullable|string',
            'objectives'  => 'nullable|string',
            'topics'      => 'nullable|string',
            'file'        => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        if ($request->hasFile('file')) {
            if ($courseOutline->file && File::exists(public_path('course_outlines/' . $courseOutline->file))) {
                File::delete(public_path('course_outlines/' . $courseOutline->file));
            }
            $name = time() . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('course_outlines'), $name);
            $validated['file'] = $name;
        }

        $courseOutline->update($validated);

        return redirect()->route('admin.course-outlines.index')
            ->with('success', 'Course outline updated successfully.');
    }

    public function destroy($id)
    {
        $courseOutline = CourseOutline::findOrFail($id);
        if ($courseOutline->file && File::exists(public_path('course_outlines/' . $courseOutline->file))) {
            File::delete(public_path('course_outlines/' . $courseOutline->file));
        }
        $courseOutline->delete();

        return redirect()->route('admin.course-outlines.index')
            ->with('success', 'Course outline deleted successfully.');
    }
}
