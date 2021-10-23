<div class="row group">
    <div class="col-md-12">
        <div class="form-group row">
            <div class="col-xl-5 col-md-4">
                <label for="colors[]">{{__('validation.attributes.colors')}}</label>
            </div>
            <div class="col-xl-5 col-md-4">
                <select
                    class="custom-select form-control basic-multiple"
                    id="colors[]" name="colors[]">
                    <option></option>
                    @foreach($colors as $color)
                    <option value="{{$color?->id}}">{{$color?->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-xl-5 col-md-4">
                <label
                    for="color_image[]">{{__('validation.attributes.photo')}}</label>
            </div>
            <div class="col-xl-5 col-md-4">
                <input class="form-control" id="color_image[]"
                       type="file" name="color_image[]" value="">
            </div>
        </div>

    </div>
</div>
<div class="col-md-1">
    <button type="button"
            class="btn btn-danger btnRemove"
            style="display: block;">
        <span><i class="fa fa-trash-o"></i> </span>
    </button>
</div>
