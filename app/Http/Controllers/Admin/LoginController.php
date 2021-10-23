<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function loginPage()
    {
        return view('admin.auth.login');
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request){

        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password'=> $request->password],$request->get('remember'))){
            return redirect()->route('admin.index');
        }
        return back()->with('error', __('messages.failed_login'));
    }

    /**
     * Destroy Session
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {

        \auth('admin')->logout();
        $request->session()->invalidate();

        return back()->withInput($request->only('email', 'remember'));
    }
}
