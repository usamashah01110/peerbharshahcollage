@extends('admin.main')

@section('content')
<div class="container">
    <h2>Add Student</h2>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <input type="text" name="name" class="form-control mb-2" placeholder="Name">

        <input type="email" name="email" class="form-control mb-2" placeholder="Email">

        <select name="department_id" class="form-control mb-2">
            <option value="">Select Department</option>
            @foreach($departments as $dept)
                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
            @endforeach
        </select>

        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection