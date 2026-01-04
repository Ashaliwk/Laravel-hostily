<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\Contact;


class contactcontroller extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'room_type' => 'required|string',
            'message' => 'nullable|string',
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Your message has been submitted successfully!');
    }
}
