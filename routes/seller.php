<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;


Route::get('/seller/register', [\App\Http\Controllers\VendorRegisterController::class, 'create'])
                ->name('seller.register');

Route::post('/seller/register', [\App\Http\Controllers\VendorRegisterController::class, 'register'])->name('seller.register');


//Route::post('seller/login', function (\Illuminate\Support\Facades\Request $request){
//    dd($request->all());
//})
//                ->middleware('guest')->name('seller.login');
Route::post('seller/login', [\App\Http\Controllers\VendorLoginController::class, 'login'])
               ->name('seller.login');

//Route::get('/seller/forgot-password', [PasswordResetLinkController::class, 'create'])
//                ->middleware('guest')
//                ->name('password.request');
//
//Route::post('/seller/forgot-password', [PasswordResetLinkController::class, 'store'])
//                ->middleware('guest')
//                ->name('password.email');
//
//Route::get('/seller/reset-password/{token}', [NewPasswordController::class, 'create'])
//                ->middleware('guest')
//                ->name('password.reset');
//
//Route::post('/seller/reset-password', [NewPasswordController::class, 'store'])
//                ->middleware('guest')
//                ->name('password.update');
//
//Route::get('/seller/verify-email', [EmailVerificationPromptController::class, '__invoke'])
//                ->middleware('auth')
//                ->name('verification.notice');
//
//Route::get('/seller/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
//                ->middleware(['auth', 'signed', 'throttle:6,1'])
//                ->name('verification.verify');
//
//Route::post('/seller/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//                ->middleware(['auth', 'throttle:6,1'])
//                ->name('verification.send');
//
//Route::get('/seller/confirm-password', [ConfirmablePasswordController::class, 'show'])
//                ->middleware('auth')
//                ->name('password.confirm');
//
//Route::post('/seller/confirm-password', [ConfirmablePasswordController::class, 'store'])
//                ->middleware('auth');


Route::group(['prefix'=> 'seller', 'middleware' => 'auth:seller'], function () {
    Route::get('/dashboard', [App\Http\Controllers\Seller\DashboardController::class, 'index'])->name('seller.dashboard');
    Route::resource('seller-products', App\Http\Controllers\Seller\ProductsController::class);
    Route::post('products/changes_status', [\App\Http\Controllers\Seller\ProductsController::class, 'changeStatus'])->name('seller-products.status');

    Route::get('{main_category}/attaches', [App\Http\Controllers\Admin\MainCategoryAccessoriesController::class, 'index']);
    Route::patch('orders/{id}/change_status', [\App\Http\Controllers\Seller\OrderController::class, 'changeStatus'])->name('seller.orders.change_status');
    Route::resource('orders', App\Http\Controllers\Seller\OrderController::class,['as' => 'seller']);

    //=========================================================
    //-------------------- Seller Profile Route -------------
    //=========================================================
    Route::get('/profile', [\App\Http\Controllers\Seller\ProfileController::class, 'profile'])->name('seller.profile');
    Route::put('/profile/update', [\App\Http\Controllers\Seller\ProfileController::class, 'updateProfile'])->name('seller.profile.update');


    Route::post('/logout', [\App\Http\Controllers\VendorLoginController::class, 'destroy'])
        ->middleware('auth')
        ->name('seller.logout');
});
