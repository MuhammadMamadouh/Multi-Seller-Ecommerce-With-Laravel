<div class="col-lg-3">
    <div class="account-sidebar"><a class="popup-btn">my account</a></div>
    <div class="dashboard-left">
        <div class="collection-mobile-back">
            <span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span>
        </div>

        @php
            $cols = [
                'dashboard'         => route('user.dashboard'),
                'orders'            => route('user.orders'),
                'wishlist'          => route('user.wishlist'),
                'Edit Information'  => route('user.edit-info')
                  ]
        @endphp
        <div class="block-content ">
            <ul>
                @foreach($cols as $col => $link)
                    <li class="{{$col === $route_name ? 'active' : ''}}"><a
                            href="{{$link}}">{{__('titles.' . $col)}}</a></li>
                @endforeach
                <li class="last"><a href="javascript:void(0)">Log Out</a></li>
            </ul>
        </div>
    </div>
</div>
