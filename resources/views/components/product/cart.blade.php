<table class="table cart-table table-responsive-xs">
    <thead>
    <tr class="table-head">
        <th scope="col">{{__('titles.image')}}</th>
        <th scope="col">{{__('titles.product name')}}</th>
        <th scope="col">{{__('titles.price')}}</th>
        <th scope="col">{{__('titles.quantity')}}</th>
        <th scope="col">{{__('titles.attributes')}}</th>
        <th scope="col">{{__('titles.total')}}</th>
        <th scope="col">{{__('titles.action')}}</th>

    </tr>
    </thead>
    <tbody>
    @foreach(Cart::getContent() as $item)
        <tr>
            <!-- Image column -->
            <td>
                <a href="{{route('product.details', $item->associatedModel->id)}}">
                    <img src="{{asset("storage/" . json_decode($item->associatedModel->images)[0])}}" alt="cart"
                         class=" "></a>
            </td>
            <!-- name column -->
            <td><a href="javascript:void(0)">{{$item->name}}</a>
                <div class="mobile-cart-content">
                    <div class="col-xs-3">
                        <div class="qty-box">
                            <div class="input-group">
                                <input type="text" name="quantity" class="form-control input-number"
                                       value="{{$item->quantity}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <h2 class="td-color">${{$item->price}}</h2></div>
                    <div class="col-xs-3">
                        <h2 class="td-color">
                            <form action="{{route('cart.destroy', $item->id)}}" method="post">
                                @method('DELETE') @csrf
                                <button type="submit" class="btn icon" onclick="this.form.submit()">
                                    <i class="ti-close"></i></button>
                            </form>
                        </h2>
                    </div>
                </div>
            </td>

            <td><h2>${{number_format($item->price, 2)}}</h2></td>
            <td>

                    @php($max = 10)
                <div class="qty-box">
                    <div class="input-group">
                        <div class="col-xl-5 col-md-5">
                            <select name="quantity" class="item-quantity" data-item-id="{{$item->id}}">
                                @for($i=1; $i<=$max; $i++)
                                    <option value="{{$i}}" {{$item->quantity == $i ? 'selected' : ''}}>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
            </td>

            <td><h2 class="">{{$item->attributes['color'] . ' ' . $item->attributes['size'] }} </h2></td>
            <td><h2 class="td-color">${{number_format($item->getPriceSum(), 2)}}</h2></td>
            <td>
                <form action="{{route('cart.destroy', $item->id)}}" method="post" class="del-frm-crt">
                    @method('DELETE') @csrf
                    <button type="submit" class="btn icon"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach

    </tbody>


</table>
<form action="{{route('cart.clear')}}" method="post" id="clear-cart">
    @csrf @method('DELETE')
    <button type="submit" class="btn btn-normal mt-4">{{__('btns.clear_cart')}}</button>

</form>
<table class="table cart-table table-responsive-md">
    <tfoot>
    <tr>
        <td>{{__('titles.sub_total_price')}} :</td>
        <td><h2>${{\Cart::getSubTotal()}}</h2></td>
    </tr>
    <tr>
        <ul class="list-view">

            @if( \Cart::getCondition('tax') !== null)

                <li>
                    @php($coupon = \Cart::getCondition('tax'))
                    <td>{{__('titles.'.$coupon->getName())}} :
                    </td>
                    <td><h2>${{$coupon->getValue()}}</h2></td>

                </li>
            @endif
        </ul>
    </tr>
    <tr>
        <ul class="list-view">

            @if( \Cart::getCondition('coupon') !== null)

                <li>
                    @php($coupon = \Cart::getCondition('coupon'))
                    <td>{{$coupon->getName()}} :
                        <form action="{{route('coupon.remove')}}" method="post"> @csrf
                            <input class="btn btn-danger-gradien" type="submit" value="remove">
                            <input type="hidden" name="name" value="{{$coupon->getName()}}">
                        </form>
                    </td>
                    <td><h2>${{$coupon->getValue()}}</h2></td>

                </li>
            @endif        </ul>
    </tr>
    <tr>
        <td>{{__('titles.total_price')}} :</td>
        <td><h2>${{\Cart::getTotal()}}</h2></td>
    </tr>
    </tfoot>
</table>
