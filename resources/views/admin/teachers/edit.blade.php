@extends('admin.main')

@section('content')

<h2>Edit Teacher</h2>

<form method="POST" action="{{ route('admin.teachers.update', $teacher->id) }}">
    @csrf
    @method('PUT')

    <div class="row">
        
        <div class="col-md-6 mb-3">
            <label>Employee ID</label>
            <input type="text" 
                   name="employee_id" 
                   value="{{ old('employee_id', $teacher->employee_id) }}" 
                   class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Department</label>
            <select name="department_id" class="form-control">
                @foreach($departments as $dept)
                    <option value="{{ $dept->id }}"
                        {{ $teacher->department_id == $dept->id ? 'selected' : '' }}>
                        {{ $dept->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label>First Name</label>
            <input type="text" 
                   name="first_name" 
                   value="{{ old('first_name', $teacher->first_name) }}" 
                   class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Last Name</label>
            <input type="text" 
                   name="last_name" 
                   value="{{ old('last_name', $teacher->last_name) }}" 
                   class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Email</label>
            <input type="email" 
                   name="email" 
                   value="{{ old('email', $teacher->email) }}" 
                   class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Phone</label>
            <input type="text" 
                   name="phone" 
                   value="{{ old('phone', $teacher->phone) }}" 
                   class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option value="Male" {{ $teacher->gender == 'Male' ? 'selected' : '' }}>
                    Male
                </option>
                <option value="Female" {{ $teacher->gender == 'Female' ? 'selected' : '' }}>
                    Female
                </option>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label>Date of Birth</label>
            <input type="date" 
                   name="date_of_birth" 
                   value="{{ old('date_of_birth', $teacher->date_of_birth) }}" 
                   class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Qualification</label>
            <input type="text" 
                   name="qualification" 
                   value="{{ old('qualification', $teacher->qualification) }}" 
                   class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Joining Date</label>
            <input type="date" 
                   name="joining_date" 
                   value="{{ old('joining_date', $teacher->joining_date) }}" 
                   class="form-control">
        </div>

        <div class="col-md-12 mb-3">
            <label>Address</label>
            <textarea name="address" 
                      class="form-control" 
                      rows="3">{{ old('address', $teacher->address) }}</textarea>
        </div>

    </div>

    <button type="submit" class="btn btn-primary">
        Update Teacher
    </button>

</form>

@endsection