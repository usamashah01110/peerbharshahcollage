@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="text-center fw-bold mb-3">Programs & Curriculum</h2>
    <p class="text-center text-muted mb-5">
        Our college offers a wide range of programs to prepare students for future success.
    </p>

    <!-- Intermediate -->
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <img src="/images/inter.jpg" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
            <div class="card shadow p-4">
                <h5 class="fw-bold">Intermediate Studies</h5>
                <p class="text-muted">
                    We offer FA, ICS, Pre-Medical and Pre-Engineering programs with quality education.
                </p>
                <a href="{{ route('intermediate') }}" class="btn btn-danger">
                    Teaching Subjects
                </a>
            </div>
        </div>
    </div>

    <!-- BS Programs -->
    <div class="row align-items-center mb-5 flex-md-row-reverse">
        <div class="col-md-6">
            <img src="/images/bs.jpg" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
            <div class="card shadow p-4">
                <h5 class="fw-bold">Bachelor (BS) Studies</h5>
                <p class="text-muted">
                    BS programs include modern subjects with practical learning environment.
                </p>
                <a href="#" class="btn btn-danger">
                    Teaching Subjects
                </a>
            </div>
        </div>
    </div>

</div>

@endsection