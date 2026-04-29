@extends('admin.main')

@section('content')
<div class="container">
    <h2>Delete Program</h2>

    <div class="alert alert-danger">
        Are you sure you want to delete this program?
    </div>

    <p><strong>Code:</strong> {{ $program->program_code }}</p>
    <p><strong>Name:</strong> {{ $program->program_name }}</p>

    <form action="{{ route('programs.destroy', $program->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button class="btn btn-danger">Yes, Delete</button>
        <a href="{{ route('programs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection