@extends('includes.main')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,300&display=swap" rel="stylesheet">

<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --red:        #c0392b;
    --red-light:  #e74c3c;
    --red-pale:   #fdf2f2;
    --red-glow:   rgba(192,57,43,0.12);
    --red-border: rgba(192,57,43,0.22);
    --blue:       #1a56db;
    --blue-pale:  #eef3ff;
    --green:      #0a7c5c;
    --green-pale: #edfaf5;
    --amber:      #b45309;
    --amber-pale: #fffbeb;
    --ink:        #0d1117;
    --ink-80:     #1e2533;
    --body:       #3d4a5c;
    --muted:      #7c8da0;
    --border:     #e4e8f0;
    --surface:    #ffffff;
    --page:       #f5f6fa;
    --max:        1080px;
}

html { scroll-behavior: smooth; }
body {
    background: var(--page);
    font-family: 'DM Sans', sans-serif;
    color: var(--body);
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    line-height: 1.6;
}

.pw { max-width: var(--max); margin: 0 auto; padding: 0 40px; }

/* ══════════════════════════════════════
   NAV BREADCRUMB
══════════════════════════════════════ */
.breadcrumb-bar {
    background: var(--surface);
    border-bottom: 1px solid var(--border);
    padding: 13px 0;
}
.breadcrumb-bar .pw {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: var(--muted);
}
.breadcrumb-bar a {
    color: var(--muted);
    text-decoration: none;
    transition: color .2s;
}
.breadcrumb-bar a:hover { color: var(--red); }
.breadcrumb-bar .sep { opacity: .4; }
.breadcrumb-bar .current { color: var(--body); font-weight: 500; }

/* ══════════════════════════════════════
   HERO
══════════════════════════════════════ */
.hero {
    position: relative;
    background: var(--ink);
    overflow: hidden;
    padding: 0;
}

.hero-bg-pattern {
    position: absolute;
    inset: 0;
    background-image:
        radial-gradient(circle at 15% 50%, rgba(192,57,43,0.28) 0%, transparent 55%),
        radial-gradient(circle at 85% 20%, rgba(26,86,219,0.18) 0%, transparent 50%);
}

.hero-grid-lines {
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(255,255,255,0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.04) 1px, transparent 1px);
    background-size: 60px 60px;
}

.hero-inner {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    gap: 60px;
    min-height: 520px;
    padding: 80px 0 0;
}

.hero-left { padding-bottom: 80px; }

.hero-program-tag {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(192,57,43,0.18);
    border: 1px solid rgba(192,57,43,0.35);
    border-radius: 100px;
    padding: 6px 16px 6px 10px;
    font-size: 12px;
    font-weight: 600;
    color: #fca5a5;
    letter-spacing: .5px;
    text-transform: uppercase;
    margin-bottom: 28px;
}
.hero-program-tag .live-dot {
    width: 7px; height: 7px;
    border-radius: 50%;
    background: #ef4444;
    animation: pulse 2s infinite;
}
@keyframes pulse {
    0%,100%{ box-shadow: 0 0 0 0 rgba(239,68,68,0.5); }
    50%     { box-shadow: 0 0 0 5px rgba(239,68,68,0); }
}

.hero h1 {
    font-family: 'DM Serif Display', serif;
    font-size: clamp(40px, 4.5vw, 62px);
    font-weight: 400;
    color: #ffffff;
    line-height: 1.08;
    letter-spacing: -.02em;
    margin-bottom: 22px;
}
.hero h1 em {
    font-style: italic;
    color: #fca5a5;
}

.hero-desc {
    font-size: 16px;
    font-weight: 300;
    color: rgba(255,255,255,0.62);
    line-height: 1.8;
    max-width: 400px;
    margin-bottom: 36px;
}

.hero-stats {
    display: flex;
    gap: 28px;
}
.hero-stat {
    text-align: center;
}
.hero-stat .num {
    font-family: 'DM Serif Display', serif;
    font-size: 28px;
    color: #ffffff;
    line-height: 1;
    margin-bottom: 4px;
}
.hero-stat .label {
    font-size: 11.5px;
    color: rgba(255,255,255,0.45);
    letter-spacing: .3px;
}
.hero-stat-divider {
    width: 1px;
    background: rgba(255,255,255,0.12);
    align-self: stretch;
}

