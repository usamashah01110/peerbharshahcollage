@extends('includes.main')
@section('content')

<!-- ════════════════ HERO ════════════════ -->
<section class="hero">
    <div class="hero-grid"></div>
    <div class="container hero-content">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="reveal in-view">
                    <div class="hero-eyebrow">Sheikhupura · Estd. 2003</div>
                    <h1 class="hero-title">
                        Discover your <span class="accent">true</span><br>
                        potential at <span class="gold-line">Pir Bahar Shah</span><br>
                        College for Women.
                    </h1>
                    <p class="hero-sub">
                        A community where dedicated educators, ambitious young women, and a vibrant academic culture meet — preparing the next generation of leaders, thinkers, and changemakers.
                    </p>
                    <div class="hero-actions">
                        <a href="#programs" class="btn-primary-c">
                            Explore Programs
                            <span class="arrow"><i class="bi bi-arrow-up-right"></i></span>
                        </a>
                        <a href="{{ route('about') }}" class="btn-ghost-c">Take a Tour</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-visual reveal reveal-delay-2 in-view">
                    <div class="hero-badge">
                        <span class="est-num">20+</span>
                        Years of academic excellence
                    </div>
                    <div class="hero-img-main"></div>
                    <div class="hero-img-accent"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll-cue d-none d-lg-flex">
        Scroll
        <div class="line"></div>
    </div>
</section>

<!-- ════════════════ MARQUEE ════════════════ -->
<div class="marquee">
    <div class="marquee-track">
    <span>
      Knowledge <span class="star">✦</span>
      Character <span class="star">✦</span>
      Empowerment <span class="star">✦</span>
      Discipline <span class="star">✦</span>
      Excellence <span class="star">✦</span>
      Service <span class="star">✦</span>
    </span>
        <span aria-hidden="true">
      Knowledge <span class="star">✦</span>
      Character <span class="star">✦</span>
      Empowerment <span class="star">✦</span>
      Discipline <span class="star">✦</span>
      Excellence <span class="star">✦</span>
      Service <span class="star">✦</span>
    </span>
    </div>
</div>

<!-- ════════════════ WELCOME / ABOUT ════════════════ -->
<section class="welcome" id="welcome">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="reveal">
                    <div class="section-eyebrow">Welcome</div>
                    <h2 class="section-h">A home for <em>knowledge,</em><br>creativity, and purpose.</h2>
                    <p class="lead-p">
                        At the heart of our mission lies a shared passion for knowledge and an unwavering commitment to academic excellence. But what truly sets us apart is the welcoming spirit that defines our campus community.
                    </p>
                    <p class="lead-p">
                        Diversity flourishes here — not only in our students and faculty, but in the ideas, traditions, and aspirations that come together under one roof. As a home to dedicated educators and talented young women, the college fosters an environment rich in creativity, growth, and purpose-driven learning.
                    </p>
                    <div class="signature-block">
                        <span class="ornament">✦</span>
                        <span class="text">Educating women, empowering generations.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="image-stack reveal reveal-delay-2">
                    <div class="stack-img stack-1">
                        <span class="stack-tag"><span class="dot"></span> Our Faculty</span>
                    </div>
                    <div class="stack-img stack-2">
                        <span class="stack-tag"><span class="dot"></span> Admissions Open</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════ STATS ════════════════ -->
<section class="stats">
    <div class="container position-relative">
        <div class="reveal">
            <div class="section-eyebrow">By the Numbers</div>
            <h2 class="stats-h">Two decades of <em>shaping minds,</em> nurturing ambition, and building a legacy of academic distinction.</h2>
        </div>
        <div class="row g-0">
            <div class="col-6 col-md-3">
                <div class="stat-cell reveal" data-stat>
                    <div class="num" data-target="{{ $stats['departments'] ?? 7 }}">0<span class="plus">+</span></div>
                    <div class="lbl">Academic Departments</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-cell reveal reveal-delay-1" data-stat>
                    <div class="num" data-target="{{ $stats['students'] ?? 1733 }}">0<span class="plus">+</span></div>
                    <div class="lbl">Enrolled Students</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-cell reveal reveal-delay-2" data-stat>
                    <div class="num" data-target="{{ $stats['teachers'] ?? 28 }}">0<span class="plus">+</span></div>
                    <div class="lbl">Faculty Members</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-cell reveal reveal-delay-3" data-stat>
                    <div class="num" data-target="{{ $stats['years'] ?? 20 }}">0<span class="plus">+</span></div>
                    <div class="lbl">Years of Excellence</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════ PROGRAMS ════════════════ -->
<section class="programs" id="programs">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-7 reveal">
                <div class="section-eyebrow">Academic Programs</div>
                <h2 class="section-h">Pathways designed for <em>curious minds.</em></h2>
            </div>
        </div>
        <div class="row g-4">
            @forelse($programs as $i => $program)
                <div class="col-md-6 col-lg-3">
                    <div class="program-card reveal {{ $i > 0 ? 'reveal-delay-'.$i : '' }}">
                        <div class="program-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }} — {{ ucfirst($program->degree_level) }}</div>
                        <h4>{{ $program->name }}</h4>
                        <p>{{ \Illuminate\Support\Str::limit($program->description, 120) ?: 'Offered by the '.optional($program->department)->name.' department.' }}</p>
                        <a href="{{ route('admissions.howtoapply') }}" class="program-link">Explore <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            @empty
                <div class="col-md-6 col-lg-3">
                    <div class="program-card reveal">
                        <div class="program-num">01 — Intermediate</div>
                        <h4>FSc Pre-Medical</h4>
                        <p>Build a strong foundation in biology, chemistry, and physics for medical and life-science careers.</p>
                        <a href="{{ route('pre.medical') }}" class="program-link">Explore <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="program-card reveal reveal-delay-1">
                        <div class="program-num">02 — Intermediate</div>
                        <h4>FSc Pre-Engineering</h4>
                        <p>Mathematics, physics, and chemistry curriculum tailored for engineering and technology aspirants.</p>
                        <a href="{{ route('pre.engineering') }}" class="program-link">Explore <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="program-card reveal reveal-delay-2">
                        <div class="program-num">03 — Intermediate</div>
                        <h4>FA / ICS</h4>
                        <p>Humanities, computer science, and arts programs for a broad and flexible academic foundation.</p>
                        <a href="{{ route('arts') }}" class="program-link">Explore <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="program-card reveal reveal-delay-3">
                        <div class="program-num">04 — Bachelor's</div>
                        <h4>BS Programs</h4>
                        <p>Four-year undergraduate degrees across multiple disciplines, recognized by HEC Pakistan.</p>
                        <a href="{{ route('bs.programs') }}" class="program-link">Explore <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ════════════════ PRINCIPAL'S MESSAGE ════════════════ -->
<section class="principal">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div class="principal-img-block reveal">
                    <img src="{{ asset('images/principal.jpeg') }}" alt="Principal">
                    <div class="principal-frame-line"></div>
                    <div class="principal-name-card">
                        <div class="label">Principal</div>
                        <div class="name">A Message to Our Students</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="principal-text reveal reveal-delay-2 position-relative">
                    <span class="giant-quote-mark">"</span>
                    <div class="section-eyebrow">From the Principal</div>
                    <h2 class="section-h">A vision born of <em>passion</em> and purpose.</h2>
                    <p class="pull-quote">
                        "High-quality education, modern technology, and the best educational environment are our priorities — preparing every young woman to face the future with confidence."
                    </p>
                    <p>
                        Dear Students, the history of this institution is the story of a single individual's passion. For over two decades, we have been writing new stories of development, and our students continue to live a life of pride and purpose.
                    </p>
                    <p>
                        We have been continuously striving to provide the highest educational standards, and Alhamdulillah, this institution plays an important role in the field of education today. In this era, the role of modern communication cannot be denied — we embrace it as a tool to inspire, to inform, and to expand the horizons of our students.
                    </p>
                    <p>
                        Our goal is not only to educate, but to prepare every young woman according to the demands of a changing world — so that she may face every challenge with knowledge, confidence, and grace.
                    </p>
                    <div class="signature-block">
                        <span class="ornament">✦</span>
                        <span class="text">Principal, Govt. Pir Bahar Shah Graduate College for Women</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════ NEWS & EVENTS ════════════════ -->
<section class="news" id="news">
    <div class="container">
        <div class="news-header reveal">
            <div>
                <div class="section-eyebrow">Latest Updates</div>
                <h2 class="section-h">News & <em>events.</em></h2>
            </div>
            <a href="{{ route('news.index') }}" class="btn-view-all-c">View All News <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="row g-4">
            @php
                $newsImages = [
                    'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=700&q=80',
                    'https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=700&q=80',
                    'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=700&q=80',
                ];
            @endphp
            @forelse($news as $i => $item)
                <div class="col-md-6 col-lg-4">
                    <article class="news-card reveal {{ $i > 0 ? 'reveal-delay-'.$i : '' }}">
                        <div class="news-img-wrap">
                            <img src="{{ $newsImages[$i % count($newsImages)] }}" alt="{{ $item->title }}">
                            <div class="news-date-stamp">
                                <span class="day">{{ optional($item->event_date)->format('d') ?? $item->created_at->format('d') }}</span>
                                <span class="month">{{ optional($item->event_date)->format('M') ?? $item->created_at->format('M') }}</span>
                            </div>
                        </div>
                        <div class="news-body">
                            <span class="news-tag">{{ ucfirst($item->type) }}</span>
                            <h5>{{ $item->title }}</h5>
                            <p>{{ \Illuminate\Support\Str::limit($item->description, 130) }}</p>
                            <a href="{{ route('news.show', $item) }}" class="read-more">Read Story <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-md-6 col-lg-4">
                    <article class="news-card reveal">
                        <div class="news-img-wrap">
                            <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=700&q=80" alt="News">
                            <div class="news-date-stamp">
                                <span class="day">04</span>
                                <span class="month">Apr</span>
                            </div>
                        </div>
                        <div class="news-body">
                            <span class="news-tag">Spotlight</span>
                            <h5>College website officially launched online.</h5>
                            <p>The new official website of the College is now live, providing students and staff with seamless access to academic resources and announcements.</p>
                            <a href="{{ route('news.index') }}" class="read-more">Read Story <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4">
                    <article class="news-card reveal reveal-delay-1">
                        <div class="news-img-wrap">
                            <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=700&q=80" alt="Admissions">
                            <div class="news-date-stamp">
                                <span class="day">04</span>
                                <span class="month">Jun</span>
                            </div>
                        </div>
                        <div class="news-body">
                            <span class="news-tag">Admissions</span>
                            <h5>Admissions open for academic year 2026–27.</h5>
                            <p>Applications are invited for Intermediate and BS programs. Limited seats available — submit your application before the deadline.</p>
                            <a href="{{ route('news.index') }}" class="read-more">Apply Now <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4">
                    <article class="news-card reveal reveal-delay-2">
                        <div class="news-img-wrap">
                            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?w=700&q=80" alt="Annual Day">
                            <div class="news-date-stamp">
                                <span class="day">28</span>
                                <span class="month">May</span>
                            </div>
                        </div>
                        <div class="news-body">
                            <span class="news-tag">Event</span>
                            <h5>Annual prize distribution ceremony 2026.</h5>
                            <p>Honoring this year's top-performing students. Faculty, parents, and dignitaries invited to celebrate academic and co-curricular achievement.</p>
                            <a href="{{ route('news.index') }}" class="read-more">Event Details <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </article>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ════════════════ CTA STRIP ════════════════ -->
<section class="cta-strip">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-8 reveal">
                <div class="section-eyebrow" style="color: var(--gold);">Take the next step</div>
                <h2 class="section-h">Ready to begin your <em>journey</em> with us?</h2>
                <p class="lead-p mb-0">Admissions for 2026–27 are now open. Join a community of ambitious women and dedicated educators.</p>
            </div>
            <div class="col-lg-4 text-lg-end reveal reveal-delay-1">
                <a href="{{ route('admissions.howtoapply') }}" class="btn-light-c">
                    Apply Now
                    <i class="bi bi-arrow-up-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
