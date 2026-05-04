@extends('admin.main')

@section('content')

<h2>Edit Material</h2>

<form action="{{ route('materials.update', $material->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" value="{{ $material->title }}" class="form-control">
</div>

<div class="mb-3">
    <label>File</label>
    <input type="file" name="file" class="form-control">
</div>

<div class="mb-3">
    <label>Program</label>
    <select name="program_id" class="form-control">
        @foreach($programs as $p)
        <option value="{{ $p->id }}" {{ $material->program_id == $p->id ? 'selected' : '' }}>
            {{ $p->name }}
        </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Teacher</label>
    <select name="teacher_id" class="form-control">
        @foreach($teachers as $t)
        <option value="{{ $t->id }}" {{ $material->teacher_id == $t->id ? 'selected' : '' }}>
            {{ $t->name }}
        </option>
        @endforeach
    </select>
</div>

<button class="btn btn-primary">Update</button>

</form>

@endsection