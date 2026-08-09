@extends('admin.main')

@section('content')
<h2 class="mb-3">Merit Lists</h2>

<a href="{{ route('admin.merit-lists.create') }}" class="btn btn-primary mb-3">Add Entry</a>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>Student</th><th>Program</th><th>Marks</th><th width="160">Actions</th></tr></thead>
    <tbody>
    @forelse($meritLists as $m)
        <tr>
            <td>{{ $m->id }}</td>
            <td>{{ $m->student ? $m->student->first_name.' '.$m->student->last_name : '-' }}</td>
            <td>{{ $m->program->name ?? '-' }}</td>
            <td>{{ $m->marks }}</td>
            <td>
                <a href="{{ route('admin.merit-lists.edit', $m->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.merit-lists.destroy', $m->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-danger btn-sm">Delete</button></form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5" class="text-center">No entries.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