.hero-right {
    position: relative;
    align-self: stretch;
    display: flex;
    align-items: flex-end;
}

.hero-img-container {
    width: 100%;
    position: relative;
}

.hero-img-container img {
    width: 100%;
    height: 480px;
    object-fit: cover;
    display: block;
    border-radius: 24px 24px 0 0;
    opacity: .88;
}

.hero-info-float {
    position: absolute;
    bottom: 28px;
    left: -24px;
    background: var(--surface);
    border-radius: 16px;
    padding: 16px 20px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.25);
    display: flex;
    align-items: center;
    gap: 14px;
    min-width: 220px;
}
.hero-info-float .fi-icon {
    width: 42px; height: 42px;
    border-radius: 12px;
    background: var(--red-pale);
    display: flex; align-items: center; justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
}
.hero-info-float strong {
    display: block;
    font-size: 13.5px;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 2px;
}
.hero-info-float span {
    font-size: 11.5px;
    color: var(--muted);
}

/* ══════════════════════════════════════
   SECTION FRAMEWORK
══════════════════════════════════════ */
.sec { padding: 88px 0; }
.sec-alt {
    background: var(--surface);
    border-top: 1px solid var(--border);
    border-bottom: 1px solid var(--border);
}

.sec-head {
    margin-bottom: 52px;
}
.sec-head.centered { text-align: center; }
.sec-head.centered .sec-sub { margin: 0 auto; }

.sec-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: var(--red);
    margin-bottom: 14px;
}
.sec-eyebrow::before {
    content: '';
    display: block;
    width: 20px;
    height: 2px;
    background: var(--red);
    border-radius: 2px;
}

.sec-title {
    font-family: 'DM Serif Display', serif;
    font-size: clamp(28px, 3vw, 40px);
    font-weight: 400;
    color: var(--ink);
    line-height: 1.18;
    margin-bottom: 14px;
    letter-spacing: -.015em;
}

.sec-sub {
    font-size: 15.5px;
    color: var(--muted);
    font-weight: 300;
    max-width: 500px;
    line-height: 1.75;
}

/* ══════════════════════════════════════
   ABOUT SECTION – TWO-COL LAYOUT
══════════════════════════════════════ */
.about-layout {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 64px;
    align-items: center;
}

.about-text p {
    font-size: 15.5px;
    line-height: 1.9;
    color: var(--body);
}
.about-text p + p { margin-top: 18px; }

.about-highlights {
    display: flex;
    flex-direction: column;
    gap: 16px;
    margin-top: 32px;
}
.highlight-row {
    display: flex;
    align-items: flex-start;
    gap: 14px;
}
.highlight-icon {
    width: 38px; height: 38px;
    border-radius: 10px;
    background: var(--red-pale);
    display: flex; align-items: center; justify-content: center;
    font-size: 17px;
    flex-shrink: 0;
    margin-top: 2px;
}
.highlight-row h6 {
    font-size: 14px;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 3px;
}
.highlight-row p {
    font-size: 13.5px;
    color: var(--muted);
    line-height: 1.6;
}

.about-visual {
    position: relative;
}
.about-visual-main {
    width: 100%;
    height: 380px;
    object-fit: cover;
    border-radius: 24px;
    display: block;
}
.about-badge {
    position: absolute;
    bottom: -20px;
    right: -20px;
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 18px;
    padding: 18px 22px;
    box-shadow: 0 16px 48px rgba(0,0,0,0.10);
    text-align: center;
}
.about-badge .ab-num {
    font-family: 'DM Serif Display', serif;
    font-size: 32px;
    color: var(--red);
    line-height: 1;
    margin-bottom: 4px;
}
.about-badge .ab-label {
    font-size: 12px;
    color: var(--muted);
    font-weight: 400;
    white-space: nowrap;
}

