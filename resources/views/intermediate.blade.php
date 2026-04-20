@extends('includes.main')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body {
    background: #f0f4f8;
    font-family: 'Plus Jakarta Sans', sans-serif;
    color: #1e293b;
}

/* ─── TOKENS ─── */
:root {
    --red: #e03535;
    --red-light: #fff1f1;
    --red-soft: #fde8e8;
    --red-mid: #f87171;
    --blue-light: #eef4ff;
    --blue-mid: #3b82f6;
    --surface: #ffffff;
    --surface2: #f8fafc;
    --border: #e2e8f0;
    --text: #1e293b;
    --muted: #64748b;
    --radius: 20px;
    --radius-sm: 12px;
}

/* ─── HERO ─── */
.hero {
    background: linear-gradient(135deg, #fff5f5 0%, #fff 50%, #eff6ff 100%);
    border-bottom: 1px solid var(--border);
    padding: 80px 0 60px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.hero::before {
    content: '';
    position: absolute;
    width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(224,53,53,0.06) 0%, transparent 70%);
    top: -100px; left: -100px;
    border-radius: 50%;
}
.hero::after {
    content: '';
    position: absolute;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(59,130,246,0.06) 0%, transparent 70%);
    bottom: -80px; right: -80px;
    border-radius: 50%;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--red-light);
    color: var(--red);
    font-size: 13px;
    font-weight: 600;
    padding: 6px 16px;
    border-radius: 50px;
    border: 1px solid #fecaca;
    margin-bottom: 24px;
    text-transform: uppercase;
    letter-spacing: 0.06em;
}

.hero h1 {
    font-size: clamp(32px, 5vw, 52px);
    font-weight: 800;
    color: var(--text);
    line-height: 1.15;
    margin-bottom: 18px;
}

.hero h1 span {
    color: var(--red);
}

.hero p {
    font-size: 17px;
    color: var(--muted);
    max-width: 560px;
    margin: 0 auto 36px;
    line-height: 1.7;
}

.hero-stats {
    display: inline-flex;
    gap: 40px;
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 18px 36px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
}

.stat-item { text-align: center; }
.stat-num {
    font-size: 26px;
    font-weight: 800;
    color: var(--red);
    display: block;
}
.stat-label {
    font-size: 12px;
    color: var(--muted);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

/* ─── SECTION ─── */
.section {
    padding: 80px 0;
}

.section-tag {
    display: inline-block;
    background: var(--red-light);
    color: var(--red);
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    padding: 5px 14px;
    border-radius: 50px;
    border: 1px solid #fecaca;
    margin-bottom: 14px;
}

.section-title {
    font-size: clamp(24px, 3vw, 34px);
    font-weight: 800;
    color: var(--text);
    margin-bottom: 8px;
    line-height: 1.2;
}

.section-sub {
    font-size: 16px;
    color: var(--muted);
    margin-bottom: 36px;
    line-height: 1.6;
}

/* ─── CARDS ─── */
.card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 36px;
    transition: box-shadow 0.3s ease, transform 0.3s ease;
}

.card:hover {
    box-shadow: 0 16px 48px rgba(0,0,0,0.08);
    transform: translateY(-4px);
}

/* ─── PROGRAMS ─── */
.programs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    gap: 16px;
    margin-top: 28px;
}

.prog-card {
    background: var(--surface2);
    border: 1.5px solid var(--border);
    border-radius: var(--radius-sm);
    padding: 20px 16px;
    text-align: center;
    transition: all 0.25s ease;
    cursor: default;
}

.prog-card:hover {
    border-color: var(--red-mid);
    background: var(--red-light);
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(224,53,53,0.1);
}

.prog-icon {
    width: 44px; height: 44px;
    background: var(--red-light);
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 12px;
    font-size: 20px;
}

.prog-card h4 {
    font-size: 14px;
    font-weight: 700;
    color: var(--text);
}

.prog-card p {
    font-size: 12px;
    color: var(--muted);
    margin-top: 4px;
}

/* ─── IMAGE SECTION ─── */
.img-wrap {
    border-radius: var(--radius);
    overflow: hidden;
    position: relative;
}

.img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    min-height: 300px;
}

.img-overlay {
    position: absolute;
    bottom: 20px; left: 20px;
    background: rgba(255,255,255,0.95);
    border-radius: 12px;
    padding: 14px 20px;
    border: 1px solid var(--border);
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.img-overlay strong { display: block; font-size: 15px; font-weight: 700; }
.img-overlay span { font-size: 12px; color: var(--muted); }

/* ─── DOCS ─── */
.doc-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-top: 8px;
}

.doc-item {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px 18px;
    background: var(--surface2);
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    transition: all 0.2s;
}

.doc-item:hover {
    border-color: var(--red-mid);
    background: var(--red-light);
}

.doc-dot {
    width: 10px; height: 10px;
    background: var(--red);
    border-radius: 50%;
    flex-shrink: 0;
}

.doc-item span {
    font-size: 15px;
    font-weight: 500;
    color: var(--text);
}

/* ─── ADMISSION RULES ─── */
.rules-section {
    background: var(--surface2);
    border-top: 1px solid var(--border);
    border-bottom: 1px solid var(--border);
}

.rule-block { margin-bottom: 32px; }
.rule-block:last-child { margin-bottom: 0; }

