    <div class="product-box">
        <div class="product-imgbox">
            <div class="product-front">
                <a href="{{route('product.details', $item->id)}}"> <img
                        src="{{$item->images != null ? asset('storage') . '/' . json_decode($item->images)[0]
: "https://www.publicdomainpictures.net/pictures/280000/velka/not-found-image-15383864787lu.jpg"
}}" class="img-fluid  "
                        alt="product" style="height: 300px;"> </a>
            </div>
            <div class="product-back" style="width: 100%">
                <a href="{{route('product.details', $item->id)}}"> <img
                        src="{{$item->images != null ? asset('storage') . '/' . json_decode($item->images)[0]
: "https://www.publicdomainpictures.net/pictures/280000/velka/not-found-image-15383864787lu.jpg"
}}" class="img-fluid  "
                        alt="product" style="height: 300px;"> </a>
            </div>
            <div class="product-icon icon-inline">
                @include('components.btns.add-to-cart')
                @include('components.btns.add-to-wishlist')
                @include('components.btns.quick-view')

            </div>
            <div class="new-label1">
                <div style="font-size: 12px">{{$item->conditions}}</div>
            </div>
            <div class="on-sale1">
                on sale
            </div>
        </div>
        <div class="product-detail detail-inline ">
            <div class="detail-title">
                <div class="detail-left">
                    {{--                                                            <div class="rating-star">--}}
                    {{--                                                                <i class="fa fa-star"></i>--}}
                    {{--                                                                <i class="fa fa-star"></i>--}}
                    {{--                                                                <i class="fa fa-star"></i>--}}
                    {{--                                                                <i class="fa fa-star"></i>--}}
                    {{--                                                                <i class="fa fa-star"></i>--}}
                    {{--                                                            </div>--}}
                    <a href="{{route('product.details', $item->id)}}">
                        <h6 class="price-title">
                            {{$item->name}}
                        </h6>
                    </a>
                </div>


                <div class="detail-right">
                    <div class="check-price">
                        $ {{$item->price}}
                    </div>
                    <div class="price">
                        <div class="price">
                            {{$item->offer_price}}$
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

