<!-- ════════════════ TOP BAR ════════════════ -->
<div class="top-bar">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
      <div class="d-flex gap-3 align-items-center">
        <span><i class="bi bi-telephone-fill me-1"></i> <a href="tel:0563783273">056 3783273</a></span>
        <span><i class="bi bi-envelope-fill me-1"></i> <a href="mailto:info@gpbsc.edu.pk">info@gpbsc.edu.pk</a></span>
      </div>
      <div class="top-right d-flex align-items-center">
        <a href="#">Faculty &amp; Staffs</a>
        <a href="#">News &amp; Events</a>
        <a href="#">Staff Merit Lists</a>
        <a href="#" class="ms-3"><i class="bi bi-search"></i></a>
      </div>
    </div>
  </div>
</div>

<!-- ════════════════ MAIN NAVBAR ════════════════ -->
<nav class="main-nav navbar navbar-expand-lg sticky-top">
  <div class="container">

    <!-- LOGO -->
    <a class="navbar-brand d-flex align-items-center gap-2 text-decoration-none" href="{{ route('home') }}">
      <div class="brand-text">
        <div class="name">Govt. Pir Bahar Shah Graduate College for Women</div>
        <div class="name" style="font-size:.85rem;">Sheikhupura</div>
        <div class="sub">Since 2002</div>
      </div>
    </a>

    <!-- TOGGLER -->
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- MENU -->
    <div class="collapse navbar-collapse justify-content-end" id="mainNav">
      <ul class="navbar-nav align-items-lg-center">

        <!-- HOME -->
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
            Home
          </a>
        </li>

        <!-- ABOUT -->
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
            About Us
          </a>
        </li>

        <!-- ADMISSIONS -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            Admissions
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('admissions.intermediate') }}">Intermediate</a></li>
            <li><a class="dropdown-item" href="{{ route('admissions.bs') }}">Bachelor of Science</a></li>
            <li><a class="dropdown-item" href="{{ route('admissions.howtoapply') }}">How to Apply</a></li>
          </ul>
        </li>

        <!-- PROGRAMS -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            Programs & Curriculum
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('pre.medical') }}">Pre-Medical</a></li>
            <li><a class="dropdown-item" href="{{ route('pre.engineering') }}">Pre-Engineering</a></li>
            <li><a class="dropdown-item" href="{{ route('arts') }}">Arts</a></li>
            <li><a class="dropdown-item" href="{{ route('commerce') }}">Commerce</a></li>
            <li><a class="dropdown-item" href="{{ route('bs.programs') }}">BS Programs</a></li>
            <li><a class="dropdown-item" href="{{ route('general.science') }}">General Science</a></li>
          </ul>
        </li>

        <!-- STUDENT LIFE -->
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('studentlife') ? 'active' : '' }}" href="{{ route('studentlife') }}">
            Student Life
          </a>
        </li>

        <!-- CONTACT -->
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
            Contact
          </a>
        </li>

        <!-- AUTH -->
        <li class="nav-item">
          <a class="btn btn-crimson ms-lg-3" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-crimson ms-2" href="{{ route('register') }}">Register</a>
        </li>

      </ul>
    </div>
  </div>
</nav>