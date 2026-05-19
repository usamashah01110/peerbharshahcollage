@extends('admin.main')

@section('content')
<h2 class="mb-3">Subjects</h2>

<a href="{{ route('admin.subjects.create') }}" class="btn btn-primary mb-3">Add Subject</a>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>Name</th><th>Code</th><th>Program</th><th>Semester</th><th>Credit Hrs</th><th>Elective</th><th>Active</th><th width="160">Actions</th></tr></thead>
    <tbody>
    @forelse($subjects as $s)
        <tr>
            <td>{{ $s->id }}</td>
            <td>{{ $s->name }}</td>
            <td>{{ $s->code }}</td>
            <td>{{ $s->semester->program->name ?? '-' }}</td>
            <td>{{ $s->semester->name ?? '-' }}</td>
            <td>{{ $s->credit_hours ?? '-' }}</td>
            <td>{{ $s->is_elective ? 'Yes' : 'No' }}</td>
            <td>@if($s->is_active)<span class="badge badge-success">Yes</span>@else<span class="badge badge-secondary">No</span>@endif</td>
            <td>
                <a href="{{ route('admin.subjects.edit', $s->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.subjects.destroy', $s->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this subject?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="9" class="text-center">No subjects found.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
