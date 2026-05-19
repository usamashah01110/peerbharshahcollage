@csrf
<h5 class="mt-3">Application Info</h5>
<div class="form-row">
    <div class="form-group col-md-4"><label>Application Number *</label><input type="text" name="application_number" value="{{ old('application_number', $app->application_number ?? '') }}" class="form-control" required></div>
    <div class="form-group col-md-4"><label>Applied Program *</label>
        <select name="applied_program_id" class="form-control" required>
            <option value="">-- Select --</option>
            @foreach($programs as $p)<option value="{{ $p->id }}" {{ old('applied_program_id', $app->applied_program_id ?? '')==$p->id?'selected':'' }}>{{ $p->name }}</option>@endforeach
        </select>
    </div>
    <div class="form-group col-md-4"><label>Session *</label>
        <select name="session_id" class="form-control" required>
            <option value="">-- Select --</option>
            @foreach($sessions as $s)<option value="{{ $s->id }}" {{ old('session_id', $app->session_id ?? '')==$s->id?'selected':'' }}>{{ $s->name }}</option>@endforeach
        </select>
    </div>
</div>

<h5 class="mt-3">Personal</h5>
<div class="form-row">
    <div class="form-group col-md-4"><label>First Name *</label><input type="text" name="first_name" value="{{ old('first_name', $app->first_name ?? '') }}" class="form-control" required></div>
    <div class="form-group col-md-4"><label>Last Name *</label><input type="text" name="last_name" value="{{ old('last_name', $app->last_name ?? '') }}" class="form-control" required></div>
    <div class="form-group col-md-4"><label>Father Name *</label><input type="text" name="father_name" value="{{ old('father_name', $app->father_name ?? '') }}" class="form-control" required></div>
</div>
<div class="form-row">
    <div class="form-group col-md-4"><label>Mother Name</label><input type="text" name="mother_name" value="{{ old('mother_name', $app->mother_name ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-4"><label>CNIC *</label><input type="text" name="cnic" value="{{ old('cnic', $app->cnic ?? '') }}" class="form-control" required></div>
    <div class="form-group col-md-4"><label>Date of Birth *</label><input type="date" name="date_of_birth" value="{{ old('date_of_birth', optional($app->date_of_birth ?? null)->format('Y-m-d')) }}" class="form-control" required></div>
</div>
<div class="form-row">
    <div class="form-group col-md-3"><label>Gender *</label>
        <select name="gender" class="form-control" required>
            <option value="">--</option>
            @foreach(['male','female','other'] as $g)<option value="{{ $g }}" {{ old('gender', $app->gender ?? '')==$g?'selected':'' }}>{{ ucfirst($g) }}</option>@endforeach
        </select>
    </div>
    <div class="form-group col-md-3"><label>Nationality</label><input type="text" name="nationality" value="{{ old('nationality', $app->nationality ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-3"><label>Religion</label><input type="text" name="religion" value="{{ old('religion', $app->religion ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-3"><label>Marital Status</label>
        <select name="marital_status" class="form-control">
            <option value="">--</option>
            @foreach(['single','married','divorced','widowed'] as $m)<option value="{{ $m }}" {{ old('marital_status', $app->marital_status ?? '')==$m?'selected':'' }}>{{ ucfirst($m) }}</option>@endforeach
        </select>
    </div>
</div>

<h5 class="mt-3">Contact</h5>
<div class="form-row">
    <div class="form-group col-md-6"><label>Email *</label><input type="email" name="email" value="{{ old('email', $app->email ?? '') }}" class="form-control" required></div>
    <div class="form-group col-md-3"><label>Phone *</label><input type="text" name="phone" value="{{ old('phone', $app->phone ?? '') }}" class="form-control" required></div>
    <div class="form-group col-md-3"><label>Alternate Phone</label><input type="text" name="alternate_phone" value="{{ old('alternate_phone', $app->alternate_phone ?? '') }}" class="form-control"></div>
