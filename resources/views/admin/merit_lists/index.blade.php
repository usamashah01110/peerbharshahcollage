@extends('admin.main')

@section('content')

<h2>Merit List</h2>

<a href="{{ route('admin.merit_lists.create') }}" class="btn btn-primary mb-3">Add Merit</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Student</th>
        <th>Program</th>
        <th>Marks</th>
        <th>Actions</th>
    </tr>

    @foreach($meritLists as $merit)
    <tr>
        <td>{{ $merit->id }}</td>
        <td>{{ $merit->student->name }}</td>
        <td>{{ $merit->program->program_name}}</td>
       
        <td>{{ $merit->marks }}</td>
        <td>
            <a href="{{ route('admin.merit_lists.edit', $merit->id) }}" class="btn btn-warning btn-sm">Edit</a>

            <form action="{{ route('admin.merit_lists.destroy', $merit->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection