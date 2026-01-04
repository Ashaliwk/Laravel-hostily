<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Routing\Controller;

class blogdetailscontroller extends Controller
{
    public function index()
    {
        return view('frontend.blogdetails');
    }
}
