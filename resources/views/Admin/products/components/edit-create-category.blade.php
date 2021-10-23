<div class="tab-pane fade" id="category" role="tabpanel"
     aria-labelledby="top-profile-tab">
    <div class="categories">

        <h5 class="f-w-600">{{__("validation.attributes.$category")}}</h5>

        <div class="col-xl-8 col-md-7">
            <select class="custom-select select-option-cls form-control"
                    id="main_category"
                    name="main_categories_id">
                <option value=""></option>
                @foreach($mainCategories as $category)
                    <option
                        value="{{$category->id}}" {{isset($item) && $item->main_categories_id  === $category->id ? 'selected' : ''}}>
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('main_categories_id'))
                <span
                    class="text-danger">{{ $errors->first('main_categories_id') }}
                                                        </span>
            @endif
        </div>
    </div>

    <!-- Sub Categories div -->
    <div class="categories mt-4" id="main_children_div"
         aria-labelledby="top-profile-tab">
        <h5 class="f-w-600">{{__('validation.attributes.sub_category')}}</h5>

        <div class="col-xl-8 col-md-7" id="sub_category">
            <select class="custom-select form-control single-select"
                    id="main_children"
                    name="sub_category_id">
                @if(isset($item))
                    @foreach($subCategories as $category)
                        <option value="{{$category->id}}"
                            {{$item->sub_category->id === $category->id ? 'selected': ''}}
                        >
                            {{$category->name}}
                        </option>
                    @endforeach
                @endif

            </select>
            @if ($errors->has($attr))
                <span class="text-danger">{{ $errors->first($attr) }}</span>
            @endif
        </div>
    </div>

    <!-- Start Brands Div -->
    <div class="brands  mt-4" id="brand_div"
         aria-labelledby="top-profile-tab">
        <h5 class="f-w-600">{{__('validation.attributes.brand')}}</h5>

        <div class="col-xl-8 col-md-7" id="brand">
            <select class="custom-select form-control single-select"
                    id="brands"
                    name="brand_id">
                @if(isset($item)) @foreach($brands as $brand)
                    <option value="{{$brand->id}}"

                        {{$item->brand->id === $brand->id ? 'selected': ''}}

                    >
                        {{$brand->name}}
                    </option>
                @endforeach @endif
            </select>
            @if ($errors->has('brand_id'))
                <span
                    class="text-danger">{{ $errors->first('brand_id') }}</span>
            @endif
        </div>
    </div>
    <!-- End Brands Div -->

    <!-- Start Vendors Div -->
    <div class="vendors mt-4" id="vendors_div"
         aria-labelledby="top-profile-tab">
        <div class="col-xl-3 col-md-4">
            <label for="vendors">{{__('validation.attributes.vendor')}}</label>
        </div>
        <div class="col-xl-8 col-md-7" id="sub_category">
            <select class="custom-select form-control single-select"
                    id="vendors" name="vendor_id">
                @auth('admin')
                    @if(isset($item))

                        @foreach($vendors as $vendor)
                            <option value="{{$vendor->id}}"
                                {{$item->vendor->id === $vendor->id ? 'selected': ''}}
                            >{{$vendor->name}}</option>
                        @endforeach

                    @endif
                @elseauth('seller')
                    <option value="{{auth('seller')->user()->id}}">{{auth('seller')->user()->name}}</option>
                @endauth
            </select>

            @if ($errors->has('vendor_id'))
                <span class="text-danger">{{ $errors->first('vendor_id') }}</span>
            @endif
        </div>
    </div>
    <!-- End Vendors Div -->
</div>
