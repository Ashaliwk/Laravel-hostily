<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminroomsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->exists('email')) {
            return view('backend.room', ['rooms' => rooms::get()]);
        } else {
            return view('backend.login');
        }
    }

    public function addroom()
    {
        return view('backend.room-add');
    }

    public function submitroomRecord(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'price'       => 'required|numeric',
            'description' => 'required',
            'image'       => 'required|mimes:jpeg,jpg,png,gif,webp|max:10000'
        ]);

        $ADMIN_STATUS = 1;
        $ImageName = 'fs_room_' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('backend/images/product'), $ImageName);

        $rooms = rooms::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'description' => $request->description,
            'image'       => $ImageName,
            'status'      => $ADMIN_STATUS,
        ]);

        Session::flash('success', 'Room Record Added Successfully');
        Session::flash('rooms', $rooms);

        return redirect()->back();
    }

    public function editroom($id)
    {
        $rooms = rooms::where('id', $id)->first();
        return view('backend.room-edit', ['rooms' => $rooms]);
    }

    public function updateroom(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required',
            'price'       => 'required|numeric',
            'description' => 'required',
            'image'       => 'nullable|mimes:jpeg,jpg,png,gif,webp|max:10000',
        ]);

        $rooms = rooms::findOrFail($id);
        $MEMBER_STATUS = 1;

        if ($request->hasFile('image')) {
            if ($rooms->image && file_exists(public_path('backend/images/product/' . $rooms->image))) {
                @unlink(public_path('backend/images/product/' . $rooms->image));
            }
            $ImageName = 'fs_room_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('backend/images/product'), $ImageName);
            $rooms->image = $ImageName;
        }

        $rooms->name        = $request->name;
        $rooms->price       = $request->price;
        $rooms->description = $request->description;
        $rooms->status      = $MEMBER_STATUS;
        $rooms->save();

        if ($request->name !== $rooms->getOriginal('name')) {
            $rooms->generateQrCode(true);
        }

        Session::flash('success', 'room Item Record Updated Successfully');
        Session::flash('rooms', $rooms);

        return redirect()->back();
    }

    public function deleteroom($id)
    {
        $rooms = rooms::findOrFail($id);

        if ($rooms->image) {
            @unlink(public_path('backend/images/product/' . $rooms->image));
        }

        if ($rooms->qr_code && file_exists(public_path('storage/qrcodes/' . $rooms->qr_code))) {
            @unlink(public_path('storage/qrcodes/' . $rooms->qr_code));
        }

        $rooms->delete();

        return back()->withSuccess('room Item Record Deleted Successfully');
    }
}