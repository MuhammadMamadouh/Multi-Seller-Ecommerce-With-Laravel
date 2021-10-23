<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\CouponRequest;
use App\Http\Requests\ShippingRequest;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class ShippingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index(Request $request)
    {
        $items = Shipping::all();
        if ($request->ajax()) {
            return $this->getDataTable($items);
        }
        $attributes = Shipping::getreadables();
        $title = __('titles.shipping companies');
        $route = 'shippings';                       // group route name like (shippings.create, store ..etc)
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
        $title = __('titles.shipping');
        $writables = Shipping::getWritables();
        $translables = Shipping::translabes();
        $smallTitle = __('titles.create_coupon');
        $actionLink = route('main_categories.store');
        return view('Admin.components.edit-create',
            compact('title', 'smallTitle',
                'writables', 'translables',
                'actionLink'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ShippingRequest $request)
    {
        try {
            $data = $request->validated();
            Shipping::create($data);
            return redirect()->route('shippings.index')->with('success', __('messages.created_successfully'));
        } catch (Exception $exception) {
            return back()->with('errors', __('messages.something_wrong'));
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
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
            $item = Shipping::findOrFail($id);
            $title = __('titles.shipping');
            $writables = Shipping::getWritables();
            $translables = Shipping::translabes();
            $smallTitle = __('titles.edit_shipping');
            $actionLink = route('shippings.update', $id);
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
    public function update(ShippingRequest $request, $id)
    {
            $shipping = Shipping::findOrFail($id);
            $data = $request->validated();
            $shipping->fill($data)->save();
            return redirect()->route('shippings.index')
                ->with('success', __('messages.created_successfully'));
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
        return redirect()->route('shippings.index')
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
        foreach ($ids as $id){ $this->delete($id);}
        return redirect()->route('shippings.index')->with('success', __('messages.deleted_successfully'));
    }

    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Request $request)
    {
        if ($request->mode == 'true')
            Shipping::where('id', $request->id)->update(['status' => 'active']);
        else
            Shipping::where('id', $request->id)->update(['status' => 'inactive']);

        return response()->json(['msg' => __('messages.updated_successfully'), 'status' => true]);
    }


    private function getDataTable($items)
    {
        return \DataTables::of($items)
            ->addColumn('Actions', function ($item) {
                $view = 'shippings';
                return view('admin.components.btns.actions', compact('view', 'item'));
            })
            ->addColumn('status', 'admin.components.btns.active')
            ->addColumn('checkbox', 'Admin.components.btns.checkbox')
            ->rawColumns(['Actions', 'checkbox', 'photo', 'status'])
            ->make(true);
    }

    /**
     * Remove specific record
     * @param $id
     */
    private function delete($id){
        $item = Shipping::findOrFail($id);
        $item->delete();
    }

}
