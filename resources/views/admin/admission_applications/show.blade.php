@extends('admin.main')

@section('content')
<h2 class="mb-3">Application #{{ $application->application_number }}</h2>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<div class="card mb-3"><div class="card-body">
    <p><strong>Name:</strong> {{ $application->first_name }} {{ $application->last_name }}</p>
    <p><strong>Father:</strong> {{ $application->father_name }}</p>
    <p><strong>Program:</strong> {{ $application->program->name ?? '-' }} ({{ $application->session->name ?? '-' }})</p>
    <p><strong>Email:</strong> {{ $application->email }} &middot; <strong>Phone:</strong> {{ $application->phone }}</p>
    <p><strong>Status:</strong> <span class="badge badge-info">{{ ucwords(str_replace('_',' ', $application->status)) }}</span></p>
    <p><strong>Test/Interview/Merit:</strong> {{ $application->test_score ?? '-' }} / {{ $application->interview_score ?? '-' }} / {{ $application->merit_score ?? '-' }}</p>
    <p><strong>Linked Student:</strong> {{ $application->student ? $application->student->first_name.' '.$application->student->last_name : 'None' }}</p>
</div></div>

<h4 class="mt-4">Qualifications</h4>
<a href="{{ route('admin.application-qualifications.create', ['application_id' => $application->id]) }}" class="btn btn-sm btn-primary mb-2">Add Qualification</a>
<table class="table table-sm table-bordered">
    <thead><tr><th>Level</th><th>Institution</th><th>Year</th><th>Marks</th><th>%</th><th>Grade</th><th></th></tr></thead>
    <tbody>
    @forelse($application->qualifications as $q)
        <tr>
            <td>{{ ucfirst(str_replace('_',' ',$q->level)) }}</td>
            <td>{{ $q->institution }}</td>
            <td>{{ $q->passing_year }}</td>
            <td>{{ $q->obtained_marks }}/{{ $q->total_marks }}</td>
            <td>{{ $q->percentage }}</td>
            <td>{{ $q->grade ?? '-' }}</td>
            <td>
                <a href="{{ route('admin.application-qualifications.edit', $q->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.application-qualifications.destroy', $q->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-danger btn-sm">Del</button></form>
            </td>
        </tr>
    @empty
        <tr><td colspan="7" class="text-center">None.</td></tr>
    @endforelse
    </tbody>
</table>

<h4 class="mt-4">Documents</h4>
<a href="{{ route('admin.application-documents.create', ['application_id' => $application->id]) }}" class="btn btn-sm btn-primary mb-2">Upload Document</a>
<table class="table table-sm table-bordered">
    <thead><tr><th>Type</th><th>File</th><th>Size</th><th>Uploaded</th><th></th></tr></thead>
    <tbody>
    @forelse($application->documents as $d)
        <tr>
            <td>{{ ucwords(str_replace('_',' ',$d->document_type)) }}</td>
            <td><a href="{{ asset($d->file_path) }}" target="_blank">View</a></td>
            <td>{{ $d->file_size_kb ?? '-' }} KB</td>
            <td>{{ optional($d->uploaded_at)->format('d M Y H:i') }}</td>
            <td>
                <a href="{{ route('admin.application-documents.edit', $d->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.application-documents.destroy', $d->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-danger btn-sm">Del</button></form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5" class="text-center">None.</td></tr>
    @endforelse
    </tbody>
</table>

<a href="{{ route('admin.admission-applications.edit', $application->id) }}" class="btn btn-warning">Edit</a>
<a href="{{ route('admin.admission-applications.index') }}" class="btn btn-secondary">Back</a>
@endsection
