@extends('admin.main')

@section('content')
<h2 class="mb-3">Teacher Subject Assignments</h2>

<a href="{{ route('admin.teacher-subject-assignments.create') }}" class="btn btn-primary mb-3">Add Assignment</a>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>Teacher</th><th>Subject</th><th>Program</th><th>Session</th><th>Section</th><th>Active</th><th width="160">Actions</th></tr></thead>
    <tbody>
    @forelse($assignments as $a)
        <tr>
            <td>{{ $a->id }}</td>
            <td>{{ $a->teacher ? $a->teacher->first_name.' '.$a->teacher->last_name : '-' }}</td>
            <td>{{ $a->subject->name ?? '-' }} ({{ $a->subject->code ?? '-' }})</td>
            <td>{{ $a->subject->semester->program->name ?? '-' }}</td>
            <td>{{ $a->session->name ?? '-' }}</td>
            <td>{{ $a->section ?? '-' }}</td>
            <td>{{ $a->is_active ? 'Yes' : 'No' }}</td>
            <td>
                <a href="{{ route('admin.teacher-subject-assignments.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.teacher-subject-assignments.destroy', $a->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-danger btn-sm">Delete</button></form>
            </td>
        </tr>
    @empty
        <tr><td colspan="8" class="text-center">No assignments found.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