/* ══════════════════════════════════════
   SUBJECTS
══════════════════════════════════════ */
.subjects-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
}

.subject-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 22px;
    padding: 36px 28px;
    text-align: center;
    position: relative;
    overflow: hidden;
    transition: transform .32s cubic-bezier(.25,.8,.25,1),
                box-shadow .32s cubic-bezier(.25,.8,.25,1),
                border-color .32s;
}
.subject-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    border-radius: 22px 22px 0 0;
    background: var(--card-accent, var(--red));
    transform: scaleX(0);
    transform-origin: left;
    transition: transform .35s ease;
}
.subject-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 24px 56px rgba(0,0,0,0.10);
    border-color: rgba(0,0,0,0);
}
.subject-card:hover::before { transform: scaleX(1); }

.subject-emoji-wrap {
    width: 72px; height: 72px;
    border-radius: 20px;
    display: flex; align-items: center; justify-content: center;
    font-size: 32px;
    margin: 0 auto 22px;
}
.subject-card h4 {
    font-size: 17.5px;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 10px;
    letter-spacing: -.01em;
}
.subject-card p {
    font-size: 13.5px;
    color: var(--muted);
    line-height: 1.65;
}

.subject-topics {
    margin-top: 18px;
    padding-top: 18px;
    border-top: 1px solid var(--border);
    display: flex;
    flex-wrap: wrap;
    gap: 7px;
    justify-content: center;
}
.topic-pill {
    font-size: 11.5px;
    font-weight: 500;
    padding: 4px 12px;
    border-radius: 100px;
    background: var(--pill-bg, var(--red-pale));
    color: var(--pill-color, var(--red));
}

/* ══════════════════════════════════════
   CAREER PATHS
══════════════════════════════════════ */
.career-layout {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 48px;
    align-items: start;
}

.career-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.career-item {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 18px 22px;
    display: flex;
    align-items: center;
    gap: 16px;
    transition: border-color .22s, background .22s, transform .22s;
    cursor: default;
}
.career-item:hover {
    background: var(--red-pale);
    border-color: var(--red-border);
    transform: translateX(4px);
}
.career-num {
    width: 36px; height: 36px;
    border-radius: 10px;
    background: var(--page);
    border: 1px solid var(--border);
    display: flex; align-items: center; justify-content: center;
    font-size: 13px;
    font-weight: 700;
    color: var(--muted);
    flex-shrink: 0;
    transition: background .22s, border-color .22s, color .22s;
}
.career-item:hover .career-num {
    background: var(--red);
    border-color: var(--red);
    color: #fff;
}
.career-info strong {
    display: block;
    font-size: 14.5px;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 3px;
}
.career-info span {
    font-size: 12.5px;
    color: var(--muted);
}

.career-visual {
    position: sticky;
    top: 30px;
}
.career-visual img {
    width: 100%;
    height: 360px;
    object-fit: cover;
    border-radius: 22px;
    display: block;
    margin-bottom: 18px;
}
.career-visual-caption {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 22px 24px;
}
.career-visual-caption h5 {
    font-size: 14px;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 8px;
}
.career-visual-caption p {
    font-size: 13.5px;
    color: var(--muted);
    line-height: 1.65;
}

/* ══════════════════════════════════════
   WHY CHOOSE
══════════════════════════════════════ */
.why-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.why-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 32px 34px;
    position: relative;
    overflow: hidden;
    transition: transform .28s ease, box-shadow .28s ease;
}
.why-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 16px 40px rgba(0,0,0,0.08);
}
.why-card-accent {
    position: absolute;
    top: 0; right: 0;
    width: 100px; height: 100px;
    border-radius: 0 20px 0 100%;
    opacity: .08;
}

.why-icon-wrap {
    width: 48px; height: 48px;
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 20px;
}
.why-card h5 {
    font-size: 16.5px;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 10px;
    letter-spacing: -.01em;
}
.why-card p {
    font-size: 14px;
    color: var(--body);
    line-height: 1.75;
}

