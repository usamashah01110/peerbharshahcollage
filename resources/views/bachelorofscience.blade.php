@extends('includes.main')
@section('content')

<style>
body {
    background: linear-gradient(120deg, #f8f9fa, #eef2f3);
    font-family: 'Poppins', sans-serif;
}

.section {
    padding: 90px 0;
}

.section h2 {
    font-size: 42px;
    font-weight: 800;
    color: #111;
    position: relative;
    margin-bottom: 40px;
}

.section h2::after {
    content: '';
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg,#ff4d4d,#b30000);
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    bottom: -12px;
    border-radius: 10px;
}

/* PROGRAM CARD */
.program-card {
    background: rgba(255,255,255,0.9);
    border-radius: 18px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: all 0.4s ease;
    overflow: hidden;
}

.program-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 15px;
    transition: transform 0.5s ease;
}

.program-card:hover {
    transform: scale(1.05);
}

.program-card:hover img {
    transform: scale(1.15);
}

.btn-danger {
    padding: 14px 40px;
    border-radius: 50px;
    font-size: 18px;
    background: linear-gradient(90deg,#ff4d4d,#b30000);
    border: none;
}

.btn-danger:hover {
    transform: scale(1.08);
}

.box {
    background: #fff;
    padding: 25px;
    border-radius: 18px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.06);
}

.faq-box {
    background: #fff;
    padding: 20px;
    border-radius: 15px;
    margin-bottom: 15px;
}

.faq-box:hover {
    transform: translateX(8px);
}

/* ANIMATION */
.fade {
    opacity: 0;
    transform: translateY(60px) scale(0.95);
    transition: 0.8s ease;
}

.fade.show {
    opacity: 1;
    transform: translateY(0) scale(1);
}
</style>

<!-- ================= PROGRAMS ================= -->
<div class="container section fade">
    <h2 class="text-center">Offered BS Programs</h2>

    <div class="row">
        @php
        $programs = ['Physics','Chemistry','Mathematics','Computer Science','Zoology','Botany'];
        @endphp

        @foreach($programs as $program)
        <div class="col-md-4 mb-4">
            <div class="program-card">
                <img src="https://source.unsplash.com/400x300/?{{ strtolower($program) }}">
                <h5>BS {{ $program }}</h5>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- ================= ELIGIBILITY ================= -->
<div class="container section fade">
    <div class="row align-items-center">

        <div class="col-md-6">
            <img class="img-fluid rounded-4" src="{{ asset('images/criteria-program.png') }}">
        </div>

        <div class="col-md-6 box">
            <h2>Eligibility Criteria</h2>
            <ul>
                <li>FSc (Pre-Medical / Pre-Engineering)</li>
                <li>Minimum 50% Marks</li>
                <li>Entry Test (if required)</li>
                <li>Interview (Optional)</li>
            </ul>
        </div>

    </div>
</div>

<!-- ================= DOCUMENTS ================= -->
<div class="container section fade">
    <div class="row align-items-center">

        <div class="col-md-6 box">
            <h2>Required Documents</h2>
            <ul>
                <li>FSc Result Card</li>
                <li>Matric Certificate</li>
                <li>CNIC / B-Form</li>
                <li>Father CNIC</li>
                <li>Passport Photos</li>
            </ul>
        </div>

        <div class="col-md-6">
            <img class="img-fluid rounded-4" src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40">
        </div>

    </div>
</div>

<!-- ================= FAQ ================= -->
<div class="container section fade">
    <h2 class="text-center">FAQs</h2>

    <div class="faq-box">BS programs duration is 4 years.</div>
    <div class="faq-box">Entry test depends on policy.</div>
    <div class="faq-box">Pre-medical students can apply for CS.</div>
    <div class="faq-box">Apply online via Apply Now button.</div>
</div>

<!-- APPLY -->
<div class="text-center mb-5 fade">
    <a href="#" class="btn btn-danger">Apply Now</a>
</div>

<!-- SCRIPT -->
<script>
const fadeElements = document.querySelectorAll('.fade');

window.addEventListener('scroll', () => {
    fadeElements.forEach(el => {
        const top = el.getBoundingClientRect().top;
        if(top < window.innerHeight - 80){
            el.classList.add('show');
        }
    });
});
</script>

@endsection