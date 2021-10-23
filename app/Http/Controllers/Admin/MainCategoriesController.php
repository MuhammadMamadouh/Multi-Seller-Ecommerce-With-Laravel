<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoriesRequest;
use App\Models\MainCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class MainCategoriesController extends Controller
{
    public function index(Request $request)
    {
        $items = $this->getItems();
        if ($request->ajax()) {
            return $this->getDataTable($items);
        }
        $attributes = MainCategory::getreadables();
        $title      = __('titles.main_categories');
        $route      = 'main_categories';
        return view('Admin.components.index', compact(
            'title', 'items', 'attributes', 'route'
        ));

    }

    public function create()
    {
        $title       = __('titles.main_categories');
        $smallTitle  = __('titles.create');
        $writables   = MainCategory::getWritables();
        $translables = MainCategory::translabes();
        $actionLink  = route('main_categories.store');
        return view('Admin.components.edit-create',
            compact('title', 'smallTitle',
                'writables', 'translables',
                'actionLink'));
    }

    public function store(MainCategoriesRequest $request)
    {
        $data = $this->collectData($request);
        MainCategory::create($data);
        return redirect()->route('main_categories.index')
            ->with('success', __('messages.created_successfully'));
    }


    public function edit($id)
    {
        $item        = MainCategory::find($id);
        $title       = __('titles.main_categories');
        $smallTitle  = __('titles.edit_category');
        $writables   = MainCategory::getWritables();
        $translables = MainCategory::translabes();
        $actionLink  = route('main_categories.update', $id);
        return view('Admin.components.edit-create',
            compact('title', 'item', 'smallTitle'
                , 'writables', 'translables', 'actionLink'));
    }

    public function update(MainCategoriesRequest $request, $id)
    {
        $main_category = MainCategory::findOrFail($id);
        $data          = $this->collectData($request, $main_category);;
        try {
            $main_category->fill($data)->save();
            return redirect()->route('main_categories.index')->with('success', __('messages.updated_successfully'));
        } catch (Exception $exception) {
            unlinkPhoto($data['photo']);
            return redirect()->route('main_categories.index')->with('error', __('messages.updated_with_errors'));
        }
    }


    public function destroy($id)
    {
        $main_category = MainCategory::findOrFail($id);
        $vendors       = $main_category->vendors;
        if (isset($vendors) && count($vendors) > 0) {
            return \response(__('messages.cant_delete'));
        } else {
            $this->delete($id);
            return \response(__('messages.deleted_successfully'));
        }
    }

    public function multi_delete(Request $request)
    {
        $ids = $request->item;
        foreach ($ids as $id) {
            $this->delete($id);
        }
        return \response(__('messages.deleted_successfully'));

    }

    private function delete($id)
    {
        $item = MainCategory::findOrFail($id);
        unlinkPhoto($item->photo);
        $item->delete();
    }

    /**
     * Get Items that will be displayed at index page
     * @return Collection|\Illuminate\Support\Collection
     */
    private function getItems()
    {
        return Collection::make(MainCategory::all())->map(function ($category) {
//            $category->setAttribute('name', $category->getTranslation()->pivot->name);
            return $category;
        });
    }

    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Request $request)
    {
        try {
            $mainCategory = MainCategory::findOrFail($request->id);
            if ($request->mode == 'true')
                $mainCategory->update(['status' => 'active']);
            else
                $mainCategory->update(['status' => 'inactive']);

            $mainCategory->vendors()->update(['status' => $mainCategory->status]);
            return response()->json(['msg' => 'successfully updated status', 'status' => true]);
        } catch (Exception $exception) {
            return response()->json(['msg' => 'Something went wrong', 'status' => false]);
        }
    }


    /**
     * Modify and collect data from request
     *
     * @param $request
     * @return mixed
     */
    private function collectData(Request $request, MainCategory $category = null)
    {
        $data = $request->all();
        if ($request->has('translation')) {
            $data['slug'] = $this->generateSlug($request->translation[1]['name']);
            $translations = collect($request->translation);
            $name         = [];
            foreach (getLanguages() as $index => $language) {
                $name[$language->abbr] = $translations[$index]['name'];
            }
            $data['name'] = json_encode($name);
        }
        if ($request->has('photo')) {
            if ($category)
                unlinkPhoto($category->photo);
            $data['photo'] = uploadImage('main_categories', $request->photo);
        }

        return $data;
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
        $slugCount = MainCategory::where('slug', $slug)->count();
        if ($slugCount > 0) {
            $slug = $slug . '-' . random_int(100, 500);
        }
        return $slug;
    }


    private function getDataTable($items)
    {
        return \DataTables::of($items)
            ->addColumn('photo', function ($item) {
                $url = asset('storage/' . $item->photo);
                return view('admin.components.btns.photo', compact('url'));
            })
            ->addColumn('checkbox', 'Admin.components.btns.checkbox')
            ->addColumn('sub_categories', function ($item) {
                return '<a href="' . route('sub_categories.index', $item->id) . '" class="btn btn-success btn-sm">' . __("validation.attributes.sub_categories") . '</button>';

            })
            ->addColumn('Actions', function ($item) {
                $view = 'main_categories';
                return view('admin.components.btns.actions', compact('view', 'item'));
            })
            ->addColumn('status', 'Admin.components.btns.active')
            ->rawColumns(['Actions', 'photo', 'sub_categories', 'checkbox', 'status'])
            ->make(true);
    }
}
