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

/* HERO */
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

/* SEC IMG BANNER */
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

/* SECTIONS */
.sec { padding: 72px 0; }
.sec-alt { background: #fff0f0; border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }

.sec-head { text-align: center; margin-bottom: 44px; }
.sec-label { display:inline-block; font-size:11px; font-weight:700; letter-spacing:2px; text-transform:uppercase; color:var(--red); margin-bottom:10px; }
.sec-label.warm { color: var(--warm); }
.sec-title { font-family:'Fraunces',serif; font-size:clamp(24px,3.5vw,36px); font-weight:600; color:var(--dark); line-height:1.2; margin-bottom:10px; }
.sec-sub { font-size:15px; color:var(--muted); font-weight:300; max-width:480px; margin:0 auto; }

/* PROG CARDS */
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

/* INFO CARD */
.info-card {
    background:var(--surface); border:1px solid var(--border);
    border-radius:20px; padding:44px 48px;
    box-shadow: 0 2px 16px rgba(224,53,53,.04);
}
.info-card p { font-size:15px; line-height:1.88; color:var(--body); margin-bottom:20px; }
.info-card h4 {
    font-family:'Fraunces',serif; font-size:19px; font-weight:600;
    color:var(--dark); margin:30px 0 14px;
    padding-bottom:12px; border-bottom:1px solid var(--border);
}
.info-card h4:first-of-type { margin-top:0; }

.two-col { display:grid; grid-template-columns:1fr 1fr; gap:32px; }
@media(max-width:680px){ .two-col{grid-template-columns:1fr;} }

/* CHECKLIST */
.chk-list { list-style:none; display:flex; flex-direction:column; gap:10px; }
.chk-list li { display:flex; align-items:flex-start; gap:11px; font-size:14.5px; color:var(--body); line-height:1.6; }
.chk {
    width:20px; height:20px; border-radius:6px;
    background:var(--red-soft); border:1.5px solid var(--red-mid);
    display:flex; align-items:center; justify-content:center;
    flex-shrink:0; margin-top:1px;
}
.chk svg { width:10px; height:10px; fill:none; stroke:var(--red); stroke-width:2.5; stroke-linecap:round; stroke-linejoin:round; }

/* RULES GRID */
.rules-grid { display:grid; grid-template-columns:1fr 1fr; gap:20px; }
@media(max-width:680px){ .rules-grid{grid-template-columns:1fr;} }
.rule-card {
    background:var(--surface); border:1px solid var(--border);
    border-radius:20px; padding:28px 30px;
    box-shadow:0 2px 12px rgba(224,53,53,.04);
}
.rule-icon {
    width:42px; height:42px; background:var(--red-soft); border-radius:12px;
    display:flex; align-items:center; justify-content:center; margin-bottom:16px;
    border: 1px solid var(--red-mid);
}
.rule-icon svg { width:20px; height:20px; fill:none; stroke:var(--red); stroke-width:1.8; stroke-linecap:round; }
.rule-card h4 { font-size:15.5px; font-weight:600; color:var(--dark); margin-bottom:16px; }

/* ATTEND GRID */
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

/* DIVIDER */
.red-divider {
    height: 3px;
    background: linear-gradient(90deg, transparent, var(--red-mid), var(--red), var(--red-mid), transparent);
    border: none; margin: 0; opacity: .35;
}

/* FOOTER */
.foot { background: linear-gradient(135deg, #1a0505 0%, #2d0a0a 100%); padding: 38px 0; text-align: center; }
.foot p { color:rgba(255,255,255,.45); font-size:13.5px; }
.foot strong { color:rgba(255,220,220,.85); }

/* REVEAL */
.reveal { opacity:0; transform:translateY(30px); transition:opacity .65s ease, transform .65s ease; }
.reveal.on { opacity:1; transform:translateY(0); }

@media(max-width:768px){
    .info-card{ padding:28px 22px; }
    .hero-stats{ flex-direction:column; }
    .hero-stat{ border-right:none; border-bottom:1px solid rgba(255,200,200,0.25); }
    .hero-stat:last-child{ border-bottom:none; }
    .pw{ padding:0 20px; }
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
        <p>Home &rsaquo; bachelor of science</p>
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

{{-- ===== ADMISSION RULES ===== --}}
<section class="sec reveal">
    <div class="pw">
        <div class="sec-img-banner">
            <img src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?w=1200&q=80"
                 onerror="this.src='https://images.unsplash.com/photo-1571260899304-425eee4c7efc?w=1200&q=80'"
                 alt="Admission">
            <span class="img-label">Admission Guidelines</span>
        </div>
        <div class="sec-head">
            <div class="sec-label">Guidelines</div>
            <div class="sec-title">Admission Rules</div>
            <p class="sec-sub">Please read all rules carefully before submitting your application.</p>
        </div>
        <div class="info-card">
            <p>The College Admission Committee will issue advertisements for admission to various classes according to the schedule announced by the Board / University / Government. These advertisements provide complete information including seats, eligibility criteria, fee structure, required documents, and last date of submission.</p>
            <div class="two-col">
                <div>
                    <h4>General Rules</h4>
                    <ul class="chk-list">
                        @foreach(['Applications must be submitted within the due date.','Late or incomplete applications will not be accepted.','Admission is strictly on merit basis.','False information will result in cancellation of admission.','College decision will be final.','Students must follow all discipline rules after admission.'] as $r)
                        <li><span class="chk"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2"/></svg></span>{{ $r }}</li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h4>Required Documents</h4>
                    <ul class="chk-list">
                        @foreach(['Attested copies of educational certificates','Character certificate','CNIC / B-Form copy','Parent / guardian CNIC copy','Passport size photographs (1.5 × 1.5 inch)'] as $d)
                        <li><span class="chk"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2"/></svg></span>{{ $d }}</li>
                        @endforeach
                    </ul>
                    <h4>Obtaining Admission Form</h4>
                    <p style="font-size:14.5px;">Applicants can obtain admission form from college office during office hours after paying prescribed fee.</p>
                </div>
            </div>
            <h4>Admission Cancellation / Withdrawal</h4>
            <p>If a student wishes to cancel admission, they must submit written application. Refund will follow college/government policy.</p>
        </div>
    </div>
</section>

{{-- ===== B.A PROGRAM ===== --}}
<section class="sec sec-alt reveal">
    <div class="pw">
        <div class="sec-head">
            <div class="sec-label">Program Details</div>
            <div class="sec-title">B.A (Four-Year Program)</div>
        </div>
        <div class="info-card">
            <div class="two-col">
                <div>
                    <h4>Compulsory Subjects</h4>
                    <p>English – English I &amp; English II</p>
                    <h4>Optional Subjects</h4>
                    <p>Students must select subjects according to university rules.</p>
                </div>
                <div>
                    <h4>Important Notes</h4>
                    <ul class="chk-list">
                        <li><span class="chk"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2"/></svg></span>Medium of examination depends on subjects</li>
                        <li><span class="chk"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2"/></svg></span>Minimum 20 marks required to pass</li>
                        <li><span class="chk"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2"/></svg></span>Practical marks included where applicable</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== FEE TABLE ===== --}}
<section class="sec reveal">
    <div class="pw">
        <div class="sec-head">
            <div class="sec-label">Finance</div>
            <div class="sec-title">Fee Details — All Programs</div>
            <p class="sec-sub">Session 2026–27 — Government College</p>
        </div>

        <div style="background:#fff; border:1px solid var(--border); border-radius:20px; overflow:hidden; box-shadow:0 4px 24px rgba(224,53,53,.08);">

            <div style="background:linear-gradient(135deg,#b91c1c,#e03535); padding:24px 32px; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px;">
                <div>
                    <h3 style="font-family:'Fraunces',serif; font-size:20px; font-weight:600; color:#fff; margin:0;">Program Fee Structure</h3>
                    <p style="font-size:12px; color:rgba(255,255,255,.7); margin:4px 0 0;">Session 2026–27 &nbsp;·&nbsp; Government College</p>
                </div>
                <span style="background:rgba(255,255,255,.18); border:1px solid rgba(255,255,255,.3); border-radius:100px; padding:6px 16px; font-size:12px; font-weight:600; color:#fff;">
                    📋 Official Fee Chart
                </span>
            </div>

            <div style="overflow-x:auto;">
                <table style="width:100%; border-collapse:collapse; font-family:'Plus Jakarta Sans',sans-serif;">
                    <thead>
                        <tr style="background:#fff0f0; border-bottom:2px solid var(--red-mid);">
                            <th style="padding:14px 24px; text-align:left; font-size:12px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; color:var(--red);">#</th>
                            <th style="padding:14px 24px; text-align:left; font-size:12px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; color:var(--red);">Fee Item</th>
                            <th style="padding:14px 24px; text-align:center; font-size:12px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; color:var(--red);">B.A Program</th>
                            <th style="padding:14px 24px; text-align:center; font-size:12px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; color:var(--red);">B.A / B.Sc Program</th>
                        </tr>
                    </thead>
                    <tbody>
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
                        @foreach($fees as $i => $fee)
                        <tr style="border-bottom:1px solid var(--border); background:{{ $i % 2 == 0 ? '#fff' : '#fff8f8' }};"
                            onmouseover="this.style.background='#fff0f0'"
                            onmouseout="this.style.background='{{ $i % 2 == 0 ? '#fff' : '#fff8f8' }}'">
                            <td style="padding:13px 24px; font-size:12px; font-weight:700; color:var(--red);">{{ $i + 1 }}</td>
                            <td style="padding:13px 24px; font-size:14px; color:var(--dark); font-weight:500;">{{ $fee[0] }}</td>
                            <td style="padding:13px 24px; text-align:center; font-size:14px; font-weight:600; color:{{ $fee[1] === '—' ? 'var(--muted)' : 'var(--red-deep)' }};">
                                {{ $fee[1] === '—' ? '—' : 'Rs. '.number_format($fee[1]) }}
                            </td>
                            <td style="padding:13px 24px; text-align:center; font-size:14px; font-weight:600; color:{{ $fee[2] === '—' ? 'var(--muted)' : 'var(--red-deep)' }};">
                                {{ $fee[2] === '—' ? '—' : 'Rs. '.number_format($fee[2]) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr style="background:linear-gradient(135deg,#fff0f0,#fff5f5); border-top:2px solid var(--red-mid);">
                            <td colspan="2" style="padding:18px 24px;">
                                <div style="font-size:11px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; color:var(--red);">Total Amount</div>
                                <div style="font-size:11px; color:var(--muted); margin-top:2px;">Session 2026–27</div>
                            </td>
                            <td style="padding:18px 24px; text-align:center;">
                                <span style="font-family:'Fraunces',serif; font-size:22px; font-weight:700; color:var(--red-deep);">
                                    Rs. {{ number_format(array_sum(array_map(fn($f) => is_numeric($f[1]) ? $f[1] : 0, $fees))) }}
                                </span>
                            </td>
                            <td style="padding:18px 24px; text-align:center;">
                                <span style="font-family:'Fraunces',serif; font-size:22px; font-weight:700; color:var(--red-deep);">
                                    Rs. {{ number_format(array_sum(array_map(fn($f) => is_numeric($f[2]) ? $f[2] : 0, $fees))) }}
                                </span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>

{{-- ===== DUTIES & FEE RULES ===== --}}
<section class="sec sec-alt reveal">
    <div class="pw">
        <div class="sec-head">
            <div class="sec-label">Regulations</div>
            <div class="sec-title">Duties &amp; Fee Rules</div>
        </div>
        <div class="rules-grid">
            <div class="rule-card">
                <div class="rule-icon">
                    <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <h4>Duties &amp; Responsibilities</h4>
                <ul class="chk-list">
                    @foreach(['Follow college rules and discipline','Maintain minimum 75% attendance','Respect teachers and staff','Participate in academic activities','Property damage results in fines','Identity card must be carried at all times'] as $d)
                    <li><span class="chk"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2"/></svg></span>{{ $d }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="rule-card">
                <div class="rule-icon">
                    <svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                </div>
                <h4>Rules Regarding Fees &amp; Fines</h4>
                <ul class="chk-list">
                    @foreach(['All fees must be deposited on time','Late fee will be charged accordingly','Non-payment may remove name from rolls','Re-admission may require extra charges','Security fee refundable as per policy'] as $r)
                    <li><span class="chk"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2"/></svg></span>{{ $r }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- ===== ATTENDANCE ===== --}}
<section class="sec reveal">
    <div class="pw">
        <div class="sec-img-banner">
            <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?w=1200&q=80"
                 onerror="this.src='https://images.unsplash.com/photo-1571260899304-425eee4c7efc?w=1200&q=80'"
                 alt="Attendance">
            <span class="img-label">Attendance Policy</span>
        </div>
        <div class="sec-head">
            <div class="sec-label">Attendance Policy</div>
            <div class="sec-title">Attendance &amp; Leave Rules</div>
        </div>
        <div class="info-card">
            <div class="attend-grid">
                @foreach(['Minimum 75% attendance required','Below 70% may cancel admission','Leave must be written & approved','Rs. 10 per day fine for absence','6 consecutive absents = struck off','Exam absence = penalty applies','Retest allowed as per policy','Property damage fine up to Rs. 1000','Discipline violation = strict action'] as $a)
                <div class="attend-item">
                    <span class="chk" style="flex-shrink:0;margin-top:1px;"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2"/></svg></span>
                    <span>{{ $a }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ===== FOOTER ===== --}}
<footer class="foot">
    <div class="pw">
        <p><strong>Government Graduate College for Women</strong> — Admissions Portal &nbsp;·&nbsp; For queries, visit the college office during working hours.</p>
    </div>
</footer>

<script>
const obs = new IntersectionObserver(e => e.forEach(x => {
    if(x.isIntersecting){ x.target.classList.add('on'); obs.unobserve(x.target); }
}), {threshold:.07});
document.querySelectorAll('.reveal').forEach(el => obs.observe(el));
</script>

@endsection