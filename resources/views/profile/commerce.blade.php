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
    padding: 80px 0 40px;
    text-align: center;
    background: linear-gradient(135deg, #fff7f0, #ffffff);
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
}

/* IMAGE */
.hero-img {
    height: 320px;
    width: 100%;
    object-fit: cover;
    border-radius: 20px;
    margin-top: 20px;
    box-shadow: 0 18px 45px rgba(0,0,0,0.12);
}

/* SECTION */
.section {
    padding: 60px 0;
}

/* CARD */
.feature-card {
    background: #fff;
    border: 1px solid #f0dede;
    border-radius: 20px;
    padding: 25px;
    transition: 0.3s ease;
    height: 100%;
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
    background: white;
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
        <h1>Commerce <span>Program</span></h1>
        <p>
            Commerce business, accounting, finance aur economics ke liye best program hai.
            Yeh students ko real-world business skills develop karne me help karta hai.
        </p>

        <!-- IMAGE -->
        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=1200&auto=format&fit=crop"
             class="hero-img">
    </div>
</div>

<!-- FEATURES -->
<div class="section">
    <div class="container">

        <div class="row g-4">

            <div class="col-md-4 fade-up">
                <div class="feature-card text-center">
                    <div class="icon mb-3">📊</div>
                    <h5 class="fw-bold">Accounting</h5>
                    <p class="text-muted">
                        Financial records aur business accounting systems ka study.
                    </p>
                </div>
            </div>

            <div class="col-md-4 fade-up">
                <div class="feature-card text-center">
                    <div class="icon mb-3">💰</div>
                    <h5 class="fw-bold">Finance</h5>
                    <p class="text-muted">
                        Investment, banking aur money management skills.
                    </p>
                </div>
            </div>

            <div class="col-md-4 fade-up">
                <div class="feature-card text-center">
                    <div class="icon mb-3">📈</div>
                    <h5 class="fw-bold">Economics</h5>
                    <p class="text-muted">
                        Market trends aur economic systems ka understanding.
                    </p>
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
            <p class="text-muted mb-2">
                Commerce students ke liye strong career options available hain:
            </p>

            <ul class="list-unstyled text-muted mb-0">
                <li>✔ Chartered Accountant (CA)</li>
                <li>✔ Banking & Finance Jobs</li>
                <li>✔ Business Management</li>
                <li>✔ Marketing & Sales</li>
                <li>✔ Stock Market Analyst</li>
            </ul>
        </div>

    </div>
</div>

<!-- WHY -->
<div class="section">
    <div class="container">

        <div class="extra-box text-center fade-up">
            <h3 class="fw-bold mb-3">Why Choose Commerce?</h3>
            <p class="text-muted mb-0">
                Agar aapko business, finance aur management me interest hai to Commerce best choice hai.
                Yeh program aapko real business world ke liye prepare karta hai.
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