@extends('layouts.frontend')
@section('title', __('title.shop'))
@section('extra-css')
    @livewireStyles
@endsection
@section('content')
    <!-- section start -->
    <section class="section-big-pt-space ratio_asos b-g-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <form action="{{route('shop.filter')}}" method="get" id="filter-form">
                    <div class="row">
                        <div class="col-sm-3 collection-filter category-page-side">

                            <!-- side-bar colleps block stat -->
                            <div class="collection-filter-block creative-card creative-inner category-side">
                                <!-- brand filter start -->
                                <div class="collection-mobile-back">
                                <span class="filter-back"><i class="fa fa-angle-left"
                                                             aria-hidden="true"></i> back</span></div>
                                <div class="collection-collapse-block open">
                                    <h3 class="collapse-block-title mt-0">{{__('titles.main_categories')}}</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="collection-brand-filter">

                                            @if(!empty($_GET['main_category']))

                                                @php $filter_cats = explode(',', $_GET['main_category']);@endphp

                                            @endif
                                            @forelse($mainCategories as $category)
                                                <div
                                                    class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                    <input type="radio"
                                                           class="custom-control-input form-check-input maincat"
                                                           id="" value="{{$category->slug}}"
                                                           name="main_category"
                                                           onchange="this.form.submit(); "
                                                           @if(!empty($filter_cats) && in_array($category->slug, $filter_cats))
                                                           checked @endif
                                                    >
                                                    <label class="custom-control-label form-check-label"
                                                           for="{{$category->id}}">{{ucfirst($category->name)}}</label>
                                                </div>
                                            @empty
                                                <div
                                                    class="btn btn-outline-danger-2x">{{__('messages.no_categories_found')}}</div>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                            @isset($mainCategory)
                                <!--  Subcategories filter start here -->
                                    <div class="collection-collapse-block open mt-5">
                                        <h3 class="collapse-block-title mt-0">{{__('titles.sub_categories')}}</h3>
                                        <div class="collection-collapse-block-content">
                                            <div class="collection-brand-filter">

                                                @if(!empty($_GET['sub_category']))
                                                    @php
                                                        $filter_cats = explode(',', $_GET['sub_category']);
                                                    @endphp

                                                @endif
                                                @forelse($mainCategory->children as $category)
                                                    <div
                                                        class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                        <input type="checkbox"
                                                               class="custom-control-input form-check-input subcat"
                                                               id="{{$category->id}}" value="{{$category->slug}}"
                                                               name="sub_category[]"
                                                               onchange="this.form.submit()"
                                                               @if(!empty($filter_cats) && in_array($category->slug, $filter_cats))
                                                               checked @endif
                                                        >
                                                        <label class="custom-control-label form-check-label"
                                                               for="{{$category->id}}">{{ucfirst($category->name)}}</label>
                                                    </div>
                                                @empty
                                                    <div
                                                        class="btn btn-outline-danger-2x">{{__('messages.no_categories_found')}}</div>
                                                @endforelse

                                            </div>
                                        </div>
                                    </div>


                                    <!-- color filter start here -->
                                    <div class="collection-collapse-block open">
                                        <h3 class="collapse-block-title">colors</h3>
                                        <div class="collection-collapse-block-content">
                                            <div class="color-selector">
                                                <ul>
                                                    <li>
                                                        <div class="color-1 active"></div>
                                                        white (14)
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- BRAND filter start here -->
                                    <div class="collection-collapse-block open">
                                        <h3 class="collapse-block-title">{{__('titles.brands')}}</h3>
                                        <div class="collection-collapse-block-content">
                                            <div class="size-selector">
                                                <div class="collection-brand-filter">
                                                    @forelse($mainCategory->brands()->get() as $brand)
                                                        @isset($_GET['brand'])
                                                            @php $filter_brand = explode(',', $_GET['brand']);@endphp
                                                        @endisset
                                                        <div
                                                            class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                            <input type="checkbox"
                                                                   class="custom-control-input form-check-input"
                                                                   id="small" value="{{$brand->slug}}" name="brand"
                                                                   onchange="this.form.submit();"
                                                                   @if(!empty($filter_brand) && in_array($brand->slug, $filter_brand))
                                                                   checked @endif
                                                            >
                                                            <label class="custom-control-label form-check-label"
                                                                   for="{{$brand->id}}">{{$brand->name}}</label>
                                                        </div>
                                                    @empty
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
  <!-- size filter start here -->
                                    <div class="collection-collapse-block open">
                                        <h3 class="collapse-block-title">{{__('titles.sizes')}}</h3>
                                        <div class="collection-collapse-block-content">
                                            <div class="size-selector">
                                                <div class="collection-brand-filter">
                                                    @forelse($mainCategory->sizes()->get() as $size)
                                                        @isset($_GET['sizes'])
                                                            @php $filter_sizes = explode(',', $_GET['sizes']);@endphp
                                                        @endisset
                                                        <div
                                                            class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                            <input type="checkbox"
                                                                   class="custom-control-input form-check-input"
                                                                   id="small" value="{{$size->id}}" name="sizes[]"
                                                                   onchange="this.form.submit();"
                                                                   @if(!empty($filter_sizes) && in_array($size->id, $filter_sizes))
                                                                   checked @endif
                                                            >
                                                            <label class="custom-control-label form-check-label"
                                                                   for="{{$size->id}}">{{$size->name}}</label>
                                                        </div>
                                                    @empty
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>


{{--                                    <!-- price filter start here -->--}}
{{--                                    <div class="collection-collapse-block border-0 open">--}}
{{--                                        <h3 class="collapse-block-title">price</h3>--}}
{{--                                        <div class="collection-collapse-block-content">--}}
{{--                                            <div class="filter-slide">--}}
{{--                                                <input class="js-range-slider" type="text" name="my_range"--}}
{{--                                                       value="{{$products->min('price') . '-' . $products->max('price')}}"--}}
{{--                                                       onchange="this.form.submit()"--}}
{{--                                                       data-type="double"/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                @endisset
                            </div>
                            <!-- silde-bar colleps block end here -->
                        </div>

                        <!-- ================== Products ================== -->
                        <div class="collection-content col">
                            <div class="page-main-content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="collection-product-wrapper">
                                            @livewire('search-product', ['products' => $products, 'mainCategories' => $mainCategories,'mainCategory' => $mainCategory])
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
            </div>
        </div>
    </section>
    <!-- section End -->

@endsection
@section('extra-js')
    @livewireScripts
    <!-- range sldier -->
    <script src="{{asset('/js/ion.rangeSlider.js')}}"></script>
    <script src="{{asset('/js/rangeslidermain.js')}}"></script>

    <script>


        $('.delete-cart-item').on('click', function () {
            let id = $(this).data('itemid');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '{{__('messages.are_you_sure')}}',
                text: "{{__( "messages.You won't be able to revert this!")}}",
                icon: 'warning',
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{url('cart')}}/" + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{csrf_token()}}',
                            id: id
                        },
                        success: function (e) {
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            $('body .cart_media').html(e)
                            $('#cart-count').html(e[1])
                        }
                    })
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            });

        });


    </script>
@endsection
