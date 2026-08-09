@extends('admin.main')

@section('content')
<h2 class="mb-3">Edit Course Outline</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.course-outlines.update', $courseOutline->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="form-group"><label>Program *</label>
        <select name="program_id" class="form-control" required>
            @foreach($programs as $p)<option value="{{ $p->id }}" {{ old('program_id', $courseOutline->program_id)==$p->id?'selected':'' }}>{{ $p->name }}</option>@endforeach
        </select>
    </div>
    <div class="form-group"><label>Description</label><textarea name="description" rows="3" class="form-control">{{ old('description', $courseOutline->description) }}</textarea></div>
    <div class="form-group"><label>Objectives</label><textarea name="objectives" rows="3" class="form-control">{{ old('objectives', $courseOutline->objectives) }}</textarea></div>
    <div class="form-group"><label>Topics</label><textarea name="topics" rows="3" class="form-control">{{ old('topics', $courseOutline->topics) }}</textarea></div>
    <div class="form-group"><label>Replace File (PDF/DOC)</label><input type="file" name="file" class="form-control-file">
        @if($courseOutline->file)<small class="d-block mt-1">Current: <a href="{{ asset('course_outlines/'.$courseOutline->file) }}" target="_blank">{{ $courseOutline->file }}</a></small>@endif
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('admin.course-outlines.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
