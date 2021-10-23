<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Shipping;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $shipping_methods = Shipping::active()->get();
        return view('frontend.check-out', compact('shipping_methods'));
    }

    public function placeOrder(Request $request)
    {
        $tax = (integer)\Cart::getCondition('tax')->getValue();
        $contents = $this->mapContents();
        $payment_gateway = '';
        $payment_status = '';
        $items = [];
        $stock = [];
        try {
            DB::beginTransaction();
            //check quantity for each item
            foreach (\Cart::getContent() as $item) {
                $stock[] = $item->associatedModel->stock;
                $quantity = (int)$item->quantity;
                $items [] = $item;
                if ($quantity > $stock) {
                    return back()->with('error', __('messages.item not found in seller stock'));
                }
            }

            if ($this->cartNotEmpty()) {
                if ($request->payment_method === 'debit_card') {
                    $this->payWithStripe($request, $contents);
                    $payment_gateway = 'stripe';
                    $payment_status = 'paid';
                } elseif ($request->payment_method === 'cod') {
                    $payment_gateway = 'cod';
                    $payment_status = 'unpaid';
                }
                $order = $this->addOrder($request, $tax, $payment_gateway, $payment_status);
                $this->sendEmail($order);
                DB::commit();
            \Cart::clear();
                return view('frontend.orders.order_success', compact('order'));

            } else {
                return back()->with('error', __('messages.cart is empty'));
            }
        } catch (\Exception $exception) {
            DB::rollBack();
//            return back()->with('error', $exception->getMessage());
            return back()->with('error', __('messages.something_wrong'));
        }
    }

    /**
     * @param Request $request
     * @param int $tax
     * @return mixed
     */
    private function addOrder(Request $request, int $tax, $payment_gateway, $payment_status)
    {
        $order = Order::create([
            'user_id' => auth()->check() ? auth()->user()->id : null,
            'billing_name' => $request->billing_name,
            'billing_email' => $request->billing_email,
            'billing_address' => $request->billing_address,
            'billing_city' => $request->billing_city,
            'billing_province' => $request->billing_province,
            'billing_postalcode' => $request->billing_postalcode,
            'billing_phone' => $request->billing_phone,
            'billing_subtotal' => \Cart::getSubTotal(),
            'billing_tax' => $tax,
            'billing_total' => \Cart::getTotal(),
            'payment_gateway' => $payment_gateway,
            'payment_status' => $payment_status,
            'condition' => 'pending',
            'shipping_charge' => $request->delivery_charge,
            'billing_name_on_card' => $request->name_on_card

        ]);
        foreach (\Cart::getContent() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->associatedModel->id,
                'quantity' => $item->quantity,
                'price' => $item->getPriceSum(),
                'attributes' => json_encode($item->attributes)
            ]);
        }
        return $order;
    }

    /**
     * @param Request $request
     * @param $contents
     */
    private function payWithStripe(Request $request, $contents): void
    {
        Stripe::charges()->create([
            'amount' => \Cart::getTotal(),
            'currency' => 'CAD',
            'source' => $request->stripeToken,
            'description' => 'Order',
            'receipt_email' => $request->billing_email,
            'metadata' => [
                'contents' => $contents,
                'quantity' => \Cart::getContent()->count(),
                'discount' => '',
            ],
        ]);
    }

    /**
     * @return mixed
     */
    private function mapContents()
    {
        $contents = \Cart::getContent()->map(function ($item) {
            return $item->associatedModel->slug . ', ' . $item->qty;
        })->values()->toJson();
        return $contents;
    }

    /**
     * @return bool
     */
    private function cartNotEmpty(): bool
    {
        return count(\Cart::getContent()) > 0;
    }

    /**
     * @param mixed $order
     */
    private function sendEmail(mixed $order): void
    {
        Mail::to($order->billing_email)->cc('muhammadmamdouh93@gmail.com')->send(new OrderMail($order));
    }

}
