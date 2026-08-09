@extends('admin.main')

@section('content')
<h2 class="mb-3">Admissions</h2>

<a href="{{ route('admin.admissions.create') }}" class="btn btn-primary mb-3">Add Admission</a>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>Student</th><th>Program</th><th>Admission Date</th><th>Status</th><th width="160">Actions</th></tr></thead>
    <tbody>
    @forelse($admissions as $a)
        <tr>
            <td>{{ $a->id }}</td>
            <td>{{ $a->student ? $a->student->first_name.' '.$a->student->last_name : '-' }}</td>
            <td>{{ $a->program->name ?? '-' }}</td>
            <td>{{ optional($a->admission_date)->format('d M Y') }}</td>
            <td>{{ ucfirst($a->status) }}</td>
            <td>
                <a href="{{ route('admin.admissions.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.admissions.destroy', $a->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-danger btn-sm">Delete</button></form>
            </td>
        </tr>
    @empty
        <tr><td colspan="6" class="text-center">No admissions found.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
