@extends('frontend.layouts.main')
@section('title', 'Book ' . ($room->name ?? 'Room'))
@section('main-container')

<div class="page__banner" data-background="{{ asset('assets/img/banner-1.jpg') }}">
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
        <div class="row">
            <div class="col-lg-5 mb-30">
                <div class="deluxe__area-item h-100">
                    <img class="img__full mb-20" src="/backend/images/product/{{ $room->image }}" alt="{{ $room->name }}">
                    <div class="p-3">
                        <h3>{{ $room->name }}</h3>
                        <p>{{ $room->description }}</p>
                        <h4 class="text-primary">Rs:{{ number_format($room->price) }} / Night</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
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
                        <input type="hidden" name="room_id" value="{{ $room->id }}">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Check-in Date</label>
                                <input type="date" class="form-control" name="check_in" min="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Check-out Date</label>
                                <input type="date" class="form-control" name="check_out" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Number of Guests</label>
                            <select class="form-select" name="guests" required>
                                <option value="1">1 Guest</option>
                                <option value="2" selected>2 Guests</option>
                                <option value="3">3 Guests</option>
                                <option value="4">4 Guests</option>
                                <option value="5">5 Guests</option>
                                <option value="6">6+ Guests</option>
                            </select>
                        </div>

                        <div class="alert alert-info mb-4">
                            <strong>Selected Room:</strong> {{ $room->name }}<br>
                            <strong>Price per night:</strong> Rs:{{ number_format($room->price, 2) }}
                        </div>

                        <button type="submit" class="theme-btn w-100">
                            Confirm Booking <i class="fal fa-long-arrow-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection