@extends('admin.main')

@section('content')

<div class="container mt-4">

    <h2>Edit Qualification</h2>

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('admin.applicationqualifications.update', $qualification->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Application</label>

            <select name="application_id" class="form-control">

                @foreach ($applications as $application)

                    <option value="{{ $application->id }}"
                        {{ $qualification->application_id == $application->id ? 'selected' : '' }}>

                        {{ $application->application_number }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Level</label>

            <select name="level" class="form-control">

                <option value="matric"
                    {{ $qualification->level == 'matric' ? 'selected' : '' }}>
                    Matric
                </option>

                <option value="o_level"
                    {{ $qualification->level == 'o_level' ? 'selected' : '' }}>
                    O Level
                </option>

                <option value="intermediate"
                    {{ $qualification->level == 'intermediate' ? 'selected' : '' }}>
                    Intermediate
                </option>

                <option value="a_level"
                    {{ $qualification->level == 'a_level' ? 'selected' : '' }}>
                    A Level
                </option>

                <option value="bachelor"
                    {{ $qualification->level == 'bachelor' ? 'selected' : '' }}>
                    Bachelor
                </option>

                <option value="master"
                    {{ $qualification->level == 'master' ? 'selected' : '' }}>
                    Master
                </option>

                <option value="other"
                    {{ $qualification->level == 'other' ? 'selected' : '' }}>
                    Other
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label>Institution</label>

            <input type="text"
                   name="institution"
                   value="{{ $qualification->institution }}"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Board / University</label>

            <input type="text"
                   name="board_university"
                   value="{{ $qualification->board_university }}"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Passing Year</label>

            <input type="text"
                   name="passing_year"
                   value="{{ $qualification->passing_year }}"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Obtained Marks</label>

            <input type="text"
                   name="obtained_marks"
                   value="{{ $qualification->obtained_marks }}"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Total Marks</label>

            <input type="text"
                   name="total_marks"
                   value="{{ $qualification->total_marks }}"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Percentage</label>

            <input type="text"
                   name="percentage"
                   value="{{ $qualification->percentage }}"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Grade</label>

            <input type="text"
                   name="grade"
                   value="{{ $qualification->grade }}"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Major Subjects</label>

            <input type="text"
                   name="major_subjects"
                   value="{{ $qualification->major_subjects }}"
                   class="form-control">

        </div>

        <button type="submit"
                class="btn btn-primary">
            Update
        </button>

    </form>

</div>

@endsection