@extends('layouts.frontend')
@section('extra-css')

@endsection


@section('content')

    <section class="section-big-py-space light-layout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="success-text"><i class="fa fa-check-circle" aria-hidden="true"></i>
                        <h2>thank you</h2>
                        <p>Payment is successfully processsed and your order is on the way</p>
                        <p>Transaction ID:267676GHERT105467</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-big-py-space mt--5 b-g-light">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-order">
                        <h3>{{__('titles.order details')}}</h3>

                        @foreach($order->products()->get() as $item)

                        <div class="row product-order-detail">
                            <div class="col-3"><img style="width: 100px" src="{{asset('storage') . '/' . json_decode($item->images)[0]}}" alt="" class="img-fluid "></div>
                            <div class="col-3 order_detail">
                                <div>
                                    <h4>product name</h4>
                                    <h5>{{$item->name}}</h5></div>
                            </div>

                            <div class="col-3 order_detail">
                                <div>
                                    <h4>{{__('titles.quantity')}}</h4>
                                    <h5>{{$item->pivot->quantity}}</h5></div>
                            </div>
                            <div class="col-3 order_detail">
                                <div>
                                    <h4>{{__('titles.item price')}}</h4>
                                    <h5>${{$item->offer_price ?? $item->price}}</h5></div>
                            </div>
                            <div class="col-3 order_detail">
                                <div>
                                    <h4>{{__('titles.item total price')}}</h4>
                                    <h5>${{$item->pivot->price}}</h5></div>
                            </div>
<div class="col-3 order_detail">
                                <div>
                                    <h4>{{__('titles.attributes')}}</h4>
                                    <h5>${{ print_r(json_decode($item->attributes, true))}}</h5></div>
                            </div>
                        </div>
                        @endforeach

                        <div class="total-sec">
                            <ul>
                                <li>{{__('titles.sub_total_price')}} <span>${{number_format($order->billing_subtotal)}}</span></li>
                                <li>{{__('titles.shipping')}} <span>${{$order->shipping_charge}}</span></li>
                                <li>({{__('titles.tax')}}) <span>${{$order->billing_tax}}</span></li>
                            </ul>
                        </div>
                        <div class="final-total">
                            <h3>{{__('titles.total_price')}} <span>${{number_format($order->billing_total)}}</span></h3></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row order-success-sec">
                        <div class="col-sm-6">
                            <h4>{{__('titles.summary')}}</h4>
                            <ul class="order-detail">
                                <li>{{__('titles.order ID')}}: {{$order->id}}</li>
                                <li>{{__('titles.Order Date')}}: {{$order->created_at}}</li>
                                <li>{{__('titles.Order Total')}} : ${{number_format($order->billing_total)}}</li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <h4>{{__('titles.shipping address')}}</h4>
                            <ul class="order-detail">
                                <li>{{$order->billing_address}}</li>
                                <li>{{$order->billing_city}}</li>
                                <li>{{$order->billing_province}}</li>
                                <li>{{__('titles.contact')}}. {{$order->billing_phone}}</li>

                            </ul>
                        </div>
                        <div class="col-sm-12 payment-mode">
                            <h4>{{__('titles.payment methods')}}</h4>
                            <p>{{$order->payment_gateway}}</p>
                        </div>
{{--                        <div class="col-md-12">--}}
{{--                            <div class="delivery-sec">--}}
{{--                                <h3>expected date of delivery</h3>--}}
{{--                                <h2>october 22, 2018</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('extra-js')


@endsection
