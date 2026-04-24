@extends('admin.main')

@section('content')

<div class="container">
    <h3>Edit Course</h3>

    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="course_name" value="{{ $course->course_name }}" class="form-control mb-2">
        <input type="text" name="course_code" value="{{ $course->course_code }}" class="form-control mb-2">
        <input type="text" name="program" value="{{ $course->program }}" class="form-control mb-2">

        <button class="btn btn-primary">Update</button>
    </form>
</div>

@endsection