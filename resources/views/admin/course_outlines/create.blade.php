@extends('admin.main')

@section('content')

<h2>Add Course Outline</h2>

<form action="{{ route('course_outlines.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="mb-3">
    <label>Program</label>
    <select name="program_id" class="form-control">
        @foreach($programs as $program)
            <option value="{{ $program->id }}">{{ $program->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control"></textarea>
</div>

<div class="mb-3">
    <label>Objectives</label>
    <textarea name="objectives" class="form-control"></textarea>
</div>

<div class="mb-3">
    <label>Topics</label>
    <textarea name="topics" class="form-control"></textarea>
</div>

<div class="mb-3">
    <label>File</label>
    <input type="file" name="file" class="form-control">
</div>

<button class="btn btn-success">Save</button>

</form>

@endsection