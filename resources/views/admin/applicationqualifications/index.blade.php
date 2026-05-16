@extends('admin.main')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">

        <h2>Qualifications List</h2>

        <a href="{{ route('admin.applicationqualifications.create') }}"
           class="btn btn-success">
            Add Qualification
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
                <th>Application No</th>
                <th>Level</th>
                <th>Institution</th>
                <th>Board</th>
                <th>Passing Year</th>
                <th>Percentage</th>
                <th>Grade</th>
                <th>Action</th>

            </tr>

        </thead>

        <tbody>

            @foreach($qualifications as $qualification)

            <tr>

                <td>{{ $qualification->id }}</td>

                <td>
                    {{ $qualification->application->application_number ?? '' }}
                </td>

                <td>{{ $qualification->level }}</td>

                <td>{{ $qualification->institution }}</td>

                <td>{{ $qualification->board_university }}</td>

                <td>{{ $qualification->passing_year }}</td>

                <td>{{ $qualification->percentage }}</td>

                <td>{{ $qualification->grade }}</td>

                <td>

                    <a href="{{ route('admin.applicationqualifications.edit', $qualification->id) }}"
                       class="btn btn-primary btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.applicationqualifications.destroy', $qualification->id) }}"
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

            @endforeach

        </tbody>

    </table>

</div>

@endsection