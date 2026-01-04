<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Routing\Controller;

class bookcontroller extends Controller
{
    public function index()
    {
        return view('frontend.book');
    }
}