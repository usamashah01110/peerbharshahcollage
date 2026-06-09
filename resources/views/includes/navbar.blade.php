<!-- ════════════════ TOP BAR ════════════════ -->
<div class="announce-bar">
    <div class="container d-flex justify-content-between align-items-center flex-wrap">
        <div>
            <span class="dot"></span>
            Admissions Open · Academic Year 2026–27
            <span class="dot"></span>
            <a href="#">Apply Now →</a>
        </div>
        <div class="d-none d-md-block">
            <i class="bi bi-telephone-fill me-2"></i> +92 56 0000000
            <span class="mx-3" style="opacity:.4;">|</span>
            <i class="bi bi-envelope-fill me-2"></i> info@gpbsgcw.edu.pk
        </div>
    </div>
</div>

<!-- ════════════════ MAIN NAVBAR ════════════════ -->
<nav class="navbar navbar-expand-lg main-nav">
    <div class="container">

        <!-- BRAND -->
        <a class="brand-mark" href="{{ route('home') }}">
            <div class="brand-seal">PB</div>
            <div class="brand-text">
                <div class="name">Govt. Pir Bahar Shah Graduate College for Women</div>
                <div class="city">Sheikhupura</div>
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
                        <li><a class="dropdown-item" href="{{ route('admissions.bachelorofscience') }}">Bachelor of Science</a></li>
                        <li><a class="dropdown-item" href="{{ route('admissions.howtoapply') }}">How to Apply</a></li>
                    </ul>
                </li>

                <!-- PROGRAMS -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Programs
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

                <!-- SCHOLARSHIPS -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('scholarships.*') ? 'active' : '' }}" href="{{ route('scholarships.index') }}">
                        Scholarships
                    </a>
                </li>

                <!-- NEWS -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}" href="{{ route('news.index') }}">
                        News
                    </a>
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
                <li class="nav-item ms-lg-3">
                    <a class="btn-nav-primary" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item ms-lg-2">
                    <a class="btn-nav-ghost" href="{{ route('register') }}">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