/* ══════════════════════════════════════
   CTA BANNER
══════════════════════════════════════ */
.cta-section { padding: 88px 0; }
.cta-inner {
    background: var(--ink);
    border-radius: 28px;
    padding: 64px;
    text-align: center;
    position: relative;
    overflow: hidden;
}
.cta-inner::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(circle at 20% 50%, rgba(192,57,43,0.3) 0%, transparent 60%),
        radial-gradient(circle at 80% 50%, rgba(26,86,219,0.2) 0%, transparent 60%);
}
.cta-inner > * { position: relative; z-index: 1; }
.cta-inner h2 {
    font-family: 'DM Serif Display', serif;
    font-size: clamp(28px, 3vw, 42px);
    color: #fff;
    font-weight: 400;
    margin-bottom: 16px;
    letter-spacing: -.02em;
}
.cta-inner p {
    font-size: 16px;
    color: rgba(255,255,255,0.55);
    font-weight: 300;
    margin-bottom: 36px;
}
.cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--red);
    color: #fff;
    text-decoration: none;
    padding: 14px 32px;
    border-radius: 100px;
    font-size: 15px;
    font-weight: 600;
    letter-spacing: .01em;
    transition: background .2s, transform .2s, box-shadow .2s;
    box-shadow: 0 8px 24px rgba(192,57,43,0.4);
}
.cta-btn:hover {
    background: #a93226;
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(192,57,43,0.5);
}
.cta-btn svg { width: 16px; height: 16px; }

/* ══════════════════════════════════════
   FOOTER
══════════════════════════════════════ */
.site-footer {
    background: var(--ink-80);
    border-top: 1px solid rgba(255,255,255,0.06);
    padding: 44px 0;
    text-align: center;
}
.site-footer .footer-logo {
    font-family: 'DM Serif Display', serif;
    font-size: 18px;
    color: rgba(255,255,255,0.85);
    margin-bottom: 10px;
}
.site-footer p {
    font-size: 13.5px;
    color: rgba(255,255,255,0.35);
    line-height: 1.8;
}

/* ══════════════════════════════════════
   ANIMATIONS
══════════════════════════════════════ */
.reveal {
    opacity: 0;
    transform: translateY(32px);
    transition: opacity .7s cubic-bezier(.25,.8,.25,1),
                transform .7s cubic-bezier(.25,.8,.25,1);
}
.reveal.visible {
    opacity: 1;
    transform: none;
}
.reveal-delay-1 { transition-delay: .1s; }
.reveal-delay-2 { transition-delay: .2s; }
.reveal-delay-3 { transition-delay: .3s; }

/* ══════════════════════════════════════
   RESPONSIVE
══════════════════════════════════════ */
@media (max-width: 900px) {
    .pw { padding: 0 24px; }
    .hero-inner { grid-template-columns: 1fr; padding: 60px 0 0; gap: 40px; }
    .hero-right { display: none; }
    .hero-left { padding-bottom: 60px; }
    .about-layout { grid-template-columns: 1fr; gap: 40px; }
    .about-badge { display: none; }
    .subjects-grid { grid-template-columns: 1fr; }
    .career-layout { grid-template-columns: 1fr; }
    .career-visual { display: none; }
    .why-grid { grid-template-columns: 1fr; }
    .cta-inner { padding: 48px 28px; }
}
@media (max-width: 600px) {
    .hero-stats { gap: 16px; }
    .hero-stat .num { font-size: 22px; }
}
</style>

<!-- ═══ BREADCRUMB ═══ -->
<div class="breadcrumb-bar">
    <div class="pw">
        <a href="#">Home</a>
        <span class="sep">›</span>
        <a href="#">Programs</a>
        <span class="sep">›</span>
        <span class="current">Pre-Medical</span>
    </div>
</div>

