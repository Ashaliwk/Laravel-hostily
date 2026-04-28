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
                        <h3 class="mb-20">The Ultimate Guide to Finding the Perfect Hotel Room</h3>
						<p class="mb-25">Finding the perfect hotel room can sometimes feel like searching for a needle in a haystack. With so many options available—from cozy single rooms to sprawling luxury suites—it's important to know exactly what you need before you book. Whether you're traveling for business, planning a romantic getaway, or taking the whole family on a vacation, understanding the different room categories is the first step to ensuring a comfortable stay. Taking the time to research amenities, location, and room size can make all the difference in your travel experience.</p>
						<p>One of the most critical factors to consider is the type of room that best suits your group. For solo travelers or couples on a budget, an economy or double room often provides all the necessary comforts without breaking the bank. However, if you are planning an extended stay or traveling with children, opting for a family room or a suite can provide the extra space and convenience needed to relax fully.</p>
                        <div class="blog__details-left-box">
                            <div class="blog__details-left-box-icon">
								<img src="assets/img/icon/quote.png" alt="">
							</div>
							<p>A great hotel stay is about more than just a place to sleep; it's about the experience, the service, and the memories you create while feeling completely at home away from home.</p>
                            <h5>Emily Chen, Travel Expert</h5>
                        </div>
						<p>Beyond just the room type, pay attention to the specific amenities offered. Does the hotel provide complimentary Wi-Fi, a fitness center, or a swimming pool? For business travelers, a quiet workspace and reliable internet are non-negotiable. For families, proximity to local attractions and child-friendly facilities might be the top priority. Always read guest reviews to get a sense of the actual experience rather than relying solely on promotional photos.</p>
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
						<p class="mb-30">Finally, consider the timing of your booking. Reserving your room well in advance can often secure you the best rates and ensure availability, especially during peak travel seasons. Don't hesitate to reach out to the hotel directly if you have special requests or need clarification on their policies. A good hospitality team is always ready to assist you in making your stay as pleasant and seamless as possible.</p>
                        <div class="blog__details-left-comment mb-45">
							<h4 class="mb-40">Comment (2)</h4>
							<div class="blog__details-left-comment-item">
								<div class="blog__details-left-comment-item-comment">
									<div class="blog__details-left-comment-item-comment-image">
										<img src="assets/img/avatar/comment-1.jpg" alt="">
									</div>
									<div class="blog__details-left-comment-item-comment-content">
										<h5>Sarah Jenkins<a href="#"><i class="far fa-reply-all"></i>Reply</a></h5>
										<span>20 May, 2024  At 9:00 PM</span>
                                        <p>This is a fantastic guide! I always struggled with deciding between a standard room and a suite for our family trips. Your tips on prioritizing space and amenities really helped clarify things for our next vacation.</p>
                                    </div>
								</div>
							</div>
							<div class="blog__details-left-comment-item ml-65 sm-ml-0">
								<div class="blog__details-left-comment-item-comment">
									<div class="blog__details-left-comment-item-comment-image">
										<img src="assets/img/avatar/comment-2.jpg" alt="">
									</div>
									<div class="blog__details-left-comment-item-comment-content">
										<h5>Michael Carter<a href="#"><i class="far fa-reply-all"></i>Reply</a></h5>
										<span>22 May, 2024  At 7:15 PM</span>
                                        <p>I completely agree with the point about checking guest reviews. I've dodged a few bad experiences just by spending an extra ten minutes reading what recent guests had to say about the Wi-Fi reliability.</p>
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
                                    <li><a href="#"><i class="far fa-angle-double-right"></i>Luxury<span>(03)</span></a></li>
                                    <li><a href="#"><i class="far fa-angle-double-right"></i>Suite<span>(02)</span></a></li>
                                    <li><a href="#"><i class="far fa-angle-double-right"></i>Single<span>(03)</span></a></li>
                                    <li><a href="#"><i class="far fa-angle-double-right"></i>Family<span>(03)</span></a></li>
                                    <li><a href="#"><i class="far fa-angle-double-right"></i>Double<span>(02)</span></a></li>
                                    <li><a href="#"><i class="far fa-angle-double-right"></i>Economy<span>(01)</span></a></li>
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
                                    <li><a href="#">Suite</a></li>
                                    <li><a href="#">Single</a></li>
                                    <li><a href="#">Family</a></li>
                                    <li><a href="#">Double</a></li>
                                    <li><a href="#">Economy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection