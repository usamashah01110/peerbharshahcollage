<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
        <div class="sidebar-brand-text mx-3">Pir Bahar Shah</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span>
        </a>
    </li>

    <div class="sidebar-heading">Academics</div>

    <li class="nav-item"><a class="nav-link" href="{{ route('admin.departments.index') }}"><i class="fas fa-building"></i><span>Departments</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.academic-sessions.index') }}"><i class="fas fa-calendar-alt"></i><span>Academic Sessions</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.teachers.index') }}"><i class="fas fa-chalkboard-teacher"></i><span>Teachers</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.programs.index') }}"><i class="fas fa-book"></i><span>Programs</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.semesters.index') }}"><i class="fas fa-layer-group"></i><span>Semesters</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.subjects.index') }}"><i class="fas fa-book-open"></i><span>Subjects</span></a></li>

    <div class="sidebar-heading">Assignments</div>

    <li class="nav-item"><a class="nav-link" href="{{ route('admin.teacher-subject-assignments.index') }}"><i class="fas fa-link"></i><span>Teacher-Subject</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.teacher-programs.index') }}"><i class="fas fa-link"></i><span>Teacher-Program</span></a></li>

    <div class="sidebar-heading">Admissions</div>

    <li class="nav-item"><a class="nav-link" href="{{ route('admin.admission-applications.index') }}"><i class="fas fa-file-signature"></i><span>Applications</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.application-documents.index') }}"><i class="fas fa-file-upload"></i><span>App Documents</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.application-qualifications.index') }}"><i class="fas fa-graduation-cap"></i><span>App Qualifications</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.students.index') }}"><i class="fas fa-user-graduate"></i><span>Students</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.admissions.index') }}"><i class="fas fa-clipboard-check"></i><span>Admissions</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.merit-lists.index') }}"><i class="fas fa-list-ol"></i><span>Merit Lists</span></a></li>

    <div class="sidebar-heading">Scholarships</div>

    <li class="nav-item"><a class="nav-link" href="{{ route('admin.scholarships.index') }}"><i class="fas fa-award"></i><span>Scholarships</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.scholarship-applications.index') }}"><i class="fas fa-file-alt"></i><span>Scholarship Applications</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.scholarship-application-documents.index') }}"><i class="fas fa-file-upload"></i><span>Scholarship Documents</span></a></li>

    <div class="sidebar-heading">Content</div>

    <li class="nav-item"><a class="nav-link" href="{{ route('admin.course-outlines.index') }}"><i class="fas fa-scroll"></i><span>Course Outlines</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.news-events.index') }}"><i class="fas fa-newspaper"></i><span>News &amp; Events</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.materials.index') }}"><i class="fas fa-folder"></i><span>Materials</span></a></li>

</ul>
