<div class="page-main-header">
    <div class="main-header-left">
        <div class="logo-wrapper"><a href="{{url('/')}}"><img class="blur-up lazyloaded" src="{{{asset('/images/layout-2/logo/logo.png')}}}" alt=""></a></div>
    </div>
    <div class="main-header-right ">
        <div class="mobile-sidebar">
            <div class="media-body text-end switch-sm">
                <label class="switch">
                    <input id="sidebar-toggle" type="checkbox" checked="checked"><span class="switch-state"></span>
                </label>
            </div>
        </div>
        <div class="nav-right col">
            <ul class="nav-menus">
                <li></li>
                <li class="onhover-dropdown"><a class="txt-dark" href="javascript:void(0)">
                        <h6>  {{getDefaultLang()->name}}</h6></a>
                    <ul class="language-dropdown onhover-show-div p-20">
                        @foreach(\App\Models\Language::active()->get() as $lang)
                        <li><a href="{{route('admin_lang.change', $lang->id)}}" data-lng="pt"><i class="flag-icon"></i> {{$lang->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                <li class="onhover-dropdown">
                    <div class="media align-items-center">
                        <img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded" src="{{{asset('storage/' . auth()->user()->photo)}}}" alt="header-user">
                        <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                        <li><a href="javascript:void(0)">Profile<span class="pull-right"><i data-feather="user"></i></span></a></li>
                        <li><a href="javascript:void(0)">Inbox<span class="pull-right"><i data-feather="mail"></i></span></a></li>
                        <li><a href="javascript:void(0)">Taskboard<span class="pull-right"><i data-feather="file-text"></i></span></a></li>
                        <li><a href="javascript:void(0)">Settings<span class="pull-right"><i data-feather="settings"></i></span></a></li>
                    </ul>
                </li>
            </ul>
            <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
        </div>
    </div>
</div>
