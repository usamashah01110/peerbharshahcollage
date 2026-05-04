@extends('admin.main')

@section('content')

<h2>Scholarship Applications</h2>

<a href="{{ route('scholarship_applications.create') }}" class="btn btn-primary mb-3">Apply</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Student</th>
        <th>Scholarship</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    @foreach($applications as $app)
    <tr>
        <td>{{ $app->id }}</td>
        <td>{{ $app->student->name ?? 'N/A' }}</td>
        <td>{{ $app->scholarship->title ?? 'N/A' }}</td>
        <td>{{ $app->status }}</td>
        <td>
            <form action="{{ route('scholarships_applications.delete',$app->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection