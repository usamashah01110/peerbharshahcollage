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
                <th>Degree Level</th>
                <th>Semesters</th>
                <th>Duration</th>
                <th>Fee/Semester</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($programs as $program)
            <tr>
                <td>{{ $program->id }}</td>

                <td>{{ $program->code }}</td>

                <td>{{ $program->name }}</td>

                <td>{{ $program->department->name }}</td>

                <td>{{ ucfirst($program->degree_level) }}</td>

                <td>{{ $program->total_semesters }}</td>

                <td>{{ $program->duration_years }} Years</td>

                <td>
                    {{ $program->fee_per_semester ?? 'N/A' }}
                </td>

                <td>
                    @if($program->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('admin.programs.edit', $program->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.programs.destroy', $program->id) }}"
                          method="POST"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection