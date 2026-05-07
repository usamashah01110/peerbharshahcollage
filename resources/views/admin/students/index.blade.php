@extends('admin.main')

@section('content')
<div class="container">
    <h2>Students</h2>

    <a href="{{ route('admin.students.create') }}" class="btn btn-primary">Add Student</a>

    <table class="table mt-3">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Actions</th>
        </tr>

        @foreach($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->department->name }}</td>
            <td>
                <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-warning">Edit</a>

                <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection