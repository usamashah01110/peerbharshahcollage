@extends('admin.main')

@section('content')
<h2 class="mb-3">Add Program</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.programs.store') }}" method="POST">
    @csrf
    <div class="form-group"><label>Department *</label>
        <select name="department_id" class="form-control" required>
            <option value="">-- Select --</option>
            @foreach($departments as $d)<option value="{{ $d->id }}" {{ old('department_id')==$d->id?'selected':'' }}>{{ $d->name }}</option>@endforeach
        </select>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6"><label>Name *</label><input type="text" name="name" value="{{ old('name') }}" class="form-control" required></div>
        <div class="form-group col-md-3"><label>Code *</label><input type="text" name="code" value="{{ old('code') }}" class="form-control" required></div>
        <div class="form-group col-md-3"><label>Degree Level *</label>
            <select name="degree_level" class="form-control" required>
                @foreach(['intermediate','bachelor','master','mphil','phd','diploma','certificate'] as $l)<option value="{{ $l }}" {{ old('degree_level')==$l?'selected':'' }}>{{ ucfirst($l) }}</option>@endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3"><label>Total Semesters *</label><input type="number" name="total_semesters" value="{{ old('total_semesters') }}" class="form-control" required></div>
        <div class="form-group col-md-3"><label>Duration (years) *</label><input type="number" step="0.1" name="duration_years" value="{{ old('duration_years') }}" class="form-control" required></div>
        <div class="form-group col-md-3"><label>Total Credit Hours</label><input type="number" name="total_credit_hours" value="{{ old('total_credit_hours') }}" class="form-control"></div>
        <div class="form-group col-md-3"><label>Fee per Semester</label><input type="number" step="0.01" name="fee_per_semester" value="{{ old('fee_per_semester') }}" class="form-control"></div>
    </div>
    <div class="form-group"><label>Description</label><textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea></div>
    <div class="form-group"><label>Active *</label>
        <select name="is_active" class="form-control" required>
            <option value="1" {{ old('is_active',1)==1?'selected':'' }}>Yes</option>
            <option value="0" {{ old('is_active')==='0'?'selected':'' }}>No</option>
        </select>
    </div>
    <button class="btn btn-success">Save</button>
    <a href="{{ route('admin.programs.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
