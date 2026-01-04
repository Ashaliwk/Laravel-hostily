@extends('frontend.layouts.main')
@section('title', 'Login')
@section('main-container')

<div class="page__banner" data-background="assets/img/banner/page-banner-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page__banner-title">
                    <h1>Customer Login</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="all__sidebar-item" style="background: #fff; padding: 40px; border-radius: 10px;">
                    <h4 class="text-center mb-30">Welcome Back</h4>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-20">
                            <label>Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-20">
                            <label>Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-20">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>

                        <button type="submit" class="theme-btn w-100">
                            Login <i class="fal fa-long-arrow-right"></i>
                        </button>

                        <div class="text-center mt-20">
                            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection