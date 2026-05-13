@extends('admin.main')

@section('content')

    <h2 class="mb-3">Edit Department</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" name="name"
                   value="{{ old('name', $department->name) }}"
                   class="form-control @error('name') is-invalid @enderror"
                   maxlength="150" required>
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Code <span class="text-danger">*</span></label>
            <input type="text" name="code"
                   value="{{ old('code', $department->code) }}"
                   class="form-control @error('code') is-invalid @enderror"
                   maxlength="20" required>
            <small class="text-muted">Unique short code (e.g., CS, ENG, HR)</small>
            @error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" rows="3"
                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $department->description) }}</textarea>
            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Head of Department (HOD)</label>
            <select name="hod_id" class="form-control @error('hod_id') is-invalid @enderror">
                <option value="">-- Select HOD --</option>
                @isset($users)
                    @foreach($users as $user)
                        <option value="{{ $user->id }}"
                            {{ old('hod_id', $department->hod_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                @endisset
            </select>
            @error('hod_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Established Date</label>
            <input type="date" name="established_date"
                   value="{{ old('established_date', $department->established_date?->format('Y-m-d')) }}"
                   class="form-control @error('established_date') is-invalid @enderror">
            @error('established_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3 form-check">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" id="is_active"
                   class="form-check-input"
                {{ old('is_active', $department->is_active) ? 'checked' : '' }}>
            <label for="is_active" class="form-check-label">Active</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

@endsection
