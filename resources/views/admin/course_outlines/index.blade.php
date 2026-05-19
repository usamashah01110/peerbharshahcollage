@extends('admin.main')

@section('content')
<h2 class="mb-3">Course Outlines</h2>

<a href="{{ route('admin.course-outlines.create') }}" class="btn btn-primary mb-3">Add Course Outline</a>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>Program</th><th>Description</th><th>File</th><th width="160">Actions</th></tr></thead>
    <tbody>
    @forelse($courseOutlines as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->program->name ?? '-' }}</td>
            <td>{{ \Illuminate\Support\Str::limit($c->description, 80) }}</td>
            <td>@if($c->file)<a href="{{ asset('course_outlines/'.$c->file) }}" target="_blank">View</a>@else - @endif</td>
            <td>
                <a href="{{ route('admin.course-outlines.edit', $c->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.course-outlines.destroy', $c->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-danger btn-sm">Delete</button></form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5" class="text-center">No course outlines found.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
