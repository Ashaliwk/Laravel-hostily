@extends('frontend.layouts.main')
@section('title', $room->name ?? 'Room Details')
@section('main-container')

<style>
    .detail-card {
        background: #fff;
        border: 1px solid #e8ebf3;
        border-radius: 16px;
        box-shadow: 0 18px 40px rgba(18, 34, 56, 0.07);
    }
    .detail-chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 14px;
        border-radius: 999px;
        background: #f5efe3;
        color: #6f5426;
        font-size: 0.9rem;
        margin: 0 10px 10px 0;
    }
    .review-badge {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 999px;
        background: #eef3ff;
        color: #29467d;
        font-size: 0.8rem;
    }
</style>

<div class="page__banner" data-background="{{ asset('assets/img/banner/page-banner-6.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page__banner-title">
                    <h1>{{ $room->name }}</h1>
                    <div class="page__banner-title-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>-</span>Room Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="room__details section-padding" style="background:#f6f7fb;">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-4 col-lg-5">
                <div class="detail-card p-4 mb-4">
                    <span class="subtitle__one">Quick Booking</span>
                    <h4 class="mb-2">{{ number_format($room->price) }} PKR <span class="text-muted" style="font-size:0.95rem;">/ night</span></h4>
                    <p class="mb-4 text-muted">Best for {{ $room->max_persons ?? 2 }} guests with {{ strtolower($room->meal_plan ?? 'flexible dining') }}.</p>

                    <form action="{{ route('book.room') }}" method="POST">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <div class="mb-3">
                            <label class="mb-2">Guest Name</label>
                            <input type="text" class="form-control" name="guest_name" required>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">Email</label>
                            <input type="email" class="form-control" name="guest_email" required>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">Phone</label>
                            <input type="text" class="form-control" name="guest_phone" required>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="mb-2">Check In</label>
                                <input type="date" class="form-control" name="check_in" min="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="mb-2">Check Out</label>
                                <input type="date" class="form-control" name="check_out" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                            </div>
                        </div>
                        <button type="submit" class="theme-btn w-100">Book This Room<i class="fal fa-long-arrow-right"></i></button>
                    </form>
                </div>

                <div class="detail-card p-4">
                    <h5 class="mb-3">Stay Highlights</h5>
                    <div class="detail-chip"><i class="fas fa-users"></i>{{ $room->max_persons ?? 2 }} Guests</div>
                    <div class="detail-chip"><i class="fas fa-bed"></i>{{ $room->bed_type ?? 'Premium Bed' }}</div>
                    <div class="detail-chip"><i class="fas fa-snowflake"></i>{{ $room->ac_type ?? 'Climate Control' }}</div>
                    <div class="detail-chip"><i class="fas fa-utensils"></i>{{ $room->meal_plan ?? 'Flexible Meals' }}</div>
                    @if($room->is_wifi)<div class="detail-chip"><i class="fas fa-wifi"></i>WiFi Included</div>@endif
                    @if($room->is_parking)<div class="detail-chip"><i class="fas fa-parking"></i>Parking Included</div>@endif
                </div>
            </div>

            <div class="col-xl-8 col-lg-7">
                <div class="detail-card p-4 p-lg-5">
                    <div class="row align-items-center mb-4">
                        <div class="col-md-7">
                            <span class="subtitle__one">{{ ucfirst($room->room_type ?? 'Luxury Room') }}</span>
                            <h2 class="mb-2">{{ $room->name }}</h2>
                            <p class="mb-0">{{ $room->description }}</p>
                        </div>
                        <div class="col-md-5 text-md-end mt-3 mt-md-0">
                            <span class="review-badge text-capitalize">{{ $room->room_status ?? 'available' }}</span>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-7 sm-mb-20">
                            <img class="img__full rounded" src="{{ asset('backend/images/product/' . $room->image) }}" alt="{{ $room->name }}">
                        </div>
                        <div class="col-sm-5">
                            <img class="img__full rounded mb-3" src="{{ asset('assets/img/hotel/hotel-24.jpg') }}" alt="">
                            <img class="img__full rounded" src="{{ asset('assets/img/hotel/hotel-25.jpg') }}" alt="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <h4 class="mb-3">What makes this room stand out</h4>
                            <p class="mb-0">This room is designed for guests who want a balanced stay: reliable comfort, clean design, and access to the hotel services that matter most. It works well for business travelers, couples, and short leisure stays depending on the room type.</p>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <h4 class="mb-3">Included service coverage</h4>
                            <p class="mb-0">Your stay can pair with breakfast, concierge support, quick housekeeping, airport transfer planning, and shared access to spa, fitness, and pool facilities depending on your booking package.</p>
                        </div>
                    </div>

                    <h4 class="mb-3">Amenities</h4>
                    <div class="mb-4">
                        <div class="detail-chip"><i class="fas fa-bath"></i>Modern Bathroom</div>
                        <div class="detail-chip"><i class="fas fa-tv"></i>Entertainment Setup</div>
                        <div class="detail-chip"><i class="fas fa-concierge-bell"></i>Room Service</div>
                        <div class="detail-chip"><i class="fas fa-shield-alt"></i>Secure Access</div>
                        <div class="detail-chip"><i class="fas fa-mug-hot"></i>Refreshment Station</div>
                        <div class="detail-chip"><i class="fas fa-star"></i>Premium Linen</div>
                    </div>

                    <h4 class="mb-3">Recent guest reviews</h4>
                    <div class="row">
                        @forelse($reviews as $review)
                            <div class="col-md-6 mb-3">
                                <div class="detail-card p-3 h-100">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <h6 class="mb-1">{{ $review->title ?: 'Guest Review' }}</h6>
                                            <small class="text-muted">{{ $review->name }}</small>
                                        </div>
                                        <span class="review-badge">{{ $review->rating }}/5</span>
                                    </div>
                                    <p class="mb-2">{{ \Illuminate\Support\Str::limit($review->description, 120) }}</p>
                                    <small class="text-muted text-capitalize">{{ $review->sentiment ?? 'Guest feedback' }}</small>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="mb-0 text-muted">This room is waiting for its first detailed review.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                @if($relatedRooms->isNotEmpty())
                    <div class="detail-card p-4 p-lg-5 mt-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <span class="subtitle__one">Similar Picks</span>
                                <h4 class="mb-0">More rooms in this style</h4>
                            </div>
                            <a href="{{ url('/roomlist') }}" class="simple-btn">See All Rooms</a>
                        </div>
                        <div class="row">
                            @foreach($relatedRooms as $relatedRoom)
                                <div class="col-md-4 mb-3">
                                    <div class="detail-card p-3 h-100">
                                        <img class="img__full rounded mb-3" src="{{ asset('backend/images/product/' . $relatedRoom->image) }}" alt="{{ $relatedRoom->name }}">
                                        <h6><a href="{{ route('room.details', $relatedRoom->id) }}">{{ $relatedRoom->name }}</a></h6>
                                        <p class="mb-2 text-muted">{{ number_format($relatedRoom->price) }} PKR per night</p>
                                        <a href="{{ route('room.details', $relatedRoom->id) }}" class="simple-btn">Explore</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
