@extends('admin.main')

@section('content')

<h2>Admissions</h2>

<a href="{{ route('admin.admissions.create') }}" class="btn btn-primary mb-3">
    Add Admission
</a>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Student</th>
        <th>Program</th>
        <th>Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    @foreach($admissions as $admission)
    <tr>
        <td>{{ $admission->id }}</td>
        <td>{{ $admission->student->name ?? '' }}</td>
        <td>{{ $admission->program->name ?? '' }}</td>
        <td>{{ $admission->admission_date }}</td>
        <td>{{ $admission->status }}</td>
        <td>
            <a href="{{ route('admin.admissions.edit',$admission->id) }}" class="btn btn-warning btn-sm">Edit</a>

            <form action="{{ route('admin.admissions.destroy',$admission->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection