@extends('includes.main')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,300;0,600;0,700;1,300&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --red:         #e03535;
    --red-soft:    #fff5f5;
    --red-mid:     #fca5a5;
    --red-deep:    #b91c1c;
    --warm:        #b45309;
    --warm-soft:   #fffbeb;
    --surface:     #ffffff;
    --page:        #fff8f8;
    --border:      #f0e0e0;
    --dark:        #1a0a0a;
    --body:        #4a3535;
    --muted:       #a07070;
    --max:         1080px;
}

body { background: var(--page); font-family: 'Plus Jakarta Sans', sans-serif; color: var(--body); -webkit-font-smoothing: antialiased; }
.pw { max-width: var(--max); margin: 0 auto; padding: 0 36px; }

/* ── HERO ── */
.hero { position: relative; height: 320px; overflow: hidden; }
.hero img.hero-bg {
    width: 100%; height: 100%; object-fit: cover;
    object-position: center 30%;
    filter: brightness(0.38) saturate(0.85);
}
.hero-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(135deg, rgba(180,30,30,0.72) 0%, rgba(220,80,80,0.48) 100%);
}
.hero-content {
    position: absolute; inset: 0;
    display: flex; flex-direction: column;
    align-items: center; justify-content: center; gap: 10px;
}
.hero-pill {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(255,255,255,0.15);
    border: 1px solid rgba(255,200,200,0.5);
    border-radius: 100px; padding: 6px 18px 6px 10px;
    font-size: 12.5px; font-weight: 600; color: #ffe0e0;
    margin-bottom: 6px;
}
.hero-pill .dot {
    width: 8px; height: 8px; border-radius: 50%;
    background: #ffcccc; display: inline-block;
    animation: blink 2s infinite;
}
@keyframes blink { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.4;transform:scale(.75)} }
.hero-content h1 {
    font-family: 'Fraunces', serif;
    font-size: clamp(32px, 5vw, 58px);
    font-weight: 700; color: #fff;
    letter-spacing: 6px; margin: 0; text-align: center;
}
.hero-content .hero-line { width: 50px; height: 2px; background: #ffcccc; }
.hero-content p { color: rgba(255,220,220,0.85); font-size: 0.82rem; margin: 4px 0 0; letter-spacing: 1px; }
.hero-stats {
    display: inline-flex;
    background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,200,200,0.3);
    border-radius: 18px; overflow: hidden; margin-top: 6px;
}
.hero-stat { padding: 14px 28px; text-align: center; border-right: 1px solid rgba(255,200,200,0.25); }
.hero-stat:last-child { border-right: none; }
.hero-stat strong { display:block; font-size:20px; font-weight:700; color:#fff; font-family:'Fraunces',serif; }
.hero-stat span { font-size:11px; color:rgba(255,220,220,0.8); font-weight:600; letter-spacing:.8px; text-transform:uppercase; }

/* ── DIVIDER ── */
.red-divider {
    height: 3px;
    background: linear-gradient(90deg, transparent, var(--red-mid), var(--red), var(--red-mid), transparent);
    border: none; margin: 0; opacity: .35;
}

/* ── SEC IMG BANNER ── */
.sec-img-banner {
    width: 100%; height: 200px; overflow: hidden;
    border-radius: 16px; margin-bottom: 36px; position: relative;
}
.sec-img-banner img {
    width: 100%; height: 100%; object-fit: cover;
    object-position: center 35%;
    transition: transform 0.5s ease;
}
.sec-img-banner:hover img { transform: scale(1.05); }
.sec-img-banner .img-label {
    position: absolute; bottom: 14px; left: 18px;
    background: rgba(180,30,30,0.8);
    color: #fff; font-size: 11px; font-weight: 600;
    letter-spacing: 2px; text-transform: uppercase;
    padding: 5px 14px; border-radius: 100px;
}

/* ── SECTIONS ── */
.sec { padding: 72px 0; }
.sec-alt { background: #fff0f0; border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }

.sec-head { text-align: center; margin-bottom: 44px; }
.sec-label { display:inline-block; font-size:11px; font-weight:700; letter-spacing:2px; text-transform:uppercase; color:var(--red); margin-bottom:10px; }
.sec-label.warm { color: var(--warm); }
.sec-title { font-family:'Fraunces',serif; font-size:clamp(24px,3.5vw,36px); font-weight:600; color:var(--dark); line-height:1.2; margin-bottom:10px; }
.sec-sub { font-size:15px; color:var(--muted); font-weight:300; max-width:480px; margin:0 auto; }

/* ── PROG CARDS ── */
.prog-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px,1fr)); gap: 20px; }
.prog-grid-3 { display: grid; grid-template-columns: repeat(3,1fr); gap: 20px; }
@media(max-width:680px){ .prog-grid-3{ grid-template-columns:1fr; } }

.prog-card {
    background:var(--surface); border:1px solid var(--border);
    border-radius:20px; overflow:hidden;
    transition:transform .28s ease, box-shadow .28s ease, border-color .28s;
}
.prog-card:hover { transform:translateY(-6px); box-shadow:0 18px 44px rgba(224,53,53,.13); border-color:var(--red-mid); }
.prog-card img { width:100%; height:158px; object-fit:cover; display:block; }
.prog-card-body { padding:18px 20px 22px; }
.prog-tag { display:inline-block; font-size:10px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; border-radius:100px; padding:3px 11px; margin-bottom:9px; }
.prog-tag.sci { color:var(--red); background:var(--red-soft); }
.prog-tag.art { color:var(--warm); background:var(--warm-soft); }
.prog-card h5 { font-size:15.5px; font-weight:600; color:var(--dark); line-height:1.3; }
.prog-card p  { font-size:12.5px; color:var(--muted); margin-top:4px; line-height:1.55; }

/* ── CHECKLIST ── */
.chk-list { list-style:none; display:flex; flex-direction:column; gap:10px; }
.chk-list li { display:flex; align-items:flex-start; gap:11px; font-size:14.5px; color:var(--body); line-height:1.6; }
.chk {
    width:20px; height:20px; border-radius:6px;
    background:var(--red-soft); border:1.5px solid var(--red-mid);
    display:flex; align-items:center; justify-content:center;
    flex-shrink:0; margin-top:1px;
}
.chk svg { width:10px; height:10px; fill:none; stroke:var(--red); stroke-width:2.5; stroke-linecap:round; stroke-linejoin:round; }

/* ── TWO COL ── */
.two-col { display:grid; grid-template-columns:1fr 1fr; gap:32px; }
@media(max-width:680px){ .two-col{grid-template-columns:1fr;} }

/* ── ATTEND GRID ── */
.attend-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:12px; }
@media(max-width:680px){ .attend-grid{grid-template-columns:1fr;} }
.attend-item {
    background:var(--red-soft); border:1px solid var(--border);
    border-radius:12px; padding:14px 16px;
    display:flex; gap:10px; align-items:flex-start;
    font-size:13.5px; color:var(--body); line-height:1.5;
    transition: border-color .2s, box-shadow .2s;
}
.attend-item:hover { border-color:var(--red-mid); box-shadow:0 4px 14px rgba(224,53,53,.08); }

/* ════════════════════════════════════════════════
   ── MASTER FAQ SECTION ──
   ════════════════════════════════════════════════ */

.faq-section {
    padding: 80px 0;
    background: var(--page);
}
.faq-section.faq-alt {
    background: #fff0f0;
    border-top: 1px solid var(--border);
    border-bottom: 1px solid var(--border);
}

/* Section header */
.faq-sec-head {
    text-align: center;
    margin-bottom: 48px;
}
.faq-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--red-soft);
    border: 1px solid var(--red-mid);
    border-radius: 100px;
    padding: 5px 16px 5px 10px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: var(--red-deep);
    margin-bottom: 14px;
}
.faq-pill-dot {
    width: 8px; height: 8px;
    border-radius: 50%;
    background: var(--red);
    flex-shrink: 0;
}
.faq-sec-title {
    font-family: 'Fraunces', serif;
    font-size: clamp(24px, 3.5vw, 36px);
    font-weight: 600;
    color: var(--dark);
    line-height: 1.2;
    margin-bottom: 10px;
}
.faq-sec-sub {
    font-size: 15px;
    color: var(--muted);
    font-weight: 300;
    max-width: 500px;
    margin: 0 auto;
    line-height: 1.7;
}

/* FAQ wrap */
.faq-wrap {
    display: flex;
    flex-direction: column;
    gap: 12px;
    max-width: 860px;
    margin: 0 auto;
}

/* FAQ item */
.faq-item {
    background: var(--surface);
    border: 1.5px solid var(--border);
    border-radius: 18px;
    overflow: hidden;
    transition: border-color .3s ease, box-shadow .3s ease;
}
.faq-item.open {
    border-color: var(--red-mid);
    box-shadow: 0 8px 32px rgba(224, 53, 53, 0.10);
}

