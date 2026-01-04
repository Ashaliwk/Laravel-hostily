<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Routing\Controller;

class pricingcontroller extends Controller
{
    public function index()
    {
        return view('frontend.pricing');
    }
}
