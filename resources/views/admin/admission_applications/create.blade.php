@extends('admin.main')

@section('content')
<h2 class="mb-3">Add Admission Application</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.admission-applications.store') }}" method="POST">
    @include('admin.admission_applications._form', ['app' => null])
    <button class="btn btn-success">Save</button>
    <a href="{{ route('admin.admission-applications.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
