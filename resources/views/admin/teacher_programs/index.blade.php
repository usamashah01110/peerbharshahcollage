@extends('admin.main')

@section('content')
<h2 class="mb-3">Teacher Programs</h2>

<a href="{{ route('admin.teacher-programs.create') }}" class="btn btn-primary mb-3">Add Assignment</a>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>Teacher</th><th>Program</th><th>Assigned Date</th><th width="160">Actions</th></tr></thead>
    <tbody>
    @forelse($assignments as $a)
        <tr>
            <td>{{ $a->id }}</td>
            <td>{{ $a->teacher ? $a->teacher->first_name.' '.$a->teacher->last_name : '-' }}</td>
            <td>{{ $a->program->name ?? '-' }}</td>
            <td>{{ optional($a->assigned_date)->format('d M Y') ?? '-' }}</td>
            <td>
                <a href="{{ route('admin.teacher-programs.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.teacher-programs.destroy', $a->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-danger btn-sm">Delete</button></form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5" class="text-center">No assignments found.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
