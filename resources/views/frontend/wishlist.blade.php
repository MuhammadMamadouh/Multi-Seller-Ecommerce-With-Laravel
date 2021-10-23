@extends('layouts.frontend')

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>cart</h2>
                            <ul>
                                <li><a href="{{url('/')}}">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">Wishlist</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->



    <!--section start-->
    <section class="wishlist-section section-big-py-space b-g-light">
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
            <div class="row wishlist-buttons">
                <div class="col-12"><a href="javascript:void(0)" class="btn btn-normal">continue shopping</a> <a href="javascript:void(0)" class="btn btn-normal">check out</a></div>
            </div>
        </div>
    </section>
    <!--section end-->




@endsection
@section('extra-js')

    <!-- range sldier -->
    <script src="{{asset('/js/ion.rangeSlider.js')}}"></script>
    <script src="{{asset('/js/rangeslidermain.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        // $('#apply-coupon').on('submit', function (e) {
        //     e.preventDefault();
        //     alert('hi')
        // })
        $('.add-cartnoty').on('click', function () {
            let id = $(this).data('product-id');
            $.ajax({
                url: "{{route('cart.store')}}",
                type: 'POST',
                data: {
                    _token: '{{csrf_token()}}',
                    id: id
                },
                success: function (e) {
                    console.log(e[0])
                    $('body .cart_media').html(e[0])
                    $('#cart-count').html(e[1])
                }
            })
        });


        $('.delete-cart-item').on('click', function () {
            let id = $(this).data('itemid');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '{{__('messages.are_you_sure')}}',
                text: "{{__( "messages.You won't be able to revert this!")}}",
                icon: 'warning',
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{url('cart')}}/" + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{csrf_token()}}',
                            id: id
                        },
                        success: function (e) {
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            $('body .cart_media').html(e)
                            $('#cart-count').html(e[1])
                        }
                    })
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            });

        });

        $('.qty-adj').on('change', function () {
            let id = $(this).data('itemid');
            let qty = $('#qty-item-' + id).val()
            $.ajax({
                url: "{{url('cart')}}/" + id,
                type: 'PUT',
                data: {
                    _token: '{{csrf_token()}}',
                    id: id,
                    quantity: qty,
                },
                success: function (e) {
                    console.log(e)
                    $('#cart').html(e.cart)
                    $('body .cart_media').html(e.items)
                    $('#cart-count').html(e.count)
                }
            })
        })

    </script>
@endsection
