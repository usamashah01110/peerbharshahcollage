<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pir Bahar Shah</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.departments.index') }}">
            <i class="fas fa-building"></i>
            <span>Departments</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.academic-sessions.index') }}">
            <i class="fas fa-building"></i>
            <span>Admission Session</span>
        </a>
    </li>
    <!-- Programs -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.programs.index') }}">
            <i class="fas fa-book"></i>
            <span>Programs</span>
        </a>
    </li>
     <!-- Semesters -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.semesters.index') }}">
            <i class="fas fa-book"></i>
            <span>Semesters</span>
        </a>
    </li>
     <!-- Subjects -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.subjects.index') }}">
            <i class="fas fa-book"></i>
            <span>Subjects</span>
        </a>
    </li>
        <!-- Admissionapplications -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.admissionapplications.index') }}">
            <i class="fas fa-book"></i>
            <span>Admissionapplications</span>
        </a>
    </li>
         <!-- Application Qualification -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.applicationqualifications.index') }}">
            <i class="fas fa-book"></i>
            <span>Application Qualification</span>
        </a>
    </li>
    <!-- Students -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.students.index') }}">
            <i class="fas fa-user-graduate"></i>
            <span>Students</span>
        </a>
    </li>
    <!-- Scholarships -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.scholarships.index') }}">
            <i class="fas fa-award"></i>
            <span>Scholarships</span>
        </a>
    </li>
    <!-- Teachers -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.teachers.index') }}">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Teachers</span>
        </a>
    </li>
    <!-- Merit Lists -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.merit_lists.index') }}">
            <i class="fas fa-list"></i>
            <span>Merit Lists</span>
        </a>
    </li>
    <!-- Scholarship Applications -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.scholarship_applications.index') }}">
            <i class="fas fa-file-alt"></i>
            <span>Scholarship Applications</span>
        </a>
    </li>

    <!-- Materials -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.materials.index') }}">
            <i class="fas fa-folder"></i>
            <span>Materials</span>
        </a>
    </li>
    <!-- Course Outlines -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.courseoutlines.index') }}">
            <i class="fas fa-book-open"></i>
            <span>Course Outlines</span>
        </a>
    </li>
     <!-- News Events -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.newsevents.index') }}">
            <i class="fas fa-book-open"></i>
            <span>News Events</span>
        </a>
    </li>
</ul>

<!-- End of Sidebar -->
