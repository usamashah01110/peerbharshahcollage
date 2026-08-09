@extends('admin.main')

@section('content')
<h2 class="mb-3">Edit Qualification</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.application-qualifications.update', $qualification->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="form-group"><label>Application *</label>
        <select name="application_id" class="form-control" required>
            @foreach($applications as $a)<option value="{{ $a->id }}" {{ old('application_id', $qualification->application_id)==$a->id?'selected':'' }}>{{ $a->application_number }} — {{ $a->first_name }} {{ $a->last_name }}</option>@endforeach
        </select>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3"><label>Level *</label>
            <select name="level" class="form-control" required>
                @foreach(['matric','o_level','intermediate','a_level','bachelor','master','other'] as $l)<option value="{{ $l }}" {{ old('level', $qualification->level)==$l?'selected':'' }}>{{ ucwords(str_replace('_',' ',$l)) }}</option>@endforeach
            </select>
        </div>
        <div class="form-group col-md-6"><label>Institution *</label><input type="text" name="institution" value="{{ old('institution', $qualification->institution) }}" class="form-control" required></div>
        <div class="form-group col-md-3"><label>Board/University *</label><input type="text" name="board_university" value="{{ old('board_university', $qualification->board_university) }}" class="form-control" required></div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2"><label>Passing Year *</label><input type="number" name="passing_year" value="{{ old('passing_year', $qualification->passing_year) }}" class="form-control" required></div>
        <div class="form-group col-md-2"><label>Obtained *</label><input type="number" step="0.01" name="obtained_marks" value="{{ old('obtained_marks', $qualification->obtained_marks) }}" class="form-control" required></div>
        <div class="form-group col-md-2"><label>Total *</label><input type="number" step="0.01" name="total_marks" value="{{ old('total_marks', $qualification->total_marks) }}" class="form-control" required></div>
        <div class="form-group col-md-2"><label>Percentage *</label><input type="number" step="0.01" name="percentage" value="{{ old('percentage', $qualification->percentage) }}" class="form-control" required></div>
        <div class="form-group col-md-2"><label>Grade</label><input type="text" name="grade" value="{{ old('grade', $qualification->grade) }}" class="form-control"></div>
        <div class="form-group col-md-2"><label>Major Subjects</label><input type="text" name="major_subjects" value="{{ old('major_subjects', $qualification->major_subjects) }}" class="form-control"></div>
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('admin.application-qualifications.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
