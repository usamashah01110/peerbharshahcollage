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
.hero h1 span { color: var(--red); }
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
.stat-num { font-size: 26px; font-weight: 800; color: var(--red); display: block; }
.stat-label { font-size: 12px; color: var(--muted); font-weight: 500; text-transform: uppercase; letter-spacing: 0.05em; }

/* ─── SECTION ─── */
.section { padding: 80px 0; }

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
.section-title { font-size: clamp(24px, 3vw, 34px); font-weight: 800; color: var(--text); margin-bottom: 8px; line-height: 1.2; }
.section-sub { font-size: 16px; color: var(--muted); margin-bottom: 36px; line-height: 1.6; }

/* ─── CARDS ─── */
.card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 36px;
    transition: box-shadow 0.3s ease, transform 0.3s ease;
}
.card:hover { box-shadow: 0 16px 48px rgba(0,0,0,0.08); transform: translateY(-4px); }

/* ─── TABLES ─── */
.table-wrap {
    overflow-x: auto;
    border-radius: 14px;
    border: 1px solid var(--border);
    margin: 12px 0 20px;
}
.styled-table { width: 100%; border-collapse: collapse; font-size: 14px; }
.styled-table thead tr { background: linear-gradient(90deg, var(--red), #ff6b6b); }
.styled-table thead th { color: #fff; font-weight: 700; padding: 14px 18px; text-align: left; font-size: 13px; text-transform: uppercase; letter-spacing: 0.05em; }
.styled-table thead th:first-child { border-radius: 14px 0 0 0; }
.styled-table thead th:last-child  { border-radius: 0 14px 0 0; }
.styled-table tbody tr { border-bottom: 1px solid var(--border); transition: background 0.15s; }
.styled-table tbody tr:last-child { border-bottom: none; }
.styled-table tbody tr:hover { background: var(--red-light); }
.styled-table tbody td { padding: 13px 18px; color: var(--text); font-weight: 500; }
.styled-table tbody tr:nth-child(even) td { background: #fafafa; }
.yes-badge { display: inline-block; background: #dcfce7; color: #15803d; font-size: 12px; font-weight: 700; padding: 3px 12px; border-radius: 50px; }
.no-badge  { display: inline-block; background: #f1f5f9; color: #94a3b8; font-size: 12px; font-weight: 600; padding: 3px 12px; border-radius: 50px; }

/* ─── NOTE BOX ─── */
.note-box {
    background: var(--blue-light);
    border: 1px solid #bfdbfe;
    border-radius: 12px;
    padding: 16px 20px;
    font-size: 14px;
    color: #1e40af;
    margin: 8px 0;
    display: flex;
    gap: 10px;
    align-items: flex-start;
}
.note-box::before { content: 'ℹ'; font-size: 16px; font-weight: 700; flex-shrink: 0; }

/* ─── RULE LIST ─── */
.rule-list { list-style: none; padding: 0; display: flex; flex-direction: column; gap: 8px; }
.rule-list li { display: flex; align-items: flex-start; gap: 10px; font-size: 15px; color: #374151; line-height: 1.6; }
.rule-list li::before { content: ''; width: 7px; height: 7px; background: var(--red); border-radius: 50%; margin-top: 8px; flex-shrink: 0; }

/* ─── DOC LIST ─── */
.doc-list { display: flex; flex-direction: column; gap: 12px; margin-top: 8px; }
.doc-item { display: flex; align-items: center; gap: 14px; padding: 14px 18px; background: var(--surface2); border: 1px solid var(--border); border-radius: var(--radius-sm); transition: all 0.2s; }
.doc-item:hover { border-color: var(--red-mid); background: var(--red-light); }
.doc-dot { width: 10px; height: 10px; background: var(--red); border-radius: 50%; flex-shrink: 0; }
.doc-item span { font-size: 15px; font-weight: 500; color: var(--text); }

/* ════════════════════════════════════════════
   ─── COMBINED PROGRAMS + CTA SECTION ───
   ════════════════════════════════════════════ */

/* Top bar */
.prog-topbar {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;
    margin-bottom: 36px;
}
.prog-topbar-left {}
.prog-topbar-right {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 10px;
    flex-shrink: 0;
}

/* Stats strip */
.prog-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
    margin-bottom: 32px;
}
.prog-stat-box {
    background: var(--red-light);
    border: 1px solid #fecaca;
    border-radius: 16px;
    padding: 18px;
    text-align: center;
}
.prog-stat-num  { font-size: 28px; font-weight: 800; color: var(--red); display: block; line-height: 1; }
.prog-stat-lbl  { font-size: 11px; color: #b91c1c; text-transform: uppercase; letter-spacing: 0.07em; margin-top: 6px; display: block; font-weight: 600; }

/* Program cards */
.programs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    gap: 16px;
    margin-bottom: 32px;
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
.prog-card h4 { font-size: 14px; font-weight: 700; color: var(--text); }
.prog-card p  { font-size: 12px; color: var(--muted); margin-top: 4px; }

/* FAQ Accordion (reused) */
.faq-wrap { display: flex; flex-direction: column; gap: 10px; }
.faq-item {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    overflow: hidden;
    transition: box-shadow 0.25s ease, border-color 0.25s ease;
}
.faq-item.active { box-shadow: 0 6px 24px rgba(224,53,53,0.1); border-color: #fecaca; }
.faq-q {
    width: 100%;
    background: none;
    border: none;
    padding: 18px 22px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    font-size: 15px;
    font-weight: 600;
    color: var(--text);
    text-align: left;
    gap: 14px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    transition: background 0.2s;
}
.faq-q:hover { background: var(--red-light); }
.faq-icon {
    width: 28px; height: 28px;
    border-radius: 50%;
    background: var(--red-light);
    border: 1px solid #fecaca;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    transition: transform 0.3s ease, background 0.25s, border-color 0.25s;
    color: var(--red);
}
.faq-item.active .faq-icon { transform: rotate(180deg); background: var(--red); color: #fff; border-color: var(--red); }
.faq-body { display: none; padding: 4px 22px 22px; border-top: 1px solid var(--border); }
.faq-item.active .faq-body { display: block; }
.faq-body p { font-size: 15px; color: var(--muted); line-height: 1.8; margin-top: 14px; }
.faq-body p + p { margin-top: 10px; }

/* Bottom CTA strip */
.prog-cta {
    margin-top: 40px;
    background: linear-gradient(135deg, #fff1f1 0%, #fff 50%, #fde8e8 100%);
    border: 1px solid #fecaca;
    border-radius: var(--radius);
    padding: 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    flex-wrap: wrap;
}
.prog-cta-left h3 { font-size: 24px; font-weight: 800; color: var(--text); margin-bottom: 6px; }
.prog-cta-left p  { font-size: 15px; color: var(--muted); line-height: 1.6; }
.prog-cta-right { display: flex; gap: 12px; align-items: center; flex-shrink: 0; flex-wrap: wrap; }

/* Buttons */
.btn-apply {
    display: inline-block;
    background: linear-gradient(90deg, var(--red), #ff6b6b);
    color: #fff;
    font-size: 15px;
    font-weight: 700;
    padding: 14px 36px;
    border-radius: 50px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    box-shadow: 0 8px 24px rgba(224,53,53,0.3);
    transition: all 0.25s ease;
    font-family: 'Plus Jakarta Sans', sans-serif;
}
.btn-apply:hover { transform: translateY(-3px); box-shadow: 0 12px 32px rgba(224,53,53,0.4); color: #fff; text-decoration: none; }
.btn-apply-outline {
    display: inline-block;
    background: transparent;
    color: var(--red);
    font-size: 15px;
    font-weight: 700;
    padding: 13px 32px;
    border-radius: 50px;
    text-decoration: none;
    border: 2px solid var(--red);
    cursor: pointer;
    transition: all 0.25s ease;
    font-family: 'Plus Jakarta Sans', sans-serif;
}
.btn-apply-outline:hover { background: var(--red-light); transform: translateY(-2px); color: var(--red); text-decoration: none; }

/* Top-right small Apply btn */
.btn-apply-sm {
    display: inline-block;
    background: linear-gradient(90deg, var(--red), #ff6b6b);
    color: #fff;
    font-size: 13px;
    font-weight: 700;
    padding: 10px 24px;
    border-radius: 50px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    box-shadow: 0 6px 18px rgba(224,53,53,0.25);
    transition: all 0.25s ease;
    font-family: 'Plus Jakarta Sans', sans-serif;
    white-space: nowrap;
}
.btn-apply-sm:hover { transform: translateY(-2px); box-shadow: 0 10px 26px rgba(224,53,53,0.35); color: #fff; text-decoration: none; }

/* Badge pills */
.badge-pills { display: flex; gap: 8px; flex-wrap: wrap; justify-content: flex-end; }
.badge-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #fff;
    border: 1px solid #fecaca;
    border-radius: 50px;
    padding: 5px 14px;
    font-size: 12px;
    font-weight: 600;
    color: #b91c1c;
}
.badge-pill::before { content: ''; width: 6px; height: 6px; border-radius: 50%; background: var(--red); }

.btn-apply-outline-white {
    display: inline-block;
    background: transparent;
    color: #fff;
    font-size: 15px;
    font-weight: 700;
    padding: 13px 32px;
    border-radius: 50px;
    text-decoration: none;
    border: 2px solid rgba(255,255,255,0.6);
    cursor: pointer;
    transition: all 0.25s ease;
    font-family: 'Plus Jakarta Sans', sans-serif;
}
.btn-apply-outline-white:hover { background: rgba(255,255,255,0.12); color: #fff; text-decoration: none; }

/* ─── APPLY STRIP ─── */
.apply-strip {
    background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
    padding: 60px 0;
    text-align: center;
}
.apply-strip h3 { font-size: 28px; font-weight: 800; color: #fff; margin-bottom: 8px; }
.apply-strip p  { font-size: 16px; color: #94a3b8; margin-bottom: 28px; }

/* ─── FADE ANIMATION ─── */
.fade-section { opacity: 0; transform: translateY(50px); transition: opacity 0.7s ease, transform 0.7s ease; }
.fade-section.show { opacity: 1; transform: translateY(0); }

@media (max-width: 768px) {
    .hero-stats { flex-direction: column; gap: 20px; padding: 20px; }
    .card { padding: 24px; }
    .faq-q { font-size: 14px; padding: 15px 16px; }
    .faq-body { padding: 4px 16px 18px; }
    .prog-topbar { flex-direction: column; }
    .prog-topbar-right { align-items: flex-start; }
    .badge-pills { justify-content: flex-start; }
    .prog-stats { grid-template-columns: repeat(3,1fr); gap: 8px; }
    .prog-cta { flex-direction: column; text-align: center; }
    .prog-cta-right { justify-content: center; }
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
    </div>
</div>

<!-- ══ COMBINED: PROGRAMS + FAQ + CTA ══ -->
<div class="section fade-section">
    <div class="container">

        <!-- Top bar: heading + Apply Now button -->
        <div class="prog-topbar">
            <div class="prog-topbar-left">
                <span class="section-tag">What We Offer</span>
                <h2 class="section-title">Programs &amp; Admission Overview</h2>
                <p class="section-sub">Explore our programs, eligibility, documents, and rules — all in one place.</p>
            </div>
            <div class="prog-topbar-right">
                <a href="#" class="btn-apply-sm">Apply Now →</a>
                <div class="badge-pills">
                    <span class="badge-pill">Merit Based</span>
                    <span class="badge-pill">6+ Programs</span>
                    <span class="badge-pill">2 Shifts</span>
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="prog-stats">
            <div class="prog-stat-box"><span class="prog-stat-num">6+</span><span class="prog-stat-lbl">Programs</span></div>
            <div class="prog-stat-box"><span class="prog-stat-num">2</span><span class="prog-stat-lbl">Shifts</span></div>
            <div class="prog-stat-box"><span class="prog-stat-num">100%</span><span class="prog-stat-lbl">Merit Based</span></div>
        </div>

        <!-- Program Cards -->
        <div class="programs-grid">
            <div class="prog-card">
                <div class="prog-icon">🔬</div>
                <h4>FSc Pre-Medical</h4>
                <p>Biology &amp; Sciences</p>
            </div>
            <div class="prog-card">
                <div class="prog-icon">⚙️</div>
                <h4>FSc Pre-Engineering</h4>
                <p>Physics &amp; Maths</p>
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

        <!-- FAQ Accordion -->
        <div class="faq-wrap">

            <!-- FAQ 1: Eligibility -->
            <div class="faq-item active">
                <button class="faq-q" type="button">
                    <span>Eligibility Criteria</span>
                    <span class="faq-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body">
                    <p>Students who have passed their Matriculation examination from a recognized board are eligible to apply. Admission is strictly on merit.</p>
                    <ul class="rule-list mt-3">
                        <li>Must have passed Matric from a recognized board.</li>
                        <li>For FSc Pre-Medical and Pre-Engineering: minimum 60% marks required.</li>
                        <li>All admissions are granted strictly on merit.</li>
                    </ul>
                </div>
            </div>

            <!-- FAQ 2: Documents -->
            <div class="faq-item">
                <button class="faq-q" type="button">
                    <span>Required Documents</span>
                    <span class="faq-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body">
                    <p>Please ensure all documents are attested and ready before submitting your application.</p>
                    <div class="doc-list mt-3">
                        <div class="doc-item"><div class="doc-dot"></div><span>Matric Result Card</span></div>
                        <div class="doc-item"><div class="doc-dot"></div><span>B-Form / CNIC</span></div>
                        <div class="doc-item"><div class="doc-dot"></div><span>Father CNIC</span></div>
                        <div class="doc-item"><div class="doc-dot"></div><span>Passport Size Photos (1.5 × 1.5 inch)</span></div>
                        <div class="doc-item"><div class="doc-dot"></div><span>Attested Educational Certificates</span></div>
                        <div class="doc-item"><div class="doc-dot"></div><span>Character Certificate</span></div>
                    </div>
                </div>
            </div>

            <!-- FAQ 3: Admission Rules -->
            <div class="faq-item">
                <button class="faq-q" type="button">
                    <span>Admission Process &amp; Rules</span>
                    <span class="faq-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body">
                    <p>Admission forms are available at the college office during office hours after paying the prescribed fee. Read all rules carefully before submitting.</p>
                    <ul class="rule-list mt-3">
                        <li>Admission will be granted strictly on merit and according to official rules.</li>
                        <li>Admission forms must be submitted within the due date — late applications will not be entertained.</li>
                        <li>Providing false information or fake documents will result in cancellation of admission.</li>
                        <li>Applicants must ensure correct spellings of their name and personal details.</li>
                        <li>The decision of the admission committee will be final.</li>
                        <li>The college reserves the right to change admission policy when required.</li>
                    </ul>
                </div>
            </div>

            <!-- FAQ 4: Shifts -->
            <div class="faq-item">
                <button class="faq-q" type="button">
                    <span>Shifts &amp; Subject Combinations</span>
                    <span class="faq-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body">
                    <p>Programs are offered in both morning and second shift. Students may apply for both shifts simultaneously based on seat availability.</p>
                    <div class="table-wrap" style="margin-top:16px;">
                        <table class="styled-table">
                            <thead>
                                <tr><th>Program</th><th>Morning Shift</th><th>Second Shift</th></tr>
                            </thead>
                            <tbody>
                                <tr><td><strong>Pre-Medical</strong></td><td><span class="yes-badge">Available</span></td><td><span class="yes-badge">Available</span></td></tr>
                                <tr><td><strong>Pre-Engineering</strong></td><td><span class="yes-badge">Available</span></td><td><span class="yes-badge">Available</span></td></tr>
                                <tr><td><strong>ICS</strong></td><td><span class="yes-badge">Available</span></td><td><span class="yes-badge">Available</span></td></tr>
                                <tr><td><strong>FA / Arts</strong></td><td><span class="yes-badge">Available</span></td><td><span class="no-badge">—</span></td></tr>
                                <tr><td><strong>FA IT</strong></td><td><span class="yes-badge">Available</span></td><td><span class="no-badge">—</span></td></tr>
                                <tr><td><strong>I.COM</strong></td><td><span class="yes-badge">Available</span></td><td><span class="no-badge">—</span></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="note-box">
                        Students can apply for both morning and second shift. Final shift allocation is based on merit and seat availability.
                    </div>
                </div>
            </div>

            <!-- FAQ 5: Compulsory Subjects -->
            <div class="faq-item">
                <button class="faq-q" type="button">
                    <span>📅 Compulsory Subjects by Program</span>
                    <span class="faq-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body">
                    <div class="table-wrap">
                        <table class="styled-table">
                            <thead>
                                <tr><th>Program</th><th>Physics</th><th>Chemistry</th><th>Biology</th></tr>
                            </thead>
                            <tbody>
                                <tr><td><strong>Pre-Medical</strong></td><td><span class="yes-badge">Yes</span></td><td><span class="yes-badge">Yes</span></td><td><span class="yes-badge">Yes</span></td></tr>
                                <tr><td><strong>Pre-Engineering</strong></td><td><span class="yes-badge">Yes</span></td><td><span class="yes-badge">Yes</span></td><td><span class="no-badge">No</span></td></tr>
                                <tr><td><strong>ICS</strong></td><td><span class="no-badge">No</span></td><td><span class="no-badge">No</span></td><td><span class="no-badge">No</span></td></tr>
                                <tr><td><strong>General Science</strong></td><td><span class="yes-badge">Yes</span></td><td><span class="no-badge">No</span></td><td><span class="no-badge">No</span></td></tr>
                                <tr><td><strong>Arts</strong></td><td><span class="no-badge">No</span></td><td><span class="no-badge">No</span></td><td><span class="no-badge">No</span></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="note-box">
                        For science subjects, at least 60% marks are required in previous examinations.
                    </div>
                </div>
            </div>

            <!-- FAQ 6: Optional Subjects -->
            <div class="faq-item">
                <button class="faq-q" type="button">
                    <span>📅 Optional Subjects</span>
                    <span class="faq-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body">
                    <div class="table-wrap">
                        <table class="styled-table">
                            <thead>
                                <tr><th>Group A</th><th>Group B</th><th>Group C</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>Islamiat Elective</td><td>Education</td><td>Home Economics</td></tr>
                                <tr><td>Civics</td><td>Fine Arts</td><td>Library Science</td></tr>
                                <tr><td>History</td><td>Computer Science</td><td>Ethics</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="note-box">
                        Subject combinations may change if required. Final decision will be made by the college administration.
                    </div>
                </div>
            </div>

            <!-- FAQ 7: Cancellation Policy -->
            <div class="faq-item">
                <button class="faq-q" type="button">
                    <span>Cancellation &amp; Fee Refund Policy</span>
                    <span class="faq-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body">
                    <p>If a student wishes to cancel admission after being admitted, they must submit a written application to the college administration. Fee refund, if any, will be made according to the college/government refund policy.</p>
                    <p>Usually, full fee (up to 100%) may be refunded before the start of classes, while after classes begin, only a certain percentage may be refunded. The final decision regarding refund will rest with the college administration.</p>
                </div>
            </div>

        </div><!-- /.faq-wrap -->

    </div>
</div>
<!-- ══ END COMBINED SECTION ══ -->

<!-- ══ SUBJECTS OF STUDY — FAQ ══ -->
<div class="section fade-section" style="background:#fff; border-top:1px solid var(--border);">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-tag">Curriculum</span>
            <h2 class="section-title">Subjects of Study</h2>
            <p class="section-sub" style="max-width:540px;margin:0 auto;">Subject groups and combinations available for first year and second shift admissions.</p>
        </div>
        <div class="faq-wrap">
            <div class="faq-item active">
                <button class="faq-q" type="button">
                    <span>📅 First Year — Available Groups</span>
                    <span class="faq-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                </button>
                <div class="faq-body">
                    <div class="table-wrap">
                        <table class="styled-table">
                            <thead><tr><th>Sr. No.</th><th>Group</th></tr></thead>
                            <tbody>
                                <tr><td>1</td><td>Pre-Medical</td></tr>
                                <tr><td>2</td><td>Pre-Engineering</td></tr>
                                <tr><td>3</td><td>ICS</td></tr>
                                <tr><td>4</td><td>Arts</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-q" type="button">
                    <span>📅 First Year — Compulsory Subjects</span>
                    <span class="faq-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                </button>
                <div class="faq-body">
                    <div class="table-wrap">
                        <table class="styled-table">
                            <thead><tr><th>Program</th><th>Physics</th><th>Chemistry</th><th>Biology</th></tr></thead>
                            <tbody>
                                <tr><td><strong>Pre-Medical</strong></td><td><span class="yes-badge">Yes</span></td><td><span class="yes-badge">Yes</span></td><td><span class="yes-badge">Yes</span></td></tr>
                                <tr><td><strong>Pre-Engineering</strong></td><td><span class="yes-badge">Yes</span></td><td><span class="yes-badge">Yes</span></td><td><span class="no-badge">No</span></td></tr>
                                <tr><td><strong>ICS</strong></td><td><span class="no-badge">No</span></td><td><span class="no-badge">No</span></td><td><span class="no-badge">No</span></td></tr>
                                <tr><td><strong>General Science</strong></td><td><span class="yes-badge">Yes</span></td><td><span class="no-badge">No</span></td><td><span class="no-badge">No</span></td></tr>
                                <tr><td><strong>Arts</strong></td><td><span class="no-badge">No</span></td><td><span class="no-badge">No</span></td><td><span class="no-badge">No</span></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="note-box">
                        <strong>Note:</strong>&nbsp; Admission will be granted on merit. For science subjects, at least 60% marks are required in previous examinations.
                    </div>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-q" type="button">
                    <span>📅 First Year — Optional Subjects</span>
                    <span class="faq-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                </button>
                <div class="faq-body">
                    <div class="table-wrap">
                        <table class="styled-table">
                            <thead><tr><th>Group A</th><th>Group B</th><th>Group C</th></tr></thead>
                            <tbody>
                                <tr><td>Islamiat Elective</td><td>Education</td><td>Home Economics</td></tr>
                                <tr><td>Civics</td><td>Fine Arts</td><td>Library Science</td></tr>
                                <tr><td>History</td><td>Computer Science</td><td>Ethics</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-q" type="button">
                    <span>🌙 Second Shift — Compulsory Subjects</span>
                    <span class="faq-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                </button>
                <div class="faq-body">
                    <p>Students may also apply for second shift based on seat availability. Admission will also be on merit.</p>
                    <div class="table-wrap">
                        <table class="styled-table">
                            <thead><tr><th>Program</th><th>Physics</th><th>Chemistry</th><th>Biology</th></tr></thead>
                            <tbody>
                                <tr><td><strong>Pre-Medical</strong></td><td><span class="yes-badge">Yes</span></td><td><span class="yes-badge">Yes</span></td><td><span class="yes-badge">Yes</span></td></tr>
                                <tr><td><strong>Pre-Engineering</strong></td><td><span class="yes-badge">Yes</span></td><td><span class="yes-badge">Yes</span></td><td><span class="no-badge">No</span></td></tr>
                                <tr><td><strong>ICS</strong></td><td><span class="no-badge">No</span></td><td><span class="no-badge">No</span></td><td><span class="no-badge">No</span></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-q" type="button">
                    <span>🌙 Second Shift — Optional Subjects</span>
                    <span class="faq-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                </button>
                <div class="faq-body">
                    <div class="table-wrap">
                        <table class="styled-table">
                            <thead><tr><th>Group A</th><th>Group B</th><th>Group C</th></tr></thead>
                            <tbody>
                                <tr><td>Civics</td><td>Education</td><td>Library Science</td></tr>
                                <tr><td>Islamiat Elective</td><td>Fine Arts</td><td>Ethics</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-q" type="button">
                    <span>Important Notes</span>
                    <span class="faq-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                </button>
                <div class="faq-body">
                    <ul class="rule-list" style="margin-top:14px;">
                        <li>Students can apply for both morning and second shift.</li>
                        <li>Admission will be strictly on merit.</li>
                        <li>Subject combinations may change if required.</li>
                        <li>Final decision will be made by the college administration.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ══ READY TO START — CTA ══ -->
<div class="apply-strip fade-section">
    <div class="container">
        <h3>Ready to Start Your Journey?</h3>
        <p>Applications are open for 2026–27 session — apply now and secure your seat.</p>
        <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;margin-top:8px;">
            <a href="#" class="btn-apply-outline-white">Learn More</a>
            <a href="#" class="btn-apply">Apply Now →</a>
        </div>
    </div>
</div>

<!-- ══ SCRIPTS ══ -->
<script>
// Scroll fade animation
const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('show'); });
}, { threshold: 0.08 });
document.querySelectorAll('.fade-section').forEach(el => obs.observe(el));

// FAQ Accordion — works for ALL faq-wrap instances on the page
document.querySelectorAll('.faq-wrap').forEach(wrap => {
    wrap.querySelectorAll('.faq-q').forEach(btn => {
        btn.addEventListener('click', () => {
            const item = btn.closest('.faq-item');
            const isActive = item.classList.contains('active');
            wrap.querySelectorAll('.faq-item').forEach(i => i.classList.remove('active'));
            if (!isActive) item.classList.add('active');
        });
    });
});
</script>

@endsection