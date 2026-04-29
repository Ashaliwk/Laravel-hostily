<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\backend\Reviews;
use App\Models\frontend\Booking;
use App\Services\GeminiHotelAssistantService;
use App\Services\ReviewInsightService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(ReviewInsightService $insightService)
    {
        $reviews = Reviews::query()
            ->where('status', 1)
            ->with('room')
            ->latest()
            ->get();

        $reviewInsight = $insightService->summarizeCollection($reviews);

        return view('frontend.reviews', compact('reviews', 'reviewInsight'));
    }

    public function store(Request $request, ReviewInsightService $insightService, GeminiHotelAssistantService $assistant)
    {
        $data = $request->validate([
            'booking_id' => 'required|integer|exists:bookings,id',
            'guest_email' => 'required|email',
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'description' => 'required|string|min:20|max:2000',
        ]);

        $booking = Booking::where('id', $data['booking_id'])
            ->where('guest_email', $data['guest_email'])
            ->first();

        if (! $booking) {
            return back()->withInput()->with('error', 'We could not match that booking with the room and email you provided.');
        }

        if (Carbon::parse($booking->check_out)->isFuture()) {
            return back()->withInput()->with('error', 'Reviews become available after your stay has finished.');
        }

        if (Reviews::where('booking_id', $booking->id)->exists()) {
            return back()->withInput()->with('error', 'A review has already been submitted for this stay.');
        }

        $analysis = $insightService->analyzeText($data['description'], $assistant);

        Reviews::create([
            'room_id' => $booking->room_id,
            'booking_id' => $booking->id,
            'name' => $data['name'],
            'country' => $data['country'],
            'guest_email' => $data['guest_email'],
            'title' => $data['title'],
            'rating' => $data['rating'],
            'stay_date' => $booking->check_out,
            'description' => $data['description'],
            'sentiment' => $analysis['sentiment'],
            'summary' => $analysis['summary'],
            'image' => 'testimonial-1.jpg',
            'status' => 0,
            'is_verified_stay' => true,
        ]);

        return redirect()->route('reviews.index')->with('success', 'Thanks. Your review has been submitted and is waiting for admin approval.');
    }
}
