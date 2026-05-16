@extends('admin.main')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">

        <h2>Admission Applications</h2>

        <a href="{{ route('admin.admissionapplications.create') }}"
           class="btn btn-success">
            Add Application
        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <table class="table table-bordered table-striped">

        <thead>

            <tr>

                <th>ID</th>

                <th>Application No</th>

                <th>Student Name</th>

                <th>Program</th>

                <th>Session</th>

                <th>Phone</th>

                <th>Status</th>

                <th width="180">Action</th>

            </tr>

        </thead>

        <tbody>

            @forelse($applications as $application)

            <tr>

                <td>{{ $application->id }}</td>

                <td>

                    {{ $application->application_number }}

                </td>

                <td>

                    {{ $application->first_name }}
                    {{ $application->last_name }}

                </td>

                <td>

                    {{ $application->program->name ?? '' }}

                </td>

                <td>

                    {{ $application->session->name ?? '' }}

                </td>

                <td>

                    {{ $application->phone }}

                </td>

                <td>

                    {{ $application->status }}

                </td>

                <td>

                    <a href="{{ route('admin.admissionapplications.edit', $application->id) }}"
                       class="btn btn-primary btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.admissionapplications.destroy', $application->id) }}"
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

                <td colspan="8" class="text-center">

                    No Applications Found

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection