@extends('admin.main')

@section('content')
<h2 class="mb-3">Edit Scholarship Document</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.scholarship-application-documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="form-group"><label>Application *</label>
        <select name="application_id" class="form-control" required>
            @foreach($applications as $a)<option value="{{ $a->id }}" {{ old('application_id', $document->application_id)==$a->id?'selected':'' }}>{{ $a->application_number }}</option>@endforeach
        </select>
    </div>
    <div class="form-group"><label>Document Type *</label>
        <select name="document_type" class="form-control" required>
            @foreach(['cnic','transcript','income_certificate','recommendation_letter','photo','other'] as $t)
                <option value="{{ $t }}" {{ old('document_type', $document->document_type)==$t?'selected':'' }}>{{ ucwords(str_replace('_',' ',$t)) }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group"><label>Replace File</label><input type="file" name="file" class="form-control-file">
        <small class="d-block mt-1">Current: <a href="{{ asset($document->file_path) }}" target="_blank">{{ basename($document->file_path) }}</a></small>
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('admin.scholarship-application-documents.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
