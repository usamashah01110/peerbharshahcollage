@extends('admin.main')

@section('content')
<h2 class="mb-3">News &amp; Events</h2>

<a href="{{ route('admin.news-events.create') }}" class="btn btn-primary mb-3">Add Entry</a>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>Title</th><th>Type</th><th>Event Date</th><th>Department</th><th width="160">Actions</th></tr></thead>
    <tbody>
    @forelse($newsEvents as $n)
        <tr>
            <td>{{ $n->id }}</td>
            <td>{{ $n->title }}</td>
            <td>{{ ucfirst($n->type) }}</td>
            <td>{{ optional($n->event_date)->format('d M Y') ?? '-' }}</td>
            <td>{{ $n->department->name ?? '-' }}</td>
            <td>
                <a href="{{ route('admin.news-events.edit', $n->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.news-events.destroy', $n->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-danger btn-sm">Delete</button></form>
            </td>
        </tr>
    @empty
        <tr><td colspan="6" class="text-center">No entries.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
