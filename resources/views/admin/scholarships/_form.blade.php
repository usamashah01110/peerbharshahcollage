@csrf
<div class="form-row">
    <div class="form-group col-md-8"><label>Name *</label><input type="text" name="name" value="{{ old('name', $sch->name ?? '') }}" class="form-control" required></div>
    <div class="form-group col-md-4"><label>Slug</label><input type="text" name="slug" value="{{ old('slug', $sch->slug ?? '') }}" class="form-control" placeholder="auto-generated"></div>
</div>
<div class="form-group"><label>Description *</label><textarea name="description" rows="3" class="form-control" required>{{ old('description', $sch->description ?? '') }}</textarea></div>
<div class="form-row">
    <div class="form-group col-md-3"><label>Type *</label>
        <select name="type" class="form-control" required>
            @foreach(['merit','need_based','sports','minority','disability','other'] as $t)<option value="{{ $t }}" {{ old('type', $sch->type ?? 'merit')==$t?'selected':'' }}>{{ ucwords(str_replace('_',' ',$t)) }}</option>@endforeach
        </select>
    </div>
    <div class="form-group col-md-3"><label>Award Amount</label><input type="number" step="0.01" name="award_amount" value="{{ old('award_amount', $sch->award_amount ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-3"><label>Fee Waiver %</label><input type="number" step="0.01" name="fee_waiver_percentage" value="{{ old('fee_waiver_percentage', $sch->fee_waiver_percentage ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-3"><label>Duration (semesters)</label><input type="number" name="duration_semesters" value="{{ old('duration_semesters', $sch->duration_semesters ?? '') }}" class="form-control"></div>
</div>
<div class="form-group"><label>Eligibility Criteria *</label><textarea name="eligibility_criteria" rows="3" class="form-control" required>{{ old('eligibility_criteria', $sch->eligibility_criteria ?? '') }}</textarea></div>
<div class="form-row">
    <div class="form-group col-md-4"><label>Minimum CGPA</label><input type="number" step="0.01" name="minimum_cgpa" value="{{ old('minimum_cgpa', $sch->minimum_cgpa ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-4"><label>Max Family Income</label><input type="number" step="0.01" name="maximum_family_income" value="{{ old('maximum_family_income', $sch->maximum_family_income ?? '') }}" class="form-control"></div>
    <div class="form-group col-md-4"><label>Max Recipients</label><input type="number" name="max_recipients" value="{{ old('max_recipients', $sch->max_recipients ?? '') }}" class="form-control"></div>
</div>
<div class="form-group"><label>Eligible Programs (multi)</label>
    <select name="eligible_program_ids[]" class="form-control" multiple size="5">
        @php $selProgs = old('eligible_program_ids', $sch->eligible_program_ids ?? []); @endphp
        @foreach($programs as $p)<option value="{{ $p->id }}" {{ in_array($p->id, (array)$selProgs)?'selected':'' }}>{{ $p->name }}</option>@endforeach
    </select>
</div>
<div class="form-group"><label>Eligible Semesters (comma-separated numbers)</label>
    @php $selSems = old('eligible_semesters', $sch->eligible_semesters ?? []); $selSemsStr = is_array($selSems) ? implode(',', $selSems) : $selSems; @endphp
    <input type="text" name="eligible_semesters_csv" value="{{ $selSemsStr }}" class="form-control" placeholder="e.g. 1,2,3" id="eligible_semesters_csv">
    <input type="hidden" name="_eligible_semesters_hidden">
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const csv = document.getElementById('eligible_semesters_csv');
        csv.form.addEventListener('submit', function() {
            const arr = csv.value.split(',').map(s => s.trim()).filter(Boolean);
            csv.name = '';
            arr.forEach(v => {
                const inp = document.createElement('input');
                inp.type = 'hidden';
                inp.name = 'eligible_semesters[]';
                inp.value = v;
                csv.form.appendChild(inp);
            });
        });
    });
    </script>
</div>
<div class="form-row">
    <div class="form-group col-md-4"><label>Application Open *</label><input type="datetime-local" name="application_open_date" value="{{ old('application_open_date', optional($sch->application_open_date ?? null)->format('Y-m-d\TH:i')) }}" class="form-control" required></div>
    <div class="form-group col-md-4"><label>Application Close *</label><input type="datetime-local" name="application_close_date" value="{{ old('application_close_date', optional($sch->application_close_date ?? null)->format('Y-m-d\TH:i')) }}" class="form-control" required></div>
    <div class="form-group col-md-4"><label>Status *</label>
        <select name="status" class="form-control" required>
            @foreach(['draft','open','closed','archived'] as $st)<option value="{{ $st }}" {{ old('status', $sch->status ?? 'draft')==$st?'selected':'' }}>{{ ucfirst($st) }}</option>@endforeach
        </select>
    </div>
</div>
<div class="form-group"><label>Featured Image</label><input type="file" name="featured_image" class="form-control-file">
    @if(!empty($sch) && $sch->featured_image)<small class="d-block mt-1">Current: {{ $sch->featured_image }}</small>@endif
</div>
