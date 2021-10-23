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
