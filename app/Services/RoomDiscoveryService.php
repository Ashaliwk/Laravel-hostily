<?php

namespace App\Services;

use App\Models\frontend\Room;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class RoomDiscoveryService
{
    public function recommendedRooms(array $preferences = [], array $history = []): Collection
    {
        $budget = ! empty($preferences['budget']) ? (float) $preferences['budget'] : null;

        $rooms = Room::query()
            ->when(array_key_exists('room_status', (new Room())->getAttributes()), fn ($query) => $query->where('room_status', 'available'))
            ->when($budget !== null, fn ($query) => $query->where('price', '<=', $budget))
            ->get();

        return $rooms
            ->map(function ($room) use ($preferences, $history) {
                $score = 0;

                if (! empty($preferences['budget']) && $room->price <= (float) $preferences['budget']) {
                    $score += 3;
                }
                if (! empty($preferences['persons']) && $room->max_persons >= (int) $preferences['persons']) {
                    $score += 3;
                }
                if (! empty($preferences['room_type']) && strtolower((string) $room->room_type) === strtolower((string) $preferences['room_type'])) {
                    $score += 3;
                }
                if (($preferences['wifi'] ?? null) === 'yes' && $room->is_wifi) {
                    $score += 2;
                }
                if (($preferences['parking'] ?? null) === 'yes' && $room->is_parking) {
                    $score += 2;
                }
                if (! empty($preferences['ac_type']) && strtolower((string) $preferences['ac_type']) === strtolower((string) $room->ac_type)) {
                    $score += 1;
                }
                if (in_array($room->id, Arr::wrap($history['viewed_room_ids'] ?? []), true)) {
                    $score += 2;
                }
                if (($history['last_booked_room_type'] ?? null) && strtolower((string) $history['last_booked_room_type']) === strtolower((string) $room->room_type)) {
                    $score += 2;
                }

                $room->recommendation_score = $score;

                return $room;
            })
            ->sortByDesc('recommendation_score')
            ->sortBy('price')
            ->take(6)
            ->values();
    }

    public function searchRooms(array $filters = []): Collection
    {
        return Room::query()
            ->when(! empty($filters['budget']), fn ($query) => $query->where('price', '<=', (float) $filters['budget']))
            ->when(! empty($filters['persons']), fn ($query) => $query->where('max_persons', '>=', (int) $filters['persons']))
            ->when(! empty($filters['room_type']) && $filters['room_type'] !== 'any', fn ($query) => $query->where('room_type', strtolower((string) $filters['room_type'])))
            ->when(! empty($filters['ac_type']) && $filters['ac_type'] !== 'any', fn ($query) => $query->where('ac_type', $filters['ac_type']))
            ->when(! empty($filters['meal_plan']) && $filters['meal_plan'] !== 'any', fn ($query) => $query->where('meal_plan', $filters['meal_plan']))
            ->when(($filters['wifi'] ?? null) === 'yes', fn ($query) => $query->where('is_wifi', 1))
            ->when(($filters['parking'] ?? null) === 'yes', fn ($query) => $query->where('is_parking', 1))
            ->when(! empty($filters['keywords']), function ($query) use ($filters) {
                $keywords = is_array($filters['keywords']) ? $filters['keywords'] : explode(' ', (string) $filters['keywords']);
                $query->where(function ($inner) use ($keywords) {
                    foreach ($keywords as $keyword) {
                        $keyword = trim((string) $keyword);
                        if ($keyword === '') {
                            continue;
                        }
                        $inner->orWhere('name', 'like', "%{$keyword}%")
                            ->orWhere('description', 'like', "%{$keyword}%");
                    }
                });
            })
            ->orderBy('price')
            ->get();
    }
}
