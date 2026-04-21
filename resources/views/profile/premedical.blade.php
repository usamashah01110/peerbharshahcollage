@extends('includes.main')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,300;0,600;0,700;1,300&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --red:        #dc2626;
    --red-soft:   #fef2f2;
    --red-mid:    #fca5a5;
    --blue:       #2563eb;
    --blue-soft:  #eff6ff;
    --green:      #059669;
    --green-soft: #ecfdf5;
    --amber:      #d97706;
    --amber-soft: #fffbeb;
    --surface:    #ffffff;
    --page:       #f7f8fc;
    --border:     #e5e9f2;
    --dark:       #0f172a;
    --body:       #475569;
    --muted:      #94a3b8;
    --max:        1060px;
}

body { background: var(--page); font-family: 'Plus Jakarta Sans', sans-serif; color: var(--body); -webkit-font-smoothing: antialiased; }

.pw { max-width: var(--max); margin: 0 auto; padding: 0 36px; }

/* ─── HERO ─── */
.hero {
    background: linear-gradient(135deg, #fff5f5 0%, #ffffff 50%, #eff6ff 100%);
    border-bottom: 1px solid var(--border);
    padding: 80px 0 0;
    text-align: center;
    overflow: hidden;
}

.hero-pill {
    display: inline-flex; align-items: center; gap: 8px;
    background: var(--surface); border: 1px solid var(--border);
    border-radius: 100px; padding: 6px 18px 6px 8px;
    font-size: 12px; font-weight: 700; color: var(--red);
    letter-spacing: .3px; margin-bottom: 26px;
    box-shadow: 0 2px 10px rgba(220,38,38,.09);
}
.hero-pill .dot {
    width: 8px; height: 8px; border-radius: 50%;
    background: var(--red); display: inline-block;
    animation: blink 2s infinite;
}
@keyframes blink { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.4;transform:scale(.7)} }

.hero h1 {
    font-family: 'Fraunces', serif;
    font-size: clamp(38px, 5.5vw, 64px);
    font-weight: 700; color: var(--dark);
    line-height: 1.1; letter-spacing: -.025em;
    margin-bottom: 18px;
}
.hero h1 em { font-style: italic; font-weight: 300; color: var(--red); }

.hero p {
    font-size: 16.5px; font-weight: 300;
    color: var(--body); max-width: 520px;
    margin: 0 auto 40px; line-height: 1.8;
}

.hero-img-wrap {
    position: relative;
    max-width: 860px;
    margin: 0 auto;
    padding: 0 36px;
}

.hero-img-wrap img {
    width: 100%; height: 380px;
    object-fit: cover;
    border-radius: 20px 20px 0 0;
    display: block;
    box-shadow: 0 -8px 40px rgba(0,0,0,.1);
}

.hero-img-badge {
    position: absolute;
    bottom: 20px; left: 56px;
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 12px 18px;
    display: flex; align-items: center; gap: 10px;
    box-shadow: 0 8px 24px rgba(0,0,0,.1);
}
.hero-img-badge .badge-icon {
    width: 36px; height: 36px; border-radius: 10px;
    background: var(--red-soft); display: flex; align-items: center; justify-content: center;
    font-size: 18px;
}
.hero-img-badge strong { display: block; font-size: 14px; font-weight: 700; color: var(--dark); }
.hero-img-badge span   { font-size: 11.5px; color: var(--muted); }

/* ─── SECTIONS ─── */
.sec { padding: 80px 0; }
.sec-alt { background: var(--surface); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }

.sec-head { text-align: center; margin-bottom: 48px; }
.sec-label {
    display: inline-block; font-size: 11px; font-weight: 700;
    letter-spacing: 2px; text-transform: uppercase;
    color: var(--red); margin-bottom: 10px;
}
.sec-title {
    font-family: 'Fraunces', serif;
    font-size: clamp(26px, 3.5vw, 38px);
    font-weight: 600; color: var(--dark); line-height: 1.2; margin-bottom: 10px;
}
.sec-sub { font-size: 15px; color: var(--muted); font-weight: 300; max-width: 480px; margin: 0 auto; }

