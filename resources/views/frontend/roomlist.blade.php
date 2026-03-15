@extends('frontend.layouts.main')

@section('title', 'Room List')

@section('main-container')

<div class="page__banner" data-background="assets/img/banner/page-banner-3.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page__banner-title">
                    <h1>Room list</h1>
                    <div class="page__banner-title-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>-</span>Room list</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="room__list section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-3">
            </div>
            <div class="col-lg-12 order-first order-xl-1 xl-mb-30">
                @forelse ($rooms as $room)
                <div class="room__list-item">
                    <div class="room__list-item-left">
                        <div class="room__list-item-image">
                            <img src="{{ asset('backend/images/product/' . $room->image) }}" alt="{{ $room->name }}">
                        </div>
                    </div>
                    <div class="room__list-item-right">
                        <div class="room__list-item-right-content">
                            <h4>{{ $room->name }}</h4>
                            <p>{{ $room->description }}</p>
                            <ul>
                                <li><i class="fal fa-bed-alt"></i> {{ $room->beds ?? '(3) bed\'s' }}</li>
                                <li><i class="fal fa-users"></i> {{ $room->guests ?? '(4) Guest\'s' }}</li>
                            </ul>
                        </div>
                        <div class="room__list-item-right-meta">
                            <div class="room__list-item-right-meta-top">
                                <span>${{ number_format($room->price) }}/Night</span>
                            </div>
                            <button type="button" class="simple-btn text-light fs-4">
                                <a href="{{ url('/book', $room->id) }}" class="text-light text-decoration-none">
                                    Book Now
                                </a>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="bookingModal-{{ $room->id }}" tabindex="-1" aria-hidden="true">
                    <!-- ... modal code ... -->
                </div>
                @empty
                <p>No rooms available.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection