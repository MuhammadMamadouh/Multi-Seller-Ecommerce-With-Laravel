@extends('Admin.layouts.master')
@section('title', $title)
@section('content')


    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
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
                                @forelse($items as $order)
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
                            <a href="{{route('seller.orders.index')}}" class="btn btn-primary">{{__('btns.show more')}}</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

@endsection
