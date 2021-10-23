<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index(Request $request)
    {

        $items = $this->getItems();
        if ($request->ajax()) {
            return $this->getDataTable($items);
        }
        $attributes = Coupon::getreadables();
        $title = __('titles.coupons');
        $route = 'coupons';
        return view('Admin.components.index', compact(
            'title', 'items', 'attributes', 'route'
        ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Response
     */
    public function create()
    {
        $title = __('titles.coupons ');
        $smallTitle = __('titles.create_coupon');
        $writables = Coupon::getWritables();
        $translables = Coupon::translabes();
        $actionLink = route('coupons.store');
        return view('Admin.components.edit-create',
            compact('title', 'smallTitle', 'writables', 'translables', 'actionLink'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CouponRequest $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->all();
            Coupon::create($data);
            DB::commit();
            return redirect()->route('coupons.index')->with('success', __('messages.created_successfully'));
        } catch (Exception $exception) {
            DB::rollBack();
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
        try {
            $item = Coupon::findOrFail($id);
            $title = __('titles.coupons');
            $smallTitle = __('titles.edit_coupon');
            $writables = Coupon::getWritables();
            $translables = Coupon::translabes();
            $actionLink     = route('coupons.update', $id);
            return view('Admin.components.edit-create', compact(
                'title', 'item', 'smallTitle',
                'writables', 'translables', 'actionLink'));

        } catch (\Exception $exception) {
            return back()->with('errors', __('messages.something_wrong'));

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CouponRequest $request, $id)
    {
        try {
            $coupon = Coupon::findOrFail($id);
            DB::beginTransaction();
            $data = $request->all();
            $coupon->fill($data)->save();
            DB::commit();
            return redirect()->route('coupons.index')->with('success', __('messages.updated_successfully'));
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('errors', __('messages.something_wrong'));

        }

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
        return \response( __('messages.deleted_successfully'));
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
        return \response( __('messages.deleted_successfully'));

    }
    /**
     * Remove specific record
     * @param $id
     */
    private function delete($id){
        $item = Coupon::findOrFail($id);
        $item->delete();
    }


    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Request $request)
    {

        if ($request->mode == 'true')
            Coupon::where('id', $request->id)->update(['status' => 'active']);
        else
            Coupon::where('id', $request->id)->update(['status' => 'inactive']);

        return response()->json(['msg' => __('messages.updated_successfully'), 'status' => true]);
    }


    private function getDataTable($items)
    {
        return \DataTables::of($items)
            ->addColumn('Actions', function ($item) {
                $view = 'coupons';
                return view('admin.components.btns.actions', compact('view', 'item'));
            })
            ->addColumn('status', 'admin.components.btns.active')
            ->addColumn('checkbox', 'Admin.components.btns.checkbox')
            ->rawColumns(['Actions', 'checkbox', 'photo', 'status'])
            ->make(true);
    }

    /**
     * Get Items that will be displayed at index page
     * @return Collection|\Illuminate\Support\Collection
     */
    private function getItems()
    {
        return Collection::make(Coupon::all())->map(function ($item) {
            $item->setAttribute('mainCategory', $item->mainCategory ? $item->mainCategory->getTranslation()->pivot->name : '');
            return $item;
        });
    }
}
