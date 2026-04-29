@extends('admin.main')

@section('content')
<div class="container">
    <h2>Edit Student</h2>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $student->name }}" class="form-control mb-2">

        <input type="email" name="email" value="{{ $student->email }}" class="form-control mb-2">

        <select name="department_id" class="form-control mb-2">
            @foreach($departments as $dept)
                <option value="{{ $dept->id }}"
                    {{ $student->department_id == $dept->id ? 'selected' : '' }}>
                    {{ $dept->name }}
                </option>
            @endforeach
        </select>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection