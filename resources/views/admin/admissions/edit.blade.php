@extends('admin.main')

@section('content')
<h2 class="mb-3">Edit Admission</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.admissions.update', $admission->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="form-group"><label>Student *</label>
        <select name="student_id" class="form-control" required>
            @foreach($students as $s)<option value="{{ $s->id }}" {{ old('student_id', $admission->student_id)==$s->id?'selected':'' }}>{{ $s->registration_number }} — {{ $s->first_name }} {{ $s->last_name }}</option>@endforeach
        </select>
    </div>
    <div class="form-group"><label>Program *</label>
        <select name="program_id" class="form-control" required>
            @foreach($programs as $p)<option value="{{ $p->id }}" {{ old('program_id', $admission->program_id)==$p->id?'selected':'' }}>{{ $p->name }}</option>@endforeach
        </select>
    </div>
    <div class="form-group"><label>Admission Date *</label><input type="date" name="admission_date" value="{{ old('admission_date', optional($admission->admission_date)->format('Y-m-d')) }}" class="form-control" required></div>
    <div class="form-group"><label>Status *</label><input type="text" name="status" value="{{ old('status', $admission->status) }}" class="form-control" required></div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('admin.admissions.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
