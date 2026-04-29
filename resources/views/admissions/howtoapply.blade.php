@extends('includes.main')

@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap');

body {
    background: #f7f6f6;
    font-family: 'Poppins', sans-serif;
}

/* HERO */
.hero {
    text-align: center;
    padding: 70px 20px 30px;
    background: linear-gradient(135deg, #fff5f5, #ffffff);
    border-bottom: 2px solid #f0dede;
}
.hero h1 {
    font-weight: 900;
    color: #4a1c1c;
    font-size: 2.4rem;
    margin-bottom: 10px;
}
.hero p {
    max-width: 680px;
    margin: 0 auto;
    color: #6b4b4b;
    font-size: 1rem;
}

/* BANNER IMAGE */
.hero-banner {
    position: relative;
    width: 100%;
    height: 340px;
    overflow: hidden;
}
.hero-banner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 30%;
    display: block;
}
.hero-banner-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to bottom,
        rgba(74,28,28,0.18) 0%,
        rgba(74,28,28,0.55) 100%
    );
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10px;
}
.hero-banner-overlay .badge-row {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    justify-content: center;
}
.hero-banner-overlay .badge-pill {
    background: rgba(255,255,255,0.18);
    border: 1.5px solid rgba(255,255,255,0.5);
    color: #fff;
    padding: 6px 18px;
    border-radius: 30px;
    font-size: 0.82rem;
    font-weight: 600;
    backdrop-filter: blur(4px);
}
.hero-banner-overlay h2 {
    color: #fff;
    font-weight: 900;
    font-size: 2rem;
    margin: 0;
    text-shadow: 0 2px 12px rgba(0,0,0,0.35);
    letter-spacing: -0.5px;
}
.hero-banner-overlay p {
    color: rgba(255,255,255,0.88);
    font-size: 0.95rem;
    margin: 0;
    text-shadow: 0 1px 6px rgba(0,0,0,0.3);
}

/* SECTION */
.section { padding: 50px 0; }

/* TITLE */
.section-title {
    font-size: 30px;
    font-weight: 800;
    text-align: center;
    margin-bottom: 35px;
    color: #4a1c1c;
    position: relative;
}
.section-title::after {
    content: '';
    width: 65px;
    height: 4px;
    background: #7a1f1f;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    bottom: -10px;
    border-radius: 10px;
}

/* FAQ ACCORDION */
.faq-item {
    background: #fff;
    border: 1px solid #f0dede;
    border-radius: 14px;
    margin-bottom: 10px;
    overflow: hidden;
    transition: box-shadow 0.3s;
}
.faq-item:hover { box-shadow: 0 6px 20px rgba(122,31,31,0.09); }

