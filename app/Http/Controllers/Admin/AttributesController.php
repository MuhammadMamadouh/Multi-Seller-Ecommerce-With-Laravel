<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributRequest;
use App\Http\Requests\ColorRequest;
use App\Models\Attribute;
use App\Models\ProductAttributes;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class AttributesController extends Controller
{
    public string $route = 'attributes';
    public string|Model $model = Attribute::class;

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
        $attributes = $this->model::getreadables();
        $title = __("titles.$this->route");
        $route = $this->route;
        return view('Admin.components.index', compact(
            'title', 'items', 'attributes', 'route'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Response
     */
    public function create()
    {
        $title = __("titles.$this->route");
        $smallTitle = __('titles.create item', ['item' => 'color']);
        $writables = $this->model::getWritables();
        $translables = $this->model::translabes();
        $actionLink = route("$this->route.store");
        return view('Admin.components.edit-create',
            compact('title', 'smallTitle',
                'writables', 'translables', 'actionLink'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AttributRequest $request)
    {
        try {
            $translations = collect($request->translation);
            DB::beginTransaction();
            $data = $request->validated();
            $item = $this->model::create($data);
            foreach (getLanguages() as $index => $language) {
                $item->translations()->attach($language->id, ['name' => $translations[$index]['name']]);
            }
            DB::commit();
            return redirect()->route("$this->route.index")->with('success', __('messages.created_successfully'));
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('errors', __('messages.something_wrong'));
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $item = $this->model::find($id);
        $title = __("titles.$this->route");
        $smallTitle = __('titles.edit_attribute');
        $writables = $this->model::getWritables();
        $translables = $this->model::translabes();
        $actionLink = route("$this->route.update", $id);
        return view('Admin.components.edit-create',
            compact('title', 'item', 'smallTitle'
                , 'writables', 'translables', 'actionLink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ColorRequest $request, $id)
    {
        $color = $this->model::findOrFail($id);
        $translations = collect($request->translation);
        $data = $request->validated();;
        try {
            DB::beginTransaction();
            $color->fill($data)->save();
            foreach (getLanguages() as $index => $language) {
                $color->translations()
                    ->updateExistingPivot($language->id, ['name' => $translations[$index]['name']]);
            }
            DB::commit();
            return redirect()->route('colors.index')->with('success', __('messages.updated_successfully'));
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('colors.index')->with('error', __('messages.updated_with_errors'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->delete($id);
        return \response(__('messages.deleted_successfully'));
    }

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
        return \response(__('messages.deleted_successfully'));

    }

    /**
     * Remove specific record
     * @param $id
     */
    private function delete($id)
    {
        $item = $this->model::findOrFail($id);
        $item->delete();
    }

    /**
     * Get Items that will be displayed at index page
     * @return Collection|\Illuminate\Support\Collection
     */
    private function getItems()
    {
        return Collection::make($this->model::all())->map(function ($item) {
            $item->setAttribute('name', $item->getTranslation()->pivot->name);
            $item->setAttribute('main_category_id', $item->mainCategory->getTranslation()->pivot->name);
            return $item;
        });
    }

    private function getDataTable($items)
    {
        return \DataTables::of($items)
            ->addColumn('Actions', function ($item) {
                $view = "$this->route";
                return view('admin.components.btns.actions', compact('view', 'item'));
            })
            ->addColumn('checkbox', 'Admin.components.btns.checkbox')
            ->rawColumns(['Actions', 'checkbox', 'color'])
            ->make(true);
    }

    /**
     * Destroy Product Attr from product Edit page
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyProductAttr($id): \Illuminate\Http\JsonResponse
    {
        $pAttr = ProductAttributes::findOrFail($id);

        $pAttr->delete();

        return response()->json([__('messages.deleted_successfully')]);
    }
}
