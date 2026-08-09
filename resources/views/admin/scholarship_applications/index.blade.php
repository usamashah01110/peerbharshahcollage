@extends('admin.main')

@section('content')
<h2 class="mb-3">Scholarship Applications</h2>

<a href="{{ route('admin.scholarship-applications.create') }}" class="btn btn-primary mb-3">Add Application</a>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>App #</th><th>Student</th><th>Scholarship</th><th>CGPA</th><th>Status</th><th width="220">Actions</th></tr></thead>
    <tbody>
    @forelse($applications as $a)
        <tr>
            <td>{{ $a->id }}</td>
            <td>{{ $a->application_number }}</td>
            <td>{{ $a->student ? $a->student->first_name.' '.$a->student->last_name : '-' }}</td>
            <td>{{ $a->scholarship->name ?? '-' }}</td>
            <td>{{ $a->current_cgpa ?? '-' }}</td>
            <td><span class="badge badge-info">{{ ucfirst(str_replace('_',' ', $a->status)) }}</span></td>
            <td>
                <a href="{{ route('admin.scholarship-applications.show', $a->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('admin.scholarship-applications.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.scholarship-applications.destroy', $a->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-danger btn-sm">Delete</button></form>
            </td>
        </tr>
    @empty
        <tr><td colspan="7" class="text-center">No applications found.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
