@extends('admin.main')

@section('content')
<h2 class="mb-3">Scholarships</h2>

<a href="{{ route('admin.scholarships.create') }}" class="btn btn-primary mb-3">Add Scholarship</a>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>Name</th><th>Type</th><th>Award</th><th>Open</th><th>Close</th><th>Status</th><th width="160">Actions</th></tr></thead>
    <tbody>
    @forelse($scholarships as $s)
        <tr>
            <td>{{ $s->id }}</td>
            <td>{{ $s->name }}</td>
            <td>{{ ucwords(str_replace('_',' ', $s->type)) }}</td>
            <td>{{ $s->award_amount ?? '-' }}</td>
            <td>{{ optional($s->application_open_date)->format('d M Y') }}</td>
            <td>{{ optional($s->application_close_date)->format('d M Y') }}</td>
            <td><span class="badge badge-info">{{ ucfirst($s->status) }}</span></td>
            <td>
                <a href="{{ route('admin.scholarships.edit', $s->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.scholarships.destroy', $s->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-danger btn-sm">Delete</button></form>
            </td>
        </tr>
    @empty
        <tr><td colspan="8" class="text-center">No scholarships found.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
