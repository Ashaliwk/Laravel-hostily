<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiHotelAssistantService
{
    public function isConfigured(): bool
    {
        return filled(config('services.gemini.api_key'));
    }

    public function chatReply(string $message, Collection $rooms, array $faqs = []): ?string
    {
        $roomContext = $rooms->take(8)->map(function ($room) {
            return [
                'name' => $room->name,
                'price' => $room->price,
                'room_type' => $room->room_type,
                'max_persons' => $room->max_persons,
                'ac_type' => $room->ac_type,
                'meal_plan' => $room->meal_plan,
                'room_status' => $room->room_status,
                'is_wifi' => (bool) $room->is_wifi,
                'is_parking' => (bool) $room->is_parking,
            ];
        })->values()->all();

        $faqContext = collect($faqs)->values()->all();

        $prompt = "You are Hostily, a warm hotel concierge. Answer briefly and helpfully. " .
            "Use only the provided hotel information. If availability is uncertain, say it depends on live booking confirmation. " .
            "Mention room names when recommending options.\n\n" .
            "Hotel FAQ data: " . json_encode($faqContext) . "\n" .
            "Available room context: " . json_encode($roomContext) . "\n" .
            "Guest message: {$message}";

        return $this->sendForText($prompt);
    }

    public function parseRoomSearch(string $query): ?array
    {
        $prompt = "Convert hotel room search text into JSON with these keys only: budget, room_type, persons, wifi, parking, ac_type, meal_plan, sea_view, keywords. " .
            "Use null when unknown. Return JSON only.\n\nSearch request: {$query}";

        $text = $this->sendForText($prompt);

        if (! $text) {
            return null;
        }

        $decoded = json_decode($text, true);

        return is_array($decoded) ? $decoded : null;
    }

    public function analyzeReview(string $reviewText): ?array
    {
        $prompt = "Analyze this hotel review and return JSON only with keys: sentiment (positive, mixed, negative), summary, issues (array of short strings).\n\n" .
            "Review: {$reviewText}";

        $text = $this->sendForText($prompt);

        if (! $text) {
            return null;
        }

        $decoded = json_decode($text, true);

        return is_array($decoded) ? $decoded : null;
    }

    private function sendForText(string $prompt): ?string
    {
        if (! $this->isConfigured()) {
            return null;
        }

        try {
            $model = config('services.gemini.model', 'gemini-2.5-flash');
            $response = Http::acceptJson()
                ->withHeaders([
                    'x-goog-api-key' => config('services.gemini.api_key'),
                    'Content-Type' => 'application/json',
                ])
                ->post("https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent", [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $prompt],
                            ],
                        ],
                    ],
                    'generationConfig' => [
                        'temperature' => 0.2,
                    ],
                ]);

            if (! $response->successful()) {
                Log::warning('Gemini request failed', ['status' => $response->status(), 'body' => $response->json()]);
                return null;
            }

            $parts = collect($response->json('candidates.0.content.parts', []))
                ->pluck('text')
                ->filter()
                ->implode("\n");

            return $parts !== '' ? trim($parts) : null;
        } catch (\Throwable $exception) {
            Log::error('Gemini hotel assistant error', ['message' => $exception->getMessage()]);
            return null;
        }
    }
}
