@extends('admin.main')

@section('content')

<div class="container">

    <h2>Semesters</h2>

    <a href="{{ route('admin.semesters.create') }}"
       class="btn btn-primary mb-3">
        Add Semester
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Program</th>
                <th>Semester Number</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @foreach($semesters as $semester)

            <tr>

                <td>{{ $semester->id }}</td>

                <td>
                    {{ $semester->program->name }}
                </td>

                <td>
                    Semester {{ $semester->semester_number }}
                </td>

                <td>{{ $semester->name }}</td>

                <td>{{ $semester->created_at }}</td>

                <td>

                    <a href="{{ route('admin.semesters.edit', $semester->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.semesters.destroy', $semester->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">
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