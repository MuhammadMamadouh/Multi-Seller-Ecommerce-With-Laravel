<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'Language'], function () {

    Route::get('/', [App\Http\Controllers\FrontEnd\IndexController::class, 'index']);

    Route::get('/category/{slug}/products', [App\Http\Controllers\FrontEnd\ProductController::class, 'category_products'])->name('category.products');
    Route::get('/brand/{slug}/products', [App\Http\Controllers\FrontEnd\BrandProducts::class, 'show'])->name('brand.products');


//==========================================
//------------ User Auth Routes---------------
//==========================================
    require __DIR__ . '/auth.php';

//==========================================
//------------ Vendor Auth Routes---------------
//==========================================
    require __DIR__ . '/seller.php';


//==========================================
//------------ Product Routes---------------
//==========================================

    Route::group(['prefix' => 'product'], function () {
        Route::get('/{id}', [\App\Http\Controllers\FrontEnd\ProductController::class, 'product_details'])->name('product.details');
        Route::post('view-modal', [\App\Http\Controllers\FrontEnd\ProductController::class, 'view_modal'])->name('product.view-modal');
    });

//==========================================
//------------ Cart Routes---------------
//==========================================
    Route::delete('cart/clear', [App\Http\Controllers\FrontEnd\CartController::class, 'clearCart'])->name('cart.clear');
    Route::resource('cart', App\Http\Controllers\FrontEnd\CartController::class);
    Route::get('update_cart', [App\Http\Controllers\FrontEnd\CartController::class, 'updateCart']);


//==========================================
//------------ Cart Routes---------------
//==========================================

    Route::resource('wishlist', App\Http\Controllers\FrontEnd\WishListController::class);
    Route::get('update_wishlist', [App\Http\Controllers\FrontEnd\WishListController::class, 'updateWishList']);

//==========================================
//------------ Coupon Routes---------------
//==========================================

    Route::post('coupon/apply', [App\Http\Controllers\FrontEnd\CouponController::class, 'applyCoupon'])->name('coupon.apply');
    Route::post('coupon/remove', [App\Http\Controllers\FrontEnd\CouponController::class, 'removeCoupon'])->name('coupon.remove');


//==========================================
//------------ Checkout Routes---------------
//==========================================
    Route::get('checkout', [App\Http\Controllers\FrontEnd\CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('checkout', [App\Http\Controllers\FrontEnd\CheckoutController::class, 'store'])->name('checkout.store');

    Route::post('checkout1', [App\Http\Controllers\FrontEnd\CheckoutController::class, 'checkout1_store'])->name('checkout1.store');

    Route::post('checkout2', [App\Http\Controllers\FrontEnd\CheckoutController::class, 'checkout2_store'])->name('checkout2.store');
    Route::post('checkout3', [App\Http\Controllers\FrontEnd\CheckoutController::class, 'checkout3_store'])->name('checkout3.store');

    Route::post('placeOrder', [App\Http\Controllers\FrontEnd\CheckoutController::class, 'placeOrder'])->name('placeOrder');

//==========================================
//------------ Shop Routes---------------
//==========================================

    Route::get('shop', [App\Http\Controllers\FrontEnd\ShopController::class, 'index'])->name('shop.index');
    Route::get('shop/filter', [App\Http\Controllers\FrontEnd\ShopController::class, 'filter'])->name('shop.filter');


//==========================================
//------------ User Routes---------------
//==========================================
    Route::group(['middleware' => 'auth:web'], function () {
        Route::get('dashboard', [App\Http\Controllers\FrontEnd\UserController::class, 'information'])->name('user.dashboard');
        Route::get('my-orders', [App\Http\Controllers\FrontEnd\UserController::class, 'my_orders'])->name('user.orders');
        Route::get('my-wishlist', [App\Http\Controllers\FrontEnd\UserController::class, 'wishlist'])->name('user.wishlist');
        Route::get('info/edit', [App\Http\Controllers\FrontEnd\UserController::class, 'edit_information'])->name('user.edit-info');
        Route::put('info/save', [App\Http\Controllers\FrontEnd\UserController::class, 'save_information'])->name('user.save-info');
    });

//    Route::get('/user', function () {
//        $order = \App\Models\Order::find(4);
//        return view('mails.order', compact('order'));
//    })->name('user');

    Route::get('/searchbox', function () {
        return view('livewire.shop');
    });

});


Route::get('language/{id}', function ($id) {
    $lang = \App\Models\Language::find($id);

    if ($lang) {
        app()->setLocale($lang->abbr);
        session()->put('lang', $lang);
    } else {
        session()->put('lang', 'en');
    }

    return redirect()->back();
})->name('lang.change');
