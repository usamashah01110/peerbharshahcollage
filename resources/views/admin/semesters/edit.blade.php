@extends('admin.main')

@section('content')
<h2 class="mb-3">Edit Semester</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.semesters.update', $semester->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="form-group"><label>Program *</label>
        <select name="program_id" class="form-control" required>
            @foreach($programs as $p)<option value="{{ $p->id }}" {{ old('program_id', $semester->program_id)==$p->id?'selected':'' }}>{{ $p->name }}</option>@endforeach
        </select>
    </div>
    <div class="form-group"><label>Semester Number *</label><input type="number" name="semester_number" value="{{ old('semester_number', $semester->semester_number) }}" class="form-control" min="1" required></div>
    <div class="form-group"><label>Name *</label><input type="text" name="name" value="{{ old('name', $semester->name) }}" class="form-control" required></div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('admin.semesters.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
