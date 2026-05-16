@extends('admin.main')

@section('content')
<div class="container">

    <h2>Edit Program</h2>

    <form action="{{ route('admin.programs.update', $program->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Program Code</label>

            <input type="text"
                   name="code"
                   value="{{ $program->code }}"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Program Name</label>

            <input type="text"
                   name="name"
                   value="{{ $program->name }}"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Department</label>

            <select name="department_id"
                    class="form-control"
                    required>

                @foreach($departments as $dept)

                    <option value="{{ $dept->id }}"
                        {{ $program->department_id == $dept->id ? 'selected' : '' }}>

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

                <option value="intermediate"
                    {{ $program->degree_level == 'intermediate' ? 'selected' : '' }}>
                    Intermediate
                </option>

                <option value="bachelor"
                    {{ $program->degree_level == 'bachelor' ? 'selected' : '' }}>
                    Bachelor
                </option>

                <option value="master"
                    {{ $program->degree_level == 'master' ? 'selected' : '' }}>
                    Master
                </option>

                <option value="mphil"
                    {{ $program->degree_level == 'mphil' ? 'selected' : '' }}>
                    MPhil
                </option>

                <option value="phd"
                    {{ $program->degree_level == 'phd' ? 'selected' : '' }}>
                    PhD
                </option>

                <option value="diploma"
                    {{ $program->degree_level == 'diploma' ? 'selected' : '' }}>
                    Diploma
                </option>

                <option value="certificate"
                    {{ $program->degree_level == 'certificate' ? 'selected' : '' }}>
                    Certificate
                </option>

            </select>
        </div>

        <div class="mb-3">
            <label>Total Semesters</label>

            <input type="number"
                   name="total_semesters"
                   value="{{ $program->total_semesters }}"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Duration (Years)</label>

            <input type="number"
                   step="0.1"
                   name="duration_years"
                   value="{{ $program->duration_years }}"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Total Credit Hours</label>

            <input type="number"
                   name="total_credit_hours"
                   value="{{ $program->total_credit_hours }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Fee Per Semester</label>

            <input type="number"
                   step="0.01"
                   name="fee_per_semester"
                   value="{{ $program->fee_per_semester }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>

            <textarea name="description"
                      class="form-control"
                      rows="4">{{ $program->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>

            <select name="is_active" class="form-control">

                <option value="1"
                    {{ $program->is_active ? 'selected' : '' }}>
                    Active
                </option>

                <option value="0"
                    {{ !$program->is_active ? 'selected' : '' }}>
                    Inactive
                </option>

            </select>
        </div>

        <button class="btn btn-primary">
            Update
        </button>

    </form>
</div>
@endsection