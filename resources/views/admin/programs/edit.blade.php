@extends('admin.main')

@section('content')
<div class="container">
    <h2>Edit Program</h2>

    <form action="{{ route('programs.update', $program->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Program Code</label>
            <input type="text" name="program_code" value="{{ $program->program_code }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Program Name</label>
            <input type="text" name="program_name" value="{{ $program->program_name }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Department</label>
            <select name="department_id" class="form-control">
                @foreach($departments as $dept)
                    <option value="{{ $dept->id }}"
                        {{ $program->department_id == $dept->id ? 'selected' : '' }}>
                        {{ $dept->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection