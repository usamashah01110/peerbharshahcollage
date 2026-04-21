@extends('includes.main')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f7f6f6;
    font-family: 'Poppins', sans-serif;
}

/* HERO */
.hero {
    padding: 85px 0 40px;
    text-align: center;
    background: linear-gradient(135deg, #fff7f0, #ffffff);
    border-bottom: 2px solid #f0dede;
}

.hero h1 {
    font-weight: 900;
    color: #111827;
}

.hero span {
    color: #7a1f1f;
}

.hero p {
    max-width: 650px;
    margin: 10px auto;
    color: #6b7280;
    line-height: 1.6;
}

/* IMAGE */
.hero-img {
    height: 340px;
    width: 100%;
    object-fit: cover;
    border-radius: 20px;
    margin-top: 20px;
    box-shadow: 0 18px 45px rgba(0,0,0,0.12);
}

/* SECTION */
.section {
    padding: 65px 0;
}

/* CARD */
.feature-card {
    background: #fff;
    border: 1px solid #f0dede;
    border-radius: 20px;
    padding: 25px;
    transition: 0.3s ease;
    height: 100%;
    text-align: center;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 18px 40px rgba(122, 31, 31, 0.15);
}

/* ICON */
.icon {
    font-size: 40px;
    color: #7a1f1f;
}

/* BOX */
.extra-box {
    background: #fff;
    border-radius: 20px;
    padding: 30px;
    border: 1px solid #f0dede;
    box-shadow: 0 10px 25px rgba(0,0,0,0.05);
}

/* ANIMATION */
.fade-up {
    opacity: 0;
    transform: translateY(40px);
    transition: 0.7s ease;
}

.fade-up.show {
    opacity: 1;
    transform: translateY(0);
}
</style>

<!-- HERO -->
<div class="hero fade-up">
    <div class="container">
        <h1>General <span>Science</span></h1>
        <p>
            General Science ek flexible academic program hai jo Physics, Chemistry, Biology aur Mathematics ka combination hota hai.
            Yeh students ko multiple career paths explore karne ka moka deta hai.
        </p>

        <img src="https://images.unsplash.com/photo-1509228627152-72ae9ae6848d?q=80&w=1200&auto=format&fit=crop"
             class="hero-img">
    </div>
</div>

<!-- FEATURES -->
<div class="section">
    <div class="container">

        <div class="row g-4">

            <div class="col-md-4 fade-up">
                <div class="feature-card">
                    <div class="icon">🔬</div>
                    <h5 class="fw-bold mt-2">Science Mix</h5>
                    <p class="text-muted">Physics, Chemistry aur Biology ka balanced combination.</p>
                </div>
            </div>

            <div class="col-md-4 fade-up">
                <div class="feature-card">
                    <div class="icon">📘</div>
                    <h5 class="fw-bold mt-2">Flexible Study</h5>
                    <p class="text-muted">Multiple subjects se career options open hotay hain.</p>
                </div>
            </div>

            <div class="col-md-4 fade-up">
                <div class="feature-card">
                    <div class="icon">🚀</div>
                    <h5 class="fw-bold mt-2">Future Paths</h5>
                    <p class="text-muted">Teaching, lab work, IT aur technical fields.</p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- CAREER -->
<div class="section">
    <div class="container">

        <div class="extra-box text-center fade-up">
            <h3 class="fw-bold mb-3">Career Opportunities</h3>
            <ul class="list-unstyled text-muted mb-0">
                <li>✔ Lab Technician</li>
                <li>✔ Teacher / Educator</li>
                <li>✔ IT Support Staff</li>
                <li>✔ Research Assistant</li>
                <li>✔ Government Jobs Preparation</li>
            </ul>
        </div>

    </div>
</div>

<!-- WHY -->
<div class="section">
    <div class="container">

        <div class="extra-box text-center fade-up">
            <h3 class="fw-bold mb-3">Why Choose General Science?</h3>
            <p class="text-muted mb-0">
                Agar aapko multiple fields explore karni hain aur apna career flexible rakhna hai to General Science best option hai.
                Yeh program future study paths ke liye strong foundation deta hai.
            </p>
        </div>

    </div>
</div>

<!-- JS -->
<script>
const elements = document.querySelectorAll('.fade-up');

window.addEventListener('scroll', () => {
    elements.forEach(el => {
        const top = el.getBoundingClientRect().top;
        if(top < window.innerHeight - 80){
            el.classList.add('show');
        }
    });
});
</script>

@endsection