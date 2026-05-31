@extends('frontend.layouts.main')
@section('title', 'Verify Your Booking')
@section('main-container')

<div class="page__banner" data-background="assets/img/banner-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page__banner-title">
                    <h1>Verify Your Booking</h1>
                    <div class="page__banner-title-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>-</span>Booking Verification</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="all__sidebar-item p-5" style="background: #ffffff; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid #eaeaea;">
                    <div class="text-center mb-4">
                        <div style="background: #e6f7f6; color: #0d9488; width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 32px;">
                            <i class="fal fa-envelope-open-text"></i>
                        </div>
                        <h3 class="mb-2">Verify Your Email</h3>
                        <p class="text-muted">We've sent a 6-digit verification code to <strong>{{ $booking->guest_email }}</strong>. Please check your inbox (and spam folder) and enter it below to confirm your stay.</p>
                    </div>

                    @if(session('error'))
                    <div class="alert alert-danger text-center mb-4" style="border-radius: 8px; font-size: 15px;">
                        <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
                    </div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success text-center mb-4" style="border-radius: 8px; font-size: 15px;">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    </div>
                    @endif


                    <form action="{{ route('booking.verify.submit') }}" method="POST" id="verify-form">
                        @csrf
                        <div class="mb-4 text-center">
                            <label class="form-label d-block mb-3" style="font-weight: 600; color: #333;">Verification Code</label>
                            
                            <!-- Hidden input to store combined code -->
                            <input type="hidden" name="verification_code" id="verification_code">
                            
                            <!-- Visual Code Input Boxes -->
                            <div class="d-flex justify-content-center gap-2 mb-3" style="gap: 10px;">
                                <input type="text" class="code-box-input" maxlength="1" pattern="[0-9]*" inputmode="numeric" required style="width: 50px; height: 60px; font-size: 24px; text-align: center; border: 2px solid #ddd; border-radius: 8px; font-weight: 700; color: #0d9488; transition: border-color 0.2s;">
                                <input type="text" class="code-box-input" maxlength="1" pattern="[0-9]*" inputmode="numeric" required style="width: 50px; height: 60px; font-size: 24px; text-align: center; border: 2px solid #ddd; border-radius: 8px; font-weight: 700; color: #0d9488; transition: border-color 0.2s;">
                                <input type="text" class="code-box-input" maxlength="1" pattern="[0-9]*" inputmode="numeric" required style="width: 50px; height: 60px; font-size: 24px; text-align: center; border: 2px solid #ddd; border-radius: 8px; font-weight: 700; color: #0d9488; transition: border-color 0.2s;">
                                <input type="text" class="code-box-input" maxlength="1" pattern="[0-9]*" inputmode="numeric" required style="width: 50px; height: 60px; font-size: 24px; text-align: center; border: 2px solid #ddd; border-radius: 8px; font-weight: 700; color: #0d9488; transition: border-color 0.2s;">
                                <input type="text" class="code-box-input" maxlength="1" pattern="[0-9]*" inputmode="numeric" required style="width: 50px; height: 60px; font-size: 24px; text-align: center; border: 2px solid #ddd; border-radius: 8px; font-weight: 700; color: #0d9488; transition: border-color 0.2s;">
                                <input type="text" class="code-box-input" maxlength="1" pattern="[0-9]*" inputmode="numeric" required style="width: 50px; height: 60px; font-size: 24px; text-align: center; border: 2px solid #ddd; border-radius: 8px; font-weight: 700; color: #0d9488; transition: border-color 0.2s;">
                            </div>
                        </div>

                        <div class="bg-light p-3 rounded mb-4" style="border: 1px dashed #ddd; font-size: 14px;">
                            <div class="row">
                                <div class="col-6"><strong>Guest Name:</strong></div>
                                <div class="col-6 text-end">{{ $booking->guest_name }}</div>
                            </div>
                            <hr class="my-2" style="border-top: 1px solid #eee;">
                            <div class="row">
                                <div class="col-6"><strong>Room Type:</strong></div>
                                <div class="col-6 text-end">{{ $booking->room->name ?? 'Deluxe Room' }}</div>
                            </div>
                            <hr class="my-2" style="border-top: 1px solid #eee;">
                            <div class="row">
                                <div class="col-6"><strong>Check-In:</strong></div>
                                <div class="col-6 text-end">{{ $booking->check_in->format('M d, Y') }}</div>
                            </div>
                            <hr class="my-2" style="border-top: 1px solid #eee;">
                            <div class="row">
                                <div class="col-6"><strong>Check-Out:</strong></div>
                                <div class="col-6 text-end">{{ $booking->check_out->format('M d, Y') }}</div>
                            </div>
                            <hr class="my-2" style="border-top: 1px solid #eee;">
                            <div class="row">
                                <div class="col-6"><strong>Total Price:</strong></div>
                                <div class="col-6 text-end text-success"><strong>{{ number_format($booking->total_price) }} PKR</strong></div>
                            </div>
                        </div>

                        <button type="submit" class="theme-btn w-100 mb-3" style="padding: 15px 30px; font-weight: 600;">
                            Verify & Confirm Booking
                        </button>
                        
                        <p class="text-center mb-0" style="font-size: 14px;">
                            Didn't receive the email? <a href="javascript:void(0);" onclick="location.reload();" class="text-primary font-weight-bold">Resend Code</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const inputs = document.querySelectorAll(".code-box-input");
        const hiddenInput = document.getElementById("verification_code");
        const form = document.getElementById("verify-form");
        // Focus the first input box initially
        if (inputs.length > 0) {
            inputs[0].focus();
        }

        inputs.forEach((input, index) => {
            // Focus style
            input.addEventListener("focus", () => {
                input.style.borderColor = "#0d9488";
                input.style.boxShadow = "0 0 5px rgba(13, 148, 136, 0.2)";
            });

            input.addEventListener("blur", () => {
                input.style.borderColor = "#ddd";
                input.style.boxShadow = "none";
            });

            // Input parsing
            input.addEventListener("input", (e) => {
                const value = e.target.value;
                
                // Allow only digits
                e.target.value = value.replace(/[^0-9]/g, "");

                if (e.target.value && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }

                combineCode();
            });

            // Backspace key handling
            input.addEventListener("keydown", (e) => {
                if (e.key === "Backspace") {
                    if (!input.value && index > 0) {
                        inputs[index - 1].focus();
                        inputs[index - 1].value = "";
                    } else {
                        input.value = "";
                    }
                    combineCode();
                }
            });

            // Paste handling
            input.addEventListener("paste", (e) => {
                e.preventDefault();
                const pasteData = (e.clipboardData || window.clipboardData).getData("text").trim();
                if (/^\d{6}$/.test(pasteData)) {
                    inputs.forEach((inp, idx) => {
                        inp.value = pasteData[idx];
                    });
                    combineCode();
                    inputs[inputs.length - 1].focus();
                }
            });
        });

        function combineCode() {
            let code = "";
            inputs.forEach(inp => {
                code += inp.value;
            });
            hiddenInput.value = code;
        }

        // Intercept form submit to verify all boxes are filled
        form.addEventListener("submit", function (e) {
            combineCode();
            if (hiddenInput.value.length !== 6) {
                e.preventDefault();
                alert("Please enter the full 6-digit verification code.");
            }
        });
    });
</script>

@endsection
