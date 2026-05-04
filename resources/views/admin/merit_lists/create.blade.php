@extends('admin.main')

@section('content')

<h2>Add Merit</h2>

<form action="{{ route('merit_lists.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Student</label>
        <select name="student_id" class="form-control">
            @foreach($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Program</label>
        <select name="program_id" class="form-control">
            @foreach($programs as $program)
                <option value="{{ $program->id }}">{{ $program->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Marks</label>
        <input type="number" name="marks" class="form-control">
    </div>

    <button class="btn btn-success">Save</button>

</form>

@endsection