.rule-heading {
    font-size: 17px;
    font-weight: 700;
    color: var(--text);
    margin-bottom: 14px;
    padding-left: 14px;
    border-left: 4px solid var(--red);
}

.rule-text {
    font-size: 15px;
    color: var(--muted);
    line-height: 1.8;
    margin-bottom: 14px;
}

.rule-list {
    list-style: none;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.rule-list li {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: 15px;
    color: #374151;
    line-height: 1.6;
}

.rule-list li::before {
    content: '';
    width: 7px; height: 7px;
    background: var(--red);
    border-radius: 50%;
    margin-top: 8px;
    flex-shrink: 0;
}

/* ─── TABLES ─── */
.table-wrap {
    overflow-x: auto;
    border-radius: 14px;
    border: 1px solid var(--border);
    margin: 16px 0 28px;
}

.styled-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
}

.styled-table thead tr {
    background: linear-gradient(90deg, var(--red), #ff6b6b);
}

.styled-table thead th {
    color: #fff;
    font-weight: 700;
    padding: 14px 18px;
    text-align: left;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.styled-table thead th:first-child { border-radius: 14px 0 0 0; }
.styled-table thead th:last-child { border-radius: 0 14px 0 0; }

.styled-table tbody tr {
    border-bottom: 1px solid var(--border);
    transition: background 0.15s;
}

.styled-table tbody tr:last-child { border-bottom: none; }

.styled-table tbody tr:hover { background: var(--red-light); }

.styled-table tbody td {
    padding: 13px 18px;
    color: var(--text);
    font-weight: 500;
}

.styled-table tbody tr:nth-child(even) td {
    background: #fafafa;
}

.yes-badge {
    display: inline-block;
    background: #dcfce7;
    color: #15803d;
    font-size: 12px;
    font-weight: 700;
    padding: 3px 12px;
    border-radius: 50px;
}

.no-badge {
    display: inline-block;
    background: #f1f5f9;
    color: #94a3b8;
    font-size: 12px;
    font-weight: 600;
    padding: 3px 12px;
    border-radius: 50px;
}

/* ─── NOTE BOX ─── */
.note-box {
    background: var(--blue-light);
    border: 1px solid #bfdbfe;
    border-radius: 12px;
    padding: 16px 20px;
    font-size: 14px;
    color: #1e40af;
    margin: 8px 0 24px;
    display: flex;
    gap: 10px;
    align-items: flex-start;
}

.note-box::before {
    content: 'ℹ';
    font-size: 16px;
    font-weight: 700;
    flex-shrink: 0;
}

/* ─── SUBJECTS SECTION ─── */
.shift-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--red-light);
    color: var(--red);
    font-size: 12px;
    font-weight: 700;
    padding: 6px 14px;
    border-radius: 50px;
    border: 1px solid #fecaca;
    margin-bottom: 16px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

/* ─── IMPORTANT NOTES ─── */
.notes-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 14px;
    margin-top: 16px;
}

.note-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 16px 18px;
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.note-num {
    width: 28px; height: 28px;
    background: var(--red);
    color: #fff;
    font-size: 13px;
    font-weight: 700;
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}

.note-card p {
    font-size: 14px;
    color: var(--muted);
    line-height: 1.6;
}

/* ─── APPLY BTN ─── */
.apply-strip {
    background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
    padding: 60px 0;
    text-align: center;
}

.apply-strip h3 {
    font-size: 28px;
    font-weight: 800;
    color: #fff;
    margin-bottom: 8px;
}

.apply-strip p {
    font-size: 16px;
    color: #94a3b8;
    margin-bottom: 28px;
}

.btn-apply {
    display: inline-block;
    background: linear-gradient(90deg, var(--red), #ff6b6b);
    color: #fff;
    font-size: 16px;
    font-weight: 700;
    padding: 16px 40px;
    border-radius: 50px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    box-shadow: 0 8px 24px rgba(224,53,53,0.3);
    transition: all 0.25s ease;
}

.btn-apply:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(224,53,53,0.4);
    color: #fff;
    text-decoration: none;
}

/* ─── FADE ANIMATION ─── */
.fade-section {
    opacity: 0;
    transform: translateY(50px);
    transition: opacity 0.7s ease, transform 0.7s ease;
}
.fade-section.show {
    opacity: 1;
    transform: translateY(0);
}

@media (max-width: 768px) {
    .hero-stats { flex-direction: column; gap: 20px; padding: 20px; }
    .card { padding: 24px; }
}
</style>

<!-- ══ HERO ══ -->
<div class="hero">
    <div class="container">
        <div class="hero-badge">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
            Admissions Open
        </div>
        <h1>Intermediate <span>Admissions</span><br>2026–27</h1>
        <p>Build your future with our modern Intermediate programs — designed for academic excellence and professional success.</p>
        <div class="hero-stats">
            <div class="stat-item">
                <span class="stat-num">6+</span>
                <span class="stat-label">Programs</span>
            </div>
            <div class="stat-item">
                <span class="stat-num">2</span>
                <span class="stat-label">Shifts</span>
            </div>
            <div class="stat-item">
                <span class="stat-num">100%</span>
                <span class="stat-label">Merit Based</span>
            </div>
        </div>
    </div>
</div>

