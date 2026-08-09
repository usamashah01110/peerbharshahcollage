@extends('admin.main')

@section('content')
<h2 class="mb-3">Semesters</h2>

<a href="{{ route('admin.semesters.create') }}" class="btn btn-primary mb-3">Add Semester</a>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>Program</th><th>Semester #</th><th>Name</th><th width="160">Actions</th></tr></thead>
    <tbody>
    @forelse($semesters as $s)
        <tr>
            <td>{{ $s->id }}</td>
            <td>{{ $s->program->name ?? '-' }}</td>
            <td>{{ $s->semester_number }}</td>
            <td>{{ $s->name }}</td>
            <td>
                <a href="{{ route('admin.semesters.edit', $s->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.semesters.destroy', $s->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this semester?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5" class="text-center">No semesters found.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
