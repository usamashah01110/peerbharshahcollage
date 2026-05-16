@extends('admin.main')

@section('content')

<div class="container mt-4">

    <h2>Scholarships</h2>

    <a href="{{ route('scholarships.create') }}"
       class="btn btn-primary mb-3">
       Add Scholarship
    </a>

    <table class="table table-bordered">

        <thead>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

        </thead>

        <tbody>

            @foreach($scholarships as $scholarship)

            <tr>

                <td>{{ $scholarship->id }}</td>
                <td>{{ $scholarship->name }}</td>
                <td>{{ $scholarship->type }}</td>
                <td>{{ $scholarship->status }}</td>

                <td>

                    <a href="{{ route('scholarships.edit', $scholarship->id) }}"
                       class="btn btn-warning btn-sm">
                       Edit
                    </a>

                    <form action="{{ route('scholarships.destroy', $scholarship->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm">
                                Delete
                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection