<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandsRequest;
use App\Models\Brand;
use App\Models\MainCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Brand::all();
//        dd($items);
        if ($request->ajax()) {
            return $this->getDataTable($items);
        }
        $attributes = Brand::getreadables();
        $title      = __('titles.brands');
        $route      = 'brands';
        return view('Admin.components.index', compact(
            'title', 'items', 'attributes', 'route'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \View|\Illuminate\Http\Response
     */
    public function create()
    {
        $title       = __('general.brands');
        $smallTitle  = __('title.create_brand');
        $writables   = Brand::getWritables();
        $translables = \App\Models\Brand::translabes();
        $actionLink  = route('brands.store');


        return view('Admin.components.edit-create',
            compact('title', 'smallTitle', 'writables', 'translables', 'actionLink'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BrandsRequest $request)
    {
        try {
            $data = $this->collectDataToBeStored($request);
            Brand::create($data);
            return redirect()->route('brands.index')->with('success', __('messages.created_successfully'));
        } catch (Exception $exception) {
            return back()->with('errors', __('messages.something_wrong'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $item        = Brand::findOrFail($id);
        $title       = __('titles.brands');
        $smallTitle  = __('titles.edit_brand');
        $writables   = Brand::getWritables();
        $translables = Brand::translabes();
        $actionLink  = route('brands.update', $id);
        return view('Admin.components.edit-create', compact(
            'title', 'item', 'smallTitle',
            'writables', 'translables', 'actionLink'
        ));

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
        $brand = Brand::findOrFail($id);
        $data  = $this->collectDataToBeUpdated($request, $brand);
        $brand->fill($data)->save();
        return redirect()->route('brands.index')->with('success', __('messages.updated_successfully'));
    }

    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Request $request)
    {
        if ($request->mode == 'true')
            Brand::where('id', $request->id)->update(['status' => 'active']);
        else
            Brand::where('id', $request->id)->update(['status' => 'inactive']);

        return response()->json(['msg' => __('messages.updated_successfully'), 'status' => true]);
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
        return redirect()->route('brands.index')
            ->with('success', __('messages.deleted_successfully'));
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
        return redirect()->route('brands.index')->with('success', __('messages.deleted_successfully'));
    }

    /**
     * Remove specific record
     * @param $id
     */
    private function delete($id)
    {
        $item = Brand::findOrFail($id);
        unlinkPhoto($item->photo);
        $item->delete();
    }

    /**
     * @param $category_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function main_category_brands($category_id)
    {
        $main_category = MainCategory::find($category_id);

        $brands = Collection::make($main_category->brands)->map(function ($item) {
            $item->setAttribute('name', $item->getTranslation()->pivot->name);
            return $item;
        });
        return response()->json($brands);
    }


    private function generateSlug($title): string
    {
        $slug      = Str::slug($title);
        $slugCount = Brand::where('slug', $slug)->count();
        if ($slugCount > 0) {
            $slug = $slug . '-' . random_int(100, 500);
        }
        return $slug;
    }


    /**
     * Modify and collect data from request
     *
     * @param $request
     * @param string $name
     * @return mixed
     */
    private function collectDataToBeStored($request)
    {
        $data         = $request->all();
        $translations = collect($request->translation);
        $name        = [];
        $desc         = [];
        if ($request->has('translation')) {
            $data['slug'] = $this->generateSlug($request->translation[1]['name']);
            foreach (getLanguages() as $index => $language) {
                $name[$language->abbr] = $translations[$index]['name'];
                $desc [$language->abbr] = $translations[$index]['description'];
            }
        }
        $data['name']       = json_encode($name);
        $data['description'] = json_encode($desc);

        if ($request->has('photo'))
            $data['photo'] = uploadImage('brands', $request->photo);

        return $data;
    }


    /**
     * Get Columns of Datatable
     * @param $items
     * @return mixed
     */
    private function getDataTable($items)
    {
        return \DataTables::of($items)
            ->addColumn('Actions', function ($item) {
                $view = 'brands';
                return view('admin.components.btns.actions', compact('view', 'item'));
            })
            ->addColumn('photo', function ($item) {
                $url = asset('storage') . '/' . $item->photo;
                return view('admin.components.btns.photo', compact('url'));
            })
            ->addColumn('main_category', function ($item) {
                return $item->main_category;
            })
            ->addColumn('status', 'admin.components.btns.active')
            ->addColumn('checkbox', 'Admin.components.btns.checkbox')
            ->rawColumns(['Actions', 'main_category', 'checkbox', 'photo', 'status'])
            ->make(true);
    }

    private function collectDataToBeUpdated(BrandsRequest|Request $request, Brand $banner)
    {
        $data         = $request->all();
        $translations = collect($request->translation);
        $name        = [];
        $desc         = [];
        if ($request->has('translation')) {
            $data['slug'] = $this->generateSlug($request->translation[1]['name']);
            foreach (getLanguages() as $index => $language) {
                $name[$language->abbr] = $translations[$index]['name'];
                $desc [$language->abbr] = $translations[$index]['description'];
            }
        }
        $data['name']       = json_encode($name);
        $data['description'] = json_encode($desc);
        if ($request->has('photo')) {
            $this->unlinkPhoto($banner->photo);
            $data['photo'] = uploadImage('brands', $request->photo);
        }
        return $data;
    }

    /**
     * Delete photo of a specific item
     * @param $photo
     */
    private function unlinkPhoto($photo)
    {
        if (Storage::exists($photo))
            Storage::delete($photo);
    }


}
