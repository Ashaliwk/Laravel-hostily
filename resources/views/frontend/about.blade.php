@extends('frontend.layouts.main')
@section('title', 'About us')
@section('main-container')

<div class="page__banner" data-background="assets/img/banner/page-banner-1.jpg">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="page__banner-title">
					<h1>About Us</h1>
					<div class="page__banner-title-menu">
						<ul>
							<li><a href="{{ url('/')}}">Home</a></li>
							<li><span>-</span>About Us</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page Banner End -->
<!-- Company Offers Start -->
<div class="offers__area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="offers__area-title">
					<span class="subtitle__one">Company Offers</span>
					<h2>Book now and save up to 35% On hotel rooms</h2>
					<p>Our hotel management team is dedicated to providing exceptional service and ensuring a memorable stay for our guests. From seamless check-ins to personalized experiences, we focus on every detail to exceed expectations. Trust us to make your stay comfortable, convenient, and unforgettable.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="offers__area-image">
					<img class="img__full" src="assets/img/features/offers.jpg" alt="">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="services__two">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-3 col-lg-4 col-md-6 xl-mb-30">
				<div class="services__two-item">
					<span>01</span>
					<div class="services__two-item-icon">
						<img src="assets/img/icon/cleaning-1.png" alt="">
					</div>
					<div class="services__two-item-content">
						<h4>Room Cleaning</h4>
						<p>Enjoy spotless and hygienic rooms with our daily professional housekeeping service for maximum comfort.</p>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6 lg-mb-30">
				<div class="services__two-item">
					<span>02</span>
					<div class="services__two-item-icon">
						<img src="assets/img/icon/car-parking.png" alt="">
					</div>
					<div class="services__two-item-content">
						<h4>Car Parking</h4>
						<p>Secure and spacious parking facility available 24/7 to ensure safety and convenience for your vehicle.</p>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6 lg-mb-30">
				<div class="services__two-item">
					<span>03</span>
					<div class="services__two-item-icon">
						<img src="assets/img/icon/swimming-pool.png" alt="">
					</div>
					<div class="services__two-item-content">
						<h4>Swimming Pool</h4>
						<p>Relax and refresh in our clean and well-maintained swimming pool designed for leisure and enjoyment.</p>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6">
				<div class="services__two-item">
					<span>04</span>
					<div class="services__two-item-icon">
						<img src="assets/img/icon/location-1.png" alt="">
					</div>
					<div class="services__two-item-content">
						<h4>PickUp & Drop</h4>
						<p>Reliable pickup and drop service ensuring smooth transportation to and from the hotel anytime.</p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<div class="gallery__area section-padding pb-0 overflow-hidden">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-sm-3 sm-mb-10">
				<div class="gallery__area-item">
					<a class="img-popup" href="assets/img/features/gallery-1.jpg"><img class="img__full" src="assets/img/features/gallery-1.jpg" alt=""></a>
				</div>
			</div>
			<div class="col-sm-3 sm-mb-10">
				<div class="gallery__area-item">
					<a class="img-popup" href="assets/img/features/gallery-2.jpg"><img class="img__full" src="assets/img/features/gallery-2.jpg" alt=""></a>
				</div>
			</div>
			<div class="col-sm-3 sm-mb-10">
				<div class="gallery__area-item">
					<a class="img-popup" href="assets/img/features/gallery-3.jpg"><img class="img__full" src="assets/img/features/gallery-3.jpg" alt=""></a>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="gallery__area-item">
					<a class="img-popup" href="assets/img/features/gallery-4.jpg"><img class="img__full" src="assets/img/features/gallery-4.jpg" alt=""></a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Gallery Area End -->
<!-- Team Area Start -->
<div class="team__area section-padding">
	<div class="container mb-5">
		<div class="row mb-60">
			<div class="col-xl-12">
				<div class="team__area-title">
					<span class="subtitle__one">Our Exprt Meamber</span>
					<h2>Expert Our Services man</h2>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-xl-4 col-lg-4 col-md-6 lg-mb-30">
				<div class="team__area-item">
					<div class="team__area-item-image">
						<img src="assets/img/team/team-1.jpg" alt="">
						<div class="team__area-item-image-overlay">
							<div class="team__area-item-image-overlay-social">
								<ul>
									<li><a href="#"><i class="fab fa-facebook-f"></i></a>
									</li>
									<li><a href="#"><i class="fab fa-twitter"></i></a>
									</li>
									<li><a href="#"><i class="fab fa-behance"></i></a>
									</li>
									<li><a href="#"><i class="fab fa-youtube"></i></a>
									</li>
								</ul>
							</div>
							<div class="team__area-item-image-overlay-content">
								<h5>Michelle yeoh</h5>
								<span>Services man</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-6 md-mb-30">
				<div class="team__area-item">
					<div class="team__area-item-image">
						<img src="assets/img/team/team-2.jpg" alt="">
						<div class="team__area-item-image-overlay">
							<div class="team__area-item-image-overlay-social">
								<ul>
									<li><a href="#"><i class="fab fa-facebook-f"></i></a>
									</li>
									<li><a href="#"><i class="fab fa-twitter"></i></a>
									</li>
									<li><a href="#"><i class="fab fa-behance"></i></a>
									</li>
									<li><a href="#"><i class="fab fa-youtube"></i></a>
									</li>
								</ul>
							</div>
							<div class="team__area-item-image-overlay-content">
								<h5>David Fincher</h5>
								<span>Services man</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-6">
				<div class="team__area-item">
					<div class="team__area-item-image">
						<img src="assets/img/team/team-3.jpg" alt="">
						<div class="team__area-item-image-overlay">
							<div class="team__area-item-image-overlay-social">
								<ul>
									<li><a href="#"><i class="fab fa-facebook-f"></i></a>
									</li>
									<li><a href="#"><i class="fab fa-twitter"></i></a>
									</li>
									<li><a href="#"><i class="fab fa-behance"></i></a>
									</li>
									<li><a href="#"><i class="fab fa-youtube"></i></a>
									</li>
								</ul>
							</div>
							<div class="team__area-item-image-overlay-content">
								<h5>Michelle Reis</h5>
								<span>Services man</span>
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