<table class="table cart-table table-responsive-xs">
    <thead>
    <tr class="table-head">
        <th scope="col">image</th>
        <th scope="col">product name</th>
        <th scope="col">price</th>
        <th scope="col">quantity</th>
        <th scope="col">action</th>
        <th scope="col">total</th>
    </tr>
    </thead>
    <tbody>
    @forelse($wishlist as $item)
        <tr>
            <!-- Image column -->
            <td>
                <a href="javascript:void(0)">
                    <img src="{{asset("storage/" . json_decode($item->images)[0])}}" alt="cart" class=" "></a>
            </td>
            <!-- name column -->
            <td><a href="{{route('product.details', $item->id)}}">{{$item->name}}</a>
                <div class="mobile-cart-content">
                    <div class="col-xs-3">
                        <div class="qty-box">
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <h2 class="td-color">${{$item->price}}</h2></div>
                    <div class="col-xs-3">
                        <h2 class="td-color"><a href="javascript:void(0)" class="icon"><i
                                    class="ti-close"></i></a></h2></div>
                </div>
            </td>

            <td>
                <h2>${{number_format($item->price, 2)}}</h2></td>
            <td><a href="javascript:void(0)" class="icon"><i class="ti-close"></i></a></td>

        </tr>

    </tbody>
    @empty
        No Products yet
    @endforelse
</table>
