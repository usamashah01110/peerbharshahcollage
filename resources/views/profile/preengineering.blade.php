@extends('includes.main')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f7f6f6;
    font-family: 'Poppins', sans-serif;
}

/* HERO (MAROON) */
.hero {
    background: linear-gradient(135deg, #fff5f5, #ffffff);
    padding: 80px 0 40px;
    text-align: center;
    border-bottom: 3px solid #7a1f1f;
}

.hero h1 {
    font-weight: 900;
    font-size: 44px;
    color: #4a1c1c;
}

.hero span {
    color: #7a1f1f;
}

.hero p {
    max-width: 650px;
    margin: 10px auto;
    color: #6b4b4b;
}

/* IMAGE */
.hero-img {
    height: 340px;
    width: 100%;
    object-fit: cover;
    border-radius: 20px;
    margin-top: 25px;
    box-shadow: 0 20px 50px rgba(122, 31, 31, 0.20);
    border: 2px solid #f0dede;
}

/* SECTION */
.section {
    padding: 60px 0;
}

/* TITLE */
.section-title {
    font-weight: 800;
    color: #4a1c1c;
    margin-bottom: 30px;
    text-align: center;
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
    box-shadow: 0 18px 40px rgba(122, 31, 31, 0.18);
    border-color: #7a1f1f;
}

/* ICON */
.icon {
    font-size: 40px;
    color: #7a1f1f;
}

/* EXTRA BOX */
.extra-box {
    background: #ffffff;
    border-radius: 20px;
    padding: 30px;
    border: 1px solid #f0dede;
    box-shadow: 0 10px 25px rgba(122, 31, 31, 0.08);
}

/* STATS */
.stat-box {
    background: #fff;
    padding: 20px;
    border-radius: 15px;
    text-align: center;
    border: 1px solid #f0dede;
    transition: 0.3s;
}

.stat-box:hover {
    transform: translateY(-5px);
    border-color: #7a1f1f;
}

/* TEXT ACCENT */
.accent {
    color: #7a1f1f;
}
</style>

<!-- HERO -->
<div class="hero">
    <div class="container">
        <h1>Pre-<span>Engineering</span></h1>
        <p>
            Pre-Engineering un students ke liye hai jo engineering fields me career banana chahte hain.
            Is program me Physics, Mathematics aur Chemistry par strong focus hota hai.
        </p>
<img src="https://images.unsplash.com/photo-1581092160607-ee22621dd758?q=80&w=1200&auto=format&fit=crop"
     class="hero-img" alt="Engineering">
    </div>
</div>

<!-- STATS -->
<div class="section">
    <div class="container">
        <div class="row g-4 text-center">

            <div class="col-md-4">
                <div class="stat-box">
                    <h3 class="fw-bold accent">3</h3>
                    <p class="mb-0">Core Subjects</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-box">
                    <h3 class="fw-bold accent">100%</h3>
                    <p class="mb-0">University Prep</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-box">
                    <h3 class="fw-bold accent">10+</h3>
                    <p class="mb-0">Engineering Fields</p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- FEATURES -->
<div class="section">
    <div class="container">

        <h2 class="section-title">Program Highlights</h2>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="feature-card text-center">
                    <div class="icon mb-3">📘</div>
                    <h5 class="fw-bold">Core Subjects</h5>
                    <p class="text-muted">
                        Physics, Mathematics aur Chemistry engineering foundation strong banate hain.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card text-center">
                    <div class="icon mb-3">🚀</div>
                    <h5 class="fw-bold">Career Paths</h5>
                    <p class="text-muted">
                        Civil, Mechanical, Electrical, Software aur Chemical Engineering fields.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card text-center">
                    <div class="icon mb-3">🧠</div>
                    <h5 class="fw-bold">Skills</h5>
                    <p class="text-muted">
                        Logical thinking, problem solving aur analytical skills develop hoti hain.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- REQUIREMENTS -->
<div class="section">
    <div class="container">

        <div class="extra-box">
            <h3 class="fw-bold mb-3 text-center accent">Admission Requirements</h3>

            <ul class="list-unstyled text-muted text-center mb-0">
                <li>✔ Matric with Science (Physics, Chemistry, Math)</li>
                <li>✔ Minimum 60% marks recommended</li>
                <li>✔ Strong interest in Engineering</li>
                <li>✔ Logical & analytical mindset</li>
            </ul>
        </div>

    </div>
</div>

<!-- WHY -->
<div class="section">
    <div class="container">

        <div class="extra-box text-center">
            <h3 class="fw-bold mb-3 accent">Why Choose Pre-Engineering?</h3>
            <p class="text-muted mb-0">
                Agar aapko technology, machines aur innovation pasand hai to Pre-Engineering best choice hai.
                Yeh program aapko top engineering universities ke liye prepare karta hai.
            </p>
        </div>

    </div>
</div>

@endsection