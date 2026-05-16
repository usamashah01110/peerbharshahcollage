@extends('admin.main')

@section('content')

<div class="container mt-4">

    <h2>Edit Scholarship</h2>

    <form action="{{ route('scholarships.update', $scholarship->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>

            <input type="text"
                   name="name"
                   value="{{ $scholarship->name }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Slug</label>

            <input type="text"
                   name="slug"
                   value="{{ $scholarship->slug }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>

            <textarea name="description"
                      class="form-control">{{ $scholarship->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Eligibility Criteria</label>

            <textarea name="eligibility_criteria"
                      class="form-control">{{ $scholarship->eligibility_criteria }}</textarea>
        </div>

        <button type="submit"
                class="btn btn-success">
                Update
        </button>

    </form>

</div>

@endsection