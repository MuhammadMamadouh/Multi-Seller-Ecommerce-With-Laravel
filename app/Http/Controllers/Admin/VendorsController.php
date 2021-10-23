<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoriesRequest;
use App\Http\Requests\VendorRequest;
use App\Models\MainCategory;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \\Illuminate\Http\Response
     */
    public function index(Request $request)
    {$items = $this->getItems();
        if ($request->ajax()) {
            return $this->getDataTable($items);
        }
        $attributes = Vendor::getreadables();
        $title = __('titles.vendors');
        $route = 'vendors';                       // group route name like (vendors.create, store ..etc)
        return view('Admin.components.index', compact(
            'title', 'items', 'attributes', 'route'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('title.Vendors');
        $smallTitle = __('general.create_vendor');
        $writables = Vendor::getWritables();
        $translables = Vendor::translabes();
        $actionLink = route('vendors.store');
        return view('Admin.components.edit-create',
            compact('title', 'smallTitle',
                'writables', 'translables',
                'actionLink'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(VendorRequest $request)
    {

        try {
            Vendor::create($request->all());
            return redirect()->route('vendors.index')->with('success', __('messages.created_successfully'));
        } catch (Exception $exception) {
            return back()->with('errors', 'something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Vendor::find($id)->main_category_id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $item = Vendor::findOrFail($id);
        $title = __('titles.vendors');
        $smallTitle = __('titles.edit_vendor');
        $writables = Vendor::getWritables();
        $translables = Vendor::translabes();
        return view('Admin.vendors.edit-create',
            compact('title', 'item', 'smallTitle',
                'writables', 'translables'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(VendorRequest $request, $id)
    {
        $vendor = Vendor::findOrFail($id);
        $data = $request->all();
        try {
            $vendor->fill($data)->save();
            return redirect()->route('vendors.index')->with('success', 'messages.updated_successfully');
        } catch (Exception $exception) {
            return redirect()->route('vendors.index')->with('error', __('messages.updated_with_errors'));
        }
    }

    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Request $request)
    {
        if ($request->mode == 'true')
            Vendor::where('id', $request->id)->update(['status' => 'active']);
        else
            Vendor::where('id', $request->id)->update(['status' => 'inactive']);

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
        foreach ($ids as $id){
            $this->delete($id);
        }
        return redirect()->route('vendors.index')->with('success', __('messages.deleted_successfully'));
    }
    /**
     * Remove specific record
     * @param $id
     */
    private function delete($id){
        $item = Vendor::findOrFail($id);
        unlinkPhoto($item->photo);
        $item->delete();
    }


    private function getDataTable($items)
    {
        return \DataTables::of($items)
            ->addColumn('photo', function ($item) {
                return $this->photo($item);
            })
            ->addColumn('checkbox', 'Admin.vendors.btns.checkbox')
            ->addColumn('status', function ($item) {
               return $this->statusBtn($item);
            })
            ->addColumn('Actions', function ($item) {
                return $this->actionsBtn($item);
            })
            ->rawColumns(['Actions', 'checkbox', 'photo', 'sub_categories', 'status'])
            ->make(true);
    }


    private function photo($item)
    {
        $url = asset('storage') . '/' . $item->photo;
        return '<img src="' . $url . '" border="0" width="150px"  class="img-rounded img-thumbnail" align="center" />';

    }

    private function statusBtn($item)
    {
        $checked = $item->status == 'active' ? 'checked' : '';

        return '<input type="checkbox" class="status"  name="status" id="statusBtn" ' . $checked . ' value="' . $item->id . '" data-id="' . $item->id . '">'
            . '<p>' . __('validation.attributes.active') . '</p>';
    }

    private function actionsBtn($item)
    {
        return '<a href="' . route('vendors.edit', $item->id) . '"  class="" id=""><i class="fa fa-2x fa-edit"></i></a>
          <form action="' . route("vendors.destroy", $item->id) . '" method="post">'
            . csrf_field() . method_field("delete") .
            '       <a href="" title="delete" data-id="' . $item->id . '" class="delbtn"><i class="fa fa-2x fa-trash"></i></a>
            </form>';
    }

    private function unlinkPhoto($request, $photo)
    {
        if ($request->has('photo'))     // User Has uploaded a new photo.
            Storage::delete($photo);    // then delete old photo.

    }

    /**
     * Get Items that will be displayed at index page
     * @return Collection|\Illuminate\Support\Collection
     */
    private function getItems()
    {
        return Collection::make(Vendor::all())->map(function ($item) {
            $item->setAttribute('main_category', $item->category->getTranslation()->pivot->name);
            return $item;
        });
    }


    /**
     * Modify and collect data from request
     *
     * @param $request
     * @return mixed
     */
    private function collectData($request)
    {
        $data = $request->all();
        $data['slug'] = $this->generateSlug($request->category[0]['name']);

        if ($request->has('photo'))
            $data['photo'] = uploadImage('main_categories', $request->photo);

        return $data;
    }

}
