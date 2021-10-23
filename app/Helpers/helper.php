<?php

use App\Models\Language;
use App\Models\Product;

/**
 * Get All Active Languages
 */
function getLanguages()
{
    return Language::active()->selection()->get();
}

 function generalInputs(): array
{
    return [
        'text', 'file', 'date', 'color', 'email', 'password', 'number'
    ];
}

/**
 * @param $folder
 * @param $image
 * @return mixed
 */
function uploadImage($folder, $image)
{
    $imageName =  random_int(10000, 16543254) . '.' . $image->getClientOriginalExtension();
   return $image->storeAs('uploads/images/' . $folder, $imageName, 'public');
}

/**
 * Get Default App Language
 *
 * @return mixed
 */
function getDefaultLang()
{
    if (session()->has('lang')){
       $lang = session()->get('lang');
    }else{
        $lang = Language::oldest()->first();    }

    return $lang;
}

function settings($attr){
    $setting = \App\Models\Settings::all()->first();
    return $setting->$attr;
}
/**
 *
 * Delete photo of a specific iten
 * @param $photo
 */
 function unlinkPhoto($photo)
{
    if (Storage::exists($photo))
        Storage::delete($photo);
}

/**
 *  check if a specific product is already exists in cart
 * @param Product $product
 * @return null
 */
function existInCart($product)
{
    $cartItemId = null;
    foreach (\Cart::getContent() as $item) {
        if ($item->associatedModel->id === $product->id) {
            $cartItemId = $item->id;
            break;
        }
    }
    return \Cart::get($cartItemId);
}


