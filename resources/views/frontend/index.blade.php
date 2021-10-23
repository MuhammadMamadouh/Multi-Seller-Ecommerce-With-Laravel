@extends('layouts.frontend')
@section('title', __('titles.Home Page'))
@section('content')

    <!--slider start-->
    <section class="theme-slider home-slide b-g-white " id="home-slide">
        <div class="custom-container">
            <div class="row">
                <div class="col">
                    <div class="slide-1">
                        @if(count($banners)>0)
                            @foreach($banners as $banner)
                                <div>
                                    <div class="slider-banner p-center slide-banner-1">
                                        <div class="slider-img">
                                            <ul class="layout1-slide-1">
                                                <li id="img-1"><img src="{{asset("storage/$banner->photo")}}"
                                                                    class="img-fluid" alt="slider"></li>
                                                <li id="img-2" class="slide-center"><img
                                                        src="{{asset("storage/$banner->photo")}}" class="img-fluid"
                                                        alt="slider"></li>
                                            </ul>
                                        </div>
                                        <div class="slider-banner-contain">
                                            <div>
                                                <h1>{{$banner->title}}</h1>
                                                <h4>{{$banner->description}}</h4>
                                                @include('components.btns.shop-now')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider end-->
    <!--tab product-->
    {{--    <section class="section-pt-space">--}}
    {{--        <div class="tab-product-main">--}}
    {{--            <div class="tab-prodcut-contain">--}}
    {{--                <ul class="tabs tab-title">--}}
    {{--                    @forelse($main_categories as $category)--}}
    {{--                        <li class="{{$loop->iteration ==1 ?'current' : ''}}">--}}
    {{--                            <a href="tab-{{$loop->iteration}}">{{$category->name}}</a>--}}
    {{--                        </li>--}}
    {{--                    @empty--}}
    {{--                        <div class="btn btn-outline-danger-2x">No Categories Added Yet</div>--}}
    {{--                    @endforelse--}}
    {{--                </ul>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <!--tab product-->
    <!-- slider tab  -->
    {{--    <section class="section-py-space ratio_square product">--}}
    {{--        <div class="custom-container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col pr-0">--}}
    {{--                    <div class="theme-tab product mb--5">--}}
    {{--                        <div class="tab-content-cls ">--}}
    {{--                            @forelse($main_categories as $category)--}}
    {{--                                <div id="tab-{{$loop->iteration}}"--}}
    {{--                                     class="tab-content {{$loop->iteration ==1 ?'active default' : ''}}">--}}
    {{--                                    <div class="product-slide-6 product-m no-arrow">--}}
    {{--                                        @foreach($category->products()->limit(5)->get() as $item)--}}
    {{--                                            @include('components.product.index-product')--}}
    {{--                                        @endforeach--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            @empty--}}
    {{--                                <div class="btn btn-outline-danger-2x">No Categories Added Yet</div>--}}
    {{--                            @endforelse--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <!-- slider tab end -->
    <!--tab product-->



    {{--    <!--collection banner start-->--}}
    {{--    <section class="collection-banner section-pb-space ">--}}
    {{--        <div class="custom-container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col">--}}
    {{--                    @php $cat = collect($main_categories)->random(1) @endphp--}}

    {{--                    <div class="collection-banner-main banner-5 p-center">--}}
    {{--                        <div class="collection-img">--}}

    {{--                            <img src="{{asset("storage/") . '/' . $cat[0]['photo'] }}" class="bg-img"--}}
    {{--                                 alt="banner">--}}
    {{--                        </div>--}}
    {{--                        <div class="collection-banner-contain ">--}}
    {{--                            <div class="sub-contain">--}}
    {{--                                <h3>save up to 30% off</h3>--}}
    {{--                                <h4>{{$cat[0]['name']}}<span></span></h4>--}}
    {{--                                <div class="shop">--}}
    {{--                                    @include('components.btns.shop-now')--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <!--collection banner end-->--}}

    <!--deal banner start-->
    <section class="deal-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="deal-banner-containe">
                        <h2>
                            {{__('save up to 30% to 40% off')}}
                        </h2>
                        <h1>
                            {{__('omg! just look at the great deals!')}}
                        </h1>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 ">
                    <div class="deal-banner-containe">
                        <diV class="deal-btn">
                            <a href="{{url('shop')}}" class="btn-white">
                                {{__('View more')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--deal banner end-->

    @if(count($main_categories) > 0)
        <!--rounded category start-->
        <section class="rounded-category">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="slide-6 no-arrow">
                            @foreach($main_categories as $category)
                                <div class="category-contain">
                                    <div class="img-wrapper">
                                        <a href="{{route('category.products', $category->id)}}">
                                            <img src="{{asset("storage/$category->photo")}}" alt="category"
                                                 class="img-fluid" style="height: 100%; width: 100%">
                                        </a>
                                    </div>
                                    <a href="{{route('category.products', $category->id)}}" class="btn-rounded">
                                                                                {{$category->name}}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--rounded category end-->
    @endif



    <!--collection banner start-->
    <section class="collection-banner section-py-space">
        <div class="container-fluid">
            <div class="row collection2">
                @foreach($bestBanners as $banner)
                    <div class="col-md-4">
                        <div class="collection-banner-main banner-1 p-left">
                            <div class="collection-img">
                                <img src="{{asset("storage/$banner->photo")}}" class="img-fluid bg-img "
                                     alt="banner">
                            </div>
                            <div class="collection-banner-contain ">
                                <div>
                                    <h3>{{$banner->name}}</h3>
                                    <h4>{{$banner->description}}</h4>
                                    <div class="shop">
                                        @include('components.btns.shop-now')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--collection banner end-->


    <!--hot deal start-->
    <section class="hot-deal hotdeal-first b-g-white section-big-pb-space space-abjust">
        <div class="custom-container">
            <div class="row hot-2 ">
                <div class="col-12">
                    <!--title start-->
                    <div class="title3 b-g-white text-left">
                        <h4>today's hot deal</h4>
                    </div>
                    <!--titel end-->
                </div>
                <div class="col-lg-9">
                    <div class="slide-1 no-arrow">
                        <div>
                            <div class="hot-deal-contain ">
                                <div class="row hot-deal-subcontain hotdeal-block1">
                                    <div class="col-lg-4 col-md-4  ">
                                        <div class="hotdeal-right-slick border-0">
                                            @foreach($hotDeals as $item)
                                                <a href="{{route('product.details', $item->id)}}">
                                                    <div class="img-wrraper">
                                                        <div>
                                                            <img
                                                                src="{{$item->images != null ? asset('storage') . '/' . json_decode($item->images)[0]
: "https://www.publicdomainpictures.net/pictures/280000/velka/not-found-image-15383864787lu.jpg"
}}"
                                                                alt="hot-deal" class="img-fluid  bg-img">
                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 deal-order-3">
                                        <div class="hotdeal-right-slick border-0">
                                            @foreach($hotDeals as $item)
                                                <div>
                                                    <a href="{{route('product.details', $item->id)}}">
                                                        <h5>{{$item->name}}</h5>
                                                    </a>
                                                    </ul>
                                                    <p>
                                                        {{$item->description}}
                                                    </p>
                                                    <h6>${{$item->offer_price}} <span>{{$item->price}}</span></h6>
                                                    <div class="timer">
                                                        <p id="demo">
                                                        </p>
                                                    </div>
                                                    @include('components.btns.shop-now')
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-2 ">
                                        <div class="hotdeal-right-nav">
                                            @foreach($hotDeals as $item)
                                                <div>
                                                    <img
                                                        src="{{$item->images != null ? asset('storage') . '/' . json_decode($item->images)[0]
: "https://www.publicdomainpictures.net/pictures/280000/velka/not-found-image-15383864787lu.jpg"}}"
                                                        alt="{{$item->name}}" style="width: 100px;"
                                                        class="img-fluid"></div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="slide-1-section no-arrow">
                        <div>
                            <div class="media-banner border-0">
                                <div class="media-banner-box">
                                    <div class="media-heading">
                                        <h5>{{__('titles.New Products')}}</h5>
                                    </div>
                                </div>
                                @forelse($new_products as $item)
                                    <div class="media-banner-box">
                                        <div class="media">
                                            <a href="{{route('product.details', $item->id)}}">
                                                <img
                                                    src="{{$item->images != null ? asset('storage') . '/' . json_decode($item->images)[0]
: "https://www.publicdomainpictures.net/pictures/280000/velka/not-found-image-15383864787lu.jpg"}}"

                                                    class="img-fluid" alt="{{$item->name}}" style="width: 84px"
                                                    height="108px">
                                            </a>
                                            <div class="media-body">
                                                <div class="media-contant">
                                                    <div>
                                                        <div class="product-detail">
                                                            <a href="{{route('product.details', $item->id)}}">
                                                                                                                                <p>{{$item->name}}</p>
                                                            </a>
                                                            <h6>${{$item->offer_price}} <span>${{$item->price}}</span>
                                                            </h6>
                                                        </div>
                                                        <div class="cart-info">
                                                            @include('components.btns.add-to-cart')
                                                            @include('components.btns.add-to-wishlist')
                                                            @include('components.btns.quick-view')

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty

                                @endforelse
                                <div class="media-view">
                                    <h5><a href="{{url('shop')}}">View More</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--hot deal start-->

    <!--title start-->
    <div class="title1 section-my-space">
        <h3>{{__('titles.Popular Products')}}</h3>
    </div>
    <!--title end-->

    <!--product start-->
    <section class="product section-pb-space mb--5">
        <div class="custom-container">
            <div class="row">
                <div class="col pr-0">
                    <div class="product-slide-6 no-arrow">
                        @forelse($special_products as $item)
                            @include('components.product.index-product')
                        @empty
                            <div class="btn btn-outline-danger-2x">No Popular Products for now, please try again later
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--product end-->



@endsection
@section('extra-js')

    <script>
        $(function () {
            let tab = $(".tabs li");
            tab.click(function () {
                if ($(this).hasClass('current')) {
                    return;
                }

                tab.removeClass('current');
                $(this).addClass('current');

                $('.tab-content-cls div').fadeOut('slow');
                $('#' + $(this).data('rel')).fadeIn('slow');
            });
        });
    </script>
    <script>


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
        $('.addcart-form').on('submit', function (e) {

            e.preventDefault();
            let data = $(this).serialize();

            $.ajax({
                url: "{{route('cart.store')}}",
                type: 'POST',
                data: data,
                success: function (e) {
                    toastr.success(e[2])
                    $('body .cart_media').html(e[0])
                    $('.cart-count').html(e[1])
                }
            })
        })

    </script>
@endsection
