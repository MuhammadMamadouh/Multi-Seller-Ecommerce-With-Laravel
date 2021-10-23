<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorLoginController extends Controller
{
    protected $redirectTo = '/seller/user';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:seller')->except('logout');

    }


    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (auth('seller')->attempt(['email' => $request->email, 'password'=> $request->password],$request->get('remember'))){
            return redirect()->intended('/seller/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function destroy(Request $request)
    {
        \auth('seller')->logout();
        $request->session()->invalidate();

        return back()->withInput($request->only('email', 'remember'));
    }
}
