<?php

namespace App\Services;

use App\Models\frontend\Room;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AiRoomSuggestionService
{
    public function suggestRooms($data)
    {
        $apiKey = env('OPENAI_API_KEY');

        // Fallback if no API key is provided
        if (!$apiKey) {
            return $this->fallbackFilter($data);
        }

        try {
            $prompt = $this->buildPrompt($data);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are a hotel room recommendation assistant. Based on user requirements, return ONLY a JSON object with keys: max_persons (int), room_type (string: economy/luxury/suite/family/single/double), ac_type (string: AC/Non-AC), meal_plan (string), bed_type (string), is_wifi (boolean), is_parking (boolean), budget (int). Do not include any text outside the JSON.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $prompt
                    ]
                ],
                'max_tokens' => 150,
                'temperature' => 0.2,
            ]);

            if ($response->successful()) {
                $content = $response->json()['choices'][0]['message']['content'];
                $structuredData = json_decode($content, true);
                
                if (json_last_error() === JSON_ERROR_NONE && is_array($structuredData)) {
                    // Combine original data with AI structured data to search database
                    return $this->fallbackFilter(array_merge($data, $structuredData));
                }
            }
            
            // If OpenAI fails or returns invalid JSON, fallback to standard
            return $this->fallbackFilter($data);
            
        } catch (\Exception $e) {
            Log::error('OpenAI API Error: ' . $e->getMessage());
            return $this->fallbackFilter($data);
        }
    }

    private function buildPrompt($data)
    {
        return "I need a room for {$data['persons']} persons. My budget is {$data['budget']}. " .
               "I prefer a {$data['room_type']} room with {$data['ac_type']}. " .
               "Meal plan: {$data['meal_plan']}, Bed: {$data['bed_type']}. " .
               "WiFi required: {$data['wifi']}, Parking required: {$data['parking']}.";
    }

    private function fallbackFilter($data)
    {
        $query = Room::query();

        // Always check available status
        $query->where('room_status', 'available');

        if (!empty($data['persons'])) {
            $query->where('max_persons', '>=', $data['persons']);
        }
        if (!empty($data['budget'])) {
            $query->where('price', '<=', $data['budget']);
        }
        if (!empty($data['room_type']) && $data['room_type'] !== 'any') {
            $query->where('room_type', strtolower($data['room_type']));
        }
        if (!empty($data['ac_type']) && $data['ac_type'] !== 'any') {
            $query->where('ac_type', $data['ac_type']);
        }
        if (!empty($data['bed_type']) && $data['bed_type'] !== 'any') {
            $query->where('bed_type', $data['bed_type']);
        }
        if (!empty($data['meal_plan']) && $data['meal_plan'] !== 'any') {
            $query->where('meal_plan', $data['meal_plan']);
        }
        if (isset($data['wifi']) && strtolower($data['wifi']) === 'yes') {
            $query->where('is_wifi', 1);
        }
        if (isset($data['parking']) && strtolower($data['parking']) === 'yes') {
            $query->where('is_parking', 1);
        }

        return $query->orderBy('price', 'asc')->take(5)->get();
    }
}
