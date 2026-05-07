@extends('admin.main')

@section('content')

<h2>Edit News / Event</h2>

<form action="{{ route('admin.news_events.update', $news_event->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" 
               value="{{ $news_event->title }}">
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="4">
            {{ $news_event->description }}
        </textarea>
    </div>

    <div class="mb-3">
        <label>Date</label>
        <input type="date" name="event_date" class="form-control" 
               value="{{ $news_event->event_date }}">
    </div>

    <div class="mb-3">
        <label>Type</label>
        <select name="type" class="form-control">
            <option value="news" {{ $news_event->type == 'news' ? 'selected' : '' }}>News</option>
            <option value="event" {{ $news_event->type == 'event' ? 'selected' : '' }}>Event</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Department</label>
        <select name="department_id" class="form-control">
            <option value="">Select Department</option>
            @foreach($departments as $dept)
                <option value="{{ $dept->id }}" 
                    {{ $news_event->department_id == $dept->id ? 'selected' : '' }}>
                    {{ $dept->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Update</button>

</form>

@endsection