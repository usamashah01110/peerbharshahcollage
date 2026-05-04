@extends('admin.main')

@section('content')

<h2>Edit Merit</h2>

<form action="{{ route('merit_lists.update', $meritList->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Student</label>
        <select name="student_id" class="form-control">
            @foreach($students as $student)
                <option value="{{ $student->id }}" {{ $student->id == $meritList->student_id ? 'selected' : '' }}>
                    {{ $student->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Program</label>
        <select name="program_id" class="form-control">
            @foreach($programs as $program)
                <option value="{{ $program->id }}" {{ $program->id == $meritList->program_id ? 'selected' : '' }}>
                    {{ $program->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Marks</label>
        <input type="number" name="marks" class="form-control" value="{{ $meritList->marks }}">
    </div>

    <button class="btn btn-primary">Update</button>

</form>

@endsection