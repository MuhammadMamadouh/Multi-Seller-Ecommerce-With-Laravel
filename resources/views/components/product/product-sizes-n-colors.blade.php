{{--<div class="pro-group">--}}
{{--    <h2>{{$product->name}}</h2>--}}
{{--    <ul class="pro-price">--}}
{{--        <li>{{$product->offer_price}}</li>--}}
{{--        <li><span>{{$product->price}}</span></li>--}}
{{--        <li>{{$product->discount}}% off</li>--}}
{{--    </ul>--}}
{{--    <div class="revieu-box">--}}
{{--        <ul id="u-rating-fontawesome-o">--}}
{{--            <li><i class="fa fa-star"></i></li>--}}
{{--            <li><i class="fa fa-star"></i></li>--}}
{{--            <li><i class="fa fa-star"></i></li>--}}
{{--            <li><i class="fa fa-star"></i></li>--}}
{{--            <li><i class="fa fa-star-o"></i></li>--}}
{{--        </ul>--}}
{{--        <a href="javascript:void(0)"><span>(6 reviews)</span></a>--}}
{{--    </div>--}}

{{--</div>--}}

{{--<div id="selectSize"--}}
{{--     class="pro-group addeffect-section product-description border-product mb-0">--}}
{{--    <h6 class="product-title size-text">{{__('titles.size')}}</h6>--}}
{{--    @php--}}
{{--        $item = existInCart($product);--}}
{{--    @endphp--}}
{{--    <form action="{{route('cart.store')}}" method="post" class="add-to-cart-form" id="addtoCartQuickView">--}}
{{--        @csrf--}}
{{--        <input type="hidden" value="{{$product->id}}" name="id" id="product_id">--}}

{{--        @if($product->sizes && count($product->sizes()->get()) > 0)--}}
{{--            <h6 class="error-message">{{__('titles.plz_select_size')}}</h6>--}}

{{--            <div class="size-box col-5">--}}
{{--                <select name="size" class="form-control">--}}
{{--                    @foreach($product->sizes as $size )--}}
{{--                        <option value="{{$size->id}}"> {{$size->size->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                --}}{{--                <ul>--}}
{{--                --}}{{--                    @foreach($product->sizes as $size )--}}
{{--                --}}{{--                        <li class="size-text {{($item && $item->attributes['size'] == $size->name) || $loop->first ? 'active' : ''}}">--}}
{{--                --}}{{--                            <a href="javascript:void(0)"--}}
{{--                --}}{{--                               onclick="$('.size-box input[type=hidden]').attr('value','{{$product->sizes[0]->size->name}}')">{{$size->name}}--}}
{{--                --}}{{--                            </a>--}}
{{--                --}}{{--                        </li>--}}
{{--                --}}{{--                    @endforeach--}}
{{--                --}}{{--                    <input type="hidden" id="product_size" name="size"--}}
{{--                --}}{{--                           value="{{$item && $item->attributes['size'] ? $item->attributes['size'] : $product->sizes[0]->name}}"--}}
{{--                --}}{{--                    >--}}

{{--                --}}{{--                </ul>--}}
{{--            </div>--}}
{{--        @else--}}
{{--            <div class="alert alert-danger">--}}
{{--                {{__('messages.no_product_size')}}--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        <h6 class="product-title">{{__('titles.color')}}</h6>--}}
{{--        @if($product->colors && count($product->colors()->get()) > 0)--}}
{{--            <div class="color-selector inline">--}}
{{--                <ul class="image-swatch">--}}
{{--                    @foreach($product->colors as $color)--}}
{{--                        <li>--}}
{{--                            {{$color->color->name}}--}}
{{--                            <div style="background-color: {{$color->color}}"--}}
{{--                                 class="color-1  {{$item && $item->attributes['color'] == $color->name || $loop->first ? 'active' : ''}}"--}}
{{--                                 onclick="$('.color-selector input[type=hidden]').attr('value','{{$color->name}}')">--}}

{{--                            </div>--}}
{{--                            <input type="radio" name="color">--}}
{{--                                <img src="{{asset('storage/' . $color->images)}}"--}}
{{--                                     alt="" class="img-fluid">--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                    <input type="hidden" name="color" id="product_color"--}}
{{--                           value="{{$item && $item->attributes['color'] ? $item->attributes['color'] : $product->colors[0]->name}}"--}}
{{--                    >--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @else--}}
{{--            <div class="alert alert-danger">--}}
{{--                {{__('messages.no_product_color')}}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <h6 class="product-title">{{__('titles.quantity')}}</h6>--}}
{{--        @if($product->stock <= 5)--}}
{{--            @php($max = $product->stock)--}}
{{--            <p class="text-danger">{{__('messages.no_quantity', ['quantity' => $product->stock])}}</p>--}}
{{--        @else--}}
{{--            @php($max = 10)--}}
{{--        @endif--}}
{{--        <div class="form-group row">--}}
{{--            <div class="col-xl-5 col-md-5">--}}
{{--                <select name="quantity">--}}
{{--                    @for($i=1; $i<=$max; $i++)--}}
{{--                        <option value="{{$i}}">{{$i}}</option>--}}
{{--                    @endfor--}}
{{--                </select>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="product-buttons">--}}
{{--            <button type="submit" id="cartEffectq"--}}
{{--                    class="btn cart-btn btn-normal"--}}
{{--                    data-tippy-content="Add to cart">--}}
{{--                <i class="fa fa-shopping-cart"></i>--}}
{{--                {{__('btns.add to cart')}}--}}
{{--            </button>--}}
{{--            <a href="javascript:void(0)" class="btn btn-normal add-to-wish tooltip-top" style="display: inline-grid"--}}
{{--               data-tippy-content="Add to wishlist" data-product-id="{{$product->id}}">--}}
{{--                <i class="fa fa-heart" aria-hidden="true"></i>--}}
{{--                {{__('btns.add to wishlist')}}--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</div>--}}

@livewire('product-information', ['product' => $product])
