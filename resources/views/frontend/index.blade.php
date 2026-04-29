@extends('frontend.layouts.main')
@section('title', 'index')
@section('main-container')

<div class="banner__area" data-background="assets/img/banner-1.jpg">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="banner__area-title">
					<h1>Best Hotel with<span>Best Deals</span></h1>
				</div>
			</div>
		</div>
		@if(session('success'))
		<div class="alert alert-success">
			{{ session('success') }}
		</div>
		@endif
	</div>
</div>

<div class="accommodations__area section-padding">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-xl-5 col-lg-6 lg-mb-30">
				<div class="accommodations__area-title">
					<span class="subtitle__one">Accommodations</span>
					<h2>Welcome to Our Hotel</h2>
					<p>Travellers are looking for more than just the next destination on the map. They are looking
						for a memorable experience and to make new friends along the way.</p>
					<a class="theme-btn" href="{{ url('/about') }}">Read More<i class="fal fa-long-arrow-right"></i></a>
				</div>
			</div>
			<div class="col-xl-7 col-lg-6">
				<div class="accommodations__area-right">
					<div class="accommodations__area-right-image">
						<img src="assets/img/hotel/hotel-1.jpg" alt="">
						<div class="accommodations__area-right-image-two">
							<img src="assets/img/hotel/hotel-2.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="deluxe__area section-padding">
	<div class="container justify-content-center">
		<div class="row align-items-end mb-60">
			<div class="col-xl-5">
				<div class="deluxe__area-title">
					<span class="subtitle__one">Deluxe and Luxury</span>
					<h2>Our Luxury Rooms</h2>
				</div>
			</div>
			<div class="col-xl-7">
				<div class="deluxe__area-btn">
					<ul>
						<li class="active" data-filter="*">All Rooms</li>
						<li data-filter=".luxury">Luxury</li>
						<li data-filter=".single">Single</li>
						<li data-filter=".suite">Small Suite</li>
						<li data-filter=".family">Family</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row deluxe__area-active">
			@forelse ($rooms as $room)
			<div class="col-xl-6 col-lg-4 mb-30 {{ strtolower($room->room_type) ?: ($room->category ?? 'luxury') }}">
				<div class="deluxe__area-item">
					<div class="deluxe__area-item-image">
						<img class="img__full" src="/backend/images/product/{{ $room->image }}" alt="{{ $room->name }}">
					</div>
					<div class="deluxe__area-item-content">
						<h6><span>{{ number_format($room->price) }} PKR</span> / Night</h6>
						<h3 class="text-light"><a href="{{ url('/roomdetails', $room->id) }}">{{ $room->name }}</a></h3>
						<p class="text-light">{{ Str::limit($room->description, 100) }}</p>
						<button type="button" class="simple-btn text-light fs-4 {{ $room->room_status != 'available' ? 'disabled bg-secondary text-capitalize' : '' }}" {{ $room->room_status != 'available' ? 'disabled' : '' }} style="{{ $room->room_status != 'available' ? 'cursor: not-allowed;' : '' }}">
							@if($room->room_status == 'available')
							<a href="{{ url('/book', $room->id) }}" class="text-light text-decoration-none">
								Book Now
							</a>
							@else
							<span class="text-light text-decoration-none text-capitalize">
								{{ $room->room_status }}
							</span>
							@endif
						</button>
					</div>
				</div>
			</div>

			<div class="modal fade" id="bookingModal-{{ $room->id }}" tabindex="-1" aria-labelledby="bookingModalLabel-{{ $room->id }}" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="bookingModalLabel-{{ $room->id }}">Book: {{ $room->name }}</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							@if(session('error'))
							<div class="alert alert-danger">{{ session('error') }}</div>
							@endif
							@if(session('success'))
							<div class="alert alert-success">{{ session('success') }}</div>
							@endif

							<form action="{{ route('book.room') }}" method="POST">
								@csrf
								<input type="hidden" name="room_id" value="{{ $room->id }}">

								<div class="row">
									<div class="col-md-6 mb-3">
										<label class="form-label">Check-in Date</label>
										<input type="date" class="form-control" name="check_in"
											min="{{ date('Y-m-d') }}" required>
									</div>
									<div class="col-md-6 mb-3">
										<label class="form-label">Check-out Date</label>
										<input type="date" class="form-control" name="check_out"
											min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
									</div>
								</div>

								<div class="mb-3">
									<label class="form-label">Number of Guests</label>
									<select class="form-select" name="guests" required>
										<option value="1">1 Guest</option>
										<option value="2" selected>2 Guests</option>
										<option value="3">3 Guests</option>
										<option value="4">4 Guests</option>
										<option value="5">5 Guests</option>
										<option value="6">6+ Guests</option>
									</select>
								</div>

								<div class="alert alert-info mb-4">
									<strong>Price per night:</strong> {{ number_format($room->price, 2) }} PKR
								</div>

								<button type="submit" class="theme-btn w-100">
									Confirm Booking <i class="fal fa-long-arrow-right"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			@empty
			<div class="col-12 text-center py-5">
				<h4>No rooms available at the moment.</h4>
				<p>Please check back later.</p>
			</div>
			@endforelse
		</div>
	</div>
