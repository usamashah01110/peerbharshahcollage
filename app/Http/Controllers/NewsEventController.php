<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsEvent;
use App\Models\Department;

class NewsEventController extends Controller
{
    public function index()
    {
        $newsEvents = NewsEvent::with('department')
            ->latest()
            ->get();

        return view(
            'admin.newsevents.index',
            compact('newsEvents')
        );
    }

    public function create()
    {
        $departments = Department::all();

        return view(
            'admin.newsevents.create',
            compact('departments')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|max:255',

            'description' => 'required',

            'event_date' => 'nullable|date',

            'type' => 'required',

            'department_id' =>
                'nullable|exists:departments,id',
        ]);

        NewsEvent::create([

            'title' => $request->title,

            'description' => $request->description,

            'event_date' => $request->event_date,

            'type' => $request->type,

            'department_id' => $request->department_id,
        ]);

        return redirect()
            ->route('admin.newsevents.index')
            ->with(
                'success',
                'News/Event Added Successfully'
            );
    }

    public function edit($id)
    {
        $newsEvent = NewsEvent::findOrFail($id);

        $departments = Department::all();

        return view(
            'admin.newsevents.edit',
            compact(
                'newsEvent',
                'departments'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $newsEvent = NewsEvent::findOrFail($id);

        $request->validate([

            'title' => 'required|max:255',

            'description' => 'required',

            'event_date' => 'nullable|date',

            'type' => 'required',
        ]);

        $newsEvent->update([

            'title' => $request->title,

            'description' => $request->description,

            'event_date' => $request->event_date,

            'type' => $request->type,

            'department_id' => $request->department_id,
        ]);

        return redirect()
            ->route('admin.newsevents.index')
            ->with(
                'success',
                'News/Event Updated Successfully'
            );
    }

    public function destroy($id)
    {
        $newsEvent = NewsEvent::findOrFail($id);

        $newsEvent->delete();

        return redirect()
            ->route('admin.newsevents.index')
            ->with(
                'success',
                'Deleted Successfully'
            );
    }
}