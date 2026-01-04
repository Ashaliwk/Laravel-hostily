@extends('frontend.layouts.main')

@section('title', 'Register')

@section('main-container')

<!-- Same banner as login -->

<div class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="all__sidebar-item" style="background: #fff; padding: 40px; border-radius: 10px;">
                    <h4 class="text-center mb-30">Create Account</h4>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-20">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-20">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-20">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="mb-30">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="theme-btn w-100">
                            Register <i class="fal fa-long-arrow-right"></i>
                        </button>

                        <p class="text-center mt-20">
                            Already have an account? <a href="{{ route('login') }}">Login here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection