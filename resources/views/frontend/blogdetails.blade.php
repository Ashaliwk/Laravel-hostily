@extends('frontend.layouts.main')
@section('title', 'About us')
@section('main-container')

    <div class="page__banner" data-background="assets/img/banner/page-banner-8.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__banner-title">
                        <h1>Blog Details</h1>
                        <div class="page__banner-title-menu">
                            <ul>
                                <li><a href="{{ url('/')}}">Home</a></li>
                                <li><span>-</span>Blog Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog__details section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-8 lg-mb-30">
                    <div class="blog__details-left">
                        <img src="assets/img/blog/blog-10.jpg" alt="">
                        <div class="blog__details-left-meta">
                            <ul>
                                <li><a href="#"><i class="fal fa-user"></i>By - Admin</a></li>
                                <li><a href="#"><i class="fal fa-calendar-alt"></i>07, March 2022</a></li>
                                <li><a href="#"><i class="fal fa-comments"></i>3 Comment</a></li>
                            </ul>
                        </div>
                        <h3 class="mb-20">Booking is an easy way to find the best hotels for you</h3>
						<p class="mb-25">Maecenas tincidunt hendrerit odio sed consectetur. Duis porta purus sapien, eget pretium augue consectetur ut. Nunc nibh augue, pretium quis imperdiet pellentesque, molestie eget nisi. Sed rutrum sit amet eros ac egestas. Maecenas tincidunt dolor in massa iaculis, vitae dignissim sem finibus. Pellentesque elementum vel arcu sit amet rhoncus.</p>
						<p>Nulla at eleifend lorem. Praesent et ex sed metus egestas feugiat. Donec velit libero, feugiat ac dictum vel, dignissim id ante. Praesent hendrerit posuere condimentum.</p>
                        <div class="blog__details-left-box">
                            <div class="blog__details-left-box-icon">
								<img src="assets/img/icon/quote.png" alt="">
							</div>
							<p>Aenean imperdiet finibus sodales. Sed non ex nisl. Maecenas ut dictum neque, at euismod felis. Etiam rhoncus neque vitae efficitur mollis. Vestibulum sed pulvinar magna. Suspendisse</p>
                            <h5>David Beckham</h5>
                        </div>
						<p>Vestibulum eget tellus rhoncus, dictum massa a, mattis massa. Cras in leo semper, ultricies ligula nec, ornare tellus. Suspendisse quam risus, semper et ultricies a, commodo eu tortor. Phasellus elementum tincidunt varius. Nam facilisis, ante eget gravida vestibulum, ante nisi feugiat nulla, in dapibus neque turpis et dolor. Vestibulum in urna urna.</p>
                        <div class="row mt-40 mb-40">
                            <div class="col-sm-6 sm-mb-30">
                                <div class="blog__details-left-list">
                                    <img class="img__full" src="assets/img/blog/blog-11.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="blog__details-left-list blog__details-left-list-hover">
                                    <img class="img__full" src="assets/img/blog/blog-12.jpg" alt="">
                                </div>
                            </div>
                        </div>
						<p class="mb-30">Design pretium fermentum quam, sit amet cursus ante sollicitudin vel. Morbi consequat risus consequat, porttitor orci sit amet, iaculis nisl. Integer quis sapien neceli ultrices euismod sit amet id lacus. Sed a imperdiet erat. Duis eu est dignissim lacus dictum hendrerit quis vitae mi. Fusce eu nulla ac nisi cursus tincidun. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer tristique sem eget leo faucibus porttitor.</p>
                        <div class="blog__details-left-comment mb-45">
							<h4 class="mb-40">Comment (2)</h4>
							<div class="blog__details-left-comment-item">
								<div class="blog__details-left-comment-item-comment">
									<div class="blog__details-left-comment-item-comment-image">
										<img src="assets/img/avatar/comment-1.jpg" alt="">
									</div>
									<div class="blog__details-left-comment-item-comment-content">
										<h5>Justin Bieber<a href="#"><i class="far fa-reply-all"></i>Reply</a></h5>
										<span>20 May, 2022  At 9:PM</span>
                                        <p>Phasellus nisi sapien, rutrum placerat sapien eu, rhoncus tempus felis. Nulla non pulvinar enim, vel viverra nunc. Integer condimentum vulputate justo.</p>
                                    </div>
								</div>
							</div>
							<div class="blog__details-left-comment-item ml-65 sm-ml-0">
								<div class="blog__details-left-comment-item-comment">
									<div class="blog__details-left-comment-item-comment-image">
										<img src="assets/img/avatar/comment-2.jpg" alt="">
									</div>
									<div class="blog__details-left-comment-item-comment-content">
										<h5>Camila Cabello<a href="#"><i class="far fa-reply-all"></i>Reply</a></h5>
										<span>22 May, 2022  At 7:PM</span>
                                        <p>Phasellus nisi sapien, rutrum placerat sapien eu, rhoncus tempus felis. Nulla non pulvinar enim, vel viverra nunc. Integer condimentum vulputate justo.</p>
									</div>
								</div>
							</div>
						</div>
                        <div class="blog__details-left-contact">
							<h4 class="mb-40">Add Comment</h4>
                            <div class="blog__details-left-contact-form">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-sm-6 mb-30">
                                            <div class="blog__details-left-contact-form-item">
                                                <i class="fal fa-user"></i>
                                                <input type="text" name="name" placeholder="Full Name" required="required">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 sm-mb-30">
                                            <div class="blog__details-left-contact-form-item">
                                                <i class="fal fa-envelope"></i>
                                                <input type="text" name="email" placeholder="Email Address" required="required">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-30">
                                            <div class="blog__details-left-contact-form-item">
                                                <i class="fal fa-globe"></i>
                                                <input type="text" name="subject" placeholder="https://" required="required">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-30">
                                            <div class="blog__details-left-contact-form-item">
                                                <i class="fal fa-pen"></i>
                                                <textarea name="message" placeholder="Type your comments...."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="blog__details-left-contact-form-item">
                                                <button class="theme-btn" type="submit">post Comment<i class="fal fa-long-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
						</div>
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
    @endsection