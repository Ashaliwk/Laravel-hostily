@extends('frontend.layouts.main')
@section('title', 'Book ' . ($selectedRoom->name ?? 'Your Stay'))
@section('main-container')

<div class="page__banner" data-background="assets/img/banner-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page__banner-title">
                    <h1>Book Your Stay</h1>
                    <div class="page__banner-title-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>-</span>Booking</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-padding">
    <div class="container">
        <div class="row text-center">
            @if(isset($selectedRoom))
            <div class="col-lg-5 mb-30">
                <div class="deluxe__area-item h-100">
                    <img class="img__full mb-20"
                        src="/backend/images/product/{{ $selectedRoom->image }}"
                        alt="{{ $selectedRoom->name }}">
                    <div class="p-3">
                        <h3>{{ $selectedRoom->name }}</h3>
                        <p>{{ $selectedRoom->description }}</p>
                        <h4 class="text-primary">
                            {{ number_format($selectedRoom->price) }} $ / Night
                        </h4>
                    </div>
                </div>
            </div>
            @endif
            <div class="{{ isset($selectedRoom) ? 'col-lg-7' : 'col-lg-12' }}">
                <div class="all__sidebar-item p-4" style="background: #f8f9fa;">
                    <h4 class="mb-30 text-center">Complete Your Booking</h4>
                    @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('book.room') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text"
                                    name="guest_name"
                                    class="form-control"
                                    placeholder="Enter your full name"
                                    required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email"
                                    name="guest_email"
                                    class="form-control"
                                    placeholder="Enter your email"
                                    required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="tel"
                                    name="guest_phone"
                                    class="form-control"
                                    placeholder="03XX-XXXXXXX"
                                    required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Select Room</label>
                            <select name="room_id" class="form-select" required>
                                <option value="">Choose a Room</option>
                                @foreach($room as $r)
                                <option value="{{ $r->id }}"
                                    {{ isset($selectedRoom) && $selectedRoom->id == $r->id ? 'selected' : '' }}>
                                    {{ $r->name }} — Rs {{ number_format($r->price) }}/Night
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Check-in Date</label>
                                <input type="date" class="form-control" name="check_in" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Check-out Date</label>
                                <input type="date" class="form-control" name="check_out" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Number of Guests</label>
                            <select class="form-select" name="guests" required>
                                @for($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}">{{ $i }} Guest{{ $i > 1 ? 's' : '' }}</option>
                                    @endfor
                            </select>
                        </div>
                        <button type="submit" class="theme-btn w-100">
                            Confirm Booking
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3399.953826442673!2d74.33612097565342!3d31.552881774199122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391904c8606da7e9%3A0xd70a28b88f7720d7!2sPearl%20Continental%20Hotel%2C%20Lahore!5e0!3m2!1sen!2s!4v1768119194054!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>

@endsection