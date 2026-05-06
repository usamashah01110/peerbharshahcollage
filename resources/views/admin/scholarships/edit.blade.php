@extends('admin.main')

@section('content')

<h2>Add Scholarship</h2>

<form action="{{ route('admin.scholarships.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Title:</label>
        <input type="text" name="title" class="form-control">
    </div>

    <div class="mb-3">
        <label>Description:</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Year:</label>
        <input type="number" name="year" class="form-control">
    </div>

    <button class="btn btn-success">Save</button>
</form>

@endsection