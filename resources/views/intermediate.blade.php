@extends('includes.main')
@section('content')

<style>
.section {
    padding: 100px 0;
}

/* Main Heading */
.section h2 {
    font-size: 40px;
    font-weight: 800;
    color: #1f2937;
    margin-bottom: 20px;
    position: relative;
}

/* Underline effect for heading */
.section h2::after {
    content: '';
    width: 60px;
    height: 4px;
    background: #dc3545;
    position: absolute;
    left: 0;
    bottom: -10px;
    border-radius: 5px;
}

/* Sub text (list + paragraph) */
.section ul li,
.section p {
    font-size: 18px;
    font-weight: 400;
    line-height: 1.8;
    color: #555;
}

/* Image styling */
.section img {
    width: 100%;
    border-radius: 15px;
    transition: 0.3s ease;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

/* Hover effect on image */
.section img:hover {
    transform: scale(1.03);
}

/* Button styling */
.btn-danger {
    padding: 12px 25px;
    font-size: 18px;
    border-radius: 30px;
    transition: 0.3s ease;
}

.btn-danger:hover {
    background: #b02a37;
    transform: translateY(-3px);
}

/* Animation */
.fade {
    opacity: 0;
    transform: translateY(50px);
    transition: 0.7s ease;
}

.fade.show {
    opacity: 1;
    transform: translateY(0);
}

/* Card-like spacing for columns */
.col-md-6, .col-lg-4 {
    padding: 20px;
}
</style>

<!-- Programs Section -->
<div class="container section fade">
    <div class="row align-items-center">

        <div class="col-md-6">
            <h2>Programs Offered</h2>
            <ul>
                <li>FSc Pre-Medical</li>
                <li>FSc Pre-Engineering</li>
                <li>ICS</li>
                <li>FA</li>
                <li>F.A IT</li>
                <li>I.COM</li>
            </ul>
        </div>

        <div class="col-md-6">
            <div class="program-offered-img-wrap">
                <img src="{{ asset('images/program-offered.png') }}" alt="Program Offered"/>
            </div>
        </div>

    </div>
</div>

<!-- Eligibility Section -->
<div class="container section fade">
    <div class="row align-items-center">

        <div class="col-md-6">
            <img src="https://images.unsplash.com/photo-1588072432836-e10032774350">
        </div>

        <div class="col-md-6">
            <h2>Eligibility Criteria</h2>
            <p>Students must have passed Matric with required marks.</p>
        </div>

    </div>
</div>

<!-- Documents Section -->
<div class="container section fade">
    <div class="row align-items-center">

        <div class="col-md-6">
            <h2>Required Documents</h2>
            <ul>
                <li>Matric Result Card</li>
                <li>B-Form / CNIC</li>
                <li>Father CNIC</li>
                <li>Passport Size Photos</li>
            </ul>
        </div>

        <div class="col-md-6">
            <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40">
        </div>

    </div>
</div>

<!-- Apply Button -->
<div class="text-center mb-5">
    <a href="#" class="btn btn-danger">Apply Now</a>
</div>

<!-- Animation Script -->
<script>
const fadeElements = document.querySelectorAll('.fade');

window.addEventListener('scroll', () => {
    fadeElements.forEach(el => {
        const top = el.getBoundingClientRect().top;
        if(top < window.innerHeight - 100){
            el.classList.add('show');
        }
    });
});
</script>

@endsection