<!-- ═══ HERO ═══ -->
<section class="hero">
    <div class="hero-bg-pattern"></div>
    <div class="hero-grid-lines"></div>
    <div class="pw">
        <div class="hero-inner">

            <div class="hero-left reveal">
                <div class="hero-program-tag">
                    <span class="live-dot"></span>
                    FSc — Science Faculty
                </div>

                <h1>
                    Pre&#8209;<em>Medical</em><br>Program
                </h1>

                <p class="hero-desc">
                    Doctor, dentist aur medical specialist banne ka safar yahan se shuru hota hai.
                    Pakistan ke beshtar medical colleges ke liye strongest foundation.
                </p>

                <div class="hero-stats">
                    <div class="hero-stat">
                        <div class="num">2</div>
                        <div class="label">Saal ka Program</div>
                    </div>
                    <div class="hero-stat-divider"></div>
                    <div class="hero-stat">
                        <div class="num">3</div>
                        <div class="label">Core Subjects</div>
                    </div>
                    <div class="hero-stat-divider"></div>
                    <div class="hero-stat">
                        <div class="num">6+</div>
                        <div class="label">Career Paths</div>
                    </div>
                </div>
            </div>

            <div class="hero-right reveal reveal-delay-2">
                <div class="hero-img-container">
                    <img
                        src="https://images.unsplash.com/photo-1584820927498-cfe5211fd8bf?q=80&w=900&auto=format&fit=crop"
                        alt="Medical students in lab"
                        loading="eager"
                    >
                    <div class="hero-info-float">
                        <div class="fi-icon">🏥</div>
                        <div>
                            <strong>Medical Sciences</strong>
                            <span>FSc Pre-Medical · Science Faculty</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ═══ ABOUT ═══ -->
<section class="sec">
    <div class="pw">
        <div class="about-layout">

            <div class="reveal">
                <div class="sec-head">
                    <div class="sec-eyebrow">Program Overview</div>
                    <h2 class="sec-title">Pre-Medical kya hai?</h2>
                    <p class="sec-sub">Pakistan mein medical field ka sab se popular intermediate program</p>
                </div>

                <div class="about-text">
                    <p>
                        Pre-Medical ek 2-saal ka FSc program hai jo students ko Biology, Chemistry aur Physics
                        mein strong academic foundation deta hai. Ye program specifically un students ke liye
                        design kiya gaya hai jo MBBS, BDS ya kisi aur medical degree ka iraada rakhte hain.
                    </p>
                    <p>
                        MDCAT (Medical & Dental College Admission Test) mein kamyabi ke liye is program ka
                        curriculum directly helpful hai. Aap jo kuch yahan parhainge, wohi aapka MDCAT aur
                        future medical studies ka base banega.
                    </p>
                </div>

                <div class="about-highlights">
                    <div class="highlight-row reveal reveal-delay-1">
                        <div class="highlight-icon">📋</div>
                        <div>
                            <h6>MDCAT Preparation</h6>
                            <p>Curriculum directly MDCAT syllabus ke sath aligned hai</p>
                        </div>
                    </div>
                    <div class="highlight-row reveal reveal-delay-2">
                        <div class="highlight-icon">🔬</div>
                        <div>
                            <h6>Practical Lab Work</h6>
                            <p>Biology aur Chemistry ke hands-on lab sessions</p>
                        </div>
                    </div>
                    <div class="highlight-row reveal reveal-delay-3">
                        <div class="highlight-icon">🎓</div>
                        <div>
                            <h6>Experienced Faculty</h6>
                            <p>Qualified teachers jo students ki individual progress track karte hain</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="about-visual reveal reveal-delay-1">
                <img
                    class="about-visual-main"
                    src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=800&auto=format&fit=crop"
                    alt="Medical lab"
                    loading="lazy"
                >
                <div class="about-badge">
                    <div class="ab-num">100%</div>
                    <div class="ab-label">University Eligible</div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ═══ SUBJECTS ═══ -->