<!-- ══ PROGRAMS ══ -->
<div class="section fade-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <span class="section-tag">What We Offer</span>
                <h2 class="section-title">Programs Offered</h2>
                <p class="section-sub">Choose from a wide range of intermediate programs tailored to your career goals.</p>
                <div class="programs-grid">
                    <div class="prog-card">
                        <div class="prog-icon">🔬</div>
                        <h4>FSc Pre-Medical</h4>
                        <p>Biology & Sciences</p>
                    </div>
                    <div class="prog-card">
                        <div class="prog-icon">⚙️</div>
                        <h4>FSc Pre-Engineering</h4>
                        <p>Physics & Maths</p>
                    </div>
                    <div class="prog-card">
                        <div class="prog-icon">💻</div>
                        <h4>ICS</h4>
                        <p>Computer Science</p>
                    </div>
                    <div class="prog-card">
                        <div class="prog-icon">📚</div>
                        <h4>FA</h4>
                        <p>Faculty of Arts</p>
                    </div>
                    <div class="prog-card">
                        <div class="prog-icon">🌐</div>
                        <h4>FA IT</h4>
                        <p>Arts with IT</p>
                    </div>
                    <div class="prog-card">
                        <div class="prog-icon">📊</div>
                        <h4>I.COM</h4>
                        <p>Commerce</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div style="border-radius:var(--radius);overflow:hidden;background:linear-gradient(135deg,#fff8f0 0%,#fff 50%,#f0f9ff 100%);border:1px solid var(--border);padding:36px;min-height:420px;display:flex;align-items:center;justify-content:center;">
                    <svg width="100%" viewBox="0 0 460 400" xmlns="http://www.w3.org/2000/svg">

                        <!-- soft background blobs -->
                        <circle cx="50"  cy="80"  r="90" fill="#fde8e8" opacity="0.35"/>
                        <circle cx="420" cy="340" r="100" fill="#dbeafe" opacity="0.3"/>
                        <circle cx="400" cy="60"  r="60"  fill="#fef9c3" opacity="0.4"/>

                        <!-- ── DESK SURFACE ── -->
                        <rect x="30" y="300" width="400" height="14" rx="7" fill="#e2e8f0"/>
                        <rect x="50" y="310" width="360" height="6"  rx="3" fill="#cbd5e1"/>

                        <!-- ── PENCIL (left, leaning) ── -->
                        <g transform="rotate(-18,90,280)">
                            <rect x="76" y="190" width="14" height="110" rx="4" fill="#fbbf24"/>
                            <polygon points="76,300 90,300 83,322" fill="#f87171"/>
                            <polygon points="79,315 87,315 83,322" fill="#fcd34d"/>
                            <rect x="76" y="190" width="14" height="12" rx="2" fill="#9ca3af"/>
                            <rect x="77" y="202" width="12" height="5"  rx="1" fill="#d1fae5"/>
                        </g>

                        <!-- ── BIG OPEN BOOK (center) ── -->
                        <!-- left page -->
                        <path d="M130 200 Q160 195 220 200 L220 295 Q160 290 130 295 Z" fill="white" stroke="#e2e8f0" stroke-width="1.5"/>
                        <!-- left page lines -->
                        <line x1="148" y1="218" x2="210" y2="218" stroke="#e2e8f0" stroke-width="1.2"/>
                        <line x1="148" y1="230" x2="210" y2="230" stroke="#e2e8f0" stroke-width="1.2"/>
                        <line x1="148" y1="242" x2="210" y2="242" stroke="#e2e8f0" stroke-width="1.2"/>
                        <line x1="148" y1="254" x2="198" y2="254" stroke="#e2e8f0" stroke-width="1.2"/>
                        <line x1="148" y1="266" x2="210" y2="266" stroke="#e2e8f0" stroke-width="1.2"/>
                        <line x1="148" y1="278" x2="190" y2="278" stroke="#e2e8f0" stroke-width="1.2"/>
                        <!-- red bookmark left -->
                        <rect x="192" y="195" width="10" height="28" rx="2" fill="#e03535"/>
                        <polygon points="192,223 202,223 197,231" fill="#e03535"/>

                        <!-- right page -->
                        <path d="M220 200 Q280 195 310 200 L310 295 Q280 290 220 295 Z" fill="#fffbeb" stroke="#e2e8f0" stroke-width="1.5"/>
                        <!-- right page lines -->
                        <line x1="232" y1="218" x2="298" y2="218" stroke="#fde68a" stroke-width="1.2"/>
                        <line x1="232" y1="230" x2="298" y2="230" stroke="#fde68a" stroke-width="1.2"/>
                        <line x1="232" y1="242" x2="275" y2="242" stroke="#fde68a" stroke-width="1.2"/>
                        <line x1="232" y1="254" x2="298" y2="254" stroke="#fde68a" stroke-width="1.2"/>
                        <line x1="232" y1="266" x2="285" y2="266" stroke="#fde68a" stroke-width="1.2"/>
                        <line x1="232" y1="278" x2="298" y2="278" stroke="#fde68a" stroke-width="1.2"/>

                        <!-- book spine -->
                        <line x1="220" y1="198" x2="220" y2="296" stroke="#cbd5e1" stroke-width="2"/>

                        <!-- book shadow -->
                        <ellipse cx="220" cy="302" rx="95" ry="6" fill="#94a3b8" opacity="0.18"/>

                        <!-- ── STACKED BOOKS (right side) ── -->
                        <!-- book 3 bottom -->
                        <rect x="318" y="262" width="100" height="22" rx="5" fill="#3b82f6"/>
                        <rect x="318" y="262" width="8"   height="22" rx="3" fill="#1d4ed8"/>
                        <rect x="330" y="268" width="55" height="4"  rx="2" fill="white" opacity="0.4"/>
                        <rect x="330" y="275" width="35" height="3"  rx="2" fill="white" opacity="0.25"/>
                        <!-- book 2 middle -->
                        <rect x="323" y="240" width="95" height="22" rx="5" fill="#e03535"/>
                        <rect x="323" y="240" width="8"  height="22" rx="3" fill="#991b1b"/>
                        <rect x="335" y="246" width="50" height="4"  rx="2" fill="white" opacity="0.4"/>
                        <rect x="335" y="253" width="30" height="3"  rx="2" fill="white" opacity="0.25"/>
                        <!-- book 1 top -->
                        <rect x="326" y="218" width="90" height="22" rx="5" fill="#16a34a"/>
                        <rect x="326" y="218" width="8"  height="22" rx="3" fill="#14532d"/>
                        <rect x="338" y="224" width="45" height="4"  rx="2" fill="white" opacity="0.4"/>
                        <rect x="338" y="231" width="28" height="3"  rx="2" fill="white" opacity="0.25"/>
                        <!-- books shadow -->
                        <ellipse cx="368" cy="287" rx="52" ry="5" fill="#94a3b8" opacity="0.15"/>

                        <!-- ── NOTEBOOK (left side, small) ── -->
                        <rect x="44" y="228" width="68" height="72" rx="8" fill="white" stroke="#e9d5ff" stroke-width="1.5"/>
                        <rect x="44" y="228" width="68" height="10" rx="5" fill="#a855f7" opacity="0.7"/>
                        <!-- spiral dots -->
                        <circle cx="56" cy="233" r="3" fill="white"/>
                        <circle cx="68" cy="233" r="3" fill="white"/>
                        <circle cx="80" cy="233" r="3" fill="white"/>
                        <circle cx="92" cy="233" r="3" fill="white"/>
                        <circle cx="104" cy="233" r="3" fill="white"/>
                        <!-- notebook lines -->
                        <line x1="54" y1="250" x2="104" y2="250" stroke="#e9d5ff" stroke-width="1"/>
                        <line x1="54" y1="260" x2="104" y2="260" stroke="#e9d5ff" stroke-width="1"/>
                        <line x1="54" y1="270" x2="104" y2="270" stroke="#e9d5ff" stroke-width="1"/>
                        <line x1="54" y1="280" x2="90"  y2="280" stroke="#e9d5ff" stroke-width="1"/>
                        <line x1="54" y1="290" x2="104" y2="290" stroke="#e9d5ff" stroke-width="1"/>
                        <!-- notebook shadow -->
                        <ellipse cx="78" cy="302" rx="36" ry="4" fill="#94a3b8" opacity="0.12"/>

                        <!-- ── RULER ── -->
                        <rect x="340" y="288" width="90" height="12" rx="3" fill="#fef9c3" stroke="#fde68a" stroke-width="1"/>
                        <line x1="355" y1="288" x2="355" y2="294" stroke="#fbbf24" stroke-width="1"/>
                        <line x1="365" y1="288" x2="365" y2="296" stroke="#fbbf24" stroke-width="1"/>
                        <line x1="375" y1="288" x2="375" y2="294" stroke="#fbbf24" stroke-width="1"/>
                        <line x1="385" y1="288" x2="385" y2="296" stroke="#fbbf24" stroke-width="1"/>
                        <line x1="395" y1="288" x2="395" y2="294" stroke="#fbbf24" stroke-width="1"/>
                        <line x1="405" y1="288" x2="405" y2="296" stroke="#fbbf24" stroke-width="1"/>
                        <line x1="415" y1="288" x2="415" y2="294" stroke="#fbbf24" stroke-width="1"/>

                        <!-- ── GRADUATION CAP floating top-right ── -->
                        <g transform="translate(340,30)">
                            <polygon points="40,12 76,28 40,44 4,28" fill="#e03535"/>
                            <rect x="35" y="44" width="10" height="18" rx="2" fill="#e03535"/>
                            <ellipse cx="40" cy="62" rx="11" ry="5" fill="#ff6b6b"/>
                            <line x1="76" y1="28" x2="76" y2="44" stroke="#e03535" stroke-width="2" stroke-linecap="round"/>
                            <circle cx="76" cy="47" r="4" fill="#fbbf24"/>
                        </g>

                        <!-- ── SUBJECT LABEL PILLS ── -->
                        <rect x="100" y="138" width="108" height="26" rx="13" fill="#fff1f1" stroke="#fecaca" stroke-width="1"/>
                        <text x="154" y="155" text-anchor="middle" font-size="11" font-weight="700" fill="#e03535" font-family="sans-serif">FSc Pre-Medical</text>

                        <rect x="220" y="138" width="120" height="26" rx="13" fill="#eff6ff" stroke="#bfdbfe" stroke-width="1"/>
                        <text x="280" y="155" text-anchor="middle" font-size="11" font-weight="700" fill="#1d4ed8" font-family="sans-serif">Pre-Engineering</text>

                        <rect x="100" y="172" width="56" height="26" rx="13" fill="#f0fdf4" stroke="#bbf7d0" stroke-width="1"/>
                        <text x="128" y="189" text-anchor="middle" font-size="11" font-weight="700" fill="#16a34a" font-family="sans-serif">ICS</text>

                        <rect x="166" y="172" width="44" height="26" rx="13" fill="#fef9c3" stroke="#fde68a" stroke-width="1"/>
                        <text x="188" y="189" text-anchor="middle" font-size="11" font-weight="700" fill="#92400e" font-family="sans-serif">FA</text>

                        <rect x="220" y="172" width="60" height="26" rx="13" fill="#faf5ff" stroke="#e9d5ff" stroke-width="1"/>
                        <text x="250" y="189" text-anchor="middle" font-size="11" font-weight="700" fill="#7e22ce" font-family="sans-serif">FA IT</text>

                        <rect x="290" y="172" width="68" height="26" rx="13" fill="#fff7ed" stroke="#fed7aa" stroke-width="1"/>
                        <text x="324" y="189" text-anchor="middle" font-size="11" font-weight="700" fill="#c2410c" font-family="sans-serif">I.COM</text>

                        <!-- ── BOTTOM STATS BAR ── -->
                        <rect x="60" y="325" width="340" height="48" rx="14" fill="white" stroke="#e2e8f0" stroke-width="1"/>
                        <text x="160" y="344" text-anchor="middle" font-size="18" font-weight="800" fill="#e03535" font-family="sans-serif">6+</text>
                        <text x="160" y="360" text-anchor="middle" font-size="9" fill="#64748b" font-family="sans-serif">PROGRAMS</text>
                        <line x1="230" y1="333" x2="230" y2="363" stroke="#e2e8f0" stroke-width="1"/>
                        <text x="230" y="344" text-anchor="middle" font-size="18" font-weight="800" fill="#3b82f6" font-family="sans-serif">2</text>
                        <text x="230" y="360" text-anchor="middle" font-size="9" fill="#64748b" font-family="sans-serif">SHIFTS</text>
                        <line x1="300" y1="333" x2="300" y2="363" stroke="#e2e8f0" stroke-width="1"/>
                        <text x="340" y="344" text-anchor="middle" font-size="18" font-weight="800" fill="#16a34a" font-family="sans-serif">100%</text>
                        <text x="340" y="360" text-anchor="middle" font-size="9" fill="#64748b" font-family="sans-serif">MERIT BASED</text>

                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ══ ELIGIBILITY ══ -->
<div class="section fade-section" style="background:#fff; border-top:1px solid var(--border); border-bottom:1px solid var(--border);">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div style="border-radius:var(--radius);overflow:hidden;background:linear-gradient(135deg,#f0fdf4 0%,#fff 60%,#eff6ff 100%);border:1px solid var(--border);padding:32px;min-height:380px;display:flex;align-items:center;justify-content:center;">
                    <svg width="100%" viewBox="0 0 400 340" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="30" cy="30" r="60" fill="#dcfce7" opacity="0.5"/>
                        <circle cx="380" cy="310" r="80" fill="#dbeafe" opacity="0.4"/>
                        <g transform="translate(140,20)">
                            <path d="M60 0 L120 25 L120 75 Q120 130 60 155 Q0 130 0 75 L0 25 Z" fill="#e03535" opacity="0.12"/>
                            <path d="M60 8 L112 30 L112 75 Q112 124 60 147 Q8 124 8 75 L8 30 Z" fill="white" stroke="#e03535" stroke-width="2"/>
                            <polyline points="32,80 52,100 88,60" fill="none" stroke="#e03535" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <rect x="20" y="190" width="170" height="90" rx="16" fill="white" stroke="#bbf7d0" stroke-width="1.5"/>
                        <rect x="20" y="190" width="170" height="6" rx="3" fill="#22c55e" opacity="0.4"/>
                        <circle cx="54" cy="230" r="20" fill="#f0fdf4"/>
                        <text x="54" y="236" text-anchor="middle" font-size="20" fill="#16a34a">✓</text>
                        <text x="130" y="222" text-anchor="middle" font-size="12" font-weight="700" fill="#1e293b" font-family="sans-serif">Matric Passed</text>
                        <text x="130" y="238" text-anchor="middle" font-size="10" fill="#64748b" font-family="sans-serif">From recognized board</text>
                        <text x="130" y="252" text-anchor="middle" font-size="10" fill="#64748b" font-family="sans-serif">with required marks</text>
                        <rect x="210" y="190" width="170" height="90" rx="16" fill="white" stroke="#bfdbfe" stroke-width="1.5"/>
                        <rect x="210" y="190" width="170" height="6" rx="3" fill="#3b82f6" opacity="0.4"/>
                        <circle cx="244" cy="230" r="20" fill="#eff6ff"/>
                        <text x="244" y="235" text-anchor="middle" font-size="13" font-weight="800" fill="#3b82f6" font-family="sans-serif">60%</text>
                        <text x="320" y="222" text-anchor="middle" font-size="12" font-weight="700" fill="#1e293b" font-family="sans-serif">Science Programs</text>
                        <text x="320" y="238" text-anchor="middle" font-size="10" fill="#64748b" font-family="sans-serif">Minimum 60% marks</text>
                        <text x="320" y="252" text-anchor="middle" font-size="10" fill="#64748b" font-family="sans-serif">in previous exam</text>
                        <rect x="80" y="300" width="240" height="30" rx="10" fill="#1e293b"/>
                        <text x="200" y="320" text-anchor="middle" font-size="12" font-weight="700" fill="white" font-family="sans-serif">Admission Strictly on Merit</text>
                    </svg>
                </div>
            </div>
            <div class="col-lg-6">
                <span class="section-tag">Who Can Apply</span>
                <h2 class="section-title">Eligibility Criteria</h2>
                <p class="section-sub">Students who have successfully passed their Matriculation examination are eligible to apply.</p>
                <div class="card" style="background:var(--red-light); border-color:#fecaca;">
                    <div style="display:flex; gap:14px; align-items:flex-start;">
                        <div style="width:42px;height:42px;background:var(--red);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        </div>
                        <div>
                            <h5 style="font-weight:700;font-size:16px;color:var(--text);margin-bottom:6px;">Matric Pass</h5>
                            <p style="font-size:14px;color:var(--muted);line-height:1.7;">Must have passed Matric examination from a recognized board with required marks as per program eligibility.</p>
                        </div>
                    </div>
                </div>
                <div class="card mt-3" style="background:var(--blue-light); border-color:#bfdbfe;">
                    <div style="display:flex; gap:14px; align-items:flex-start;">
                        <div style="width:42px;height:42px;background:var(--blue-mid);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        </div>
                        <div>
                            <h5 style="font-weight:700;font-size:16px;color:var(--text);margin-bottom:6px;">Science Programs: 60% Marks</h5>
                            <p style="font-size:14px;color:var(--muted);line-height:1.7;">For FSc Pre-Medical and Pre-Engineering, at least 60% marks in previous examination are required.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ══ DOCUMENTS ══ -->
