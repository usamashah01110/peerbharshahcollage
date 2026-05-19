@extends('admin.main')

@section('content')
<h2 class="mb-3">Scholarship App #{{ $application->application_number }}</h2>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<div class="card mb-3"><div class="card-body">
    <p><strong>Scholarship:</strong> {{ $application->scholarship->name ?? '-' }}</p>
    <p><strong>Student:</strong> {{ $application->student ? $application->student->first_name.' '.$application->student->last_name : '-' }}</p>
    <p><strong>CGPA:</strong> {{ $application->current_cgpa ?? '-' }} &middot; <strong>Semester:</strong> {{ $application->current_semester ?? '-' }}</p>
    <p><strong>Family income:</strong> {{ $application->family_monthly_income ?? '-' }} &middot; <strong>Dependents:</strong> {{ $application->number_of_dependents ?? '-' }}</p>
    <p><strong>Status:</strong> <span class="badge badge-info">{{ ucwords(str_replace('_',' ', $application->status)) }}</span></p>
    <p><strong>Awarded:</strong> {{ $application->awarded_amount ?? '-' }} ({{ $application->awarded_percentage ?? '-' }}%)</p>
</div></div>

<h4 class="mt-4">Documents</h4>
<a href="{{ route('admin.scholarship-application-documents.create', ['application_id' => $application->id]) }}" class="btn btn-sm btn-primary mb-2">Upload Document</a>
<table class="table table-sm table-bordered">
    <thead><tr><th>Type</th><th>File</th><th>Uploaded</th><th></th></tr></thead>
    <tbody>
    @forelse($application->documents as $d)
        <tr>
            <td>{{ ucwords(str_replace('_',' ',$d->document_type)) }}</td>
            <td><a href="{{ asset($d->file_path) }}" target="_blank">View</a></td>
            <td>{{ optional($d->uploaded_at)->format('d M Y H:i') }}</td>
            <td>
                <a href="{{ route('admin.scholarship-application-documents.edit', $d->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.scholarship-application-documents.destroy', $d->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-danger btn-sm">Del</button></form>
            </td>
        </tr>
    @empty
        <tr><td colspan="4" class="text-center">None.</td></tr>
    @endforelse
    </tbody>
</table>

<a href="{{ route('admin.scholarship-applications.edit', $application->id) }}" class="btn btn-warning">Edit</a>
<a href="{{ route('admin.scholarship-applications.index') }}" class="btn btn-secondary">Back</a>
@endsection
