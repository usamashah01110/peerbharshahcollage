@extends('admin.main')

@section('content')
<h2 class="mb-3">Upload Scholarship Document</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.scholarship-application-documents.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group"><label>Application *</label>
        <select name="application_id" class="form-control" required>
            <option value="">-- Select --</option>
            @foreach($applications as $a)<option value="{{ $a->id }}" {{ old('application_id', $selectedApplicationId)==$a->id?'selected':'' }}>{{ $a->application_number }}</option>@endforeach
        </select>
    </div>
    <div class="form-group"><label>Document Type *</label>
        <select name="document_type" class="form-control" required>
            @foreach(['cnic','transcript','income_certificate','recommendation_letter','photo','other'] as $t)
                <option value="{{ $t }}" {{ old('document_type')==$t?'selected':'' }}>{{ ucwords(str_replace('_',' ',$t)) }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group"><label>File *</label><input type="file" name="file" class="form-control-file" required></div>
    <button class="btn btn-success">Upload</button>
    <a href="{{ route('admin.scholarship-application-documents.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