<div class="section fade-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="section-tag">What to Bring</span>
                <h2 class="section-title">Required Documents</h2>
                <p class="section-sub">Please ensure all documents are attested and ready before submitting your application.</p>
                <div class="doc-list">
                    <div class="doc-item">
                        <div class="doc-dot"></div>
                        <span>Matric Result Card</span>
                    </div>
                    <div class="doc-item">
                        <div class="doc-dot"></div>
                        <span>B-Form / CNIC</span>
                    </div>
                    <div class="doc-item">
                        <div class="doc-dot"></div>
                        <span>Father CNIC</span>
                    </div>
                    <div class="doc-item">
                        <div class="doc-dot"></div>
                        <span>Passport Size Photos</span>
                    </div>
                    <div class="doc-item">
                        <div class="doc-dot"></div>
                        <span>Attested Educational Certificates</span>
                    </div>
                    <div class="doc-item">
                        <div class="doc-dot"></div>
                        <span>Character Certificate</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div style="border-radius:var(--radius);overflow:hidden;background:linear-gradient(135deg,#fff5f5 0%,#fff 60%,#fafafa 100%);border:1px solid var(--border);padding:32px;min-height:400px;display:flex;align-items:center;justify-content:center;">
                    <svg width="100%" viewBox="0 0 400 360" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="350" cy="40" r="70" fill="#fde8e8" opacity="0.4"/>
                        <circle cx="40" cy="330" r="60" fill="#f0fdf4" opacity="0.5"/>
                        <!-- Folder base -->
                        <rect x="80" y="100" width="240" height="180" rx="14" fill="white" stroke="#e2e8f0" stroke-width="1.5"/>
                        <path d="M80 100 Q80 86 94 86 L170 86 L186 100 Z" fill="#e03535" opacity="0.2"/>
                        <path d="M80 100 Q80 86 94 86 L170 86 L186 100" fill="none" stroke="#e03535" stroke-width="1.5"/>
                        <!-- Document lines inside folder -->
                        <!-- Doc 1: Result Card -->
                        <rect x="104" y="120" width="192" height="36" rx="8" fill="#fff1f1" stroke="#fecaca" stroke-width="1"/>
                        <rect x="116" y="131" width="20" height="14" rx="3" fill="#e03535" opacity="0.7"/>
                        <rect x="146" y="134" width="80" height="5" rx="2" fill="#94a3b8"/>
                        <rect x="146" y="143" width="50" height="4" rx="2" fill="#cbd5e1"/>
                        <text x="286" y="143" text-anchor="middle" font-size="10" font-weight="600" fill="#e03535" font-family="sans-serif">Result Card</text>
                        <!-- Doc 2: B-Form -->
                        <rect x="104" y="164" width="192" height="36" rx="8" fill="#eff6ff" stroke="#bfdbfe" stroke-width="1"/>
                        <rect x="116" y="175" width="20" height="14" rx="3" fill="#3b82f6" opacity="0.7"/>
                        <rect x="146" y="178" width="70" height="5" rx="2" fill="#94a3b8"/>
                        <rect x="146" y="187" width="45" height="4" rx="2" fill="#cbd5e1"/>
                        <text x="286" y="187" text-anchor="middle" font-size="10" font-weight="600" fill="#3b82f6" font-family="sans-serif">B-Form / CNIC</text>
                        <!-- Doc 3: Photos -->
                        <rect x="104" y="208" width="192" height="36" rx="8" fill="#f0fdf4" stroke="#bbf7d0" stroke-width="1"/>
                        <rect x="116" y="219" width="20" height="14" rx="3" fill="#22c55e" opacity="0.7"/>
                        <rect x="146" y="222" width="90" height="5" rx="2" fill="#94a3b8"/>
                        <rect x="146" y="231" width="55" height="4" rx="2" fill="#cbd5e1"/>
                        <text x="278" y="231" text-anchor="middle" font-size="10" font-weight="600" fill="#16a34a" font-family="sans-serif">Passport Photos</text>
                        <!-- Doc 4: Character cert -->
                        <rect x="104" y="252" width="192" height="14" rx="6" fill="#fdf4ff" stroke="#e9d5ff" stroke-width="1"/>
                        <text x="200" y="263" text-anchor="middle" font-size="10" fill="#9333ea" font-family="sans-serif">+ Character Certificate &amp; more...</text>
                        <!-- Stamp circle -->
                        <circle cx="316" cy="106" r="28" fill="white" stroke="#e03535" stroke-width="2" stroke-dasharray="4,3"/>
                        <text x="316" y="102" text-anchor="middle" font-size="9" font-weight="700" fill="#e03535" font-family="sans-serif">MUST BE</text>
                        <text x="316" y="114" text-anchor="middle" font-size="9" font-weight="700" fill="#e03535" font-family="sans-serif">ATTESTED</text>
                        <!-- bottom label -->
                        <rect x="110" y="300" width="180" height="32" rx="10" fill="#1e293b"/>
                        <text x="200" y="321" text-anchor="middle" font-size="12" font-weight="700" fill="white" font-family="sans-serif">Submit Before Due Date</text>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ══ ADMISSION RULES ══ -->
