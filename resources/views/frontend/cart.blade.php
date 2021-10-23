@extends('layouts.frontend')
@section('title', __('shopping cart'))

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>{{__('titles.cart')}}</h2>
                            <ul>
                                <li><a href="{{url('/')}}">{{__('titles.home')}}</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">{{__('titles.cart')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="cart-section section-big-py-space b-g-light">
        <div class="custom-container">
            @if(count(Cart::getContent()) > 0 )
                <div class="row">
                    <div class="col-sm-12" id="cart">
                        @include('components.product.cart')

                    </div>
                    <div class="col-4">
                        <form action="{{route('coupon.apply')}}" id="apply-coupon" method="post">
                            @csrf @method('post')
                            <label>{{__('titles.have_coupon')}} </label>

                            <div class="input-group">
                                <input type="text" class="form-control" name="code" required>
                                <button type="submit" class="btn btn-solid btn-outline" >{{__('btns.apply')}}</button>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="row cart-buttons">
                    <div class="col-12">
                        <a href="{{route('shop.index')}}" class="btn btn-normal">{{__('btns.continue shopping')}}</a>
                        <a href="{{route('checkout.index')}}" class="btn btn-normal ms-3">{{__('btns.check out')}}</a>
                    </div>
                </div>
            @else
                <div class="alert alert-danger text-center">
                    <button class="btn btn-outline-danger-2x">{{__('titles.cart is empty')}}</button>
                </div>
                <div class="col-12">
                    <a href="{{route('shop.index')}}" class="btn btn-normal">{{__('btns.continue shopping')}}</a>
                </div>
            @endif
        </div>
    </section>
    <!--section end-->

@endsection
@section('extra-js')

    <!-- range sldier -->
    <script src="{{asset('/js/ion.rangeSlider.js')}}"></script>
    <script src="{{asset('/js/rangeslidermain.js')}}"></script>
    <script>


        $('body').on('submit', '.del-frm-crt', function (e) {
            e.preventDefault();
            let form = $(this).closest('form');
            let action = form.attr('action');
            Swal.fire({
                title: '{{__('messages.are_you_sure')}}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{__('messages.yes')}}',
                cancelButtonText: '{{__('messages.cancel')}}',
            }).then((result) => {

                if (result.isConfirmed) {
                    $.ajax({
                        url: action,
                        type: 'DELETE',
                        data:
                            {_token: '{{csrf_token()}}'},
                        success: function (data) {

                            Swal.fire(
                                '{{__('messages.deleted_successfully')}}',
                                data,
                                'success'
                            )
                            location.reload();
                        }
                    });

                }
            })
        });

        $('body').on('submit', '#clear-cart', function (e) {
            e.preventDefault();
            let form = $(this).closest('form');
            let action = form.attr('action');
            Swal.fire({
                title: '{{__('messages.are_you_sure')}}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{__('messages.yes')}}',
                cancelButtonText: '{{__('messages.cancel')}}',
            }).then((result) => {

                if (result.isConfirmed) {
                    $.ajax({
                        url: action,
                        type: 'DELETE',
                        data:
                            {_token: '{{csrf_token()}}'},
                        success: function (data) {

                            Swal.fire(
                                '{{__('messages.deleted_successfully')}}',
                                data,
                                'success'
                            )
                            location.reload();
                        }
                    });

                }
            })
        });

        $('body').on('change','.item-quantity', function (e) {
            let newQuantity =  $(this).val();
            let itemId = $(this).data('item-id');
            console.log(itemId);
            $.ajax({
                url: '{{url('cart/')}}/' + itemId,
                type: 'PATCH',
                data: {
                    _token: '{{csrf_token()}}',
                    quantity: newQuantity
                },
                success: function (data) {
                    console.log(data)
                    $('#cart').html(data.cart);
                }
            })
        })
    </script>
@endsection
