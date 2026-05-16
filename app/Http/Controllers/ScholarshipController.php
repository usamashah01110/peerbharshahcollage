<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::latest()->get();

        return view('scholarships.index', compact('scholarships'));
    }

    public function create()
    {
        return view('scholarships.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:scholarships',
            'description' => 'required',
            'type' => 'required',
            'eligibility_criteria' => 'required',
            'application_open_date' => 'required',
            'application_close_date' => 'required',
        ]);

        Scholarship::create($request->all());

        return redirect()
            ->route('scholarships.index')
            ->with('success', 'Scholarship Added Successfully');
    }

    public function edit($id)
    {
        $scholarship = Scholarship::findOrFail($id);

        return view('scholarships.edit', compact('scholarship'));
    }

    public function update(Request $request, $id)
    {
        $scholarship = Scholarship::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:scholarships,slug,' . $id,
            'description' => 'required',
            'type' => 'required',
            'eligibility_criteria' => 'required',
        ]);

        $scholarship->update($request->all());

        return redirect()
            ->route('scholarships.index')
            ->with('success', 'Scholarship Updated Successfully');
    }

    public function destroy($id)
    {
        $scholarship = Scholarship::findOrFail($id);

        $scholarship->delete();

        return redirect()
            ->route('scholarships.index')
            ->with('success', 'Deleted Successfully');
    }
}