<div class="section rules-section fade-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-tag">Guidelines</span>
            <h2 class="section-title">Admission Rules</h2>
            <p class="section-sub" style="max-width:560px;margin:0 auto;">Read all rules carefully before submitting your application.</p>
        </div>

        <div class="card">
            <!-- Block 1 -->
            <div class="rule-block">
                <h4 class="rule-heading">General Admission Policy</h4>
                <p class="rule-text">
                    The College Admission Committee will issue advertisements for admission to various classes 
                    according to the schedule announced by the Board / University / Government. These advertisements 
                    will provide complete information regarding available seats, eligibility criteria, fee structure, 
                    required documents, and deadlines. Candidates must submit their applications within the prescribed 
                    time. Incomplete or late applications will not be considered.
                </p>
            </div>

            <!-- Block 2 -->
            <div class="rule-block">
                <h4 class="rule-heading">Method for Obtaining Admission Form</h4>
                <p class="rule-text">
                    Applicants (male / female) can obtain the admission form from the college admission office 
                    during office hours after paying the prescribed fee.
                </p>
                <ul class="rule-list">
                    <li>Admission will be granted strictly on merit and according to official rules.</li>
                    <li>The candidate must fulfill the required educational qualifications and marks criteria.</li>
                    <li>Admission forms must be submitted within the due date.</li>
                    <li>Late applications will not be entertained.</li>
                </ul>
            </div>

            <!-- Block 3 -->
            <div class="rule-block">
                <h4 class="rule-heading">Required Documents</h4>
                <ul class="rule-list">
                    <li>Attested copies of educational certificates</li>
                    <li>Character certificate</li>
                    <li>National Identity Card / B-Form copy</li>
                    <li>Parent / Guardian CNIC copy</li>
                    <li>Recent passport-size photographs (1.5 × 1.5 inches)</li>
                </ul>
            </div>

            <!-- Block 4 -->
            <div class="rule-block">
                <h4 class="rule-heading">Important Instructions</h4>
                <ul class="rule-list">
                    <li>Providing false information or fake documents will result in cancellation of admission.</li>
                    <li>The decision of the admission committee will be final.</li>
                    <li>Applicants must ensure correct spellings of their name and personal details.</li>
                    <li>Any misconduct or unfair means may lead to cancellation.</li>
                    <li>Students must follow all college discipline and rules.</li>
                    <li>The college reserves the right to change admission policy when required.</li>
                </ul>
            </div>

            <!-- Block 5 -->
            <div class="rule-block" style="margin-bottom:0;">
                <h4 class="rule-heading">Admission Cancellation / Withdrawal</h4>
                <p class="rule-text">
                    If a student wishes to cancel admission after being admitted, they must submit a written 
                    application to the college administration. Fee refund, if any, will be made according to 
                    the college/government refund policy.
                </p>
                <p class="rule-text" style="margin-bottom:0;">
                    Usually, full fee (up to 100%) may be refunded before the start of classes, while after 
                    classes begin, only a certain percentage may be refunded. The final decision regarding 
                    refund will rest with the college administration.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- ══ SUBJECTS OF STUDY ══ -->
