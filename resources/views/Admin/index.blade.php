@extends('Admin.layouts.master')
@section('title', $title)
@section('content')

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden  widget-cards">
                    <div class="bg-secondary card-body">
                        <div class="media static-top-widget">
                            <div class="media-body"><span class="m-0">Products</span>
                                <h3 class="mb-0">$ <span class="counter">9856</span><small> This Month</small></h3>
                            </div>
                            <div class="icons-widgets">
                                <i data-feather="box"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="bg-primary card-body">
                        <div class="media static-top-widget">
                            <div class="media-body"><span class="m-0">Messages</span>
                                <h3 class="mb-0">$ <span class="counter">893</span><small> This Month</small></h3>
                            </div>
                            <div class="icons-widgets">
                                <i data-feather="message-square"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="bg-warning card-body">
                        <div class="media static-top-widget">
                            <div class="media-body"><span class="m-0">Earnings</span>
                                <h3 class="mb-0">$ <span class="counter">6659</span><small> This Month</small></h3>
                            </div>
                            <div class="icons-widgets">
                                <i data-feather="navigation"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="bg-success card-body">
                        <div class="media static-top-widget">
                            <div class="media-body"><span class="m-0">New Vendors</span>
                                <h3 class="mb-0">$ <span class="counter">45631</span><small> This Month</small></h3>
                            </div>
                            <div class="icons-widgets">
                                <i data-feather="users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-12 xl-100">
                <div class="card">
                    <div class="card-header">
                        <h5>{{__('titles.Latest Orders')}}</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="icofont icofont-simple-left"></i></li>
                                <li><i class="view-html fa fa-code"></i></li>
                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                <li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="user-status table-responsive latest-order-table">
                            <table class="table table-bordernone">
                                <thead>
                                <tr>
                                    <th scope="col">{{__('titles.order id')}}</th>
                                    <th scope="col">{{__('titles.name')}}</th>
                                    <th scope="col">{{__('titles.total')}}</th>
                                    <th scope="col">{{__('titles.payment method')}}</th>
                                    <th scope="col">{{__('titles.payment status')}}</th>
                                    <th scope="col">{{__('titles.status')}}</th>
                                    <th scope="col">{{__('titles.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td class="digits">{{$order->billing_name}}</td>
                                        <td class="digits">{{number_format($order->billing_subtotal)}}</td>
                                        <td class="font-danger">
                                            <span class="badge badge-primary">
                                                {{$order->payment_gateway}}
                                            </span>
                                        </td>
                                        <td class="font-danger">
                                             <span class="badge
                                                @if($order->payment_status == 'paid') badge-success
                                                @elseif($order->payment_status == 'unpaid') badge-danger
                                                @endif
                                                 ">

                                            {{$order->payment_status}}
                                             </span>
                                        </td>

                                        <td class="digits">
                                         <span class="badge
                                            @if($order->condition == 'pending') badge-primary
                                            @elseif($order->condition == 'processing') badge-info
                                            @elseif($order->condition == 'complete') badge-success
                                            @elseif($order->condition == 'cancelled') badge-danger
                                            @endif
                                             ">
                                            {{$order->condition}}
                                        </span>
                                        </td>

                                    </tr>
                                @empty
                                    <div>
                                        <button
                                            class="btn btn-outline-danger-2x">{{__('titles.No Orders Yet')}}</button>
                                    </div>
                                @endforelse

                                </tbody>
                            </table>
                            <a href="order.html" class="btn btn-primary">View All Orders</a>
                        </div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1"
                                    title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card btn-months">
                    <div class="card-header">
                        <h5>Buy / Sell</h5>
                        <div class="dashboard-btn-groups">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-outline-light btn-js1" type="button">Day</button>
                                <button class="btn btn-outline-light btn-js1" type="button">Week</button>
                                <button class="btn btn-outline-light btn-js1 active" type="button">Month</button>
                            </div>
                        </div>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="icofont icofont-simple-left"></i></li>
                                <li><i class="view-html fa fa-code"></i></li>
                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                <li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body sell-graph">
                        <div class="flot-chart-placeholder" id="multiple-real-timeupdate"></div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head3"
                                    title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i>
                            </button>
                            <pre class=" language-html"><code class=" language-html" id="example-head3">&lt;div class="card-body sell-graph"&gt;
   &lt;canvas id="myGraph"&gt;&lt;/canvas&gt;
&lt;/div&gt;</code></pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 xl-50">
                <div class="card customers-card">
                    <div class="card-header">
                        <h5>New Customers</h5>
                        <div class="chart-value-box pull-right">
                            <div class="value-square-box-secondary"></div>
                            <span class="f-12 f-w-600">Customers</span>
                        </div>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="icofont icofont-simple-left"></i></li>
                                <li><i class="view-html fa fa-code"></i></li>
                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                <li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="apex-chart-container">
                            <div id="customers"></div>
                        </div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head7"
                                    title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i>
                            </button>
                            <pre class=" language-html"><code class=" language-html" id="example-head7">
&lt;div id="customers"&gt;&lt;/div&gt;
                                    </code></pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 xl-50">
                <div class="card height-equal">
                    <div class="card-header">
                        <h5>Empolyee Status</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="icofont icofont-simple-left"></i></li>
                                <li><i class="view-html fa fa-code"></i></li>
                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                <li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="user-status table-responsive products-table">
                            <table class="table table-bordernone mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Skill Level</th>
                                    <th scope="col">Experience</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="bd-t-none u-s-tb">
                                        <div class="align-middle image-sm-size"><img
                                                class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded"
                                                src="../assets/images/dashboard/user2.jpg" alt="" data-original-title=""
                                                title="">
                                            <div class="d-inline-block">
                                                <h6>John Deo <span class="text-muted digits">(14+ Online)</span></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Designer</td>
                                    <td>
                                        <div class="progress-showcase">
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                     style="width: 30%" aria-valuenow="50" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="digits">2 Year</td>
                                </tr>
                                <tr>
                                    <td class="bd-t-none u-s-tb">
                                        <div class="align-middle image-sm-size"><img
                                                class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded"
                                                src="../assets/images/dashboard/man.png" alt="" data-original-title=""
                                                title="">
                                            <div class="d-inline-block">
                                                <h6>Mohsib lara<span class="text-muted digits">(99+ Online)</span></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Tester</td>
                                    <td>
                                        <div class="progress-showcase">
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                     style="width: 60%" aria-valuenow="50" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="digits">5 Month</td>
                                </tr>
                                <tr>
                                    <td class="bd-t-none u-s-tb">
                                        <div class="align-middle image-sm-size"><img
                                                class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded"
                                                src="../assets/images/dashboard/user.png" alt="" data-original-title=""
                                                title="">
                                            <div class="d-inline-block">
                                                <h6>Hileri Soli <span class="text-muted digits">(150+ Online)</span>
                                                </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Designer</td>
                                    <td>
                                        <div class="progress-showcase">
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-secondary" role="progressbar"
                                                     style="width: 30%" aria-valuenow="50" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="digits">3 Month</td>
                                </tr>
                                <tr>
                                    <td class="bd-t-none u-s-tb">
                                        <div class="align-middle image-sm-size"><img
                                                class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded"
                                                src="../assets/images/dashboard/designer.jpg" alt=""
                                                data-original-title="" title="">
                                            <div class="d-inline-block">
                                                <h6>Pusiz bia <span class="text-muted digits">(14+ Online)</span></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Designer</td>
                                    <td>
                                        <div class="progress-showcase">
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                     style="width: 90%" aria-valuenow="50" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="digits">5 Year</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head5"
                                    title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i>
                            </button>
                            <pre class=" language-html"><code class=" language-html" id="example-head5">
&lt;div class="user-status table-responsive products-table"&gt;
    &lt;table class="table table-bordernone mb-0"&gt;
        &lt;thead&gt;
            &lt;tr&gt;
                &lt;th scope="col"&gt;Name&lt;/th&gt;
                &lt;th scope="col"&gt;Designation&lt;/th&gt;
                &lt;th scope="col"&gt;Skill Level&lt;/th&gt;
                &lt;th scope="col"&gt;Experience&lt;/th&gt;
            &lt;/tr&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
                &lt;tr&gt;
                    &lt;td class="bd-t-none u-s-tb"&gt;
                        &lt;div class="align-middle image-sm-size"&gt;&lt;img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/user2.jpg" alt="" data-original-title="" title=""&gt;
                        &lt;div class="d-inline-block"&gt;
                        &lt;h6&gt;John Deo &lt;span class="text-muted digits"&gt;(14+ Online)&lt;/span&gt;&lt;/h6&gt;
                        &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/td&gt;
                    &lt;td&gt;Designer&lt;/td&gt;
                    &lt;td&gt;
                        &lt;div class="progress-showcase"&gt;
                        &lt;div class="progress" style="height: 8px;"&gt;
                        &lt;div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                        &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/td&gt;
                    &lt;td class="digits"&gt;2 Year&lt;/td&gt;
                &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td class="bd-t-none u-s-tb"&gt;
                    &lt;div class="align-middle image-sm-size"&gt;&lt;img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/man.png" alt="" data-original-title="" title=""&gt;
                    &lt;div class="d-inline-block"&gt;
                    &lt;h6&gt;Mohsib lara&lt;span class="text-muted digits"&gt;(99+ Online)&lt;/span&gt;&lt;/h6&gt;
                    &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
                &lt;td&gt;Tester&lt;/td&gt;
                &lt;td&gt;
                    &lt;div class="progress-showcase"&gt;
                    &lt;div class="progress" style="height: 8px;"&gt;
                    &lt;div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                    &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
                &lt;td class="digits"&gt;5 Month&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td class="bd-t-none u-s-tb"&gt;
                    &lt;div class="align-middle image-sm-size"&gt;&lt;img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/user.png" alt="" data-original-title="" title=""&gt;
                    &lt;div class="d-inline-block"&gt;
                    &lt;h6&gt;Hileri Soli &lt;span class="text-muted digits"&gt;(150+ Online)&lt;/span&gt;&lt;/h6&gt;
                    &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
                &lt;td&gt;Designer&lt;/td&gt;
                &lt;td&gt;
                    &lt;div class="progress-showcase"&gt;
                    &lt;div class="progress" style="height: 8px;"&gt;
                    &lt;div class="progress-bar bg-secondary" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                    &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
                &lt;td class="digits"&gt;3 Month&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td class="bd-t-none u-s-tb"&gt;
                    &lt;div class="align-middle image-sm-size"&gt;&lt;img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/designer.jpg" alt="" data-original-title="" title=""&gt;
                    &lt;div class="d-inline-block"&gt;
                    &lt;h6&gt;Pusiz bia &lt;span class="text-muted digits"&gt;(14+ Online)&lt;/span&gt;&lt;/h6&gt;
                    &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
                &lt;td&gt;Designer&lt;/td&gt;
                &lt;td&gt;
                    &lt;div class="progress-showcase"&gt;
                    &lt;div class="progress" style="height: 8px;"&gt;
                    &lt;div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                    &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
                &lt;td class="digits"&gt;5 Year&lt;/td&gt;
            &lt;/tr&gt;
        &lt;/tbody&gt;
    &lt;/table&gt;
&lt;/div&gt;
                                    </code></pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Top Selling Country</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="icofont icofont-simple-left"></i></li>
                                <li><i class="view-html fa fa-code"></i></li>
                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                <li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="jvector-map-height" id="world"></div>
                            </div>
                            <div class="col-xl-4">
                                <div class="table-responsive map-table">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th>Country</th>
                                            <th>2018</th>
                                            <th>2019</th>
                                            <th>Change</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Bhopal</td>
                                            <td>1,048</td>
                                            <td>2,213</td>
                                            <td>6.8%</td>
                                        </tr>
                                        <tr>
                                            <td>Saudi Arbia</td>
                                            <td>576</td>
                                            <td>1,297</td>
                                            <td>4.3%</td>
                                        </tr>
                                        <tr>
                                            <td>Kazakstan</td>
                                            <td>879</td>
                                            <td>1,985</td>
                                            <td>7.0%</td>
                                        </tr>
                                        <tr>
                                            <td>Canada</td>
                                            <td>1,871</td>
                                            <td>2,546</td>
                                            <td>6.2%</td>
                                        </tr>
                                        <tr>
                                            <td>Brazil</td>
                                            <td>957</td>
                                            <td>1,975</td>
                                            <td>5.6%</td>
                                        </tr>
                                        <tr>
                                            <td>Russia</td>
                                            <td>1,480</td>
                                            <td>1,631</td>
                                            <td>8.7%</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-hea6"
                                    title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i>
                            </button>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Container-fluid Ends-->

@endsection
