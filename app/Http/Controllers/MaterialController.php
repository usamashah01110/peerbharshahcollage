<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Program;
use App\Models\Teacher;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::with(['program', 'teacher'])->get();
        return view(' admin.materials.index', compact('materials'));
    }

    public function create()
    {
        $programs = Program::all();
        $teachers = Teacher::all();
        return view('admin.materials.create', compact('programs', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|file',
            'program_id' => 'required',
            'teacher_id' => 'required',
        ]);

        $fileName = time().'.'.$request->file->extension();
        $request->file->move(public_path('files'), $fileName);

        Material::create([
            'title' => $request->title,
            'file' => $fileName,
            'program_id' => $request->program_id,
            'teacher_id' => $request->teacher_id,
        ]);

        return redirect()->route('admin.materials.index')->with('success', 'Material Added');
    }

    public function edit(Material $material)
    {
        $programs = Program::all();
        $teachers = Teacher::all();
        return view('admin.materials.edit', compact('material', 'programs', 'teachers'));
    }

    public function update(Request $request, Material $material)
    {
        $data = $request->validate([
            'title' => 'required',
            'program_id' => 'required',
            'teacher_id' => 'required',
        ]);

        if ($request->hasFile('file')) {
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('files'), $fileName);
            $data['file'] = $fileName;
        }

        $material->update($data);

        return redirect()->route('admin.materials.index')->with('success', 'Material Updated');
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return back()->with('success', 'Deleted');
    }
}