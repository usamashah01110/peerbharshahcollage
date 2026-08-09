@extends('includes.main')
@section('content')

    <!-- ════════════════ HERO ════════════════ -->
    <section class="hero hero-about">
        <div class="hero-grid"></div>
        <div class="container hero-content">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="reveal in-view">
                        <div class="hero-eyebrow">About the College</div>
                        <h1 class="hero-title">
                            A legacy of <span class="accent">learning,</span><br>
                            built for the women<br>
                            of <span class="gold-line">tomorrow.</span>
                        </h1>
                        <p class="hero-sub">
                            Excellence in education. Empowerment through knowledge.
                            For over two decades, we have shaped the lives, minds,
                            and futures of young women across Sheikhupura.
                        </p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-visual hero-visual-about reveal reveal-delay-2 in-view">
                        <div class="hero-img-main"
                             style="background-image: url('https://images.unsplash.com/photo-1562774053-701939374585?w=900&q=80');">
                        </div>
                        <div class="hero-badge">
                            <span class="est-num">2002</span>
                            Established
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════ OUR STORY ════════════════ -->
    <section class="welcome">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="reveal">
                        <div class="section-eyebrow">Our Story</div>
                        <h2 class="section-h">A beacon of <em>education</em><br>and women's empowerment.</h2>
                        <p class="lead-p">
                            Government Pir Bahar Shah Graduate College for Women, Sheikhupura, stands as a beacon of educational excellence and women's empowerment in Pakistan. Established with a vision to provide quality higher education to women in the region, our college has been nurturing bright minds and shaping future leaders for generations.
                        </p>
                        <p class="lead-p">
                            Our institution combines traditional values with modern educational approaches, creating an environment where academic rigor meets personal growth. We are committed to fostering intellectual curiosity, critical thinking, and social responsibility among our students.
                        </p>
                        <div class="signature-block">
                            <span class="ornament">✦</span>
                            <span class="text">Two decades of dedication, one mission: empowering women through knowledge.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="image-stack reveal reveal-delay-2">
                        <div class="stack-img stack-1"
                             style="background-image: url('https://images.unsplash.com/photo-1571260899304-425eee4c7efc?w=800&q=80');">
                            <span class="stack-tag"><span class="dot"></span> Our Campus</span>
                        </div>
                        <div class="stack-img stack-2"
                             style="background-image: url('https://images.unsplash.com/photo-1497486751825-1233686d5d80?w=600&q=80');">
                            <span class="stack-tag"><span class="dot"></span> Student Life</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════ MISSION & VISION ════════════════ -->
    <section class="mission-vision">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-7 reveal">
                    <div class="section-eyebrow">Purpose & Direction</div>
                    <h2 class="section-h">What we stand for, where we're <em>going.</em></h2>
                </div>
            </div>
            <div class="row g-0 mv-grid">
                <div class="col-lg-6">
                    <div class="mv-cell reveal">
                        <div class="mv-num">01</div>
                        <div class="mv-label">Our Mission</div>
                        <h3>Knowledge, skills, and the values <em>to lead.</em></h3>
                        <p>
                            To provide comprehensive higher education that empowers women with knowledge, skills, and values necessary to become confident, responsible, and productive members of society. We strive to create an inclusive learning environment that promotes academic excellence, personal development, and social awareness.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mv-cell reveal reveal-delay-1">
                        <div class="mv-num">02</div>
                        <div class="mv-label">Our Vision</div>
                        <h3>A leading institution for women in <em>Pakistan.</em></h3>
                        <p>
                            To be a leading institution of higher learning for women, recognized for academic excellence, innovative teaching methodologies, and commitment to women's empowerment. We envision our graduates as leaders who contribute meaningfully to the progress and development of Pakistan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════ ACHIEVEMENTS / STATS ════════════════ -->
    <section class="stats">
        <div class="container position-relative">
            <div class="reveal">
                <div class="section-eyebrow">Our Achievements</div>
                <h2 class="stats-h">Decades of impact, <em>thousands of stories,</em> and a community that keeps growing.</h2>
            </div>
            <div class="row g-0">
                <div class="col-6 col-md-3">
                    <div class="stat-cell reveal" data-stat>
                        <div class="num" data-target="{{ $stats['years'] ?? 20 }}">0<span class="plus">+</span></div>
                        <div class="lbl">Years of Excellence</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-cell reveal reveal-delay-1" data-stat>
                        <div class="num" data-target="2000">0<span class="plus">+</span></div>
                        <div class="lbl">Alumni Success Stories</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-cell reveal reveal-delay-2" data-stat>
                        <div class="num" data-target="{{ $stats['programs'] ?? 15 }}">0<span class="plus">+</span></div>
                        <div class="lbl">Academic Programs</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-cell reveal reveal-delay-3" data-stat>
                        <div class="num" data-target="100">0<span class="plus">%</span></div>
                        <div class="lbl">Dedicated Faculty</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════ FACULTY ════════════════ -->
    <section class="faculty-section">
        <div class="container">
            <div class="row mb-5 align-items-end">
                <div class="col-lg-7 reveal">
                    <div class="section-eyebrow">Meet Our Faculty</div>
                    <h2 class="section-h">Educators, mentors, <em>and scholars.</em></h2>
                </div>
                <div class="col-lg-5 reveal reveal-delay-1">
                    <p class="lead-p mb-0">
                        Our distinguished faculty members are committed educators, researchers, and mentors who bring expertise and passion to every classroom.
                    </p>
                </div>
            </div>

            <div class="row g-4">
                @php
                    $facultyFallbackImg = [
                        'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=600&q=80',
                        'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=600&q=80',
                        'https://images.unsplash.com/photo-1544717305-2782549b5136?w=600&q=80',
                    ];
                @endphp
                @forelse($faculty as $i => $member)
                    @php
                        $img   = $member->profile_image ? asset($member->profile_image) : $facultyFallbackImg[$i % count($facultyFallbackImg)];
                        $title = $member->specialisation
                            ?: trim(ucwords(str_replace('_', ' ', $member->designation)) . (optional($member->department)->name ? ' · ' . $member->department->name : ''));
                    @endphp
                    <div class="col-md-6 col-lg-4">
                        <div class="faculty-card reveal {{ $i > 0 ? 'reveal-delay-'.$i : '' }}">
                            <div class="faculty-img">
                                <img src="{{ $img }}" alt="{{ $member->first_name }} {{ $member->last_name }}">
                                <div class="faculty-overlay">
                                    <span class="faculty-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                </div>
                            </div>
                            <div class="faculty-meta">
                                <h4 class="faculty-name">{{ $member->first_name }} {{ $member->last_name }}</h4>
                                <div class="faculty-title">{{ $title }}</div>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Faculty 1 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="faculty-card reveal">
                            <div class="faculty-img">
                                <img src="{{ asset('images/principal.jpeg') }}" alt="Dr. Asma Maqbol">
                                <div class="faculty-overlay">
                                    <span class="faculty-num">01</span>
                                </div>
                            </div>
                            <div class="faculty-meta">
                                <h4 class="faculty-name">Dr. Asma Maqbol</h4>
                                <div class="faculty-title">Principal &amp; Head of Zoology</div>
                            </div>
                        </div>
                    </div>

                    <!-- Faculty 2 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="faculty-card reveal reveal-delay-1">
                            <div class="faculty-img">
                                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=600&q=80" alt="Dr. Faiza Bukhari">
                                <div class="faculty-overlay">
                                    <span class="faculty-num">02</span>
                                </div>
                            </div>
                            <div class="faculty-meta">
                                <h4 class="faculty-name">Dr. Faiza Bukhari</h4>
                                <div class="faculty-title">Assistant Professor &amp; Head of English Literature</div>
                            </div>
                        </div>
                    </div>

                    <!-- Faculty 3 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="faculty-card reveal reveal-delay-2">
                            <div class="faculty-img">
                                <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=600&q=80" alt="Mrs. Shahnaz Ijaz">
                                <div class="faculty-overlay">
                                    <span class="faculty-num">03</span>
                                </div>
                            </div>
                            <div class="faculty-meta">
                                <h4 class="faculty-name">Mrs. Shahnaz Ijaz</h4>
                                <div class="faculty-title">Assistant Professor &amp; Head of Political Science</div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection
