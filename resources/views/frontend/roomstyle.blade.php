@extends('frontend.layouts.main')

@section('title', 'Room Style')

@section('main-container')

<div class="page__banner" data-background="assets/img/banner/page-banner-3.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page__banner-title">
                    <h1>Room Style</h1>
                    <div class="page__banner-title-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>-</span>Room Style</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Room Area Start -->
<div class="room__area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="all__sidebar">
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 order-first order-lg-1 lg-mb-30">
                <div class="row justify-content-center">
                    @forelse ($rooms as $room)
                        <div class="col-xl-4 col-md-6 mb-30">
                            <div class="deluxe__two-item">
                                <div class="deluxe__two-item-image">
                                    <a href="{{ route('room.details', $room->id) }}"><img src="{{ asset('backend/images/product/' . $room->image) }}" alt="{{ $room->name }}"></a>
                                </div>
                                <div class="deluxe__two-item-content">
                                    <span>${{ number_format($room->price) }}/Night</span>
                                    <h4><a href="{{ route('room.details', $room->id) }}">{{ $room->name }}</a></h4>
                                    <p>{{ Str::limit($room->description, 100) }}</p>
                                    <div class="deluxe__two-item-content-meta">
                                        <ul>
                                            <li><i class="fal fa-bed-alt"></i> {{ $room->beds ?? '(3) bed\'s' }}</li>
                                            <li><i class="fal fa-users"></i> {{ $room->guests ?? '(4) Guest\'s' }}</li>
                                        </ul>
                                    </div>
                                    <div class="deluxe__two-item-content-bottom">
                                        <button type="button" class="simple-btn" data-bs-toggle="modal" data-bs-target="#bookingModal-{{ $room->id }}">
                                            <i class="far fa-chevron-right"></i> Book Now
                                        </button>
                                        <p><i class="fas fa-star"></i><span>4.{{ rand(1,9) }}</span> (2k)</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal (same as above) -->
                        <div class="modal fade" id="bookingModal-{{ $room->id }}" tabindex="-1" aria-hidden="true">
                            <!-- ... identical modal code as in roommodern.blade.php ... -->
                        </div>
                    @empty
                        <p>No rooms found.</p>
                    @endforelse
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