@extends('auth.auth-layout')
@section('content')

    <div class="card-body">
        @if(session()->has('errors'))
            <div class="alert alert-danger">
                {{session()->get('errors')}}
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif
        @if(session()->has('status'))
            <div class="alert alert-danger">
                {{session()->get('status')}}
            </div>
        @endif
        <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">

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
                      action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="form-group">
                        <label for="password_confirmation">{{__('Email')}}</label>
                        <input required="" name="email" type="email" class="form-control"
                               placeholder="Email" id="exampleInputEmail1">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">{{__('password')}}</label>
                        <input required="" name="password" type="password" class="form-control"
                               placeholder="password" id="exampleInputEmail1">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input required="" name="password_confirmation" type="password" class="form-control"
                              id="exampleInputEmail1">
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>

                    <div class="form-button">
                        <button class="btn btn-primary" type="submit"> {{ __('Reset Password') }}</button>
                    </div>
                </form>
            </div>


        </div>
    </div>

    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
                </a>
            </x-slot>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')"/>

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                             :value="old('email', $request->email)" required autofocus/>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')"/>

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required/>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')"/>

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                             type="password"
                             name="password_confirmation" required/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Reset Password') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>

@endsection
