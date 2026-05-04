@extends('admin.main')

@section('content')

<h2>Edit Course Outline</h2>

<form action="{{ route('course_outlines.update', $outline->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="mb-3">
    <label>Program</label>
    <select name="program_id" class="form-control">
        @foreach($programs as $program)
            <option value="{{ $program->id }}" 
            {{ $outline->program_id == $program->id ? 'selected' : '' }}>
                {{ $program->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ $outline->description }}</textarea>
</div>

<div class="mb-3">
    <label>Objectives</label>
    <textarea name="objectives" class="form-control">{{ $outline->objectives }}</textarea>
</div>

<div class="mb-3">
    <label>Topics</label>
    <textarea name="topics" class="form-control">{{ $outline->topics }}</textarea>
</div>

<div class="mb-3">
    <label>File</label>
    <input type="file" name="file" class="form-control">
</div>

<button class="btn btn-primary">Update</button>

</form>

@endsection