</div>

<div class="video__area" data-background="assets/img/video.jpg">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-xxl-6 col-xl-7 col-lg-8">
				<div class="video__area-title">
					<h2>Book hotel rooms, get deals & book flights online.</h2>
				</div>
			</div>
			<div class="col-xxl-6 col-xl-5 col-lg-4">
				<div class="video__area-right">
					<div class="video__play">
						<a class="video-popup" href="https://www.youtube.com/watch?v=MZLXGYTKsDU"><i
								class="fas fa-play"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="services__area section-padding">
	<div class="container">
		<div class="row mb-50">
			<div class="col-xl-7">
				<div class="services__area-title">
					<span class="subtitle__one">What We Offer</span>
					<h2>Our Premium Hotel Services</h2>
				</div>
			</div>
			<div class="col-xl-5 d-flex align-items-end justify-content-xl-end mt-3 mt-xl-0">
				<a class="theme-btn" href="{{ url('/servicesteam') }}">All Services <i class="fal fa-long-arrow-right"></i></a>
			</div>
		</div>
		<div class="row">
			{{-- 1. Housekeeping --}}
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
				<div class="services__area-item">
					<div class="services__area-item-icon">
						<img src="assets/img/icon/cleaning.png" alt="Housekeeping">
					</div>
					<div class="services__area-item-content">
						<h5><a href="{{ url('/servicesteam') }}">Housekeeping</a></h5>
						<p>Daily room cleaning, linen change, and turndown service ensuring a spotless, fresh environment throughout your stay.</p>
					</div>
				</div>
			</div>
			{{-- 2. High-Speed Wi-Fi --}}
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
				<div class="services__area-item">
					<div class="services__area-item-icon">
						<img src="assets/img/icon/wifi.png" alt="Wi-Fi">
					</div>
					<div class="services__area-item-content">
						<h5><a href="{{ url('/servicesteam') }}">High-Speed Wi-Fi</a></h5>
						<p>Blazing-fast complimentary Wi-Fi throughout every corner of the hotel — rooms, lobbies, restaurant, and pool areas.</p>
					</div>
				</div>
			</div>
			{{-- 3. Airport Transfer --}}
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
				<div class="services__area-item">
					<div class="services__area-item-icon">
						<img src="assets/img/icon/location.png" alt="Airport Transfer">
					</div>
					<div class="services__area-item-content">
						<h5><a href="{{ url('/servicesteam') }}">Airport Transfer</a></h5>
						<p>Seamless pickup and drop-off between the airport and hotel in air-conditioned vehicles. Book in advance for a stress-free arrival.</p>
					</div>
				</div>
			</div>
			{{-- 4. 24-Hr Room Service --}}
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
				<div class="services__area-item">
					<div class="services__area-item-icon">
						<img src="assets/img/icon/breakfast.png" alt="Room Service">
					</div>
					<div class="services__area-item-content">
						<h5><a href="{{ url('/servicesteam') }}">24-Hr Room Service</a></h5>
						<p>Order from our full menu any time of day or night and have delicious meals delivered directly to your room.</p>
					</div>
				</div>
			</div>
			{{-- 5. Swimming Pool --}}
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
				<div class="services__area-item">
					<div class="services__area-item-icon">
						<img src="assets/img/icon/swimming-pool.png" alt="Swimming Pool">
					</div>
					<div class="services__area-item-content">
						<h5><a href="{{ url('/servicesteam') }}">Swimming Pool</a></h5>
						<p>Take a refreshing dip in our heated outdoor pool complete with lounge chairs, poolside service, and towel provisions.</p>
					</div>
				</div>
			</div>
			{{-- 6. Car Parking --}}
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
				<div class="services__area-item">
					<div class="services__area-item-icon">
						<img src="assets/img/icon/car-parking.png" alt="Car Parking">
					</div>
					<div class="services__area-item-content">
						<h5><a href="{{ url('/servicesteam') }}">Secure Car Parking</a></h5>
						<p>24-hour monitored on-site parking with optional valet service so you can arrive and leave with complete ease.</p>
					</div>
				</div>
			</div>
			{{-- 7. Spa & Wellness --}}
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
				<div class="services__area-item">
					<div class="services__area-item-icon">
						<img src="assets/img/icon/list-2.png" alt="Spa">
					</div>
					<div class="services__area-item-content">
						<h5><a href="{{ url('/servicesteam') }}">Spa &amp; Wellness</a></h5>
						<p>Indulge in relaxing massages, facials, and sauna sessions at our full-service spa for complete mind and body rejuvenation.</p>
					</div>
				</div>
			</div>
			{{-- 8. Fitness Center --}}
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
				<div class="services__area-item">
					<div class="services__area-item-icon">
						<img src="assets/img/icon/list-4.png" alt="Fitness">
					</div>
					<div class="services__area-item-content">
						<h5><a href="{{ url('/servicesteam') }}">Fitness Center</a></h5>
						<p>Stay active with our fully equipped gym featuring treadmills, free weights, and cardio machines open daily for all guests.</p>
					</div>
				</div>
			</div>
			{{-- 9. Concierge --}}
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
				<div class="services__area-item">
					<div class="services__area-item-icon">
						<img src="assets/img/icon/key.png" alt="Concierge">
					</div>
					<div class="services__area-item-content">
						<h5><a href="{{ url('/servicesteam') }}">Concierge Service</a></h5>
						<p>Our concierge team handles tour bookings, restaurant reservations, event tickets, and personalised local recommendations.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="feature__area">
	<div class="container">
		<div class="row align-items-center bg-left mb-60">
			<div class="col-xl-6 col-lg-6">
				<div class="feature__area-image">
					<img class="img__full" src="assets/img/features/feature-1.jpg" alt="">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6">
				<div class="feature__area-left">
					<div class="feature__area-left-title">
						<span class="subtitle__one">Our Food</span>
						<h2>Restaurant Silo</h2>
						<p>Our housekeeping team ensures that every room is cleaned thoroughly and maintained to the highest standard for your comfort.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row align-items-center bg-right mb-60">
			<div class="col-xl-6 col-lg-6  order-last order-lg-first">
				<div class="feature__area-left">
					<div class="feature__area-left-title">
						<span class="subtitle__one">Read Our Books</span>
						<h2>The Library</h2>
						<p>Relax with a wide selection of books and a serene atmosphere in our library, perfect for unwinding.</p>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6">
				<div class="feature__area-image">
					<img class="img__full" src="assets/img/features/feature-2.jpg" alt="">
				</div>
			</div>
		</div>
		<div class="row align-items-center bg-left mb-60">
			<div class="col-xl-6 col-lg-6">
				<div class="feature__area-image">
					<img class="img__full" src="assets/img/features/feature-3.jpg" alt="">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6">
				<div class="feature__area-left">
					<div class="feature__area-left-title">
						<span class="subtitle__one">Fitness Equipment</span>
						<h2>Exercise equipment</h2>
						<p>Stay active with our state-of-the-art fitness equipment, available to help you maintain your routine.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row align-items-center bg-right">
			<div class="col-xl-6 col-lg-6 order-last order-lg-first">
				<div class="feature__area-left">
					<div class="feature__area-left-title">
						<span class="subtitle__one">Experiences</span>
						<h2>Swimming Pool</h2>
						<p>Take a refreshing dip in our pool and enjoy a relaxing experience in a serene environment.</p>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6">
				<div class="feature__area-image">
					<img class="img__full" src="assets/img/features/feature-4.jpg" alt="">
				</div>
			</div>
		</div>
	</div>
