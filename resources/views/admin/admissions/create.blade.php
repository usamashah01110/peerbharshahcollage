@extends('admin.main')

@section('content')

<h2>Add Admission</h2>

<form action="{{ route('admin.admissions.store') }}" method="POST">
    @csrf

    <select name="student_id" class="form-control mb-2">
        <option>Select Student</option>
        @foreach($students as $s)
            <option value="{{ $s->id }}">{{ $s->name }}</option>
        @endforeach
    </select>

    <select name="program_id" class="form-control mb-2">
        <option>Select Program</option>
        @foreach($programs as $program)
            <option value="{{ $program->id }}">{{ $program->program_name  }}</option>
        @endforeach
    </select>

    <input type="date" name="admission_date" class="form-control mb-2">

    <input type="text" name="status" class="form-control mb-2" placeholder="status">

    <button class="btn btn-success">Save</button>
</form>

@endsection