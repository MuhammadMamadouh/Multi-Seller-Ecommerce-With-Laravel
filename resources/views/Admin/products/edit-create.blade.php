@extends('Admin.layouts.master')
@section('title', $title)
@section('small-title', $smallTitle)
@section('extra-css')
{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>--}}
    @livewireStyles
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">

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
                                                @include('components.form.creat_inputs')
                                            @endforeach
                                        </div>

                                    @elseif($category == 'category')
                                        @include('Admin.products.components.edit-create-category')
                                    @elseif($category == 'files')
                                        @include('Admin.products.components.edit-create-files')
                                    @elseif($category == 'colors')
                                        <div class="tab-pane fade multi_field" id="colors" role="tabpanel"
                                             aria-labelledby="top-profile-tab">
                                            <div class="card">
                                                <div id="example-3" class="content row">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="button" id="btnAdd-3" class="btn btn-primary">
                                                                <span><i class="fa fa-plus-circle"></i> </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="color-group col-md-4">
                                                        @include('Admin.products.components.edit-create-colors')
                                                    </div>
                                                    <div class="col-md-6">
                                                        @php($itemAndHasColors = isset($item)  && count($item->colors) > 0  )
                                                        @if($itemAndHasColors)
                                                            @php($productColors = isset($item) ? $item->colors()->get() : null)
                                                            <table class="table table-bordered col-md-6">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">{{__('titles.name')}}</th>
                                                                    <th scope="col">{{__('titles.image')}}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($item->colors()->get() as $color)
                                                                    <tr id="color-{{$color->id}}">
                                                                        <th scope="row">{{$loop->index}}</th>
                                                                        <th scope="row">{{$color->color?->name}}</th>
                                                                        <td>
                                                                            <img id="view-image" class="img-thumbnail"
                                                                                 src="{{isset($color) ? asset('storage/' . $color->images) : ''}}">
                                                                        </td>
                                                                        <th scope="row">

                                                                            <form
                                                                                action="{{route('product-color.destroy', $color->id)}}"
                                                                                method="post">
                                                                                @csrf @method('delete')
                                                                                <button type="submit"
                                                                                        class="btn btn-outline-danger delbtn"
                                                                                        data-tr="color-{{$color->id}}">
                                                                                    x
                                                                                </button>
                                                                            </form>
                                                                        </th>

                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        @endif
                                                    </div>
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
                                                <div class="content row" id="example-3">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="button" id="btnAdd-3" class="btn btn-primary">
                                                                <span><i class="fa fa-plus-circle fa-2x"></i> </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    @include('Admin.products.components.edit-create-sizes')

                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                @endforeach
                            </div>
                                <div class="pull-right">
                                    <button type="submit"
                                            class="btn btn-outline-primary">{{__('btns.save')}}</button>
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
    <script src="{{asset('js/editor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('js/editor/ckeditor/styles.js')}}"></script>
    <script src="{{asset('js/editor/ckeditor/adapters/jquery.js')}}"></script>
    <script src="{{asset('js/editor/ckeditor/ckeditor.custom.js')}}"></script>

    <script>
        $('.multi_field').multifield({
            section: '.group',
            btnAdd: '#btnAdd-3',
            btnRemove: '.btnRemove',
        });

        $('.removeParent').on('click', function (e) {
            console.log($(this).closest('.color-group'))
            $(this).closest('.group').remove();
            ;
        });

        $('body').on('click', '.delbtn', function (e) {
            e.preventDefault();
            let tr = $(this).data('tr');
            let form = $(this).closest('form');
            let action = form.attr('action');
            Swal.fire({
                title: '{{__('messages.are_you_sure')}}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{__('messages.yes')}}',
                cancelButtonText: '{{__('messages.cancel')}}',
            }).then((result) => {

                if (result.isConfirmed) {
                    $.ajax({
                        url: action,
                        type: 'DELETE',
                        data:
                            {_token: '{{csrf_token()}}'},
                        success: function (data) {
                            $('#' + tr).remove()

                            Swal.fire(
                                '{{__('messages.deleted_successfully')}}',
                                data,
                                'success'
                            )

                        }
                    });

                }
            })
        });
    </script>

    @livewireScripts

    <script>

        function selection_data(items, position) {
            let htmlOption = "";
            for (let item of items) {
                htmlOption += "<option value='" + item.id + "'>" + item.name + "</option>"
            }
            position.html(htmlOption);
        }

        function doAjax(cat_id) {
            let main_category_attaches = '';
        @auth('admin')
             main_category_attaches = "{{url('admin/main_categories')}}/" + cat_id + "/attaches";
        @elseauth('seller')
             main_category_attaches = "{{url('seller/')}}/" + cat_id + "/attaches";

            @endauth
        if
            (cat_id > 0)
            {
                $.ajax({
                    url: main_category_attaches,
                    type: 'Get',
                    success: function (response) {
                        console.log(response)
                        selection_data(response.sub_categories, $('#main_children'));
                        selection_data(response.brands, $('#brands'));
                        selection_data(response.vendors, $('#vendors'));
                        selection_data(response.sizes, $('.sizes'));

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
    {{--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
@endsection
