<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Routing\Controller;
use App\Models\frontend\Room;
use App\Services\RoomDiscoveryService;

class roomlistcontroller extends Controller
{
    public function index(RoomDiscoveryService $discoveryService)
    {
        $rooms = Room::orderBy('price')->get();
        $recommendedRooms = $discoveryService->recommendedRooms([], session('hotel_ai_history', []));

        return view('frontend.roomlist', compact('rooms', 'recommendedRooms'));
    }
}
