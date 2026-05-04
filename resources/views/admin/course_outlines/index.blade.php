@extends('admin.main')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Course Outlines</h2>

    <a href="{{ route('course_outlines.create') }}" class="btn btn-primary">
        + Add New
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Program</th>
            <th>Description</th>
            <th>Objectives</th>
            <th>Topics</th>
            <th>File</th>
            <th width="180">Action</th>
        </tr>
    </thead>

    <tbody>
        @forelse($outlines as $item)
            <tr>
                <td>{{ $item->id }}</td>

                <td>{{ $item->program->name ?? 'N/A' }}</td>

                <td>{{ Str::limit($item->description, 50) }}</td>

                <td>{{ Str::limit($item->objectives, 50) }}</td>

                <td>{{ Str::limit($item->topics, 50) }}</td>

                <td>
                    @if($item->file)
                        <a href="{{ asset('storage/'.$item->file) }}" target="_blank" class="btn btn-sm btn-info">
                            View
                        </a>
                    @else
                        N/A
                    @endif
                </td>

                <td>
                    <a href="{{ route('course_outlines.edit', $item->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('course_outlines.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No data found</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection