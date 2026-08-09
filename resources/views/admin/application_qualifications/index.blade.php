@extends('admin.main')

@section('content')
<h2 class="mb-3">Application Qualifications</h2>

<a href="{{ route('admin.application-qualifications.create') }}" class="btn btn-primary mb-3">Add Qualification</a>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>Application</th><th>Level</th><th>Institution</th><th>Board/University</th><th>Year</th><th>Marks</th><th>%</th><th width="160">Actions</th></tr></thead>
    <tbody>
    @forelse($qualifications as $q)
        <tr>
            <td>{{ $q->id }}</td>
            <td>{{ $q->application->application_number ?? '-' }}</td>
            <td>{{ ucwords(str_replace('_',' ',$q->level)) }}</td>
            <td>{{ $q->institution }}</td>
            <td>{{ $q->board_university }}</td>
            <td>{{ $q->passing_year }}</td>
            <td>{{ $q->obtained_marks }}/{{ $q->total_marks }}</td>
            <td>{{ $q->percentage }}</td>
            <td>
                <a href="{{ route('admin.application-qualifications.edit', $q->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.application-qualifications.destroy', $q->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-danger btn-sm">Delete</button></form>
            </td>
        </tr>
    @empty
        <tr><td colspan="9" class="text-center">No qualifications found.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
