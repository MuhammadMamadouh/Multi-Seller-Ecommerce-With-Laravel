<section class="section-big-pt-space ratio_asos b-g-light">
    <div class="collection-wrapper">
        <div class="custom-container">
                <div class="row">
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
                                                                class="fa fa-filter"
                                                                aria-hidden="true"></i> Filter</span></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="product-filter-content">
                                                        <div class="search-count">
                                                            <input class="form-control" wire:model="searchTerm">
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
                                                @foreach($products as $item)
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
                                                        {{$products->appends($_GET)->links('vendor.pagination.bootstrap-4')}}
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <div class="product-search-count-bottom">
                                                            <h5>{{ucwords(__('titles.showing_results'))}} {{($products->firstItem())}}
                                                                - {{($products->lastItem())}} {{__('titles.of')}} {{($products->total())}}</h5>
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
