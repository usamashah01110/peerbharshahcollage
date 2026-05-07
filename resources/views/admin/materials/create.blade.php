@extends('admin.main')

@section('content')

<h2>Add Material</h2>

<form action="{{ route('admin.materials.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control">
</div>

<div class="mb-3">
    <label>File</label>
    <input type="file" name="file" class="form-control">
</div>

<div class="mb-3">
    <label>Program</label>
    <select name="program_id" class="form-control">
        @foreach($programs as $program)
        <option value="{{ $program->id }}">{{ $program->program_name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Teacher</label>
    <select name="teacher_id" class="form-control">
        @foreach($teachers as $t)
        <option value="{{ $t->id }}">{{ $t->name }}</option>
        @endforeach
    </select>
</div>

<button class="btn btn-success">Save</button>

</form>

@endsection