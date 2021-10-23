<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $items = $this->getItems();
        if ($request->ajax()) {
            return $this->getDataTable($items);
        }
        $attributes = Order::getreadables();
        $title = __('titles.orders');
        $route = 'seller.orders';                       // group route name like (orders.create, store ..etc)
        return view('seller.index', compact(
            'title', 'items', 'attributes', 'route'
        ));
//

    }

    /**
     * Get Data table columns
     * @param $items
     * @return mixed
     */
    private function getDataTable($items)
    {
        return \DataTables::of($items)
            ->addColumn('Actions', function ($item) {
                $view = 'orders';
                return view('Seller.orders.btns.actions', compact('view', 'item'));
            })
            ->addColumn('checkbox', 'Admin.components.btns.checkbox')
            ->rawColumns(['Actions', 'checkbox'])
            ->make(true);
    }

    /**
     * Get Items that will be displayed at index page
     * @return Collection|\Illuminate\Support\Collection
     */
    private function getItems()
    {
        $orders = Order::whereHas('products', function (Builder $query) {
            $query->where('vendor_id', '=', auth('seller')->user()->id);
        })->latest()->limit(5)->get();

        return Collection::make($orders)->map(function ($item) {
            $item->setAttribute('isShipped', $item->shipped ? __('validation.attributes.shipped') : __('validation.attributes.unshipped'));
            return $item;
        });
    }

}
