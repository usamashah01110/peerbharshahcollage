@extends('admin.main')

@section('content')

<div class="container mt-4">

    <h2>Add Scholarship</h2>

    <form action="{{ route('scholarships.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text"
                   name="name"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Slug</label>
            <input type="text"
                   name="slug"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description"
                      class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Type</label>

            <select name="type" class="form-control">
                <option value="merit">Merit</option>
                <option value="need_based">Need Based</option>
                <option value="sports">Sports</option>
                <option value="minority">Minority</option>
                <option value="disability">Disability</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Eligibility Criteria</label>

            <textarea name="eligibility_criteria"
                      class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Open Date</label>

            <input type="datetime-local"
                   name="application_open_date"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Close Date</label>

            <input type="datetime-local"
                   name="application_close_date"
                   class="form-control">
        </div>

        <button type="submit"
                class="btn btn-primary">
                Save
        </button>

    </form>

</div>

@endsection