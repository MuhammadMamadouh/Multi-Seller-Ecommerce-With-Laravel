<ul class="cart_product" id="cart-items">
    @foreach(\Cart::getContent() as $item)
        <li>
            <div class="media">
                <a href="{{route('product.details', $item->associatedModel->id)}}">
                    <img alt="{{$item->name}}" class="me-3" src="{{asset("storage/" . json_decode($item->associatedModel->images)[0])}}">
                </a>
                <div class="media-body">
                    <a href="{{route('product.details', $item->associatedModel->id)}}">
                        <h4>{{$item->name}}</h4>
                    </a>
                    <h6>
                        ${{number_format($item->priceSum)}} <span>${{$item->price}}</span>
                    </h6>
                    <div class="addit-box">
                        <div class="qty-box">
                            <div class="input-group">
                                <button class="qty-minus"></button>
                                <input class="qty-adj form-control" type="number" value="{{$item->quantity}}"/>
                                <button class="qty-plus"></button>
                            </div>
                        </div>
                        <div class="pro-add">
                            <a href="javascript:void(0)" data-bs-toggle="modal" style="color:#5b6169"
                               data-bs-target="#edit-product-">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="javascript:void(0)" class="delete-cart-item" style="color:#5b6169" data-itemId= "{{$item->id}}">
                                <i class="fa fa-trash" ></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    @endforeach

</ul>
<ul class="cart_total">
    <li>
        subtotal : <span>${{\Cart::getSubTotal()}}</span>
    </li>
    <li>
        shpping <span>free</span>
    </li>
    <li>
        taxes <span>$0.00</span>
    </li>
    <li>
        <div class="total">
            total<span>${{\Cart::getTotal()}}</span>
        </div>
    </li>
    <li>
        <div class="buttons">
            <a href="{{route('cart.index')}}" class="btn btn-solid btn-sm">{{__('btns.view_cart')}}</a>
            <a href="checkout.html" class="btn btn-solid btn-sm ">checkout</a>
        </div>
    </li>
</ul>