/* FAQ button */
.faq-btn {
    width: 100%;
    background: none;
    border: none;
    padding: 20px 26px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    gap: 16px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    transition: background .2s ease;
    text-align: left;
}
.faq-btn:hover { background: var(--red-soft); }
.faq-item.open .faq-btn { background: var(--red-soft); }

.faq-btn-left {
    display: flex;
    align-items: center;
    gap: 14px;
}

/* Icon box */
.faq-icon-box {
    width: 40px; height: 40px;
    border-radius: 12px;
    background: var(--red-soft);
    border: 1.5px solid var(--red-mid);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    transition: background .3s, border-color .3s;
}
.faq-item.open .faq-icon-box {
    background: var(--red);
    border-color: var(--red);
}
.faq-icon-box svg {
    width: 18px; height: 18px;
    fill: none;
    stroke: var(--red);
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
    transition: stroke .3s;
}
.faq-item.open .faq-icon-box svg { stroke: #fff; }

.faq-btn-text {}
.faq-btn-label {
    font-size: 10.5px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: var(--red);
    display: block;
    margin-bottom: 3px;
    transition: color .2s;
}
.faq-item.open .faq-btn-label { color: var(--red-deep); }
.faq-btn-title {
    font-size: 15.5px;
    font-weight: 600;
    color: var(--dark);
    display: block;
    line-height: 1.3;
}

/* Chevron */
.faq-chevron {
    width: 32px; height: 32px;
    border-radius: 50%;
    background: var(--red-soft);
    border: 1.5px solid var(--red-mid);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    transition: transform .35s ease, background .3s, border-color .3s;
}
.faq-item.open .faq-chevron {
    transform: rotate(180deg);
    background: var(--red);
    border-color: var(--red);
}
.faq-chevron svg {
    width: 14px; height: 14px;
    fill: none;
    stroke: var(--red);
    stroke-width: 2.5;
    stroke-linecap: round;
    stroke-linejoin: round;
    transition: stroke .3s;
}
.faq-item.open .faq-chevron svg { stroke: #fff; }

/* FAQ body */
.faq-body {
    display: none;
    padding: 0 26px 26px;
    border-top: 1.5px solid var(--border);
    animation: fadeDown .3s ease;
}
.faq-item.open .faq-body { display: block; }
@keyframes fadeDown { from { opacity:0; transform:translateY(-8px); } to { opacity:1; transform:translateY(0); } }

.faq-body-inner { padding-top: 22px; }

/* Prose inside body */
.faq-prose {
    font-size: 14.5px;
    color: var(--body);
    line-height: 1.85;
    margin-bottom: 18px;
}
.faq-prose:last-child { margin-bottom: 0; }

/* Sub heading inside body */
.faq-sub-head {
    font-family: 'Fraunces', serif;
    font-size: 16px;
    font-weight: 600;
    color: var(--dark);
    margin: 22px 0 12px;
    padding-bottom: 10px;
    border-bottom: 1px solid var(--border);
}
.faq-sub-head:first-child { margin-top: 0; }

/* Two col inside body */
.faq-two-col { display:grid; grid-template-columns:1fr 1fr; gap:28px; }
@media(max-width:640px){ .faq-two-col{grid-template-columns:1fr;} }

/* Highlight cards inside body */
.faq-hl-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(160px,1fr)); gap:10px; margin:14px 0; }
.faq-hl-card {
    background: var(--red-soft);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 14px 16px;
    transition: border-color .2s, box-shadow .2s;
}
.faq-hl-card:hover { border-color: var(--red-mid); box-shadow: 0 4px 14px rgba(224,53,53,.08); }
.faq-hl-card .hl-top { display:flex; align-items:center; gap:8px; margin-bottom:4px; }
.faq-hl-dot { width:7px; height:7px; border-radius:50%; background:var(--red); flex-shrink:0; }
.faq-hl-title { font-size:12.5px; font-weight:600; color:var(--dark); }
.faq-hl-sub { font-size:11.5px; color:var(--muted); padding-left:15px; }

/* Badge row */
.faq-badge-row { display:flex; gap:8px; flex-wrap:wrap; margin: 14px 0; }
.faq-badge {
    display: inline-flex; align-items: center; gap: 6px;
    background: var(--surface);
    border: 1px solid var(--red-mid);
    border-radius: 100px;
    padding: 5px 14px;
    font-size: 12px; font-weight: 600;
    color: var(--red-deep);
}
.faq-badge::before { content:''; width:5px; height:5px; border-radius:50%; background:var(--red); }

