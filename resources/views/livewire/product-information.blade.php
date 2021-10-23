<div>
    <div class="pro-group">
        <h2>{{$product->name}}</h2>
        <p>{{__('titles.brands')}}: <a href="{{route('brand.products', $product->brand->slug)}}"> {{$product->brand->name}}</a></p>
        <ul class="pro-price">
{{--            <li>List Price: {{$minPrice . '- ' . $maxPrice . '$'}}</li>--}}
            <li>{{$offerPrice ?? $originalPrice}}</li>
            <li><span>{{$offerPrice ? $originalPrice : ''}}</span></li>
            <li>{{$product->discount}}% off</li>
        </ul>
        <div class="revieu-box">
            <ul id="u-rating-fontawesome-o">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star-o"></i></li>
            </ul>
            <a href="javascript:void(0)"><span>(6 reviews)</span></a>
        </div>
    </div>

    <div id="selectSize"
         class="pro-group addeffect-section product-description border-product mb-0">

        @php
            $item = existInCart($product);
        @endphp
        <form action="{{route('cart.store')}}" method="post" class="add-to-cart-form" id="addtoCartQuickView">
            @csrf
            <input type="hidden" value="{{$product->id}}" name="id" id="product_id">

            @if($product->sizes && count($product->sizes()->get()) > 0)
                <h6 class="product-title size-text">{{__('titles.size')}}</h6>
                <h6 class="error-message">{{__('titles.plz_select_size')}}</h6>
                <div class="row">

                    <div class="size-box col-3">
                        <select name="size" class="form-control" wire:model="sizeId" wire:change="changeSize">
                            <option></option>
                            @foreach($product->sizes as $size )
                                <option value="{{$size->id}}"> {{$size->size->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

{{--            @else--}}
{{--                <div class="alert alert-danger">--}}
{{--                    {{__('messages.no_product_size')}}--}}
{{--                </div>--}}
            @endif
            @if($product->colors && count($product->colors()->get()) > 0)
            <h6 class="product-title">{{__('titles.color')}}</h6>
                <div class="color-selector inline col-md-4">
                    <div class="col-6">
                        <select name="color" class="form-control">
                            <option></option>
                            @foreach($product->colors as $color)
                                <option value="{{$color->color_id}}"> {{$color->color->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <ul class="slider-nav">
                        @foreach($product->colors as $color)
                            <li style="width: 100px">
                                <!-- Button trigger modal -->
                                <img src="{{asset('storage/' . $color->images)}}"
                                     alt="" class="img-fluid"
{{--                                     onclick="$('.slick-active img').attr('src','{{asset('storage/' . $color->images)}}' )"--}}
                                >
                            </li>
                        @endforeach
                    </ul>
                </div>
{{--            @else--}}
{{--                <div class="alert alert-danger">--}}
{{--                    {{__('messages.no_product_color')}}--}}
{{--                </div>--}}
            @endif

            <h6 class="product-title">{{__('titles.quantity')}}</h6>
            @if($stock <= 5)
                @if($stock == 0)
                    <p class="text-danger">{{__('messages.not available')}}</p>
                @else
                    @php($max = $stock)
                    <p class="text-danger">{{__('messages.no_quantity', ['quantity' => $stock])}}</p>
                @endif
            @else
                @php($max = 10)
            @endif
            @if($stock > 0)
                <div class="form-group row">
                    <div class="col-xl-5 col-md-5">
                        <select name="quantity">
                            @for($i=1; $i<=$max; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>

            <div class="product-buttons">
                <button type="submit" id="cartEffectq"
                        class="btn cart-btn btn-normal"
                        data-tippy-content="Add to cart">
                    <i class="fa fa-shopping-cart"></i>
                    {{__('btns.add to cart')}}
                </button>
                @endif

                <a href="javascript:void(0)" class="btn btn-normal add-to-wish tooltip-top" style="display: inline-grid"
                   data-tippy-content="Add to wishlist" data-product-id="{{$product->id}}">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                    {{__('btns.add to wishlist')}}
                </a>
            </div>
        </form>
    </div>

</div>
