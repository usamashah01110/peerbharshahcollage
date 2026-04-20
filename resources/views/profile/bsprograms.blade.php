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
    padding: 90px 0 50px;
    text-align: center;
    background: linear-gradient(135deg, #fff7f0, #ffffff);
    border-bottom: 2px solid #f0dede;
}

.hero h1 {
    font-weight: 900;
    font-size: 46px;
    color: #111827;
}

.hero span {
    color: #7a1f1f;
}

.hero p {
    max-width: 680px;
    margin: 15px auto;
    color: #6b7280;
    font-size: 16px;
    line-height: 1.6;
}

/* IMAGE */
.hero-img {
    height: 340px;
    width: 100%;
    object-fit: cover;
    border-radius: 22px;
    margin-top: 25px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.12);
    transition: 0.3s;
}

.hero-img:hover {
    transform: scale(1.02);
}

/* SECTION */
.section {
    padding: 70px 0;
}

/* SECTION TITLE */
.section-title {
    text-align: center;
    font-weight: 800;
    color: #111827;
    margin-bottom: 40px;
}

/* CARD */
.feature-card {
    background: #ffffff;
    border: 1px solid #f0dede;
    border-radius: 22px;
    padding: 30px;
    transition: 0.3s ease;
    height: 100%;
    text-align: center;
}

.feature-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 20px 45px rgba(122, 31, 31, 0.15);
    border-color: #7a1f1f;
}

/* ICON */
.icon {
    font-size: 42px;
    color: #7a1f1f;
    margin-bottom: 10px;
}

/* BOX */
.extra-box {
    background: #fff;
    border-radius: 22px;
    padding: 35px;
    border: 1px solid #f0dede;
    box-shadow: 0 10px 25px rgba(0,0,0,0.05);
}

/* LIST */
.extra-box ul li {
    padding: 6px 0;
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
        <h1>BS <span>Programs</span></h1>
        <p>
            BS Programs modern education ka hissa hain jo students ko IT, business, management aur communication fields me professional career ke liye prepare karte hain.
        </p>

        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1200&auto=format&fit=crop"
             class="hero-img">
    </div>
</div>

<!-- PROGRAMS -->
<div class="section">
    <div class="container">

        <h2 class="section-title">Available Programs</h2>

        <div class="row g-4">

            <div class="col-md-3 fade-up">
                <div class="feature-card">
                    <div class="icon">💻</div>
                    <h5 class="fw-bold">BSCS</h5>
                    <p class="text-muted">Programming, AI aur software development.</p>
                </div>
            </div>

            <div class="col-md-3 fade-up">
                <div class="feature-card">
                    <div class="icon">📊</div>
                    <h5 class="fw-bold">BBA</h5>
                    <p class="text-muted">Business management aur leadership skills.</p>
                </div>
            </div>

            <div class="col-md-3 fade-up">
                <div class="feature-card">
                    <div class="icon">🌐</div>
                    <h5 class="fw-bold">BSIT</h5>
                    <p class="text-muted">IT systems, networking aur technology.</p>
                </div>
            </div>

            <div class="col-md-3 fade-up">
                <div class="feature-card">
                    <div class="icon">📚</div>
                    <h5 class="fw-bold">BS English</h5>
                    <p class="text-muted">Language, literature aur communication.</p>
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
                <li>✔ Software Engineer</li>
                <li>✔ Business Manager</li>
                <li>✔ IT Specialist</li>
                <li>✔ Lecturer / Teacher</li>
                <li>✔ Digital Marketing Expert</li>
            </ul>
        </div>

    </div>
</div>

<!-- WHY -->
<div class="section">
    <div class="container">

        <div class="extra-box text-center fade-up">
            <h3 class="fw-bold mb-3">Why Choose BS Programs?</h3>
            <p class="text-muted mb-0">
                BS Programs students ko practical skills, modern knowledge aur industry-ready training provide karte hain jo unke career ko strong banate hain.
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