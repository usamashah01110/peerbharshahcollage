@extends('includes.main')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f6f8fc;
    font-family: 'Poppins', sans-serif;
}

/* HERO */
.hero {
    background: linear-gradient(135deg, #fff7ed, #ffffff, #eef2ff);
    padding: 80px 0 40px;
    text-align: center;
}

.hero h1 {
    font-size: 44px;
    font-weight: 900;
}

.hero span {
    color: #f97316;
}

.hero p {
    max-width: 650px;
    margin: 12px auto;
    color: #6b7280;
}

/* IMAGE */
.hero-img {
    height: 320px;
    width: 100%;
    object-fit: cover;
    border-radius: 20px;
    margin-top: 25px;
    box-shadow: 0 18px 45px rgba(0,0,0,0.12);
}

/* SECTION */
.section {
    padding: 60px 0;
}

/* CARD */
.feature-card {
    background: #fff;
    border: none;
    border-radius: 20px;
    padding: 25px;
    transition: 0.3s ease;
    height: 100%;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 18px 40px rgba(0,0,0,0.12);
}

/* ICON */
.icon {
    font-size: 40px;
}

/* EXTRA BOX */
.extra-box {
    background: #ffffff;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.05);
}

/* NEW STATS */
.stat-box {
    background: #fff;
    padding: 20px;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    transition: 0.3s;
}

.stat-box:hover {
    transform: translateY(-6px);
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
        <h1>Arts <span>Program</span></h1>
        <p>
            Arts program history, literature, sociology aur creative fields cover karta hai.
            Yeh students ko creativity aur analytical thinking develop karne mein help karta hai.
        </p>

        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1200&auto=format&fit=crop"
             class="hero-img">
    </div>
</div>

<!-- STATS ADDED -->
<div class="section">
    <div class="container">
        <div class="row g-4 text-center">

            <div class="col-md-4 fade-up">
                <div class="stat-box">
                    <h3 class="fw-bold text-warning">15+</h3>
                    <p class="mb-0">Subjects Covered</p>
                </div>
            </div>

            <div class="col-md-4 fade-up">
                <div class="stat-box">
                    <h3 class="fw-bold text-primary">1000+</h3>
                    <p class="mb-0">Students Enrolled</p>
                </div>
            </div>

            <div class="col-md-4 fade-up">
                <div class="stat-box">
                    <h3 class="fw-bold text-success">90%</h3>
                    <p class="mb-0">Success Rate</p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- FEATURES -->
<div class="section">
    <div class="container">

        <div class="row g-4">

            <div class="col-md-4 fade-up">
                <div class="feature-card text-center">
                    <div class="icon mb-3">📚</div>
                    <h5 class="fw-bold">Humanities</h5>
                    <p class="text-muted">
                        History, Sociology aur Philosophy ka deep study.
                    </p>
                </div>
            </div>

            <div class="col-md-4 fade-up">
                <div class="feature-card text-center">
                    <div class="icon mb-3">✍️</div>
                    <h5 class="fw-bold">Creative Writing</h5>
                    <p class="text-muted">
                        Literature aur writing skills develop hoti hain.
                    </p>
                </div>
            </div>

            <div class="col-md-4 fade-up">
                <div class="feature-card text-center">
                    <div class="icon mb-3">🎨</div>
                    <h5 class="fw-bold">Creativity</h5>
                    <p class="text-muted">
                        Creative thinking aur expression skills improve hoti hain.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- CAREER ADDED -->
<div class="section">
    <div class="container">

        <div class="extra-box text-center fade-up">
            <h3 class="fw-bold mb-3">Career Opportunities</h3>
            <p class="text-muted mb-2">
                Arts students ke liye bohat strong career options available hain:
            </p>

            <ul class="list-unstyled text-muted mb-0">
                <li>✔ Teaching & Education</li>
                <li>✔ Journalism & Media</li>
                <li>✔ Civil Services (CSS)</li>
                <li>✔ Graphic Designing</li>
                <li>✔ Psychology & Sociology</li>
            </ul>
        </div>

    </div>
</div>

<!-- WHY -->
<div class="section">
    <div class="container">

        <div class="extra-box text-center fade-up">
            <h3 class="fw-bold mb-3">Why Choose Arts?</h3>
            <p class="text-muted mb-0">
                Arts program un students ke liye best hai jo creativity, communication aur social sciences me interest rakhte hain.
                Yeh fields future me teaching, media, journalism aur civil services ke doors open karti hain.
            </p>
        </div>

    </div>
</div>

<!-- JS ANIMATION -->
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