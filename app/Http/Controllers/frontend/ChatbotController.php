<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\Room;
use App\Services\GeminiHotelAssistantService;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function sendMessage(Request $request, GeminiHotelAssistantService $assistant)
    {
        $message = strtolower($request->input('message', ''));
        $rooms = Room::orderBy('price')->get();
        $response = $assistant->chatReply($message, $rooms, $this->faqContext());

        if (! $response) {
            $response = $this->getFixedAnswer($message, $rooms);
        }

        return response()->json([
            'reply' => $response,
        ]);
    }

    private function getFixedAnswer(string $message, $rooms): string
    {
        if (str_contains($message, 'help') || str_contains($message, 'options')) {
            return "You can ask about room prices, available room types, booking help, policies, amenities, Wi-Fi, parking, and meal plans.";
        }

        if (str_contains($message, 'check-in') || str_contains($message, 'check in') || str_contains($message, 'check-out') || str_contains($message, 'check out') || str_contains($message, 'time')) {
            return "Check-in starts at 2:00 PM and check-out is at 11:00 AM. Early check-in and late check-out depend on availability.";
        }

        if (str_contains($message, 'location') || str_contains($message, 'where') || str_contains($message, 'address')) {
            return "Hostily is located in Johar Town, Lahore, Pakistan.";
        }

        if (str_contains($message, 'cheap') || str_contains($message, 'budget') || str_contains($message, 'affordable')) {
            $budgetRoom = $rooms->sortBy('price')->first();
            if ($budgetRoom) {
                return "Our most affordable current option is {$budgetRoom->name} at " . number_format($budgetRoom->price) . " PKR per night.";
            }
        }

        if (str_contains($message, 'room') || str_contains($message, 'type')) {
            $types = $rooms->pluck('room_type')->filter()->unique()->map(fn ($type) => ucfirst($type))->implode(', ');
            return $types !== ''
                ? "We currently offer {$types} rooms. Open Room List for full details and booking options."
                : "We offer several room types with different capacities, amenities, and pricing.";
        }

        if (str_contains($message, 'contact') || str_contains($message, 'phone') || str_contains($message, 'email')) {
            return "You can reach Hostily at hostily53@gmail.com or +92309-7239667.";
        }

        if (str_contains($message, 'price') || str_contains($message, 'cost') || str_contains($message, 'rate')) {
            $lowest = $rooms->min('price');
            $highest = $rooms->max('price');

            if ($lowest && $highest) {
                return "Our room rates currently range from " . number_format($lowest) . " PKR to " . number_format($highest) . " PKR per night.";
            }

            return "Our room rates vary by dates and room type. The Room List page shows the latest base prices.";
        }

        if (str_contains($message, 'book') || str_contains($message, 'reservation')) {
            return "You can book directly from the room details page or the booking page once you pick a room.";
        }

        if (str_contains($message, 'amenit') || str_contains($message, 'service') || str_contains($message, 'facility')) {
            return "Guests enjoy housekeeping, high-speed Wi-Fi, room service, airport transfer, parking, spa access, a fitness center, and concierge support.";
        }

        if (str_contains($message, 'hi') || str_contains($message, 'hello') || str_contains($message, 'hey')) {
            return "Hello and welcome to Hostily. Tell me what kind of stay you need and I will help narrow it down.";
        }

        return "I can help with room choices, pricing, amenities, and booking guidance. Try asking for a room under a budget or for a room type.";
    }

    private function faqContext(): array
    {
        return [
            ['question' => 'Check-in and check-out', 'answer' => 'Check-in starts at 2:00 PM and check-out is at 11:00 AM.'],
            ['question' => 'Location', 'answer' => 'Johar Town, Lahore, Pakistan.'],
            ['question' => 'Contact', 'answer' => 'Email hostily53@gmail.com and phone +92309-7239667.'],
            ['question' => 'Policies', 'answer' => 'Early check-in and late check-out depend on availability.'],
        ];
    }
}
