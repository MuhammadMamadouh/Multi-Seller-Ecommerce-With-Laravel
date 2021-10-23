@extends('layouts.frontend')
@section('title', $product->name)
@section('extra-css')
    @livewireStyles
    <link href="{{asset('css/rateit.css')}}">
    <script src="{{asset('js/rateit.min.js')}}"></script>
@endsection
@section('content')

    <div id="response"></div>
    <!-- section start -->


    <section class="section-big-pt-space b-g-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="product-slick">

                            @isset($product->images)
                                @foreach(json_decode($product->images) as $image)
                                    <div><img src="{{asset("storage/$image")}}" alt="" style="height: 1000px"
                                              class="img-fluid  image_zoom_cls-{{$loop->index}}"></div>
                                @endforeach
                            @endisset

                        </div>
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="slider-nav">
                                    @isset($product->images)
                                        @foreach(json_decode($product->images) as $image)
                                            <div>
                                                <img src="{{asset("storage/$image")}}" alt="" style="height: 206px"
                                                     class="img-fluid  image_zoom_cls-{{$loop->index}}">
                                            </div>
                                        @endforeach
                                    @endisset

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 rtl-text">
                        <div class="product-right ">
                            @include('components.product.product-sizes-n-colors')
                            <div class="pro-group">
                                <div class="product-offer">
                                    <h6 class="product-title">
                                        <i class="fa fa-tags"></i>{{count($categoryCoupons)}} {{__('titles.offers Available on this Category')}}
                                    </h6>
                                    <div class="offer-contain">
                                        <ul>
                                            @isset($categoryCoupons)
                                                @foreach($categoryCoupons as $coupon)
                                                    <li>
                                                        <span class="code-lable">{{$coupon->title}}</span>
                                                        <div>
                                                            <h5>{{__('titles.get offer', ['discount' => $coupon->value])}}</h5>
                                                            <p>
                                                                {{__('titles.use coupon code', ['code'=> $coupon->code,
                                                            'min'=>$coupon->minimum_spend, 'max' => $coupon->maximum_spend, 'value' => $coupon->value])}}
                                                            </p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endisset
                                        </ul>
                                        <ul class="offer-sider">
                                            @isset($generalCoupons)
                                                @foreach($generalCoupons as $coupon)
                                                    <li>
                                                        <span class="code-lable">{{$coupon->title}}</span>
                                                        <div>
                                                            <h5>{{__('titles.get offer', ['discount' => $coupon->value])}}</h5>
                                                            <p>{{__('titles.use coupon code',
                                                                 ['code'=> $coupon->code, 'min'=>$coupon->minimum_spend,
                                                                  'max' => $coupon->maximum_spend, 'value' => $coupon->value])}}</p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endisset
                                        </ul>
                                        <h5 class="show-offer">
                                            <span class="more-offer">{{__('btns.show more')}}</span>
                                            <span class="less-offer">{{__('btns.less offer')}}</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-group">
                                <h6 class="product-title">{{__('titles.product information')}}</h6>
                                <p>{!! $product->information !!}</p>
                            </div>
                            <!-- ========= share ======= -->
                            <div class="pro-group pb-0">
                                <h6 class="product-title">share</h6>
                                <ul class="product-social">
                                    <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->
    <section class="tab-product tab-exes">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-12 col-lg-12 ">
                    <div class="creative-card creative-inner">
                        <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="top-home-tab" data-bs-toggle="tab"
                                                    href="#top-home" role="tab" aria-selected="false">{{__('titles.description')}}</a>
                                <div class="material-border"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="review-top-tab" data-bs-toggle="tab"
                                   href="#top-review" role="tab" aria-selected="true">{{__('titles.write review')}}</a>
                                <div class="material-border"></div>
                            </li>
                        </ul>
                        <div class="tab-content nav-material" id="top-tabContent">
                            <div class="tab-pane fade active show" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                                <p>{!! $product->description !!}</p>
                            </div>

                            <div class="tab-pane fade" id="top-review" role="tabpanel"
                                 aria-labelledby="review-top-tab">
                                @auth
                                    @livewire('reviews',['reviews'=> $product->reviews, 'product' => $product])
                                @else
                                    <div class="btn btn-danger-2x">
                                        <a href="{{route('login')}}">{{__('messages.you have to log in first')}}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @isset($related_products)
        <!-- related products -->
        <section class="section-big-py-space  ratio_asos b-g-light">
            <div class="custom-container">
                <div class="row">
                    <div class="col-12 product-related">
                        <h2>{{__('titles.related_products')}}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 product">
                        <div class="product-slide-6 product-m no-arrow">
                            @foreach($related_products as $item)
                                @include('components.product.index-product')
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- related products -->
    @endisset
@endsection
@section('extra-js')
    @livewireScripts
{{--    <script>--}}
{{--        Livewire.on('sizeChanged', data => {--}}
{{--            console.log(data)--}}
{{--        })--}}
{{--    </script>--}}

    <script>
        $('.quick-views').click(function (e) {
            let product_id = $(this).data('id');
            let url = "{{url('product')}}/" + product_id;
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    'id': product_id
                },
                success: function (e) {
                    $('#response').html(e);
                    $('#quick-view').modal().show();
                }
            })
        })
    </script>

    <!-- elevatezoom js-->
    <script src="{{asset('js/jquery.elevatezoom.js')}}"></script>
@endsection
