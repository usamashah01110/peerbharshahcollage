@extends('admin.main')

@section('content')
<h2 class="mb-3">Edit Scholarship</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.scholarships.update', $scholarship->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @include('admin.scholarships._form', ['sch' => $scholarship])
    <button class="btn btn-success">Update</button>
    <a href="{{ route('admin.scholarships.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
