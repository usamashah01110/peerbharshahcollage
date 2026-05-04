@extends('admin.main')

@section('content')
<div class="container">
    <h2>Programs</h2>

    <a href="{{ route('admin.programs.create') }}" class="btn btn-primary mb-3">
        Add Program
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($programs as $program)
            <tr>
                <td>{{ $program->id }}</td>
                <td>{{ $program->program_code }}</td>
                <td>{{ $program->program_name }}</td>
                <td>{{ $program->department->name }}</td>
                <td>
                    <a href="{{ route('admin.programs.edit', $program->id) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('admin.programs.destroy', $program->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                   
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection