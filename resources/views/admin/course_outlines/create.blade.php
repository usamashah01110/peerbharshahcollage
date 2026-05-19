@extends('admin.main')

@section('content')
<h2 class="mb-3">Add Course Outline</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.course-outlines.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group"><label>Program *</label>
        <select name="program_id" class="form-control" required>
            <option value="">-- Select --</option>
            @foreach($programs as $p)<option value="{{ $p->id }}" {{ old('program_id')==$p->id?'selected':'' }}>{{ $p->name }}</option>@endforeach
        </select>
        <small class="text-muted">Only programs without an outline are listed.</small>
    </div>
    <div class="form-group"><label>Description</label><textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea></div>
    <div class="form-group"><label>Objectives</label><textarea name="objectives" rows="3" class="form-control">{{ old('objectives') }}</textarea></div>
    <div class="form-group"><label>Topics</label><textarea name="topics" rows="3" class="form-control">{{ old('topics') }}</textarea></div>
    <div class="form-group"><label>File (PDF/DOC)</label><input type="file" name="file" class="form-control-file"></div>
    <button class="btn btn-success">Save</button>
    <a href="{{ route('admin.course-outlines.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
