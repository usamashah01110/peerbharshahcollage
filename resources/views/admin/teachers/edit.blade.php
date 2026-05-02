@extends('admin.main')

@section('content')

<h2>Edit Teacher</h2>

<form method="POST" action="{{ route('teachers.update', $teacher->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="{{ $teacher->name }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Department</label>
        <select name="department_id" class="form-control">
            @foreach($departments as $dept)
                <option value="{{ $dept->id }}"
                    {{ $teacher->department_id == $dept->id ? 'selected' : '' }}>
                    {{ $dept->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">Update</button>
</form>

@endsection