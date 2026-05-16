@extends('admin.main')

@section('content')

<div class="container">

    <h2>Edit Semester</h2>

    <form action="{{ route('admin.semesters.update', $semester->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Program</label>

            <select name="program_id"
                    class="form-control"
                    required>

                @foreach($programs as $program)

                    <option value="{{ $program->id }}"
                        {{ $semester->program_id == $program->id ? 'selected' : '' }}>

                        {{ $program->name }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Semester Number</label>

            <input type="number"
                   name="semester_number"
                   value="{{ $semester->semester_number }}"
                   class="form-control"
                   required>

        </div>

        <div class="mb-3">

            <label>Semester Name</label>

            <input type="text"
                   name="name"
                   value="{{ $semester->name }}"
                   class="form-control"
                   required>

        </div>

        <button class="btn btn-primary">
            Update Semester
        </button>

    </form>

</div>

@endsection