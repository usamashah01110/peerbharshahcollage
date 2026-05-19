<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Program;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::with(['program', 'teacher'])->latest()->get();
        return view('admin.materials.index', compact('materials'));
    }

    public function create()
    {
        $programs = Program::orderBy('name')->get();
        $teachers = Teacher::orderBy('first_name')->get();
        return view('admin.materials.create', compact('programs', 'teachers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'file'       => 'required|file|max:10240',
            'program_id' => 'required|exists:programs,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $name = time() . '.' . $request->file('file')->getClientOriginalExtension();
        $request->file('file')->move(public_path('materials'), $name);

        Material::create([
            'title'      => $validated['title'],
            'file'       => $name,
            'program_id' => $validated['program_id'],
            'teacher_id' => $validated['teacher_id'],
        ]);

        return redirect()->route('admin.materials.index')
            ->with('success', 'Material added successfully.');
    }

    public function edit($id)
    {
        $material = Material::findOrFail($id);
        $programs = Program::orderBy('name')->get();
        $teachers = Teacher::orderBy('first_name')->get();
        return view('admin.materials.edit', compact('material', 'programs', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);

        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'file'       => 'nullable|file|max:10240',
            'program_id' => 'required|exists:programs,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $data = [
            'title'      => $validated['title'],
            'program_id' => $validated['program_id'],
            'teacher_id' => $validated['teacher_id'],
        ];

        if ($request->hasFile('file')) {
            if ($material->file && File::exists(public_path('materials/' . $material->file))) {
                File::delete(public_path('materials/' . $material->file));
            }
            $name = time() . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('materials'), $name);
            $data['file'] = $name;
        }

        $material->update($data);

        return redirect()->route('admin.materials.index')
            ->with('success', 'Material updated successfully.');
    }

    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        if ($material->file && File::exists(public_path('materials/' . $material->file))) {
            File::delete(public_path('materials/' . $material->file));
        }
        $material->delete();

        return redirect()->route('admin.materials.index')
            ->with('success', 'Material deleted successfully.');
    }
}
