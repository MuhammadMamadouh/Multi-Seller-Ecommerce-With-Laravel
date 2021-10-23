<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandProducts extends Controller
{
    public function show($slug)
    {
        $brand = Brand::with('products')->where('slug', $slug)->first();

        return view('frontend.brand-products', compact('brand'));
    }
}
