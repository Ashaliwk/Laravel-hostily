@extends('frontend.layouts.main')
@section('title', 'About us')
@section('main-container')
	<!-- Page Banner Start -->
	<div class="page__banner" data-background="assets/img/banner/page-banner-10.jpg">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="page__banner-title">
						<h1>Blog Grid</h1>
						<div class="page__banner-title-menu">
							<ul>
								<li><a href="{{ url('/')}}">Home</a></li>
								<li><span>-</span>Blog Grid</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page Banner End -->
	<!-- Blog Grid Start -->
	<div class="blog__grid section-padding">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-lg-6 col-md-6 mb-30">
					<div class="blog__two-item">
						<div class="blog__two-item-image">
							<img src="assets/img/blog/blog-4.jpg" alt="">
							<div class="blog__two-item-image-date">
								<h5>19</h5>
								<span>Aug</span>
							</div>
						</div>
						<div class="blog__two-item-content">
							<h6>Post by - Admin</h6>
							<h4><a href="blog-details.html">Find cheap hotels in the best locations</a></h4>
							<a class="simple-btn" href="blog-details.html"><i class="far fa-chevron-right"></i>Read More</a>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6 col-md-6 lg-mb-30">
					<div class="blog__two-item">
						<div class="blog__two-item-image">
							<img src="assets/img/blog/blog-5.jpg" alt="">
							<div class="blog__two-item-image-date">
								<h5>15</h5>
								<span>Aug</span>
							</div>
						</div>
						<div class="blog__two-item-content">
							<h6>Post by - Admin</h6>
							<h4><a href="blog-details.html">Book a room Today most Affordable Rates.</a></h4>
							<a class="simple-btn" href="blog-details.html"><i class="far fa-chevron-right"></i>Read More</a>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6 col-md-6 md-mb-30">
					<div class="blog__two-item">
						<div class="blog__two-item-image">
							<img src="assets/img/blog/blog-6.jpg" alt="">
							<div class="blog__two-item-image-date">
								<h5>12</h5>
								<span>Aug</span>
							</div>
						</div>
						<div class="blog__two-item-content">
							<h6>Post by - Admin</h6>
							<h4><a href="blog-details.html">Our expertise covers all Aspects of the industry</a></h4>
							<a class="simple-btn" href="blog-details.html"><i class="far fa-chevron-right"></i>Read More</a>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6 col-md-6 xl-mb-30">
					<div class="blog__two-item">
						<div class="blog__two-item-image">
							<img src="assets/img/blog/blog-13.jpg" alt="">
							<div class="blog__two-item-image-date">
								<h5>19</h5>
								<span>Aug</span>
							</div>
						</div>
						<div class="blog__two-item-content">
							<h6>Post by - Admin</h6>
							<h4><a href="blog-details.html">Sheraton Broadway Plantation Resort Villas</a></h4>
							<a class="simple-btn" href="blog-details.html"><i class="far fa-chevron-right"></i>Read More</a>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6 col-md-6 lg-mb-30">
					<div class="blog__two-item">
						<div class="blog__two-item-image">
							<img src="assets/img/blog/blog-14.jpg" alt="">
							<div class="blog__two-item-image-date">
								<h5>15</h5>
								<span>Aug</span>
							</div>
						</div>
						<div class="blog__two-item-content">
							<h6>Post by - Admin</h6>
							<h4><a href="blog-details.html">Find cheap hotels in the best locations</a></h4>
							<a class="simple-btn" href="blog-details.html"><i class="far fa-chevron-right"></i>Read More</a>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="blog__two-item">
						<div class="blog__two-item-image">
							<img src="assets/img/blog/blog-15.jpg" alt="">
							<div class="blog__two-item-image-date">
								<h5>12</h5>
								<span>Aug</span>
							</div>
						</div>
						<div class="blog__two-item-content">
							<h6>Post by - Admin</h6>
							<h4><a href="blog-details.html">Book a room Today most Affordable Rates.</a></h4>
							<a class="simple-btn" href="blog-details.html"><i class="far fa-chevron-right"></i>Read More</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12">
					<div class="theme__pagination t-center mt-50">
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
			</div>
		</div>
	</div>
	<div class="scroll-up">
		<svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
		</svg>
	</div>
	@endsection