/* ─── INFO CARD ─── */
.info-card {
    background: var(--surface); border: 1px solid var(--border);
    border-radius: 20px; padding: 44px 48px;
}
.info-card p { font-size: 15.5px; line-height: 1.88; color: var(--body); }
.info-card p + p { margin-top: 16px; }

/* ─── SUBJECT CARDS ─── */
.subjects-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
@media(max-width:680px){ .subjects-grid{ grid-template-columns: 1fr; } }

.subject-card {
    background: var(--surface); border: 1px solid var(--border);
    border-radius: 20px; padding: 32px 24px;
    text-align: center;
    transition: transform .28s ease, box-shadow .28s ease, border-color .28s;
}
.subject-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 44px rgba(0,0,0,.09);
    border-color: var(--red-mid);
}
.subject-icon {
    width: 64px; height: 64px; border-radius: 18px;
    display: flex; align-items: center; justify-content: center;
    font-size: 28px; margin: 0 auto 18px;
}
.subject-card h5 { font-size: 16.5px; font-weight: 700; color: var(--dark); margin-bottom: 8px; }
.subject-card p  { font-size: 13.5px; color: var(--muted); line-height: 1.6; }

/* ─── CAREER LIST ─── */
.career-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; }
@media(max-width:680px){ .career-grid{ grid-template-columns: 1fr; } }

