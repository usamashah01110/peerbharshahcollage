@extends('includes.main')

@section('content')

{{-- Hero Banner - Girls College Theme --}}
<div style="position: relative; height: 280px; overflow: hidden;">
    <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=1400&q=80"
         class="w-100 h-100"
         style="object-fit: cover; object-position: center 30%; filter: brightness(0.35) saturate(0.8);"
         alt="Students studying in library">
    <div style="position: absolute; inset: 0; background: linear-gradient(135deg, rgba(180,30,30,0.75) 0%, rgba(220,80,80,0.55) 100%);"></div>
    <div style="position: absolute; inset: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 10px;">
        <div style="width: 48px; height: 2px; background: #ffcccc; margin-bottom: 4px;"></div>
        <h1 style="color: #ffffff; font-size: 2.4rem; font-weight: 700; letter-spacing: 8px; margin: 0; text-align: center;">STUDENT LIFE</h1>
        <div style="display: flex; align-items: center; gap: 8px; margin-top: 2px;">
            <div style="width: 24px; height: 1px; background: #ffcccc;"></div>
            <p style="color: #ffcccc; font-size: 0.78rem; margin: 0; letter-spacing: 3px; font-weight: 600;">GIRLS COLLEGE</p>
            <div style="width: 24px; height: 1px; background: #ffcccc;"></div>
        </div>
        <div style="width: 48px; height: 2px; background: #ffcccc; margin-top: 4px;"></div>
        <p style="color: rgba(255,220,220,0.85); font-size: 0.8rem; margin: 8px 0 0; letter-spacing: 1px;">Home &rsaquo; Student Life</p>
    </div>
</div>

