@extends('admin.main')

@section('content')

<h2>Edit Admission</h2>

<form action="{{ route('admin.admissions.update', $admission->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Student -->
    <div class="mb-3">
        <label>Student</label>
        <select name="student_id" class="form-control">
            @foreach($students as $student)
                <option value="{{ $student->id }}"
                    {{ $student->id == $admission->student_id ? 'selected' : '' }}>
                    {{ $student->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Program -->
    <div class="mb-3">
        <label>Program</label>
        <select name="program_id" class="form-control">
            @foreach($programs as $program)
                <option value="{{ $program->id }}"
                    {{ $program->id == $admission->program_id ? 'selected' : '' }}>
                    {{ $program->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Admission Date -->
    <div class="mb-3">
        <label>Admission Date</label>
        <input type="date" name="admission_date"
               value="{{ $admission->admission_date }}"
               class="form-control">
    </div>

    <!-- Status -->
    <div class="mb-3">
        <label>Status</label>
        <input type="text" name="status"
               value="{{ $admission->status }}"
               class="form-control"
               placeholder="e.g. pending, approved">
    </div>

    <button class="btn btn-primary">Update</button>

</form>

@endsection