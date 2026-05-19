@extends('admin.main')

@section('content')
<h2 class="mb-3">Add Scholarship Application</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.scholarship-applications.store') }}" method="POST">
    @include('admin.scholarship_applications._form', ['app' => null])
    <button class="btn btn-success">Save</button>
    <a href="{{ route('admin.scholarship-applications.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
