<?php

namespace App\Services;

use App\Models\frontend\Room;
use Illuminate\Support\Arr;

class AiRoomSuggestionService
{
    public function suggestRooms(array $data)
    {
        $query = Room::query()->where('room_status', 'available');
        if (!empty($data['budget'])) {
            $query->where('price', '<=', (float) $data['budget']);
        }

        if (!empty($data['persons'])) {
            $query->where('max_persons', '>=', (int) $data['persons']);
        }

        if (!empty($data['room_type']) && $data['room_type'] !== 'any') {
            $query->whereRaw('LOWER(room_type) = ?', [strtolower((string) $data['room_type'])]);
        }

        if (!empty($data['ac_type']) && $data['ac_type'] !== 'any') {
            $query->where('ac_type', $data['ac_type']);
        }

        // Meal plan
        if (!empty($data['meal_plan']) && $data['meal_plan'] !== 'any') {
            $query->where('meal_plan', $data['meal_plan']);
        }

        // Free WiFi required
        if (!empty($data['wifi']) && strtolower($data['wifi']) === 'yes') {
            $query->where('is_wifi', 1);
        }

        // Free Parking required
        if (!empty($data['parking']) && strtolower($data['parking']) === 'yes') {
            $query->where('is_parking', 1);
        }

        // Order cheapest first so best value rooms appear at top
        return $query->orderBy('price', 'asc')->get();
    }

    public function parseNaturalLanguageFilters(string $query): array
    {
        $filters = [];
        $normalized = strtolower(trim($query));

        if ($normalized === '') {
            return $filters;
        }

        preg_match('/(?:under|below|less than|max(?:imum)?|budget(?: of)?|within)\s*rs\.?\s*([\d,]+(?:\.\d+)?)/i', $query, $budgetMatch);
        if (! empty($budgetMatch[1])) {
            $filters['budget'] = (float) str_replace(',', '', $budgetMatch[1]);
        } elseif (preg_match('/(?:under|below|less than|max(?:imum)?)\s*([\d,]+(?:\.\d+)?)/i', $query, $budgetMatch)) {
            $filters['budget'] = (float) str_replace(',', '', $budgetMatch[1]);
        }

        preg_match('/(\d+)\s*(?:guest|guests|person|persons|people)/i', $query, $personsMatch);
        if (! empty($personsMatch[1])) {
            $filters['persons'] = (int) $personsMatch[1];
        }

        if (str_contains($normalized, 'wifi')) {
            $filters['wifi'] = 'yes';
        }

        if (str_contains($normalized, 'parking')) {
            $filters['parking'] = 'yes';
        }

        if (str_contains($normalized, 'non-ac') || str_contains($normalized, 'non ac')) {
            $filters['ac_type'] = 'Non-AC';
        } elseif (preg_match('/\bac\b/i', $query)) {
            $filters['ac_type'] = 'AC';
        }

        foreach (['breakfast' => 'Breakfast', 'lunch' => 'Lunch', 'dinner' => 'Dinner', 'full board' => 'Full Board'] as $needle => $mealPlan) {
            if (str_contains($normalized, $needle)) {
                $filters['meal_plan'] = $mealPlan;
                break;
            }
        }

        if (str_contains($normalized, 'single')) {
            $filters['room_type'] = 'single';
        } elseif (str_contains($normalized, 'double')) {
            $filters['room_type'] = 'double';
        } elseif (str_contains($normalized, 'suite')) {
            $filters['room_type'] = 'suite';
        } elseif (str_contains($normalized, 'deluxe')) {
            $filters['room_type'] = 'deluxe';
        } elseif (str_contains($normalized, 'family')) {
            $filters['room_type'] = 'family';
        }

        return $filters;
    }

    public function searchFromNaturalLanguage(string $query): \Illuminate\Database\Eloquent\Collection
    {
        $localFilters = $this->parseNaturalLanguageFilters($query);

        return $this->suggestRooms(Arr::only($localFilters, [
            'budget',
            'persons',
            'ac_type',
            'meal_plan',
            'wifi',
            'parking',
            'room_type',
        ]));
    }
}
