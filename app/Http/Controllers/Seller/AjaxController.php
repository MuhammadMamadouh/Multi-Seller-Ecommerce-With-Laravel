<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class AjaxController extends Controller
{

    public function index(Request $request, $main_cat)
    {
        try {

            $mainCategory = MainCategory::findOrFail($main_cat);

            $sub_categories = $this->getSubCategories($mainCategory);

            $brands = $this->main_category_brands($mainCategory);

            $sizes = $this->main_category_sizes($mainCategory);
            $response = [
                'sub_categories'    => $sub_categories,
                'brands'            => $brands,
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
     * Get SubCategories of a specific main Category
     *
     * @param $mainCategory
     * @return \Illuminate\Support\Collection
     */
    private function getSubCategories($mainCategory): \Illuminate\Support\Collection
    {
        return Collection::make($mainCategory->children()->get())->map(function ($item) {
            $item->setAttribute('name', $item->getTranslation()->pivot->name);
            $item->setAttribute('main_parent_name', $item->mainParent->getTranslation()->pivot->name);
            $item->setAttribute('main_parent_id', $item->mainParent->id);
            $item->setAttribute('parent_name', isset($item->subParent) ? $item->subParent->getTranslation()->pivot->name : '');
            return $item;
        });
    }


    /**
     * @param $category_id
     * @return Collection|\Illuminate\Http\JsonResponse|\Illuminate\Support\Collection
     */
    public function main_category_brands($main_category)
    {
        return Collection::make($main_category->brands)->map(function ($item) {
            $item->setAttribute('name', $item->getTranslation()->pivot->name);
            return $item;
        });
    }

    /**
     * @param $category_id
     * @return Collection|\Illuminate\Http\JsonResponse|\Illuminate\Support\Collection
     */
    public function main_category_sizes(MainCategory $mainCategory){

        return Collection::make($mainCategory->sizes)->map(function ($item) {
            $item->setAttribute('name', $item->getTranslation()->pivot->name);
            return $item;
        });

    }
}
