@extends('admin.main')

@section('content')

<div class="container">
    <h3>Add Course</h3>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <input type="text" name="course_name" placeholder="Course Name" class="form-control mb-2">
        <input type="text" name="course_code" placeholder="Code" class="form-control mb-2">
        <input type="text" name="program" placeholder="Program" class="form-control mb-2">

        <button class="btn btn-success">Save</button>
    </form>
</div>

@endsection