@extends('admin.main')

@section('content')
<h2 class="mb-3">Add Scholarship</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.scholarships.store') }}" method="POST" enctype="multipart/form-data">
    @include('admin.scholarships._form', ['sch' => null])
    <button class="btn btn-success">Save</button>
    <a href="{{ route('admin.scholarships.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
