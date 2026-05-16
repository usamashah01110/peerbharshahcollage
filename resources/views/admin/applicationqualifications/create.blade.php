@extends('admin.main')

@section('content')

<div class="container mt-4">

    <h2>Add Qualification</h2>

    @if ($errors->any())

        <div class="alert alert-danger">
            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>
        </div>

    @endif

    <form action="{{ route('admin.applicationqualifications.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">
            <label>Application</label>

            <select name="application_id" class="form-control">

                <option value="">Select Application</option>

                @foreach ($applications as $application)

                    <option value="{{ $application->id }}">
                        {{ $application->application_number }}
                    </option>

                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>Level</label>

            <select name="level" class="form-control">

                <option value="matric">Matric</option>
                <option value="o_level">O Level</option>
                <option value="intermediate">Intermediate</option>
                <option value="a_level">A Level</option>
                <option value="bachelor">Bachelor</option>
                <option value="master">Master</option>
                <option value="other">Other</option>

            </select>
        </div>

        <div class="mb-3">
            <label>Institution</label>

            <input type="text"
                   name="institution"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Board / University</label>

            <input type="text"
                   name="board_university"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Passing Year</label>

            <input type="year"
                   name="passing_year"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Obtained Marks</label>

            <input type="text"
                   name="obtained_marks"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Total Marks</label>

            <input type="text"
                   name="total_marks"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Percentage</label>

            <input type="text"
                   name="percentage"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Grade</label>

            <input type="text"
                   name="grade"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Major Subjects</label>

            <input type="text"
                   name="major_subjects"
                   class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Save
        </button>

    </form>

</div>

@endsection