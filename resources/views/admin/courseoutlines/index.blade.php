@extends('admin.main')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">

        <h2>Course Outlines</h2>

        <a href="{{ route('admin.courseoutlines.create') }}"
           class="btn btn-success">

            Add Course Outline

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

                <th>Program</th>

                <th>Description</th>

                <th>File</th>

                <th>Action</th>

            </tr>

        </thead>

        <tbody>

            @forelse($courseOutlines as $outline)

            <tr>

                <td>{{ $outline->id }}</td>

                <td>

                    {{ $outline->program->name ?? '' }}

                </td>

                <td>

                    {{ $outline->description }}

                </td>

                <td>

                    @if($outline->file)

                        <a href="{{ asset('course_outlines/'.$outline->file) }}"
                           target="_blank">

                            View File

                        </a>

                    @endif

                </td>

                <td>

                    <a href="{{ route('admin.courseoutlines.edit', $outline->id) }}"
                       class="btn btn-primary btn-sm">

                        Edit

                    </a>

                    <form action="{{ route('admin.courseoutlines.destroy', $outline->id) }}"
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

                <td colspan="5" class="text-center">

                    No Record Found

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection