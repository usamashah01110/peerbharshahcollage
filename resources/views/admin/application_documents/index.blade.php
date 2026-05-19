@extends('admin.main')

@section('content')
<h2 class="mb-3">Application Documents</h2>

<a href="{{ route('admin.application-documents.create') }}" class="btn btn-primary mb-3">Upload Document</a>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>Application</th><th>Type</th><th>File</th><th>Size (KB)</th><th>Uploaded</th><th width="160">Actions</th></tr></thead>
    <tbody>
    @forelse($documents as $d)
        <tr>
            <td>{{ $d->id }}</td>
            <td>{{ $d->application->application_number ?? '-' }}</td>
            <td>{{ ucwords(str_replace('_',' ',$d->document_type)) }}</td>
            <td><a href="{{ asset($d->file_path) }}" target="_blank">View</a></td>
            <td>{{ $d->file_size_kb ?? '-' }}</td>
            <td>{{ optional($d->uploaded_at)->format('d M Y H:i') }}</td>
            <td>
                <a href="{{ route('admin.application-documents.edit', $d->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.application-documents.destroy', $d->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-danger btn-sm">Delete</button></form>
            </td>
        </tr>
    @empty
        <tr><td colspan="7" class="text-center">No documents found.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
