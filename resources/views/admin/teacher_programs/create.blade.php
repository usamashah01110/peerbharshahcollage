@extends('admin.main')

@section('content')
<h2 class="mb-3">Add Teacher-Program Assignment</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.teacher-programs.store') }}" method="POST">
    @csrf
    <div class="form-group"><label>Teacher *</label>
        <select name="teacher_id" class="form-control" required>
            <option value="">-- Select --</option>
            @foreach($teachers as $t)<option value="{{ $t->id }}" {{ old('teacher_id')==$t->id?'selected':'' }}>{{ $t->employee_id }} — {{ $t->first_name }} {{ $t->last_name }}</option>@endforeach
        </select>
    </div>
    <div class="form-group"><label>Program *</label>
        <select name="program_id" class="form-control" required>
            <option value="">-- Select --</option>
            @foreach($programs as $p)<option value="{{ $p->id }}" {{ old('program_id')==$p->id?'selected':'' }}>{{ $p->name }}</option>@endforeach
        </select>
    </div>
    <div class="form-group"><label>Assigned Date</label><input type="date" name="assigned_date" value="{{ old('assigned_date') }}" class="form-control"></div>
    <button class="btn btn-success">Save</button>
    <a href="{{ route('admin.teacher-programs.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
