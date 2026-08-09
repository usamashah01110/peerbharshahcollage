@extends('includes.main')
@section('content')

<!-- ════════════════ HERO ════════════════ -->
<section class="hero hero-about">
    <div class="hero-grid"></div>
    <div class="container hero-content">
        <div class="row align-items-center g-5">
            <div class="col-lg-8">
                <div class="reveal in-view">
                    <div class="hero-eyebrow">
                        <a href="{{ route('scholarships.index') }}" style="color:inherit;text-decoration:none;">Scholarships</a>
                        &nbsp;·&nbsp; {{ ucwords(str_replace('_', ' ', $scholarship->type)) }}
                    </div>
                    <h1 class="hero-title">{{ $scholarship->name }}</h1>
                    <p class="hero-sub">
                        @if($isOpen)
                            Applications open until {{ optional($scholarship->application_close_date)->format('d M Y') }}.
                        @else
                            Applications are not currently open for this scholarship.
                        @endif
                    </p>
                    @if($isOpen)
                        <div class="hero-actions">
                            <a href="{{ route('scholarships.apply.form', $scholarship->slug) }}" class="btn-primary-c">
                                Apply Now <span class="arrow"><i class="bi bi-arrow-up-right"></i></span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="welcome">
    <div class="container">
        @include('scholarships._flash')

        <div class="row g-5">
            <div class="col-lg-7">
                <div class="reveal">
                    <div class="section-eyebrow">About this scholarship</div>
                    <h2 class="section-h">Overview</h2>
                    <p class="lead-p">{{ $scholarship->description }}</p>

                    <div class="section-eyebrow mt-5">Eligibility Criteria</div>
                    <p class="lead-p" style="white-space:pre-line;">{{ $scholarship->eligibility_criteria }}</p>

                    @if($programs->isNotEmpty())
                        <div class="section-eyebrow mt-5">Eligible Programs</div>
                        <ul class="lead-p">
                            @foreach($programs as $p)
                                <li>{{ $p->name }}</li>
                            @endforeach
                        </ul>
                    @endif

                    @if(!empty($scholarship->eligible_semesters))
                        <p class="lead-p"><strong>Eligible semesters:</strong> {{ implode(', ', (array) $scholarship->eligible_semesters) }}</p>
                    @endif
                </div>
            </div>

            <div class="col-lg-5">
                <div class="reveal reveal-delay-2">
                    @if($scholarship->featured_image)
                        <img src="{{ asset('scholarships/'.$scholarship->featured_image) }}" alt="{{ $scholarship->name }}"
                             style="width:100%;border-radius:14px;margin-bottom:24px;object-fit:cover;">
                    @endif

                    <div class="card border-0 shadow-sm" style="border-radius:14px;">
                        <div class="card-body p-4">
                            <h5 class="mb-3" style="font-family:'Fraunces',serif;">Quick facts</h5>
                            <ul class="list-unstyled mb-0" style="line-height:2.1;">
                                <li><strong>Type:</strong> {{ ucwords(str_replace('_', ' ', $scholarship->type)) }}</li>
                                @if($scholarship->award_amount)
                                    <li><strong>Award amount:</strong> Rs. {{ number_format($scholarship->award_amount) }}</li>
                                @endif
                                @if($scholarship->fee_waiver_percentage)
                                    <li><strong>Fee waiver:</strong> {{ rtrim(rtrim(number_format($scholarship->fee_waiver_percentage, 2), '0'), '.') }}%</li>
                                @endif
                                @if($scholarship->duration_semesters)
                                    <li><strong>Duration:</strong> {{ $scholarship->duration_semesters }} semester(s)</li>
                                @endif
                                @if(!is_null($scholarship->minimum_cgpa))
                                    <li><strong>Minimum CGPA:</strong> {{ $scholarship->minimum_cgpa }}</li>
                                @endif
                                @if($scholarship->maximum_family_income)
                                    <li><strong>Max family income:</strong> Rs. {{ number_format($scholarship->maximum_family_income) }}</li>
                                @endif
                                @if($scholarship->max_recipients)
                                    <li><strong>Recipients:</strong> up to {{ $scholarship->max_recipients }}</li>
                                @endif
                                <li><strong>Opens:</strong> {{ optional($scholarship->application_open_date)->format('d M Y') }}</li>
                                <li><strong>Closes:</strong> {{ optional($scholarship->application_close_date)->format('d M Y') }}</li>
                            </ul>

                            @if($isOpen)
                                <a href="{{ route('scholarships.apply.form', $scholarship->slug) }}" class="btn btn-dark w-100 mt-4">Apply for this scholarship</a>
                            @else
                                <button class="btn btn-secondary w-100 mt-4" disabled>Applications closed</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <a href="{{ route('scholarships.index') }}" class="program-link"><i class="bi bi-arrow-left"></i> Back to all scholarships</a>
        </div>
    </div>
</section>

@endsection
