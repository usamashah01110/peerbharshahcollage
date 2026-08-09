@extends('admin.main')

@section('content')
<h2 class="mb-3">Edit Teacher-Subject Assignment</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.teacher-subject-assignments.update', $assignment->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="form-group"><label>Teacher *</label>
        <select name="teacher_id" class="form-control" required>
            @foreach($teachers as $t)<option value="{{ $t->id }}" {{ old('teacher_id', $assignment->teacher_id)==$t->id?'selected':'' }}>{{ $t->employee_id }} — {{ $t->first_name }} {{ $t->last_name }}</option>@endforeach
        </select>
    </div>
    <div class="form-group"><label>Subject *</label>
        <select name="subject_id" class="form-control" required>
            @foreach($subjects as $s)<option value="{{ $s->id }}" {{ old('subject_id', $assignment->subject_id)==$s->id?'selected':'' }}>{{ ($s->semester->program->name ?? '?') }} / {{ $s->semester->name ?? '?' }} — {{ $s->name }}</option>@endforeach
        </select>
    </div>
    <div class="form-group"><label>Session *</label>
        <select name="session_id" class="form-control" required>
            @foreach($sessions as $s)<option value="{{ $s->id }}" {{ old('session_id', $assignment->session_id)==$s->id?'selected':'' }}>{{ $s->name }}</option>@endforeach
        </select>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6"><label>Section</label><input type="text" name="section" value="{{ old('section', $assignment->section) }}" class="form-control"></div>
        <div class="form-group col-md-6 form-check ml-2 mt-4"><input type="checkbox" name="is_active" value="1" id="is_active" class="form-check-input" {{ old('is_active', $assignment->is_active)?'checked':'' }}><label for="is_active" class="form-check-label">Active</label></div>
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('admin.teacher-subject-assignments.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
