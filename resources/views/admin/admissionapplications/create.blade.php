@extends('admin.main')

@section('content')

<div class="container mt-4">

    <h2>Add Admission Application</h2>

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('admin.admissionapplications.store') }}"
          method="POST">

        @csrf

        <div class="row">

            <!-- Program -->
            <div class="col-md-6 mb-3">

                <label>Program</label>

                <select name="applied_program_id"
                        class="form-control"
                        required>

                    <option value="">
                        Select Program
                    </option>

                    @foreach($programs as $program)

                        <option value="{{ $program->id }}">

                            {{ $program->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- Session -->
            <div class="col-md-6 mb-3">

                <label>Session</label>

                <select name="session_id"
                        class="form-control"
                        required>

                    <option value="">
                        Select Session
                    </option>

                    @foreach($sessions as $session)

                        <option value="{{ $session->id }}">

                            {{ $session->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- Application Number -->
            <div class="col-md-6 mb-3">

                <label>Application Number</label>

                <input type="text"
                       name="application_number"
                       class="form-control"
                       required>

            </div>

            <!-- First Name -->
            <div class="col-md-6 mb-3">

                <label>First Name</label>

                <input type="text"
                       name="first_name"
                       class="form-control"
                       required>

            </div>

            <!-- Last Name -->
            <div class="col-md-6 mb-3">

                <label>Last Name</label>

                <input type="text"
                       name="last_name"
                       class="form-control"
                       required>

            </div>

            <!-- Father Name -->
            <div class="col-md-6 mb-3">

                <label>Father Name</label>

                <input type="text"
                       name="father_name"
                       class="form-control"
                       required>

            </div>

            <!-- CNIC -->
            <div class="col-md-6 mb-3">

                <label>CNIC</label>

                <input type="text"
                       name="cnic"
                       class="form-control"
                       required>

            </div>

            <!-- DOB -->
            <div class="col-md-6 mb-3">

                <label>Date of Birth</label>

                <input type="date"
                       name="date_of_birth"
                       class="form-control"
                       required>

            </div>

            <!-- Gender -->
            <div class="col-md-6 mb-3">

                <label>Gender</label>

                <select name="gender"
                        class="form-control">

                    <option value="male">Male</option>

                    <option value="female">Female</option>

                    <option value="other">Other</option>

                </select>

            </div>

            <!-- Email -->
            <div class="col-md-6 mb-3">

                <label>Email</label>

                <input type="email"
                       name="email"
                       class="form-control"
                       required>

            </div>

            <!-- Phone -->
            <div class="col-md-6 mb-3">

                <label>Phone</label>

                <input type="text"
                       name="phone"
                       class="form-control"
                       required>

            </div>

            <!-- City -->
            <div class="col-md-6 mb-3">

                <label>City</label>

                <input type="text"
                       name="city"
                       class="form-control"
                       required>

            </div>

            <!-- Province -->
            <div class="col-md-6 mb-3">

                <label>Province</label>

                <input type="text"
                       name="province"
                       class="form-control"
                       required>

            </div>

            <!-- Address -->
            <div class="col-md-12 mb-3">

                <label>Present Address</label>

                <textarea name="present_address"
                          class="form-control"
                          required></textarea>

            </div>

            <!-- Guardian -->
            <div class="col-md-6 mb-3">

                <label>Guardian Name</label>

                <input type="text"
                       name="guardian_name"
                       class="form-control"
                       required>

            </div>

            <!-- Relation -->
            <div class="col-md-6 mb-3">

                <label>Guardian Relation</label>

                <input type="text"
                       name="guardian_relation"
                       class="form-control"
                       required>

            </div>

            <!-- Status -->
            <div class="col-md-6 mb-3">

                <label>Status</label>

                <select name="status"
                        class="form-control">

                    <option value="draft">Draft</option>

                    <option value="submitted">Submitted</option>

                    <option value="under_review">Under Review</option>

                    <option value="shortlisted">Shortlisted</option>

                    <option value="admitted">Admitted</option>

                    <option value="rejected">Rejected</option>

                </select>

            </div>

        </div>

        <button type="submit"
                class="btn btn-primary">
            Save
        </button>

    </form>

</div>

@endsection