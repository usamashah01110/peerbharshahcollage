@extends('admin.main')

@section('content')

<div class="container mt-4">

    <h2>Add Course Outline</h2>

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('admin.courseoutlines.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">

            <label>Program</label>

            <select name="program_id"
                    class="form-control">

                <option value="">
                    Select Program
                </option>

                @foreach($programs as $program)

                    <option value="{{ $program->id }}">

                        {{ $program->name }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Description</label>

            <textarea name="description"
                      class="form-control"></textarea>

        </div>

        <div class="mb-3">

            <label>Objectives</label>

            <textarea name="objectives"
                      class="form-control"></textarea>

        </div>

        <div class="mb-3">

            <label>Topics</label>

            <textarea name="topics"
                      class="form-control"></textarea>

        </div>

        <div class="mb-3">

            <label>File</label>

            <input type="file"
                   name="file"
                   class="form-control">

        </div>

        <button type="submit"
                class="btn btn-primary">
            Save
        </button>

    </form>

</div>

@endsection