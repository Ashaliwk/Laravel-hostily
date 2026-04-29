@extends('frontend.layouts.main')
@section('title', 'Room List')
@section('main-container')

<style>
    .room-list-shell {
        background: #f6f7fb;
    }
    .room-filter-card,
    .room-reco-card,
    .room-card {
        background: #fff;
        border: 1px solid #e7e9f2;
        border-radius: 14px;
    }
    .room-card {
        overflow: hidden;
        margin-bottom: 28px;
        box-shadow: 0 14px 32px rgba(18, 34, 56, 0.06);
    }
    .room-card img {
        width: 100%;
        height: 100%;
        min-height: 270px;
        object-fit: cover;
    }
    .room-card-body {
        padding: 26px;
    }
    .room-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin: 16px 0;
    }
    .room-meta span,
    .room-feature-chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border-radius: 999px;
        padding: 8px 12px;
        background: #f6f1e7;
        color: #6d5425;
        font-size: 0.88rem;
    }
    .room-reco-card {
        padding: 18px;
        margin-bottom: 16px;
    }
    .room-price {
        font-size: 1.4rem;
        font-weight: 700;
        color: #122238;
    }
</style>

<div class="page__banner" data-background="{{ asset('assets/img/banner/page-banner-3.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page__banner-title">
                    <h1>Room List</h1>
                    <div class="page__banner-title-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>-</span>Room List</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="room-list-shell section-padding">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-4 col-lg-5">
                <div class="room-filter-card p-4 mb-4">
                    <span class="subtitle__one">AI Search</span>
                    <h4 class="mb-3">Describe the room you want</h4>
                    <form action="{{ route('search.rooms') }}" method="GET">
                        <div class="mb-3">
                            <label class="mb-2">Natural language search</label>
                            <input type="text" class="form-control" name="query" value="{{ $naturalLanguageQuery ?? '' }}" placeholder="Room under 15000 with WiFi and parking">
                        </div>
                        <button type="submit" class="theme-btn w-100">Find Matching Rooms<i class="fal fa-long-arrow-right"></i></button>
                    </form>
                </div>

                <div class="room-filter-card p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <span class="subtitle__one">Personalized Picks</span>
                            <h4 class="mb-0">Recommended for this session</h4>
                        </div>
                        <a href="{{ route('ai.suggest.form') }}" class="simple-btn">Open AI Assistant</a>
                    </div>
                    @forelse(($recommendedRooms ?? collect())->take(3) as $recommendedRoom)
                        <div class="room-reco-card">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <h5 class="mb-1"><a href="{{ route('room.details', $recommendedRoom->id) }}">{{ $recommendedRoom->name }}</a></h5>
                                    <p class="mb-0 text-muted">{{ ucfirst($recommendedRoom->room_type ?? 'Room') }} for {{ $recommendedRoom->max_persons ?? 2 }} guests</p>
                                </div>
                                <strong>{{ number_format($recommendedRoom->price) }}</strong>
                            </div>
                            <div class="room-meta">
                                @if($recommendedRoom->is_wifi)<span><i class="fas fa-wifi"></i>WiFi</span>@endif
                                @if($recommendedRoom->is_parking)<span><i class="fas fa-parking"></i>Parking</span>@endif
                            </div>
                        </div>
                    @empty
                        <p class="mb-0 text-muted">Browse a few room details and your recommendations will start adapting.</p>
                    @endforelse
                </div>
            </div>

            <div class="col-xl-8 col-lg-7">
                @forelse ($rooms as $room)
                    <div class="room-card">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <img src="{{ asset('backend/images/product/' . $room->image) }}" alt="{{ $room->name }}">
                            </div>
                            <div class="col-md-7">
                                <div class="room-card-body">
                                    <div class="d-flex flex-wrap justify-content-between align-items-start gap-3">
                                        <div>
                                            <span class="subtitle__one">{{ ucfirst($room->room_type ?? 'Luxury stay') }}</span>
                                            <h3 class="mb-2"><a href="{{ route('room.details', $room->id) }}">{{ $room->name }}</a></h3>
                                        </div>
                                        <div class="text-md-end">
                                            <div class="room-price">{{ number_format($room->price) }} PKR</div>
                                            <p class="mb-0 text-muted">per night</p>
                                        </div>
                                    </div>

                                    <p class="mt-3 mb-0">{{ \Illuminate\Support\Str::limit($room->description, 180) }}</p>

                                    <div class="room-meta">
                                        <span><i class="fas fa-users"></i>{{ $room->max_persons ?? 2 }} Guests</span>
                                        <span><i class="fas fa-bed"></i>{{ $room->bed_type ?? 'Premium Bed' }}</span>
                                        <span><i class="fas fa-snowflake"></i>{{ $room->ac_type ?? 'Climate Control' }}</span>
                                        <span><i class="fas fa-utensils"></i>{{ $room->meal_plan ?? 'Flexible Meals' }}</span>
                                    </div>

                                    <div class="d-flex flex-wrap gap-2 mb-4">
                                        @if($room->is_wifi)
                                            <span class="room-feature-chip"><i class="fas fa-wifi"></i>High-speed WiFi</span>
                                        @endif
                                        @if($room->is_parking)
                                            <span class="room-feature-chip"><i class="fas fa-parking"></i>Secure Parking</span>
                                        @endif
                                        <span class="room-feature-chip"><i class="fas fa-circle"></i>{{ ucfirst($room->room_status ?? 'available') }}</span>
                                    </div>

                                    <div class="d-flex flex-wrap gap-3">
                                        <a href="{{ route('room.details', $room->id) }}" class="theme-btn">View Details<i class="fal fa-long-arrow-right"></i></a>
                                        @if(($room->room_status ?? 'available') === 'available')
                                            <a href="{{ url('/book', $room->id) }}" class="simple-btn">Book Now</a>
                                        @else
                                            <span class="room-feature-chip text-capitalize">{{ $room->room_status }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="room-filter-card p-5 text-center">
                        <h4>No rooms matched that search</h4>
                        <p class="mb-0">Try a broader budget, a different room type, or the AI assistant for better suggestions.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
