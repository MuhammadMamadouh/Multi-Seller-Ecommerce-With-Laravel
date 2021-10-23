<?php

namespace App\Http\Controllers;


use App\Http\Requests\VendorRequest;
use App\Models\Vendor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
class VendorRegisterController extends Controller
{
      /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $writables = Vendor::getWritables();
        $translables = Vendor::translabes();
        return view('seller.auth.register',compact('translables', 'writables'));
    }


    public function register(VendorRequest $request)
    {
        $data   = $request->validated();
        if ($request->hasFile('photo'))
            $data['photo'] = uploadImage('sellers', $request->photo);

        $seller = Vendor::create($data);

        event(new Registered($seller));
        Auth::guard('seller')->login($seller);

        return redirect(RouteServiceProvider::SELLER);
    }
}
