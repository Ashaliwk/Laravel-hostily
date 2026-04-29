@extends('frontend.layouts.main')
@section('title', 'AI Room Finder')
@section('main-container')

<style>
    .ai-panel {
        background: #fff;
        border: 1px solid #e8ebf3;
        border-radius: 16px;
        box-shadow: 0 16px 36px rgba(18, 34, 56, 0.06);
    }
    .ai-shell { background: #f6f7fb; }
    .filter-label {
        font-weight: 600;
        font-size: 14px;
        color: #3a3a3a;
        margin-bottom: 6px;
        display: block;
    }
    .form-control {
        border-radius: 10px;
        border: 1px solid #dde1ed;
        padding: 10px 14px;
        font-size: 14px;
    }
    .form-control:focus {
        border-color: #c8a86b;
        box-shadow: 0 0 0 3px rgba(200,168,107,0.15);
        outline: none;
    }
    .room-card-img {
        height: 200px;
        object-fit: cover;
        width: 100%;
        border-radius: 12px 12px 0 0;
    }
    .badge-tag {
        display: inline-block;
        background: #f0ebe0;
        color: #7a5c1e;
        border-radius: 20px;
        padding: 3px 10px;
        font-size: 12px;
        font-weight: 600;
        margin-right: 4px;
        margin-bottom: 4px;
    }
    .room-price {
        font-size: 18px;
        font-weight: 700;
        color: #c8a86b;
    }
    .no-results-box {
        background: #fff8f0;
        border: 1px dashed #c8a86b;
        border-radius: 14px;
        padding: 40px;
        text-align: center;
    }
    .feature-icon { font-size: 28px; margin-bottom: 10px; display: block; }
</style>

<div class="page__banner" data-background="{{ asset('assets/img/banner/page-banner-8.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page__banner-title">
                    <h1>AI Room Finder</h1>
                    <div class="page__banner-title-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>-</span>AI Room Finder</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ai-shell section-padding">
    <div class="container">

        {{-- Feature highlights --}}
        <div class="row g-4 mb-5">
            <div class="col-lg-3 col-md-6">
                <div class="ai-panel p-4 h-100 text-center">
                    <span class="feature-icon">💰</span>
                    <h6 class="mb-1">Budget Filter</h6>
                    <p class="mb-0 text-muted" style="font-size:13px;">Only rooms within your set budget are shown.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ai-panel p-4 h-100 text-center">
                    <span class="feature-icon">👥</span>
                    <h6 class="mb-1">Guest Capacity</h6>
                    <p class="mb-0 text-muted" style="font-size:13px;">Matches rooms that can accommodate your group.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ai-panel p-4 h-100 text-center">
                    <span class="feature-icon">❄️</span>
                    <h6 class="mb-1">AC / Non-AC</h6>
                    <p class="mb-0 text-muted" style="font-size:13px;">Choose the comfort level you prefer.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ai-panel p-4 h-100 text-center">
                    <span class="feature-icon">🍽️</span>
                    <h6 class="mb-1">Meal & Amenities</h6>
                    <p class="mb-0 text-muted" style="font-size:13px;">Filter by meal plan, WiFi, and parking needs.</p>
                </div>
            </div>
        </div>

        {{-- Filter Form --}}
        <div class="ai-panel p-4 p-lg-5 mb-5">
            <span class="subtitle__one">Smart Room Finder</span>
            <h2 class="mb-2">Set your preferences</h2>
            <p class="mb-4 text-muted">Fill in your requirements below and we'll show you all available rooms that fit.</p>

            <form action="{{ route('ai.suggest') }}" method="POST">
                @csrf
                <div class="row g-3">

                    {{-- Budget --}}
                    <div class="col-md-4">
                        <label class="filter-label">Max Budget (PKR / night)</label>
                        <input
                            type="number"
                            name="budget"
                            class="form-control"
                            value="{{ old('budget', $filters['budget'] ?? '') }}"
                            min="0"
                            placeholder="e.g. 6000"
                            required
                        >
                        <small class="text-muted">Only rooms <strong>under</strong> this amount will appear.</small>
                    </div>

                    {{-- Persons --}}
                    <div class="col-md-4">
                        <label class="filter-label">Number of Guests</label>
                        <input
                            type="number"
                            name="persons"
                            class="form-control"
                            value="{{ old('persons', $filters['persons'] ?? 1) }}"
                            min="1"
                            max="20"
                            required
                        >
                    </div>

                    {{-- AC --}}
                    <div class="col-md-4">
                        <label class="filter-label">AC Preference</label>
                        <select name="ac_type" class="form-control">
                            <option value="any" {{ (old('ac_type', $filters['ac_type'] ?? 'any') === 'any') ? 'selected' : '' }}>Any</option>
                            <option value="AC"     {{ (old('ac_type', $filters['ac_type'] ?? '') === 'AC')     ? 'selected' : '' }}>AC</option>
                            <option value="Non-AC" {{ (old('ac_type', $filters['ac_type'] ?? '') === 'Non-AC') ? 'selected' : '' }}>Non-AC</option>
                        </select>
                    </div>

                    {{-- WiFi --}}
                    <div class="col-md-4">
                        <label class="filter-label">Free WiFi</label>
                        <select name="wifi" class="form-control">
                            <option value="any" {{ (old('wifi', $filters['wifi'] ?? 'any') === 'any') ? 'selected' : '' }}>Any</option>
                            <option value="yes" {{ (old('wifi', $filters['wifi'] ?? '') === 'yes') ? 'selected' : '' }}>Required</option>
                            <option value="no"  {{ (old('wifi', $filters['wifi'] ?? '') === 'no')  ? 'selected' : '' }}>Not needed</option>
                        </select>
                    </div>

                    {{-- Parking --}}
                    <div class="col-md-4">
                        <label class="filter-label">Free Parking</label>
                        <select name="parking" class="form-control">
                            <option value="any" {{ (old('parking', $filters['parking'] ?? 'any') === 'any') ? 'selected' : '' }}>Any</option>
                            <option value="yes" {{ (old('parking', $filters['parking'] ?? '') === 'yes') ? 'selected' : '' }}>Required</option>
                            <option value="no"  {{ (old('parking', $filters['parking'] ?? '') === 'no')  ? 'selected' : '' }}>Not needed</option>
                        </select>
                    </div>

                    {{-- Meal Plan --}}
                    <div class="col-md-4">
                        <label class="filter-label">Meal Plan</label>
                        <select name="meal_plan" class="form-control">
                            <option value="any"        {{ (old('meal_plan', $filters['meal_plan'] ?? 'any') === 'any')        ? 'selected' : '' }}>Any</option>
                            <option value="Breakfast"  {{ (old('meal_plan', $filters['meal_plan'] ?? '') === 'Breakfast')  ? 'selected' : '' }}>Breakfast</option>
                            <option value="Lunch"      {{ (old('meal_plan', $filters['meal_plan'] ?? '') === 'Lunch')      ? 'selected' : '' }}>Lunch</option>
                            <option value="Dinner"     {{ (old('meal_plan', $filters['meal_plan'] ?? '') === 'Dinner')     ? 'selected' : '' }}>Dinner</option>
                            <option value="Full Board" {{ (old('meal_plan', $filters['meal_plan'] ?? '') === 'Full Board') ? 'selected' : '' }}>Full Board</option>
                        </select>
                    </div>

                </div>

                <div class="mt-4">
                    <button type="submit" class="theme-btn" id="find-rooms-btn">
                        Find Matching Rooms <i class="fal fa-long-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>

        {{-- Results --}}
        @if(isset($rooms))
            <div class="mb-2 d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <span class="subtitle__one">Results</span>
                    <h3 class="mb-0">
                        @if($rooms->isEmpty())
                            No rooms found
                        @else
                            {{ $rooms->count() }} room{{ $rooms->count() !== 1 ? 's' : '' }} match your criteria
                        @endif
                    </h3>
                </div>
                @if(isset($filters['budget']) && $filters['budget'])
                    <div class="ai-panel px-3 py-2" style="font-size:13px;">
                        Showing rooms under <strong>PKR {{ number_format($filters['budget']) }}</strong>
                        @if(isset($filters['persons'])) &nbsp;·&nbsp; Up to <strong>{{ $filters['persons'] }} guest(s)</strong> @endif
                    </div>
                @endif
            </div>

            <div class="row mt-4">
                @forelse ($rooms as $room)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="ai-panel h-100 overflow-hidden">
                            <img
                                class="room-card-img"
                                src="{{ asset('backend/images/product/' . $room->image) }}"
                                alt="{{ $room->name }}"
                            >
                            <div class="p-4">
                                <h5 class="mb-1">
                                    <a href="{{ route('room.details', $room->id) }}" style="color:inherit;">{{ $room->name }}</a>
                                </h5>
                                <p class="text-muted mb-3" style="font-size:13px;">{{ \Illuminate\Support\Str::limit($room->description, 80) }}</p>

                                <div class="mb-3">
                                    @if($room->ac_type)
                                        <span class="badge-tag">{{ $room->ac_type }}</span>
                                    @endif
                                    @if($room->is_wifi)
                                        <span class="badge-tag">📶 WiFi</span>
                                    @endif
                                    @if($room->is_parking)
                                        <span class="badge-tag">🅿️ Parking</span>
                                    @endif
                                    @if($room->meal_plan && $room->meal_plan !== 'None')
                                        <span class="badge-tag">🍽️ {{ $room->meal_plan }}</span>
                                    @endif
                                    @if($room->max_persons)
                                        <span class="badge-tag">👥 {{ $room->max_persons }} guests</span>
                                    @endif
                                </div>

                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="room-price">PKR {{ number_format($room->price) }}<small style="font-size:12px;font-weight:400;color:#999;"> / night</small></span>
                                    <a href="{{ route('room.details', $room->id) }}" class="simple-btn">View Room</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="no-results-box">
                            <span style="font-size:48px;">🔍</span>
                            <h4 class="mt-3 mb-2">No rooms match these filters</h4>
                            <p class="text-muted mb-3">Try increasing your budget or relaxing some preferences.</p>
                            <a href="{{ url('/roomlist') }}" class="theme-btn">Browse All Rooms <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                @endforelse
            </div>
        @endif

    </div>
</div>

@endsection
