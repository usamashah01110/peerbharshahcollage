@extends('admin.main')

@section('content')
<h2 class="mb-3">Materials</h2>

<a href="{{ route('admin.materials.create') }}" class="btn btn-primary mb-3">Add Material</a>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>Title</th><th>Program</th><th>Teacher</th><th>File</th><th width="160">Actions</th></tr></thead>
    <tbody>
    @forelse($materials as $m)
        <tr>
            <td>{{ $m->id }}</td>
            <td>{{ $m->title }}</td>
            <td>{{ $m->program->name ?? '-' }}</td>
            <td>{{ $m->teacher ? $m->teacher->first_name.' '.$m->teacher->last_name : '-' }}</td>
            <td>@if($m->file)<a href="{{ asset('materials/'.$m->file) }}" target="_blank">View</a>@else - @endif</td>
            <td>
                <a href="{{ route('admin.materials.edit', $m->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.materials.destroy', $m->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-danger btn-sm">Delete</button></form>
            </td>
        </tr>
    @empty
        <tr><td colspan="6" class="text-center">No materials found.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
