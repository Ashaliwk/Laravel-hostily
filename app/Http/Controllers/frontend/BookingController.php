<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\backend\rooms;
use App\Models\frontend\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function show($id)
    {
        $room = rooms::findOrFail($id);

        return view('frontend.booking', compact('room'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1|max:10',
        ]);

        $room = rooms::findOrFail($request->room_id);

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
            return back()->withInput()->with('error', 'Sorry, this room is already booked for the selected dates.');
        }

        $nights = Carbon::parse($request->check_in)->diffInDays($request->check_out);
        $total = $nights * $room->price;

        Booking::create([
            'room_id'     => $room->id,
            'user_id'     => auth()->id() ?? null, // Allows guest bookings
            'check_in'    => $request->check_in,
            'check_out'   => $request->check_out,
            'guests'      => $request->guests,
            'total_price' => $total,
            'status'      => 'pending',
        ]);

        return redirect()->route('booking.success')
                         ->with('success', 'Room booked successfully! We have sent a confirmation to your email.');
    }

    public function success()
    {
        return view('frontend.booking_success');
    }
}