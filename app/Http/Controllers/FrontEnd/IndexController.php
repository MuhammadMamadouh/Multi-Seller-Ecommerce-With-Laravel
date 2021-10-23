<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\MainCategory;
use App\Models\Product;
class IndexController extends Controller
{
    public function index()
    {
        $banners = Banner::select()->active()->banner()->orderBy('created_at', 'Desc')->limit(5)->get();
        $bestBanners = Banner::active()->banner()->latest()->limit(3)->get();
        $new_products = Product::active()->where('conditions', 'new')->latest()->limit(5)->get(['id', 'price','offer_price', 'images', 'conditions']);
        $main_categories = MainCategory::active()->inRandomOrder()->limit(5)->get();
        $special_products = Product::active()->select('id', 'price','offer_price', 'images', 'conditions')->where('conditions', 'popular')->limit(6)->get();
        $hotDeals = Product::latest()->inRandomOrder()->limit(4)->get();
        return view('frontend.index', compact('banners', 'main_categories',
            'new_products', 'special_products', 'hotDeals', 'bestBanners'));
    }
}
