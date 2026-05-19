@extends('admin.main')

@section('content')
<h2 class="mb-3">Admission Applications</h2>

<a href="{{ route('admin.admission-applications.create') }}" class="btn btn-primary mb-3">Add Application</a>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>App #</th><th>Applicant</th><th>Program</th><th>Session</th><th>Email</th><th>Status</th><th width="220">Actions</th></tr></thead>
    <tbody>
    @forelse($applications as $a)
        <tr>
            <td>{{ $a->id }}</td>
            <td>{{ $a->application_number }}</td>
            <td>{{ $a->first_name }} {{ $a->last_name }}</td>
            <td>{{ $a->program->name ?? '-' }}</td>
            <td>{{ $a->session->name ?? '-' }}</td>
            <td>{{ $a->email }}</td>
            <td><span class="badge badge-info">{{ ucfirst(str_replace('_',' ', $a->status)) }}</span></td>
            <td>
                <a href="{{ route('admin.admission-applications.show', $a->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('admin.admission-applications.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.admission-applications.destroy', $a->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this application?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="8" class="text-center">No applications found.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
