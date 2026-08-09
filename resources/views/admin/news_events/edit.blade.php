@extends('admin.main')

@section('content')
<h2 class="mb-3">Edit News/Event</h2>

@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

<form action="{{ route('admin.news-events.update', $newsEvent->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="form-group"><label>Title *</label><input type="text" name="title" value="{{ old('title', $newsEvent->title) }}" class="form-control" required></div>
    <div class="form-group"><label>Description *</label><textarea name="description" rows="4" class="form-control" required>{{ old('description', $newsEvent->description) }}</textarea></div>
    <div class="form-row">
        <div class="form-group col-md-4"><label>Type *</label>
            <select name="type" class="form-control" required>
                <option value="news" {{ old('type', $newsEvent->type)=='news'?'selected':'' }}>News</option>
                <option value="event" {{ old('type', $newsEvent->type)=='event'?'selected':'' }}>Event</option>
            </select>
        </div>
        <div class="form-group col-md-4"><label>Event Date</label><input type="date" name="event_date" value="{{ old('event_date', optional($newsEvent->event_date)->format('Y-m-d')) }}" class="form-control"></div>
        <div class="form-group col-md-4"><label>Department</label>
            <select name="department_id" class="form-control">
                <option value="">-- None --</option>
                @foreach($departments as $d)<option value="{{ $d->id }}" {{ old('department_id', $newsEvent->department_id)==$d->id?'selected':'' }}>{{ $d->name }}</option>@endforeach
            </select>
        </div>
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('admin.news-events.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
