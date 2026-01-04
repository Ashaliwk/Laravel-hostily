@extends('frontend.layouts.main')
@section('title', 'Room Modern')
@section('main-container')

<div class="page__banner" data-background="assets/img/banner/page-banner-4.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page__banner-title">
                    <h1>Room Modern</h1>
                    <div class="page__banner-title-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>-</span>Room Modern</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modern__room section-padding">
    <div class="container">
        <div class="row">
            @forelse ($rooms as $room)
                <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
                    <div class="deluxe__three-item">
                        <div class="deluxe__three-item-image">
                            <img src="{{ asset('backend/images/product/' . $room->image) }}" alt="{{ $room->name }}">
                            <div class="deluxe__three-item-image-content">
                                <h4><a href="{{ route('room.details', $room->id) }}">{{ $room->name }}</a><span>${{ number_format($room->price) }}/Night</span></h4>
                                <p>{{ Str::limit($room->description, 100) }}</p>
                                <div class="deluxe__three-item-image-content-meta">
                                    <ul>
                                        <li><i class="fal fa-bed-alt"></i> {{ $room->beds ?? '(3) bed\'s' }}</li>
                                        <li><i class="fal fa-users"></i> {{ $room->guests ?? '(4) Guest\'s' }}</li>
                                    </ul>
                                </div>
                                <div class="deluxe__three-item-image-content-bottom">
                                    <button type="button" class="simple-btn" data-bs-toggle="modal" data-bs-target="#bookingModal-{{ $room->id }}">
                                        <i class="far fa-chevron-right"></i> Book Now
                                    </button>
                                    <p><i class="fas fa-star"></i><span>4.{{ rand(1,9) }}</span> (2k)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="bookingModal-{{ $room->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Book: {{ $room->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('book.room') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="room_id" value="{{ $room->id }}">

                                    <!-- ... same form as previous modals: check_in, check_out, guests, submit button ... -->
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>Check-in Date</label>
                                            <input type="date" class="form-control" name="check_in" min="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Check-out Date</label>
                                            <input type="date" class="form-control" name="check_out" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label>Guests</label>
                                        <select class="form-select" name="guests" required>
                                            <option value="1">1 Guest</option>
                                            <option value="2" selected>2 Guests</option>
                                            <option value="3">3 Guests</option>
                                            <option value="4">4 Guests</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="theme-btn w-100">Confirm Booking</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>No rooms found.</p>
            @endforelse
        </div>
    </div>
</div>

<div class="scroll-up">
    <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>

@endsection