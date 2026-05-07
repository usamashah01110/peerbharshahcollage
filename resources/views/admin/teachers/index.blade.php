@extends('admin.main')

@section('content')

<h2 class="mb-3">Teachers</h2>

<a href="{{ route('admin.teachers.create') }}" class="btn btn-primary mb-3">Add Teacher</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Department</th>
        <th>Actions</th>
    </tr>

    @foreach($teachers as $teacher)
    <tr>
        <td>{{ $teacher->id }}</td>
        <td>{{ $teacher->name }}</td>
        <td>{{ $teacher->department->name ?? 'N/A' }}</td>
        <td>
            <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm">Edit</a>

            <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection