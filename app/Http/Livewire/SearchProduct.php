<?php

namespace App\Http\Livewire;

use App\Models\MainCategory;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use PhpParser\Builder;

class SearchProduct extends Component
{
    use WithPagination;

//    public $products;
    public $searchTerm;
    public $main_category;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        $mainCategories = $this->index(\request())['mainCategories'];
        $mainCategory   = $this->index(\request())['mainCategory'];
        $products       = $this->index(\request())['products'];


        if ($this->searchTerm !== '') {

            $products
                ->join('product_translations', 'product_translations.product_id', '=', 'products.id')
                ->select('products.*', 'product_translations.name', 'product_translations.description')
                ->where('product_translations.lang_id', '=', getDefaultLang()->id)
                ->where('product_translations.name', 'like', "$searchTerm");

        }

//        $this->products = $products->paginate(12);

//        $mainCategories = MainCategory::active()->with('products')->get();
        return view('livewire.search-product', [
            'products' => $products->paginate(12),
            'mainCategories' => $mainCategories,
            'mainCategory' => $mainCategory
        ]);
    }

    public function index(Request $request)
    {
        $mainCategorySlug = $request->query('main_category');
        $subcategories = $request->query('sub_category');
        $sortBy = $request->query('sortBy');
        $sizes = $request->query('sizes');
        $products = Product::with('translations')->active();
        $mainCategory = null;

        if (!empty($mainCategorySlug)) {
            $mainCategory = MainCategory::where('slug', $mainCategorySlug)->firstOrFail();
            if ($mainCategory) {
                $products = $mainCategory->products();
            }
        }
        if (!empty($subcategories)) {
            $slugs = explode(',', $subcategories);
            $cat_ids = SubCategory::whereIn('slug', $slugs)->pluck('id')->toArray();
            $products = $products->whereIn('sub_category_id', $cat_ids);
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

//        $products = $products->paginate(12);

        return [
            'products' => $products,
            'mainCategories' => $mainCategories,
            'mainCategory' => $mainCategory
        ];
//        return view('frontend.shop', compact('mainCategories', 'products', 'mainCategory'));
    }


    public function searchProduct(Request $request)
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


        $query = $main_cat_url . $subcat_url . $sizes_url . $sortBy_url;
        return redirect()->route('shop.index', $query);
    }
}
