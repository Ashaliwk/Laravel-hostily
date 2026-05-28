<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\backend\rooms;
use App\Models\frontend\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingVerificationMail;
use App\Mail\BookingConfirmedMail;

class BookingController extends Controller
{
    public function index($roomId = null)
    {
        $room = rooms::all();
        $selectedRoom = null;

        if ($roomId) {
            $selectedRoom = rooms::findOrFail($roomId);
        }

        return view('frontend.booking', compact('room', 'selectedRoom'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id'   => 'required|exists:rooms,id',
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|email',
            'guest_phone' => 'required',
            'check_in'  => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        $room = rooms::findOrFail($request->room_id);

        // 🔒 Check overlapping bookings
        $overlaps = Booking::where('room_id', $room->id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('check_in', [$request->check_in, $request->check_out])
                    ->orWhereBetween('check_out', [$request->check_in, $request->check_out])
                    ->orWhere(function ($q) use ($request) {
                        $q->where('check_in', '<=', $request->check_in)
                            ->where('check_out', '>=', $request->check_out);
                    });
            })->exists();

        if ($overlaps) {
            return back()
                ->withInput()
                ->with('error', 'Sorry, this room is already booked for the selected dates.');
        }

        $nights = Carbon::parse($request->check_in)
            ->diffInDays(Carbon::parse($request->check_out));

        $total = $nights * $room->price;

        $verificationCode = (string) mt_rand(100000, 999999);

        $booking = Booking::create([
            'room_id'           => $room->id,
            'guest_name'        => $request->guest_name,
            'guest_email'       => $request->guest_email,
            'guest_phone'       => $request->guest_phone,
            'check_in'          => $request->check_in,
            'check_out'         => $request->check_out,
            'guests'            => $room->max_persons ?? 1,
            'total_price'       => $total,
            'status'            => 'pending',
            'verification_code' => $verificationCode,
            'is_verified'       => false,
        ]);

        Session::put('hotel_ai_history.last_booked_room_type', $room->room_type);
        Session::put('hotel_ai_history.last_booked_room_id', $room->id);
        Session::put('pending_booking_id', $booking->id);

        // Send verification email
        try {
            Mail::to($booking->guest_email)->send(new BookingVerificationMail($booking));
        } catch (\Exception $e) {
            // Log or ignore for local simulation
        }

        return redirect()
            ->route('booking.verify')
            ->with('success', 'Room booked! We have sent a 6-digit verification code to your email.');
    }

    /**
     * Show booking verification page
     */
    public function showVerifyForm()
    {
        $bookingId = Session::get('pending_booking_id');

        if (!$bookingId) {
            return redirect()->route('booking.index')->with('error', 'No pending booking found.');
        }

        $booking = Booking::findOrFail($bookingId);

        return view('frontend.booking_verify', compact('booking'));
    }

    /**
     * Verify email code
     */
    public function verifyCode(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|string|size:6',
        ]);

        $bookingId = Session::get('pending_booking_id');

        if (!$bookingId) {
            return redirect()->route('booking.index')->with('error', 'No pending booking found.');
        }

        $booking = Booking::findOrFail($bookingId);

        if ($request->verification_code === $booking->verification_code) {
            $booking->is_verified = true;
            $booking->status = 'confirmed';
            $booking->save();

            // Send Booking Confirmed email
            try {
                Mail::to($booking->guest_email)->send(new BookingConfirmedMail($booking));
            } catch (\Exception $e) {
                // Log or ignore
            }

            Session::forget('pending_booking_id');

            return redirect()
                ->route('booking.success')
                ->with('success', 'Email verified and booking confirmed successfully! A confirmation email has been sent.')
                ->with('booking_reference', $booking->id)
                ->with('booking_email', $booking->guest_email);
        }

        return back()->with('error', 'Invalid verification code. Please check your email and try again.');
    }

    /**
     * Booking success page
     */
    public function success()
    {
        return view('frontend.booking_success');
    }
}
