@auth('web')
<a href="javascript:void(0)" class="add-to-wish tooltip-top"
   data-tippy-content="Add to Wishlist"
   data-product-id="{{$item->id}}">
    <i data-feather="heart"></i>
</a>
@endauth