.career-item {
    background: var(--surface); border: 1px solid var(--border);
    border-radius: 14px; padding: 18px 20px;
    display: flex; align-items: center; gap: 12px;
    font-size: 14.5px; font-weight: 500; color: var(--dark);
    transition: background .2s, border-color .2s;
}
.career-item:hover { background: var(--red-soft); border-color: var(--red-mid); }
.career-dot {
    width: 32px; height: 32px; border-radius: 50%;
    background: var(--red-soft); border: 1.5px solid var(--red-mid);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.career-dot svg { width: 13px; height: 13px; fill: none; stroke: var(--red); stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round; }

/* ─── WHY CARDS ─── */
.why-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
@media(max-width:680px){ .why-grid{ grid-template-columns: 1fr; } }

.why-card {
    background: var(--surface); border: 1px solid var(--border);
    border-radius: 20px; padding: 30px 32px;
    transition: transform .28s ease, box-shadow .28s ease;
}
.why-card:hover { transform: translateY(-4px); box-shadow: 0 14px 36px rgba(0,0,0,.07); }

.why-icon {
    width: 44px; height: 44px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 16px;
}
.why-card h5 { font-size: 16px; font-weight: 700; color: var(--dark); margin-bottom: 8px; }
.why-card p  { font-size: 14px; color: var(--body); line-height: 1.7; }

/* ─── FOOTER ─── */
.foot { background: var(--dark); padding: 36px 0; text-align: center; }
.foot p { color: rgba(255,255,255,.45); font-size: 13.5px; }
.foot strong { color: rgba(255,255,255,.8); }

/* ─── REVEAL ─── */
.reveal { opacity: 0; transform: translateY(28px); transition: opacity .65s ease, transform .65s ease; }
.reveal.on { opacity: 1; transform: translateY(0); }

@media(max-width:768px){
    .pw { padding: 0 20px; }
    .info-card { padding: 28px 22px; }
    .hero-img-wrap { padding: 0 20px; }
    .hero-img-badge { display: none; }
}
</style>

<!-- ═══ HERO ═══ -->
<section class="hero reveal">
    <div class="pw">
        <div class="hero-pill"><span class="dot"></span> Science Faculty</div>

        <h1>Pre-<em>Medical</em><br>Program</h1>

        <p>
            Pre-Medical program students ko doctor, dentist aur medical field ke liye prepare karta hai.
        </p>
    </div>

    <div class="hero-img-wrap">
        <img src="https://images.unsplash.com/photo-1580281657521-1e7c5b9f4d6c?q=80&w=1200&auto=format&fit=crop" alt="Pre-Medical Program">
        <div class="hero-img-badge">
            <div class="badge-icon">🏥</div>
            <div>
                <strong>Medical Sciences</strong>
                <span>FSc Pre-Medical</span>
            </div>
        </div>
    </div>
</section>

<!-- ═══ ABOUT ═══ -->
<section class="sec reveal">
    <div class="pw">
        <div class="sec-head">
            <div class="sec-label">Overview</div>
            <div class="sec-title">About Pre-Medical</div>
            <p class="sec-sub">Aapka career medical field mein shuru hota hai yahan se.</p>
        </div>

        <div class="info-card">
            <p>
                Pre-Medical ek important academic program hai jo students ko medical aur health sciences ki taraf le jata hai.
                Is program ke through students ko strong foundation milti hai Biology, Chemistry aur Physics mein.
            </p>
            <p>
                Ye program un students ke liye best hai jo future mein doctor, dentist, pharmacist ya medical specialist banna chahte hain.
            </p>
        </div>
    </div>
</section>

<!-- ═══ SUBJECTS ═══ -->
<section class="sec sec-alt reveal">
    <div class="pw">
        <div class="sec-head">
            <div class="sec-label">Curriculum</div>
            <div class="sec-title">Subjects</div>
            <p class="sec-sub">Teeno core subjects jo aapki medical journey ka base hain.</p>
        </div>

        <div class="subjects-grid">
            <div class="subject-card">
                <div class="subject-icon" style="background:#ecfdf5;">🧬</div>
                <h5>Biology</h5>
                <p>Human body, cells aur living organisms ka scientific study</p>
            </div>
            <div class="subject-card">
                <div class="subject-icon" style="background:#eff6ff;">🧪</div>
                <h5>Chemistry</h5>
                <p>Chemical reactions aur substances ki detailed understanding</p>
            </div>
            <div class="subject-card">
                <div class="subject-icon" style="background:#fff7ed;">⚛️</div>
                <h5>Physics</h5>
                <p>Scientific principles aur medical base concepts</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══ CAREER ═══ -->
<section class="sec reveal">
    <div class="pw">
        <div class="sec-head">
            <div class="sec-label">Future Paths</div>
            <div class="sec-title">Career Opportunities</div>
            <p class="sec-sub">Pre-Medical complete karne ke baad yeh fields available hain.</p>
        </div>

        <div class="career-grid">
            @foreach([
                'Doctor (MBBS)',
                'Dentist (BDS)',
                'Pharmacist',
                'Biotechnologist',
                'Medical Lab Technologist',
                'Nursing & Health Sciences',
            ] as $career)
            <div class="career-item">
                <span class="career-dot">
                    <svg viewBox="0 0 13 13"><polyline points="2,6.5 5,9.5 11,3"/></svg>
                </span>
                {{ $career }}
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══ WHY ═══ -->
<section class="sec sec-alt reveal">
    <div class="pw">
        <div class="sec-head">
            <div class="sec-label">Benefits</div>
            <div class="sec-title">Why Choose Pre-Medical?</div>
            <p class="sec-sub">Is program mein daakhla lene ki strong wajuhaat.</p>
        </div>

        <div class="why-grid">
            <div class="why-card">
                <div class="why-icon" style="background:#fef2f2;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="1.8" stroke-linecap="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                </div>
                <h5>High Demand Field</h5>
                <p>Medical field hamesha demand mein rehta hai. Doctors aur health professionals ki zaroorat kabhi khatam nahi hoti.</p>
            </div>

            <div class="why-card">
                <div class="why-icon" style="background:#eff6ff;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="1.8" stroke-linecap="round"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                </div>
                <h5>Respect &amp; Career Growth</h5>
                <p>Doctors aur medical professionals society mein highly respected hote hain aur career growth ke bohat mauqay hote hain.</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══ FOOTER ═══ -->
<footer class="foot">
    <div class="pw">
        <p><strong>Government College</strong> — Pre-Medical Program &nbsp;·&nbsp; Mazeed maloomat ke liye college office se rabta karein.</p>
    </div>
</footer>

<script>
const obs = new IntersectionObserver(e => e.forEach(x => {
    if (x.isIntersecting) { x.target.classList.add('on'); obs.unobserve(x.target); }
}), { threshold: 0.07 });
document.querySelectorAll('.reveal').forEach(el => obs.observe(el));
</script>

@endsection