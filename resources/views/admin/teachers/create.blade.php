@extends('admin.main')

@section('content')

<h2>Add Teacher</h2>

<form method="POST" action="{{ route('admin.teachers.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Employee ID</label>
        <input type="text" name="employee_id" class="form-control">
    </div>

    <div class="mb-3">
        <label>First Name</label>
        <input type="text" name="first_name" class="form-control">
    </div>

    <div class="mb-3">
        <label>Last Name</label>
        <input type="text" name="last_name" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
    </div>

    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control">
    </div>

    <div class="mb-3">
        <label>CNIC</label>
        <input type="text" name="cnic" class="form-control">
    </div>

    <div class="mb-3">
        <label>Gender</label>
        <select name="gender" class="form-control">
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Date of Birth</label>
        <input type="date" name="date_of_birth" class="form-control">
    </div>

    <div class="mb-3">
        <label>Department</label>
        <select name="department_id" class="form-control">
            @foreach($departments as $dept)
                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Designation</label>
        <select name="designation" class="form-control">
            <option value="professor">Professor</option>
            <option value="associate_professor">Associate Professor</option>
            <option value="assistant_professor">Assistant Professor</option>
            <option value="lecturer">Lecturer</option>
            <option value="instructor">Instructor</option>
            <option value="visiting">Visiting</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Qualification</label>
        <input type="text" name="qualification" class="form-control">
    </div>

    <div class="mb-3">
        <label>Specialisation</label>
        <input type="text" name="specialisation" class="form-control">
    </div>

    <div class="mb-3">
        <label>Joining Date</label>
        <input type="date" name="joining_date" class="form-control">
    </div>

    <div class="mb-3">
        <label>Profile Image</label>
        <input type="file" name="profile_image" class="form-control">
    </div>

    <div class="mb-3">
        <label>Bio</label>
        <textarea name="bio" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
            <option value="on_leave">On Leave</option>
            <option value="retired">Retired</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Save Teacher</button>

</form>

@endsection