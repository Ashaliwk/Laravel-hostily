@extends('frontend.layouts.main')
@section('title', 'AI Room Suggestion')
@section('main-container')

<div class="banner__area" data-background="assets/img/banner-1.jpg">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="banner__area-title">
					<h1>AI Room <span>Suggestion</span></h1>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header text-white py-3" style="background: orange;">
                        <h4 class="mb-0 text-white"><i class="fas fa-robot"></i> Find Your Perfect Room with AI</h4>
                    </div>
                    <div class="card-body p-4 bg-light">
                        <form action="{{ route('ai.suggest') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-3 mb-3">
                                    <label>Required Persons</label>
                                    <input type="number" name="persons" class="form-control" value="{{ old('persons', 2) }}" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Max Budget ($)</label>
                                    <input type="number" name="budget" class="form-control" value="{{ old('budget', 500) }}" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Room Type</label>
                                    <select name="room_type" class="form-control">
                                        <option value="any">Any</option>
                                        <option value="economy">Economy</option>
                                        <option value="luxury">Luxury</option>
                                        <option value="suite">Suite</option>
                                        <option value="family">Family</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>AC/Non-AC</label>
                                    <select name="ac_type" class="form-control">
                                        <option value="any">Any</option>
                                        <option value="AC">AC</option>
                                        <option value="Non-AC">Non-AC</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Meal Plan</label>
                                    <select name="meal_plan" class="form-control">
                                        <option value="any">Any</option>
                                        <option value="No Meal">No Meal</option>
                                        <option value="Breakfast">Breakfast</option>
                                        <option value="Lunch">Lunch</option>
                                        <option value="Dinner">Dinner</option>
                                        <option value="Full Board">Full Board</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Bed Type</label>
                                    <select name="bed_type" class="form-control">
                                        <option value="any">Any</option>
                                        <option value="Single Bed">Single Bed</option>
                                        <option value="Double Bed">Double Bed</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Need WiFi?</label>
                                    <select name="wifi" class="form-control">
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Need Parking?</label>
                                    <select name="parking" class="form-control">
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4 text-center">
                                <button type="submit" class="theme-btn w-100 py-3 fs-5" style="border: none; outline: none; cursor: pointer;">
                                    Get AI Suggestions <i class="fas fa-magic"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @if(isset($rooms))
                <div class="col-lg-12 mt-5">
                    <h3 class="mb-4 border-bottom pb-2">AI Recommended Rooms</h3>
                    <div class="row deluxe__area-active">
                        @forelse ($rooms as $room)
                        <div class="col-xl-4 col-lg-6 mb-30">
                            <div class="deluxe__area-item h-100 shadow-sm" style="border: 1px solid #eee; border-radius: 10px; overflow: hidden; background: #fff;">
                                <div class="deluxe__area-item-image">
                                    <img class="img__full" src="/backend/images/product/{{ $room->image }}" alt="{{ $room->name }}" style="height: 250px; object-fit: cover;">
                                </div>
                                <div class="deluxe__area-item-content bg-white p-4">
                                    <h6 class="text-warning mb-2" style="color: orange !important;"><span>{{ number_format($room->price) }} PKR</span> / Night</h6>
                                    <h3><a href="{{ url('/roomdetails', $room->id) }}">{{ $room->name }}</a> <span class="badge bg-secondary fs-6 ml-2">{{ ucfirst($room->room_type) }}</span></h3>
                                    
                                    <ul class="list-unstyled mt-3 mb-4" style="color: #666; font-size: 14px; line-height: 2;">
                                        <li><i class="fas fa-users text-warning mr-2"></i> Max Persons: {{ $room->max_persons ?? 'N/A' }}</li>
                                        <li><i class="fas fa-snowflake text-warning mr-2"></i> AC: {{ $room->ac_type ?? 'N/A' }}</li>
                                        <li><i class="fas fa-bed text-warning mr-2"></i> Bed: {{ $room->bed_type ?? 'N/A' }}</li>
                                        <li><i class="fas fa-utensils text-warning mr-2"></i> Meal: {{ $room->meal_plan ?? 'N/A' }}</li>
                                        <li class="mt-3">
                                            @if($room->is_wifi) <span class="badge badge-success p-2 mr-1"><i class="fas fa-wifi"></i> WiFi</span> @endif
                                            @if($room->is_parking) <span class="badge badge-info p-2"><i class="fas fa-parking"></i> Parking</span> @endif
                                        </li>
                                    </ul>
                                    
                                    <a href="{{ url('/book', $room->id) }}" class="theme-btn w-100 text-center d-block">Book Now</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center py-5 bg-light rounded shadow-sm">
                            <i class="fas fa-search-minus fa-3x text-muted mb-3"></i>
                            <h4>No rooms match your specific criteria.</h4>
                            <p>Try adjusting your budget or requirements.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
