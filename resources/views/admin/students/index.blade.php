@extends('admin.main')

@section('content')
<h2 class="mb-3">Students</h2>

<a href="{{ route('admin.students.create') }}" class="btn btn-primary mb-3">Add Student</a>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>Reg #</th><th>Name</th><th>Email</th><th>Program</th><th>Session</th><th>Sem</th><th>Status</th><th width="160">Actions</th></tr></thead>
    <tbody>
    @forelse($students as $s)
        <tr>
            <td>{{ $s->id }}</td>
            <td>{{ $s->registration_number }}</td>
            <td>{{ $s->first_name }} {{ $s->last_name }}</td>
            <td>{{ $s->email }}</td>
            <td>{{ $s->program->name ?? '-' }}</td>
            <td>{{ $s->session->name ?? '-' }}</td>
            <td>{{ $s->current_semester ?? '-' }}</td>
            <td><span class="badge badge-info">{{ ucfirst($s->status) }}</span></td>
            <td>
                <a href="{{ route('admin.students.edit', $s->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.students.destroy', $s->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this student?');">@csrf @method('DELETE')<button class="btn btn-danger btn-sm">Delete</button></form>
            </td>
        </tr>
    @empty
        <tr><td colspan="9" class="text-center">No students found.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
