@extends('Seller.layouts.master')
@section('title', $title)
@section('small-title', $smallTitle)
@section('extra-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="{{asset('css/treecss.min.css')}}" rel="stylesheet"/>
    <!-- Dropzone css-->
    <link href="{{asset('css/dropzone.css')}}" rel="stylesheet"/>


@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card tab2-card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="main-info-tab"
                                                    data-bs-toggle="tab" href="#main-info" role="tab"
                                                    aria-controls="main-info" aria-selected="true">
                                    {{__('validation.attributes.general info')}}
                                </a>
                            </li>
                            <li class="nav-item"><a class="nav-link " id="category-tab"
                                                    data-bs-toggle="tab" href="#price" role="tab"
                                                    aria-controls="category" aria-selected="true">
                                    {{__('validation.attributes.price')}}
                                </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="images-tab"
                                                    data-bs-toggle="tab" href="#images" role="tab"
                                                    aria-controls="images" aria-selected="true">
                                    {{__('validation.attributes.file')}}</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="colors-and-sizes-tab"
                                                    data-bs-toggle="tab" href="#category" role="tab"
                                                    aria-controls="colors-and-sizes" aria-selected="true">
                                    {{__('validation.attributes.category')}} </a>
                                </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="colors-and-sizes-tab"
                                                    data-bs-toggle="tab" href="#colors-and-sizes" role="tab"
                                                    aria-controls="colors-and-sizes" aria-selected="true">
                                    {{__('validation.attributes.colors')}} - {{__('validation.attributes.size')}}</a>
                                </a>
                            </li>
                        </ul>
                        <form class="needs-validation user-add"
                              action="{{$actionLink}}"
                              method="post" enctype="multipart/form-data">
                            @if(isset($item)) @method('patch') @endif
                            @csrf

                            <div class="tab-content" id="top-tabContent">
                                @foreach($writables as $category=> $something)

                                    @if($category == 'general_attributes')
                                        <div class="tab-pane fade active show" id="main-info" role="tabpanel"
                                             aria-labelledby="top-profile-tab">

                                        @foreach($something as $attr=> $key)

                                            @if($key['type'] === 'text')
                                                @if(getLanguages()->count() > 0 && in_array($attr, $translables)) <!-- Start If language -->
                                                    @foreach(getLanguages() as $index => $lang )

                                                        @isset($item)
                                                            <x-text-input
                                                                :item="$item" :attr="$attr" :lang="$lang"
                                                                :index="$index"></x-text-input>
                                                        @else
                                                            <x-text-input
                                                                :attr="$attr" :lang="$lang"
                                                                :index="$index"></x-text-input>
                                                        @endisset
                                                    @endforeach
                                                    @else  <!-- else if language -->

                                                    @isset($item) <!-- check if it's edit page -->
                                                    <x-text-input :item="$item" :attr="$attr"></x-text-input>
                                                    @else       <!-- it's create page-->
                                                    <x-text-input :attr="$attr"></x-text-input>
                                                    @endisset
                                                    @endif          <!-- endif get Languages-->

                                                    <!-- ============================================
                                                        ------------- Textarea Input-------------------
                                                        ============================================ -->
                                                @elseif($key['type'] === 'textarea')
                                                    @if(getLanguages()->count() > 0 && in_array($attr, $translables))
                                                        @foreach(getLanguages() as $index => $lang )
                                                            @isset($item) <!-- check if it's edit page -->
                                                            <x-text-area-input :item="$item" :attr="$attr" :lang="$lang"
                                                                               :index="$index"></x-text-area-input>
                                                            @else       <!-- it's create page-->
                                                            <x-text-area-input :attr="$attr" :lang="$lang"
                                                                               :index="$index"></x-text-area-input>
                                                            @endisset
                                                        @endforeach  <!--end getLanguage Foreach -->
                                                    @else                 <!--else getLanguage Foreach -->
                                                    @isset($item) <!-- check if it's edit page -->
                                                    <x-text-area-input :item="$item" :attr="$attr"></x-text-area-input>
                                                    @else       <!-- it's create page-->
                                                    <x-text-area-input :attr="$attr"></x-text-area-input>
                                                    @endisset
                                                    @endif

                                                <!--============================================
                                                ------------- Selection Input-------------------
                                                ============================================-->
                                                @elseif($key['type'] === 'selection')

                                                    @isset($item) <!-- check if it's edit page -->
                                                    <x-select :item="$item" :attr="$attr" :key="$key"></x-select>
                                                    @else       <!-- it's create page-->
                                                    <x-select :attr="$attr" :key="$key"></x-select>
                                                    @endisset
                                                @endif

                                            @endforeach
                                        </div>
                                    @elseif($category == 'price')
                                        <div class="tab-pane fade" id="price" role="tabpanel"
                                             aria-labelledby="top-profile-tab">

                                        @foreach($something as $attr=> $key)

                                            <!-- ============================================
                                                    ------------- Textarea Input-------------------
                                                ============================================ -->
                                            @if($key['type'] === 'textarea')
                                                @if(getLanguages()->count() > 0 && in_array($attr, $translables))
                                                    @foreach(getLanguages() as $index => $lang )
                                                        @isset($item) <!-- check if it's edit page -->
                                                            <x-text-area-input :item="$item" :attr="$attr"
                                                                               :lang="$lang"
                                                                               :index="$index"></x-text-area-input>
                                                        @else       <!-- it's create page-->
                                                            <x-text-area-input :attr="$attr" :lang="$lang"
                                                                               :index="$index"></x-text-area-input>
                                                        @endisset
                                                    @endforeach  <!--end getLanguage Foreach -->
                                                @else                 <!--else getLanguage Foreach -->
                                                @isset($item) <!-- check if it's edit page -->
                                                    <x-text-area-input :item="$item"
                                                                       :attr="$attr"></x-text-area-input>
                                                @else       <!-- it's create page-->
                                                    <x-text-area-input :attr="$attr"></x-text-area-input>
                                                @endisset
                                                @endif

                                                <!--============================================
                                                ------------- Selection Input-------------------
                                                ============================================-->
                                                @elseif($key['type'] === 'selection')
                                                    <x-select :attr="$attr" :key="$key"></x-select>
                                                @else
                                                    @if(getLanguages()->count() > 0 && in_array($attr, $translables)) <!-- Start If language -->
                                                    @foreach(getLanguages() as $index => $lang )

                                                        @isset($item) <!-- check if it's edit page -->
                                                        <x-general-input :item="$item" :attr="$attr"
                                                                         :type="$type"></x-general-input>
                                                        @else       <!-- it's create page-->
                                                        <x-general-input :type="$type"
                                                                         :attr="$attr"></x-general-input>
                                                        @endisset

                                                    @endforeach
                                                    @else  <!-- else if language -->

                                                    @php($type = $key['type'])

                                                    @isset($item) <!-- check if it's edit page -->
                                                    <x-general-input :item="$item" :attr="$attr"
                                                                     :type="$type"></x-general-input>
                                                    @else       <!-- it's create page-->
                                                    <x-general-input :type="$type" :attr="$attr"></x-general-input>

                                                    @endisset
                                                    @endif          <!-- endif get Languages-->

                                                @endif
                                            @endforeach

                                        </div>
                                    @elseif($category == 'category')
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
                                                                {{$category->getTranslation()->pivot->name}}
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
                                                                >{{$category->name}}</option>
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

                                                            >{{$brand->name}}</option>
                                                        @endforeach @endif
                                                    </select>
                                                    @if ($errors->has('brand_id'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('brand_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- End Brands Div -->

                                            @elseif($category == 'files')
                                                <div class="tab-pane fade" id="images" role="tabpanel"
                                                     aria-labelledby="top-profile-tab">

                                                    <div class=" profile-table">
                                                        @foreach($something as $attr=> $key)
                                                            @php($type = $key['type'])
                                                            <x-general-input :attr="$attr" :type="$type"
                                                                             :key="$key"></x-general-input>
                                                        @endforeach
                                                    </div>
                                                </div>

                                            @elseif($category == 'colorsAndSizes')
                                                <div class="tab-pane fade" id="colors-and-sizes" role="tabpanel"
                                                     aria-labelledby="top-profile-tab">
                                                    <!-- Start colors Div -->
                                                    <div class="form-group row">
                                                        <div class="col-xl-3 col-md-4">
                                                            <label for="colors">{{__('validation.attributes.color')}}
                                                            </label>
                                                        </div>
                                                        <div class="col-xl-8 col-md-7">
                                                            <select
                                                                class=" basic-multiple custom-select form-control"
                                                                id="colors" name="colors[]" multiple>
                                                                @foreach($colors as $color)
                                                                    <option value="{{$color->id}}"
                                                                    @if(isset($item))
                                                                        @foreach($item->colors as $clr)
                                                                            {{$clr->id === $color->id ? 'selected': ''}}
                                                                            @endforeach
                                                                        @endif
                                                                    >{{$color->name}}</option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('colors'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('colors') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!-- End colors Div -->

                                                    <!-- Start Sizes Div -->
                                                    <div class="form-group row">
                                                        <div class="col-xl-3 col-md-4">
                                                            <label for="sizes">{{__('validation.attributes.sizes')}}
                                                            </label>
                                                        </div>
                                                        <div class="col-xl-8 col-md-7">
                                                            <select
                                                                class=" basic-multiple custom-select form-control"
                                                                id="sizes" name="sizes[]" multiple>
                                                                @if(isset($item))
                                                                    @foreach($sizes as $size)
                                                                        <option value="{{$size->id}}"

                                                                        @foreach($item->sizes as $sz)
                                                                            {{$size->id === $sz->id ? 'selected': ''}}
                                                                            @endforeach
                                                                        >{{$size->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>

                                                            @if ($errors->has('sizes'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('sizes') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!-- End Sizes Div -->

                                                    <!-- End Color and sizes Div -->
                                                </div>

                                            @endif
                                            @endforeach
                                        </div>

                            </div>
                            <div class="pull-right">
                                <input type="submit" value="Save" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('extra-js')
    <script src="{{asset('js/jstree.min.js')}}"></script>
    <script>

        function selection_data(items, position) {
            let htmlOption = "";
            for (let item of items) {
                htmlOption += "<option value='" + item.id + "'>" + item.name + "</option>"
            }
            position.html(htmlOption);
        }

        function doAjax(cat_id) {
            let main_category_attaches = "{{url('seller/')}}/" + cat_id + "/attaches";
            if (cat_id > 0) {
                $.ajax({
                    url: main_category_attaches,
                    type: 'Get',
                    success: function (response) {
                        selection_data(response.sub_categories, $('#main_children'));
                        selection_data(response.brands,         $('#brands'));
                        selection_data(response.sizes,          $('#sizes'));
                    }
                });
            }
        }

        $(document).ready(function () {
            let cat_id = $('#main_category').val();
            // doAjax(cat_id)


            $('.basic-multiple').select2({
                width: '100%'
            });
            $('.single-select').select2({
                width: '100%'
            });
        });
        $('#has_parent').change(function (e) {
            // e.preventDefault();
            let is_checked = $(this).prop('selected');

            if (is_checked) {
                $('#parent_cats').addClass('d-none');
            } else {
                $('#parent_cats').removeClass('d-none');
            }
        })


        $('#main_category').change(function (e) {

            let cat_id = $(this).val();
            doAjax(cat_id)
        })


    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!--ck editor-->
    <!--dropzone js-->
    <script src="{{asset('js/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('js/dropzone/dropzone-script.js')}}"></script>


@endsection
