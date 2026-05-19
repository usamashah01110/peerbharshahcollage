@extends('admin.main')

@section('content')
<h2 class="mb-3">Edit Scholarship Application</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.scholarship-applications.update', $application->id) }}" method="POST">
    @method('PUT')
    @include('admin.scholarship_applications._form', ['app' => $application])
    <button class="btn btn-success">Update</button>
    <a href="{{ route('admin.scholarship-applications.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
