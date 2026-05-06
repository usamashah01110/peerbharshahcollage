@extends('admin.main')

@section('content')

<h2>Apply for Scholarship</h2>

<form action="{{ route('admin.scholarship_applications.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Student</label>
        <select name="student_id" class="form-control">
            @foreach($students as $student)
            <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Scholarship</label>
        <select name="scholarship_id" class="form-control">
            @foreach($scholarships as $sch)
            <option value="{{ $sch->id }}">{{ $sch->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Upload Document</label>
        <input type="file" name="document" class="form-control">
    </div>

    <button class="btn btn-success">Apply</button>

</form>

@endsection