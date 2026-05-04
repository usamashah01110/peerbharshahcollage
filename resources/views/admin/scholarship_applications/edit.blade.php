@extends('admin.main')

@section('content')

<h2>Edit Application</h2>

<form action="{{ route('scholarships.update',$application->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Student</label>
        <select name="student_id" class="form-control">
            @foreach($students as $student)
            <option value="{{ $student->id }}" {{ $student->id == $application->student_id ? 'selected' : '' }}>
                {{ $student->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Scholarship</label>
        <select name="scholarship_id" class="form-control">
            @foreach($scholarships as $sch)
            <option value="{{ $sch->id }}" {{ $sch->id == $application->scholarship_id ? 'selected' : '' }}>
                {{ $sch->title }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="approved" {{ $application->status == 'approved' ? 'selected' : '' }}>Approved</option>
            <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Upload New Document (optional)</label>
        <input type="file" name="document" class="form-control">
    </div>

    <button class="btn btn-primary">Update</button>

</form>

@endsection