</div>

<div class="services__area section-padding" style="background:#122238;">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-7 text-white">
				<span class="subtitle__one">AI Modules</span>
				<h2 class="text-white">Smarter booking help, search, and guest insight</h2>
				<p class="mb-0">Hostily now includes a smart chatbot, personalized room recommendations, natural language room search, and review sentiment analysis.</p>
			</div>
			<div class="col-lg-5 text-lg-end mt-4 mt-lg-0">
				<a class="theme-btn" href="{{ route('ai.suggest.form') }}">Open AI Concierge<i class="fal fa-long-arrow-right"></i></a>
				<a class="simple-btn text-white ml-3" href="{{ route('reviews.index') }}">See Review Insights</a>
			</div>
		</div>
	</div>
</div>

<div class="blog__area section-padding">
	<div class="container">
		<div class="row mb-60">
			<div class="col-xl-8">
				<div class="blog__area-title">
					<span class="subtitle__one">Our Blog</span>
					<h2>Fresh stories from the Hostily journal</h2>
				</div>
			</div>
			<div class="col-xl-4 text-xl-end mt-3 mt-xl-0">
				<a class="theme-btn" href="{{ route('blogs.index') }}">View All Blogs<i class="fal fa-long-arrow-right"></i></a>
			</div>
		</div>
		<div class="row">
			@forelse(($blogs ?? collect()) as $blog)
				<div class="col-xl-4 col-lg-6 mb-30">
					<div class="blog__area-item h-100">
						<div class="blog__area-item-image">
							<a href="{{ route('blogs.show', $blog->slug) }}"><img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}"></a>
						</div>
						<div class="blog__area-item-content">
							<div class="blog__area-item-content-box">
								<div class="blog__area-item-content-box-date">
									<h3>{{ optional($blog->published_at)->format('d') ?? '01' }}</h3>
									<span>{{ optional($blog->published_at)->format('M Y') ?? 'Hostily' }}</span>
								</div>
								<div class="blog__area-item-content-box-title">
									<h5><a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a></h5>
									<p class="mt-10 mb-0">{{ $blog->excerpt }}</p>
								</div>
							</div>
							<div class="blog__area-item-content-btn">
								<a class="simple-btn-2" href="{{ route('blogs.show', $blog->slug) }}">Read More<i class="fal fa-long-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			@empty
				<div class="col-12">
					<p class="mb-0 text-muted">Blog posts will appear here once they are published.</p>
				</div>
			@endforelse
		</div>
	</div>
</div>

<div class="scroll-up">
	<svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
		<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
	</svg>
</div>
@endsection
