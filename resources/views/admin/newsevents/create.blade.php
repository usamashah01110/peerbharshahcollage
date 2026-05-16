@extends('admin.main')

@section('content')

<div class="container mt-4">

    <h2>Add News / Event</h2>

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('admin.newsevents.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label>Title</label>

            <input type="text"
                   name="title"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Description</label>

            <textarea name="description"
                      class="form-control"></textarea>

        </div>

        <div class="mb-3">

            <label>Event Date</label>

            <input type="date"
                   name="event_date"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Type</label>

            <select name="type"
                    class="form-control">

                <option value="news">
                    News
                </option>

                <option value="event">
                    Event
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label>Department</label>

            <select name="department_id"
                    class="form-control">

                <option value="">
                    Select Department
                </option>

                @foreach($departments as $department)

                    <option value="{{ $department->id }}">

                        {{ $department->name }}

                    </option>

                @endforeach

            </select>

        </div>

        <button type="submit"
                class="btn btn-primary">

            Save

        </button>

    </form>

</div>

@endsection