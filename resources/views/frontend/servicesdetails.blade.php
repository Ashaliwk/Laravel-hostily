@extends('frontend.layouts.main')
@section('title', 'About us')
@section('main-container')
<div class="page__banner" data-background="assets/img/banner/page-banner-1.jpg">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="page__banner-title">
					<h1>Services Details</h1>
					<div class="page__banner-title-menu">
						<ul>
							<li><a href="{{ url('/') }}">Home</a></li>
							<li><span>-</span>Services Details</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page Banner End -->
<!-- Services Details Start -->
<div class="services__details section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xxl-3 col-xl-4 col-lg-4 lg-mb-30">
				<div class="all__sidebar">
					<div class="all__sidebar-item">
						<h5>Category</h5>
						<div class="all__sidebar-item-category">
							<ul>
								<li><a href="{{ url('/servicesdetails') }}"><i class="far fa-angle-double-right"></i>Small Suite<span>(06)</span></a></li>
								<li><a class="active" href="{{ url('/servicesdetails') }}"><i class="far fa-angle-double-right"></i>Luxury Room<span>(08)</span></a></li>
								<li><a href="{{ url('/servicesdetails') }}"><i class="far fa-angle-double-right"></i>Single<span>(05)</span></a></li>
								<li><a href="{{ url('/servicesdetails') }}"><i class="far fa-angle-double-right"></i>Family<span>(09)</span></a></li>
								<li><a href="{{ url('/servicesdetails') }}"><i class="far fa-angle-double-right"></i>Double Room<span>(03)</span></a></li>
							</ul>
						</div>
					</div>
					<div class="all__sidebar-item-help mt-30" data-background="assets/img/hotel/hotel-9.jpg">
						<div class="all__sidebar-item-help-icon">
							<i class="fal fa-phone-alt"></i>
						</div>
						<h5> Easy solutions to your home beauty</h5>
						<div class="all__sidebar-item-help-contact">
							<div class="all__sidebar-item-help-contact-content">
								<span>Quick Help</span>
								<h6><a href="tel:+125(895)658568">+125 (895) 658 568</a></h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xxl-9 col-xl-8 col-lg-8">
				<div class="services__details-left">
					<div class="services__details-left-image mb-30">
						<img src="assets/img/luxury/luxury-5.jpg" alt="">
					</div>
					<div class="services__details-left-content">
						<h2 class="mb-30">Luxury Room</h2>
						<p class="mb-0">Our hotel offers a wide range of services designed to make your stay comfortable and memorable. From 24-hour front desk assistance to daily housekeeping, we prioritize your convenience and satisfaction. Enjoy complimentary Wi-Fi, room service, and concierge services tailored to meet your needs.</p>
						<span>We also provide specialized services, including airport transfers, laundry facilities, and event planning support. Whether you're traveling for business or leisure, our team is dedicated to ensuring your experience is seamless and enjoyable.</span>
						<p>Our state-of-the-art amenities include a fitness center, spa, and fine dining options to elevate your stay. We take pride in delivering exceptional service and creating a welcoming environment for all our guests. Trust us to provide a personalized experience that exceeds expectations.</p>
						<div class="row align-items-center mt-35 mb-35">
							<div class="col-xl-6 col-lg-12 xl-mb-30">
								<img class="img__full" src="assets/img/hotel/hotel-24.jpg" alt="">
							</div>
							<div class="col-xl-6 col-lg-12">
								<h3 class="mb-20">Customer Benefits</h3>
								<p class="m-30">Businesses A Guide To Attracting Clients To Your Agency, Amazon, Walmart or General Motors. The heart of USA, however</p>
								<div class="services__details-left-content-list">
									<p><i class="fas fa-arrow-circle-right"></i>Automotive service our clients receive</p>
									<p><i class="fas fa-arrow-circle-right"></i>Praesent efficitur quam sit amet</p>
									<p><i class="fas fa-arrow-circle-right"></i>We use the latest diagnostic equipment</p>
								</div>
							</div>
						</div>
					</div>
					<div class="room__details-right-faq mt-50">
						<div class="room__details-right-faq-item">
							<div class="room__details-right-faq-item-card">
								<div class="room__details-right-faq-item-card-header">
									<h5>Do you pay before or after booking a hotel?</h5>
									<i class="far fa-long-arrow-up"></i>
								</div>
								<div class="room__details-right-faq-item-card-header-content active">
									<p>Praesent non ullamcorper ligula. Proin a mi vitae massa lacinia sollicitudin eget eu ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque consectetur rhoncus lobortis. Curabitur sit amet velit sagittis, pellentesque diam euismod, faucibus quam. Cras non rhoncus ipsum. Quisque mattis arcu metus, a fermentum justo semper in.</p>
								</div>
							</div>
						</div>
						<div class="room__details-right-faq-item">
							<div class="room__details-right-faq-item-card">
								<div class="room__details-right-faq-item-card-header">
									<h5>What documents are needed for hotel booking?</h5>
									<i class="far fa-long-arrow-down"></i>
								</div>
								<div class="room__details-right-faq-item-card-header-content display-none">
									<p>Praesent non ullamcorper ligula. Proin a mi vitae massa lacinia sollicitudin eget eu ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque consectetur rhoncus lobortis. Curabitur sit amet velit sagittis, pellentesque diam euismod, faucibus quam. Cras non rhoncus ipsum. Quisque mattis arcu metus, a fermentum justo semper in.</p>
								</div>
							</div>
						</div>
						<div class="room__details-right-faq-item">
							<div class="room__details-right-faq-item-card">
								<div class="room__details-right-faq-item-card-header">
									<h5>Do hotels charge your card before you check in?</h5>
									<i class="far fa-long-arrow-down"></i>
								</div>
								<div class="room__details-right-faq-item-card-header-content display-none">
									<p>Praesent non ullamcorper ligula. Proin a mi vitae massa lacinia sollicitudin eget eu ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque consectetur rhoncus lobortis. Curabitur sit amet velit sagittis, pellentesque diam euismod, faucibus quam. Cras non rhoncus ipsum. Quisque mattis arcu metus, a fermentum justo semper in.</p>
								</div>
							</div>
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