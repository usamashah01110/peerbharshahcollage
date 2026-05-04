@extends('admin.main')

@section('content')

<h2>Edit Department</h2>

<form action="{{ route('admin.departments.update', $department->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Name:</label>
        <input type="text" name="name" value="{{ $department->name }}" class="form-control">
    </div>

    <button class="btn btn-primary">Update</button>
</form>

@endsection