
    <div class="footer__area">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 sm-mb-30">
                    <div class="footer__area-widget">
                        <div class="footer__area-widget-about">
                            <div class="footer__area-widget-about-logo">
                                <a href="{{ url('/') }}"><img src="{{ asset('assets/img/logo.png') }}" alt="Hostily"></a>
                            </div>
                            <p>Comfort-first stays, responsive service, and thoughtful details that make business trips and family breaks feel easy.</p>
                            <div class="footer__area-widget-about-social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 lg-mb-30">
                    <div class="footer__area-widget">
                        <h5>Information</h5>
                        <div class="footer__area-widget-contact">
                            <div class="footer__area-widget-contact-item">
                                <div class="footer__area-widget-contact-item-icon">
                                    <i class="fal fa-map-marked-alt"></i>
                                </div>
                                <div class="footer__area-widget-contact-item-content">
                                    <span><a href="#">Johar Town, Lahore, Pakistan</a></span>
                                </div>
                            </div>
                            <div class="footer__area-widget-contact-item">
                                <div class="footer__area-widget-contact-item-icon">
                                    <i class="fal fa-envelope-open-text"></i>
                                </div>
                                <div class="footer__area-widget-contact-item-content">
                                    <span><a href="mailto:hostily53@gmail.com">hostily53@gmail.com</a></span>
                                </div>
                            </div>
                            <div class="footer__area-widget-contact-item">
                                <div class="footer__area-widget-contact-item-icon">
                                    <i class="fal fa-phone-alt"></i>
                                </div>
                                <div class="footer__area-widget-contact-item-content">
                                    <span><a href="tel:+923097239667">+92 309 7239667</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-5 col-sm-4 sm-mb-30">
                    <div class="footer__area-widget">
                        <h5>Explore</h5>
                        <div class="footer__area-widget-menu">
                            <ul>
                                <li><a href="{{ url('/about') }}"><i class="fal fa-angle-double-right"></i>About Us</a></li>
                                <li><a href="{{ url('/servicesdetails') }}"><i class="fal fa-angle-double-right"></i>Service Details</a></li>
                                <li><a href="{{ url('/roomlist') }}"><i class="fal fa-angle-double-right"></i>Room List</a></li>
                                <li><a href="{{ route('reviews.index') }}"><i class="fal fa-angle-double-right"></i>Guest Reviews</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-7 col-sm-8">
                    <div class="footer__area-widget">
                        <h5>AI Concierge</h5>
                        <p class="text-white-50 mb-15">Use our AI modules for room recommendations, natural language search, and booking guidance.</p>
                        <div class="footer__area-widget-subscribe">
                            <a class="theme-btn d-inline-block" href="{{ route('ai.suggest.form') }}">Open AI Assistant<i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright__area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-7 md-mb-10">
                        <div class="copyright__area-left md-t-center">
                            <p>Built for smooth stays and clearer booking decisions.</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-5">
                        <div class="copyright__area-right t-right md-t-center">
                            <ul>
                                <li><a href="{{ route('blogs.index') }}">Blog</a></li>
                                <li><a href="{{ route('reviews.index') }}">Reviews</a></li>
                                <li><a href="{{ url('/contact') }}">Support</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    @include('frontend.layouts.chatbot')
</body>
</html>
