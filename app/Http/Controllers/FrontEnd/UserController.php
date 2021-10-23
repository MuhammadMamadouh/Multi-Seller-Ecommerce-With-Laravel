<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function information(){

        return view('frontend.user.information');
    }
    public function my_orders(){

        $orders = auth('web')->user()->orders()->paginate(10);
        return view('frontend.user.orders', compact('orders'));
    }
    public function wishlist(){

        $wishlist = auth('web')->user()->wishlist()->paginate(10);
        return view('frontend.user.wishlist', compact('wishlist'));
    }

    public function edit_information()
    {
        $item = auth('web')->user();
        $writables = User::getWritables();
        $translables = User::translabes();
        $actionLink = route('user.save-info');
        return view('frontend.user.edit-info', compact('item','writables', 'translables', 'actionLink'));
    }

    public function save_information(UserRequest $request){
        $user = auth('web')->user();
        $data = $request->all();
        if ($request->has('photo')){
            $this->unlinkPhoto($user->photo);
            $data['photo'] = uploadImage('users', $request->photo);
        }
        if ($request->has('password')){
            $data['password'] = Hash::make($request->password);
        }

        $user->fill($data)->save();
        return redirect()->route('user.dashboard')->with('success', __('updated_successfully'));
    }

    /**
     * Delete photo of a specific iten
     * @param $photo
     */
    private function unlinkPhoto($photo)
    {
        if (Storage::exists($photo))
            Storage::delete($photo);
    }

}
