<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\MainCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product_details($id)
    {
        $product = Product::findOrFail($id);

        $categoryCoupons = Coupon::active()->where('main_category', $product->main_categories_id)->inRandomOrder()->limit(3)->get();
        $generalCoupons = Coupon::active()->general()->availableNow()->inRandomOrder()->limit(3)
            ->get();

        $related_products = Product::active()
            ->where('main_categories_id', '=', $product->main_categories_id)
            ->where('id', '!=', $product->id)
            ->get();
        return view('frontend.product-page', compact('product', 'categoryCoupons', 'generalCoupons', 'related_products'));
    }


    public function category_products($id)
    {
        try {
            $category = MainCategory::findOrFail($id);

            return view('frontend.category-products', compact('category'));
        } catch (\Exception $exception) {
            abort(404);
        }
    }

    public function view_modal(Request  $request){
        $id = $request->id;
        $product = Product::find($id);
        return view('frontend.modals.quick-view', compact('product'));
    }

}
