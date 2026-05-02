@extends('admin.main')

@section('content')

<h2 class="mb-3">Departments</h2>

<a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Add Department</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>

    @foreach($departments as $dept)
    <tr>
        <td>{{ $dept->id }}</td>
        <td>{{ $dept->name }}</td>
        <td>
            <a href="{{ route('departments.edit', $dept->id) }}" class="btn btn-warning btn-sm">Edit</a>

            <form action="{{ route('departments.destroy', $dept->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection