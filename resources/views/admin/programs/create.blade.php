@extends('admin.main')

@section('content')
<div class="container">
    <h2>Create Program</h2>

    <form action="{{ route('programs.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Program Code</label>
            <input type="text" name="program_code" class="form-control">
        </div>

        <div class="mb-3">
            <label>Program Name</label>
            <input type="text" name="program_name" class="form-control">
        </div>

       <div class="mb-3">
    <select name="department_id" class="form-control" required>
    <option value="">Select Department</option>

    @foreach($departments as $dept)
        <option value="{{ $dept->id }}">
            {{ $dept->name }}
        </option>
    @endforeach
</select>

        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection