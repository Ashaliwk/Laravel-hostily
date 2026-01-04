<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\backend\FoodItem;

class Fitemcontroller extends Controller
{
    public function index()
    {
        $foodItems = FoodItem::all();
        return view('backend.fitem', compact('foodItems'));
    }

    public function create()
    {
        return view('backend.fitem-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:3072'
        ]);

        $fileNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/fitems'), $fileName);
                $fileNames[] = $fileName;
            }
        }

        FoodItem::create([
            'name' => $request->name,
            'images' => json_encode($fileNames),
        ]);

        return redirect('/admin/fitem')->with('success', 'Food item added successfully!');
    }

    public function edit($id)
    {
        $item = FoodItem::findOrFail($id);
        return view('backend.fitem-edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:3072'
        ]);

        $item = FoodItem::findOrFail($id);

        $fileNames = [];

        if ($request->hasFile('images')) {
            // ✅ Delete old images from storage
            $oldImages = json_decode($item->images, true);
            if (is_array($oldImages)) {
                foreach ($oldImages as $oldImg) {
                    $path = public_path('uploads/fitems/' . $oldImg);
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }

            // ✅ Upload new images
            foreach ($request->file('images') as $image) {
                $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/fitems'), $fileName);
                $fileNames[] = $fileName;
            }

            $item->images = json_encode($fileNames);
        }

        // ✅ Update name (always)
        $item->name = $request->name;
        $item->save();

        return redirect('/admin/fitem')->with('success', 'Food item updated successfully!');
    }

    public function destroy($id)
    {
        $item = FoodItem::findOrFail($id);

        // ✅ Delete images from disk
        $images = json_decode($item->images, true);
        if (is_array($images)) {
            foreach ($images as $img) {
                $path = public_path('uploads/fitems/' . $img);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        $item->delete();
        return redirect()->route('fitem.show')->with('success', 'Food item deleted successfully!');
    }
}
