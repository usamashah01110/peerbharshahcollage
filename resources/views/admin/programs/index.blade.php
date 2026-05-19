@extends('admin.main')

@section('content')
<h2 class="mb-3">Programs</h2>

<a href="{{ route('admin.programs.create') }}" class="btn btn-primary mb-3">Add Program</a>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<table class="table table-bordered table-striped">
    <thead>
    <tr><th>ID</th><th>Name</th><th>Code</th><th>Department</th><th>Degree Level</th><th>Semesters</th><th>Duration</th><th>Fee/Sem</th><th>Active</th><th width="160">Actions</th></tr>
    </thead>
    <tbody>
    @forelse($programs as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->code }}</td>
            <td>{{ $p->department->name ?? '-' }}</td>
            <td>{{ ucfirst($p->degree_level) }}</td>
            <td>{{ $p->total_semesters }}</td>
            <td>{{ $p->duration_years }} yrs</td>
            <td>{{ $p->fee_per_semester ?? '-' }}</td>
            <td>@if($p->is_active)<span class="badge badge-success">Yes</span>@else<span class="badge badge-secondary">No</span>@endif</td>
            <td>
                <a href="{{ route('admin.programs.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.programs.destroy', $p->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this program?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="10" class="text-center">No programs found.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
