@extends('admin.main')

@section('content')
<h2 class="mb-3">Add Department</h2>

@if($errors->any())
    <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif

<form action="{{ route('admin.departments.store') }}" method="POST">
    @csrf
    <div class="form-group"><label>Name *</label><input type="text" name="name" value="{{ old('name') }}" class="form-control" required></div>
    <div class="form-group"><label>Code *</label><input type="text" name="code" value="{{ old('code') }}" class="form-control" required><small class="text-muted">Unique short code (e.g., CS, ENG)</small></div>
    <div class="form-group"><label>Description</label><textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea></div>
    <div class="form-group">
        <label>Head of Department (Teacher)</label>
        <select name="hod_id" class="form-control">
            <option value="">-- None --</option>
            @foreach($teachers as $t)
                <option value="{{ $t->id }}" {{ old('hod_id') == $t->id ? 'selected' : '' }}>{{ $t->first_name }} {{ $t->last_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group"><label>Established Date</label><input type="date" name="established_date" value="{{ old('established_date') }}" class="form-control"></div>
    <div class="form-group">
        <label>Status *</label>
        <select name="is_active" class="form-control" required>
            <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('is_active') === '0' ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
