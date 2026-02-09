@extends('frontend.layouts.main')
@section('title', 'index')
@section('main-container')

<div class="banner__area" data-background="assets/img/banner-1.jpg">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="banner__area-title">
					<h1>The Best Hotel<span>Deals in the World</span></h1>
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
			<div class="col-xl-6 col-lg-4 mb-30 {{ $room->category ?? 'luxury' }}">
				<div class="deluxe__area-item">
					<div class="deluxe__area-item-image">
						<img class="img__full" src="/backend/images/product/{{ $room->image }}" alt="{{ $room->name }}">
					</div>
					<div class="deluxe__area-item-content">
						<h6><span>${{ number_format($room->price) }}</span> / Night</h6>
						<h3 class="text-light"><a href="{{ url('/roomdetails', $room->id) }}">{{ $room->name }}</a></h3>
						<p class="text-light">{{ Str::limit($room->description, 100) }}</p>
						<button type="button" class="simple-btn text-light fs-4">
							<a href="{{ url('/book', $room->id) }}" class="text-light text-decoration-none">
								Book Now
							</a>
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
									<strong>Price per night:</strong> ${{ number_format($room->price, 2) }}
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
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 lg-mb-30">
				<div class="services__area-item">
					<div class="services__area-item-icon">
						<img src="assets/img/icon/cleaning.png" alt="">
					</div>
					<div class="services__area-item-content">
						<h5><a href="#">Room Cleaning</a></h5>
						<p>Our housekeeping team ensures that every room is cleaned thoroughly and maintained to the highest standard for your comfort.</p>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 sm-mb-30">
				<div class="services__area-item">
					<div class="services__area-item-icon">
						<img src="assets/img/icon/wifi.png" alt="">
					</div>
					<div class="services__area-item-content">
						<h5><a href="#">Room Wifi</a></h5>
						<p>Enjoy seamless high-speed internet connectivity in every room, perfect for both work and leisure.</p>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
				<div class="services__area-item">
					<div class="services__area-item-icon">
						<img src="assets/img/icon/location.png" alt="">
					</div>
					<div class="services__area-item-content">
						<h5><a href="#">Pickup & Drop</a></h5>
						<p>We offer convenient pickup and drop-off services to make your travel experience hassle-free.</p>
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
						<a class="theme-border-btn" href="{{ url('/servicesdetails') }}">Read More<i
								class="fal fa-long-arrow-right"></i></a>
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
						<a class="theme-border-btn" href="{{ url('/service-details') }}">Read More<i
								class="fal fa-long-arrow-right"></i></a>
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
						<a class="theme-border-btn" href="{{ url('/servicesdetails') }}">Read More<i
								class="fal fa-long-arrow-right"></i></a>
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
						<a class="theme-border-btn" href="{{ url('/servicesdetails') }}">Read More<i
								class="fal fa-long-arrow-right"></i></a>
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

<div class="blog__area section-padding">
	<div class="container">
		<div class="row mb-60">
			<div class="col-xl-12">
				<div class="blog__area-title">
					<span class="subtitle__one">Our Blog</span>
					<h2>Read Our Blog amd News</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-4 col-lg-6 xl-mb-30">
				<div class="blog__area-item">
					<div class="blog__area-item-image">
						<a href="{{ url('/blogdetails') }}"><img src="assets/img/blog/blog-1.jpg" alt=""></a>
					</div>
					<div class="blog__area-item-content">
						<div class="blog__area-item-content-box">
							<div class="blog__area-item-content-box-date">
								<h3>27</h3>
								<span>July 2022</span>
							</div>
							<div class="blog__area-item-content-box-title">
								<h5><a href="{{ url('/blogdetails') }}">The ultimate guide to finding the best hotels in
										your area.</a></h5>
							</div>
						</div>
						<div class="blog__area-item-content-btn">
							<a class="simple-btn-2" href="{{ url('/blogdetails') }}">Read More<i
									class="fal fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-6 lg-mb-30">
				<div class="blog__area-item blog__area-item-hover">
					<div class="blog__area-item-image">
						<a href="{{ url('/blogdetails') }}"><img src="assets/img/blog/blog-2.jpg" alt=""></a>
					</div>
					<div class="blog__area-item-content">
						<div class="blog__area-item-content-box">
							<div class="blog__area-item-content-box-date">
								<h3>27</h3>
								<span>July 2022</span>
							</div>
							<div class="blog__area-item-content-box-title">
								<h5><a href="{{ url('/blogdetails') }}">Book a room Today most Affordable Rates.</a></h5>
							</div>
						</div>
						<div class="blog__area-item-content-btn">
							<a class="simple-btn-2" href="{{ url('/blogdetails') }}">Read More<i
									class="fal fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-6">
				<div class="blog__area-item">
					<div class="blog__area-item-image">
						<a href="{{ url('/blogdetails') }}"><img src="assets/img/blog/blog-3.jpg" alt=""></a>
					</div>
					<div class="blog__area-item-content">
						<div class="blog__area-item-content-box">
							<div class="blog__area-item-content-box-date">
								<h3>27</h3>
								<span>July 2022</span>
							</div>
							<div class="blog__area-item-content-box-title">
								<h5><a href="{{ url('/blogdetails') }}">Hotel Booking is the best choice for hotel
										booking.</a></h5>
							</div>
						</div>
						<div class="blog__area-item-content-btn">
							<a class="simple-btn-2" href="{{ url('/blogdetails') }}">Read More<i
									class="fal fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="scroll-up">
	<svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
		<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
	</svg>
</div>
@endsection