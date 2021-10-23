<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $orders = Order::latest()->limit(5)->get();
        $title = __('titles.index');
        return view('Admin.index', compact(
            'orders', 'title'
        ));
//        return view('admin.index');
    }

    public function profile()
    {
        $title = __('titles.profile');
        return view('Admin.profile', compact('title'));
    }
    public function updateProfile(Request $request)
    {
        $data = $this->validate($request,
        [
            'name'      => 'required|string',
            'email'     => 'sometimes|email|max:255|unique:admins,email,'. auth('admin')->user()->id,
            'photo'    => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',

        ]);

        $admin = Admin::find(auth('admin')->user()->id);
        if ($request->has('photo')){
            unlinkPhoto($admin->photo);
            $data['photo'] = uploadImage('admins', $request->photo);
        }
        $admin->fill($data)->save();

        return redirect()->route('admin.profile')->with('success', __('messages.updated_successfully'));
    }
}
