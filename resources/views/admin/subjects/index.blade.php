@extends('admin.main')

@section('content')

<h2 class="mb-4">Subjects</h2>

<a href="{{ route('admin.subjects.create') }}" class="btn btn-primary mb-3">
    Add Subject
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Semester</th>
            <th>Name</th>
            <th>Code</th>
            <th>Credit Hours</th>
            <th>Elective</th>
            <th>Status</th>
            <th width="180">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($subjects as $subject)
        <tr>
            <td>{{ $subject->id }}</td>
            <td>{{ $subject->semester->name ?? '' }}</td>
            <td>{{ $subject->name }}</td>
            <td>{{ $subject->code }}</td>
            <td>{{ $subject->credit_hours }}</td>

            <td>
                {{ $subject->is_elective ? 'Yes' : 'No' }}
            </td>

            <td>
                {{ $subject->is_active ? 'Active' : 'Inactive' }}
            </td>

            <td>
                <a href="{{ route('admin.subjects.edit', $subject->id) }}"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('admin.subjects.destroy', $subject->id) }}"
                      method="POST"
                      style="display:inline-block;">

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

@endsection