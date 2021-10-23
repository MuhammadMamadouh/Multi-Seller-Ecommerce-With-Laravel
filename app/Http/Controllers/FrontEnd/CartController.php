<?php

namespace App\Http\Controllers\FrontEnd;

use App\Classes\CouponConditions;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductSizes;
use App\Models\Size;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\CartCondition;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.cart');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
        list($color, $sizeName, $product, $price, $quantity, $stock, $cart_item_id) = $this->cartData($request);

        if ($quantity > $stock){
            return response()->json(['msg' => __('messages.not available')]);
        }
        if ($cart_item_id && !$request->quantity) { // already exists
            \Cart::update($cart_item_id, array('quantity' => 1)); // increase quantity by 1
        } else {                // first time to add in the cart
            \Cart::add(array('id' => random_int(1564, 656549),
                'name' => $product->name, 'price' => $price, 'quantity' => $quantity,
                'attributes' => array('size' =>$sizeName, 'color' => $color,),
                'associatedModel' => $product
            ));
        }

        \Cart::condition($this->tax_condition());

        // load view of cart items to update it with ajax
        $items = view('components.product.cart-item')->render();
        $count = \Cart::getContent()->count();
        $msg = __('messages.cart_updated_successfully');
        return response()->json(['items' => $items, 'count' => $count, 'msg'=>$msg]);
        } catch (\Exception $exception) {
            $msg = __('messages.something_wrong');
            return response()->json([$msg]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        \Cart::update($id, array('quantity' => array(
            'relative' => false,
            'value' => $request->quantity,
        ),
        ));
        $response = $this->updateCartResponse();
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $itemid = \request()->id ?? $id;

        \Cart::remove($itemid);
        $items = view('components.product.cart-item')->render();
        $count = \Cart::getContent()->count();
        if (\request()->ajax())
            return response()->json([$items, $count]);
        else
            return response()->json(__('messages.item_removed_successfully'));
    }


    public function clearCart()
    {
        \Cart::clear();
        $response = $this->updateCartResponse();

        return response()->json($response);
    }

    public function updateCart()
    {

        $response = $this->updateCartResponse();

        return response()->json($response);
    }

    /**
     * Add Tax To Cart
     * @return CartCondition
     * @throws \Darryldecode\Cart\Exceptions\InvalidConditionException
     */
    function tax_condition(): CartCondition
    {
        return new \Darryldecode\Cart\CartCondition(array(
            'name' => 'tax',
            'type' => 'tax',
            'target' => 'total', // this condition will be applied to cart's total when getTotal() is called.
            'value' => config('shopping_cart.tax') . '%',
        ));
    }

    /**
     * @return array
     */
    private function updateCartResponse(): array
    {
        $response['items'] = view('components.product.cart-item')->render();
        $response['cart'] = view('components.product.cart')->render();
        $response['count'] = \Cart::getContent()->count();
        return $response;
    }

    /**
     * @param Request $request
     * @return array
     */
    private function cartData(Request $request): array
    {
        $color = $request->color ? Color::find($request->color)->name : '';

        $product = Product::findOrFail($request->id);

        // price will be offer price if it is not null
        // if offer ends or product does not has an offer
        // it will be original price
        $price = $product->offer_price ?? $product->price;
        $stock = $product->stock;
        $sizeName = null;
        if ($request->size) {
            $size = ProductSizes::find($request->size);
            $sizeName = $size->size->name;
            $price = $size->offer_price ?: $size->original_price;
            $stock = $size->stock;
        }
        // if request does not have quantity (like quick add to cart in index page) or quantity less than zero
        // make quantity = 1
        // or quantity will be as same as request say (like add to cart from product page or quick view)

        $quantity = !$request->quantity || $request->quantity <= 0 ? 1 : $request->quantity;


        $cart_item_id = existInCart($product) ? existInCart($product)->id : null;
        return array($color, $sizeName, $product, $price, $quantity, $stock, $cart_item_id);
    }
}
