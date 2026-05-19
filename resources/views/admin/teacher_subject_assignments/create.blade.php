@extends('admin.main')

@section('content')
<h2 class="mb-3">Add Teacher-Subject Assignment</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.teacher-subject-assignments.store') }}" method="POST">
    @csrf
    <div class="form-group"><label>Teacher *</label>
        <select name="teacher_id" class="form-control" required>
            <option value="">-- Select --</option>
            @foreach($teachers as $t)<option value="{{ $t->id }}" {{ old('teacher_id')==$t->id?'selected':'' }}>{{ $t->employee_id }} — {{ $t->first_name }} {{ $t->last_name }}</option>@endforeach
        </select>
    </div>
    <div class="form-group"><label>Subject *</label>
        <select name="subject_id" class="form-control" required>
            <option value="">-- Select --</option>
            @foreach($subjects as $s)<option value="{{ $s->id }}" {{ old('subject_id')==$s->id?'selected':'' }}>{{ ($s->semester->program->name ?? '?') }} / {{ $s->semester->name ?? '?' }} — {{ $s->name }}</option>@endforeach
        </select>
    </div>
    <div class="form-group"><label>Session *</label>
        <select name="session_id" class="form-control" required>
            <option value="">-- Select --</option>
            @foreach($sessions as $s)<option value="{{ $s->id }}" {{ old('session_id')==$s->id?'selected':'' }}>{{ $s->name }}</option>@endforeach
        </select>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6"><label>Section</label><input type="text" name="section" value="{{ old('section') }}" class="form-control" placeholder="e.g. A"></div>
        <div class="form-group col-md-6 form-check ml-2 mt-4"><input type="checkbox" name="is_active" value="1" id="is_active" class="form-check-input" {{ old('is_active',1)?'checked':'' }}><label for="is_active" class="form-check-label">Active</label></div>
    </div>
    <button class="btn btn-success">Save</button>
    <a href="{{ route('admin.teacher-subject-assignments.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
