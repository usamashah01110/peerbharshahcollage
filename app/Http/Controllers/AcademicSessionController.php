<?php

namespace App\Http\Controllers;

use App\Models\AcademicSession;
use Illuminate\Http\Request;

class AcademicSessionController extends Controller
{
    public function index()
    {
        $sessions = AcademicSession::orderBy('start_date', 'desc')->get();
        return view('admin.academic_sessions.index', compact('sessions'));
    }

    public function create()
    {
        return view('admin.academic_sessions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'                  => 'required|string|max:50',
            'session_type'          => 'required|in:fall,spring,summer',
            'start_date'            => 'required|date',
            'end_date'              => 'required|date|after:start_date',
            'is_current'            => 'required|boolean',
            'is_admissions_open'    => 'required|boolean',
            'admissions_open_date'  => 'nullable|date',
            'admissions_close_date' => 'nullable|date|after_or_equal:admissions_open_date',
        ]);

        if (!empty($validated['is_current'])) {
            AcademicSession::where('is_current', true)->update(['is_current' => false]);
        }

        AcademicSession::create($validated);

        return redirect()->route('admin.academic-sessions.index')
            ->with('success', 'Academic session created successfully.');
    }

    public function edit($id)
    {
        $session = AcademicSession::findOrFail($id);
        return view('admin.academic_sessions.edit', compact('session'));
    }

    public function update(Request $request, $id)
    {
        $session = AcademicSession::findOrFail($id);

        $validated = $request->validate([
            'name'                  => 'required|string|max:50',
            'session_type'          => 'required|in:fall,spring,summer',
            'start_date'            => 'required|date',
            'end_date'              => 'required|date|after:start_date',
            'is_current'            => 'required|boolean',
            'is_admissions_open'    => 'required|boolean',
            'admissions_open_date'  => 'nullable|date',
            'admissions_close_date' => 'nullable|date|after_or_equal:admissions_open_date',
        ]);

        if (!empty($validated['is_current'])) {
            AcademicSession::where('is_current', true)
                ->where('id', '!=', $session->id)
                ->update(['is_current' => false]);
        }

        $session->update($validated);

        return redirect()->route('admin.academic-sessions.index')
            ->with('success', 'Academic session updated successfully.');
    }

    public function destroy($id)
    {
        AcademicSession::findOrFail($id)->delete();
        return redirect()->route('admin.academic-sessions.index')
            ->with('success', 'Academic session deleted successfully.');
    }
}
