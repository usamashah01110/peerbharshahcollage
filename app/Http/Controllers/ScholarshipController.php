<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::latest()->get();
        return view('admin.scholarships.index', compact('scholarships'));
    }

    public function create()
    {
        $programs = Program::orderBy('name')->get();
        return view('admin.scholarships.create', compact('programs'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateScholarship($request);

        if ($request->hasFile('featured_image')) {
            $name = time() . '.' . $request->file('featured_image')->getClientOriginalExtension();
            $request->file('featured_image')->move(public_path('scholarships'), $name);
            $validated['featured_image'] = $name;
        }

        $validated['slug']       = $validated['slug'] ?: Str::slug($validated['name']);
        $validated['created_by'] = auth()->id();

        Scholarship::create($validated);

        return redirect()->route('admin.scholarships.index')
            ->with('success', 'Scholarship created successfully.');
    }

    public function edit($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        $programs    = Program::orderBy('name')->get();
        return view('admin.scholarships.edit', compact('scholarship', 'programs'));
    }

    public function update(Request $request, $id)
    {
        $scholarship = Scholarship::findOrFail($id);
        $validated = $this->validateScholarship($request, $id);

        if ($request->hasFile('featured_image')) {
            if ($scholarship->featured_image && File::exists(public_path('scholarships/' . $scholarship->featured_image))) {
                File::delete(public_path('scholarships/' . $scholarship->featured_image));
            }
            $name = time() . '.' . $request->file('featured_image')->getClientOriginalExtension();
            $request->file('featured_image')->move(public_path('scholarships'), $name);
            $validated['featured_image'] = $name;
        }

        $scholarship->update($validated);

        return redirect()->route('admin.scholarships.index')
            ->with('success', 'Scholarship updated successfully.');
    }

    public function destroy($id)
    {
        Scholarship::findOrFail($id)->delete();
        return redirect()->route('admin.scholarships.index')
            ->with('success', 'Scholarship deleted successfully.');
    }

    private function validateScholarship(Request $request, $id = null): array
    {
        $idSuffix = $id ? ',' . $id : '';

        $validated = $request->validate([
            'name'                   => 'required|string|max:200',
            'slug'                   => 'nullable|string|max:220|unique:scholarships,slug' . $idSuffix,
            'description'            => 'required|string',
            'type'                   => 'required|in:merit,need_based,sports,minority,disability,other',
            'award_amount'           => 'nullable|numeric|min:0',
            'fee_waiver_percentage'  => 'nullable|numeric|min:0|max:100',
            'duration_semesters'     => 'nullable|integer|min:1|max:20',
            'eligibility_criteria'   => 'required|string',
            'minimum_cgpa'           => 'nullable|numeric|min:0|max:4',
            'maximum_family_income'  => 'nullable|numeric|min:0',
            'eligible_program_ids'   => 'nullable|array',
            'eligible_program_ids.*' => 'exists:programs,id',
            'eligible_semesters'     => 'nullable|array',
            'eligible_semesters.*'   => 'integer|min:1|max:20',
            'application_open_date'  => 'required|date',
            'application_close_date' => 'required|date|after_or_equal:application_open_date',
            'max_recipients'         => 'nullable|integer|min:1',
            'status'                 => 'required|in:draft,open,closed,archived',
            'featured_image'         => 'nullable|image|max:2048',
        ]);

        return $validated;
    }
}
