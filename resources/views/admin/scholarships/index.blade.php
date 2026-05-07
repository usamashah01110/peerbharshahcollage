@extends('admin.main')

@section('content')

<h2 class="mb-3">Scholarships</h2>

<a href="{{ route('admin.scholarships.create') }}" class="btn btn-primary mb-3">Add Scholarship</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Year</th>
        <th>Actions</th>
    </tr>

    @foreach($scholarships as $sch)
    <tr>
        <td>{{ $sch->id }}</td>
        <td>{{ $sch->title }}</td>
        <td>{{ $sch->year }}</td>
        <td>
            <a href="{{ route('admin.scholarships.edit', $sch->id) }}" class="btn btn-warning btn-sm">Edit</a>

            <form action="{{ route('admin.scholarships.destroy', $sch->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection