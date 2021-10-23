<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Apply coupon on the cart
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function applyCoupon(Request $request)
    {
        $code = $request->code;
        $coupon = Coupon::findByCode($code);
        $condition = null;
        if (!$coupon) {
            return back()->with('error', __('messages.invalid_coupon'));

        } else {
            if (!$coupon->isValid()) {

                return back()->with('error', $coupon->getFailedMessage());
            }

            if ($coupon->discount_type === 'fixed') {
                // add condition to only apply on totals, not in subtotal
                $condition = new \Darryldecode\Cart\CartCondition(array(
                    'name' => 'coupon',
                    'type' => 'fixed discount',
                    'target' => 'total', // this condition will be applied to cart's total when getTotal() is called.
                    'value' => "-$coupon->value",
                ));

            } elseif ($coupon->discount_type === 'percent') {

                $condition = new \Darryldecode\Cart\CartCondition(array(
                    'name' => 'coupon',
                    'type' => 'percent discount',
                    'target' => 'total', // this condition will be applied to cart's total when getTotal() is called.
                    'value' => "-$coupon->value%",
                ));
            }
            \Cart::condition($condition);
            return back()->with('success', __('messages.applying_coupon'));
        }
    }

    /**
     * Remove Coupon from Cart
     * @param Request $request
     */
    public function removeCoupon(Request $request)
    {
        $condition = \Cart::getCondition($request->name);
        if ($condition) {
            \Cart::removeCartCondition($request->name);
            return back()->with('success', 'messages.coupon_removed_successfully');
        } else {
            return back()->with('error', 'messages.something_wrong');
        }
    }

}
