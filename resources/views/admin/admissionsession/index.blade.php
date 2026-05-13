@extends('admin.main')

@section('content')

    <h2 class="mb-3">Academic Sessions</h2>

    <a href="{{ route('admin.academic-sessions.create') }}" class="btn btn-primary mb-3">Add Academic Session</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Current</th>
            <th>Admissions</th>
            <th>Admissions Window</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($sessions as $session)
            <tr>
                <td>{{ $session->id }}</td>
                <td>{{ $session->name }}</td>
                <td>{{ ucfirst($session->session_type) }}</td>
                <td>{{ $session->start_date?->format('d M Y') }}</td>
                <td>{{ $session->end_date?->format('d M Y') }}</td>
                <td>
                    @if($session->is_current)
                        <span class="badge bg-success text-white">Current</span>
                    @else
                        <span class="badge bg-danger text-white">No</span>
                    @endif
                </td>
                <td>
                    @if($session->is_admissions_open)
                        <span class="badge bg-primary text-white">Open</span>
                    @else
                        <span class="badge bg-danger text-white">Closed</span>
                    @endif
                </td>
                <td>
                    {{ $session->admissions_open_date?->format('d M Y') ?? '-' }}
                    &rarr;
                    {{ $session->admissions_close_date?->format('d M Y') ?? '-' }}
                </td>
                <td>
                    <a href="{{ route('admin.academic-sessions.edit', $session->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.academic-sessions.destroy', $session->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this session?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">No academic sessions found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection
