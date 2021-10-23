<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index(Request $request)
    {
        $mainCategorySlug = $request->query('main_category');
        $subcategories = $request->query('sub_category');
        $sortBy = $request->query('sortBy');
        $sizes = $request->query('sizes');
        $brandSlug = $request->query('brand');
        $products = Product::query()->active();
        $mainCategory = null;

        if (!empty($mainCategorySlug)) {
            $mainCategory = MainCategory::where('slug', $mainCategorySlug)->firstOrFail();
            $products = $mainCategory?->products();
        }
        if (!empty($subcategories)) {
            $slugs = explode(',', $subcategories);
            $cat_ids = SubCategory::whereIn('slug', $slugs)->pluck('id')->toArray();
            $products = $products->whereIn('sub_category_id', $cat_ids);
        }

        if (!empty($brandSlug)) {
            $brand = Brand::where('slug', $brandSlug)->first()?->products;
        }

        if (!empty($sizes)) {

            $slugs = explode(',', $sizes);

            $sizes_ids = Size::whereIn('id', $slugs)->pluck('id')->toArray();

            $sizes = Size::with('products')->whereIn('id', $sizes_ids)->get();



            foreach ($sizes as $size) {
                $products = $size->products();
            }
        }
        if (!empty($sortBy)) {
            if ($sortBy == 'priceAsc') {
                $products = $products->orderBy('offer_price', 'ASC');
            } elseif ($sortBy == 'priceDesc') {
                $products = $products->orderBy('offer_price', 'DESC');
            } elseif ($sortBy == 'discAsc') {
                $products = $products->orderBy('price', 'ASC');
            } elseif ($sortBy == 'discDesc') {
                $products = $products->orderBy('price', 'DESC');
            }
        }
        $mainCategories = MainCategory::active()->with('products')->get();

        $products = $products->paginate(12);

        return view('frontend.shop', compact('mainCategories', 'products', 'mainCategory'));
    }


    public function filter(Request $request)
    {
        $data = $request->all();
        $maincat_query = $request->main_category;

        if (!empty($data['my_range'])) {
            $range = explode(';', $data['my_range']);
            $min = $range[0];
            $max = $range[1];
        }
        $main_cat_url = '';
        if (!empty($data['main_category'])) {
            $main_cat_url .= '&main_category=' . $data['main_category'];
        }

        $subcat_url = '';
        if (!empty($data['main_category']) && !empty($data['sub_category'])) {
            foreach ($data['sub_category'] as $category) {

                if (empty($subcat_url)) {
                    $subcat_url .= '&sub_category=' . $category;
                } else {
                    $subcat_url .= ',' . $category;
                }
            }
        }

        $sortBy_url = '';
        if (!empty($data['sortBy'])) {
            $sortBy_url .= '&sortBy=' . $data['sortBy'];
        }

        $sizes_url = '';
        if (!empty($data['sizes'])) {
            foreach ($data['sizes'] as $size) {
                if (empty($sizes_url)) {
                    $sizes_url .= '&sizes=' . $size;
                } else {
                    $sizes_url .= ',' . $size;
                }
            }
        }

        $brand_url = '';
        if (!empty($data['brand'])) {
            $brand_url .= '&brand=' . $data['brand'];
        }


        $query = $main_cat_url . $subcat_url . $sizes_url .$brand_url. $sortBy_url;
        return redirect()->route('shop.index', $query);
    }

    private function getMainCatUrl($data, $url)
    {
        $url .= '&main_category=' . $data['main_category'];
    }


    /**
     * @param array $data
     * @param string $url
     * @return string
     */
    private function getSubCatUrl(array $data, string $url)
    {
        foreach ($data['sub_category'] as $category) {

            if (empty($subcat_url)) {
                $url .= '&sub_category=' . $category;
            } else {
                $url .= ',' . $category;
            }
        }
        return $url;
    }
}
