@extends('admin.main')

@section('content')
<h2 class="mb-3">Add Student</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.students.store') }}" method="POST" enctype="multipart/form-data">
    @include('admin.students._form', ['student' => null])
    <button class="btn btn-success">Save</button>
    <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
