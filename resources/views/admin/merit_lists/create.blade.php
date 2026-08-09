@extends('admin.main')

@section('content')
<h2 class="mb-3">Add Merit List Entry</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.merit-lists.store') }}" method="POST">
    @csrf
    <div class="form-group"><label>Student *</label>
        <select name="student_id" class="form-control" required>
            <option value="">-- Select --</option>
            @foreach($students as $s)<option value="{{ $s->id }}" {{ old('student_id')==$s->id?'selected':'' }}>{{ $s->registration_number }} — {{ $s->first_name }} {{ $s->last_name }}</option>@endforeach
        </select>
    </div>
    <div class="form-group"><label>Program *</label>
        <select name="program_id" class="form-control" required>
            <option value="">-- Select --</option>
            @foreach($programs as $p)<option value="{{ $p->id }}" {{ old('program_id')==$p->id?'selected':'' }}>{{ $p->name }}</option>@endforeach
        </select>
    </div>
    <div class="form-group"><label>Marks *</label><input type="number" name="marks" value="{{ old('marks') }}" class="form-control" required></div>
    <button class="btn btn-success">Save</button>
    <a href="{{ route('admin.merit-lists.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