{{-- ===== MAIN CONTENT CONTAINER ===== --}}
<div class="container py-5">

    {{-- COLLEGE UNIFORM --}}
    <div class="row align-items-center mb-5">
        <div class="col-md-5">
            <div style="overflow: hidden; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.15);">
                <img src="/images/uniform.jpg"
                     class="img-fluid"
                     onerror="this.src='https://images.unsplash.com/photo-1571260899304-425eee4c7efc?w=500&q=80'"
                     alt="Girls Studying"
                     style="
                         width: 100%;
                         height: 400px;
                         object-fit: cover;
                         object-position: center top;
                         transition: transform 0.5s ease;
                         display: block;
                     "
                     onmouseover="this.style.transform='scale(1.08)'"
                     onmouseout="this.style.transform='scale(1)'">
            </div>
        </div>
        <div class="col-md-7">
            <h4 class="fw-bold mb-2">College Uniform</h4>
            <hr style="width: 50px; border: 2px solid #c0392b; opacity:1; margin-left:0;">
            <p class="text-muted">
                A prescribed uniform is mandatory for all students. They must wear a white shalwar kameez
                with a colored cotton dupatta corresponding to their academic year. Shoes must be closed
                black shoes. Any violation of the uniform code will result in a fine. During winter, a black
                sweater and black shawl are compulsory, with no embroidery or other colors allowed.
                Black jackets and black half coats are permitted. Any makeup or jewelry will be confiscated
                if worn in college.
            </p>
        </div>
    </div>

    {{-- Dupatta Color Chart --}}
    <h5 class="text-center fw-bold mb-3">College Uniform Dupatta Color Chart</h5>
    <div class="table-responsive mb-5">
        <table class="table table-bordered text-center" style="max-width: 650px; margin: 0 auto;">
            <thead style="background:#c0392b; color:white;">
                <tr>
                    <th>Class/Shift</th>
                    <th>Dupatta Color</th>
                    <th>Sample Color</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1st Year (Arts)</td>
                    <td>Maroon</td>
                    <td><span style="display:inline-block;width:20px;height:20px;background:#800000;border-radius:50%;"></span></td>
                </tr>
                <tr>
                    <td>1st Year (Science)</td>
                    <td>Yellow</td>
                    <td><span style="display:inline-block;width:20px;height:20px;background:#f1c40f;border-radius:50%;"></span></td>
                </tr>
                <tr>
                    <td>2nd Year (Arts)</td>
                    <td>Blue</td>
                    <td><span style="display:inline-block;width:20px;height:20px;background:#2980b9;border-radius:50%;"></span></td>
                </tr>
                <tr>
                    <td>2nd Year (Science)</td>
                    <td>Sky Blue</td>
                    <td><span style="display:inline-block;width:20px;height:20px;background:#85c1e9;border-radius:50%;"></span></td>
                </tr>
                <tr>
                    <td>Second Shift</td>
                    <td>Orange</td>
                    <td><span style="display:inline-block;width:20px;height:20px;background:#e67e22;border-radius:50%;"></span></td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- ===== CO-CURRICULAR ACTIVITIES ===== --}}
    <h4 class="text-center fw-bold mb-2">Co-Curricular Activities</h4>
    <hr style="width: 50px; border: 2px solid #c0392b; opacity:1; margin: 0 auto 1.5rem;">
    <ul class="text-muted mb-4" style="max-width: 750px; margin: 0 auto;">
        <li class="mb-2">Co-curricular activities are essential for the balanced development of students. The college provides facilities for such activities.</li>
        <li class="mb-2">These activities help shape student personalities and create proper social awareness, which is an important goal of education.</li>
        <li class="mb-2">To offer variety, the college has various societies so that students can participate according to their own interests and preferences, thereby nurturing their abilities.</li>
    </ul>

    {{-- Societies Table --}}
    <div class="table-responsive mb-5">
        <table class="table table-bordered" style="max-width: 650px; margin: 0 auto;">
            <thead style="background:#c0392b; color:white;">
                <tr>
                    <th>No.</th>
                    <th>Name of Society</th>
                    <th>No.</th>
                    <th>Name of Society</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>1</td><td>Islamic Society</td><td>6</td><td>Urdu Literary Society</td></tr>
                <tr><td>2</td><td>English Literary Society</td><td>7</td><td>Science Society</td></tr>
                <tr><td>3</td><td>Qasida-Naim Society</td><td>8</td><td>Girl Guides Society</td></tr>
                <tr><td>4</td><td>Punjab Debates Society</td><td>9</td><td>—</td></tr>
            </tbody>
        </table>
    </div>

    {{-- ===== SPORTS AND PHYSICAL TRAINING ===== --}}
    <h4 class="text-center fw-bold mb-2">Sports and Physical Training</h4>
    <hr style="width: 50px; border: 2px solid #c0392b; opacity:1; margin: 0 auto 1.5rem;">
    <div class="text-center mb-3">
        <img src="/images/sports.jpg" class="img-fluid rounded shadow" style="max-height: 220px; object-fit: cover; width: 100%;"
             onerror="this.src='https://images.unsplash.com/photo-1526676037777-05a232554f77?w=900&q=80'"
             alt="Sports & Physical Training">
    </div>
    <ul class="text-muted mb-5" style="max-width: 750px; margin: 0 auto;">
        <li class="mb-2">Proper arrangements are available for badminton, volleyball, hockey, and tennis.</li>
        <li class="mb-2">The college team participates in competitions and tournaments organized by the Lahore Board, Punjab University, and other cities.</li>
    </ul>

    {{-- ===== LIBRARY RULES ===== --}}
    <div class="row mb-5">
        <div class="col-md-6">
            <h4 class="fw-bold mb-2">Library Rules</h4>
            <hr style="width: 50px; border: 2px solid #c0392b; opacity:1; margin-left:0;">
            <ul class="text-muted small">
                <li class="mb-1">Students may borrow <strong>only two books</strong> at a time for <strong>14 days</strong>.</li>
                <li class="mb-1">A fine of <strong>Rs. 2 per day per book</strong> will be charged for late returns.</li>
                <li class="mb-1">A <strong>library card</strong> will be issued upon admission; each student must have her student photograph.</li>
                <li class="mb-1">The following materials are for <strong>library reading only</strong>:
                    <ul>
                        <li>Reference books</li>
                        <li>Current issues of magazines</li>
                    </ul>
                </li>
                <li class="mb-1">In case of <strong>loss or damage</strong> of a book, the student must pay <strong>double the price</strong>, along with service and binding charges.</li>
                <li class="mb-1">To claim the security deposit, the following <strong>original documents</strong> are required:
                    <ul>
                        <li>Library card</li>
                        <li>College identity card</li>
                        <li>Fee receipt submitted to the college</li>
                    </ul>
                </li>
                <li class="mb-1">Without the above documents, <strong>security will not be refunded</strong>.</li>
            </ul>
        </div>
        <div class="col-md-6">
            <div class="card border p-4 h-100" style="border-color: #c0392b !important;">
                <h6 class="fw-bold text-center" style="color:#c0392b;">Message from The Librarian</h6>
                <p class="text-muted small">
                    The library plays a vital role in supporting the academic mission of Government Graduate College for Women. It is a treasure house of knowledge. Our library consists of more than 12 thousand books covering all the subjects taught in the college. It operates online for BS Hons students according to their courses. We offer easy access to reading and self-development. Library books can be easily found because all the books are arranged and classified subject-wise. Our library remains open during the college timings. Library staff is available to assist students in finding the books according to their need.
                </p>
                <div class="text-center mt-2">
                    <div style="width:55px;height:55px;border-radius:50%;background:#eee;margin:0 auto 5px;overflow:hidden;">
                        <img src="/images/librarian.jpg" class="w-100 h-100" style="object-fit:cover;" onerror="this.style.display='none'">
                    </div>
                    <small class="fw-bold" style="color:#c0392b;">Miss RAHILA ZAHOOR</small><br>
                    <small class="text-muted">Librarian</small>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== GENERAL DISCIPLINE ===== --}}
    <h4 class="text-center fw-bold mb-2">General Discipline</h4>
    <hr style="width: 50px; border: 2px solid #c0392b; opacity:1; margin: 0 auto 1.5rem;">
    <div class="text-center mb-4">
        <img src="/images/discipline.jpg" class="img-fluid rounded shadow" style="max-height: 200px; object-fit: cover; width: 100%;"
             onerror="this.src='https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=1200&q=80'"
             alt="General Discipline">
    </div>

    {{-- Fines Table --}}
    <h5 class="fw-bold text-center mb-3" style="color:#c0392b;">Fines / Penalties</h5>
    <div class="table-responsive mb-5">
        <table class="table table-bordered text-center" style="max-width: 500px; margin: 0 auto;">
            <thead style="background:#c0392b; color:white;">
                <tr>
                    <th>Violation</th>
                    <th>Fine (Rs.)</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Late Arrival</td><td>100</td></tr>
                <tr><td>Absence without Permission</td><td>150</td></tr>
                <tr><td>Violation of Rules / Misconduct</td><td>200 – 500</td></tr>
                <tr><td>Serious Offense</td><td>Up to 1,000</td></tr>
            </tbody>
        </table>
    </div>

    {{-- Rules in two columns --}}
    <div class="row">
        <div class="col-md-6">
            <h6 class="fw-bold mb-2" style="color:#c0392b;">Rules & Instructions</h6>
            <ul class="text-muted small">
                <li class="mb-2">All students must strictly follow the rules and regulations of the institution.</li>
                <li class="mb-2">Students must respect teachers, staff, and fellow students at all times.</li>
                <li class="mb-2">Students must come to college on time and in proper uniform.</li>
                <li class="mb-2">Attendance is compulsory; shortage may lead to disciplinary action.</li>
                <li class="mb-2">Mobile phones are not allowed during class hours.</li>
                <li class="mb-2">Students must maintain cleanliness in classrooms and on campus.</li>
                <li class="mb-2">Any damage to college property will result in a fine.</li>
                <li class="mb-2">College gate closes at 8:00 AM in summer and 8:30 AM in winter.</li>
                <li class="mb-2">Students cannot leave college during class hours without the Principal's permission.</li>
            </ul>
        </div>
        <div class="col-md-6">
            <h6 class="fw-bold mb-2" style="color:#c0392b;">Additional Rules</h6>
            <ul class="text-muted small">
                <li class="mb-2">Students must carry their ID cards daily.</li>
                <li class="mb-2">Cheating in exams is strictly prohibited.</li>
                <li class="mb-2">Late submission of assignments may result in marks deduction.</li>
                <li class="mb-2">Mobile phones, cameras, or tape recorders are strictly prohibited.</li>
                <li class="mb-2">Abusive or objectionable slogans on bags are not allowed.</li>
                <li class="mb-2">Students must not bring any outside food to college.</li>
                <li class="mb-2">Organizing beauty contests or unauthorized meetings is strictly prohibited.</li>
                <li class="mb-2">Participation in college activities is encouraged.</li>
                <li class="mb-2">The Principal has full authority to fine or expel any student who violates college rules.</li>
            </ul>
        </div>
    </div>

</div> {{-- END container --}}

@endsection