<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\MainCategory;
use Illuminate\Http\Request;

class CategoryProducts extends Controller
{
    public function show($slug)
    {
        $category = MainCategory::find($slug)->get();

        return view('frontend.category-products', compact('category'));
    }
}
