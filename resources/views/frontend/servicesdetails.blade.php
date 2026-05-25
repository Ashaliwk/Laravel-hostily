@extends('frontend.layouts.main')
@section('title', 'Service Details')
@section('main-container')

@php
    $serviceGroups = [
        'stay' => [
            'title' => 'Stay Comfort',
            'intro' => 'Room-centered services that shape the day-to-day guest experience.',
            'items' => [
                ['name' => 'Housekeeping', 'detail' => 'Daily refresh, linen care, evening turndown, and fast response for extra essentials.'],
                ['name' => '24-Hr Room Service', 'detail' => 'Breakfast, late snacks, and full-day dining sent directly to the room.'],
                ['name' => 'Breakfast Service', 'detail' => 'Flexible breakfast options for business travelers, couples, and family bookings.'],
            ],
        ],
        'wellness' => [
            'title' => 'Wellness and Leisure',
            'intro' => 'Spaces designed for rest, recreation, and recovery throughout the stay.',
            'items' => [
                ['name' => 'Swimming Pool', 'detail' => 'Pool deck seating, family-friendly access windows, and towel support.'],
                ['name' => 'Fitness Center', 'detail' => 'Cardio, free weights, and trainer-friendly space for regular routines.'],
                ['name' => 'Spa and Wellness', 'detail' => 'Massage, recovery sessions, and quiet recharge time after travel.'],
            ],
        ],
        'support' => [
            'title' => 'Guest Support',
            'intro' => 'Services that reduce friction before arrival, during the stay, and at checkout.',
            'items' => [
                ['name' => 'Airport Transfer', 'detail' => 'Planned pickups and drop-offs for smoother arrivals and departures.'],
                ['name' => 'Concierge', 'detail' => 'Recommendations, restaurant bookings, city help, and local coordination.'],
                ['name' => 'Parking and Security', 'detail' => 'Secure on-site parking, monitored access, and front-desk support around the clock.'],
            ],
        ],
        'events' => [
            'title' => 'Events and Work',
            'intro' => 'Support for corporate, social, and long-form guest needs beyond the room itself.',
            'items' => [
                ['name' => 'Conference Halls', 'detail' => 'Meeting-ready rooms with planning support and service coordination.'],
                ['name' => 'Banquet and Wedding Support', 'detail' => 'Event setup, guest flow management, catering, and hospitality coverage.'],
                ['name' => 'Business Center', 'detail' => 'Reliable connectivity, quiet work areas, and print-ready convenience.'],
            ],
        ],
    ];
@endphp

<style>
    .service-shell {
        background: #f6f7fb;
    }
    .service-panel {
        background: #fff;
        border: 1px solid #e8ebf3;
        border-radius: 16px;
        box-shadow: 0 16px 36px rgba(18, 34, 56, 0.06);
    }
    .service-nav a {
        display: block;
        padding: 12px 14px;
        border-radius: 12px;
        background: #f7f1e8;
        color: #6d5425;
        margin-bottom: 10px;
        font-weight: 600;
    }
    .service-room-card img {
        height: 220px;
        object-fit: cover;
    }
</style>

<div class="page__banner" data-background="{{ asset('assets/img/banner/page-banner-1.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page__banner-title">
                    <h1>Service Details</h1>
                    <div class="page__banner-title-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>-</span>Service Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="service-shell section-padding">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-4 col-lg-5">
                <div class="service-panel p-4 mb-4">
                    <span class="subtitle__one">Explore Categories</span>
                    <h4 class="mb-3">Jump to a service area</h4>
                    <div class="service-nav">
                        @foreach($serviceGroups as $key => $group)
                            <a href="#service-{{ $key }}">{{ $group['title'] }}</a>
                        @endforeach
                    </div>
                </div>

                <div class="service-panel p-4">
                    <span class="subtitle__one">Room Coverage</span>
                    <h4 class="mb-3">Services connected to room types</h4>
                    <p class="mb-0">Room-specific value now shows more clearly: meal plan, bedding, guest capacity, Wi-Fi, parking access, and stay style are surfaced alongside the service groups below.</p>
                </div>
            </div>

            <div class="col-xl-8 col-lg-7">
                @foreach($serviceGroups as $key => $group)
                    <div class="service-panel p-4 p-lg-5 mb-4" id="service-{{ $key }}">
                        <span class="subtitle__one">{{ $group['title'] }}</span>
                        <h3 class="mb-3">{{ $group['intro'] }}</h3>
                        <div class="row">
                            @foreach($group['items'] as $item)
                                <div class="col-md-4 mb-3">
                                    <div class="service-panel p-3 h-100 shadow-none">
                                        <h5 class="mb-2">{{ $item['name'] }}</h5>
                                        <p class="mb-0">{{ $item['detail'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <div class="service-panel p-4 p-lg-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <span class="subtitle__one">Featured Rooms</span>
                            <h3 class="mb-0">Room content tied to services</h3>
                        </div>
                        <a href="{{ url('/roomlist') }}" class="simple-btn">See Full Room List</a>
                    </div>
                    <div class="row">
                        @forelse($rooms as $room)
                            <div class="col-md-6 mb-4">
                                <div class="service-room-card service-panel h-100 overflow-hidden">
                                    <img class="img__full" src="{{ asset('backend/images/product/' . $room->image) }}" alt="{{ $room->name }}">
                                    <div class="p-4">
                                        <h5><a href="{{ route('room.details', $room->id) }}">{{ $room->name }}</a></h5>
                                        <p class="mb-3">{{ \Illuminate\Support\Str::limit($room->description, 110) }}</p>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2"><i class="fas fa-users mr-2"></i>{{ $room->max_persons ?? 2 }} Guests</li>
                                            <li class="mb-2"><i class="fas fa-bed mr-2"></i>{{ $room->bed_type ?? 'Premium Bed' }}</li>
                                            <li class="mb-2"><i class="fas fa-utensils mr-2"></i>{{ $room->meal_plan ?? 'Flexible Meals' }}</li>
                                            <li><i class="fas fa-wifi mr-2"></i>{{ $room->is_wifi ? 'WiFi Included' : 'WiFi on request' }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="mb-0 text-muted">Rooms will appear here once room records are available.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="service-panel p-4 p-lg-5 mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <span class="subtitle__one">Operations Team</span>
                    <h3 class="mb-0">People behind the guest experience</h3>
                </div>
            </div>
            <div class="row">
                {{-- Hardcoded Hotel Manager --}}
                @forelse($teams as $team)
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="service-panel h-100 overflow-hidden">
                            <img class="img__full" src="{{ asset('uploads/team/'.$team->image) }}" alt="{{ $team->fullname }}" style="object-fit:cover;height:220px;width:100%;display:block;">
                            <div class="p-3">
                                <h6 class="mb-1">{{ $team->fullname }}</h6>
                                <p class="mb-0 text-muted">{{ $team->designation }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="mb-0 text-muted">Team profiles will appear here when they are added from the admin area.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
