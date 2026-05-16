@extends('admin.main')

@section('content')

<div class="container mt-4">

    <h2>Edit Course Outline</h2>

    <form action="{{ route('admin.courseoutlines.update', $courseOutline->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        @method('PUT')

        <div class="mb-3">

            <label>Program</label>

            <select name="program_id"
                    class="form-control">

                @foreach($programs as $program)

                    <option value="{{ $program->id }}"
                        {{ $courseOutline->program_id == $program->id ? 'selected' : '' }}>

                        {{ $program->name }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Description</label>

            <textarea name="description"
                      class="form-control">{{ $courseOutline->description }}</textarea>

        </div>

        <div class="mb-3">

            <label>Objectives</label>

            <textarea name="objectives"
                      class="form-control">{{ $courseOutline->objectives }}</textarea>

        </div>

        <div class="mb-3">

            <label>Topics</label>

            <textarea name="topics"
                      class="form-control">{{ $courseOutline->topics }}</textarea>

        </div>

        <div class="mb-3">

            <label>Upload New File</label>

            <input type="file"
                   name="file"
                   class="form-control">

        </div>

        <button type="submit"
                class="btn btn-primary">

            Update

        </button>

    </form>

</div>

@endsection