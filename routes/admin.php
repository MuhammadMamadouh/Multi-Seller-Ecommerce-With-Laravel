<?php

use Admin\LanguagesController;
use App\Http\Controllers\Admin\AttributesController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\ColorsController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShippingsController;
use App\Http\Controllers\Admin\SizesController;
use App\Http\Controllers\Admin\SubCategoriesController;
use App\Http\Controllers\Admin\VendorsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
//=========================================================
//-------------------- Login Routes ------------------
//=========================================================

Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin', 'namespace' => 'App\Http\Controllers'], function () {

    Route::get('login', [App\Http\Controllers\Admin\LoginController::class, 'loginPage'])->name('admin.loginPage');
    Route::post('login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin', 'namespace' => 'App\Http\Controllers'], function () {

    //=========================================================
    //-------------------- File Manager Routes ----------------
    //=========================================================
    Route::group(['prefix' => 'filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });


    //=========================================================
    //-------------------- Admin Dashboard Routes -------------
    //=========================================================
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

    //=========================================================
    //-------------------- Admin Profile Route -------------
    //=========================================================
    Route::get('/profile', [\App\Http\Controllers\AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/profile/update', [\App\Http\Controllers\AdminController::class, 'updateProfile'])->name('admin.profile.update');

    //=========================================================
    //-------------------- Languages Routes ------------------
    //=========================================================

    Route::resource('languages', LanguagesController::class);
    Route::post('languages/changes_status', [\App\Http\Controllers\Admin\LanguagesController::class, 'changeStatus'])->name('languages.status');
    Route::delete('languages/multi-delete', [BrandsController::class, 'multi_delete'])
        ->name('languages.multi_delete');


    //=========================================================
    //-------------------- Main Categories Routes ------------------
    //=========================================================
    Route::resource('main_categories', Admin\MainCategoriesController::class);
    Route::post('main_categories/changes_status',
        [\App\Http\Controllers\Admin\MainCategoriesController::class, 'changeStatus'])
        ->name('main_categories.status');
    Route::delete('main_categories/multi_delete',
        [\App\Http\Controllers\Admin\MainCategoriesController::class, 'multi_delete'])
        ->name('main_categories.multi_delete');


    //=========================================================
    //-------------------- Main Categories Related Tables Routes ------------------
    //=========================================================
    Route::group(['prefix' => '/main_categories/{id?}/'], function ($id) {
        Route::resource('sub_categories', Admin\SubCategoriesController::class);
        Route::post('sub_categories/changes_status', [SubCategoriesController::class, 'changeStatus'])
            ->name('sub_categories.status');
        Route::delete('sub_categories/multi_delete',
            [SubCategoriesController::class, 'multi_delete'])
            ->name('sub_categories.multi_delete');

        Route::get('/attaches', [App\Http\Controllers\Admin\MainCategoryAccessoriesController::class, 'index'])
            ->name('main_category.accessories');

    });
    Route::get('sub_categories/{id}/children', [App\Http\Controllers\Admin\SubCategoriesController::class, 'children']);

    //=========================================================
    //-------------------- Vendor Routes ------------------
    //=========================================================

    Route::resource('vendors', \Admin\VendorsController::class);
    Route::delete('vendors/multi-delete', [VendorsController::class, 'multi_delete'])
        ->name('vendors.multi_delete');
    Route::post('vendors/changes_status', [VendorsController::class, 'changeStatus'])->name('vendors.status');

    //=========================================================
    //-------------------- Shippings Routes ------------------
    //=========================================================

    Route::resource('shippings', \Admin\ShippingsController::class);
    Route::delete('shippings/multi-delete', [ShippingsController::class, 'multi_delete'])
        ->name('shippings.multi_delete');
    Route::post('shippings/changes_status', [ShippingsController::class, 'changeStatus'])->name('shippings.status');

    //=========================================================
    //-------------------- Brands Routes ------------------
    //=========================================================
    Route::resource('brands', \Admin\BrandsController::class);
    Route::post('brands/changes_status', [BrandsController::class, 'changeStatus'])
        ->name('brands.status');
    Route::delete('brand/multi-delete', [BrandsController::class, 'multi_delete'])
        ->name('brands.multi_delete');



    //=========================================================
    //-------------------- COLORS Routes ------------------
    //=========================================================
    Route::delete('colors/multi-delete', [ColorsController::class, 'multi_delete'])
        ->name('colors.multi_delete');
    Route::resource('colors', \Admin\ColorsController::class);

    Route::delete('product-color/{id}', [ColorsController::class, 'destroyProductColor'])->name('product-color.destroy');
    //=========================================================
    //-------------------- SIZES Routes ------------------
    //=========================================================
    Route::resource('sizes', \Admin\SizesController::class);
    Route::delete('sizes/multi-delete', [SizesController::class, 'multi_delete'])
        ->name('sizes.multi_delete');
    Route::delete('product-size/{id}', [SizesController::class, 'destroyProductSize'])->name('product-size.destroy');

    //=========================================================
    //-------------------- Attributes Routes ------------------
    //=========================================================
    Route::delete('attribute/multi-delete', [AttributesController::class, 'multi_delete'])
        ->name('attributes.multi_delete');
    Route::resource('attributes', \Admin\AttributesController::class);
    Route::delete('product-attr/{id}', [AttributesController::class, 'destroyProductAttr'])->name('product-attr.destroy');

    //=========================================================
    //-------------------- Banners Routes ------------------
    //=========================================================
    Route::resource('banners', \Admin\BannerController::class);
    Route::post('banners/changes_status', [BannerController::class, 'changeStatus'])->name('banners.status');
    Route::delete('banners/multi_delete',
        [BannerController::class, 'multi_delete'])
        ->name('banners.multi_delete');

    //=========================================================
    //-------------------- Coupon Routes ------------------
    //=========================================================
    Route::resource('coupons', \Admin\CouponController::class);
    Route::post('coupons/changes_status', [CouponController::class, 'changeStatus'])
        ->name('coupons.status');
    Route::delete('coupons/multi_delete',
        [CouponController::class, 'multi_delete'])
        ->name('coupons.multi_delete');

    //=========================================================
    //-------------------- Products Routes ------------------
    //=========================================================
    Route::resource('products', \Admin\ProductController::class);
    Route::post('products/changes_status', [ProductController::class, 'changeStatus'])->name('products.status');
    Route::delete('products/multi_delete',
        [ProductController::class, 'multi_delete'])
        ->name('products.multi_delete');

    //=========================================================
    //-------------------- orders Routes ------------------
    //=========================================================
    Route::resource('orders', \Admin\OrderController::class);
    Route::post('orders/change_status', [OrderController::class, 'changeStatus'])->name('orders.status');
    Route::delete('orders/multi_delete',
        [OrderController::class, 'multi_delete'])
        ->name('orders.multi_delete');

    //=========================================================
    //-------------------- Settings Routes ------------------
    //=========================================================
    Route::resource('settings', \Admin\SettingsController::class);



    Route::get('language/{id}', function ($id) {
        $lang = \App\Models\Language::find($id);
        if ($lang){
            app()->setLocale($lang->abbr);
            session()->put('lang_abbr', $lang->abbr);
            session()->put('lang', $lang);
        }else {
            session()->put('lang', 'en');
        }

        return redirect()->back()->with('success', 'language changed');
    })->name('admin_lang.change');


    Route::post('logout', [LoginController::class, 'destroy'])
        ->middleware('auth')
        ->name('admin.logout');
});
