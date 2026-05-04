@extends('admin.main')

@section('content')

<h2>Add Department</h2>

<form action="{{ route('admin.departments.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Name:</label>
        <input type="text" name="name" class="form-control">
    </div>

    <button class="btn btn-success">Save</button>
</form>

@endsection