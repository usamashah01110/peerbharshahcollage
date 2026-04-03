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
    <a class="navbar-brand d-flex align-items-center gap-2 text-decoration-none" href="#">

      <!-- SVG Logo: Govt. Peer Bhar Shah College -->
      <div class="college-logo">
        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
          <!-- Outer filled circle -->
          <circle cx="50" cy="50" r="48" fill="#8b1a2e" stroke="#c9a84c" stroke-width="2.5"/>
          <!-- Inner decorative rings -->
          <circle cx="50" cy="50" r="40" fill="none" stroke="#c9a84c" stroke-width="1"/>
          <circle cx="50" cy="50" r="37" fill="none" stroke="#c9a84c" stroke-width="0.4"/>

          <!-- Mosque dome -->
          <path d="M30 46 Q50 22 70 46" fill="#c9a84c"/>
          <rect x="36" y="46" width="28" height="14" fill="#c9a84c"/>

          <!-- Minaret left -->
          <rect x="26" y="36" width="6" height="24" fill="#c9a84c"/>
          <ellipse cx="29" cy="36" rx="3" ry="5" fill="#c9a84c"/>

          <!-- Minaret right -->
          <rect x="68" y="36" width="6" height="24" fill="#c9a84c"/>
          <ellipse cx="71" cy="36" rx="3" ry="5" fill="#c9a84c"/>

          <!-- Crescent on dome top -->
          <circle cx="51" cy="21" r="3.5" fill="#c9a84c"/>
          <circle cx="49.2" cy="20.2" r="2.4" fill="#8b1a2e"/>

          <!-- College name text -->
          <text x="50" y="68" text-anchor="middle" font-family="serif" font-size="6.5" fill="#c9a84c" font-weight="bold">PEER BHAR SHAH</text>
          <text x="50" y="77" text-anchor="middle" font-family="serif" font-size="6.2" fill="#fff">COLLEGE</text>
          <text x="50" y="86" text-anchor="middle" font-family="serif" font-size="6" fill="#fff">SHEIKHUPURA</text>
          <text x="50" y="94" text-anchor="middle" font-family="serif" font-size="5.5" fill="#c9a84c">✦ 1968 ✦</text>
        </svg>
      </div>

      <div class="brand-text">
        <div class="name">Govt. Peer Bhar Shah College</div>
        <div class="name" style="font-size:.85rem;">Sheikhupura</div>
        <div class="sub">Since 2002</div>
      </div>
    </a>

    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="mainNav">
      <ul class="navbar-nav align-items-lg-center">
        <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('aboutus') }}">About Us</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Admissions</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Intermediate</a></li>
            <li><a class="dropdown-item" href="#">Bachelor of Science</a></li>
            <li><a class="dropdown-item" href="#">How to Apply</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Programs &amp; Curriculum</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Pre-Medical</a></li>
            <li><a class="dropdown-item" href="#">Pre-Engineering</a></li>
            <li><a class="dropdown-item" href="#">Arts</a></li>
            <li><a class="dropdown-item" href="#">Commerce</a></li>
            <li><a class="dropdown-item" href="#">BS Programs</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="#">Student Life</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>