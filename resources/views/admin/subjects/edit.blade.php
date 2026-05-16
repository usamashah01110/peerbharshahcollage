@extends('admin.main')

@section('content')

<h2>Edit Subject</h2>

<form method="POST"
      action="{{ route('admin.subjects.update', $subject->id) }}">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Semester</label>

        <select name="semester_id" class="form-control">

            @foreach($semesters as $semester)
                <option value="{{ $semester->id }}"
                    {{ $subject->semester_id == $semester->id ? 'selected' : '' }}>
                    {{ $semester->name }}
                </option>
            @endforeach

        </select>
    </div>

    <div class="mb-3">
        <label>Subject Name</label>

        <input type="text"
               name="name"
               value="{{ $subject->name }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Subject Code</label>

        <input type="text"
               name="code"
               value="{{ $subject->code }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Credit Hours</label>

        <input type="number"
               name="credit_hours"
               value="{{ $subject->credit_hours }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Description</label>

        <textarea name="description"
                  class="form-control">{{ $subject->description }}</textarea>
    </div>

    <div class="mb-3">
        <input type="checkbox"
               name="is_elective"
               {{ $subject->is_elective ? 'checked' : '' }}>

        <label>Elective</label>
    </div>

    <div class="mb-3">
        <input type="checkbox"
               name="is_active"
               {{ $subject->is_active ? 'checked' : '' }}>

        <label>Active</label>
    </div>

    <button type="submit" class="btn btn-primary">
        Update Subject
    </button>

</form>

@endsection