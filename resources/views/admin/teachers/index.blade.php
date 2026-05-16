@extends('admin.main')

@section('content')

<h2 class="mb-3">Teachers</h2>

<a href="{{ route('admin.teachers.create') }}" class="btn btn-primary mb-3">
    Add Teacher
</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Employee ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Status</th>
            <th width="150">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($teachers as $teacher)
        <tr>
            <td>{{ $teacher->id }}</td>

            <td>{{ $teacher->employee_id }}</td>

            <td>
                {{ $teacher->first_name }} 
                {{ $teacher->last_name }}
            </td>

            <td>{{ $teacher->email }}</td>

            <td>{{ $teacher->phone ?? 'N/A' }}</td>

            <td>
                {{ $teacher->department->name ?? 'N/A' }}
            </td>

            <td>
                {{ ucwords(str_replace('_', ' ', $teacher->designation)) }}
            </td>

            <td>
                {{ ucfirst($teacher->status) }}
            </td>

            <td>
                <a href="{{ route('admin.teachers.edit', $teacher->id) }}"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('admin.teachers.destroy', $teacher->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection