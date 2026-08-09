@extends('includes.main')
@section('content')

<!-- ════════════════ HERO ════════════════ -->
<section class="hero hero-about">
    <div class="hero-grid"></div>
    <div class="container hero-content">
        <div class="row align-items-center g-5">
            <div class="col-lg-8">
                <div class="reveal in-view">
                    <div class="hero-eyebrow">Financial Aid &amp; Support</div>
                    <h1 class="hero-title">
                        Scholarships that <span class="accent">open</span><br>
                        doors to your <span class="gold-line">future.</span>
                    </h1>
                    <p class="hero-sub">
                        We believe talent and determination should never be limited by financial
                        circumstances. Explore merit, need-based, and special scholarships — and apply online.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="programs">
    <div class="container">

        @include('scholarships._flash')

        <!-- OPEN SCHOLARSHIPS -->
        <div class="row mb-4">
            <div class="col-lg-7 reveal">
                <div class="section-eyebrow">Now Accepting Applications</div>
                <h2 class="section-h">Open <em>scholarships.</em></h2>
            </div>
        </div>

        <div class="row g-4">
            @forelse($open as $i => $s)
                <div class="col-md-6 col-lg-4">
                    <div class="program-card reveal {{ $i > 0 ? 'reveal-delay-'.($i % 3) : '' }}" style="display:flex;flex-direction:column;">
                        <div class="program-num">{{ ucwords(str_replace('_', ' ', $s->type)) }}</div>
                        <h4>{{ $s->name }}</h4>
                        <p>{{ \Illuminate\Support\Str::limit($s->description, 120) }}</p>
                        <div class="mb-3" style="font-size:.9rem;">
                            @if($s->award_amount)
                                <div><i class="bi bi-cash-coin"></i> Award: <strong>Rs. {{ number_format($s->award_amount) }}</strong></div>
                            @endif
                            @if($s->fee_waiver_percentage)
                                <div><i class="bi bi-percent"></i> Fee waiver: <strong>{{ rtrim(rtrim(number_format($s->fee_waiver_percentage, 2), '0'), '.') }}%</strong></div>
                            @endif
                            <div><i class="bi bi-calendar-event"></i> Closes: <strong>{{ optional($s->application_close_date)->format('d M Y') }}</strong></div>
                        </div>
                        <div class="mt-auto d-flex gap-2 flex-wrap">
                            <a href="{{ route('scholarships.show', $s->slug) }}" class="program-link">Details <i class="bi bi-arrow-right"></i></a>
                            <a href="{{ route('scholarships.apply.form', $s->slug) }}" class="btn btn-sm btn-dark">Apply Now</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="lead-p">There are no scholarships open for applications right now. Please check back soon.</p>
                </div>
            @endforelse
        </div>

        <!-- OTHER / PAST SCHOLARSHIPS -->
        @if($other->isNotEmpty())
            <div class="row mb-4 mt-5 pt-4">
                <div class="col-lg-7 reveal">
                    <div class="section-eyebrow">For Your Information</div>
                    <h2 class="section-h">Other <em>scholarships.</em></h2>
                </div>
            </div>
            <div class="row g-4">
                @foreach($other as $i => $s)
                    <div class="col-md-6 col-lg-4">
                        <div class="program-card reveal {{ $i > 0 ? 'reveal-delay-'.($i % 3) : '' }}" style="opacity:.75;display:flex;flex-direction:column;">
                            <div class="program-num">{{ ucwords(str_replace('_', ' ', $s->type)) }} · Closed</div>
                            <h4>{{ $s->name }}</h4>
                            <p>{{ \Illuminate\Support\Str::limit($s->description, 120) }}</p>
                            <div class="mt-auto">
                                <a href="{{ route('scholarships.show', $s->slug) }}" class="program-link">View Details <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</section>

@endsection
