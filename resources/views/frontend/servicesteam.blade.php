@extends('frontend.layouts.main')
@section('title', 'About us')
@section('main-container')

<div class="page__banner" data-background="assets/img/banner/page-banner-2.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page__banner-title">
                    <h1>Services Team</h1>
                    <div class="page__banner-title-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>-</span>Services Team</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="services__team section-padding">
    <div class="container">
        <div class="row">
            @forelse($teams as $team)
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                <div class="services__team-item">
                    <div class="services__team-item-image">
                        <img src="{{ asset('uploads/team/'.$team->image) }}" alt="">
                        <div class="services__team-item-image-content">
                            <h5>{{ $team->fullname }}</h5>
                            <span>{{ $team->designation }}</span>
                            <div class="services__team-item-image-content-social">
                                <ul>
                                    @if($team->insta)
                                    <li>
                                        <a href="{{ $team->insta }}" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @empty
            <div class="col-12 text-center">
                <p>No team members found.</p>
            </div>
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