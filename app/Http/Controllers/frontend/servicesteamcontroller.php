<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Routing\Controller;

class servicesteamcontroller extends Controller
{
    public function index()
    {
        return view('frontend.servicesteam');
    }
}