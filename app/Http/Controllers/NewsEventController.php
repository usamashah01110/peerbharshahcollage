<?php

namespace App\Http\Controllers;

use App\Models\NewsEvent;
use App\Models\Department;
use Illuminate\Http\Request;

class NewsEventController extends Controller
{
    public function index()
    {
        $newsEvents = NewsEvent::with('department')->latest()->get();
        return view('admin.news_events.index', compact('newsEvents'));
    }

    public function create()
    {
        $departments = Department::orderBy('name')->get();
        return view('admin.news_events.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'required|string',
            'event_date'    => 'nullable|date',
            'type'          => 'required|string|max:50',
            'department_id' => 'nullable|exists:departments,id',
        ]);

        NewsEvent::create($validated);

        return redirect()->route('admin.news-events.index')
            ->with('success', 'News/Event added successfully.');
    }

    public function edit($id)
    {
        $newsEvent   = NewsEvent::findOrFail($id);
        $departments = Department::orderBy('name')->get();
        return view('admin.news_events.edit', compact('newsEvent', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $newsEvent = NewsEvent::findOrFail($id);

        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'required|string',
            'event_date'    => 'nullable|date',
            'type'          => 'required|string|max:50',
            'department_id' => 'nullable|exists:departments,id',
        ]);

        $newsEvent->update($validated);

        return redirect()->route('admin.news-events.index')
            ->with('success', 'News/Event updated successfully.');
    }

    public function destroy($id)
    {
        NewsEvent::findOrFail($id)->delete();
        return redirect()->route('admin.news-events.index')
            ->with('success', 'News/Event deleted successfully.');
    }
}
