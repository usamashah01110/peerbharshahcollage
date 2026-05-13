@extends('admin.main')

@section('content')

    <h2 class="mb-3">Add Academic Session</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.academic-sessions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" maxlength="50" required>
            <small class="text-muted">e.g., Fall 2026</small>
        </div>

        <div class="mb-3">
            <label class="form-label">Session Type <span class="text-danger">*</span></label>
            <select name="session_type" class="form-control" required>
                <option value="fall"   {{ old('session_type', 'fall') == 'fall' ? 'selected' : '' }}>Fall</option>
                <option value="spring" {{ old('session_type') == 'spring' ? 'selected' : '' }}>Spring</option>
                <option value="summer" {{ old('session_type') == 'summer' ? 'selected' : '' }}>Summer</option>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Start Date <span class="text-danger">*</span></label>
                <input type="date" name="start_date" value="{{ old('start_date') }}" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">End Date <span class="text-danger">*</span></label>
                <input type="date" name="end_date" value="{{ old('end_date') }}" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Admissions Open Date</label>
                <input type="date" name="admissions_open_date" value="{{ old('admissions_open_date') }}" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Admissions Close Date</label>
                <input type="date" name="admissions_close_date" value="{{ old('admissions_close_date') }}" class="form-control">
            </div>
        </div>

        <div class="mb-3 form-check">
            <input type="hidden" name="is_current" value="0">
            <input type="checkbox" name="is_current" value="1" id="is_current" class="form-check-input"
                {{ old('is_current') ? 'checked' : '' }}>
            <label for="is_current" class="form-check-label">Mark as current session</label>
        </div>

        <div class="mb-3 form-check">
            <input type="hidden" name="is_admissions_open" value="0">
            <input type="checkbox" name="is_admissions_open" value="1" id="is_admissions_open" class="form-check-input"
                {{ old('is_admissions_open') ? 'checked' : '' }}>
            <label for="is_admissions_open" class="form-check-label">Admissions are open</label>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('admin.academic-sessions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

@endsection
