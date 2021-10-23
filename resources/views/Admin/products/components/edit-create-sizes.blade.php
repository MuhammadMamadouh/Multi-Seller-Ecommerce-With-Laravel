<div class="row group col-md-4">
    <!-- Start Sizes Div -->
    <div class="form-group row">
        <div class="col-xl-3 col-md-4">
            <label
                for="sizes">{{__('validation.attributes.size')}}</label>
        </div>
        <div class="col-xl-8 col-md-7">
            <select
                class="sizes custom-select form-control"
                id="sizes" name="sizes[]">
                <option></option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-xl-3 col-md-4">
            <label
                for="size_price[]">{{__('validation.attributes.price')}}
            </label>
        </div>
        <div class="col-xl-8 col-md-7">
            <input class="form-control" id="size_price[]"
                   type="text" name="size_price[]"
                   value="">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-xl-3 col-md-4">
            <label
                for="size_offer_price[]">{{__('validation.attributes.offer_price')}}
            </label>
        </div>
        <div class="col-xl-8 col-md-7">

            <input class="form-control" id="size_offer_price[]"
                   type="text" name="size_offer_price[]">

        </div>
    </div>
    <div class="form-group row">
        <div class="col-xl-3 col-md-4">
            <label
                for="size_stock[]">{{__('validation.attributes.stock')}}
            </label>
        </div>
        <div class="col-xl-8 col-md-7">

            <input class="form-control" id="size_stock[]"
                   type="text" name="size_stock[]">

        </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger btnRemove">
            <span><i class="fa fa-trash-o"></i> </span></button>
    </div>
    <hr>
</div>
@php($itemAndHasSizes = isset($item)  && count($item->sizes) > 0  )
@if($itemAndHasSizes )
    @php($productSizes = isset($item) ? $item->sizes()->get() : null)
    <div class="col-md-6">
        <table class="table table-bordered col-md-6">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('titles.name')}}</th>
                <th scope="col">{{__('validation.attributes.price')}}</th>
                <th scope="col">{{__('validation.attributes.offer_price')}}</th>
                <th scope="col">{{__('validation.attributes.stock')}}</th>
                <th scope="col">{{__('validation.attributes.Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($productSizes as $size)
                <tr id="size-{{$size->id}}">
                    <th scope="row">{{$loop->index}}</th>
                    <th scope="row">{{$size->size->name}}</th>
                    <th scope="row">{{$size->original_price}}</th>
                    <th scope="row">{{$size->offer_price}}</th>
                    <th scope="row">{{$size->stock}}</th>

                    <th scope="row">

                        <form
                            action="{{route('product-size.destroy', $size->id)}}"
                            method="post">
                            @csrf @method('delete')
                            <button type="submit"
                                    class="btn btn-outline-danger delbtn"
                                    data-tr="size-{{$size->id}}">
                                x
                            </button>
                        </form>
                    </th>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif
