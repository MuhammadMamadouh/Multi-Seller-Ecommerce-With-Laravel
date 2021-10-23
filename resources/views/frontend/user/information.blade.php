@extends('layouts.frontend')
@section('extra-css')
    @livewireStyles
@endsection
@section('content')
<!-- section start -->
<section class="section-big-py-space b-g-light">
    <div class="container">
        <div class="row">
            @include('frontend.user.left-bar', ['route_name' => 'dashboard'])
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="box-account box-info">

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Contact Information</h3>
                                            <a href="{{route('user.edit-info')}}">Edit</a>
                                        </div>
                                        <div class="box-content">
                                            <h6>{{auth('web')->user()->name}}</h6>
                                            <h6>{{auth('web')->user()->email}}</h6>
{{--                                            <h6><a href="javascript:void(0)">Change Password</a></h6>--}}
                                        </div>
                                    </div>
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>{{__('titles.address')}}</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h5>Default Billing Address</h5>
                                                <address>{{auth('web')->user()->address}}.<br></address></div>
{{--                                            <div class="col-sm-6">--}}
{{--                                                <h6>Default Shipping Address</h6><address>You have not set a default shipping address.<br><a href="javascript:void(0)">Edit Address</a></address></div>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
{{--                                    <div class="box">--}}
{{--                                        <div class="box-title">--}}
{{--                                            <h3>Newsletters</h3><a href="javascript:void(0)">Edit</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="box-content">--}}
{{--                                          --}}
{{--                                        </div>--}}
                                        <img class="img-thumbnail" src="{{asset('storage/' . auth('web')->user()->photo)}}">
{{--                                    </div>--}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->
@endsection
