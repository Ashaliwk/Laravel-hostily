<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\WaffleModel;
use App\Models\backend\Waffles;
use Illuminate\Http\Request;

class WaffleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.waffle', ['waffleproduct'=>Waffles::get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function submitMessage(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'email|required',
                'message' => 'required'
            ]
        );

        $contact = new WaffleModel();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        return back()->withSuccess('Thanks for Contacting. We\'ll Contact you ASAP!');
    }
}
