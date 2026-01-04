@extends('frontend.layouts.main')
@section('title', 'About us')
@section('main-container')
	<div class="page__banner" data-background="assets/img/banner/page-banner-7.jpg">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="page__banner-title">
						<h1>Blog Standard</h1>
						<div class="page__banner-title-menu">
							<ul>
								<li><a href="{{ url('/')}}">Home</a></li>
								<li><span>-</span>Blog Standard</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page Banner End -->
	<!-- Blog Standard Start -->
	<div class="blog__standard section-padding">
		<div class="container">
			<div class="row">
				<div class="col-xxl-9 col-xl-8 col-lg-8 lg-mb-30">
					<div class="blog__standard-left">
						<div class="blog__standard-left-item">
							<div class="blog__standard-left-item-image">
								<a href="blog-details.html"><img src="assets/img/blog/blog-7.jpg" alt=""></a>
							</div>
							<div class="blog__standard-left-item-content">
								<div class="blog__standard-left-item-content-meta">
									<ul>
										<li><a href="#"><i class="fal fa-user"></i>By- Admin</a></li>
										<li><a href="#"><i class="fal fa-calendar-alt"></i>07, March 2022</a></li>
										<li><a href="#"><i class="fal fa-comments"></i>3 Comment</a></li>
									</ul>
								</div>
								<h3><a href="blog-details.html">Get best taxi fares in your city with our booking service</a></h3>
								<p class="mb-40">Praesent non ullamcorper ligula. Proin a mi vitae massa lacinia sollicitudin eget eu ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque consectetur rhoncus lobortis. Curabitur sit amet velit sagittis, pellentesque diam euismod, faucibus quam. Cras non rhoncus ipsum. Quisque mattis arcu metus,</p>
								<a class="theme-border-btn" href="blog-details.html">Read More<i class="fal fa-long-arrow-right"></i></a>
							</div>
						</div>
						<div class="blog__standard-left-item">
							<div class="blog__standard-left-item-image">
								<a href="blog-details.html"><img src="assets/img/blog/blog-8.jpg" alt=""></a>
							</div>
							<div class="blog__standard-left-item-content">
								<div class="blog__standard-left-item-content-meta">
									<ul>
										<li><a href="#"><i class="fal fa-user"></i>By- Admin</a></li>
										<li><a href="#"><i class="fal fa-calendar-alt"></i>07, March 2022</a></li>
										<li><a href="#"><i class="fal fa-comments"></i>3 Comment</a></li>
									</ul>
								</div>
								<h3><a href="blog-details.html">Get best taxi fares in your city with our booking service</a></h3>
								<p class="mb-40">Praesent non ullamcorper ligula. Proin a mi vitae massa lacinia sollicitudin eget eu ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque consectetur rhoncus lobortis. Curabitur sit amet velit sagittis, pellentesque diam euismod, faucibus quam. Cras non rhoncus ipsum. Quisque mattis arcu metus,</p>
								<a class="theme-border-btn" href="blog-details.html">Read More<i class="fal fa-long-arrow-right"></i></a>
							</div>
						</div>
						<div class="blog__standard-left-item">
							<div class="blog__standard-left-item-image">
								<a href="blog-details.html"><img src="assets/img/blog/blog-9.jpg" alt=""></a>
							</div>
							<div class="blog__standard-left-item-content">
								<div class="blog__standard-left-item-content-meta">
									<ul>
										<li><a href="#"><i class="fal fa-user"></i>By- Admin</a></li>
										<li><a href="#"><i class="fal fa-calendar-alt"></i>07, March 2022</a></li>
										<li><a href="#"><i class="fal fa-comments"></i>3 Comment</a></li>
									</ul>
								</div>
								<h3><a href="blog-details.html">Get best taxi fares in your city with our booking service</a></h3>
								<p class="mb-40">Praesent non ullamcorper ligula. Proin a mi vitae massa lacinia sollicitudin eget eu ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque consectetur rhoncus lobortis. Curabitur sit amet velit sagittis, pellentesque diam euismod, faucibus quam. Cras non rhoncus ipsum. Quisque mattis arcu metus,</p>
								<a class="theme-border-btn" href="blog-details.html">Read More<i class="fal fa-long-arrow-right"></i></a>
							</div>
						</div>
					</div>
					<div class="theme__pagination mt-50">
						<ul>
							<li><a class="active" href="#">01</a>
							</li>
							<li><a href="#">02</a>
							</li>
							<li><a href="#"><i class="far fa-ellipsis-h"></i></a>
							</li>
							<li><a href="#">05</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-xxl-3 col-xl-4 col-lg-4">
					<div class="all__sidebar-item-search mb-40">
						<form action="#">
							<input type="text" placeholder="Search.....">
							<button type="submit"><i class="fal fa-search"></i></button>
						</form>
					</div>
					<div class="all__sidebar">
						<div class="all__sidebar-item">
							<h5>Category</h5>
							<div class="all__sidebar-item-category">
								<ul>
									<li><a href="#"><i class="far fa-angle-double-right"></i>Luxury Room<span>(08)</span></a></li>
									<li><a href="#"><i class="far fa-angle-double-right"></i>Small Suite<span>(06)</span></a></li>
									<li><a href="#"><i class="far fa-angle-double-right"></i>Single<span>(05)</span></a></li>
									<li><a href="#"><i class="far fa-angle-double-right"></i>Family<span>(09)</span></a></li>
									<li><a href="#"><i class="far fa-angle-double-right"></i>Double Room<span>(03)</span></a></li>
								</ul>
							</div>
						</div>
						<div class="all__sidebar-item">
							<h5>Recent Post</h5>
							<div class="all__sidebar-item-post">
								<div class="all__sidebar-item-post-item">
									<div class="all__sidebar-item-post-item-image">
										<a href="blog-details.html"><img src="assets/img/blog/post-1.jpg" alt=""></a>
									</div>
									<div class="all__sidebar-item-post-item-content">
										<span><i class="fal fa-calendar-alt"></i>05 June, 2022</span>
										<h6><a href="blog-details.html">Book your next Trip today!</a></h6>
									</div>
								</div>
								<div class="all__sidebar-item-post-item">
									<div class="all__sidebar-item-post-item-image">
										<a href="blog-details.html"><img src="assets/img/blog/post-2.jpg" alt=""></a>
									</div>
									<div class="all__sidebar-item-post-item-content">
										<span><i class="fal fa-calendar-alt"></i>02 June, 2022</span>
										<h6><a href="blog-details.html">Booking is an Easy way to find</a></h6>
									</div>
								</div>
								<div class="all__sidebar-item-post-item">
									<div class="all__sidebar-item-post-item-image">
										<a href="blog-details.html"><img src="assets/img/blog/post-3.jpg" alt=""></a>
									</div>
									<div class="all__sidebar-item-post-item-content">
										<span><i class="fal fa-calendar-alt"></i>04 June, 2022</span>
										<h6><a href="blog-details.html">Book instantly And also get</a></h6>
									</div>
								</div>
							</div>
						</div>
						<div class="all__sidebar-item">
							<h5>Tag'g</h5>
							<div class="all__sidebar-item-tag">
								<ul>
									<li><a href="#">Hotel</a></li>
									<li><a href="#">Booking Now</a></li>
									<li><a href="#">Luxury</a></li>
									<li><a href="#">Single room</a></li>
									<li><a href="#">Small suite</a></li>
									<li><a href="#">Family</a></li>
								</ul>
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