<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Routing\Controller;

class aboutcontroller extends Controller
{
    public function index()
    {
        return view('frontend.about');
    }
}
