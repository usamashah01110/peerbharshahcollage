@extends('admin.main')

@section('content')
<h2 class="mb-3">Edit Subject</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.subjects.update', $subject->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="form-group"><label>Semester *</label>
        <select name="semester_id" class="form-control" required>
            @foreach($semesters as $s)<option value="{{ $s->id }}" {{ old('semester_id', $subject->semester_id)==$s->id?'selected':'' }}>{{ ($s->program->name ?? '?') }} — {{ $s->name }}</option>@endforeach
        </select>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6"><label>Name *</label><input type="text" name="name" value="{{ old('name', $subject->name) }}" class="form-control" required></div>
        <div class="form-group col-md-3"><label>Code *</label><input type="text" name="code" value="{{ old('code', $subject->code) }}" class="form-control" required></div>
        <div class="form-group col-md-3"><label>Credit Hours</label><input type="number" name="credit_hours" value="{{ old('credit_hours', $subject->credit_hours) }}" class="form-control"></div>
    </div>
    <div class="form-group"><label>Description</label><textarea name="description" rows="3" class="form-control">{{ old('description', $subject->description) }}</textarea></div>
    <div class="form-row">
        <div class="form-group col-md-6 form-check ml-2"><input type="checkbox" name="is_elective" value="1" id="is_elective" class="form-check-input" {{ old('is_elective', $subject->is_elective)?'checked':'' }}><label for="is_elective" class="form-check-label">Elective</label></div>
        <div class="form-group col-md-6 form-check ml-2"><input type="checkbox" name="is_active" value="1" id="is_active" class="form-check-input" {{ old('is_active', $subject->is_active)?'checked':'' }}><label for="is_active" class="form-check-label">Active</label></div>
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('admin.subjects.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
