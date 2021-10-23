<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
//
    }
    public function profile()
    {
        $title = __('titles.profile');
        $writables = Vendor::getWritables();
        return view('Seller.profile', compact('title', 'writables'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateProfile(Request $request)
    {
        $data= $this->validate($request,[
            'name'              => 'required|string|max:255',
            'email'             => 'sometimes|email|max:255|unique:vendors,email,'. auth('seller')->user()->id,
            'mobile'            => 'sometimes|max:15|unique:vendors,mobile,' .auth('seller')->user()->id,
            'password'          => 'sometimes|string|min:6',
            'address'           => 'nullable|string',
            'photo'             => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            'status'            => 'sometimes|in:active,inactive',
            'main_category_id'  => 'required_without:id|exists:main_categories,id'
        ]);
        $seller = auth('seller')->user();
        if ($request->has('photo')){
            if ($seller->photo)
            unlinkPhoto($seller->photo);
            $data['photo'] = uploadImage('seller', $request->photo);
        }
        $seller->fill($data)->save();

        return redirect()->route('seller.profile')->with('success', __('messages.updated_successfully'));
    }



}
