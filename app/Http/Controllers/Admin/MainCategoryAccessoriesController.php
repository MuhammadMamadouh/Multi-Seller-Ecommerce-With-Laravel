<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class MainCategoryAccessoriesController extends Controller
{



    public function index(Request $request, $main_cat)
    {
        try {

            $mainCategory = MainCategory::findOrFail($main_cat);

            $sub_categories =$mainCategory->children()->get();

            $brands = $mainCategory->brands()->get();

            $sizes = $mainCategory->sizes()->get();

            $vendors = $mainCategory->vendors()->get();


            $response = [
                'sub_categories'    => $sub_categories,
                'brands'            => $brands,
                'vendors'           => $vendors,
                'sizes'             => $sizes,
            ];
            if ($request->ajax()) {
                return response()->json($response);
            }

        } catch (Exception $exception) {
            return $exception;
        }
    }




    /**
     * @param $category_id
     * @return Collection|\Illuminate\Http\JsonResponse|\Illuminate\Support\Collection
     */
    public function main_category_sizes(MainCategory $mainCategory){

        return Collection::make($mainCategory->sizes)->map(function ($item) {
//            $item->setAttribute('name', $item->name);
            return $item;
        });
    }

    /**
     * @param $category_id
     * @return Collection|\Illuminate\Http\JsonResponse|\Illuminate\Support\Collection
     */
    public function vendors(MainCategory $mainCategory){

        return Collection::make($mainCategory->vendors()->get())->map(function ($item) {
            return $item;
        });
    }
}
