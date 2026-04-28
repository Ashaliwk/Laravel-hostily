<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = strtolower($request->input('message', ''));
        
        $response = $this->getFixedAnswer($message);

        return response()->json([
            'reply' => $response
        ]);
    }

    private function getFixedAnswer($message)
    {
        // Simple keyword matching for fixed responses
        if (str_contains($message, 'help') || str_contains($message, 'options')) {
            return "Here are some things you can ask me about:<br>- <b>Check-in/Check-out times</b><br>- <b>Location</b><br>- <b>Room types</b><br>- <b>Contact details</b><br>- <b>Amenities</b>";
        }

        if (str_contains($message, 'check-in') || str_contains($message, 'check in') || str_contains($message, 'check-out') || str_contains($message, 'check out') || str_contains($message, 'time')) {
            return "Our check-in time is at <b>2:00 PM</b>, and check-out is at <b>11:00 AM</b>. Early check-in and late check-out are subject to availability.";
        }

        if (str_contains($message, 'location') || str_contains($message, 'where') || str_contains($message, 'address')) {
            return "We are located at <b>Johar town, 57,000 Lahore, PAK</b>. You can find us easily via Google Maps.";
        }

        if (str_contains($message, 'room') || str_contains($message, 'type')) {
            return "We offer a variety of rooms including Standard, Deluxe, and Suite. You can view more details on our Rooms page.";
        }
        
        if (str_contains($message, 'contact') || str_contains($message, 'phone') || str_contains($message, 'email')) {
            return "You can reach us at <b>hostily53@gmail.com</b> or call us at <b>+92309-7239667</b>.";
        }
        
        if (str_contains($message, 'price') || str_contains($message, 'cost') || str_contains($message, 'rate')) {
            return "Our room rates vary depending on the season and room type. Please check our booking page for accurate pricing.";
        }
        
        if (str_contains($message, 'book') || str_contains($message, 'reservation')) {
            return "You can easily book a room through our website by navigating to the Booking page.";
        }
        
        if (str_contains($message, 'amenit') || str_contains($message, 'service') || str_contains($message, 'facility')) {
            return "We offer Room Cleaning, Car Parking, a Swimming Pool, and a Fitness Gym. Enjoy a comfortable stay with us!";
        }

        if (str_contains($message, 'hi') || str_contains($message, 'hello') || str_contains($message, 'hey')) {
            return "Hello! Welcome to Hostily. How can I help you today? Type <b>'help'</b> to see what I can answer.";
        }

        return "I'm sorry, I don't understand that question. Try asking about our check-in time, location, contact details, or type <b>'help'</b> for options.";
    }
}
