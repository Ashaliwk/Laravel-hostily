<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\backend\Reviews;
use App\Models\frontend\Room;
use App\Services\AiRoomSuggestionService;
use App\Services\RoomDiscoveryService;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function show(int $id)
    {
        $room = Room::findOrFail($id);
        $relatedRooms = Room::where('id', '!=', $room->id)
            ->where('room_type', $room->room_type)
            ->take(3)
            ->get();
        $reviews = Reviews::where('room_id', $room->id)
            ->where('status', 1)
            ->latest()
            ->take(4)
            ->get();

        $history = session('hotel_ai_history', []);
        $viewed = collect($history['viewed_room_ids'] ?? [])
            ->push($room->id)
            ->unique()
            ->take(-10)
            ->values()
            ->all();

        session()->put('hotel_ai_history.viewed_room_ids', $viewed);

        return view('frontend.roomdetails', compact('room', 'relatedRooms', 'reviews'));
    }

    public function search(Request $request, AiRoomSuggestionService $aiService, RoomDiscoveryService $discoveryService)
    {
        $naturalQuery = trim((string) $request->query('query', ''));
        $parsedFilters = $naturalQuery !== '' ? $aiService->parseNaturalLanguageFilters($naturalQuery) : [];
        $requestFilters = $request->only(['budget', 'persons', 'room_type', 'wifi', 'parking', 'ac_type', 'meal_plan']);
        $activeFilters = $naturalQuery !== '' ? $parsedFilters : $requestFilters;

        $rooms = $naturalQuery !== ''
            ? $aiService->suggestRooms($activeFilters)
            : $discoveryService->searchRooms($activeFilters);

        return view('frontend.roomlist', [
            'rooms' => $rooms,
            'naturalLanguageQuery' => $naturalQuery,
            'recommendedRooms' => $discoveryService->recommendedRooms($activeFilters, session('hotel_ai_history', [])),
        ]);
    }
}
