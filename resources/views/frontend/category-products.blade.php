@extends('layouts.frontend')
@section('content')
    <!-- section start -->

    <!-- section start -->
    <section class="section-big-pt-space ratio_asos b-g-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <div class="row">
                    <div class="col-sm-3 collection-filter category-page-side">
                        <!-- side-bar colleps block stat -->
                        <div class="collection-filter-block creative-card creative-inner category-side">
                            <!-- brand filter start -->
                            <div class="collection-mobile-back">
                                <span class="filter-back"><i class="fa fa-angle-left"
                                                             aria-hidden="true"></i> back</span></div>
                            <div class="collection-collapse-block open">
                                <h3 class="collapse-block-title mt-0">brand</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                        @forelse($category->brands()->get() as $brand)
                                            <div
                                                class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="checkbox" class="custom-control-input form-check-input"
                                                       id="zara">
                                                <label class="custom-control-label form-check-label"
                                                       for="zara">{{$brand->name}}</label>
                                            </div>
                                        @empty
                                            <div class="btn btn-outline-danger-2x">No Brands Added yet</div>
                                        @endempty
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

                            <!-- size filter start here -->
                            <div class="collection-collapse-block open">
                                <h3 class="collapse-block-title">size</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="size-selector">
                                        <div class="collection-brand-filter">
                                            <div
                                                class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="checkbox" class="custom-control-input form-check-input"
                                                       id="small">
                                                <label class="custom-control-label form-check-label"
                                                       for="small">s</label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="checkbox" class="custom-control-input form-check-input"
                                                       id="mediam">
                                                <label class="custom-control-label form-check-label"
                                                       for="mediam">m</label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="checkbox" class="custom-control-input form-check-input"
                                                       id="large">
                                                <label class="custom-control-label form-check-label"
                                                       for="large">l</label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="checkbox" class="custom-control-input form-check-input"
                                                       id="extralarge">
                                                <label class="custom-control-label form-check-label"
                                                       for="extralarge">xl</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- price filter start here -->
                            <div class="collection-collapse-block border-0 open">
                                <h3 class="collapse-block-title">price</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="filter-slide">
                                        <input class="js-range-slider" type="text" name="my_range" value=""
                                               data-type="double"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- silde-bar colleps block end here -->
                        <!-- side-bar single product slider start -->
                        <div class="theme-card creative-card creative-inner">
                            <h5 class="title-border">new product</h5>
                            <div class="slide-1">
                                <div>
                                    <div class="media-banner plrb-0 b-g-white1 border-0">
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                    <img src="../assets/images/layout-2/media-banner/3.jpg"
                                                         class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                                    <p>sumsung galaxy</p></a>
                                                                <h6>$47.05 <span>$55.21</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty"
                                                                        data-tippy-content="Add to cart">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none"
                                                                         stroke="currentColor" stroke-width="2"
                                                                         stroke-linecap="round" stroke-linejoin="round"
                                                                         class="feather feather-shopping-cart">
                                                                        <circle cx="9" cy="21" r="1"></circle>
                                                                        <circle cx="20" cy="21" r="1"></circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                                                    </svg>
                                                                </button>
                                                                <a href="javascript:void(0)"
                                                                   class="add-to-wish tooltip-top"
                                                                   data-tippy-content="Add to Wishlist"><i
                                                                        data-feather="heart"
                                                                        class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                   data-bs-target="#quick-view" class="tooltip-top"
                                                                   data-tippy-content="Quick View"><i
                                                                        data-feather="eye"></i></a>
                                                                <a href="compare.html" class="tooltip-top"
                                                                   data-tippy-content="Compare"><i
                                                                        data-feather="refresh-cw"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                    <img src="../assets/images/layout-2/media-banner/1.jpg"
                                                         class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                                    <p>bajaj rex mixer</p></a>
                                                                <h6>$40.05 <span>$60.21</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty"
                                                                        data-tippy-content="Add to cart">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none"
                                                                         stroke="currentColor" stroke-width="2"
                                                                         stroke-linecap="round" stroke-linejoin="round"
                                                                         class="feather feather-shopping-cart">
                                                                        <circle cx="9" cy="21" r="1"></circle>
                                                                        <circle cx="20" cy="21" r="1"></circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                                                    </svg>
                                                                </button>
                                                                <a href="javascript:void(0)"
                                                                   class="add-to-wish tooltip-top"
                                                                   data-tippy-content="Add to Wishlist"><i
                                                                        data-feather="heart"
                                                                        class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                   data-bs-target="#quick-view" class="tooltip-top"
                                                                   data-tippy-content="Quick View"><i
                                                                        data-feather="eye"></i></a>
                                                                <a href="compare.html" class="tooltip-top"
                                                                   data-tippy-content="Compare"><i
                                                                        data-feather="refresh-cw"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                    <img src="../assets/images/layout-2/media-banner/2.jpg"
                                                         class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                                    <p>usha table fan</p></a>
                                                                <h6>$52.05 <span>$60.21</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty"
                                                                        data-tippy-content="Add to cart">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none"
                                                                         stroke="currentColor" stroke-width="2"
                                                                         stroke-linecap="round" stroke-linejoin="round"
                                                                         class="feather feather-shopping-cart">
                                                                        <circle cx="9" cy="21" r="1"></circle>
                                                                        <circle cx="20" cy="21" r="1"></circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                                                    </svg>
                                                                </button>
                                                                <a href="javascript:void(0)"
                                                                   class="add-to-wish tooltip-top"
                                                                   data-tippy-content="Add to Wishlist"><i
                                                                        data-feather="heart"
                                                                        class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                   data-bs-target="#quick-view" class="tooltip-top"
                                                                   data-tippy-content="Quick View"><i
                                                                        data-feather="eye"></i></a>
                                                                <a href="compare.html" class="tooltip-top"
                                                                   data-tippy-content="Compare"><i
                                                                        data-feather="refresh-cw"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="media-banner plrb-0 b-g-white1 border-0">
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                    <img src="../assets/images/layout-2/media-banner/2.jpg"
                                                         class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                                    <p>usha table fan</p></a>
                                                                <h6>$52.05 <span>$60.21</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty"
                                                                        data-tippy-content="Add to cart">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none"
                                                                         stroke="currentColor" stroke-width="2"
                                                                         stroke-linecap="round" stroke-linejoin="round"
                                                                         class="feather feather-shopping-cart">
                                                                        <circle cx="9" cy="21" r="1"></circle>
                                                                        <circle cx="20" cy="21" r="1"></circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                                                    </svg>
                                                                </button>
                                                                <a href="javascript:void(0)"
                                                                   class="add-to-wish tooltip-top"
                                                                   data-tippy-content="Add to Wishlist"><i
                                                                        data-feather="heart"
                                                                        class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                   data-bs-target="#quick-view" class="tooltip-top"
                                                                   data-tippy-content="Quick View"><i
                                                                        data-feather="eye"></i></a>
                                                                <a href="compare.html" class="tooltip-top"
                                                                   data-tippy-content="Compare"><i
                                                                        data-feather="refresh-cw"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                    <img src="../assets/images/layout-2/media-banner/3.jpg"
                                                         class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                                    <p>sumsung galaxy</p></a>
                                                                <h6>$47.05 <span>$55.21</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty"
                                                                        data-tippy-content="Add to cart">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none"
                                                                         stroke="currentColor" stroke-width="2"
                                                                         stroke-linecap="round" stroke-linejoin="round"
                                                                         class="feather feather-shopping-cart">
                                                                        <circle cx="9" cy="21" r="1"></circle>
                                                                        <circle cx="20" cy="21" r="1"></circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                                                    </svg>
                                                                </button>
                                                                <a href="javascript:void(0)"
                                                                   class="add-to-wish tooltip-top"
                                                                   data-tippy-content="Add to Wishlist"><i
                                                                        data-feather="heart"
                                                                        class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                   data-bs-target="#quick-view" class="tooltip-top"
                                                                   data-tippy-content="Quick View"><i
                                                                        data-feather="eye"></i></a>
                                                                <a href="compare.html" class="tooltip-top"
                                                                   data-tippy-content="Compare"><i
                                                                        data-feather="refresh-cw"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                    <img src="../assets/images/layout-2/media-banner/1.jpg"
                                                         class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                                    <p>bajaj rex mixer</p></a>
                                                                <h6>$40.05 <span>$60.21</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty"
                                                                        data-tippy-content="Add to cart">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none"
                                                                         stroke="currentColor" stroke-width="2"
                                                                         stroke-linecap="round" stroke-linejoin="round"
                                                                         class="feather feather-shopping-cart">
                                                                        <circle cx="9" cy="21" r="1"></circle>
                                                                        <circle cx="20" cy="21" r="1"></circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                                                    </svg>
                                                                </button>
                                                                <a href="javascript:void(0)"
                                                                   class="add-to-wish tooltip-top"
                                                                   data-tippy-content="Add to Wishlist"><i
                                                                        data-feather="heart"
                                                                        class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                   data-bs-target="#quick-view" class="tooltip-top"
                                                                   data-tippy-content="Quick View"><i
                                                                        data-feather="eye"></i></a>
                                                                <a href="compare.html" class="tooltip-top"
                                                                   data-tippy-content="Compare"><i
                                                                        data-feather="refresh-cw"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="media-banner plrb-0 b-g-white1 border-0">
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                    <img src="../assets/images/layout-2/media-banner/1.jpg"
                                                         class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                                    <p>bajaj rex mixer</p></a>
                                                                <h6>$40.05 <span>$60.21</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty"
                                                                        data-tippy-content="Add to cart">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none"
                                                                         stroke="currentColor" stroke-width="2"
                                                                         stroke-linecap="round" stroke-linejoin="round"
                                                                         class="feather feather-shopping-cart">
                                                                        <circle cx="9" cy="21" r="1"></circle>
                                                                        <circle cx="20" cy="21" r="1"></circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                                                    </svg>
                                                                </button>
                                                                <a href="javascript:void(0)"
                                                                   class="add-to-wish tooltip-top"
                                                                   data-tippy-content="Add to Wishlist"><i
                                                                        data-feather="heart"
                                                                        class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                   data-bs-target="#quick-view" class="tooltip-top"
                                                                   data-tippy-content="Quick View"><i
                                                                        data-feather="eye"></i></a>
                                                                <a href="compare.html" class="tooltip-top"
                                                                   data-tippy-content="Compare"><i
                                                                        data-feather="refresh-cw"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                    <img src="../assets/images/layout-2/media-banner/2.jpg"
                                                         class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                                    <p>usha table fan</p></a>
                                                                <h6>$52.05 <span>$60.21</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty"
                                                                        data-tippy-content="Add to cart">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none"
                                                                         stroke="currentColor" stroke-width="2"
                                                                         stroke-linecap="round" stroke-linejoin="round"
                                                                         class="feather feather-shopping-cart">
                                                                        <circle cx="9" cy="21" r="1"></circle>
                                                                        <circle cx="20" cy="21" r="1"></circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                                                    </svg>
                                                                </button>
                                                                <a href="javascript:void(0)"
                                                                   class="add-to-wish tooltip-top"
                                                                   data-tippy-content="Add to Wishlist"><i
                                                                        data-feather="heart"
                                                                        class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                   data-bs-target="#quick-view" class="tooltip-top"
                                                                   data-tippy-content="Quick View"><i
                                                                        data-feather="eye"></i></a>
                                                                <a href="compare.html" class="tooltip-top"
                                                                   data-tippy-content="Compare"><i
                                                                        data-feather="refresh-cw"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                    <img src="../assets/images/layout-2/media-banner/3.jpg"
                                                         class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                                    <p>sumsung galaxy</p></a>
                                                                <h6>$47.05 <span>$55.21</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty"
                                                                        data-tippy-content="Add to cart">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none"
                                                                         stroke="currentColor" stroke-width="2"
                                                                         stroke-linecap="round" stroke-linejoin="round"
                                                                         class="feather feather-shopping-cart">
                                                                        <circle cx="9" cy="21" r="1"></circle>
                                                                        <circle cx="20" cy="21" r="1"></circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                                                    </svg>
                                                                </button>
                                                                <a href="javascript:void(0)"
                                                                   class="add-to-wish tooltip-top"
                                                                   data-tippy-content="Add to Wishlist"><i
                                                                        data-feather="heart"
                                                                        class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                   data-bs-target="#quick-view" class="tooltip-top"
                                                                   data-tippy-content="Quick View"><i
                                                                        data-feather="eye"></i></a>
                                                                <a href="compare.html" class="tooltip-top"
                                                                   data-tippy-content="Compare"><i
                                                                        data-feather="refresh-cw"></i></a>
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
                        <!-- side-bar single product slider end -->
                        <!-- side-bar banner start here -->
                        <div class="collection-sidebar-banner">
                            <a href="javascript:void(0)"><img src="../assets/images/category/side-banner.png"
                                                              class="img-fluid " alt=""></a>
                        </div>
                        <!-- side-bar banner end here -->

                    </div>
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="top-banner-wrapper">
                                        <a href="product-page(left-sidebar).html"><img
                                                src="{{asset("storage/$category->photo")}}" class="img-fluid "
                                                style="width: 100%"
                                                alt=""></a>
                                        <div class="top-banner-content small-section">
                                            <h4>{{$category->name}}</h4>
                                            <p>{{$category->description}}</p>
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
                                                @foreach($category->products as $item)
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


    <!-- edit product modal start-->
    <div class="modal fade bd-example-modal-lg theme-modal pro-edit-modal" id="edit-product" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="pro-group">
                        <div class="product-img">
                            <div class="media">
                                <div class="img-wraper">
                                    <a href="product-page(left-sidebar).html">
                                        <img
                                            src="https://scontent.fcai19-5.fna.fbcdn.net/v/t1.6435-9/221046624_339219811194444_8245226825655684326_n.jpg?_nc_cat=108&ccb=1-3&_nc_sid=8bfeb9&_nc_ohc=HmdaXfXJhmIAX_Gjb5R&_nc_ht=scontent.fcai19-5.fna&oh=2758314954ed3aaa896999c0a5a0d885&oe=60FE07AF"
                                            alt="">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="product-page(left-sidebar).html">
                                        <h3>redmi not 3</h3>
                                    </a>
                                    <h6>$80<span>$120</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pro-group">
                        <h6 class="product-title">Select Size</h6>
                        <div class="size-box">
                            <ul>
                                <li><a href="javascript:void(0)">s</a></li>
                                <li><a href="javascript:void(0)">m</a></li>
                                <li><a href="javascript:void(0)">l</a></li>
                                <li><a href="javascript:void(0)">xl</a></li>
                                <li><a href="javascript:void(0)">2xl</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="pro-group">
                        <h6 class="product-title">Select color</h6>
                        <div class="color-selector inline">
                            <ul>
                                <li>
                                    <div class="color-1 active"></div>
                                </li>
                                <li>
                                    <div class="color-2"></div>
                                </li>
                                <li>
                                    <div class="color-3"></div>
                                </li>
                                <li>
                                    <div class="color-4"></div>
                                </li>
                                <li>
                                    <div class="color-5"></div>
                                </li>
                                <li>
                                    <div class="color-6"></div>
                                </li>
                                <li>
                                    <div class="color-7"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pro-group">
                        <h6 class="product-title">Quantity</h6>
                        <div class="qty-box">
                            <div class="input-group">
                                <button class="qty-minus"></button>
                                <input class="qty-adj form-control" type="number" value="1"/>
                                <button class="qty-plus"></button>
                            </div>
                        </div>
                    </div>
                    <div class="pro-group mb-0">
                        <div class="modal-btn">
                            <a href="cart.html" class="btn btn-solid btn-sm">
                                add to cart
                            </a>
                            <a href="product-page(left-sidebar).html" class="btn btn-solid btn-sm">
                                more detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- edit product modal end-->



    <!-- wishlistbar bar -->
    <div id="wishlist_side" class="add_to_cart right ">
        <a href="javascript:void(0)" class="overlay" onclick="closeWishlist()"></a>
        <div class="cart-inner">
            <div class="cart_top">
                <h3>my wishlist</h3>
                <div class="close-cart">
                    <a href="javascript:void(0)" onclick="closeWishlist()">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="cart_media">
                <ul class="cart_product">
                    <li>
                        <div class="media">
                            <a href="product-page(left-sidebar).html">
                                <img alt="megastore1" class="me-3" src="../assets/images/layout-2/product/1.jpg">
                            </a>
                            <div class="media-body">
                                <a href="product-page(left-sidebar).html">
                                    <h4>redmi not 3</h4>
                                </a>
                                <h6>
                                    $80.00 <span>$120.00</span>
                                </h6>
                                <div class="addit-box">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus"></button>
                                            <input class="qty-adj form-control" type="number" value="1"/>
                                            <button class="qty-plus"></button>
                                        </div>
                                    </div>
                                    <div class="pro-add">
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                           data-bs-target="#edit-product">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i data-feather="trash-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="media">
                            <a href="product-page(left-sidebar).html">
                                <img alt="megastore1" class="me-3" src="../assets/images/layout-2/product/2.jpg">
                            </a>
                            <div class="media-body">
                                <a href="product-page(left-sidebar).html">
                                    <h4>Double Door Refrigerator</h4>
                                </a>
                                <h6>
                                    $80.00 <span>$120.00</span>
                                </h6>
                                <div class="addit-box">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus"></button>
                                            <input class="qty-adj form-control" type="number" value="1"/>
                                            <button class="qty-plus"></button>
                                        </div>
                                    </div>
                                    <div class="pro-add">
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                           data-bs-target="#edit-product">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i data-feather="trash-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="media">
                            <a href="product-page(left-sidebar).html">
                                <img alt="megastore1" class="me-3" src="../assets/images/layout-2/product/3.jpg">
                            </a>
                            <div class="media-body">
                                <a href="product-page(left-sidebar).html">
                                    <h4>woman hande bag</h4>
                                </a>
                                <h6>
                                    $80.00 <span>$120.00</span>
                                </h6>
                                <div class="addit-box">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus"></button>
                                            <input class="qty-adj form-control" type="number" value="1"/>
                                            <button class="qty-plus"></button>
                                        </div>
                                    </div>
                                    <div class="pro-add">
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                           data-bs-target="#edit-product">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i data-feather="trash-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="cart_total">
                    <li>
                        subtotal : <span>$1050.00</span>
                    </li>
                    <li>
                        shpping <span>free</span>
                    </li>
                    <li>
                        taxes <span>$0.00</span>
                    </li>
                    <li>
                        <div class="total">
                            total<span>$1050.00</span>
                        </div>
                    </li>
                    <li>
                        <div class="buttons">
                            <a href="wishlist.html" class="btn btn-solid btn-block btn-md">view wislist</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- wishlistbar bar end-->

    <!-- My account bar start-->
    <div id="myAccount" class="add_to_cart right account-bar">
        <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
        <div class="cart-inner">
            <div class="cart_top">
                <h3>my account</h3>
                <div class="close-cart">
                    <a href="javascript:void(0)" onclick="closeAccount()">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <form class="theme-form">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label for="review">Password</label>
                    <input type="password" class="form-control" id="review" placeholder="Enter your password"
                           required="">
                </div>
                <div class="form-group">
                    <a href="javascript:void(0)" class="btn btn-solid btn-md btn-block ">Login</a>
                </div>
                <div class="accout-fwd">
                    <a href="forget-pwd.html" class="d-block"><h5>forget password?</h5></a>
                    <a href="register.html" class="d-block"><h6>you have no account ?<span>signup now</span></h6></a>
                </div>
            </form>
        </div>
    </div>
    <!-- Add to account bar end-->

    <!-- add to  setting bar  start-->
    <div id="mySetting" class="add_to_cart right">
        <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
        <div class="cart-inner">
            <div class="cart_top">
                <h3>my setting</h3>
                <div class="close-cart">
                    <a href="javascript:void(0)" onclick="closeSetting()">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="setting-block">
                <div class="form-group">
                    <select>
                        <option value="">language</option>
                        <option value="">english</option>

                    </select>
                </div>
                <div class="form-group">
                    <select>
                        <option value="">currency</option>
                        <option value="">uro</option>
                        <option value="">ruppees</option>
                        <option value="">piund</option>
                        <option value="">doller</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
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
