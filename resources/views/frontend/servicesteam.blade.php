@extends('frontend.layouts.main')
@section('title', 'Team')
@section('main-container')

@php
    $extraRoles = [
        ['role' => 'Guest Experience Manager', 'detail' => 'Owns arrival flow, complaint recovery, and premium guest moments.'],
        ['role' => 'Wellness Director', 'detail' => 'Coordinates spa, pool, fitness, and relaxation-oriented guest services.'],
        ['role' => 'Events Curator', 'detail' => 'Shapes weddings, corporate stays, and group travel logistics from end to end.'],
    ];
@endphp

<style>
    .team-shell {
        background: #f6f7fb;
    }
    .team-panel {
        background: #fff;
        border: 1px solid #e8ebf3;
        border-radius: 16px;
        box-shadow: 0 16px 36px rgba(18, 34, 56, 0.06);
    }
</style>

<div class="page__banner" data-background="{{ asset('assets/img/banner/page-banner-2.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page__banner-title">
                    <h1>Team</h1>
                    <div class="page__banner-title-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>-</span>Team</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="team-shell section-padding">
    <div class="container">
        <div class="team-panel p-4 p-lg-5 mb-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="subtitle__one">Hospitality Leadership</span>
                    <h2 class="mb-3">The people shaping each stay</h2>
                    <p class="mb-0">This team page now highlights more role coverage, not just names. Alongside core staff profiles, it also introduces operational roles that matter to guest experience, wellness, and events.</p>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            @foreach($extraRoles as $role)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-panel p-4 h-100">
                        <span class="subtitle__one">Added Role</span>
                        <h4 class="mb-3">{{ $role['role'] }}</h4>
                        <p class="mb-0">{{ $role['detail'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            {{-- Hardcoded Hotel Manager --}}
            <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                <div class="team-panel overflow-hidden h-100">
                    <img class="img__full" src="{{ asset('uploads/team/manager-ali.jpg') }}" alt="Hotel Manager" style="object-fit:cover;height:300px;width:100%;display:block;">
                    <div class="p-4">
                        <h5 class="mb-1">Hamza Fiaz</h5>
                        <p class="text-muted mb-3 text-capitalize">manager</p>
                        <p class="mb-3">Leads all hotel operations with a passion for exceptional guest experiences and seamless day-to-day management.</p>
                    </div>
                </div>
            </div>
            @forelse($teams as $team)
                <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                    <div class="team-panel overflow-hidden h-100">
                        <img class="img__full" src="{{ asset('uploads/team/'.$team->image) }}" alt="{{ $team->fullname }}" style="object-fit:cover;height:300px;width:100%;display:block;">
                        <div class="p-4">
                            <h5 class="mb-1">{{ $team->fullname }}</h5>
                            <p class="text-muted mb-3">{{ $team->designation }}</p>
                            <p class="mb-3">{{ $team->intro ?: 'Focused on thoughtful, detail-driven hospitality and smooth guest coordination.' }}</p>
                            @if($team->insta)
                                <a href="{{ $team->insta }}" target="_blank" class="simple-btn">Connect</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="team-panel p-5 text-center">
                        <h4>No team members added yet</h4>
                        <p class="mb-0">Use the admin team section to populate profiles here.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
