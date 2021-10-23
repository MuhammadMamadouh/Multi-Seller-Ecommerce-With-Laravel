<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Weight;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = $this->getItems();
        if ($request->ajax()) {
            return $this->getDataTable($items);
        }
        $attributes = Order::getreadables();
        $title = __('titles.orders');
        $route = 'orders';                       // group route name like (orders.create, store ..etc)
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
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
       abort(404);
    }

    public function show($id)
    {

        $order = Order::findOrFail($id);
        $title = 'View Order';

        return view('admin.orders.show', compact('order', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $item = Weight::find($id);
        $title = __('titles.orders');
        $smallTitle = __('titles.edit_color');
        $writables = Weight::getWritables();
        $translables = Weight::translabes();
        return view('Admin.orders.edit-create',
            compact('title', 'item', 'smallTitle', 'writables', 'translables'));

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
        $weight = Weight::findOrFail($id);
        $translations = collect($request->translation);


        $data = $this->collectData($request);;
        try {
            DB::beginTransaction();

            $weight->fill($data)->save();
            foreach (getLanguages() as $index => $language) {
                $weight->translations()
                    ->updateExistingPivot($language->id, ['name' => $translations[$index]['name']]);
            }
            DB::commit();
            return redirect()->route('orders.index')->with('success', __('messages.updated_successfully'));
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('orders.index')->with('error', __('messages.updated_with_errors'));
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
        $weight = Order::findOrFail($id);
        $weight->delete();
        return redirect()->route('orders.index')->with('success', __('messages.deleted_successfully'));
    }


    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Request $request)
    {
        dd($request->all());
        // remember to check if condition is already completed or cancelled
        $order = Order::findOrFail($request->id);
        $this->validate($request, [
            'condition' => 'required|in:pending,processing,complete,cancelled'
        ]);
        if ($request->condition === 'complete') {
            foreach ($order->products as $item) {
                $product = Product::find($item->pivot->product_id);
               $this->updateQuantity($product, $item);
                Order::where('id', $request->id)->update([
                    'payment_status' => 'paid',
                    'shipped'        => 1
                    ]);
            }
        }
        // Dont forget to increase quantity if order was cancelled
        Order::where('id', $request->id)->update(['condition' => $request->condition]);
        return redirect()->route('orders.index')->with('success', __('messages.updated_successfully'));
    }

    /**
     * Get Items that will be displayed at index page
     * @return Collection|\Illuminate\Support\Collection
     */
    private function getItems()
    {
        return Collection::make(Order::latest()->get())->map(function ($item) {
            $item->setAttribute('isShipped', $item->shipped ? __('validation.attributes.shipped') : __('validation.attributes.unshipped'));
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
        return $data;
    }


    private function getDataTable($items)
    {
        return \DataTables::of($items)
            ->addColumn('Actions', function ($item) {
                $view = 'orders';
                return view('admin.orders.btns.actions', compact('view', 'item'));
            })
            ->addColumn('checkbox', 'Admin.components.btns.checkbox')
            ->rawColumns(['Actions', 'checkbox'])
            ->make(true);
    }

    private function updateQuantity($product, $item)
    {
        $stock = $product->stock;
        $stock -= $item->pivot->quantity;
        $product->update(['stock' => $stock]);
    }
}
