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
                            How to <span class="accent">apply</span><br>
                            step by <span class="gold-line">step.</span>
                        </h1>
                        <p class="hero-sub">
                            From collecting your form to depositing your fee — the complete
                            admission process, the documents you need, and the rules that
                            apply. Read it once, apply with confidence.
                        </p>
                        <div class="hero-actions">
                            <a href="#steps" class="btn-primary-c">
                                See the Steps
                                <span class="arrow"><i class="bi bi-arrow-up-right"></i></span>
                            </a>
                            <a href="#checklist" class="btn-ghost-c">Document Checklist</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-stat-card reveal reveal-delay-2 in-view">
                        <div class="hsc-eyebrow">At a Glance</div>
                        <div class="hsc-row">
                            <div class="hsc-num">7</div>
                            <div class="hsc-lbl">Steps from form<br>to confirmed seat</div>
                        </div>
                        <div class="hsc-divider"></div>
                        <div class="hsc-row">
                            <div class="hsc-num">100<span>%</span></div>
                            <div class="hsc-lbl">Strictly<br>Merit-Based</div>
                        </div>
                        <div class="hsc-divider"></div>
                        <div class="hsc-row">
                            <div class="hsc-num">6</div>
                            <div class="hsc-lbl">Days a week —<br>Mon to Sat, 7 AM–2 PM</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ════════════════ QUICK NAV ════════════════ --}}
    <div class="hta-jump">
        <div class="container">
            <div class="hta-jump-row">
                <span class="hta-jump-lbl">On this page</span>
                <a href="#steps">The Process</a>
                <a href="#checklist">Documents</a>
                <a href="#form">The Form</a>
                <a href="#dates">Dates &amp; Fee</a>
                <a href="#faq">Questions</a>
                <a href="#help">Get Help</a>
            </div>
        </div>
    </div>

    {{-- ════════════════ THE PROCESS ════════════════ --}}
    <section class="hta-band" id="steps">
        <div class="container">
            <div class="row mb-5 align-items-end">
                <div class="col-lg-7 reveal">
                    <div class="section-eyebrow">The Process</div>
                    <h2 class="section-h">Seven steps, and<br><em>you're admitted.</em></h2>
                </div>
                <div class="col-lg-5 reveal reveal-delay-1 text-lg-end">
                    <p class="lead-p mb-0">
                        Every application follows the same route. Work through the steps in
                        order and keep your documents ready before you start.
                    </p>
                </div>
            </div>

            <div class="hta-steps">

                <div class="hta-step reveal">
                    <div class="hta-step-num">01</div>
                    <div class="hta-step-body">
                        <div class="hta-step-eyebrow">Step One</div>
                        <h4>Check your eligibility</h4>
                        <p>
                            Confirm that you meet the requirement for the program you want. Intermediate
                            applicants must have passed Matriculation from a recognised board; FSc
                            Pre-Medical and Pre-Engineering additionally require at least 60% marks.
                            BS applicants must have passed Intermediate or an equivalent examination.
                        </p>
                        <div class="hta-step-tags">
                            <span class="hta-tag">Recognised Board</span>
                            <span class="hta-tag">60% for FSc</span>
                        </div>
                    </div>
                </div>

                <div class="hta-step reveal">
                    <div class="hta-step-num">02</div>
                    <div class="hta-step-body">
                        <div class="hta-step-eyebrow">Step Two</div>
                        <h4>Collect the admission form</h4>
                        <p>
                            Admission forms are issued at the college admission office during office
                            hours, once the prescribed form fee has been paid. Ask for the form for the
                            correct class and shift — Intermediate and BS use separate forms.
                        </p>
                        <div class="hta-step-tags">
                            <span class="hta-tag">Mon–Sat</span>
                            <span class="hta-tag">7:00 AM – 2:00 PM</span>
                        </div>
                    </div>
                </div>

                <div class="hta-step reveal">
                    <div class="hta-step-num">03</div>
                    <div class="hta-step-body">
                        <div class="hta-step-eyebrow">Step Three</div>
                        <h4>Fill in your details carefully</h4>
                        <p>
                            Complete every field in your own handwriting. Your name, your father's name
                            and your date of birth must match your Matric certificate and B-Form/CNIC
                            exactly — a spelling mismatch is the most common reason a form is sent back.
                            Fill in your subject preferences in order of priority.
                        </p>
                    </div>
                </div>

                <div class="hta-step reveal">
                    <div class="hta-step-num">04</div>
                    <div class="hta-step-body">
                        <div class="hta-step-eyebrow">Step Four</div>
                        <h4>Attach the required documents</h4>
                        <p>
                            Attach attested copies of every document listed in the checklist below, and
                            affix a passport-size photograph in the space provided. Bring the originals
                            with you for verification at the counter — they will be returned to you.
                        </p>
                        <div class="hta-step-tags">
                            <span class="hta-tag">Attested Copies</span>
                            <span class="hta-tag">Originals for Verification</span>
                        </div>
                    </div>
                </div>

                <div class="hta-step reveal">
                    <div class="hta-step-num">05</div>
                    <div class="hta-step-body">
                        <div class="hta-step-eyebrow">Step Five</div>
                        <h4>Submit before the deadline</h4>
                        <p>
                            Hand the completed form in at the admission office on or before the last
                            date. Incomplete forms are not processed and late submissions are not
                            entertained. Keep the receipt or token you are given — you will need it to
                            check your status.
                        </p>
                    </div>
                </div>

                <div class="hta-step reveal">
                    <div class="hta-step-num">06</div>
                    <div class="hta-step-body">
                        <div class="hta-step-eyebrow">Step Six</div>
                        <h4>Watch for the merit list</h4>
                        <p>
                            Merit lists are prepared strictly on marks obtained and are displayed on the
                            college notice board, along with any announcement published on our
                            <a href="{{ route('news.index') }}" style="color: var(--crimson);">News &amp; Events</a>
                            page. If your name does not appear on the first list, watch for the
                            subsequent lists before the seats close.
                        </p>
                    </div>
                </div>

                <div class="hta-step reveal">
                    <div class="hta-step-num">07</div>
                    <div class="hta-step-body">
                        <div class="hta-step-eyebrow">Step Seven</div>
                        <h4>Deposit the fee and confirm</h4>
                        <p>
                            Selected candidates must deposit the admission fee within the date announced
                            with the merit list. A seat that is not confirmed in time is offered to the
                            next candidate on the list. Once your fee is received, your admission is
                            complete and you will be enrolled for the session.
                        </p>
                        <div class="hta-step-tags">
                            <span class="hta-tag">Admission Confirmed</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ════════════════ DOCUMENTS & ELIGIBILITY ════════════════ --}}
    <section class="hta-band hta-band-alt" id="checklist">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 reveal">
                    <div class="section-eyebrow">Before You Begin</div>
                    <h2 class="section-h">What to bring, and<br>who can <em>apply.</em></h2>
                    <p class="lead-p mb-0">
                        Gather everything on this list before you visit the office. A complete
                        file submitted on the first attempt saves you a second trip.
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="hta-panel reveal">
                        <div class="hta-panel-icon"><i class="bi bi-folder-check"></i></div>
                        <h4>Required Documents</h4>
                        <p>All copies must be attested. Bring the originals for verification.</p>
                        <div class="doc-list">
                            <div class="doc-item"><div class="doc-dot"></div><span>Matric (SSC) Result Card / Certificate</span></div>
                            <div class="doc-item"><div class="doc-dot"></div><span>Intermediate (HSSC) Result Card — BS applicants</span></div>
                            <div class="doc-item"><div class="doc-dot"></div><span>B-Form or CNIC of the applicant</span></div>
                            <div class="doc-item"><div class="doc-dot"></div><span>Father's / Guardian's CNIC</span></div>
                            <div class="doc-item"><div class="doc-dot"></div><span>Four passport-size photographs (1.5 × 1.5 inch)</span></div>
                            <div class="doc-item"><div class="doc-dot"></div><span>Character Certificate from the last institution</span></div>
                            <div class="doc-item"><div class="doc-dot"></div><span>Domicile Certificate, where applicable</span></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hta-panel reveal reveal-delay-1">
                        <div class="hta-panel-icon"><i class="bi bi-patch-check"></i></div>
                        <h4>Eligibility &amp; Rules</h4>
                        <p>Read these before you submit — they apply to every applicant.</p>
                        <ul class="rule-list">
                            <li>Matriculation from a recognised board is required for Intermediate admission.</li>
                            <li>FSc Pre-Medical and Pre-Engineering require a minimum of 60% marks.</li>
                            <li>Admission is granted strictly on merit and according to official rules.</li>
                            <li>Forms must be submitted within the due date — late forms are not entertained.</li>
                            <li>Incomplete forms, or forms with missing documents, will not be processed.</li>
                            <li>False information or forged documents result in cancellation of admission at any stage.</li>
                            <li>The decision of the admission committee is final.</li>
                            <li>The college reserves the right to change the admission policy when required.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 reveal reveal-delay-2">
                    <div class="note-box">
                        Not sure which program to apply for? Review the subject combinations and shift
                        availability on the
                        <a href="{{ route('admissions.intermediate') }}" style="color: var(--crimson);">Intermediate</a>
                        and
                        <a href="{{ route('admissions.bachelorofscience') }}" style="color: var(--crimson);">Bachelor of Science</a>
                        admission pages before filling your preferences.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ════════════════ WHAT THE FORM ASKS FOR ════════════════ --}}
    <section class="hta-band" id="form">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 reveal">
                    <div class="section-eyebrow">The Admission Form</div>
                    <h2 class="section-h">Know what you'll be <em>asked.</em></h2>
                    <p class="lead-p mb-0">
                        The form is filled and submitted at the admission office. Here is exactly
                        what each section asks for, so you can prepare your answers and documents
                        in advance.
                    </p>
                </div>
            </div>

            <div class="faq-wrap reveal reveal-delay-1">

                {{-- Program selection --}}
                <div class="faq-item active">
                    <button class="faq-q" type="button">
                        <span>Program Applied For</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <p>You will be asked to name the class, group and shift you are applying for. Available options include:</p>
                        <div class="hta-fields">
                            <div class="hta-field"><i class="bi bi-check2"></i> FA / Arts</div>
                            <div class="hta-field"><i class="bi bi-check2"></i> FA IT</div>
                            <div class="hta-field"><i class="bi bi-check2"></i> FSc Pre-Medical</div>
                            <div class="hta-field"><i class="bi bi-check2"></i> FSc Pre-Engineering</div>
                            <div class="hta-field"><i class="bi bi-check2"></i> ICS</div>
                            <div class="hta-field"><i class="bi bi-check2"></i> I.Com</div>
                            <div class="hta-field"><i class="bi bi-check2"></i> BS (General Science)</div>
                            <div class="hta-field"><i class="bi bi-check2"></i> BS (Home Economics)</div>
                            <div class="hta-field"><i class="bi bi-check2"></i> BS (Physical Education)</div>
                            <div class="hta-field"><i class="bi bi-check2"></i> BS (Urdu)</div>
                        </div>
                        <div class="note-box">
                            Morning and second shift are separate entries. You may apply for both, but
                            final allocation depends on merit and seat availability.
                        </div>
                    </div>
                </div>

                {{-- Personal --}}
                <div class="faq-item">
                    <button class="faq-q" type="button">
                        <span>Personal Information</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <p>Write these exactly as they appear on your B-Form/CNIC and Matric certificate.</p>
                        <div class="hta-fields">
                            <div class="hta-field"><i class="bi bi-dot"></i> Full name (English &amp; Urdu)</div>
                            <div class="hta-field"><i class="bi bi-dot"></i> Father's name (English &amp; Urdu)</div>
                            <div class="hta-field"><i class="bi bi-dot"></i> Date of birth</div>
                            <div class="hta-field"><i class="bi bi-dot"></i> B-Form / CNIC number</div>
                            <div class="hta-field"><i class="bi bi-dot"></i> Nationality</div>
                            <div class="hta-field"><i class="bi bi-dot"></i> Religion</div>
                            <div class="hta-field"><i class="bi bi-dot"></i> Mother tongue</div>
                            <div class="hta-field"><i class="bi bi-dot"></i> Marital status</div>
                            <div class="hta-field"><i class="bi bi-dot"></i> Father's occupation</div>
                            <div class="hta-field"><i class="bi bi-dot"></i> Two contact numbers</div>
                            <div class="hta-field"><i class="bi bi-dot"></i> Email address</div>
                            <div class="hta-field"><i class="bi bi-dot"></i> Permanent &amp; present address</div>
                        </div>
                    </div>
                </div>

                {{-- Academic --}}
                <div class="faq-item">
                    <button class="faq-q" type="button">
                        <span>Academic Record</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <p>
                            You will name the last class you attended and your previous institution, then
                            record each examination you have passed. Keep your result card in front of you
                            — every column must match it.
                        </p>
                        <div class="table-wrap">
                            <table class="styled-table">
                                <thead>
                                <tr>
                                    <th>Examination</th>
                                    <th>Board / University</th>
                                    <th>Year</th>
                                    <th>Roll No.</th>
                                    <th>Marks Obtained</th>
                                    <th>Total Marks</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><strong>Matric (SSC)</strong></td>
                                    <td>Required</td>
                                    <td>Required</td>
                                    <td>Required</td>
                                    <td>Required</td>
                                    <td>Required</td>
                                </tr>
                                <tr>
                                    <td><strong>Intermediate (HSSC)</strong></td>
                                    <td>BS applicants</td>
                                    <td>BS applicants</td>
                                    <td>BS applicants</td>
                                    <td>BS applicants</td>
                                    <td>BS applicants</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="note-box">
                            Your merit is calculated from the marks you declare here, verified against your
                            attested result card.
                        </div>
                    </div>
                </div>

                {{-- Preferences & additional --}}
                <div class="faq-item">
                    <button class="faq-q" type="button">
                        <span>Subject Preferences &amp; Additional Questions</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <ul class="rule-list">
                            <li>Your optional subject preferences, in order — first, second and third choice.</li>
                            <li>Whether you have applied to any other college for the same session.</li>
                            <li>Whether you have ever been expelled from an institution, with details if so.</li>
                            <li>Guardian's name, relation, contact number and occupation.</li>
                            <li>An emergency contact name and number.</li>
                        </ul>
                        <div class="note-box">
                            Decide your subject preferences before you reach the counter — they are used
                            for allocation and are difficult to change later.
                        </div>
                    </div>
                </div>

                {{-- Declaration --}}
                <div class="faq-item">
                    <button class="faq-q" type="button">
                        <span>Declaration &amp; Signatures</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <p>
                            The form closes with a declaration that every detail you have given is true,
                            that your admission may be cancelled at any time if anything is found to be
                            false, and that you agree to abide by the rules and regulations of the college.
                        </p>
                        <p>
                            It must carry the applicant's signature and the date, and the signature of the
                            father or guardian. The lower portion of the form — form number, class
                            admitted, group and merit entries — is completed by the college office.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ════════════════ DATES & FEE ════════════════ --}}
    <section class="hta-band hta-band-alt" id="dates">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 reveal">
                    <div class="section-eyebrow">Dates &amp; Fee</div>
                    <h2 class="section-h">When things <em>happen.</em></h2>
                    <p class="lead-p mb-0">
                        The admission schedule is set each session. Exact dates and the current fee
                        schedule are announced on the college notice board and published here.
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="table-wrap reveal" style="margin-top: 0;">
                        <table class="styled-table">
                            <thead>
                            <tr><th style="width: 90px;">Stage</th><th>What happens</th></tr>
                            </thead>
                            <tbody>
                            <tr><td><strong>01</strong></td><td>Admission advertisement &amp; issue of forms begins</td></tr>
                            <tr><td><strong>02</strong></td><td>Last date for submission of completed forms</td></tr>
                            <tr><td><strong>03</strong></td><td>Scrutiny of forms and document verification</td></tr>
                            <tr><td><strong>04</strong></td><td>First merit list displayed</td></tr>
                            <tr><td><strong>05</strong></td><td>Fee deposit by selected candidates</td></tr>
                            <tr><td><strong>06</strong></td><td>Subsequent merit lists against vacant seats</td></tr>
                            <tr><td><strong>07</strong></td><td>Classes commence</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="hta-panel reveal reveal-delay-1">
                        <div class="hta-panel-icon"><i class="bi bi-megaphone"></i></div>
                        <h4>Current Session Dates</h4>
                        <p>
                            Admission dates and the fee schedule change every session and are notified
                            officially. For the dates that apply to the 2026–27 session, check the college
                            notice board or our announcements.
                        </p>
                        <div class="hta-step-tags" style="margin-top: 22px;">
                            <a href="{{ route('news.index') }}" class="btn-ghost-c" style="padding: 12px 24px;">
                                View Announcements
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 reveal reveal-delay-2">
                    <div class="note-box">
                        Financial assistance is available. If the fee is a concern, review the
                        <a href="{{ route('scholarships.index') }}" style="color: var(--crimson);">scholarships</a>
                        currently open — several can be applied for online.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ════════════════ FAQ ════════════════ --}}
    <section class="faq-section" id="faq">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 reveal">
                    <div class="section-eyebrow">Common Questions</div>
                    <h2 class="section-h">Asked at the counter, <em>answered here.</em></h2>
                </div>
            </div>

            <div class="faq-wrap reveal reveal-delay-1">

                <div class="faq-item active">
                    <button class="faq-q" type="button">
                        <span>Can I apply online instead of visiting the college?</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <p>
                            Admission forms are collected from and submitted at the college admission
                            office in person, so that your original documents can be verified at the same
                            time. Scholarship applications, however, can be submitted online through our
                            <a href="{{ route('scholarships.index') }}" style="color: var(--crimson);">scholarships</a>
                            section.
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-q" type="button">
                        <span>Can I apply for both the morning and second shift?</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <p>
                            Yes. Students may apply for both shifts where the program is offered in both.
                            Final shift allocation is decided on merit and seat availability, not on
                            preference alone.
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-q" type="button">
                        <span>What happens if I miss the submission deadline?</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <p>
                            Late applications are not entertained. If seats remain vacant after the merit
                            lists are exhausted, any extension in the last date is announced officially —
                            watch the notice board and our announcements rather than assuming an extension.
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-q" type="button">
                        <span>My documents are incomplete. Should I still submit the form?</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <p>
                            An incomplete form will not be processed, so submitting one costs you time
                            rather than saving it. If a document is genuinely unavailable — for example a
                            result card that has not yet been issued — speak to the admission office
                            before the deadline instead of leaving the section blank.
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-q" type="button">
                        <span>My name is spelled differently on two documents. What do I do?</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <p>
                            Resolve it before you apply. Your form, your result card and your B-Form/CNIC
                            must carry the same spelling, because your name is later printed on college
                            records and forwarded to the board or university. Bring the discrepancy to the
                            admission office at the counter.
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-q" type="button">
                        <span>Can I change my group or subjects after admission?</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <p>
                            A change of group or optional subject may be considered on written application,
                            subject to seat availability in the requested group, eligibility for that
                            group, and the deadline set by the board. The final decision rests with the
                            college administration.
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-q" type="button">
                        <span>How do I cancel my admission, and is the fee refunded?</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <p>
                            Submit a written application to the college administration. Refunds are made
                            according to the college and government refund policy: usually the full fee may
                            be refunded before classes begin, and only a portion after that. The final
                            decision regarding a refund rests with the college administration.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ════════════════ GET HELP ════════════════ --}}
    <section class="hta-band hta-band-alt" id="help">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 reveal">
                    <div class="section-eyebrow">Get Help</div>
                    <h2 class="section-h">Stuck somewhere? <em>Ask us.</em></h2>
                    <p class="lead-p mb-0">
                        The admission office is open six days a week through the admission season.
                        Call ahead if you want to confirm what to bring.
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a href="tel:0563783273" class="hta-help-card reveal">
                        <div class="hta-help-ic"><i class="bi bi-telephone"></i></div>
                        <div>
                            <div class="hta-help-lbl">Call the Office</div>
                            <div class="hta-help-val">056 3783273</div>
                            <div class="hta-help-sub">Monday to Saturday, 7:00 AM – 2:00 PM</div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6">
                    <a href="mailto:info@gcwskp.edu.pk" class="hta-help-card reveal reveal-delay-1">
                        <div class="hta-help-ic"><i class="bi bi-envelope"></i></div>
                        <div>
                            <div class="hta-help-lbl">Email Us</div>
                            <div class="hta-help-val">info@gcwskp.edu.pk</div>
                            <div class="hta-help-sub">Include your name and the program you're applying for</div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('contact') }}" class="hta-help-card reveal reveal-delay-2">
                        <div class="hta-help-ic"><i class="bi bi-geo-alt"></i></div>
                        <div>
                            <div class="hta-help-lbl">Visit in Person</div>
                            <div class="hta-help-val">Admission Office</div>
                            <div class="hta-help-sub">Govt. Pir Bahar Shah Graduate College for Women, Sheikhupura — see map &amp; directions</div>
                        </div>
                    </a>
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
                    <h2 class="section-h">You know the process. Now pick your <em>program.</em></h2>
                    <p class="lead-p mb-0">
                        Applications for the 2026–27 session are open. Review the subject combinations
                        and shifts before you collect your form.
                    </p>
                    <p class="hta-cta-note">
                        Applying after Intermediate? See
                        <a href="{{ route('admissions.bachelorofscience') }}">Bachelor of Science admissions</a>.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end reveal reveal-delay-1">
                    <a href="{{ route('admissions.intermediate') }}" class="btn-light-c">
                        Intermediate Admissions
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
