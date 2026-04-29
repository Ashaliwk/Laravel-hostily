@extends('frontend.layouts.main')

@section('title', 'Booking Confirmed')

@section('main-container')

<div class="page__banner" data-background="assets/img/banner/page-banner-1.jpg">
    <div class="container text-center py-5">
        <h1 class="text-white">Booking Confirmed! 🎉</h1>
    </div>
</div>

<div class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="p-5" style="background: #f8f9fa; border-radius: 15px;">
                    <h2 class="text-success mb-4">Thank You!</h2>
                    <p class="lead">Your room has been successfully booked.</p>
                    <p>A confirmation email will be send with your booking details.</p>
                    @if(session('booking_reference'))
                        <div class="alert alert-light border mt-4 text-start">
                            <strong>Booking ID:</strong> #{{ session('booking_reference') }}<br>
                            <strong>Booking Email:</strong> {{ session('booking_email') }}<br>
                            <small>Keep this booking ID. You can use it later on the reviews page after checkout.</small>
                        </div>
                    @endif
                    <a href="{{ url('/') }}" class="theme-btn mt-4">
                        Back to Home <i class="fal fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
