<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'room_count' => 'required|integer|min:1',
        ]);

        Room::create([
            'room_type' => $request->room_type,
            'room_count' => $request->room_count,
        ]);

        return redirect()->back()->with('success', 'Room booking recorded successfully.');
    }
}
