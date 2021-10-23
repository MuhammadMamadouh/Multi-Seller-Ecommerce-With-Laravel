@include('layouts.components.head')
<body style="background-color: #f9f9f9"
      class="{{getDefaultLang()->direction === 'rtl' ? 'rtl' : 'ltr' }}"
>
<!-- loader start -->
<div class="loader-wrapper">
    <div>
        <img src="{{asset('images/loader.gif')}}" alt="loader">
    </div>
</div>
<!-- loader end -->

<!--header start-->
@include('layouts.components.header')
<!--header end-->
<div class="col-lg-3 pull-right" id="alertSpace">
    <div class="">
        @include('Admin.layouts.components.alert.success')
        @include('Admin.layouts.components.alert.error')
    </div>
</div>
<!-- section start -->
@yield('content')
<!-- Section ends -->

<!-- footer start -->
@include('layouts.components.footer')
<!-- footer end -->


<!-- Quick-view modal popup start-->
<div class="modal fade bd-example-modal-lg theme-modal quick-view-modal" id="quick-view" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content quick-view-modal">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="row">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick-view modal popup end-->


<!-- Add to cart bar -->
<div id="cart_side" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>{{__('titles.my_cart')}}</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeCart()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        @if(!Cart::isEmpty())
            <div class="cart_media">
                @include('components.product.cart-item')

            </div>
        @else
            <div class="alert alert-danger">
                {{__('messages.no_item')}}
            </div>
        @endif
    </div>
</div>
<!-- Add to cart bar end-->
@livewireScripts

<!-- latest jquery-->
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

<!-- slick js-->
<script src="{{asset('js/slick.js')}}"></script>


<!-- tool tip js -->
<script src="{{asset('js/tippy-popper.min.js')}}"></script>
<script src="{{asset('js/tippy-bundle.iife.min.js')}}"></script>

<!-- popper js-->
<script src="{{asset('js/popper.min.js')}}"></script>

<!--menu js-->
<script src="{{asset('js/menu.js')}}"></script>

<!-- father icon -->
<script src="{{asset('js/feather.min.js')}}"></script>
<script src="{{asset('js/feather-icon.js')}}"></script>

<script src="{{asset('/js/sweetalert2.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/bootstrap-notify.min.js')}}"></script>


{{--<!-- timer js -->--}}
{{--<script src="{{asset('js/timer1.js')}}"></script>--}}


<script src="{{asset('js/script.js')}}"></script>

@if(\Illuminate\Support\Facades\Session::has('success'))
    <script>
        toastr.success('{{session()->get('success')}}')
    </script>

@endif

@if(\Illuminate\Support\Facades\Session::has('error'))
    <script>
        toastr.error('{{session()->get('error')}}')
    </script>
@endif
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
<script>

    $('.quickviewBtn').on('click', function (e) {
        let id = $(this).data('product-id');

        $.ajax({
            url: "{{route('product.view-modal')}}",
            type: 'POST',
            data: {
                _token: '{{csrf_token()}}',
                id: id
            },
            success: function (e) {
                $('#quick-view .modal-body').html(e)
            }
        })
    });

    $('.add-cartnoty').on('click', function () {
        let id = $(this).data('product-id');
        $.ajax({
            url: "{{route('cart.store')}}",
            type: 'POST',
            data: {
                _token: '{{csrf_token()}}',
                id: id
            },
            success: function (response) {
                toastr.success(response['msg'])
                $('body .cart_media').html(response['items'])
                $('.cart-count').html(response['count'])
            }
        })
    });

    $('body').on('click', '.add-to-wish', function (e) {
        let id = $(this).data('product-id');
        $.ajax({
            url: "{{route('wishlist.store')}}",
            type: 'POST',
            data: {
                _token: '{{csrf_token()}}',
                product_id: id
            },
            success: function (e) {
                toastr.info(e.msg)
                $('body .cart_media').html(e[0])
                $('.wishlist-count').html(e[1])
            }
        })
    });

    $('body').on('submit', '.add-to-cart-form', function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            url: "{{route('cart.store')}}",
            type: 'POST',
            data: data,
            success: function (response) {
                toastr.success(response['msg'])
                $('body .cart_media').html(response['items'])
                $('.cart-count').html(response['count'])
            }
        })
    })
</script>


@yield('extra-js')
</body>
</html>
