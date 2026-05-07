@extends('admin.main')

@section('content')

<h2>All News / Events</h2>

<a href="{{ route('admin.news_events.create') }}" class="btn btn-primary mb-3">
    Add New
</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Date</th>
            <th>Type</th>
            <th>Department</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($events as $event)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $event->title }}</td>
            <td>{{ $event->event_date ?? 'N/A' }}</td>
            <td>{{ ucfirst($event->type) }}</td>
            <td>{{ $event->department->name ?? 'N/A' }}</td>

            <td>
                <a href="{{ route('admin.news_events.edit', $event->id) }}" 
                   class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('admin.news_events.destroy', $event->id) }}" 
                      method="POST" 
                      style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection