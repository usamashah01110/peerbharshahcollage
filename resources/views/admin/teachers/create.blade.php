@extends('admin.main')

@section('content')

<h2>Add Teacher</h2>

<form method="POST" action="{{ route('admin.teachers.store') }}">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label>Department</label>
        <select name="department_id" class="form-control">
            @foreach($departments as $dept)
                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Save</button>
</form>

@endsection