</div>
<div class="form-group"><label>Present Address *</label><textarea name="present_address" rows="2" class="form-control" required>{{ old('present_address', $app->present_address ?? '') }}</textarea></div>
<div class="form-group"><label>Permanent Address</label><textarea name="permanent_address" rows="2" class="form-control">{{ old('permanent_address', $app->permanent_address ?? '') }}</textarea></div>
<div class="form-row">
    <div class="form-group col-md-4"><label>City *</label><input type="text" name="city" value="{{ old('city', $app->city ?? '') }}" class="form-control" required></div>
    <div class="form-group col-md-4"><label>Province *</label><input type="text" name="province" value="{{ old('province', $app->province ?? '') }}" class="form-control" required></div>
    <div class="form-group col-md-4"><label>Postal Code</label><input type="text" name="postal_code" value="{{ old('postal_code', $app->postal_code ?? '') }}" class="form-control"></div>
</div>

<h5 class="mt-3">Guardian</h5>
<div class="form-row">
    <div class="form-group col-md-4"><label>Guardian Name *</label><input type="text" name="guardian_name" value="{{ old('guardian_name', $app->guardian_name ?? '') }}" class="form-control" required></div>
    <div class="form-group col-md-4"><label>Relation *</label><input type="text" name="guardian_relation" value="{{ old('guardian_relation', $app->guardian_relation ?? '') }}" class="form-control" required></div>
    <div class="form-group col-md-4"><label>Guardian CNIC</label><input type="text" name="guardian_cnic" value="{{ old('guardian_cnic', $app->guardian_cnic ?? '') }}" class="form-control"></div>
</div>
<div class="form-row">
    <div class="form-group col-md-4"><label>Guardian Phone</label><input type="text" name="guardian_phone" value="{{ old('guardian_phone', $app->guardian_phone ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-4"><label>Occupation</label><input type="text" name="guardian_occupation" value="{{ old('guardian_occupation', $app->guardian_occupation ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-4"><label>Monthly Income</label><input type="number" step="0.01" name="guardian_monthly_income" value="{{ old('guardian_monthly_income', $app->guardian_monthly_income ?? '') }}" class="form-control"></div>
</div>

<h5 class="mt-3">Emergency Contact</h5>
<div class="form-row">
    <div class="form-group col-md-6"><label>Name</label><input type="text" name="emergency_contact_name" value="{{ old('emergency_contact_name', $app->emergency_contact_name ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-6"><label>Phone</label><input type="text" name="emergency_contact_phone" value="{{ old('emergency_contact_phone', $app->emergency_contact_phone ?? '') }}" class="form-control"></div>
</div>

<h5 class="mt-3">Status & Scoring</h5>
<div class="form-row">
    <div class="form-group col-md-3"><label>Status *</label>
        <select name="status" class="form-control" required>
            @foreach(['draft','submitted','under_review','shortlisted','admitted','rejected','waitlisted','withdrawn'] as $st)
                <option value="{{ $st }}" {{ old('status', $app->status ?? 'draft')==$st?'selected':'' }}>{{ ucwords(str_replace('_',' ',$st)) }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3"><label>Test Score</label><input type="number" step="0.01" name="test_score" value="{{ old('test_score', $app->test_score ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-3"><label>Interview Score</label><input type="number" step="0.01" name="interview_score" value="{{ old('interview_score', $app->interview_score ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-3"><label>Merit Score</label><input type="number" step="0.01" name="merit_score" value="{{ old('merit_score', $app->merit_score ?? '') }}" class="form-control"></div>
</div>
<div class="form-group"><label>Review Notes</label><textarea name="review_notes" rows="2" class="form-control">{{ old('review_notes', $app->review_notes ?? '') }}</textarea></div>

<div class="form-group"><label>Linked Student (after admission)</label>
    <select name="student_id" class="form-control">
        <option value="">-- None --</option>
        @foreach($students as $s)<option value="{{ $s->id }}" {{ old('student_id', $app->student_id ?? '')==$s->id?'selected':'' }}>{{ $s->first_name }} {{ $s->last_name }} ({{ $s->registration_number }})</option>@endforeach
    </select>
</div>
