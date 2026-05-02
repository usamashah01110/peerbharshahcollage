@extends('admin.main')

@section('content')

<h2>Materials List</h2>

<a href="{{ route('materials.create') }}" class="btn btn-primary mb-3">Add Material</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Title</th>
        <th>Program</th>
        <th>Teacher</th>
        <th>File</th>
        <th>Action</th>
    </tr>

    @foreach($materials as $m)
    <tr>
        <td>{{ $m->title }}</td>
        <td>{{ $m->program->name ?? '' }}</td>
        <td>{{ $m->teacher->name ?? '' }}</td>
        <td><a href="/files/{{ $m->file }}" target="_blank">View</a></td>
        <td>
            <a href="{{ route('materials.edit', $m->id) }}" class="btn btn-warning btn-sm">Edit</a>

            <form action="{{ route('materials.destroy', $m->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection