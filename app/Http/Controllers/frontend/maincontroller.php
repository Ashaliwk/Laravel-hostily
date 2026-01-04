<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Routing\Controller;

class maincontroller extends Controller
{
    public function index()
    {
        return view('frontend.main');
    }
}
