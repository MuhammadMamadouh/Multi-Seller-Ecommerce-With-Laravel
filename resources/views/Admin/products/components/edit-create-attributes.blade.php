<div class="row group col-md-4">
    <!-- Start Sizes Div -->
    <div class="form-group row">
        <div class="col-xl-3 col-md-4">
            <label for="attributes">{{__('validation.attributes.name')}}</label>
        </div>
        <div class="col-xl-8 col-md-7">
            <select
                class="attributes custom-select form-control"
                id="attributes" name="attributes[]">
                <option></option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-xl-3 col-md-4">
            <label
                for="value[]">{{__('validation.attributes.value')}}
            </label>
        </div>
        <div class="col-xl-8 col-md-7">
            <input class="form-control" id="attribute_value[]"
                   type="text" name="attribute_value[]">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-xl-3 col-md-4">
            <label
                for="attribute_price[]">{{__('validation.attributes.price')}}
            </label>
        </div>
        <div class="col-xl-8 col-md-7">
            <input class="form-control" id="attribute_price[]"
                   type="text" name="attribute_price[]">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-xl-3 col-md-4">
            <label
                for="attribute_offer_price[]">{{__('validation.attributes.offer_price')}}
            </label>
        </div>
        <div class="col-xl-8 col-md-7">

            <input class="form-control" id="attribute_offer_price[]"
                   type="text" name="attribute_offer_price[]">

        </div>
    </div>
    <div class="form-group row">
        <div class="col-xl-3 col-md-4">
            <label
                for="attribute_stock[]">{{__('validation.attributes.stock')}}
            </label>
        </div>
        <div class="col-xl-8 col-md-7">
            <input class="form-control" id="attribute_stock[]"
                   type="text" name="attribute_stock[]">
        </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger btnRemove">
            <span><i class="fa fa-trash-o"></i> </span></button>
    </div>
    <hr>
</div>
