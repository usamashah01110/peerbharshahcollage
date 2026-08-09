@csrf
<div class="form-row">
    <div class="form-group col-md-4"><label>Registration Number *</label><input type="text" name="registration_number" value="{{ old('registration_number', $student->registration_number ?? '') }}" class="form-control" required></div>
    <div class="form-group col-md-4"><label>Roll Number</label><input type="text" name="roll_number" value="{{ old('roll_number', $student->roll_number ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-4"><label>Status *</label>
        <select name="status" class="form-control" required>
            @foreach(['active','inactive','graduated','dropped','suspended','on_leave'] as $st)<option value="{{ $st }}" {{ old('status', $student->status ?? 'active')==$st?'selected':'' }}>{{ ucwords(str_replace('_',' ',$st)) }}</option>@endforeach
        </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4"><label>First Name *</label><input type="text" name="first_name" value="{{ old('first_name', $student->first_name ?? '') }}" class="form-control" required></div>
    <div class="form-group col-md-4"><label>Last Name *</label><input type="text" name="last_name" value="{{ old('last_name', $student->last_name ?? '') }}" class="form-control" required></div>
    <div class="form-group col-md-4"><label>Father Name</label><input type="text" name="father_name" value="{{ old('father_name', $student->father_name ?? '') }}" class="form-control"></div>
</div>
<div class="form-row">
    <div class="form-group col-md-6"><label>Email *</label><input type="email" name="email" value="{{ old('email', $student->email ?? '') }}" class="form-control" required></div>
    <div class="form-group col-md-3"><label>Phone</label><input type="text" name="phone" value="{{ old('phone', $student->phone ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-3"><label>CNIC</label><input type="text" name="cnic" value="{{ old('cnic', $student->cnic ?? '') }}" class="form-control"></div>
</div>
<div class="form-row">
    <div class="form-group col-md-3"><label>Date of Birth</label><input type="date" name="date_of_birth" value="{{ old('date_of_birth', optional($student->date_of_birth ?? null)->format('Y-m-d')) }}" class="form-control"></div>
    <div class="form-group col-md-3"><label>Gender</label>
        <select name="gender" class="form-control">
            <option value="">--</option>
            @foreach(['male','female','other'] as $g)<option value="{{ $g }}" {{ old('gender', $student->gender ?? '')==$g?'selected':'' }}>{{ ucfirst($g) }}</option>@endforeach
        </select>
    </div>
    <div class="form-group col-md-3"><label>City</label><input type="text" name="city" value="{{ old('city', $student->city ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-3"><label>Province</label><input type="text" name="province" value="{{ old('province', $student->province ?? '') }}" class="form-control"></div>
</div>
<div class="form-group"><label>Address</label><textarea name="address" rows="2" class="form-control">{{ old('address', $student->address ?? '') }}</textarea></div>
<div class="form-row">
    <div class="form-group col-md-4"><label>Program *</label>
        <select name="program_id" class="form-control" required>
            <option value="">-- Select --</option>
            @foreach($programs as $p)<option value="{{ $p->id }}" {{ old('program_id', $student->program_id ?? '')==$p->id?'selected':'' }}>{{ $p->name }}</option>@endforeach
        </select>
    </div>
    <div class="form-group col-md-4"><label>Admission Session *</label>
        <select name="admission_session_id" class="form-control" required>
            <option value="">-- Select --</option>
            @foreach($sessions as $s)<option value="{{ $s->id }}" {{ old('admission_session_id', $student->admission_session_id ?? '')==$s->id?'selected':'' }}>{{ $s->name }}</option>@endforeach
        </select>
    </div>
    <div class="form-group col-md-4"><label>Current Semester</label><input type="number" name="current_semester" min="1" value="{{ old('current_semester', $student->current_semester ?? '') }}" class="form-control"></div>
</div>
<div class="form-row">
    <div class="form-group col-md-6"><label>Enrollment Date *</label><input type="date" name="enrollment_date" value="{{ old('enrollment_date', optional($student->enrollment_date ?? null)->format('Y-m-d')) }}" class="form-control" required></div>
    <div class="form-group col-md-6"><label>Linked Admission Application</label>
        <select name="admission_application_id" class="form-control">
            <option value="">-- None --</option>
            @foreach($applications as $a)<option value="{{ $a->id }}" {{ old('admission_application_id', $student->admission_application_id ?? '')==$a->id?'selected':'' }}>{{ $a->application_number }} — {{ $a->first_name }} {{ $a->last_name }}</option>@endforeach
        </select>
    </div>
</div>
<div class="form-group"><label>Profile Image</label><input type="file" name="profile_image" class="form-control-file">
    @if(!empty($student) && $student->profile_image)<small class="d-block mt-1">Current: {{ $student->profile_image }}</small>@endif
</div>
