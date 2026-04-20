@extends('includes.main')

@section('content')

<style>
body {
    background: #f7f6f6;
    font-family: 'Poppins', sans-serif;
}

/* HERO */
.hero {
    text-align: center;
    padding: 80px 20px 30px;
    background: linear-gradient(135deg, #fff5f5, #ffffff);
    border-bottom: 2px solid #f0dede;
}

.hero h1 {
    font-weight: 900;
    color: #4a1c1c;
}

.hero p {
    max-width: 700px;
    margin: 10px auto;
    color: #6b4b4b;
}

/* SECTION */
.section {
    padding: 60px 0;
}

/* TITLE */
.section h2 {
    font-size: 36px;
    font-weight: 800;
    text-align: center;
    margin-bottom: 40px;
    color: #4a1c1c;
    position: relative;
}

.section h2::after {
    content: '';
    width: 70px;
    height: 4px;
    background: #7a1f1f;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    bottom: -10px;
    border-radius: 10px;
}

/* BOX */
.box {
    background: #fff;
    padding: 30px;
    border-radius: 20px;
    border: 1px solid #f0dede;
    box-shadow: 0 10px 25px rgba(0,0,0,0.05);
}

/* STEP */
.step {
    display: flex;
    gap: 15px;
    margin-bottom: 18px;
    align-items: flex-start;
}

.step-number {
    width: 42px;
    height: 42px;
    background: #7a1f1f;
    color: #fff;
    font-weight: bold;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-shrink: 0;
}

/* CARD STYLE */
.info-card {
    background: #fff;
    border-radius: 20px;
    padding: 25px;
    border: 1px solid #f0dede;
    transition: 0.3s;
}

.info-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 18px 40px rgba(122, 31, 31, 0.15);
}

/* FADE */
.fade {
    opacity: 0;
    transform: translateY(40px);
    transition: 0.7s ease;
}

.fade.show {
    opacity: 1;
    transform: translateY(0);
}
</style>

<!-- HERO -->
<div class="hero fade">
    <h1>How to Apply</h1>
    <p>
        Admission process simple aur transparent hai. Neeche diye gaye steps follow karke aap asani se apply kar sakte hain.
    </p>
</div>

<!-- STEPS -->
<div class="container section fade">
    <h2>Admission Steps</h2>

    <div class="box">

        <div class="step">
            <div class="step-number">1</div>
            <p>Visit admission office ya online portal se form hasil karein.</p>
        </div>

        <div class="step">
            <div class="step-number">2</div>
            <p>Form ko carefully apni personal aur academic details se fill karein.</p>
        </div>

        <div class="step">
            <div class="step-number">3</div>
            <p>Required documents attach karein (CNIC/B-Form, result card, photos).</p>
        </div>

        <div class="step">
            <div class="step-number">4</div>
            <p>Form submit karein admission office ya online portal par.</p>
        </div>

        <div class="step">
            <div class="step-number">5</div>
            <p>Merit list ka intezar karein.</p>
        </div>

        <div class="step">
            <div class="step-number">6</div>
            <p>Selection ke baad fee submit karke admission confirm karein.</p>
        </div>

    </div>
</div>

<!-- REQUIREMENTS -->
<div class="container section fade">
    <h2>Requirements</h2>

    <div class="row g-4">

        <div class="col-md-6">
            <div class="info-card">
                <h5 class="fw-bold">📄 Documents Needed</h5>
                <ul class="text-muted mb-0">
                    <li>CNIC / B-Form</li>
                    <li>Matric / Intermediate Result Card</li>
                    <li>Passport Size Photos</li>
                    <li>Domicile (if required)</li>
                </ul>
            </div>
        </div>

        <div class="col-md-6">
            <div class="info-card">
                <h5 class="fw-bold">⚠️ Important Rules</h5>
                <ul class="text-muted mb-0">
                    <li>Incomplete forms rejected honge</li>
                    <li>Late submissions not accepted</li>
                    <li>Admission strictly merit basis par hoga</li>
                    <li>False info = cancellation</li>
                </ul>
            </div>
        </div>

    </div>
</div>

<!-- HELP -->
<div class="container section fade">
    <div class="box text-center">
        <h3 class="fw-bold mb-3">Need Help?</h3>
        <p class="text-muted">
            Agar aapko admission process me koi problem ho to admission office se contact karein ya help desk visit karein.
        </p>

        <button class="btn btn-dark px-4 py-2" style="background:#7a1f1f;border:none;">
            Contact Admission Office
        </button>
    </div>
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