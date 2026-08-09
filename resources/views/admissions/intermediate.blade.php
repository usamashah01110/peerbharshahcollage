@extends('includes.main')
@section('content')

    {{-- ════════════════ HERO ════════════════ --}}
    <section class="hero hero-admissions">
        <div class="hero-grid"></div>
        <div class="container hero-content">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="reveal in-view">
                        <div class="hero-eyebrow">Admissions · 2026–27</div>
                        <h1 class="hero-title">
                            Intermediate <span class="accent">admissions</span><br>
                            are now <span class="gold-line">open.</span>
                        </h1>
                        <p class="hero-sub">
                            Build your future with our Intermediate programs — designed for
                            academic excellence, women's empowerment, and professional success.
                        </p>
                        <div class="hero-actions">
                            <a href="#" class="btn-primary-c">
                                Apply Now
                                <span class="arrow"><i class="bi bi-arrow-up-right"></i></span>
                            </a>
                            <a href="#programs" class="btn-ghost-c">Explore Programs</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-stat-card reveal reveal-delay-2 in-view">
                        <div class="hsc-eyebrow">Quick Look</div>
                        <div class="hsc-row">
                            <div class="hsc-num">6<span>+</span></div>
                            <div class="hsc-lbl">Programs<br>available</div>
                        </div>
                        <div class="hsc-divider"></div>
                        <div class="hsc-row">
                            <div class="hsc-num">2</div>
                            <div class="hsc-lbl">Morning &amp;<br>Second Shift</div>
                        </div>
                        <div class="hsc-divider"></div>
                        <div class="hsc-row">
                            <div class="hsc-num">100<span>%</span></div>
                            <div class="hsc-lbl">Strictly<br>Merit-Based</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ════════════════ PROGRAMS ════════════════ --}}
    <section class="programs" id="programs">
        <div class="container">
            <div class="row mb-5 align-items-end">
                <div class="col-lg-7 reveal">
                    <div class="section-eyebrow">What We Offer</div>
                    <h2 class="section-h">Six Intermediate paths<br>for <em>every ambition.</em></h2>
                </div>
                <div class="col-lg-5 reveal reveal-delay-1 text-lg-end">
                    <p class="lead-p mb-0">
                        From the sciences to the arts, our Intermediate programs prepare students
                        for university, professional study, and beyond.
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="program-card reveal">
                        <div class="program-icon"><i class="bi bi-heart-pulse"></i></div>
                        <div class="program-num">01 — Sciences</div>
                        <h4>FSc Pre-Medical</h4>
                        <p>Biology, Chemistry, and Physics — the foundation for medical, dental, and life-science careers.</p>
                        <a href="#" class="program-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="program-card reveal reveal-delay-1">
                        <div class="program-icon"><i class="bi bi-gear-wide-connected"></i></div>
                        <div class="program-num">02 — Sciences</div>
                        <h4>FSc Pre-Engineering</h4>
                        <p>Mathematics, Physics, and Chemistry — designed for future engineers, technologists, and architects.</p>
                        <a href="#" class="program-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="program-card reveal reveal-delay-2">
                        <div class="program-icon"><i class="bi bi-cpu"></i></div>
                        <div class="program-num">03 — Computer Science</div>
                        <h4>ICS</h4>
                        <p>Computer studies, mathematics, and statistics for aspiring software engineers and data analysts.</p>
                        <a href="#" class="program-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="program-card reveal">
                        <div class="program-icon"><i class="bi bi-book"></i></div>
                        <div class="program-num">04 — Arts</div>
                        <h4>FA</h4>
                        <p>The Faculty of Arts — humanities, languages, and social sciences for a flexible academic foundation.</p>
                        <a href="#" class="program-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="program-card reveal reveal-delay-1">
                        <div class="program-icon"><i class="bi bi-laptop"></i></div>
                        <div class="program-num">05 — Arts + IT</div>
                        <h4>FA IT</h4>
                        <p>Arts curriculum combined with information technology fundamentals for a modern digital edge.</p>
                        <a href="#" class="program-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="program-card reveal reveal-delay-2">
                        <div class="program-icon"><i class="bi bi-graph-up"></i></div>
                        <div class="program-num">06 — Commerce</div>
                        <h4>I.COM</h4>
                        <p>Accounting, business, and economics — the gateway to commerce, banking, and business administration.</p>
                        <a href="#" class="program-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ════════════════ ADMISSIONS INFORMATION (FAQ) ════════════════ --}}
    <section class="faq-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 reveal">
                    <div class="section-eyebrow">Admission Information</div>
                    <h2 class="section-h">Everything you need to <em>know.</em></h2>
                    <p class="lead-p mb-0">
                        Eligibility, required documents, rules, and policies — all in one place.
                        Read carefully before applying.
                    </p>
                </div>
            </div>

            <div class="faq-wrap reveal reveal-delay-1">

                {{-- Eligibility --}}
                <div class="faq-item active">
                    <button class="faq-q" type="button">
                        <span>Eligibility Criteria</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <p>Students who have passed their Matriculation examination from a recognized board are eligible to apply. All admissions are granted strictly on merit.</p>
                        <ul class="rule-list">
                            <li>Must have passed Matric from a recognized board.</li>
                            <li>For FSc Pre-Medical and Pre-Engineering: minimum 60% marks required.</li>
                            <li>All admissions are granted strictly on merit.</li>
                        </ul>
                    </div>
                </div>

                {{-- Documents --}}
                <div class="faq-item">
                    <button class="faq-q" type="button">
                        <span>Required Documents</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <p>Please ensure all documents are attested and ready before submitting your application.</p>
                        <div class="doc-list">
                            <div class="doc-item"><div class="doc-dot"></div><span>Matric Result Card</span></div>
                            <div class="doc-item"><div class="doc-dot"></div><span>B-Form / CNIC</span></div>
                            <div class="doc-item"><div class="doc-dot"></div><span>Father's CNIC</span></div>
                            <div class="doc-item"><div class="doc-dot"></div><span>Passport-size Photographs (1.5 × 1.5 inch)</span></div>
                            <div class="doc-item"><div class="doc-dot"></div><span>Attested Educational Certificates</span></div>
                            <div class="doc-item"><div class="doc-dot"></div><span>Character Certificate</span></div>
                        </div>
                    </div>
                </div>

                {{-- Admission Process & Rules --}}
                <div class="faq-item">
                    <button class="faq-q" type="button">
                        <span>Admission Process &amp; Rules</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <p>Admission forms are available at the college office during office hours after paying the prescribed fee. Read all rules carefully before submitting.</p>
                        <ul class="rule-list">
                            <li>Admission will be granted strictly on merit and according to official rules.</li>
                            <li>Forms must be submitted within the due date — late applications will not be entertained.</li>
                            <li>Providing false information or fake documents will result in cancellation of admission.</li>
                            <li>Applicants must ensure correct spellings of their name and personal details.</li>
                            <li>The decision of the admission committee will be final.</li>
                            <li>The college reserves the right to change admission policy when required.</li>
                        </ul>
                    </div>
                </div>

                {{-- Shifts --}}
                <div class="faq-item">
                    <button class="faq-q" type="button">
                        <span>Shifts &amp; Subject Combinations</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <p>Programs are offered in both morning and second shift. Students may apply for both shifts based on seat availability.</p>
                        <div class="table-wrap">
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

                {{-- Cancellation --}}
                <div class="faq-item">
                    <button class="faq-q" type="button">
                        <span>Cancellation &amp; Fee Refund Policy</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <p>If a student wishes to cancel admission after being admitted, they must submit a written application to the college administration. Fee refund, if any, will be made according to the college/government refund policy.</p>
                        <p>Usually, full fee (up to 100%) may be refunded before the start of classes; after classes begin, only a certain percentage may be refunded. The final decision regarding refund rests with the college administration.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ════════════════ CURRICULUM (FAQ with tables) ════════════════ --}}
    <section class="faq-section faq-section-alt">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 reveal">
                    <div class="section-eyebrow">Curriculum</div>
                    <h2 class="section-h">Subjects of <em>study.</em></h2>
                    <p class="lead-p mb-0">
                        Subject groups, compulsory subjects, and optional combinations available across both shifts.
                    </p>
                </div>
            </div>

            <div class="faq-wrap reveal reveal-delay-1">

                {{-- First Year Groups --}}
                <div class="faq-item active">
                    <button class="faq-q" type="button">
                        <span>First Year — Available Groups</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <div class="table-wrap">
                            <table class="styled-table">
                                <thead><tr><th style="width:90px;">Sr. No.</th><th>Group</th></tr></thead>
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

                {{-- First Year Compulsory --}}
                <div class="faq-item">
                    <button class="faq-q" type="button">
                        <span>First Year — Compulsory Subjects</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
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
                            Admission will be granted on merit. For science subjects, at least 60% marks are required in previous examinations.
                        </div>
                    </div>
                </div>

                {{-- First Year Optional --}}
                <div class="faq-item">
                    <button class="faq-q" type="button">
                        <span>First Year — Optional Subjects</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
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

                {{-- Second Shift Compulsory --}}
                <div class="faq-item">
                    <button class="faq-q" type="button">
                        <span>Second Shift — Compulsory Subjects</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
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

                {{-- Second Shift Optional --}}
                <div class="faq-item">
                    <button class="faq-q" type="button">
                        <span>Second Shift — Optional Subjects</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
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

                {{-- Important Notes --}}
                <div class="faq-item">
                    <button class="faq-q" type="button">
                        <span>Important Notes</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <ul class="rule-list">
                            <li>Students can apply for both morning and second shift.</li>
                            <li>Admission will be strictly on merit.</li>
                            <li>Subject combinations may change if required.</li>
                            <li>Final decision will be made by the college administration.</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ════════════════ CTA STRIP ════════════════ --}}
    <section class="cta-strip">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-8 reveal">
                    <div class="section-eyebrow" style="color: var(--gold);">Take the Next Step</div>
                    <h2 class="section-h">Ready to begin your <em>journey</em> with us?</h2>
                    <p class="lead-p mb-0">Applications for 2026–27 are now open. Submit yours before the deadline.</p>
                </div>
                <div class="col-lg-4 text-lg-end reveal reveal-delay-1">
                    <a href="#" class="btn-light-c">
                        Apply Now
                        <i class="bi bi-arrow-up-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ════════════════ FAQ ACCORDION SCRIPT ════════════════ --}}
    <script>
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
