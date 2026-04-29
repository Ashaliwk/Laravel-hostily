@extends('frontend.layouts.main')
@section('title', 'Guest Reviews')
@section('main-container')

<style>
    .review-panel {
        background: #fff;
        border: 1px solid #e8ebf3;
        border-radius: 16px;
        box-shadow: 0 14px 32px rgba(18, 34, 56, 0.06);
    }
    .sentiment-pill {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 999px;
        font-size: 0.78rem;
        text-transform: capitalize;
        background: #eef3ff;
        color: #29467d;
    }
</style>

<div class="page__banner" data-background="{{ asset('assets/img/banner/page-banner-7.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page__banner-title">
                    <h1>Guest Reviews</h1>
                    <div class="page__banner-title-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>-</span>Guest Reviews</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-padding" style="background:#f6f7fb;">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row g-4 mb-5">
            <div class="col-lg-4">
                <div class="review-panel p-4 h-100">
                    <span class="subtitle__one">Review Insight</span>
                    <h3 class="mb-3">{{ $reviewInsight['average_rating'] ?: '0.0' }}/5 Average Rating</h3>
                    <p class="mb-4">AI-assisted review analysis gives your team a quick read on guest sentiment and recurring issues.</p>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">Positive reviews: <strong>{{ $reviewInsight['sentiments']['positive'] }}</strong></li>
                        <li class="mb-2">Mixed reviews: <strong>{{ $reviewInsight['sentiments']['mixed'] }}</strong></li>
                        <li class="mb-2">Negative reviews: <strong>{{ $reviewInsight['sentiments']['negative'] }}</strong></li>
                        <li>Total verified reviews: <strong>{{ $reviewInsight['total'] }}</strong></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="review-panel p-4 h-100">
                    <span class="subtitle__one">Verified Stay Reviews</span>
                    <h3 class="mb-3">Leave feedback after your room stay</h3>
                    <p class="mb-4">To keep reviews trustworthy, guests can only post once their booking has ended and the booking details match. Use the booking ID from your booking confirmation.</p>
                    <form action="{{ route('reviews.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="mb-2">Booking ID</label>
                                <input type="number" class="form-control" name="booking_id" value="{{ old('booking_id') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-2">Email used for booking</label>
                                <input type="email" class="form-control" name="guest_email" value="{{ old('guest_email') }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="mb-2">Your name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="mb-2">Country</label>
                                <input type="text" class="form-control" name="country" value="{{ old('country') }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="mb-2">Rating</label>
                                <select class="form-control" name="rating" required>
                                    @for($rating = 5; $rating >= 1; $rating--)
                                        <option value="{{ $rating }}" @selected((int) old('rating', 5) === $rating)>{{ $rating }} Stars</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="mb-2">Review title</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                            </div>
                            <div class="col-12 mb-4">
                                <label class="mb-2">Your review</label>
                                <textarea class="form-control" name="description" rows="5" required>{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="theme-btn">Submit Verified Review<i class="fal fa-long-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse($reviews as $review)
                <div class="col-lg-6 mb-4">
                    <div class="review-panel p-4 h-100">
                        <div class="d-flex justify-content-between align-items-start mb-3 gap-3">
                            <div>
                                <h5 class="mb-1">{{ $review->title ?: 'Guest Review' }}</h5>
                                <p class="mb-0 text-muted">{{ $review->name }} from {{ $review->country }}</p>
                            </div>
                            <div class="text-end">
                                <strong>{{ $review->rating }}/5</strong><br>
                                <span class="sentiment-pill">{{ $review->sentiment ?? 'verified stay' }}</span>
                            </div>
                        </div>
                        <p class="mb-3">{{ $review->description }}</p>
                        @if($review->summary)
                            <div class="p-3" style="background:#f6f7fb;border-radius:12px;">
                                <strong>AI Summary:</strong>
                                <p class="mb-0 mt-1">{{ $review->summary }}</p>
                            </div>
                        @endif
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <small class="text-muted">{{ optional($review->stay_date)->format('M d, Y') }}</small>
                            @if($review->room)
                                <small class="text-muted">{{ $review->room->name }}</small>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="review-panel p-5 text-center">
                        <h4>No guest reviews yet</h4>
                        <p class="mb-0">Once stays are completed, verified guest feedback will appear here.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
