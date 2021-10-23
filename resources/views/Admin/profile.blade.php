@extends('Admin.layouts.master')
@section('title', $title)
@section('content')

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-details text-center">
                            <img src="{{asset('storage/' . auth('admin')->user()->photo)}}" alt=""
                                 class="img-fluid img-90 rounded-circle blur-up lazyloaded">
                            <h5 class="f-w-600 mb-0">{{auth('admin')->user()->name}}</h5>
                            <span>{{auth('admin')->user()->email}}</span>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card tab2-card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="top-profile-tab" data-bs-toggle="tab"
                                                    href="#top-profile" role="tab" aria-controls="top-profile"
                                                    aria-selected="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-user me-2">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    Profile</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab"
                                                    href="#top-contact" role="tab" aria-controls="top-contact"
                                                    aria-selected="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-settings me-2">
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <path
                                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                    </svg>
                                    Edit</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="top-tabContent">
                            <div class="tab-pane fade active show" id="top-profile" role="tabpanel"
                                 aria-labelledby="top-profile-tab">
                                <h5 class="f-w-600">Profile</h5>
                                <div class="table-responsive profile-table">
                                    <table class="table table-responsive">
                                        <tbody>
                                        <tr>
                                            <td>{{__('validation.attributes.name')}}:</td>
                                            <td>{{auth('admin')->user()->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('validation.attributes.email')}}:</td>
                                            <td>{{auth('admin')->user()->email}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="top-contact" role="tabpanel"
                                 aria-labelledby="contact-top-tab">
                                <div class="account-setting">
                                    <div class="row">
                                        <div class="col">
                                            <form method="post" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <table class="table table-responsive">
                                                    <tbody>
                                                    <tr>
                                                        <td>{{__('validation.attributes.name')}}:</td>
                                                        <td><input class="form-control" type="text" name="name" value="{{auth('admin')->user()->name}}" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('validation.attributes.email')}}:</td>
                                                        <td><input class="form-control" type="email" name="email"  value="{{auth('admin')->user()->email}}" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('validation.attributes.photo')}}:</td>
                                                        <td><input class="form-control" type="file" name="photo"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <button type="submit" class="btn btn-outline-primary">{{__('btns.save')}}</button>
                                            </form>
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
    <!-- Container-fluid Ends-->

@endsection
