@extends('layouts.frontend')
@section('content')
    <!-- section start -->

    <!-- section start -->
    <section class="section-big-pt-space ratio_asos b-g-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <div class="row">
                   
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="top-banner-wrapper">
                                        <a href="product-page(left-sidebar).html"><img
                                                src="{{asset("storage/$brand->photo")}}" class="img-fluid "
                                                style="height:400px; width: 100%"
                                                alt=""></a>
                                        <div class="top-banner-content small-section">
                                            <h4>{{$brand->name}}</h4>
{{--                                            <p>{{$category->description}}</p>--}}
                                        </div>
                                    </div>
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="filter-main-btn"><span class="filter-btn  "><i
                                                                class="fa fa-filter"
                                                                aria-hidden="true"></i> Filter</span></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="product-filter-content">
                                                        <div class="search-count">
                                                            <h5>Showing Products 1-24 of 10 Result</h5></div>
                                                        <div class="collection-view">
                                                            <ul>
                                                                <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="collection-grid-view">
                                                            <ul>
                                                                <li><img src="../assets/images/category/icon/2.png"
                                                                         alt="" class="product-2-layout-view"></li>
                                                                <li><img src="../assets/images/category/icon/3.png"
                                                                         alt="" class="product-3-layout-view"></li>
                                                                <li><img src="../assets/images/category/icon/4.png"
                                                                         alt="" class="product-4-layout-view"></li>
                                                                <li><img src="../assets/images/category/icon/6.png"
                                                                         alt="" class="product-6-layout-view"></li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-page-per-view">
                                                            <select>
                                                                <option value="High to low">24 Products Par Page
                                                                </option>
                                                                <option value="Low to High">50 Products Par Page
                                                                </option>
                                                                <option value="Low to High">100 Products Par Page
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="product-page-filter">
                                                            <select>
                                                                <option value="High to low">Sorting items</option>
                                                                <option value="Low to High">50 Products</option>
                                                                <option value="Low to High">100 Products</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-wrapper-grid product">
                                            <div class="row">
                                                @foreach($brand->products as $item)
                                                    <div class="col-xl-3 col-md-4 col-6  col-grid-box">
                                                        @include('components.product.index-product')
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="product-pagination">
                                            <div class="theme-paggination-block">
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <nav aria-label="Page navigation">
                                                            <ul class="pagination">
                                                                <li class="page-item"><a class="page-link"
                                                                                         href="javascript:void(0)"
                                                                                         aria-label="Previous"><span
                                                                            aria-hidden="true"><i
                                                                                class="fa fa-chevron-left"
                                                                                aria-hidden="true"></i></span> <span
                                                                            class="sr-only">Previous</span></a></li>
                                                                <li class="page-item "><a class="page-link"
                                                                                          href="javascript:void(0)">1</a>
                                                                </li>
                                                                <li class="page-item"><a class="page-link"
                                                                                         href="javascript:void(0)">2</a>
                                                                </li>
                                                                <li class="page-item"><a class="page-link"
                                                                                         href="javascript:void(0)">3</a>
                                                                </li>
                                                                <li class="page-item"><a class="page-link"
                                                                                         href="javascript:void(0)"
                                                                                         aria-label="Next"><span
                                                                            aria-hidden="true"><i
                                                                                class="fa fa-chevron-right"
                                                                                aria-hidden="true"></i></span> <span
                                                                            class="sr-only">Next</span></a></li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <div class="product-search-count-bottom">
                                                            <h5>Showing Products 1-24 of 10 Result</h5></div>
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
        </div>
    </section>
    <!-- section End -->


    <!-- section End -->


    <!-- add to  setting bar  end-->
@endsection
@section('extra-js')

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
