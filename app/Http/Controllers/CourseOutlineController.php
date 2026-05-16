<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseOutline;
use App\Models\Program;

class CourseOutlineController extends Controller
{
    public function index()
    {
        $courseOutlines = CourseOutline::with('program')
            ->orderBy('id', 'desc')
            ->get();

        return view(
            'admin.courseoutlines.index',
            compact('courseOutlines')
        );
    }

    public function create()
    {
        $programs = Program::all();

        return view(
            'admin.courseoutlines.create',
            compact('programs')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'program_id' => 'required|unique:course_outlines,program_id',

            'description' => 'nullable',

            'objectives' => 'nullable',

            'topics' => 'nullable',

            'file' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $fileName = null;

        if ($request->hasFile('file')) {

            $file = $request->file('file');

            $fileName = time() . '.' . $file->getClientOriginalExtension();

            $file->move(
                public_path('course_outlines'),
                $fileName
            );
        }

        CourseOutline::create([

            'program_id' => $request->program_id,

            'description' => $request->description,

            'objectives' => $request->objectives,

            'topics' => $request->topics,

            'file' => $fileName,
        ]);

        return redirect()
            ->route('admin.courseoutlines.index')
            ->with(
                'success',
                'Course Outline Added Successfully'
            );
    }

    public function edit($id)
    {
        $courseOutline = CourseOutline::findOrFail($id);

        $programs = Program::all();

        return view(
            'admin.courseoutlines.edit',
            compact(
                'courseOutline',
                'programs'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $courseOutline = CourseOutline::findOrFail($id);

        $request->validate([

            'program_id' =>
                'required|unique:course_outlines,program_id,' . $id,

            'file' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $fileName = $courseOutline->file;

        if ($request->hasFile('file')) {

            $file = $request->file('file');

            $fileName = time() . '.' . $file->getClientOriginalExtension();

            $file->move(
                public_path('course_outlines'),
                $fileName
            );
        }

        $courseOutline->update([

            'program_id' => $request->program_id,

            'description' => $request->description,

            'objectives' => $request->objectives,

            'topics' => $request->topics,

            'file' => $fileName,
        ]);

        return redirect()
            ->route('admin.courseoutlines.index')
            ->with(
                'success',
                'Course Outline Updated Successfully'
            );
    }

    public function destroy($id)
    {
        $courseOutline = CourseOutline::findOrFail($id);

        $courseOutline->delete();

        return redirect()
            ->route('admin.courseoutlines.index')
            ->with(
                'success',
                'Course Outline Deleted Successfully'
            );
    }
}