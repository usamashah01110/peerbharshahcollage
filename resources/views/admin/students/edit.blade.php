@extends('admin.main')

@section('content')

<div class="container mt-4">

    <h2>Edit Student</h2>

    <form action="{{ route('admin.students.update', $student->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Registration Number</label>
                <input type="text" name="registration_number"
                       value="{{ $student->registration_number }}"
                       class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Roll Number</label>
                <input type="text" name="roll_number"
                       value="{{ $student->roll_number }}"
                       class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>First Name</label>
                <input type="text" name="first_name"
                       value="{{ $student->first_name }}"
                       class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Last Name</label>
                <input type="text" name="last_name"
                       value="{{ $student->last_name }}"
                       class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="email" name="email"
                       value="{{ $student->email }}"
                       class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Phone</label>
                <input type="text" name="phone"
                       value="{{ $student->phone }}"
                       class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control">{{ $student->address }}</textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label>City</label>
                <input type="text" name="city"
                       value="{{ $student->city }}"
                       class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Province</label>
                <input type="text" name="province"
                       value="{{ $student->province }}"
                       class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Enrollment Date</label>
                <input type="date" name="enrollment_date"
                       value="{{ $student->enrollment_date }}"
                       class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Status</label>
                <select name="status" class="form-control">

                    @foreach(['active','inactive','graduated','dropped','suspended','on_leave'] as $status)

                        <option value="{{ $status }}"
                            {{ $student->status == $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>

                    @endforeach

                </select>
            </div>

        </div>

        <button class="btn btn-primary">Update</button>

    </form>

</div>

@endsection