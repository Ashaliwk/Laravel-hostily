@extends('frontend.layouts.main')
@section('title', $room->name ?? 'Room Details')
@section('main-container')

<div class="page__banner" data-background="assets/img/banner/page-banner-6.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page__banner-title">
                    <h1>Room Details</h1>
                    <div class="page__banner-title-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>-</span>Room Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Room Details Start -->
<div class="room__details section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 lg-mb-30">
                <div class="all__sidebar">
                    <div class="all__sidebar-item">
                        <h5>Your Price</h5>
                        <div class="all__sidebar-item-price">
                            <ul>
                                <li><i class="fal fa-bed-alt"></i> {{ $room->beds ?? '(3) bed\'s' }}</li>
                                <li><i class="fal fa-users"></i> {{ $room->guests ?? '(6) Guest\'s' }}</li>
                            </ul>
                            <h4>${{ number_format($room->price) }}<span>/Night</span></h4>

                            <!-- Booking Form -->
                            <form action="{{ route('book.room') }}" method="POST">
                                @csrf
                                <input type="hidden" name="room_id" value="{{ $room->id }}">

                                <div class="all__sidebar-item-booking-item mb-10">
                                    <label>Check In</label>
                                    <input type="date" class="form-control" name="check_in" min="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="all__sidebar-item-booking-item mb-10">
                                    <label>Check Out</label>
                                    <input type="date" class="form-control" name="check_out" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                                </div>
                                <div class="all__sidebar-item-booking-item mb-30">
                                    <label>Guests</label>
                                    <select class="form-select" name="guests" required>
                                        <option value="1">1 Guest</option>
                                        <option value="2" selected>2 Guests</option>
                                        <option value="3">3 Guests</option>
                                        <option value="4">4 Guests</option>
                                        <option value="5">5 Guests</option>
                                        <option value="6">6 Guests</option>
                                    </select>
                                </div>
                                <button type="submit" class="theme-btn w-100">Book Now<i class="fal fa-long-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
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
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="room__details-right">
                    <div class="room__details-right-content">
                        <h3 class="mb-25">{{ $room->name }}</h3>
                        <p class="mb-25">{{ $room->description }}</p>
                        <div class="row mt-35 mb-35">
                            <div class="col-sm-6 sm-mb-30">
                                <img class="img__full" src="{{ asset('backend/images/product/' . $room->image) }}" alt="{{ $room->name }}">
                            </div>
                            <div class="col-sm-6">
                                <img class="img__full" src="assets/img/hotel/hotel-25.jpg" alt=""> <!-- Replace with dynamic if available -->
                            </div>
                        </div>
                        <h3 class="mb-25">Special check-in instructions</h3>
                        <p class="mb-25">Praesent non ullamcorper ligula. Proin a mi vitae massa lacinia sollicitudin eget eu ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque consectetur rhoncus lobortis. Curabitur sit amet velit sagittis, pellentesque diam euismod, faucibus quam. Cras non rhoncus ipsum. Quisque mattis arcu metus, a fermentum justo semper in.</p>
                        <p class="m-0">id molestie ex ornare. Aliquam id arcu vel sem pretium porttitor non maximus diam. Quisque urna turpis, euismod sed elementum vel, pellentesque eu eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                    </div>
                    <div class="room__details-right-list">
                        <h3>Amenities</h3>
                        <!-- ... your amenities list (keep static or make dynamic if needed) ... -->
                    </div>
                    <div class="room__details-right-faq mt-50">
                        <!-- ... your FAQ accordion (keep static) ... -->
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