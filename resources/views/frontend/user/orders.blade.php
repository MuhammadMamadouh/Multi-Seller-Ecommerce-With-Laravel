@extends('layouts.frontend')
@section('extra-css')
    @livewireStyles
@endsection
@section('content')
<!-- section start -->
<section class="section-big-py-space b-g-light">
    <div class="container">
        <div class="row">
            @include('frontend.user.left-bar', ['route_name' => 'orders'])
            <div class="col-lg-9">
                <!--section start-->
                <section class="cart-section order-history section-big-py-space">
                    <div class="custom-container">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table cart-table table-responsive-xs">
                                    <thead>
                                    <tr class="table-head">
                                        <th scope="col">product</th>
                                        <th scope="col">description</th>
                                        <th scope="col">price</th>
                                        <th scope="col">status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            @foreach($order->products as $item)
                                                <a href="{{route('product.details', $item->id)}}">
                                                    <img src="{{asset("storage/"). '/' .  json_decode($item->images, true)[0]}}" class="img-fluid  "
                                                        alt="product"> </a>
                                            @endforeach
                                        </td>
                                        <td><a href="javascript:void(0)">order no: <span class="dark-data">{{$order->id}}</span><br>
                                                @foreach($order->products as $item)
                                                    <a href="{{route('product.details', $item->id)}}"> {{$item->name}},</a>
                                                @endforeach
                                            </a>
                                            <div class="mobile-cart-content row">
                                                <div class="col-xs-3">
                                                    <div class="qty-box">
                                                        <div class="input-group">
                                                            <input type="text" name="quantity" class="form-control input-number" value="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3">
                                                    <h4 class="td-color">${{number_format($order->billing_total, 2)}}</h4></div>
                                                <div class="col-xs-3">
                                                    <h2 class="td-color"><a href="javascript:void(0)" class="icon"><i class="ti-close"></i></a></h2></div>
                                            </div>
                                        </td>
                                        <td>
                                            <h4>${{number_format($order->billing_total, 2)}}</h4></td>
                                        <td>
                                            <div class="responsive-data">
                                                <h4 class="price">${{number_format($order->billing_total, 2)}}</h4>
                                                <span>Size: L</span>|<span>Quntity: 1</span>
                                            </div>
                                            <span class="dark-data">{{$order->condition}}</span>
{{--                                            (jul 01, 2019)--}}
                                        </td>
                                    </tr>
                                    </tbody>
                                    @endforeach

                                </table>
                            </div>
                        </div>
                        <div class="row cart-buttons">
                            <div class="col-12 pull-right">
                                {{$orders->links('vendor.pagination.bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </section>
                <!--section end-->
            </div>
        </div>
    </div>
</section>
<!-- section end -->
@endsection
