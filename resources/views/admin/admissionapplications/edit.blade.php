@extends('admin.main')

@section('content')

<div class="container mt-4">

    <h2>Edit Admission Application</h2>

    <form action="{{ route('admin.admissionapplications.update', $application->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6 mb-3">

                <label>Application Number</label>

                <input type="text"
                       name="application_number"
                       value="{{ $application->application_number }}"
                       class="form-control">

            </div>

            <div class="col-md-6 mb-3">

                <label>First Name</label>

                <input type="text"
                       name="first_name"
                       value="{{ $application->first_name }}"
                       class="form-control">

            </div>

            <div class="col-md-6 mb-3">

                <label>Last Name</label>

                <input type="text"
                       name="last_name"
                       value="{{ $application->last_name }}"
                       class="form-control">

            </div>

            <div class="col-md-6 mb-3">

                <label>Father Name</label>

                <input type="text"
                       name="father_name"
                       value="{{ $application->father_name }}"
                       class="form-control">

            </div>

            <div class="col-md-6 mb-3">

                <label>CNIC</label>

                <input type="text"
                       name="cnic"
                       value="{{ $application->cnic }}"
                       class="form-control">

            </div>

            <div class="col-md-6 mb-3">

                <label>Phone</label>

                <input type="text"
                       name="phone"
                       value="{{ $application->phone }}"
                       class="form-control">

            </div>

            <div class="col-md-6 mb-3">

                <label>Email</label>

                <input type="email"
                       name="email"
                       value="{{ $application->email }}"
                       class="form-control">

            </div>

            <div class="col-md-6 mb-3">

                <label>Status</label>

                <select name="status" class="form-control">

                    <option value="draft"
                        {{ $application->status == 'draft' ? 'selected' : '' }}>
                        Draft
                    </option>

                    <option value="submitted"
                        {{ $application->status == 'submitted' ? 'selected' : '' }}>
                        Submitted
                    </option>

                    <option value="under_review"
                        {{ $application->status == 'under_review' ? 'selected' : '' }}>
                        Under Review
                    </option>

                    <option value="shortlisted"
                        {{ $application->status == 'shortlisted' ? 'selected' : '' }}>
                        Shortlisted
                    </option>

                    <option value="admitted"
                        {{ $application->status == 'admitted' ? 'selected' : '' }}>
                        Admitted
                    </option>

                    <option value="rejected"
                        {{ $application->status == 'rejected' ? 'selected' : '' }}>
                        Rejected
                    </option>

                </select>

            </div>

        </div>

        <button type="submit"
                class="btn btn-primary">
            Update
        </button>

    </form>

</div>

@endsection