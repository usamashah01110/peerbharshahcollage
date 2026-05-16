@extends('admin.main')

@section('content')

<h2>Add Subject</h2>

<form method="POST" action="{{ route('admin.subjects.store') }}">
    @csrf

    <div class="mb-3">
        <label>Semester</label>

        <select name="semester_id" class="form-control">
            <option value="">Select Semester</option>

            @foreach($semesters as $semester)
                <option value="{{ $semester->id }}">
                    {{ $semester->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Subject Name</label>

        <input type="text"
               name="name"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Subject Code</label>

        <input type="text"
               name="code"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Credit Hours</label>

        <input type="number"
               name="credit_hours"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Description</label>

        <textarea name="description"
                  class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <input type="checkbox" name="is_elective">
        <label>Elective</label>
    </div>

    <div class="mb-3">
        <input type="checkbox" name="is_active" checked>
        <label>Active</label>
    </div>

    <button type="submit" class="btn btn-success">
        Save Subject
    </button>

</form>

@endsection