.faq-question {
    width: 100%;
    background: none;
    border: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 18px 22px;
    font-family: 'Poppins', sans-serif;
    font-size: 0.97rem;
    font-weight: 700;
    color: #4a1c1c;
    cursor: pointer;
    text-align: left;
    transition: background 0.2s;
}
.faq-question:hover { background: #fff5f5; }
.faq-question.open { background: #fff5f5; color: #7a1f1f; }

.faq-icon {
    width: 28px;
    height: 28px;
    background: #7a1f1f;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 1rem;
    font-weight: 700;
    transition: transform 0.3s;
}
.faq-question.open .faq-icon { transform: rotate(45deg); }

.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.45s ease, padding 0.3s ease;
    padding: 0 22px;
}
.faq-answer.open { max-height: 3000px; padding: 0 22px 22px; }

.faq-answer-inner {
    border-top: 1px solid #f0dede;
    padding-top: 16px;
    color: #555;
    font-size: 0.9rem;
    line-height: 1.7;
}

/* STEPS */
.step { display: flex; gap: 13px; margin-bottom: 13px; align-items: flex-start; }
.step-number {
    width: 36px; height: 36px;
    background: #7a1f1f; color: #fff;
    font-weight: 700; border-radius: 50%;
    display: flex; justify-content: center; align-items: center;
    flex-shrink: 0; font-size: 0.88rem;
}
.step p { margin: 0; padding-top: 7px; color: #444; }

/* INNER CARDS */
.faq-cards { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
@media(max-width:600px){ .faq-cards { grid-template-columns: 1fr; } }
.faq-inner-card {
    background: #fff5f5; border: 1px solid #f0dede;
    border-radius: 12px; padding: 18px;
}
.faq-inner-card h6 { font-weight: 700; color: #4a1c1c; margin-bottom: 10px; }
.faq-inner-card ul { padding-left: 16px; margin: 0; }
.faq-inner-card ul li { margin-bottom: 5px; }

/* FORM */
.form-header-faq { text-align: center; margin-bottom: 20px; }
.form-header-faq h5 { font-size: 1rem; font-weight: 800; color: #4a1c1c; margin: 0 0 4px; }
.form-header-faq p { color: #7a1f1f; font-weight: 600; font-size: 0.85rem; margin: 0; }

.program-badges { display: flex; flex-wrap: wrap; gap: 7px; justify-content: center; margin-bottom: 18px; }
.program-badge {
    background: #fff5f5; border: 1px solid #e8c5c5; color: #7a1f1f;
    padding: 4px 13px; border-radius: 20px; font-size: 0.8rem; font-weight: 600;
}

.form-divider { border: none; border-top: 1px solid #f0dede; margin: 14px 0; }

.field-section-label {
    font-size: 0.78rem; font-weight: 700; color: #7a1f1f;
    text-transform: uppercase; letter-spacing: 0.05em;
    margin: 18px 0 10px; border-left: 3px solid #7a1f1f; padding-left: 8px;
}

.form-label { font-weight: 600; color: #4a1c1c; font-size: 0.84rem; margin-bottom: 4px; }
.form-control, .form-select {
    border: 1px solid #e8c5c5; border-radius: 10px;
    padding: 8px 12px; font-size: 0.86rem; color: #333;
    background: #fff; transition: border-color 0.2s, box-shadow 0.2s; width: 100%;
}
.form-control:focus, .form-select:focus {
    border-color: #7a1f1f; box-shadow: 0 0 0 3px rgba(122,31,31,0.1); outline: none;
}

.photo-box {
    width: 95px; height: 110px; border: 2px dashed #e8c5c5; border-radius: 10px;
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    color: #b07070; font-size: 0.72rem; text-align: center;
    background: #fff5f5; float: right; margin-left: 12px; margin-bottom: 8px;
}
.photo-box span { font-size: 1.5rem; display: block; margin-bottom: 4px; }

.exam-table { width: 100%; border-collapse: collapse; font-size: 0.8rem; margin-top: 6px; }
.exam-table th { background: #7a1f1f; color: #fff; padding: 7px 9px; text-align: center; font-weight: 600; }
.exam-table td { border: 1px solid #f0dede; padding: 7px 8px; text-align: center; color: #555; }
.exam-table tr:nth-child(even) td { background: #fff8f8; }
.exam-table .form-control { padding: 5px 7px; font-size: 0.78rem; }

.declaration-box {
    background: #fff5f5; border: 1px solid #f0dede; border-radius: 10px;
    padding: 14px 18px; font-size: 0.82rem; color: #555; line-height: 1.7;
}

.btn-apply {
    background: #7a1f1f; color: #fff; border: none;
    padding: 11px 34px; border-radius: 12px; font-weight: 700;
    font-size: 0.93rem; cursor: pointer; transition: background 0.2s, transform 0.2s;
}
.btn-apply:hover { background: #5c1515; transform: translateY(-2px); }

/* FADE */
.fade { opacity: 0; transform: translateY(34px); transition: 0.6s ease; }
.fade.show { opacity: 1; transform: translateY(0); }
</style>

<!-- HERO -->
<div class="hero fade">
    <h1>How to Apply</h1>
    <p>Our admission process is simple and transparent. Browse the sections below to find everything you need.</p>
</div>

<!-- BANNER IMAGE -->
<div class="hero-banner fade">
    <img
        src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=1400&q=80&auto=format&fit=crop"
        alt="College students admission"
        onerror="this.src='https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1400&q=80&auto=format&fit=crop'"
    >
    <div class="hero-banner-overlay">
        <h2>Begin Your Academic Journey</h2>
        <p>Govt. Peer Bahar Shah Graduate College for Women, Sheikhupura</p>
        <div class="badge-row">
            <span class="badge-pill">🎓 Merit-Based</span>
            <span class="badge-pill">📋 Simple Process</span>
            <span class="badge-pill">✅ Transparent Admission</span>
        </div>
    </div>
</div>

<!-- FAQ -->
<div class="container section fade">
    <div class="section-title">Admission Guide</div>

    <!-- 1. STEPS -->
    <div class="faq-item">
        <button class="faq-question" onclick="toggleFaq(this)">
            <span>📋 &nbsp; What are the Admission Steps?</span>
            <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
            <div class="faq-answer-inner">
                <div class="step"><div class="step-number">1</div><p>Collect the admission form from the admission office or download it from the online portal.</p></div>
                <div class="step"><div class="step-number">2</div><p>Carefully fill in the form with your personal and academic details.</p></div>
                <div class="step"><div class="step-number">3</div><p>Attach all required documents (CNIC/B-Form, result card, passport-size photos).</p></div>
                <div class="step"><div class="step-number">4</div><p>Submit the completed form to the admission office or via the online portal.</p></div>
                <div class="step"><div class="step-number">5</div><p>Wait for the merit list to be announced.</p></div>
                <div class="step"><div class="step-number">6</div><p>After selection, submit the fee to confirm your admission.</p></div>
            </div>
        </div>
    </div>

    <!-- 2. REQUIREMENTS -->
    <div class="faq-item">
        <button class="faq-question" onclick="toggleFaq(this)">
            <span>📄 &nbsp; What Documents & Rules are Required?</span>
            <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
            <div class="faq-answer-inner">
                <div class="faq-cards">
                    <div class="faq-inner-card">
                        <h6>📄 Documents Required</h6>
                        <ul class="text-muted">
                            <li>CNIC / B-Form (original & copy)</li>
                            <li>Matric / Intermediate Result Card</li>
                            <li>4 Passport Size Photographs</li>
                            <li>Domicile Certificate (if applicable)</li>
                        </ul>
                    </div>
                    <div class="faq-inner-card">
                        <h6>⚠️ Important Rules</h6>
                        <ul class="text-muted">
                            <li>Incomplete forms will be rejected</li>
                            <li>Late submissions will not be accepted</li>
                            <li>Admission is strictly merit-based</li>
                            <li>Providing false information will result in cancellation</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. ADMISSION FORM -->
    <div class="faq-item">
        <button class="faq-question" onclick="toggleFaq(this)">
            <span>📝 &nbsp; Fill & Submit the Admission Form</span>
            <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
            <div class="faq-answer-inner">

                <div class="form-header-faq">
                    <h5>Govt. Peer Bahar Shah Graduate College for Women, Sheikhupura</h5>
                    <p>Application for Admission — Academic Year ___________</p>
                </div>

                <p class="text-muted text-center mb-2" style="font-size:0.82rem;">Select Program:</p>
                <div class="program-badges">
                    <span class="program-badge">FA</span>
                    <span class="program-badge">FSc</span>
                    <span class="program-badge">ICS</span>
                    <span class="program-badge">I.Com</span>
                    <span class="program-badge">BS (General Science)</span>
                    <span class="program-badge">BS (Home Economics)</span>
                    <span class="program-badge">BS (Physical Education)</span>
                    <span class="program-badge">BS (Urdu)</span>
                </div>

                <hr class="form-divider">

                <form>
                    <div class="photo-box">
                        <span>📷</span>
                        Paste Photo Here
                    </div>

                    <div class="field-section-label">Personal Information</div>
                    <div class="row g-3" style="clear:both;">
                        <div class="col-md-6">
                            <label class="form-label">01. Full Name (Urdu)</label>
                            <input type="text" class="form-control" placeholder="Enter full name in Urdu">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">02. Father's Name (Urdu)</label>
                            <input type="text" class="form-control" placeholder="Enter father's name in Urdu">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">03. Date of Birth</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Numbers</label>
                            <div class="row g-2">
                                <div class="col-6"><input type="text" class="form-control" placeholder="Phone (i)"></div>
                                <div class="col-6"><input type="text" class="form-control" placeholder="Phone (ii)"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">04. Nationality</label>
                            <input type="text" class="form-control" placeholder="e.g. Pakistani">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Mother Tongue</label>
                            <input type="text" class="form-control" placeholder="e.g. Urdu, Punjabi">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Religion</label>
                            <input type="text" class="form-control" placeholder="e.g. Islam">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">05. Marital Status</label>
                            <select class="form-select">
                                <option value="">-- Select --</option>
                                <option>Single</option>
                                <option>Married</option>
                                <option>Divorced</option>
                                <option>Widow</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Father's Occupation</label>
                            <input type="text" class="form-control" placeholder="Father's occupation">
                        </div>
                        <div class="col-12">
                            <label class="form-label">06. Permanent Address</label>
                            <input type="text" class="form-control" placeholder="Full permanent address">
                        </div>
                    </div>

                    <div class="field-section-label">Academic Information</div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">07. Last Class Attended</label>
                            <input type="text" class="form-control" placeholder="e.g. Matric, FA, FSc">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Previous College / School Name</label>
                            <input type="text" class="form-control" placeholder="Name of last institution">
                        </div>
                    </div>

                    <div class="field-section-label">Previous Examination Record</div>
                    <div class="table-responsive">
                        <table class="exam-table">
                            <thead>
                                <tr>
                                    <th>Examination</th>
                                    <th>Board / University</th>
                                    <th>Year</th>
                                    <th>Roll No.</th>
                                    <th>Grade</th>
                                    <th>Marks Obtained</th>
                                    <th>Total Marks</th>
                                    <th>Certificate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Matric (SSC)</td>
                                    <td><input type="text" class="form-control" placeholder="Board"></td>
                                    <td><input type="text" class="form-control" placeholder="Year"></td>
                                    <td><input type="text" class="form-control" placeholder="Roll No."></td>
                                    <td><input type="text" class="form-control" placeholder="Grade"></td>
                                    <td><input type="text" class="form-control" placeholder="Obtained"></td>
                                    <td><input type="text" class="form-control" placeholder="Total"></td>
                                    <td style="text-align:center;"><input type="checkbox"></td>
                                </tr>
                                <tr>
                                    <td>Intermediate (HSSC)</td>
                                    <td><input type="text" class="form-control" placeholder="Board"></td>
                                    <td><input type="text" class="form-control" placeholder="Year"></td>
                                    <td><input type="text" class="form-control" placeholder="Roll No."></td>
                                    <td><input type="text" class="form-control" placeholder="Grade"></td>
                                    <td><input type="text" class="form-control" placeholder="Obtained"></td>
                                    <td><input type="text" class="form-control" placeholder="Total"></td>
                                    <td style="text-align:center;"><input type="checkbox"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="field-section-label">Additional Information</div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">10. Have you applied to any other college?</label>
                            <select class="form-select">
                                <option value="">-- Select --</option>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">11. Preference Order for Subjects</label>
                            <div class="row g-2">
                                <div class="col-4"><input type="text" class="form-control" placeholder="1st"></div>
                                <div class="col-4"><input type="text" class="form-control" placeholder="2nd"></div>
                                <div class="col-4"><input type="text" class="form-control" placeholder="3rd"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">12. Permanent Address (Complete)</label>
                            <textarea class="form-control" rows="2" placeholder="House No., Street, Mohalla, City, District"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">13. Have you been expelled from any institution?</label>
                            <select class="form-select">
                                <option value="">-- Select --</option>
                                <option>No</option>
                                <option>Yes (provide details below)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">If yes, reason / details</label>
                            <input type="text" class="form-control" placeholder="Provide details if applicable">
                        </div>
                    </div>

                    <div class="field-section-label">Declaration</div>
                    <div class="declaration-box mb-4">
                        I hereby declare that all the information provided in this form is true and correct to the best of my knowledge. I understand that if any information is found to be false or incorrect, my admission may be cancelled at any time. I agree to abide by the rules and regulations of Govt. Peer Bahar Shah Graduate College for Women, Sheikhupura.
                        <br><br>
                        <div class="row">
                            <div class="col-6"><strong>Applicant's Signature:</strong> _______________________</div>
                            <div class="col-6 text-end"><strong>Date:</strong> _______________________</div>
                        </div>
                    </div>

                    <div class="field-section-label">For Office Use Only</div>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Form No.</label>
                            <input type="text" class="form-control" disabled placeholder="____">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Class Admitted</label>
                            <input type="text" class="form-control" disabled placeholder="____">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Group</label>
                            <input type="text" class="form-control" disabled placeholder="____">
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn-apply">Submit Application</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- 4. NEED HELP -->
    <div class="faq-item">
        <button class="faq-question" onclick="toggleFaq(this)">
            <span>🙋 &nbsp; Need Help with Admission?</span>
            <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
            <div class="faq-answer-inner">
                <p>If you have any questions or face difficulties during the admission process, please visit the admission office or contact the help desk directly.</p>
                <div class="text-center mt-3">
                    <button class="btn-apply">Contact Admission Office</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function toggleFaq(btn) {
        const answer = btn.nextElementSibling;
        const isOpen = answer.classList.contains('open');
        document.querySelectorAll('.faq-answer').forEach(a => a.classList.remove('open'));
        document.querySelectorAll('.faq-question').forEach(q => q.classList.remove('open'));
        if (!isOpen) {
            answer.classList.add('open');
            btn.classList.add('open');
        }
    }

    const fadeEls = document.querySelectorAll('.fade');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => { if (entry.isIntersecting) entry.target.classList.add('show'); });
    }, { threshold: 0.1 });
    fadeEls.forEach(el => observer.observe(el));
</script>

@endsection