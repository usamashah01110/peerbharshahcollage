<?php

namespace App\Http\Controllers;

use App\Models\NewsEvent;
use App\Models\Department;
use Illuminate\Http\Request;

class NewsEventController extends Controller
{
    public function index()
    {
        $events = NewsEvent::with('department')->latest()->get();
        return view('admin.news_events.index', compact('events'));
    }


    public function create()
    {
        $departments = Department::all();
        return view('admin.news_events.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        NewsEvent::create($request->all());

        return redirect()->route('admin.news_events.index')
        ->with('success', 'Event created successfully');
    }

    
    public function show(NewsEvent $news_event)
    {
        return view('admin.news_events.show', compact('news_event'));
    }

    
    public function edit(NewsEvent $news_event)
    {
        $departments = Department::all();
        return view('admin.news_events.edit', compact('news_event', 'departments'));
    }

    
    public function update(Request $request, NewsEvent $news_event)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $news_event->update($request->all());

        return redirect()->route('admin.news_events.index')
                         ->with('success', 'Event updated successfully');
    }

    
    public function destroy(NewsEvent $news_event)
    {
        $news_event->delete();

        return redirect()->route('admin.news_events.index')
                         ->with('success', 'Event deleted successfully');
    }
}