<div class="section fade-section" style="background:#fff; border-top:1px solid var(--border);">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-tag">Curriculum</span>
            <h2 class="section-title">Subjects of Study</h2>
            <p class="section-sub" style="max-width:540px;margin:0 auto;">Subject groups and combinations available for first year and second shift admissions.</p>
        </div>

        <div class="card">
            <!-- First Year Groups -->
            <div class="shift-badge">📅 First Year Admission</div>
            <h5 class="rule-heading">Groups Available</h5>
            <div class="table-wrap">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Group</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Pre-Medical</td></tr>
                        <tr><td>2</td><td>Pre-Engineering</td></tr>
                        <tr><td>3</td><td>ICS</td></tr>
                        <tr><td>4</td><td>Arts</td></tr>
                    </tbody>
                </table>
            </div>

            <!-- Compulsory Subjects -->
            <h5 class="rule-heading" style="margin-top:24px;">Compulsory Subjects — First Year</h5>
            <div class="table-wrap">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Program</th>
                            <th>Physics</th>
                            <th>Chemistry</th>
                            <th>Biology</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Pre-Medical</strong></td>
                            <td><span class="yes-badge">Yes</span></td>
                            <td><span class="yes-badge">Yes</span></td>
                            <td><span class="yes-badge">Yes</span></td>
                        </tr>
                        <tr>
                            <td><strong>Pre-Engineering</strong></td>
                            <td><span class="yes-badge">Yes</span></td>
                            <td><span class="yes-badge">Yes</span></td>
                            <td><span class="no-badge">No</span></td>
                        </tr>
                        <tr>
                            <td><strong>ICS</strong></td>
                            <td><span class="no-badge">No</span></td>
                            <td><span class="no-badge">No</span></td>
                            <td><span class="no-badge">No</span></td>
                        </tr>
                        <tr>
                            <td><strong>General Science</strong></td>
                            <td><span class="yes-badge">Yes</span></td>
                            <td><span class="no-badge">No</span></td>
                            <td><span class="no-badge">No</span></td>
                        </tr>
                        <tr>
                            <td><strong>Arts</strong></td>
                            <td><span class="no-badge">No</span></td>
                            <td><span class="no-badge">No</span></td>
                            <td><span class="no-badge">No</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="note-box">
                <strong>Note:</strong>&nbsp; Admission will be granted on merit. For science subjects, at least 60% marks are required in previous examinations.
            </div>

            <!-- Optional First Year -->
            <h5 class="rule-heading">Optional Subjects — First Year</h5>
            <div class="table-wrap">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Group A</th>
                            <th>Group B</th>
                            <th>Group C</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Islamiat Elective</td>
                            <td>Education</td>
                            <td>Home Economics</td>
                        </tr>
                        <tr>
                            <td>Civics</td>
                            <td>Fine Arts</td>
                            <td>Library Science</td>
                        </tr>
                        <tr>
                            <td>History</td>
                            <td>Computer Science</td>
                            <td>Ethics</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <hr style="border:none;border-top:1px solid var(--border);margin:32px 0;">

            <!-- Second Shift -->
            <div class="shift-badge">🌙 Second Shift</div>
            <p class="rule-text">
                Students may also apply for second shift based on seat availability. Admission will also be on merit.
            </p>

            <h5 class="rule-heading">Compulsory Subjects — Second Shift</h5>
            <div class="table-wrap">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Program</th>
                            <th>Physics</th>
                            <th>Chemistry</th>
                            <th>Biology</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Pre-Medical</strong></td>
                            <td><span class="yes-badge">Yes</span></td>
                            <td><span class="yes-badge">Yes</span></td>
                            <td><span class="yes-badge">Yes</span></td>
                        </tr>
                        <tr>
                            <td><strong>Pre-Engineering</strong></td>
                            <td><span class="yes-badge">Yes</span></td>
                            <td><span class="yes-badge">Yes</span></td>
                            <td><span class="no-badge">No</span></td>
                        </tr>
                        <tr>
                            <td><strong>ICS</strong></td>
                            <td><span class="no-badge">No</span></td>
                            <td><span class="no-badge">No</span></td>
                            <td><span class="no-badge">No</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h5 class="rule-heading">Optional Subjects — Second Shift</h5>
            <div class="table-wrap">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Group A</th>
                            <th>Group B</th>
                            <th>Group C</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Civics</td>
                            <td>Education</td>
                            <td>Library Science</td>
                        </tr>
                        <tr>
                            <td>Islamiat Elective</td>
                            <td>Fine Arts</td>
                            <td>Ethics</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <hr style="border:none;border-top:1px solid var(--border);margin:32px 0;">

            <!-- Important Notes as cards -->
            <h5 class="rule-heading">Important Notes</h5>
            <div class="notes-grid">
                <div class="note-card">
                    <div class="note-num">1</div>
                    <p>Students can apply for both morning and second shift.</p>
                </div>
                <div class="note-card">
                    <div class="note-num">2</div>
                    <p>Admission will be strictly on merit.</p>
                </div>
                <div class="note-card">
                    <div class="note-num">3</div>
                    <p>Subject combinations may change if required.</p>
                </div>
                <div class="note-card">
                    <div class="note-num">4</div>
                    <p>Final decision will be made by the college administration.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ══ APPLY CTA ══ -->
<div class="apply-strip fade-section">
    <div class="container">
        <h3>Ready to Start Your Journey?</h3>
        <p>Applications are open — apply now and secure your seat.</p>
        <a href="#" class="btn-apply">Apply Now →</a>
    </div>
</div>

<!-- ══ SCROLL ANIMATION ══ -->
<script>
const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('show'); });
}, { threshold: 0.08 });
document.querySelectorAll('.fade-section').forEach(el => obs.observe(el));
</script>

@endsection