@extends('admin.main')

@section('content')
<h2 class="mb-3">Add Material</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.materials.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group"><label>Title *</label><input type="text" name="title" value="{{ old('title') }}" class="form-control" required></div>
    <div class="form-row">
        <div class="form-group col-md-6"><label>Program *</label>
            <select name="program_id" class="form-control" required>
                <option value="">-- Select --</option>
                @foreach($programs as $p)<option value="{{ $p->id }}" {{ old('program_id')==$p->id?'selected':'' }}>{{ $p->name }}</option>@endforeach
            </select>
        </div>
        <div class="form-group col-md-6"><label>Teacher *</label>
            <select name="teacher_id" class="form-control" required>
                <option value="">-- Select --</option>
                @foreach($teachers as $t)<option value="{{ $t->id }}" {{ old('teacher_id')==$t->id?'selected':'' }}>{{ $t->first_name }} {{ $t->last_name }}</option>@endforeach
            </select>
        </div>
    </div>
    <div class="form-group"><label>File *</label><input type="file" name="file" class="form-control-file" required></div>
    <button class="btn btn-success">Save</button>
    <a href="{{ route('admin.materials.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
