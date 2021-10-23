
<!-- Quick-view modal popup end-->
<a href="javascript:void(0)" data-bs-toggle="modal"
   data-bs-target="#quick-view-{{$id}}" id="squick-view"
   class="tooltip-top quickview btn btn-air-info" data-tippy-content="Quick View">
    <i class="fa fa-eye fa-2x"></i>
</a>

<!-- Quick-view modal popup start-->
<div class="modal fade bd-example-modal-lg theme-modal" id="quick-view-{{$id}}" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content quick-view-modal">
            <div class="modal-header">
                <h5 class="modal-title">{{__('titles.view all information')}}</h5>
            </div>
            <button type="button" class="btn-close left" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <div class="quick-view-img">
                            <img src="{{isset($item->images)? json_decode($item->images, true)[0] : ''}}" alt="" class="img-fluid bg-img">
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <div class="pro-group">
                                <h2>
                                    {{$name}}
                                </h2>
                                <ul class="pro-price">
                                    <li>${{$offer_price}}</li>
                                    <li><span>mrp ${{$price}}</span></li>
                                    <li>{{$discount}}% off</li>
                                </ul>
                                <div class="revieu-box">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pro-group">
                                <h6 class="product-title">product infomation</h6>
                                <p>{{$description}}</p>
                            </div>
                            <div class="pro-group pb-0">
                                @if($sizes)
                                    <h6 class="product-title size-text">select size</h6>
                                    <div class="size-box">
                                        <ul>
                                            @foreach($sizes as $size )
                                                <li class="size-text">
                                                    <a href="javascript:void(0)"
                                                       onclick="$('.size-text input[type=hidden]').attr('value', {{$size->id}})">
                                                        <input type="hidden" value="" id="product_size"
                                                               name="size">{{$size->name}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if($colors)
                                    <h6 class="product-title">color</h6>
                                    <div class="color-selector inline">
                                        <ul>
                                            @foreach($colors as $color)
                                                <li>
                                                    <div class="color-1"
{{--                                                         onclick="$('.color-1 input[type=hidden]').attr('value',{{$color->id}})"--}}
                                                         style="background-color: {{$color->color}}">
                                                        <input type="hidden" value="" name="color"
                                                               id="product_color">
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <h6 class="product-title">quantity</h6>
                                <button class="btn btn-outline-primary">{{$stock}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick-view modal popup end-->
