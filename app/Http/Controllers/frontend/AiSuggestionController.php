<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Services\AiRoomSuggestionService;
use Illuminate\Http\Request;

class AiSuggestionController extends Controller
{
    public function index()
    {
        return view('frontend.ai-suggestion');
    }

    public function suggest(Request $request, AiRoomSuggestionService $aiService)
    {
        $data = $request->validate([
            'persons'   => 'required|integer|min:1',
            'budget'    => 'required|numeric|min:0',
            'ac_type'   => 'nullable|string',
            'meal_plan' => 'nullable|string',
            'wifi'      => 'nullable|string',
            'parking'   => 'nullable|string',
        ]);

        $rooms   = $aiService->suggestRooms($data);
        $filters = $data;

        return view('frontend.ai-suggestion', compact('rooms', 'filters'));
    }
}
