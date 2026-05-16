@extends('admin.main')

@section('content')

<div class="container mt-4">

    <h2>Edit News / Event</h2>

    <form action="{{ route('admin.newsevents.update', $newsEvent->id) }}"
          method="POST">

        @csrf

        @method('PUT')

        <div class="mb-3">

            <label>Title</label>

            <input type="text"
                   name="title"
                   value="{{ $newsEvent->title }}"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Description</label>

            <textarea name="description"
                      class="form-control">{{ $newsEvent->description }}</textarea>

        </div>

        <div class="mb-3">

            <label>Event Date</label>

            <input type="date"
                   name="event_date"
                   value="{{ $newsEvent->event_date }}"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Type</label>

            <select name="type"
                    class="form-control">

                <option value="news"
                    {{ $newsEvent->type == 'news' ? 'selected' : '' }}>

                    News

                </option>

                <option value="event"
                    {{ $newsEvent->type == 'event' ? 'selected' : '' }}>

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

                    <option value="{{ $department->id }}"
                        {{ $newsEvent->department_id == $department->id ? 'selected' : '' }}>

                        {{ $department->name }}

                    </option>

                @endforeach

            </select>

        </div>

        <button type="submit"
                class="btn btn-primary">

            Update

        </button>

    </form>

</div>

@endsection