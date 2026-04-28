<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AiRoomSuggestionService;

class AiSuggestionController extends Controller
{
    public function index()
    {
        return view('frontend.ai-suggestion');
    }

    public function suggest(Request $request, AiRoomSuggestionService $aiService)
    {
        $data = $request->validate([
            'persons' => 'required|integer|min:1',
            'budget' => 'required|numeric|min:0',
            'room_type' => 'required|string',
            'ac_type' => 'required|string',
            'meal_plan' => 'required|string',
            'bed_type' => 'required|string',
            'wifi' => 'required|string',
            'parking' => 'required|string',
        ]);

        $rooms = $aiService->suggestRooms($data);

        return view('frontend.ai-suggestion', compact('rooms'));
    }
}
