@extends('auth.auth-layout')
@section('content')
    <div class="card-body">
        @include('Admin.layouts.components.alert.success')
        @include('Admin.layouts.components.alert.error')
        @if(session()->has('status'))
            <div class="alert alert-danger">
                {{session()->get('status')}}
            </div>
        @endif
        <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">

            <!-- ======== Normal User ===== -->
            <li class="nav-item">
                <a class="nav-link active" id="top-profile-tab" data-bs-toggle="tab"
                   href="#top-profile" role="tab" aria-controls="top-profile"
                   aria-selected="true"><span class="icon-user me-2"></span>{{__('titles.reset password')}}</a>
            </li>

        </ul>
        <div class="tab-content" id="top-tabContent">

            <!-- ================================= Normal User ======================================== -->
            <div class="tab-pane fade show active" id="top-profile" role="tabpanel"
                 aria-labelledby="top-profile-tab">
                <form class="form-horizontal auth-form" method="post"
                      action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <input required="" name="email" type="email" class="form-control"
                               placeholder="Email" id="exampleInputEmail1">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-button">
                        <button class="btn btn-primary" type="submit">{{ __('Email Password Reset Link') }}</button>
                    </div>
                </form>
            </div>


        </div>
@endsection
