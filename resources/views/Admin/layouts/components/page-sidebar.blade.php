@auth('admin')
<div class="page-sidebar">
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle lazyloaded blur-up"
                      src="{{{asset('storage/' . auth('admin')->user()->photo)}}}" alt="#">
            </div>
            <h6 class="mt-3 f-14">{{auth('admin')->user()->name}}</h6>
            <p>Admin</p>
        </div>

        <ul class="sidebar-menu">
            <li><a class="sidebar-header" href="{{route('admin.index')}}"><i
                        data-feather="home"></i><span>{{__('general.user')}}</span></a></li>
            <li><a class="sidebar-header" href="{{route('admin.profile')}}"><i
                        data-feather="home"></i><span>{{__('titles.profile')}}</span></a></li>

            <!-- ======================== Main Categories ====================== ------->
            <li><a class="sidebar-header" href=""><i
                        data-feather="tag"></i><span>{{__('titles.main_categories' )}}</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{route('main_categories.index')}}"><i class="fa fa-circle"></i>{{__('general.all')}}</a></li>
                    <li><a href="{{route('main_categories.create')}}"><i class="fa fa-circle"></i>{{__('general.create new')}}</a>
                    </li>
                </ul>
            </li>
            <!-- ======================== Products ====================== ------->
            <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>{{__('titles.products')}}</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{route('products.index')}}"><i class="fa fa-circle"></i>{{__('general.all')}}
                        </a></li>
                    <li><a href="{{route('products.create')}}"><i
                                class="fa fa-circle"></i>{{__('general.create new')}}</a></li>
                </ul>
            </li>
  <!-- ======================== Products Attributes====================== ------->
            <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>{{__('titles.attributes')}}</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{route('attributes.index')}}"><i class="fa fa-circle"></i>{{__('general.all')}}
                        </a></li>
                    <li><a href="{{route('attributes.create')}}"><i
                                class="fa fa-circle"></i>{{__('general.create new')}}</a></li>
                </ul>
            </li>
            <!-- ======================== Shipping Companies ====================== ------->
            <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>{{__('titles.shipping companies')}}</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{route('shippings.index')}}"><i class="fa fa-circle"></i>{{__('general.all')}}
                        </a></li>
                    <li><a href="{{route('shippings.create')}}"><i
                                class="fa fa-circle"></i>{{__('general.create new')}}</a></li>
                </ul>
            </li>

            <!-- ======================== Brands ====================== ------->
            <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>{{__('titles.brands' )}}</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{route('brands.index')}}"><i class="fa fa-circle"></i>{{__('general.all')}}</a></li>
                    <li><a href="{{route('brands.create')}}"><i class="fa fa-circle"></i>{{__('general.create new')}} </a></li>
                </ul>
            </li>
            <!-- ======================== languages ====================== ------->
            <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>{{__('titles.languages')}}</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{route('languages.index')}}"><i class="fa fa-circle"></i>{{__('general.all')}}</a></li>
                    <li><a href="{{route('languages.create')}}"><i class="fa fa-circle"></i>{{__('general.create new')}} </a></li>
                </ul>
            </li>
            <!-- ======================== banners ====================== ------->
            <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>{{__('titles.banners')}}</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{route('banners.index')}}"><i class="fa fa-circle"></i>{{__('general.all')}}</a></li>
                    <li><a href="{{route('banners.create')}}"><i class="fa fa-circle"></i>{{__('general.create new')}} </a></li>
                </ul>
            </li>
            <!-- ======================== vendors ====================== ------->
            <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>{{__('titles.vendors')}}</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{route('vendors.index')}}"><i class="fa fa-circle"></i>{{__('general.all')}}
                        </a></li>
                    <li><a href="{{route('vendors.create')}}"><i
                                class="fa fa-circle"></i>{{__('general.create new')}}</a></li>
                </ul>
            </li>

            <!-- ======================== Colors ====================== ------->
          <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>{{__('titles.colors')}}</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{route('colors.index')}}"><i class="fa fa-circle"></i>{{__('general.all')}}
                        </a></li>
                    <li><a href="{{route('colors.create')}}"><i
                                class="fa fa-circle"></i>{{__('general.create new')}}</a></li>
                </ul>
            </li>
            <!-- ======================== Sizes ====================== ------->
          <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>{{__('titles.sizes')}}</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{route('sizes.index')}}"><i class="fa fa-circle"></i>{{__('general.all')}}
                        </a></li>
                    <li><a href="{{route('sizes.create')}}"><i
                                class="fa fa-circle"></i>{{__('general.create new')}}</a></li>
                </ul>
            </li>
            <!-- ======================== Coupons ====================== ------->
            <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>{{__('titles.coupons')}}</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{route('coupons.index')}}"><i class="fa fa-circle"></i>{{__('general.all')}}</a></li>
                    <li><a href="{{route('coupons.create')}}"><i class="fa fa-circle"></i>{{__('general.create new')}}</a></li>
                </ul>
            </li>


            <li><a class="sidebar-header" href=""><i data-feather="dollar-sign"></i><span>{{__('titles.sales')}}</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{route('orders.index')}}"><i class="fa fa-circle"></i>{{__('titles.orders')}}</a></li>
                    <li><a href="transactions.html"><i class="fa fa-circle"></i>Transactions</a></li>
                </ul>
            </li>

            <!-- ================================== Settings Controller ======================================== -->
            <li>
                <a class="sidebar-header" href="{{route('settings.index')}}"><i data-feather="settings"></i>
                    <span>{{__('titles.settings')}}</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf

                        <a class="sidebar-header" href="{{route('admin.logout')}}" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                            <i data-feather="log-in"></i><span>{{ __('Log Out') }}</span>
                        </a>

                </form>
{{--                <a class="sidebar-header" href="login.html"><i data-feather="log-in"></i><span>{{__('auth.logout')}}</span></a>--}}
            </li>
        </ul>
    </div>
</div>
@elseauth('seller')
    <div class="page-sidebar">
        <div class="sidebar custom-scrollbar">
            <div class="sidebar-user text-center">
                <div><img class="img-60 rounded-circle lazyloaded blur-up" src="{{{asset('storage/' . auth('seller')->user()->photo)}}}"
                          alt="#">
                </div>
                <h6 class="mt-3 f-14">{{auth('seller')->user()->name}}</h6>
                <p>{{__('titles.seller')}}</p>
            </div>

            <ul class="sidebar-menu">
                <li><a class="sidebar-header" href="{{route('seller.dashboard')}}"><i
                            data-feather="home"></i><span>{{__('general.user')}}</span></a></li>



                <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>{{__('titles.products')}}</span><i
                            class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{route('seller-products.index')}}"><i class="fa fa-circle"></i>{{__('general.all')}}
                            </a></li>
                        <li><a href="{{route('seller-products.create')}}"><i
                                    class="fa fa-circle"></i>{{__('general.create new')}}</a></li>
                    </ul>
                </li>


                <li><a class="sidebar-header" href="{{route('seller.profile')}}"><i
                            data-feather="profile"></i><span>{{__('titles.profile')}}</span></a></li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a class="sidebar-header" href="{{route('seller.logout')}}" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                            <i data-feather="log-in"></i><span>{{ __('Log Out') }}</span>
                        </a>

                    </form>
                    {{--                <a class="sidebar-header" href="login.html"><i data-feather="log-in"></i><span>{{__('auth.logout')}}</span></a>--}}
                </li>
            </ul>
        </div>
    </div>
@endauth
