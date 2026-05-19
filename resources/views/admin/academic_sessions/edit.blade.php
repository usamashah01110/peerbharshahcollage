@extends('admin.main')

@section('content')
<h2 class="mb-3">Edit Academic Session</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.academic-sessions.update', $session->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="form-group"><label>Name *</label><input type="text" name="name" value="{{ old('name', $session->name) }}" class="form-control" required></div>
    <div class="form-group"><label>Type *</label>
        <select name="session_type" class="form-control" required>
            @foreach(['fall','spring','summer'] as $t)<option value="{{ $t }}" {{ old('session_type', $session->session_type)==$t?'selected':'' }}>{{ ucfirst($t) }}</option>@endforeach
        </select>
    </div>
    <div class="form-group"><label>Start Date *</label><input type="date" name="start_date" value="{{ old('start_date', optional($session->start_date)->format('Y-m-d')) }}" class="form-control" required></div>
    <div class="form-group"><label>End Date *</label><input type="date" name="end_date" value="{{ old('end_date', optional($session->end_date)->format('Y-m-d')) }}" class="form-control" required></div>
    <div class="form-group"><label>Is Current *</label>
        <select name="is_current" class="form-control" required>
            <option value="0" {{ !old('is_current', $session->is_current)?'selected':'' }}>No</option>
            <option value="1" {{ old('is_current', $session->is_current)?'selected':'' }}>Yes</option>
        </select>
    </div>
    <div class="form-group"><label>Admissions Open *</label>
        <select name="is_admissions_open" class="form-control" required>
            <option value="0" {{ !old('is_admissions_open', $session->is_admissions_open)?'selected':'' }}>Closed</option>
            <option value="1" {{ old('is_admissions_open', $session->is_admissions_open)?'selected':'' }}>Open</option>
        </select>
    </div>
    <div class="form-group"><label>Admissions Open Date</label><input type="date" name="admissions_open_date" value="{{ old('admissions_open_date', optional($session->admissions_open_date)->format('Y-m-d')) }}" class="form-control"></div>
    <div class="form-group"><label>Admissions Close Date</label><input type="date" name="admissions_close_date" value="{{ old('admissions_close_date', optional($session->admissions_close_date)->format('Y-m-d')) }}" class="form-control"></div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('admin.academic-sessions.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
