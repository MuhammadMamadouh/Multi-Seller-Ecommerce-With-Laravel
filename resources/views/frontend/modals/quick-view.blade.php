<!-- Quick-view modal popup start-->

<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
<div class="row">
    <div class="col-lg-6 col-xs-12">
        <div class="quick-view-img">
            <img  src="{{asset("storage/"). '/' .  json_decode($product->images, true)[0]}}" alt="" class="img-fluid bg-img">
        </div>
    </div>
    <div class="col-lg-6 rtl-text">
        <div class="product-right">
            @include('components.product.product-sizes-n-colors')
            <a href="{{route('product.details', $product->id)}}" style="display: block"
               class="btn btn-normal tooltip-top" data-tippy-content="view detail">
                {{__('btns.show more')}}
            </a>
        </div>
    </div>
</div>

<!-- Quick-view modal popup end-->
