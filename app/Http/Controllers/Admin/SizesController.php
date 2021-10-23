<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\ProductSizes;
use App\Models\Size;
use http\Env\Response;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = $this->getItems();
        if ($request->ajax()) {
            return $this->getDataTable($items);
        }
        $attributes = Size::getreadables();
        $title = __('titles.sizes');
        $route      = 'sizes';
        return view('Admin.components.index', compact('title', 'route', 'items', 'attributes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Response
     */
    public function create()
    {
        $title = __('titles.sizes');
        $smallTitle = '';
        $writables = Size::getWritables();
        $translables = Size::translabes();
        $actionLink  = route('sizes.store');
        return view('Admin.components.edit-create',
            compact('title', 'smallTitle', 'writables', 'translables', 'actionLink'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
            $data = $this->collectData($request);
            $size = Size::create($data);
            return redirect()->route('sizes.index')->with('success', __('messages.created_successfully'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $item = Size::find($id);
        $title = __('titles.sizes');
        $smallTitle = __('titles.edit_size');
        $writables = Size::getWritables();
        $translables = Size::translabes();
        $actionLink  = route('sizes.update', $id);
        return view('Admin.components.edit-create',
            compact('title', 'item', 'smallTitle', 'writables', 'translables', 'actionLink'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $size = Size::findOrFail($id);
        $data = $this->collectData($request);
            $size->fill($data)->save();
            return redirect()->route('sizes.index')->with('success', __('messages.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->delete($id);
        return response(__('messages.deleted_successfully'));    }

    /**
     * Remove many resources from storage
     * @param Request $request
     * @return mixed
     */
    public function multi_delete(Request $request)
    {
        $ids = $request->item;
        foreach ($ids as $id) {
            $this->delete($id);
        }
        return redirect()->route('sizes.index')->with('success', __('messages.deleted_successfully'));
    }


    private function delete($id)
    {
        $item = Size::findOrFail($id);
        $item->delete();
    }


    public function main_category_sizes($category_id)
    {
        $main_category = MainCategory::find($category_id);

        $sizes = Collection::make($main_category->sizes)->map(function ($item) {
            $item->setAttribute('name', $item->name);
            return $item;
        });
        return response()->json($sizes);
    }


    /**
     * Get Items that will be displayed at index page
     * @return Collection|\Illuminate\Support\Collection
     */
    private function getItems()
    {
        return Collection::make(Size::with('category')->get())->map(function ($item) {
            return $item->setAttribute('category_id', $item->category->name);
        });
    }


    /**
     * Modify and collect data from request
     *
     * @param $request
     * @return mixed
     */
    private function collectData($request, $size = null)
    {
        $data = $request->all();
        if ($request->has('translation')) {
            $translations = collect($request->translation);
            $name         = [];
            foreach (getLanguages() as $index => $language) {
                $name[$language->abbr] = $translations[$index]['name'];
            }
            $data['name'] = json_encode($name);
        }
        return $data;
    }


    private
    function getDataTable($items)
    {
        return \DataTables::of($items)
            ->addColumn('Actions', function ($item) {
                $view = 'sizes';
                return view('admin.components.btns.actions', compact('view', 'item'));
            })
            ->addColumn('checkbox', 'Admin.components.btns.checkbox')
            ->rawColumns(['Actions', 'checkbox', 'Size'])
            ->make(true);
    }

    /**
     * Destroy Product Size from product Edit page
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyProductSize($id): \Illuminate\Http\JsonResponse
    {
        $pSize = ProductSizes::findOrFail($id);

        $pSize->delete();

        return response()->json([__('messages.deleted_successfully')]);
    }
}
