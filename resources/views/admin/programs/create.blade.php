@extends('admin.main')

@section('content')
<div class="container">

    <h2>Create Program</h2>

    <form action="{{ route('admin.programs.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Program Code</label>
            <input type="text"
                   name="code"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Program Name</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Department</label>

            <select name="department_id"
                    class="form-control"
                    required>

                <option value="">Select Department</option>

                @foreach($departments as $dept)
                    <option value="{{ $dept->id }}">
                        {{ $dept->name }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>Degree Level</label>

            <select name="degree_level"
                    class="form-control"
                    required>

                <option value="">Select Degree Level</option>

                <option value="intermediate">Intermediate</option>
                <option value="bachelor">Bachelor</option>
                <option value="master">Master</option>
                <option value="mphil">MPhil</option>
                <option value="phd">PhD</option>
                <option value="diploma">Diploma</option>
                <option value="certificate">Certificate</option>

            </select>
        </div>

        <div class="mb-3">
            <label>Total Semesters</label>

            <input type="number"
                   name="total_semesters"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Duration (Years)</label>

            <input type="number"
                   step="0.1"
                   name="duration_years"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Total Credit Hours</label>

            <input type="number"
                   name="total_credit_hours"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Fee Per Semester</label>

            <input type="number"
                   step="0.01"
                   name="fee_per_semester"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>

            <textarea name="description"
                      class="form-control"
                      rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>

            <select name="is_active" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button class="btn btn-success">
            Save
        </button>

    </form>
</div>
@endsection