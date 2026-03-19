<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Team;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teams = Team::all(); // ✅ plural
        return view('backend.team', compact('teams'));
    }
    public function create()
    {
        return view('backend.team');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'designation' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $team = new Team();

        $team->fullname = $request->fullname;
        $team->email = $request->email;
        $team->designation = $request->designation;
        $team->intro = $request->intro;
        $team->insta = $request->insta;

        // Image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/team'), $name);
            $team->image = $name;
        }

        $team->save();

        return redirect('/admin/team')->with('success', 'Team Member Added');
    }

    public function frontend()
    {
        $team = Team::all();
        return view('frontend.team', compact('team'));
    }
}
