@extends('admin.main')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Courses List</h2>

        <a href="{{ route('courses.create') }}" class="btn btn-primary">
            + Add Course
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Course Name</th>
                        <th>Course Code</th>
                        <th>Credit Hours</th>
                        <th>Semester</th>
                        <th>Program</th>
                        <th width="180px">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->course_code }}</td>
                            <td>{{ $course->credit_hours }}</td>
                            <td>{{ $course->semester }}</td>
                            <td>{{ $course->program }}</td>

                            <td>
                                {{-- EDIT --}}
                                <a href="{{ route('courses.edit', $course) }}" 
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('courses.destroy', $course) }}" 
                                      method="POST" 
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this course?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                No courses found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection