<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->get();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required',
            'course_code' => 'nullable|unique:courses',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'Course added');
    }

   public function edit($id)
{
    $course = Course::findOrFail($id);
    return view('admin.courses.edit', compact('course'));
}

public function update(Request $request, $id)
{
    $course = Course::findOrFail($id);
    $course->update($request->all());
    return redirect()->route('courses.index');
}

public function destroy($id)
{
    Course::findOrFail($id)->delete();
    return back();
}
}