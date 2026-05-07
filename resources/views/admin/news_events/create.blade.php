@extends('admin.main')

@section('content')

<h2>Add News / Event</h2>

<form action="{{ route('admin.news_events.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" placeholder="Enter title">
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="4" placeholder="Enter description"></textarea>
    </div>

    <div class="mb-3">
        <label>Date</label>
        <input type="date" name="event_date" class="form-control">
    </div>

    <div class="mb-3">
        <label>Type</label>
        <select name="type" class="form-control">
            <option value="news">News</option>
            <option value="event">Event</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Department</label>
        <select name="department_id" class="form-control">
            <option value="">Select Department</option>
            @foreach($departments as $dept)
                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Save</button>

</form>

@endsection