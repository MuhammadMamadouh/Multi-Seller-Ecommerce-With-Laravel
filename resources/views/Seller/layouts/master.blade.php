<!DOCTYPE html>
<html lang="en">
@include('Seller.layouts.components.head')
<body>
<!-- page-wrapper Start-->
<div class="page-wrapper">
    <!-- Page Header Start-->
@include('Seller.layouts.components.header')
<!-- Page Header Ends -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
    @include('Seller.layouts.components.page-sidebar')
    <!-- Page Sidebar Ends-->
        <!-- Right sidebar Start-->
        <div class="right-sidebar custom-scrollbar" id="right_side_bar">
            <div>
                <div class="container p-0">
                    <div class="modal-header p-l-20 p-r-20">
                        <div class="col-sm-8 p-0">
                            <h6 class="modal-title font-weight-bold">FRIEND LIST</h6>
                        </div>
                        <div class="col-sm-4 text-end p-0"><i class="me-2" data-feather="settings"></i></div>
                    </div>
                </div>
                <div class="friend-list-search mt-0">
                    <input type="text" placeholder="search friend"><i class="fa fa-search"></i>
                </div>
                <div class="p-l-30 p-r-30">
                    <div class="chat-box">
                        <div class="people-list friend-list">
                            <ul class="list">
                                <li class="clearfix"><img class="rounded-circle user-image"
                                                          src="{{{asset('/images/user/user.png')}}}" alt="">
                                    <div class="status-circle online"></div>
                                    <div class="about">
                                        <div class="name">Vincent Porter</div>
                                        <div class="status"> Online</div>
                                    </div>
                                </li>
                                <li class="clearfix"><img class="rounded-circle user-image"
                                                          src="{{{asset('/images/user/user1.jpg')}}}" alt="">
                                    <div class="status-circle away"></div>
                                    <div class="about">
                                        <div class="name">Ain Chavez</div>
                                        <div class="status"> 28 minutes ago</div>
                                    </div>
                                </li>
                                <li class="clearfix"><img class="rounded-circle user-image"
                                                          src="{{{asset('/images/user/user2.jpg')}}}" alt="">
                                    <div class="status-circle online"></div>
                                    <div class="about">
                                        <div class="name">Kori Thomas</div>
                                        <div class="status"> Online</div>
                                    </div>
                                </li>
                                <li class="clearfix"><img class="rounded-circle user-image"
                                                          src="{{{asset('/images/user/user3.jpg')}}}" alt="">
                                    <div class="status-circle online"></div>
                                    <div class="about">
                                        <div class="name">Erica Hughes</div>
                                        <div class="status"> Online</div>
                                    </div>
                                </li>
                                <li class="clearfix"><img class="rounded-circle user-image"
                                                          src="{{{asset('/images/user/man.png')}}}" alt="">
                                    <div class="status-circle offline"></div>
                                    <div class="about">
                                        <div class="name">Ginger Johnston</div>
                                        <div class="status"> 2 minutes ago</div>
                                    </div>
                                </li>
                                <li class="clearfix"><img class="rounded-circle user-image"
                                                          src="{{{asset('/images/user/user5.jpg')}}}" alt="">
                                    <div class="status-circle away"></div>
                                    <div class="about">
                                        <div class="name">Prasanth Anand</div>
                                        <div class="status"> 2 hour ago</div>
                                    </div>
                                </li>
                                <li class="clearfix"><img class="rounded-circle user-image"
                                                          src="{{{asset('/images/user/designer.jpg')}}}" alt="">
                                    <div class="status-circle online"></div>
                                    <div class="about">
                                        <div class="name">Hileri Jecno</div>
                                        <div class="status"> Online</div>
                                    </div>
                                </li>
                                <li class="clearfix"><img class="rounded-circle user-image"
                                                          src="{{{asset('/images/user/user3.jpg')}}}" alt="">
                                    <div class="status-circle online"></div>
                                    <div class="about">
                                        <div class="name">Erica Hughes</div>
                                        <div class="status"> Online</div>
                                    </div>
                                </li>
                                <li class="clearfix"><img class="rounded-circle user-image"
                                                          src="{{{asset('/images/user/man.png')}}}" alt="">
                                    <div class="status-circle offline"></div>
                                    <div class="about">
                                        <div class="name">Ginger Johnston</div>
                                        <div class="status"> 2 minutes ago</div>
                                    </div>
                                </li>
                                <li class="clearfix"><img class="rounded-circle user-image"
                                                          src="{{{asset('/images/user/user5.jpg')}}}" alt="">
                                    <div class="status-circle away"></div>
                                    <div class="about">
                                        <div class="name">Prasanth Anand</div>
                                        <div class="status"> 2 hour ago</div>
                                    </div>
                                </li>
                                <li class="clearfix"><img class="rounded-circle user-image"
                                                          src="{{{asset('/images/user/user3.jpg')}}}" alt="">
                                    <div class="status-circle online"></div>
                                    <div class="about">
                                        <div class="name">Erica Hughes</div>
                                        <div class="status"> Online</div>
                                    </div>
                                </li>
                                <li class="clearfix"><img class="rounded-circle user-image"
                                                          src="{{{asset('/images/user/man.png')}}}" alt="">
                                    <div class="status-circle offline"></div>
                                    <div class="about">
                                        <div class="name">Ginger Johnston</div>
                                        <div class="status"> 2 minutes ago</div>
                                    </div>
                                </li>
                                <li class="clearfix"><img class="rounded-circle user-image"
                                                          src="{{{asset('/images/user/user5.jpg')}}}" alt="">
                                    <div class="status-circle away"></div>
                                    <div class="about">
                                        <div class="name">Prasanth Anand</div>
                                        <div class="status"> 2 hour ago</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right sidebar Ends-->

        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>@yield('title')
                                    <small>@yield('small-title')</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-3 pull-right" id="alertSpace">
                            <div class="">
                                @include('Seller.layouts.components.alert.success')
                                @include('Seller.layouts.components.alert.error')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">

                <div class="row">
                    @yield('content')
                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
    @include('Seller.layouts.components.footer')
    <!-- footer end-->
    </div>

</div>
@include('Seller.layouts.components.scripts')
@livewireScripts
</body>
</html>
