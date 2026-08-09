@if(session('success'))
    <div class="alert alert-success reveal in-view">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger reveal in-view">{{ session('error') }}</div>
@endif
