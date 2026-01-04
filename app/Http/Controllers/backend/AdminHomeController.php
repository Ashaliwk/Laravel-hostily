<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Admins;
use App\Models\backend\FAQs;
use App\Models\backend\rooms;
use App\Models\backend\Team;
use App\Models\backend\Shops;
use App\Models\backend\Reviews;
use App\Models\backend\FoodItem;

class AdminHomeController extends Controller
{
    public function index()
    {
        if (session()->has('email')) {
            $Name = session('first_name') . " " . session('last_name');

            $TotalAdmins       = Admins::count();
            $TotalTeam         = Team::count();           // table: team
            $TotalFAQs         = FAQs::count();           // table: faqs
            $TotalReviews      = Reviews::count();        // table: reviews
            $TotalShopProduct  = Shops::count();          // table: shops
            $Totalrooms     = rooms::count();        // table: rooms
            $foodItems         = FoodItem::count();       // table: foodItems (fixed via model)

            return view('backend.index', compact(
                'Name',
                'TotalAdmins',
                'TotalTeam',
                'TotalFAQs',
                'TotalReviews',
                'TotalShopProduct',
                'Totalrooms',
                'foodItems'
            ));
        } else {
            return view('backend.login');
        }
    }

    public function registerAdmin()
    {
        $url = url('/admin/register');
        return view('backend.admin-add', compact('url'));
    }

    public function submitAdminRecord(Request $request)
    {
        $request->validate([
            'first_name'       => 'required',
            'last_name'        => 'required',
            'email'            => 'required|email',
            'password'         => 'required',
            'confirm_password' => 'required|same:password',
            'contact'          => 'required'
        ]);

        $admin = new Admins();
        $admin->first_name = $request->first_name;
        $admin->last_name  = $request->last_name;
        $admin->email      = $request->email;
        $admin->contact    = $request->contact;
        $admin->password   = bcrypt($request->password);  // ← better than plain/md5
        $admin->status     = 1;
        $admin->save();

        return redirect('/admin/admins-list')->withSuccess('Admin added successfully!');
    }

    public function showAdminRecord()
    {
        $admins = Admins::all();
        return view('backend.admins-list', compact('admins'));
    }

    public function deleteAdminRecord(string $id)
    {
        $admin = Admins::find($id);
        if ($admin) {
            $admin->delete();
        }
        return redirect('/admin/admins-list')->withSuccess('Admin deleted successfully!');
    }

    public function editAdminRecord($id)
    {
        $admin = Admins::find($id);

        if (!$admin) {
            return redirect('/admin/admins-list');
        }

        $url = url('/admin/update') . "/" . $id;
        return view('backend.admin-add', compact('admin', 'url'));
    }

    public function updateAdminRecord(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
            'contact'    => 'required'
        ]);

        $admin = Admins::findOrFail($id);
        $admin->first_name = $request->first_name;
        $admin->last_name  = $request->last_name;
        $admin->email      = $request->email;
        $admin->contact    = $request->contact;
        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password);
        }
        $admin->save();

        return redirect('/admin/admins-list')->withSuccess('Admin updated successfully!');
    }
}