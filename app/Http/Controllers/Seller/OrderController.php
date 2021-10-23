<?php

namespace App\Http\Controllers\Seller;

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
        $route = 'seller.orders';                       // group route name like (orders.create, store ..etc)
        return view('Admin.components.index', compact(
            'title', 'items', 'attributes', 'route'
        ));
    }




    public function show($id)
    {

        $order = Order::findOrFail($id);
//        {{dd($order->products()->get());}}
        $title = 'View Order';

        return view('seller.orders.show', compact('order', 'title'));
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
    public function changeStatus(Request $request, $id)
    {

        // remember to check if condition is already completed or cancelled
        $order = Order::findOrFail($id);
        $this->validate($request, [
            'condition' => 'required|in:pending,processing,completed,cancelled'
        ]);
        if ($request->condition === 'completed') {
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
        return redirect()->back()->with('success', __('messages.updated_successfully'));
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
                $view = 'seller.orders';
                return view('seller.orders.btns.actions', compact('view', 'item'));
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
