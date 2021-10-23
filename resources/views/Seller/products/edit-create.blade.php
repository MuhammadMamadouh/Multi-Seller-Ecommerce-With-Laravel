@extends('Seller.layouts.master')
@section('title', $title)
@section('small-title', $smallTitle)
@section('extra-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    @livewireStyles
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
                                    {{__('titles.product information')}}</a>
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
                            <li class="nav-item">
                                <a class="nav-link" id="colors-tab"
                                   data-bs-toggle="tab" href="#colors" role="tab"
                                   aria-controls="colors" aria-selected="true">
                                    {{__('validation.attributes.colors')}} </a>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="category-tab" data-bs-toggle="tab" href="#sizes" role="tab"
                                   aria-controls="category" aria-selected="true">
                                    {{__('validation.attributes.sizes')}}</a>
                            </li>
                        </ul>
                        <form class="needs-validation user-add"
                              action="{{isset($item) ? route('seller-products.update', $item->id) : route('seller-products.store')}}"
                              method="post" enctype="multipart/form-data">
                            @if(isset($item)) @method('patch') @endif
                            @csrf

                            <div class="tab-content" id="top-tabContent">
                                @foreach($writables as $category=> $something)

                                    @if($category == 'general_attributes')
                                        <div class="tab-pane fade active show" id="main-info" role="tabpanel"
                                             aria-labelledby="top-profile-tab">

                                            @foreach($something as $attr=> $key)
                                                @include('components.form.creat_inputs')
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
                                        </div>
                                    @elseif($category == 'files')
                                        <div class="tab-pane fade" id="images" role="tabpanel"
                                             aria-labelledby="top-profile-tab">
                                            <div class="card">
                                                <div class="add-product ">
                                                    <div class="row">
                                                        <div class="col-xl-6 xl-50 col-sm-6 col-9">
                                                            <img
                                                                src="{{isset($item) && $item->images ? asset('storage/' . json_decode($item->images) [0]) :asset('images/product-sidebar/001.jpg')}}"
                                                                alt="" id="main_img"
                                                                class="img-fluid image_zoom_1 blur-up lazyloaded">
                                                        </div>

                                                        <div class="col-xl-3 xl-50 col-sm-6 col-3">
                                                            <ul class="file-upload-product">

                                                                @for($i=0; $i< 4; $i++)
                                                                    @php($src = isset($item) && $item->images && $i < count(json_decode($item->images))  ? asset('storage/' . json_decode($item->images) [$i])
                                                                                        : asset('images/product-sidebar/001.jpg'))
                                                                    <li>
                                                                        <div class="box-input-file"
                                                                             style="height: auto; width: 100px">
                                                                            <img
                                                                                src="{{$src}}"
                                                                                class="img-thumbnail" id="image-{{$i}}">
                                                                            <i class="fa fa-close"
                                                                               onclick="deletePhoto('image-{{$i}}')"
                                                                               style="display: none; position: absolute; top: 0; right: 0; font-size: 20px;">
                                                                            </i> <input class="upload" name="images[]"
                                                                                        type="file" value="{{$src}}">
                                                                            <i class="fa fa-plus"></i>
                                                                        </div>
                                                                    </li>
                                                                @endfor

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($errors->has('images.0'))
                                                    <span class="text-danger">{{ $errors->first('images.0') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @elseif($category == 'colors')
                                        <div class="tab-pane fade multi_field" id="colors" role="tabpanel"
                                             aria-labelledby="top-profile-tab">
                                            <div class="card">
                                                <div id="example-3" class="content">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="button" id="btnAdd-3" class="btn btn-primary">
                                                                <span><i class="fa fa-plus-circle"></i> </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    @if(isset($item) && count($item->colors()->get()) > 0)
                                                        @php($productColors = isset($item) ? $item->colors()->get() : null)
                                                        @foreach($productColors as $key => $color)
                                                            @include('Admin.products.components.edit-create-colors')
                                                        @endforeach
                                                    @else
                                                        @include('Admin.products.components.edit-create-colors')
                                                    @endif
                                                </div>
                                                @if ($errors->has('images.0'))
                                                    <span class="text-danger">{{ $errors->first('images.0') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                    @elseif($category == 'sizes')
                                        <div class="tab-pane fade multi_field" id="sizes" role="tabpanel"
                                             aria-labelledby="top-profile-tab">

                                            <div class=" profile-table">
                                                <div id="example-3" class="content">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="button" id="btnAdd-3" class="btn btn-primary">
                                                                <span><i class="fa fa-plus-circle fa-2x"></i> </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    @if(isset($item))
                                                        @php($productSizes = isset($item) ? $item->sizes()->get() : null)
                                                        @foreach($productSizes as $key => $size)
                                                            @include('Admin.products.components.edit-create-sizes')
                                                        @endforeach
                                                    @else
                                                        @include('Admin.products.components.edit-create-sizes')
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="pull-right">
                                                <button type="submit"
                                                        class="btn btn-outline-primary">{{__('btns.save')}}</button>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('extra-js')
    <script src="{{asset('js/jquery.multifield.min.js')}}"></script>
    <script>
        $('.multi_field').multifield({
            section: '.group',
            btnAdd: '#btnAdd-3',
            btnRemove: '.btnRemove',
        });
    </script>
    @livewireScripts
    <script>

        $('.upload').change(function (e) {
            let img = $(this).siblings('img');
            let closebtn = $(this).siblings('i');
            image = e.target.files[0];
            var mime_types = ['image/jpeg', 'image/png'];

            // validate MIME
            if (mime_types.indexOf(image.type) == -1) {
                alert('Error : Incorrect file type');
                return;
            }

            readURL(this, img, closebtn)
        });
        let readURL = function (input, img, closebtn) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    img.attr('src', e.target.result);
                    $('#main_img').attr('src', e.target.result);
                    closebtn.show();
                };
                reader.readAsDataURL(input.files[0])
            }
        };
        function deletePhoto(img_id) {
            let img = $(`#` + img_id);
            img.attr('src', '');
            img.siblings('input').attr('value', '')
        }
    </script>
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
                        selection_data(response.sizes,          $('.sizes'));
                    }
                });
            }

        }


        $(document).ready(function () {
            let cat_id = $('#main_category').val();

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
{{--        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
@endsection