<section class="sec sec-alt">
    <div class="pw">
        <div class="sec-head centered reveal">
            <div class="sec-eyebrow">Curriculum</div>
            <h2 class="sec-title">Core Subjects</h2>
            <p class="sec-sub">Teen subjects jo aapki poori medical education ka bunyadi dhanca tayar karte hain</p>
        </div>

        <div class="subjects-grid">

            <div class="subject-card reveal" style="--card-accent:#059669;">
                <div class="subject-emoji-wrap" style="background:#ecfdf5;">🧬</div>
                <h4>Biology</h4>
                <p>Insani jism, cells, tissues aur tamam living organisms ka scientific aur detailed study</p>
                <div class="subject-topics">
                    <span class="topic-pill" style="--pill-bg:#ecfdf5;--pill-color:#065f46;">Anatomy</span>
                    <span class="topic-pill" style="--pill-bg:#ecfdf5;--pill-color:#065f46;">Genetics</span>
                    <span class="topic-pill" style="--pill-bg:#ecfdf5;--pill-color:#065f46;">Physiology</span>
                    <span class="topic-pill" style="--pill-bg:#ecfdf5;--pill-color:#065f46;">Ecology</span>
                </div>
            </div>

            <div class="subject-card reveal reveal-delay-1" style="--card-accent:#1a56db;">
                <div class="subject-emoji-wrap" style="background:#eef3ff;">🧪</div>
                <h4>Chemistry</h4>
                <p>Organic, inorganic aur physical chemistry ke through substances aur reactions ki understanding</p>
                <div class="subject-topics">
                    <span class="topic-pill" style="--pill-bg:#eef3ff;--pill-color:#1e3a8a;">Organic</span>
                    <span class="topic-pill" style="--pill-bg:#eef3ff;--pill-color:#1e3a8a;">Inorganic</span>
                    <span class="topic-pill" style="--pill-bg:#eef3ff;--pill-color:#1e3a8a;">Biochemistry</span>
                </div>
            </div>

            <div class="subject-card reveal reveal-delay-2" style="--card-accent:#b45309;">
                <div class="subject-emoji-wrap" style="background:#fffbeb;">⚛️</div>
                <h4>Physics</h4>
                <p>Scientific principles jo medical imaging, radiation aur biophysics ka base hain</p>
                <div class="subject-topics">
                    <span class="topic-pill" style="--pill-bg:#fffbeb;--pill-color:#78350f;">Mechanics</span>
                    <span class="topic-pill" style="--pill-bg:#fffbeb;--pill-color:#78350f;">Optics</span>
                    <span class="topic-pill" style="--pill-bg:#fffbeb;--pill-color:#78350f;">Electricity</span>
                    <span class="topic-pill" style="--pill-bg:#fffbeb;--pill-color:#78350f;">Waves</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ═══ CAREER PATHS ═══ -->
<section class="sec">
    <div class="pw">
        <div class="career-layout">

            <div>
                <div class="sec-head reveal">
                    <div class="sec-eyebrow">Future Paths</div>
                    <h2 class="sec-title">Career Opportunities</h2>
                    <p class="sec-sub">Pre-Medical ke baad aapke paas ye prestigious career options available hain</p>
                </div>

                <div class="career-list">
                    @foreach([
                        ['title' => 'Doctor (MBBS)',             'sub' => 'Medical & Dental College — 5 saal'],
                        ['title' => 'Dentist (BDS)',             'sub' => 'Dental Surgery — 4 saal'],
                        ['title' => 'Pharmacist (Pharm-D)',      'sub' => 'Pharmacy College — 5 saal'],
                        ['title' => 'Biotechnologist',           'sub' => 'BS Biotechnology — 4 saal'],
                        ['title' => 'Medical Lab Technologist',  'sub' => 'BS MLT — 4 saal'],
                        ['title' => 'Nursing & Health Sciences', 'sub' => 'BS Nursing — 4 saal'],
                    ] as $i => $career)
                    <div class="career-item reveal" style="transition-delay: {{ $i * 0.07 }}s">
                        <div class="career-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
                        <div class="career-info">
                            <strong>{{ $career['title'] }}</strong>
                            <span>{{ $career['sub'] }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="career-visual reveal reveal-delay-1">
                <img
                    src="https://images.unsplash.com/photo-1559757175-0eb30cd8c063?q=80&w=700&auto=format&fit=crop"
                    alt="Medical students"
                    loading="lazy"
                >
                <div class="career-visual-caption">
                    <h5>Pakistan mein Medical ka Mustaqbil</h5>
                    <p>Health sector mein graduates ki demand tezi se barh rahi hai. MBBS aur BDS doctors ko government aur private dono sectors mein behtareen mawaqa milte hain.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ═══ WHY CHOOSE ═══ -->
<section class="sec sec-alt">
    <div class="pw">
        <div class="sec-head centered reveal">
            <div class="sec-eyebrow">Benefits</div>
            <h2 class="sec-title">Pre-Medical kyun chunain?</h2>
            <p class="sec-sub">Is program ke sath apna medical career shuru karne ki compelling wajuhaat</p>
        </div>

        <div class="why-grid">
            @php
            $whyCards = [
                [
                    'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>',
                    'bg'    => '#fdf2f2',
                    'color' => '#c0392b',
                    'acbg'  => '#c0392b',
                    'title' => 'Har Waqt Demand',
                    'desc'  => 'Doctors aur medical professionals ki zaroorat kabhi khatam nahi hoti. Pakistan mein har 10,000 logo pe sirf 1 doctor hai — iska matlab hai bohat zyada opportunity.',
                ],
                [
                    'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
                    'bg'    => '#eef3ff',
                    'color' => '#1a56db',
                    'acbg'  => '#1a56db',
                    'title' => 'Izzat aur Maqam',
                    'desc'  => 'Tabib aur doctor — in alqaab ko society mein jo izzat milti hai wo kisi aur profession mein mushkil se milti hai. Aapke ghar walay aur community aap par fakhr karenge.',
                ],
                [
                    'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>',
                    'bg'    => '#ecfdf5',
                    'color' => '#0a7c5c',
                    'acbg'  => '#059669',
                    'title' => 'Achi Kamai',
                    'desc'  => 'Medical professionals Pakistan ke sab se zyada kamai karne wale professionals mein shumaar hote hain. Sarkari aur private dono sectors mein salary aur perks excellent hain.',
                ],
                [
                    'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20"/></svg>',
                    'bg'    => '#fffbeb',
                    'color' => '#b45309',
                    'acbg'  => '#d97706',
                    'title' => 'Worldwide Recognition',
                    'desc'  => 'Pakistani MBBS doctors UAE, UK, Canada aur Saudi Arabia mein kaam karte hain. Abroad jaane ka raasta bhi Pre-Medical se hi shuru hota hai.',
                ],
            ];
            @endphp

            @foreach($whyCards as $i => $card)
            <div class="why-card reveal {{ $i > 0 ? 'reveal-delay-' . $i : '' }}">
                <div class="why-card-accent" style="background: {{ $card['acbg'] }};"></div>
                <div class="why-icon-wrap" style="background: {{ $card['bg'] }}; color: {{ $card['color'] }};">
                    {!! $card['icon'] !!}
                </div>
                <h5>{{ $card['title'] }}</h5>
                <p>{{ $card['desc'] }}</p>
            </div>
            @endforeach

        </div>
    </div>
</section>

<!-- ═══ CTA ═══ -->
<section class="cta-section">
    <div class="pw">
        <div class="cta-inner reveal">
            <h2>Apna Daakhla Abhi Confirm Karein</h2>
            <p>Limited seats available hain — form jama karwane mein der na karein</p>
            <a href="#" class="cta-btn">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M8 1l7 7-7 7M1 8h14"/>
                </svg>
                College Office Se Rabta Karein
            </a>
        </div>
    </div>
</section>

<!-- ═══ FOOTER ═══ -->
<footer class="site-footer">
    <div class="pw">
        <div class="footer-logo">Government College</div>
        <p>
            Pre-Medical Program &nbsp;·&nbsp; Science Faculty<br>
            Mazeed maloomat ke liye office aye ya helpline par call karein.
        </p>
    </div>
</footer>

<script>
(function () {
    const els = document.querySelectorAll('.reveal');
    const obs = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.08 });
    els.forEach(function (el) { obs.observe(el); });
})();
</script>

@endsection