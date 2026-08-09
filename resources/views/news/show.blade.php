@extends('includes.main')
@section('content')

<!-- ════════════════ HERO ════════════════ -->
<section class="hero hero-about">
    <div class="hero-grid"></div>
    <div class="container hero-content">
        <div class="row align-items-center g-5">
            <div class="col-lg-9">
                <div class="reveal in-view">
                    <div class="hero-eyebrow">
                        <a href="{{ route('news.index') }}" style="color:inherit;text-decoration:none;">News &amp; Events</a>
                        &nbsp;·&nbsp; {{ ucfirst($item->type) }}
                    </div>
                    <h1 class="hero-title">{{ $item->title }}</h1>
                    <p class="hero-sub">
                        {{ optional($item->event_date)->format('d F Y') ?? $item->created_at->format('d F Y') }}
                        @if($item->department) · {{ $item->department->name }} @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="welcome">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="reveal">
                    <p class="lead-p" style="white-space:pre-line;">{{ $item->description }}</p>
                    <div class="mt-5">
                        <a href="{{ route('news.index') }}" class="program-link"><i class="bi bi-arrow-left"></i> Back to all news</a>
                    </div>
                </div>
            </div>

            @if($related->isNotEmpty())
                <div class="col-lg-4">
                    <div class="reveal reveal-delay-2">
                        <div class="section-eyebrow">More updates</div>
                        <ul class="list-unstyled" style="line-height:1.7;">
                            @foreach($related as $r)
                                <li class="mb-3 pb-3" style="border-bottom:1px solid rgba(0,0,0,.08);">
                                    <a href="{{ route('news.show', $r) }}" style="text-decoration:none;color:inherit;font-weight:600;">{{ $r->title }}</a>
                                    <div class="text-muted" style="font-size:.85rem;">{{ optional($r->event_date)->format('d M Y') ?? $r->created_at->format('d M Y') }}</div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

@endsection
