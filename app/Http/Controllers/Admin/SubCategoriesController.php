<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoriesRequest;
use App\Http\Requests\SubCategoriesRequest;
use App\Models\MainCategory;
use App\Models\SubCategory;
use App\Models\TranslationModels\MainCategoryTranslation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class SubCategoriesController extends Controller
{

    public function index(Request $request, $main_category)
    {
        try {
            $mainCategory = MainCategory::findOrFail($main_category);
            $items        = $this->getSubCategories($mainCategory);
            $attributes   = SubCategory::getreadables();
            $title        = __('titles.category') . ' ' . $mainCategory->name;

            if ($request->ajax())
                return $this->getDataTable($items);

            $createLink = route('sub_categories.create', $main_category);
            $statusLink = route('sub_categories.status', $main_category);
            $route      = 'sub_categories';
            return view('Admin.sub_categories.index',
                compact('title', 'items', 'attributes', 'route', 'createLink', 'statusLink'));
        } catch (Exception $exception) {
            return $exception;
        }
    }

    public function create($main_cat)
    {
        $mainCategory  = MainCategory::findOrFail($main_cat);
        $title         = $mainCategory->name;
        $smallTitle    = __('titles.create_sub_category');
        $writables     = SubCategory::getWritables();
        $translables   = SubCategory::translabes();
        $actionLink    = route('sub_categories.store', $main_cat);
        $relationships = $this->relationships($mainCategory);

        return view('Admin.components.edit-create',
            compact('title', 'smallTitle', 'mainCategory',
                'writables', 'translables', 'actionLink', 'relationships'
            ));
    }


    public function store(SubCategoriesRequest $request, $main_category)
    {
        try {

            $main_category = MainCategory::findOrFail($main_category);   // Check if main category really exists
            $data          = $this->collectData($request, $main_category);
            SubCategory::create($data);

            return redirect()->route('sub_categories.index', $main_category)->with('success', 'messages.updated_successfully');
        } catch (Exception $exception) {

            return redirect()->route('sub_categories.index', $main_category->id)->with('error', __('messages.something_wrong'));
        }
    }


    public function edit($main_category, $id)
    {
        $mainCategory = MainCategory::findOrFail($main_category);
        $item         = SubCategory::find($id);
        $title        = __('titles.sub_categories');
        $smallTitle   = __('titles.edit_category');
        $writables    = SubCategory::getWritables();
        $translables  = SubCategory::translabes();

        $actionLink    = route('sub_categories.update', [$main_category, $id]);
        $relationships = $this->relationships($mainCategory);

        return view('Admin.components.edit-create',
            compact('title', 'item',
                'smallTitle', 'mainCategory',
                'writables', 'translables', 'actionLink', 'relationships'
            ));
    }


    public function update(SubCategoriesRequest $request, $main_category, $id)
    {

        $sub_category = SubCategory::findOrFail($id);
        $main_category = MainCategory::findOrFail($main_category);   // Check if main category really exists
        $data         = $this->collectData($request, $main_category, $sub_category);
        try {
            $sub_category->fill($data)->save();
            return redirect()->route('sub_categories.index', $main_category->id)->with('success', __('messages.updated_successfully'));
        } catch (Exception $exception) {

            return redirect()->route('sub_categories.index', $main_category->id)->with('error', __('messages.something_wrong'));
        }
    }


    public function destroy($mainCategory, $id)
    {
        $this->delete($id);

        return \response(__('messages.deleted_successfully'));
    }


    public function multi_delete(Request $request)
    {
        $ids = $request->item;
        foreach ($ids as $id) {
            $this->delete($id);
        }
        return redirect()->route('sub_categories.index')->with('success', __('messages.deleted_successfully'));
    }


    private function delete($id)
    {
        $item = SubCategory::findOrFail($id);
        unlinkPhoto($item->photo);
        $item->delete();
    }

    /**
     * change Status from active to inactive and vice versa
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Request $request)
    {
        try {
            $subCategory = SubCategory::findOrFail($request->id);
            if ($request->mode == 'true')
                $subCategory->update(['status' => 'active']);
            else
                $subCategory->update(['status' => 'inactive']);

            return response()->json(['status' => true]);
        } catch (Exception $exception) {
            return response()->json(['status' => false]);
        }
    }


    /**
     * Generate slug from title input
     *
     * @param $title
     * @return string
     */
    private function generateSlug($title): string
    {
        $slug      = Str::slug($title);
        $slugCount = SubCategory::where('slug', $slug)->count();
        if ($slugCount > 0) {
            $slug = $slug . '-' . random_int(100, 500);
        }
        return $slug;
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

            $item->setAttribute('main_category', $item->mainParent->name);
//            $item->setAttribute('main_parent_id', $item->mainParent->id);
            $item->setAttribute('parent_name', isset($item->subParent) ? $item->subParent->name : '');
            return $item;
        });
    }


    /**
     * Get SubCategory Children for Ajax Request
     * @param $id
     * @return \Exception|false|\Illuminate\Http\JsonResponse
     */
    public function children($id)
    {
        try {

            $subCategory = SubCategory::findOrFail($id);
            $children    = $subCategory->children;

            if ($children)
                return response()->json(['children' => $children]);
            else
                return false;
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     *
     * @param $items
     * @return mixed
     */
    private function getDataTable($items)
    {
        return \DataTables::of($items)
            ->addColumn('photo', function ($item) {
                $url = asset('storage/' . $item->photo);
                return view('admin.components.btns.photo', compact('url'));
            })
            ->addColumn('checkbox', 'Admin.components.btns.checkbox')
            ->addColumn('status', 'Admin.components.btns.active')
            ->addColumn('Actions', function ($item) {
                return $this->actionsBtn($item);
            })
            ->rawColumns(['Actions', 'photo', 'sub_categories', 'status', 'checkbox'])
            ->make(true);
    }


    private function actionsBtn($item)
    {
        return '<a href="' . route('sub_categories.edit', [$item->main_categories_id, $item->id]) . '"  class="" id=""><i class="fa fa-2x fa-edit"></i></a>
          <form action="' . route("sub_categories.destroy", [$item->main_categories_id, $item->id]) . '" method="post">'
            . csrf_field() . method_field("delete") .
            '       <a href="" title="delete" data-id="' . $item->id . '" class="delbtn"><i class="fa fa-2x fa-trash"></i></a>
                            </form>';
    }


    private function relationships($main_cat)
    {
        return [
            $main_cat->children()->get(),
        ];
    }

    /**
     * Collect Data From Request To Be Stored
     * @param Request|SubCategoriesRequest $request
     * @param $main_category
     * @param $name
     * @return array
     */
    private function collectData(Request|SubCategoriesRequest $request, MainCategory $main_category, SubCategory $subCategory = null): array
    {
        $data = $request->validated();
        if ($request->has('translation')) {
            $data['slug'] = $this->generateSlug($request->translation[1]['name']);
            $translations = collect($request->translation);
            $name         = [];
            foreach (getLanguages() as $index => $language) {
                $name[$language->abbr] = $translations[$index]['name'];
            }
            $data['name'] = json_encode($name);
        }
        $data['main_categories_id'] = $main_category->id;
        if ($request->hasFile('photo')) {
            if ($subCategory)
                unlinkPhoto($subCategory->photo);
            $data['photo'] = uploadImage('sub_categories', $request->photo);
        }
        return $data;
    }
}

