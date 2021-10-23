@extends('layouts.frontend')
@section('extra-css')
    @livewireStyles
    @endsection
@section('content')
    <!-- section start -->

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


                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- silde-bar colleps block end here -->

                            <!-- side-bar banner start here -->
                            <div class="collection-sidebar-banner">
                                <a href="javascript:void(0)"><img src="{{asset('images/category/side-banner.png')}}" class="img-fluid " alt=""></a>
                            </div>
                            <!-- side-bar banner end here -->

                        </div>


                        <!-- ================== Products ================== -->
                        <div class="collection-content col">
                            <div class="page-main-content">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="collection-product-wrapper">
                                            <div class="product-top-filter">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="filter-main-btn"><span class="filter-btn  ">
                                                                <i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="product-filter-content">
                                                            <div class="search-count">
                                                                <h5>
                                                                    <input type="search" class="form-control" placeholder="Search a Product" wire:model="searchTerm">
                                                                </h5>
                                                            </div>
                                                            <div class="collection-view">
                                                                <ul>
                                                                    <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                    <li><i class="fa fa-list-ul list-layout-view"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="collection-grid-view">
                                                                <ul>
                                                                    <li><img
                                                                            src="{{asset('images/category/icon/2.png')}}"
                                                                            alt="" class="product-2-layout-view"></li>
                                                                    <li><img
                                                                            src="{{asset('images/category/icon/3.png')}}"
                                                                            alt="" class="product-3-layout-view"></li>
                                                                    <li><img
                                                                            src="{{asset('images/category/icon/4.png')}}"
                                                                            alt="" class="product-4-layout-view"></li>
                                                                    <li><img
                                                                            src="{{asset('images/category/icon/6.png')}}"
                                                                            alt="" class="product-6-layout-view"></li>
                                                                </ul>
                                                            </div>

                                                            <div class="product-page-filter">
                                                                <select name="sortBy" onchange="this.form.submit()">
                                                                    <option
                                                                        selected>{{strtoupper(__('titles.default_sort'))}}</option>
                                                                    <option
                                                                        value="priceAsc" {{!empty($_GET['sortBy']) && $_GET['sortBy'] == 'priceAsc'  ? 'selected' : ''}}> {{strtoupper(__('titles.price_asc'))}}</option>
                                                                    <option
                                                                        value="priceDesc" {{!empty($_GET['sortBy']) && $_GET['sortBy'] == 'priceDesc'  ? 'selected' : ''}}>{{strtoupper(__('titles.price_desc'))}}</option>
                                                                    <option
                                                                        value="discAsc" {{!empty($_GET['sortBy']) && $_GET['sortBy'] == 'discAsc'  ? 'selected' : ''}}>{{strtoupper(__('titles.discount_asc'))}}</option>
                                                                    <option
                                                                        value="discDesc" {{!empty($_GET['sortBy']) && $_GET['sortBy'] == 'discDesc'  ? 'selected' : ''}}>{{strtoupper(__('titles.discount_desc'))}}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-wrapper-grid product">
                                                <div class="row">
                                                    @livewire('search-product')
                                                </div>
                                            </div>

                                            <div class="product-pagination">
                                                <div class="theme-paggination-block">
                                                    <div class="row">
                                                        <div class="col-xl-6 col-md-6 col-sm-12">
{{--                                                            {{$products->appends($_GET)->links('vendor.pagination.bootstrap-4')}}--}}
                                                        </div>
                                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                                            <div class="product-search-count-bottom">
{{--                                                                <h5>{{ucwords(__('titles.showing_results'))}} {{($products->firstItem())}}--}}
{{--                                                                    - {{($products->lastItem())}} {{__('titles.of')}} {{($products->total())}}</h5>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
    <script>
        $('.add-cartnoty').on('click', function () {
            let id = $(this).data('product-id');
            $.ajax({
                url: "{{route('cart.store')}}",
                type: 'POST',
                data: {
                    _token: '{{csrf_token()}}',
                    id: id
                },
                success: function (e) {
                    console.log(e)
                    $('body .cart_media').html(e[0])
                    $('#cart-count').html(e[1])
                }
            })
        });


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
