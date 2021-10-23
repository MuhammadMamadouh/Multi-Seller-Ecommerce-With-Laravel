@extends('layouts.frontend')
@section('extra-css')
    <!-- App css-->
{{--    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">--}}
@endsection
@section('content')
{{--{{dd(auth('seller')->user())}}--}}
    <!--section start-->
    <section class="login-page section-big-py-space b-g-light">
        <div class="custom-container">
            <div class="row col-md-12">
                <div class="col-xl-4 col-lg-5 col-md-6 offset-xl-4 offset-lg-4 offset-md-4">

                    <div class="col-md-12 p-0 card-right">
                        <div class="card tab2-card">
                            <div class="card-header">
                                <h2>Login</h2>
                            </div>

                            <div class="card-body">
                                @include('Admin.layouts.components.alert.success')
                                @include('Admin.layouts.components.alert.error')
                                <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="top-profile-tab" data-bs-toggle="tab"
                                           href="#top-profile" role="tab" aria-controls="top-profile"
                                           aria-selected="true"><span class="icon-user me-2"></span>user</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-top-tab" data-bs-toggle="tab"
                                           href="#top-contact"
                                           role="tab" aria-controls="top-contact" aria-selected="false"><span
                                                class="icon-unlock me-2"></span>Seller</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="top-tabContent">

                                    <div class="tab-pane fade show active" id="top-profile" role="tabpanel"
                                         aria-labelledby="top-profile-tab">
                                        <form class="form-horizontal auth-form" method="post"
                                              action="{{route('login')}}">
                                            @csrf
                                            <div class="form-group">
                                                <input required="" name="email" type="email" class="form-control"
                                                       placeholder="Email" id="exampleInputEmail1">
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <input required="" name="password" type="password"
                                                       class="form-control" placeholder="Password">
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-terms">
                                                <div class="custom-control custom-checkbox mr-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input custom-control-input"
                                                               type="checkbox"
                                                               value="" id="customControlAutosizing">
                                                        <label class="form-check-label" for="customControlAutosizing">Remember
                                                            me</label>
                                                    </div>
                                                    <a href="javascript:void(0)" class="btn btn-default forgot-pass">lost
                                                        your password</a>
                                                </div>
                                            </div>
                                            <div class="form-button">
                                                <button class="btn btn-primary" type="submit">Login as User</button>
                                            </div>
                                            <div class="form-footer">
                                                <span>Or Login up with social platforms</span>
                                                <ul class="social">
                                                    <li><a class="icon-facebook" href=""></a></li>
                                                    <li><a class="icon-twitter" href=""></a></li>
                                                    <li><a class="icon-instagram" href=""></a></li>
                                                    <li><a class="icon-pinterest" href=""></a></li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="top-contact" role="tabpanel"
                                         aria-labelledby="contact-top-tab">
                                        <form class="form-horizontal auth-form" method="post"
                                              action="{{route('seller.login')}}">
                                            @csrf
                                            <div class="form-group">
                                                <input required="" name="email" type="email" class="form-control"
                                                       placeholder="Email" id="exampleInputEmail1">
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <input required="" name="password" type="password"
                                                       class="form-control" placeholder="Password">
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-terms">
                                                <div class="custom-control custom-checkbox mr-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input custom-control-input"
                                                               type="checkbox"
                                                               value="" id="customControlAutosizing">
                                                        <label class="form-check-label" for="customControlAutosizing">Remember
                                                            me</label>
                                                    </div>
                                                    <a href="javascript:void(0)" class="btn btn-default forgot-pass">lost
                                                        your password</a>
                                                </div>
                                            </div>
                                            <div class="form-button">
                                                <button class="btn btn-primary" type="submit">Login as seller</button>
                                            </div>
                                            <div class="form-footer">
                                                <span>Or Login up with social platforms</span>
                                                <ul class="social">
                                                    <li class="m-xl-0 mr-3 rounded-circle border-secondary"><a href=""><i class="fa fa-2x  icon-facebook"></i></a></li>
                                                    <li><a class="fa fa-2x icon-twitter" href=""></a></li>
                                                    <li><a class="fa fa-2x icon-instagram" href=""></a></li>
                                                    <li><a class="fa fa-2x icon-pinterest" href=""></a></li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection
