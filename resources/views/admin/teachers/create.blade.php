@extends('admin.main')

@section('content')
<h2 class="mb-3">Add Teacher</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-4"><label>Employee ID *</label><input type="text" name="employee_id" value="{{ old('employee_id') }}" class="form-control" required></div>
        <div class="form-group col-md-4"><label>First Name *</label><input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" required></div>
        <div class="form-group col-md-4"><label>Last Name *</label><input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" required></div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6"><label>Email *</label><input type="email" name="email" value="{{ old('email') }}" class="form-control" required></div>
        <div class="form-group col-md-3"><label>Phone</label><input type="text" name="phone" value="{{ old('phone') }}" class="form-control"></div>
        <div class="form-group col-md-3"><label>CNIC</label><input type="text" name="cnic" value="{{ old('cnic') }}" class="form-control"></div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3"><label>Gender</label>
            <select name="gender" class="form-control">
                <option value="">-- Select --</option>
                @foreach(['male','female','other'] as $g)<option value="{{ $g }}" {{ old('gender')==$g?'selected':'' }}>{{ ucfirst($g) }}</option>@endforeach
            </select>
        </div>
        <div class="form-group col-md-3"><label>Date of Birth</label><input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control"></div>
        <div class="form-group col-md-3"><label>Joining Date</label><input type="date" name="joining_date" value="{{ old('joining_date') }}" class="form-control"></div>
        <div class="form-group col-md-3"><label>Department *</label>
            <select name="department_id" class="form-control" required>
                <option value="">-- Select --</option>
                @foreach($departments as $d)<option value="{{ $d->id }}" {{ old('department_id')==$d->id?'selected':'' }}>{{ $d->name }}</option>@endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4"><label>Designation *</label>
            <select name="designation" class="form-control" required>
                @foreach(['professor','associate_professor','assistant_professor','lecturer','instructor','visiting'] as $d)
                    <option value="{{ $d }}" {{ old('designation')==$d?'selected':'' }}>{{ ucwords(str_replace('_',' ',$d)) }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4"><label>Qualification</label><input type="text" name="qualification" value="{{ old('qualification') }}" class="form-control"></div>
        <div class="form-group col-md-4"><label>Specialisation</label><input type="text" name="specialisation" value="{{ old('specialisation') }}" class="form-control"></div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6"><label>Status *</label>
            <select name="status" class="form-control" required>
                @foreach(['active','inactive','on_leave','retired'] as $s)<option value="{{ $s }}" {{ old('status','active')==$s?'selected':'' }}>{{ ucwords(str_replace('_',' ',$s)) }}</option>@endforeach
            </select>
        </div>
        <div class="form-group col-md-6"><label>Profile Image</label><input type="file" name="profile_image" class="form-control-file"></div>
    </div>
    <div class="form-group"><label>Bio</label><textarea name="bio" rows="3" class="form-control">{{ old('bio') }}</textarea></div>
    <button class="btn btn-success">Save</button>
    <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
