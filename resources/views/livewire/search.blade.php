<section class="section-big-pt-space ratio_asos b-g-light">
    <div class="collection-wrapper">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-3 collection-filter category-page-side">

                    <!-- side-bar colleps block stat -->
                    <div class="collection-filter-block creative-card creative-inner category-side">
                        <!-- brand filter start -->
                        <div class="collection-mobile-back">
                                <span class="filter-back">
                                    <i class="fa fa-angle-left" aria-hidden="true"></i> back</span>
                        </div>
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
                                            <input type="radio" wire:model="main_category"
                                                   class="custom-control-input form-check-input maincat"
                                                   id="" value="{{$category->slug}}"
                                                   name="main_category"
                                                   {{--                                                       onchange="this.form.submit(); "--}}
                                                   wire:onchange="mainCategoryChanged"
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


                            <!-- price filter start here -->
                            <div class="collection-collapse-block border-0 open">
                                <h3 class="collapse-block-title">price</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="filter-slide">
                                        <input class="js-range-slider" type="text" name="my_range"
                                               value="{{$products->min('price') . '-' . $products->max('price')}}"
                                               onchange="this.form.submit()"
                                               data-type="double"/>
                                    </div>
                                </div>
                            </div>
                        @endisset
                    </div>
                    <!-- side-bar banner start here -->
                    <div class="collection-sidebar-banner">
                        <a href="javascript:void(0)">
                            <img src="{{asset('images/category/side-banner.png')}}" class="img-fluid " alt="">
                        </a>
                    </div>
                    <!-- side-bar banner end here -->
                </div>
                <input class="form-control" wire:model="searchTerm">

                <!-- ================== Products ================== -->
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="collection-product-wrapper">
                                    <div class="product-top-filter">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="filter-main-btn"><span class="filter-btn  "><i
                                                            class="fa fa-filter" aria-hidden="true"></i> Filter</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="product-filter-content">
                                                    <div class="search-count">
                                                        <h5>
                                                            <input type="search" class="form-control"
                                                                   placeholder="Search a Product"
                                                                   wire:model="searchaTerm">
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
                                    @foreach($products as $item)
                                        <div class="col-xl-3 col-md-4 col-6  col-grid-box">
                                            @include('components.product.index-product')
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
</section>
