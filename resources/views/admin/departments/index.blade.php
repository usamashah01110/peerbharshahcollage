@extends('admin.main')

@section('content')

    <h2 class="mb-3">Departments</h2>

    <a href="{{ route('admin.departments.create') }}" class="btn btn-primary mb-3">Add Department</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Code</th>
            <th>Description</th>
            <th>HOD ID</th>
            <th>Established Date</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($departments as $dept)
            <tr>
                <td>{{ $dept->id }}</td>
                <td>{{ $dept->name }}</td>
                <td>{{ $dept->code }}</td>
                <td>{{ Str::limit($dept->description, 50) ?? '-' }}</td>
                <td>{{ $dept->hod_id ?? '-' }}</td>
                <td>{{ $dept->established_date ? \Carbon\Carbon::parse($dept->established_date)->format('d M Y') : '-' }}</td>
                <td>
                    @if($dept->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </td>
                <td>{{ $dept->created_at ? $dept->created_at->format('d M Y') : '-' }}</td>
                <td>
                    <a href="{{ route('admin.departments.edit', $dept->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.departments.destroy', $dept->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this department?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">No departments found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection
