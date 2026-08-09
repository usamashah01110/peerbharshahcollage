@extends('includes.main')
@section('content')

<!-- ════════════════ HERO ════════════════ -->
<section class="hero hero-about">
    <div class="hero-grid"></div>
    <div class="container hero-content">
        <div class="row align-items-center g-5">
            <div class="col-lg-8">
                <div class="reveal in-view">
                    <div class="hero-eyebrow">Latest Updates</div>
                    <h1 class="hero-title">News &amp; <span class="gold-line">events.</span></h1>
                    <p class="hero-sub">Announcements, achievements, and upcoming events from across the college.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="news">
    <div class="container">
        @php
            $newsImages = [
                'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=700&q=80',
                'https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=700&q=80',
                'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=700&q=80',
            ];
        @endphp

        <div class="row g-4">
            @forelse($news as $i => $item)
                <div class="col-md-6 col-lg-4">
                    <article class="news-card reveal {{ $i % 3 ? 'reveal-delay-'.($i % 3) : '' }}">
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
                <div class="col-12">
                    <p class="lead-p">No news or events have been published yet. Please check back soon.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-5">
            {{ $news->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>

@endsection
