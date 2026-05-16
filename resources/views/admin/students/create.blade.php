@extends('admin.main')

@section('content')

<div class="container mt-4">

    <h2>Add Student</h2>

    <form action="{{ route('admin.students.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Registration Number</label>
                <input type="text" name="registration_number" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Roll Number</label>
                <input type="text" name="roll_number" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Father Name</label>
                <input type="text" name="father_name" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>CNIC</label>
                <input type="text" name="cnic" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Date of Birth</label>
                <input type="date" name="date_of_birth" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Gender</label>
                <select name="gender" class="form-control">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control"></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label>City</label>
                <input type="text" name="city" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Province</label>
                <input type="text" name="province" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
    <label>Program</label>

    <select name="program_id" class="form-control">
        <option value="">-- Select Program --</option>

        @foreach($programs as $program)
            <option value="{{ $program->id }}">
                {{ $program->name }}
            </option>
        @endforeach
    </select>
</div>
           <div class="col-md-6 mb-3">
    <label>Admission Session</label>

    <select name="admission_session_id" class="form-control">
        <option value="">-- Select Session --</option>

        @foreach($sessions as $session)
            <option value="{{ $session->id }}">
                {{ $session->name ?? $session->id }}
            </option>
        @endforeach
    </select>
</div>

            <div class="col-md-6 mb-3">
                <label>Current Semester</label>
                <input type="number" name="current_semester" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Enrollment Date</label>
                <input type="date" name="enrollment_date" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="graduated">Graduated</option>
                    <option value="dropped">Dropped</option>
                    <option value="suspended">Suspended</option>
                    <option value="on_leave">On Leave</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Profile Image</label>
                <input type="file" name="profile_image" class="form-control">
            </div>

        </div>

        <button class="btn btn-primary">Save</button>

    </form>

</div>

@endsection