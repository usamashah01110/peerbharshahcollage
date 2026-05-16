@extends('admin.main')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">

        <h2>News & Events</h2>

        <a href="{{ route('admin.newsevents.create') }}"
           class="btn btn-success">

            Add News/Event

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>ID</th>

                <th>Title</th>

                <th>Type</th>

                <th>Department</th>

                <th>Event Date</th>

                <th>Action</th>

            </tr>

        </thead>

        <tbody>

            @forelse($newsEvents as $item)

            <tr>

                <td>{{ $item->id }}</td>

                <td>{{ $item->title }}</td>

                <td>{{ $item->type }}</td>

                <td>
                    {{ $item->department->name ?? '' }}
                </td>

                <td>{{ $item->event_date }}</td>

                <td>

                    <a href="{{ route('admin.newsevents.edit', $item->id) }}"
                       class="btn btn-primary btn-sm">

                        Edit

                    </a>

                    <form action="{{ route('admin.newsevents.destroy', $item->id) }}"
                          method="POST"
                          style="display:inline-block">

                        @csrf

                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm">

                            Delete

                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6"
                    class="text-center">

                    No Record Found

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection