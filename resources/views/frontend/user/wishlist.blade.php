@extends('layouts.frontend')
@section('extra-css')
    @livewireStyles
@endsection
@section('content')
<!-- section start -->
<section class="section-big-py-space b-g-light">
    <div class="container">
        <div class="row">
            @include('frontend.user.left-bar', ['route_name' => 'wishlist'])
            <div class="col-lg-9">

                <!--section start-->
                <section class="cart-section order-history section-big-py-space">
                    <div class="custom-container">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table cart-table table-responsive-xs">
                                    <thead>
                                    <tr class="table-head">
                                        <th scope="col">image</th>
                                        <th scope="col">product name</th>
                                        <th scope="col">price</th>
                                        <th scope="col">availability</th>
                                        <th scope="col">action</th>
                                    </tr>
                                    </thead>
                                    @foreach($wishlist as $item)
                                        <tbody>
                                        <tr>
                                            <td>
                                                <a href="javascript:void(0)">
                                                    <img src="{{asset("storage/" . json_decode($item->images)[0])}}" alt="cart" class=" "></a>
                                            </td>
                                            <td><a href="{{route('product.details', $item->id)}}">{{$item->name}}</a>
                                                <div class="mobile-cart-content">
                                                    <div class="col-xs-3">
                                                        <p>in stock</p>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <h2 class="td-color">${{$item->price}}</h2>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <h2 class="td-color"><a href="javascript:void(0)" class="icon me-1"><i class="ti-close"></i> </a>
                                                            <a href="javascript:void(0)" class="cart"><i class="ti-shopping-cart"></i></a></h2></div>
                                                </div>
                                            </td>
                                            <td>
                                                <h2>${{$item->price}} </h2></td>
                                            <td>
                                                <p>
                                                    @if($item->stock > 0 && $item->stock < 5)
                                                        hurry up! less than 5 items
                                                    @elseif($item->stock === 0)
                                                        out of stock!
                                                    @elseif($item->stock > 0)
                                                        available
                                                    @endif

                                                </p>
                                            </td>
                                            <td><a href="javascript:void(0)" class="icon me-3"><i class="ti-close"></i> </a>
                                                <a href="javascript:void(0)" class="cart add-cartnoty" data-product-id="{{$item->id}}"><i class="ti-shopping-cart"></i></a></td>
                                        </tr>
                                        </tbody>
                                    @endforeach

                                </table>
                            </div>
                        </div>
                        <div class="row cart-buttons">
                            <div class="col-12 pull-right">
                                {{$wishlist->links('vendor.pagination.bootstrap-4')}}
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
