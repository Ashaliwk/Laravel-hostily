@extends('frontend.layouts.main')
@section('title', 'About us')
@section('main-container')

<div class="page__banner" data-background="assets/img/banner/page-banner-9.jpg">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="page__banner-title">
					<h1>Book now</h1>
					<div class="page__banner-title-menu">
						<ul>
							<li><a href="{{ url('/') }}">Home</a></li>
							<li><span>-</span>Book now</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="contact__area section-padding pb-0">
	<div class="container">
		<div class="row">
			<div class="col-xl-5 col-lg-5 lg-mb-30">
				<div class="contact__area-title">
					<h3 class="mb-25">Get In Touch</h3>
					<p>For any inquiries or assistance, please don’t hesitate to contact us. Our dedicated hotel management team is available 24/7 to ensure your questions are answered and your needs are met. Reach out to us for reservations, special requests, or general information.</p>
				</div>
				<div class="contact__area-info">
					<div class="contact__area-info-item">
						<div class="contact__area-info-item-icon">
							<i class="fal fa-phone-alt"></i>
						</div>
						<div class="contact__area-info-item-content">
							<span>Emergency Help</span>
							<h6><a href="tel:+923097239667">+92309-7239667</a></h6>
						</div>
					</div>
					<div class="contact__area-info-item">
						<div class="contact__area-info-item-icon">
							<i class="fal fa-envelope"></i>
						</div>
						<div class="contact__area-info-item-content">
							<span>Quick Email</span>
							<h6><a href="mailto:hostily53@gamil.com">hostily53@gamil.com</a></h6>
						</div>
					</div>
					<div class="contact__area-info-item">
						<div class="contact__area-info-item-icon">
							<i class="fal fa-map-marker-alt"></i>
						</div>
						<div class="contact__area-info-item-content">
							<span>Office Address</span>
							<h6><a href="#">Johar town, 57,000 Lahore, PAK</a></h6>
						</div>
					</div>
				</div>
				<div class="contact__area-social">
					<ul>
						<li><a href="{{ url('#')}}"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="{{ url('#')}}"><i class="fab fa-twitter"></i></a></li>
						<li><a href="{{ url('#')}}"><i class="fab fa-behance"></i></a></li>
						<li><a href="{{ url('#')}}"><i class="fab fa-youtube"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-xl-7 col-lg-7">
				<div class="contact__area-form">
					<h3 class="mb-35">Book now</h3>
					<form action="{{ route('contact.store') }}" method="POST">
						@csrf
						<div class="row">
							<div class="col-sm-6 mb-30">
								<div class="contact__area-form-item">
									<i class="fal fa-user"></i>
									<input type="text" name="name" placeholder="Full Name" required>
								</div>
							</div>
							<div class="col-sm-6 sm-mb-30">
								<div class="contact__area-form-item">
									<i class="far fa-envelope-open"></i>
									<input type="email" name="email" placeholder="Email Address" required>
								</div>
							</div>
							<div class="col-sm-6 mb-30">
								<div class="contact__area-form-item">
									<i class="far fa-phone-alt"></i>
									<input type="text" name="phone" placeholder="Phone" required>
								</div>
							</div>
							<div class="col-sm-6 sm-mb-30">
							<div class="contact__area-form-item">
								<span>	<h5>Select the Room:</h5>  </span>
									<select id="room-type" name="room_type" required>
										<option value="small_suite">Small Suite</option>
										<option value="deluxe_room">Deluxe Room</option>
										<option value="family_room">Family Room</option>
										<option value="single_room">Single Room</option>
										<option value="luxury_room">Luxury Room</option>
									</select>
								</div>
							</div>
							<div class="col-sm-12 mb-30">
								<div class="contact__area-form-item">
									<i class="far fa-comments"></i>
									<textarea name="message" placeholder="Type your comments...."></textarea>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="contact__area-form-item">
									<button class="theme-btn" type="submit">Submit Now<i class="fal fa-long-arrow-right"></i></button>
								</div>
							</div>
							@if (session('success'))
							<div class="alert alert-success">
								{{ session('success') }}
							</div>
							@endif
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="contact__area-map section-padding">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54443.70871426997!2d74.27180302138486!3d31.47656330361768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3919053933972dad%3A0x336d30ce9be75690!2sHotel%20One%20Garden%20Town!5e0!3m2!1sen!2s!4v1734721292979!5m2!1sen!2s" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Contact Area End -->
<div class="scroll-up">
	<svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
		<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
	</svg>
</div>
@endsection