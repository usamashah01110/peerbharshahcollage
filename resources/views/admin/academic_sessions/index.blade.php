@extends('admin.main')

@section('content')
<h2 class="mb-3">Academic Sessions</h2>

<a href="{{ route('admin.academic-sessions.create') }}" class="btn btn-primary mb-3">Add Session</a>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<table class="table table-bordered table-striped">
    <thead>
    <tr><th>ID</th><th>Name</th><th>Type</th><th>Start</th><th>End</th><th>Current</th><th>Admissions Open</th><th width="160">Actions</th></tr>
    </thead>
    <tbody>
    @forelse($sessions as $s)
        <tr>
            <td>{{ $s->id }}</td>
            <td>{{ $s->name }}</td>
            <td>{{ ucfirst($s->session_type) }}</td>
            <td>{{ $s->start_date->format('d M Y') }}</td>
            <td>{{ $s->end_date->format('d M Y') }}</td>
            <td>@if($s->is_current)<span class="badge badge-success">Yes</span>@else No @endif</td>
            <td>@if($s->is_admissions_open)<span class="badge badge-info">Open</span>@else <span class="badge badge-secondary">Closed</span> @endif</td>
            <td>
                <a href="{{ route('admin.academic-sessions.edit', $s->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.academic-sessions.destroy', $s->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this session?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="8" class="text-center">No sessions found.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
