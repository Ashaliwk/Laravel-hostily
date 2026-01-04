<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Waffles;
use Illuminate\Http\Request;

class AdminWaffleController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->exists('email')){

            return view('backend.waffle', ['waffleproduct'=>Waffles::get()]);
        } else{
            return view('backend.login');
        }
    }
    public function addWaffle()
    {
        return view('backend.waffle-add');
    }


    public function submitWaffleRecord(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
            ]
            );
            $ADMIN_STATUS = 1;
            $ImageName = 'fs_waffle_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('backend/images/product'), $ImageName);
        $waffleproduct = new Waffles();
        $waffleproduct->name = $request->name;
        $waffleproduct->price = $request->price;
        $waffleproduct->description = $request->description;
        $waffleproduct->image = $ImageName;
        $waffleproduct->status = $ADMIN_STATUS;
        $waffleproduct->save();
        return back()->withSuccess('waffle Record Added Successfully');
    }

    public function editWaffle($id)
    {
        // dd($id);
        $waffleproduct = Waffles::where('id', $id)->first();
        return view('backend.waffle-edit', ['waffleproduct' => $waffleproduct]);
    }

    public function updateWaffle(Request $request, $id)
    {

        $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'image' => 'nullable|mimes:jpeg,jpg,png|max:10000',
            ]
            );

        $waffleproduct = Waffles::where('id', $id)->first();
        $MEMBER_STATUS = 1;
        if(isset($request->image))
        {
            $ImageName = 'fs_waffle_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('backend/images/product'), $ImageName);
            $waffleproduct->image = $ImageName;
        }

        $waffleproduct->name = $request->name;
        $waffleproduct->price = $request->price;
        $waffleproduct->description = $request->description;
        $waffleproduct->status = $MEMBER_STATUS;
        $waffleproduct->save();
        return back()->withSuccess('waffle Item Record Updated Successfully');
    }


    public function deleteWaffle($id)
    {
        $waffleproduct = Waffles::where('id', $id)->first();
        $waffleproduct->delete();
        return back()->withSuccess('waffle Item Record Deleted Successfully');
    }
}
