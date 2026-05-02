<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    // Show all
    public function index()
    {
        $scholarships = Scholarship::all();
        return view('admin.scholarships.index', compact('scholarships'));
    }

    // Create form
    public function create()
    {
        return view('admin.scholarships.create');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'year' => 'required'
        ]);

        Scholarship::create($request->all());

        return redirect()->route('scholarships.index')->with('success', 'Scholarship Added');
    }

    // Edit form
    public function edit($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        return view('admin.scholarships.edit', compact('scholarship'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'year' => 'required'
        ]);

        $scholarship = Scholarship::findOrFail($id);
        $scholarship->update($request->all());

        return redirect()->route('scholarships.index')->with('success', 'Updated Successfully');
    }

    // Delete
    public function destroy($id)
    {
        Scholarship::destroy($id);
        return redirect()->route('scholarships.index')->with('success', 'Deleted Successfully');
    }
}