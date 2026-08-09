@csrf
<div class="form-row">
    <div class="form-group col-md-4"><label>Application Number *</label><input type="text" name="application_number" value="{{ old('application_number', $app->application_number ?? '') }}" class="form-control" required></div>
    <div class="form-group col-md-4"><label>Scholarship *</label>
        <select name="scholarship_id" class="form-control" required>
            <option value="">-- Select --</option>
            @foreach($scholarships as $s)<option value="{{ $s->id }}" {{ old('scholarship_id', $app->scholarship_id ?? '')==$s->id?'selected':'' }}>{{ $s->name }}</option>@endforeach
        </select>
    </div>
    <div class="form-group col-md-4"><label>Student *</label>
        <select name="student_id" class="form-control" required>
            <option value="">-- Select --</option>
            @foreach($students as $s)<option value="{{ $s->id }}" {{ old('student_id', $app->student_id ?? '')==$s->id?'selected':'' }}>{{ $s->registration_number }} — {{ $s->first_name }} {{ $s->last_name }}</option>@endforeach
        </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4"><label>Family Monthly Income</label><input type="number" step="0.01" name="family_monthly_income" value="{{ old('family_monthly_income', $app->family_monthly_income ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-4"><label>Father Occupation</label><input type="text" name="father_occupation" value="{{ old('father_occupation', $app->father_occupation ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-4"><label>Number of Dependents</label><input type="number" name="number_of_dependents" value="{{ old('number_of_dependents', $app->number_of_dependents ?? '') }}" class="form-control"></div>
</div>
<div class="form-row">
    <div class="form-group col-md-4"><label>Other Scholarships</label><input type="text" name="other_scholarships" value="{{ old('other_scholarships', $app->other_scholarships ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-4"><label>Current CGPA</label><input type="number" step="0.01" name="current_cgpa" value="{{ old('current_cgpa', $app->current_cgpa ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-4"><label>Current Semester</label><input type="number" name="current_semester" value="{{ old('current_semester', $app->current_semester ?? '') }}" class="form-control"></div>
</div>
<div class="form-group"><label>Reason for Applying</label><textarea name="reason_for_applying" rows="2" class="form-control">{{ old('reason_for_applying', $app->reason_for_applying ?? '') }}</textarea></div>
<div class="form-group"><label>Achievements</label><textarea name="achievements" rows="2" class="form-control">{{ old('achievements', $app->achievements ?? '') }}</textarea></div>
<div class="form-row">
    <div class="form-group col-md-4"><label>Status *</label>
        <select name="status" class="form-control" required>
            @foreach(['draft','submitted','under_review','approved','rejected','awarded','withdrawn'] as $st)<option value="{{ $st }}" {{ old('status', $app->status ?? 'draft')==$st?'selected':'' }}>{{ ucwords(str_replace('_',' ',$st)) }}</option>@endforeach
        </select>
    </div>
    <div class="form-group col-md-4"><label>Awarded Amount</label><input type="number" step="0.01" name="awarded_amount" value="{{ old('awarded_amount', $app->awarded_amount ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-4"><label>Awarded %</label><input type="number" step="0.01" name="awarded_percentage" value="{{ old('awarded_percentage', $app->awarded_percentage ?? '') }}" class="form-control"></div>
</div>
<div class="form-group"><label>Review Notes</label><textarea name="review_notes" rows="2" class="form-control">{{ old('review_notes', $app->review_notes ?? '') }}</textarea></div>