/* Fee table inside FAQ */
.faq-fee-table-wrap {
    overflow-x: auto;
    border-radius: 14px;
    border: 1px solid var(--border);
    margin: 14px 0;
    box-shadow: 0 2px 12px rgba(224,53,53,.06);
}
.faq-fee-table {
    width: 100%;
    border-collapse: collapse;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14px;
}
.faq-fee-table thead tr {
    background: linear-gradient(90deg, var(--red-deep), var(--red));
}
.faq-fee-table thead th {
    color: #fff;
    font-weight: 700;
    padding: 13px 20px;
    text-align: left;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.8px;
}
.faq-fee-table thead th:nth-child(3),
.faq-fee-table thead th:nth-child(4) { text-align: center; }
.faq-fee-table tbody tr { border-bottom: 1px solid var(--border); transition: background .15s; }
.faq-fee-table tbody tr:last-child { border-bottom: none; }
.faq-fee-table tbody tr:hover { background: var(--red-soft) !important; }
.faq-fee-table tbody td { padding: 12px 20px; color: var(--dark); font-weight: 500; }
.faq-fee-table tbody td:nth-child(3),
.faq-fee-table tbody td:nth-child(4) { text-align: center; font-weight: 600; }
.faq-fee-table tfoot tr {
    background: linear-gradient(135deg, #fff0f0, #fff5f5);
    border-top: 2px solid var(--red-mid);
}
.faq-fee-table tfoot td { padding: 16px 20px; }
.faq-fee-total {
    font-family: 'Fraunces', serif;
    font-size: 20px;
    font-weight: 700;
    color: var(--red-deep);
}

/* Rules two-col inside FAQ */
.faq-rules-grid { display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-top:14px; }
@media(max-width:640px){ .faq-rules-grid{grid-template-columns:1fr;} }
.faq-rule-box {
    background: var(--red-soft);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 22px 24px;
    transition: border-color .2s, box-shadow .2s;
}
.faq-rule-box:hover { border-color:var(--red-mid); box-shadow: 0 6px 20px rgba(224,53,53,.09); }
.faq-rule-box-head {
    display: flex; align-items: center; gap: 10px;
    margin-bottom: 16px;
}
.faq-rule-icon {
    width: 36px; height: 36px;
    background: var(--surface);
    border: 1.5px solid var(--red-mid);
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.faq-rule-icon svg {
    width: 16px; height: 16px;
    fill: none; stroke: var(--red);
    stroke-width: 1.8;
    stroke-linecap: round;
}
.faq-rule-box h5 { font-size: 14px; font-weight: 600; color: var(--dark); }

/* Attend grid in FAQ */
.faq-attend-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:10px; margin-top:14px; }
@media(max-width:640px){ .faq-attend-grid{grid-template-columns:1fr;} }
.faq-attend-item {
    background: var(--red-soft); border: 1px solid var(--border);
    border-radius: 12px; padding: 13px 15px;
    display: flex; gap: 10px; align-items: flex-start;
    font-size: 13px; color: var(--body); line-height: 1.55;
    transition: border-color .2s, box-shadow .2s;
}
.faq-attend-item:hover { border-color:var(--red-mid); box-shadow:0 4px 14px rgba(224,53,53,.08); }

/* Note box */
.faq-note {
    background: #fffbeb;
    border: 1px solid #fde68a;
    border-radius: 10px;
    padding: 14px 18px;
    font-size: 13.5px;
    color: #92400e;
    margin: 14px 0 0;
    display: flex;
    gap: 10px;
    align-items: flex-start;
    line-height: 1.6;
}
.faq-note::before { content: 'ℹ'; font-size: 15px; font-weight: 700; flex-shrink: 0; }

/* ── REVEAL ── */
.reveal { opacity:0; transform:translateY(30px); transition:opacity .65s ease, transform .65s ease; }
.reveal.on { opacity:1; transform:translateY(0); }

/* ── FOOTER ── */
.foot { background: linear-gradient(135deg, #1a0505 0%, #2d0a0a 100%); padding: 38px 0; text-align: center; }
.foot p { color:rgba(255,255,255,.45); font-size:13.5px; }
.foot strong { color:rgba(255,220,220,.85); }

@media(max-width:768px){
    .hero-stats{ flex-direction:column; }
    .hero-stat{ border-right:none; border-bottom:1px solid rgba(255,200,200,0.25); }
    .hero-stat:last-child{ border-bottom:none; }
    .pw{ padding:0 20px; }
    .faq-btn { padding: 16px 18px; }
    .faq-body { padding: 0 18px 20px; }
    .faq-icon-box { width:34px; height:34px; }
}
</style>

{{-- ===== HERO BANNER ===== --}}
<div class="hero">
    <img class="hero-bg"
         src="https://images.unsplash.com/photo-1571260899304-425eee4c7efc?w=1400&q=80"
         onerror="this.src='https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=1400&q=80'"
         alt="Girls Studying">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <div class="hero-pill"><span class="dot"></span> Admissions Open 2026–27</div>
        <div class="hero-line"></div>
        <h1>Bachelor Of Science</h1>
        <div class="hero-line"></div>
        <p>Home &rsaquo; Bachelor of Science</p>
        <div class="hero-stats">
            <div class="hero-stat"><strong>8+</strong><span>Programs</span></div>
            <div class="hero-stat"><strong>4 yr</strong><span>Duration</span></div>
            <div class="hero-stat"><strong>75%</strong><span>Min Attendance</span></div>
            <div class="hero-stat"><strong>Merit</strong><span>Based</span></div>
        </div>
    </div>
</div>

<hr class="red-divider">

{{-- ===== BS SCIENCE PROGRAMS ===== --}}
<section class="sec reveal">
    <div class="pw">
        <div class="sec-img-banner">
            <img src="https://images.unsplash.com/photo-1567168544813-cc03465b4fa8?w=1200&q=80"
                 onerror="this.src='https://images.unsplash.com/photo-1571260899304-425eee4c7efc?w=1200&q=80'"
                 alt="Science Students">
            <span class="img-label">Science Faculty</span>
        </div>
        <div class="sec-head">
            <div class="sec-label">Science Faculty</div>
            <div class="sec-title">Offered BS Science Programs</div>
            <p class="sec-sub">Six rigorous programs designed to build analytical and scientific thinking.</p>
        </div>
        @php $sci = [
            ['Physics',          'https://images.unsplash.com/photo-1636466497217-26a8cbeaf0aa?w=400&h=300&fit=crop', 'Explore the laws governing matter and energy'],
            ['Chemistry',        'https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?w=400&h=300&fit=crop', 'Study of substances, reactions and matter'],
            ['Mathematics',      'https://images.unsplash.com/photo-1635070041078-e363dbe005cb?w=400&h=300&fit=crop', 'Pure and applied mathematical theory'],
            ['Computer Science', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?w=400&h=300&fit=crop', 'Algorithms, software and computing systems'],
            ['Zoology',          'https://images.unsplash.com/photo-1474511320723-9a56873867b5?w=400&h=300&fit=crop', 'Scientific study of the animal kingdom'],
            ['Botany',           'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=400&h=300&fit=crop', 'Plant biology and ecological systems'],
        ]; @endphp
        <div class="prog-grid">
            @foreach($sci as [$name, $img, $desc])
            <div class="prog-card">
                <img src="{{ $img }}" alt="BS {{ $name }}" loading="lazy">
                <div class="prog-card-body">
                    <div class="prog-tag sci">BS Science</div>
                    <h5>BS {{ $name }}</h5>
                    <p>{{ $desc }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== BS ARTS PROGRAMS ===== --}}
<section class="sec sec-alt reveal">
    <div class="pw">
        <div class="sec-img-banner">
            <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=1200&q=80"
                 onerror="this.src='https://images.unsplash.com/photo-1571260899304-425eee4c7efc?w=1200&q=80'"
                 alt="Arts Students">
            <span class="img-label">Arts Faculty</span>
        </div>
        <div class="sec-head">
            <div class="sec-label warm">Arts Faculty</div>
            <div class="sec-title">Offered BS Arts Programs</div>
            <p class="sec-sub">Humanities programs that cultivate critical thinking, communication, and creative inquiry.</p>
        </div>
        @php $arts = [
            ['English',   'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=400&h=300&fit=crop', 'Language, literature and linguistic theory'],
            ['Education', 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=400&h=300&fit=crop', 'Pedagogy, curriculum design and learning'],
            ['Arts',      'https://images.unsplash.com/photo-1513364776144-60967b0f800f?w=400&h=300&fit=crop', 'Visual arts, aesthetics and creative expression'],
        ]; @endphp
        <div class="prog-grid-3">
            @foreach($arts as [$name, $img, $desc])
            <div class="prog-card">
                <img src="{{ $img }}" alt="BS {{ $name }}" loading="lazy">
                <div class="prog-card-body">
                    <div class="prog-tag art">BS Arts</div>
                    <h5>BS {{ $name }}</h5>
                    <p>{{ $desc }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════
     ===== MASTER FAQ SECTION (5 topics combined) =====
     ═══════════════════════════════════════════════════════ --}}

<section class="faq-section reveal">
    <div class="pw">

        {{-- Section Header --}}
        <div class="faq-sec-head">
            <div class="faq-pill"><span class="faq-pill-dot"></span> Program Information</div>
            <div class="faq-sec-title">Admission, Fees &amp; Academic Rules</div>
            <p class="faq-sec-sub">Everything you need to know — admission rules, fee structure, BA program details, duties and attendance policy.</p>
        </div>

        <div class="faq-wrap">

            {{-- ── FAQ 1: ADMISSION RULES ── --}}
            <div class="faq-item open" data-faq="0">
                <button class="faq-btn" type="button">
                    <span class="faq-btn-left">
                        <span class="faq-icon-box">
                            <svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                        </span>
                        <span class="faq-btn-text">
                            <span class="faq-btn-label">Guidelines</span>
                            <span class="faq-btn-title">Admission Rules</span>
                        </span>
                    </span>
                    <span class="faq-chevron">
                        <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body">
                    <div class="faq-body-inner">
                        <p class="faq-prose">The College Admission Committee issues advertisements for admission according to the schedule announced by the Board / University / Government. These advertisements provide complete information including available seats, eligibility criteria, fee structure, required documents, and submission deadlines.</p>

                        <div class="faq-two-col">
                            <div>
                                <div class="faq-sub-head">General Rules</div>
                                <ul class="chk-list">
                                    @foreach([
                                        'Applications must be submitted within the due date.',
                                        'Late or incomplete applications will not be accepted.',
                                        'Admission is strictly on merit basis.',
                                        'False information will result in cancellation of admission.',
                                        'College decision will be final in all matters.',
                                        'Students must follow all discipline rules after admission.',
                                    ] as $r)
                                    <li>
                                        <span class="chk"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2"/></svg></span>
                                        {{ $r }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div>
                                <div class="faq-sub-head">Required Documents</div>
                                <ul class="chk-list">
                                    @foreach([
                                        'Attested copies of educational certificates',
                                        'Character certificate from previous institution',
                                        'CNIC / B-Form copy',
                                        'Parent / guardian CNIC copy',
                                        'Passport size photographs (1.5 × 1.5 inch)',
                                    ] as $d)
                                    <li>
                                        <span class="chk"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2"/></svg></span>
                                        {{ $d }}
                                    </li>
                                    @endforeach
                                </ul>

                                <div class="faq-sub-head" style="margin-top:20px;">Obtaining Admission Form</div>
                                <p class="faq-prose">Applicants can obtain the admission form from the college office during office hours after paying the prescribed fee.</p>

                                <div class="faq-sub-head">Cancellation / Withdrawal</div>
                                <p class="faq-prose" style="margin-bottom:0;">A written application is required to cancel admission. Fee refund follows the college/government refund policy in effect.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ── FAQ 2: B.A FOUR-YEAR PROGRAM ── --}}
            <div class="faq-item" data-faq="1">
                <button class="faq-btn" type="button">
                    <span class="faq-btn-left">
                        <span class="faq-icon-box">
                            <svg viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                        </span>
                        <span class="faq-btn-text">
                            <span class="faq-btn-label">Program Details</span>
                            <span class="faq-btn-title">B.A — Four-Year Program</span>
                        </span>
                    </span>
                    <span class="faq-chevron">
                        <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body">
                    <div class="faq-body-inner">

                        <div class="faq-badge-row">
                            <span class="faq-badge">4-Year Duration</span>
                            <span class="faq-badge">University Affiliated</span>
                            <span class="faq-badge">Merit Based</span>
                        </div>

                        <div class="faq-two-col" style="margin-top:16px;">
                            <div>
                                <div class="faq-sub-head">Compulsory Subjects</div>
                                <div class="faq-hl-grid">
                                    <div class="faq-hl-card">
                                        <div class="hl-top"><span class="faq-hl-dot"></span><span class="faq-hl-title">English I</span></div>
                                        <div class="faq-hl-sub">First year compulsory</div>
                                    </div>
                                    <div class="faq-hl-card">
                                        <div class="hl-top"><span class="faq-hl-dot"></span><span class="faq-hl-title">English II</span></div>
                                        <div class="faq-hl-sub">Second year compulsory</div>
                                    </div>
                                </div>

                                <div class="faq-sub-head" style="margin-top:20px;">Optional Subjects</div>
                                <p class="faq-prose" style="margin-bottom:0;">Students must select optional subjects according to university rules and available combinations at the time of admission.</p>
                            </div>
                            <div>
                                <div class="faq-sub-head">Important Notes</div>
                                <ul class="chk-list">
                                    @foreach([
                                        'Medium of examination depends on selected subjects',
                                        'Minimum 20 marks required to pass each subject',
                                        'Practical marks included where applicable',
                                        'Subject combinations subject to university approval',
                                        'Students must sit all compulsory papers',
                                    ] as $n)
                                    <li>
                                        <span class="chk"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2"/></svg></span>
                                        {{ $n }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ── FAQ 3: FEE DETAILS ── --}}
            <div class="faq-item" data-faq="2">
                <button class="faq-btn" type="button">
                    <span class="faq-btn-left">
                        <span class="faq-icon-box">
                            <svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                        </span>
                        <span class="faq-btn-text">
                            <span class="faq-btn-label">Finance</span>
                            <span class="faq-btn-title">Fee Details — All Programs</span>
                        </span>
                    </span>
                    <span class="faq-chevron">
                        <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body">
                    <div class="faq-body-inner">

                        <div class="faq-badge-row">
                            <span class="faq-badge">Session 2026–27</span>
                            <span class="faq-badge">Government College</span>
                            <span class="faq-badge">Official Fee Chart</span>
                        </div>

                        @php
                        $fees = [
                            ['Admission Fee',        65,   225],
                            ['Registration Fee',     80,   '—'],
                            ['Tuition Fee',          600,  720],
                            ['Sports Fee',           60,   300],
                            ['Library Fee',          180,  180],
                            ['Examination Fee',      300,  '—'],
                            ['Laboratory Fee',       60,   60],
                            ['Miscellaneous',        100,  100],
                            ['Identity Card',        50,   100],
                            ['Medical Fee',          50,   100],
                            ['Development Fund',     120,  120],
                            ['Cultural Activities',  180,  400],
                            ['Security Fee',         50,   60],
                            ['Electricity Charges',  500,  300],
                            ['Student Fund',         '—',  200],
                            ['Magazine Fee',         '—',  100],
                            ['Other Charges',        240,  '—'],
                        ];
                        @endphp

                        <div class="faq-fee-table-wrap">
                            <table class="faq-fee-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fee Item</th>
                                        <th>B.A Program</th>
                                        <th>B.A / B.Sc Program</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($fees as $i => $fee)
                                    <tr style="background: {{ $i % 2 == 0 ? '#ffffff' : '#fff8f8' }};"
                                        onmouseover="this.style.background=''"
                                        onmouseout="this.style.background='{{ $i % 2 == 0 ? '#ffffff' : '#fff8f8' }}'">
                                        <td style="font-size:12px; font-weight:700; color:var(--red);">{{ $i + 1 }}</td>
                                        <td>{{ $fee[0] }}</td>
                                        <td style="color: {{ $fee[1] === '—' ? 'var(--muted)' : 'var(--red-deep)' }};">
                                            {{ $fee[1] === '—' ? '—' : 'Rs. '.number_format($fee[1]) }}
                                        </td>
                                        <td style="color: {{ $fee[2] === '—' ? 'var(--muted)' : 'var(--red-deep)' }};">
                                            {{ $fee[2] === '—' ? '—' : 'Rs. '.number_format($fee[2]) }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" style="padding: 16px 20px;">
                                            <div style="font-size:10.5px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; color:var(--red);">Total Amount</div>
                                            <div style="font-size:11px; color:var(--muted); margin-top:2px;">Session 2026–27</div>
                                        </td>
                                        <td style="text-align:center;">
                                            <span class="faq-fee-total">
                                                Rs. {{ number_format(array_sum(array_map(fn($f) => is_numeric($f[1]) ? $f[1] : 0, $fees))) }}
                                            </span>
                                        </td>
                                        <td style="text-align:center;">
                                            <span class="faq-fee-total">
                                                Rs. {{ number_format(array_sum(array_map(fn($f) => is_numeric($f[2]) ? $f[2] : 0, $fees))) }}
                                            </span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="faq-note">
                            Fee structure is subject to revision by the government. Confirm final amounts at the college office before submitting payment.
                        </div>

                    </div>
                </div>
            </div>

            {{-- ── FAQ 4: DUTIES & FEE RULES ── --}}
            <div class="faq-item" data-faq="3">
                <button class="faq-btn" type="button">
                    <span class="faq-btn-left">
                        <span class="faq-icon-box">
                            <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </span>
                        <span class="faq-btn-text">
                            <span class="faq-btn-label">Regulations</span>
                            <span class="faq-btn-title">Duties &amp; Fee Rules</span>
                        </span>
                    </span>
                    <span class="faq-chevron">
                        <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body">
                    <div class="faq-body-inner">
                        <div class="faq-rules-grid">
                            <div class="faq-rule-box">
                                <div class="faq-rule-box-head">
                                    <span class="faq-rule-icon">
                                        <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                                    </span>
                                    <h5>Duties &amp; Responsibilities</h5>
                                </div>
                                <ul class="chk-list">
                                    @foreach([
                                        'Follow college rules and maintain discipline',
                                        'Maintain minimum 75% attendance',
                                        'Respect teachers and all college staff',
                                        'Participate in academic activities',
                                        'Property damage results in fines',
                                        'Identity card must be carried at all times',
                                    ] as $d)
                                    <li>
                                        <span class="chk"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2"/></svg></span>
                                        {{ $d }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="faq-rule-box">
                                <div class="faq-rule-box-head">
                                    <span class="faq-rule-icon">
                                        <svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                                    </span>
                                    <h5>Rules Regarding Fees &amp; Fines</h5>
                                </div>
                                <ul class="chk-list">
                                    @foreach([
                                        'All fees must be deposited on time',
                                        'Late fee will be charged accordingly',
                                        'Non-payment may remove name from rolls',
                                        'Re-admission may require extra charges',
                                        'Security fee refundable as per policy',
                                    ] as $r)
                                    <li>
                                        <span class="chk"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2"/></svg></span>
                                        {{ $r }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ── FAQ 5: ATTENDANCE & LEAVE RULES ── --}}
            <div class="faq-item" data-faq="4">
                <button class="faq-btn" type="button">
                    <span class="faq-btn-left">
                        <span class="faq-icon-box">
                            <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        </span>
                        <span class="faq-btn-text">
                            <span class="faq-btn-label">Attendance Policy</span>
                            <span class="faq-btn-title">Attendance &amp; Leave Rules</span>
                        </span>
                    </span>
                    <span class="faq-chevron">
                        <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body">
                    <div class="faq-body-inner">

                        <div class="faq-badge-row">
                            <span class="faq-badge">75% Minimum Required</span>
                            <span class="faq-badge">Written Leave Needed</span>
                            <span class="faq-badge">Rs. 10 / Day Fine</span>
                        </div>

                        <div class="faq-attend-grid">
                            @foreach([
                                'Minimum 75% attendance required',
                                'Below 70% may cancel admission',
                                'Leave must be written & approved',
                                'Rs. 10 per day fine for absence',
                                '6 consecutive absents = struck off',
                                'Exam absence = penalty applies',
                                'Retest allowed as per policy',
                                'Property damage fine up to Rs. 1000',
                                'Discipline violation = strict action',
                            ] as $a)
                            <div class="faq-attend-item">
                                <span class="chk" style="flex-shrink:0;margin-top:1px;">
                                    <svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2"/></svg>
                                </span>
                                <span>{{ $a }}</span>
                            </div>
                            @endforeach
                        </div>

                        <div class="faq-note">
                            Students with attendance below 75% will not be allowed to appear in university examinations. Medical leave must be supported by a doctor's certificate.
                        </div>

                    </div>
                </div>
            </div>

        </div>{{-- /.faq-wrap --}}
    </div>
</section>

{{-- ===== FOOTER ===== --}}
<footer class="foot">
    <div class="pw">
        <p><strong>Government Graduate College for Women</strong> — Admissions Portal &nbsp;·&nbsp; For queries, visit the college office during working hours.</p>
    </div>
</footer>

<script>
// Scroll reveal
const obs = new IntersectionObserver(e => e.forEach(x => {
    if(x.isIntersecting){ x.target.classList.add('on'); obs.unobserve(x.target); }
}), { threshold: .07 });
document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

// FAQ Accordion
document.querySelectorAll('.faq-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const item = btn.closest('.faq-item');
        const isOpen = item.classList.contains('open');
        // Close all
        document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
        // Toggle clicked
        if (!isOpen) item.classList.add('open');
    });
});
</script>

@endsection