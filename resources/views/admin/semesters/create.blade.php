@extends('admin.main')

@section('content')

<div class="container">

    <h2>Create Semester</h2>

    <form action="{{ route('admin.semesters.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label>Program</label>

            <select name="program_id"
                    class="form-control"
                    required>

                <option value="">Select Program</option>

                @foreach($programs as $program)

                    <option value="{{ $program->id }}">
                        {{ $program->name }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Semester Number</label>

            <input type="number"
                   name="semester_number"
                   class="form-control"
                   required>

        </div>

        <div class="mb-3">

            <label>Semester Name</label>

            <input type="text"
                   name="name"
                   class="form-control"
                   placeholder="Example: First Semester"
                   required>

        </div>

        <button class="btn btn-success">
            Save Semester
        </button>

    </form>

</div>

@endsection