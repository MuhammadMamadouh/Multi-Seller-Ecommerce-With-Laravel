@extends('layouts.frontend')

@section('title', __('titles.checkout'))
@section('content')


    <!--order tracking start-->
    <section class="order-tracking section-big-my-space  ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    @if(\Cart::getContent()->count() > 0)
                        <div id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active">
                                    <div class="icon">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                             xml:space="preserve"> <g>
                                                <g>
                                                    <path
                                                        d="M482,181h-31v-45c0-37.026-27.039-67.672-62.366-73.722C382.791,44.2,365.999,31,346,31H166 c-19.999,0-36.791,13.2-42.634,31.278C88.039,68.328,61,98.974,61,136v45H30c-16.569,0-30,13.431-30,30c0,16.567,13.431,30,30,30 h452c16.569,0,30-13.433,30-30C512,194.431,498.569,181,482,181z M421,181H91v-45c0-20.744,14.178-38.077,33.303-43.264 C130.965,109.268,147.109,121,166,121h180c18.891,0,35.035-11.732,41.697-28.264C406.822,97.923,421,115.256,421,136V181z"/>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M33.027,271l24.809,170.596C60.648,464.066,79.838,481,102.484,481h307.031c22.647,0,41.837-16.934,44.605-39.111 L478.973,271H33.027z M151,406c0,8.291-6.709,15-15,15s-15-6.709-15-15v-90c0-8.291,6.709-15,15-15s15,6.709,15,15V406z M211,406 c0,8.291-6.709,15-15,15s-15-6.709-15-15v-90c0-8.291,6.709-15,15-15s15,6.709,15,15V406z M271,406c0,8.291-6.709,15-15,15 c-8.291,0-15-6.709-15-15v-90c0-8.291,6.709-15,15-15s15,6.709,15,15V406z M331,406c0,8.291-6.709,15-15,15 c-8.291,0-15-6.709-15-15v-90c0-8.291,6.709-15,15-15c8.291,0,15,6.709,15,15V406z M391,406c0,8.291-6.709,15-15,15 c-8.291,0-15-6.709-15-15v-90c0-8.291,6.709-15,15-15c8.291,0,15,6.709,15,15V406z"/>
                                                </g>
                                            </g> </svg>
                                    </div>
                                    <span>{{__('titles.information')}}</span>
                                </li>
                                <li>
                                    <div class="icon">
                                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                            <g id="_01-home" data-name="01-home">
                                                <g id="glyph">
                                                    <path
                                                        d="m256 4c-108.075 0-196 87.925-196 196 0 52.5 31.807 119.92 94.537 200.378a1065.816 1065.816 0 0 0 93.169 104.294 12 12 0 0 0 16.588 0 1065.816 1065.816 0 0 0 93.169-104.294c62.73-80.458 94.537-147.878 94.537-200.378 0-108.075-87.925-196-196-196zm0 336c-77.2 0-140-62.8-140-140s62.8-140 140-140 140 62.8 140 140-62.8 140-140 140z"/>
                                                    <path
                                                        d="m352.072 183.121-88-80a12 12 0 0 0 -16.144 0l-88 80a12.006 12.006 0 0 0 -2.23 15.039 12.331 12.331 0 0 0 10.66 5.84h11.642v76a12 12 0 0 0 12 12h28a12 12 0 0 0 12-12v-44a12 12 0 0 1 12-12h24a12 12 0 0 1 12 12v44a12 12 0 0 0 12 12h28a12 12 0 0 0 12-12v-76h11.642a12.331 12.331 0 0 0 10.66-5.84 12.006 12.006 0 0 0 -2.23-15.039z"/>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <span>{{__('titles.address')}}</span>
                                </li>
                                <li>
                                    <div class="icon text-white">
                                        <i class="fa fa-truck fa-2x"></i>
                                    </div>
                                    <span>{{__('titles.shipping')}}</span>
                                </li>
                                <li>
                                    <div class="icon">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                             xml:space="preserve"> <g>
                                                <g>
                                                    <path
                                                        d="M224,159.992v-32H32c-17.632,0-32,14.368-32,32v64h230.752C226.304,204.44,224,183.384,224,159.992z"/>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M510.688,287.992c-21.824,33.632-55.104,62.24-102.784,89.632c-7.328,4.192-15.584,6.368-23.904,6.368 s-16.576-2.176-23.808-6.304c-47.68-27.456-80.96-56.096-102.816-89.696H0v160c0,17.664,14.368,32,32,32h448 c17.664,0,32-14.336,32-32v-160H510.688z M144,383.992H80c-8.832,0-16-7.168-16-16c0-8.832,7.168-16,16-16h64 c8.832,0,16,7.168,16,16C160,376.824,152.832,383.992,144,383.992z"/>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M502.304,81.304l-112-48c-4.064-1.728-8.576-1.728-12.64,0l-112,48C259.808,83.8,256,89.592,256,95.992v64 c0,88.032,32.544,139.488,120.032,189.888c2.464,1.408,5.216,2.112,7.968,2.112s5.504-0.704,7.968-2.112 C479.456,299.608,512,248.152,512,159.992v-64C512,89.592,508.192,83.8,502.304,81.304z M444.512,154.008l-64,80 c-3.072,3.776-7.68,5.984-12.512,5.984c-0.224,0-0.48,0-0.672,0c-5.088-0.224-9.792-2.848-12.64-7.104l-32-48 c-4.896-7.36-2.912-17.28,4.448-22.176c7.296-4.864,17.248-2.944,22.176,4.448l19.872,29.792l50.304-62.912 c5.536-6.88,15.616-7.968,22.496-2.496C448.896,137.016,449.984,147.096,444.512,154.008z"/>
                                                </g>
                                            </g> </svg>
                                    </div>
                                    <span>{{__('titles.payment_methods')}}</span>
                                </li>
                            </ul>
                            <form class="checkout-form" action="{{route('placeOrder')}}" method="post"
                                  id="payment-form">
                            @csrf
                            <!-- =============================== Products Information ========================================== -->
                                <fieldset>
                                    <div class="container p-0">
                                        <div class="row shpping-block">
                                            <div class="col-lg-8">
                                                <div class="order-tracking-contain order-tracking-box">

                                                    <div class="tracking-group pb-0">
                                                        <h4 class="tracking-title">{{__('titles.shopping cart')}}</h4>
                                                        <ul class="may-product">
                                                            @forelse(\Cart::getContent() as $item)
                                                                <li>
                                                                    <div class="media">
                                                                        <img
                                                                            src="{{asset("storage/" . json_decode($item->associatedModel->images)[0])}}"
                                                                            class="img-fluid" alt="">
                                                                        <div class="media-body">
                                                                            <h3>{{$item->name}}</h3>
                                                                            <h4>{{$item->getPriceSum()}}</h4>
                                                                            <h6>{{__('titles.quantity')}}</h6>
                                                                            <div class="qty-box">
                                                                                <div class="input-group">
                                                                                    <input class="qty-adj form-control"
                                                                                           type="number" disabled
                                                                                           value="{{$item->quantity}}">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="pro-add">
{{--                                                                            <a href="javascript:void(0)"--}}
{{--                                                                               class="tooltip-top"--}}
{{--                                                                               data-tippy-content="Move to wish list">--}}
{{--                                                                                <i data-feather="heart"></i>--}}
{{--                                                                            </a>--}}
{{--                                                                            <form--}}
{{--                                                                                action="{{route('cart.destroy', $item->id)}}"--}}
{{--                                                                                method="post">--}}
{{--                                                                                @method('DELETE') @csrf--}}
{{--                                                                                <button type="submit" class="btn icon"--}}
{{--                                                                                        onclick="this.form.submit()">--}}
{{--                                                                                    <i class="ti-close"></i></button>--}}
{{--                                                                                <a href="javascript:void(0)"--}}
{{--                                                                                   onclick="this.form.submit()"--}}
{{--                                                                                   class="tooltip-top"--}}
{{--                                                                                   data-tippy-content="Remove product">--}}
{{--                                                                                    <i data-feather="trash-2"></i>--}}
{{--                                                                                </a>--}}
{{--                                                                            </form>--}}

                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @empty
                                                                No Items
                                                            @endforelse
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="order-tracking-sidebar order-tracking-box">
                                                    <ul class="cart_total">
                                                        <li>
                                                            {{__('titles.sub_total_price')}}  : <span>${{\Cart::getSubTotal()}}</span>
                                                        </li>
                                                        @foreach(\Cart::getConditions() as $condition)
                                                            <li>
                                                                {{__('titles.'.$condition->getName())}}
                                                                <span>{{$condition->getValue() }}</span>  {{$condition->getName() == 'coupon' ? '( '. __('titles.'.$condition->getType()) . ' )' : ''}}
                                                            </li>
                                                        @endforeach

                                                        <li>
                                                            <div class="total">
                                                                {{__('titles.total_price')}} <span>${{\Cart::getTotal()}}</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)"
                                       class="next action-button btn btn-solid btn-sm">{{__('btns.next')}}</a>
                                </fieldset>

                                <!-- =============================== Billing Information ========================================== -->
                                <fieldset>
                                    <div class="container p-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="order-address order-tracking-box">

                                                    <h4 class="tracking-title">{{__('titles.contact details')}}</h4>
                                                    <div class="form-group">
                                                        <input type="email" name="billing_email"
                                                               placeholder="{{__('validation.attributes.email')}}"
                                                               class="form-control">
                                                        <input type="text" name="billing_name"
                                                               placeholder="{{__('validation.attributes.name')}}"
                                                               class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="text" name="billing_address"
                                                               placeholder="{{__('validation.attributes.address')}}"
                                                               class="form-control">
                                                        <input type="text" name="billing_city"
                                                               placeholder="{{__('validation.attributes.city')}}"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="billing_province"
                                                               placeholder="{{__('validation.attributes.province')}}"
                                                               class="form-control">
                                                        <input type="text" name="billing_postalcode"
                                                               placeholder="{{__('validation.attributes.postalcode')}}" class="form-control">
                                                        <input type="text" name="billing_phone"
                                                               placeholder="{{__('validation.attributes.phone')}}"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)"
                                       class="btn btn-solid btn-sm previous action-button-previous">{{__('btns.previous')}}</a>
                                    <a href="javascript:void(0)"
                                       class="btn btn-solid btn-sm next action-button">{{__('btns.next')}}</a>

                                </fieldset>
                                <!-- =============================== Shipment Information ========================================== -->
                                <fieldset>
                                    <div class="container p-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="order-address order-tracking-box">
                                                    <h4 class="tracking-title">{{__('titles.shipping')}}</h4>
                                                    @if(count($shipping_methods) > 0)
                                                        <table class="table">
                                                            <thead class="thead-dark">
                                                            <tr>
                                                                <th class="jsgrid-header-cell"> {{__('titles.name')}}</th>
                                                                <th class="jsgrid-header-cell"> {{__('validation.attributes.delivery_time')}}</th>
                                                                <th class="jsgrid-header-cell"> {{__('validation.attributes.delivery_charge')}}</th>
                                                                <th class="jsgrid-header-cell"> {{__('titles.choose')}}</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($shipping_methods as $method)
                                                                <tr>
                                                                    <th scope="row">{{$method->name}}</th>
                                                                    <th scope="row">{{$method->delivery_time}}</th>
                                                                    <th scope="row">{{$method->delivery_charge}}</th>
                                                                    <th scope="row">
                                                                        <input type="radio" name="delivery_charge"
                                                                               value="{{$method->delivery_charge}}">
                                                                    </th>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <div class="alert btn btn-outline-danger">
                                                            {{__('messages.no_shipment_methods')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)"
                                       class="btn btn-solid btn-sm previous action-button-previous">{{__('btns.previous')}}</a>
                                    <a href="javascript:void(0)"
                                       class="btn btn-solid btn-sm next action-button">{{__('btns.next')}}</a>
                                </fieldset>
                                <!-- =============================== Payment Process InFormation ========================================== -->
                                <fieldset>
                                    <div class="container p-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="order-payment order-tracking-box">
                                                    <h4 class="tracking-title">{{__('titles.payment method')}}</h4>
                                                    <div class="accordion theme-accordion" id="accordionExample">
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <button class="btn btn-link collapsed payment-toggle"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseOne">
                                                                    {{__('titles.debit card')}}
                                                                    <input type="radio" name="payment_method" value="debit_card">
                                                                </button>
                                                            </div>
                                                            <div class="controls form-group">

                                                                <input class="billing-address-name form-control"
                                                                       type="text" name="name_on_card"
                                                                       placeholder="Name on Card">
                                                            </div>
                                                            <label for="card-element">
                                                                Credit or debit card
                                                            </label>
                                                            <div id="card-element">
                                                                <div class="credit-card-wrapper">
                                                                    <div class="first-row form-group"></div>
                                                                </div>
                                                            </div>
                                                            <div id="card-errors" class="text-danger"></div>
                                                        </div>
                                                        <!-- =========== Cash On Delivery ============== -->
                                                        <div class="card">
                                                            <div class="card-header" id="headingFour">
                                                                <button class="btn btn-link collapsed payment-toggle"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseFour"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseFour">
                                                                    {{__('titles.cash on delivery')}}
                                                                    <input class="" type="radio" name="payment_method" value="cod">
                                                                </button>
                                                            </div>
                                                            <div id="collapseFour" class="collapse paymant-collapce "
                                                                 aria-labelledby="headingFour"
                                                                 data-parent="#accordionExample" style="">
{{--                                                                <div class="cash-pay">--}}
{{--                                                                    <span class="successmessage">Hurray! Your have successfully entered the captcha.</span>--}}
{{--                                                                    <input type="text" class="form-control entercaptcha"--}}
{{--                                                                           placeholder="Enter Captcha">--}}
{{--                                                                    <span class="errorcaptcha"></span>--}}
{{--                                                                    <div class="captchabox">--}}
{{--                                                                        <div class="captchaimagecode">--}}
{{--                                                                            <canvas id="CapCode" class="capcode"--}}
{{--                                                                                    width="300"--}}
{{--                                                                                    height="80"></canvas>--}}
{{--                                                                        </div>--}}
{{--                                                                        <a href="javascript:void(0)"--}}
{{--                                                                           class="reloadbtncapcha"--}}
{{--                                                                           onclick="CreateCaptcha();">--}}
{{--                                                                            <svg version="1.1"--}}
{{--                                                                                 xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"--}}
{{--                                                                                 x="0px" y="0px" viewBox="0 0 512 512"--}}
{{--                                                                                 style="enable-background:new 0 0 512 512;"--}}
{{--                                                                                 xml:space="preserve">--}}
{{--                            <g>--}}
{{--                                <g>--}}
{{--                                    <path d="M446.709,166.059c-4.698-7.51-14.73-9.243-21.724-4.043l-48.677,36.519c-6.094,4.585-7.793,13.023-3.926,19.6--}}
{{--                                        C384.73,239.156,391,261.656,391,285.02C391,359.464,330.443,422,256,422s-135-62.536-135-136.98--}}
{{--                                        c0-69.375,52.588-126.68,120-134.165v44.165c0,12.434,14.266,19.357,23.994,11.997l120-90c8.006-5.989,7.994-18.014,0-23.994--}}
{{--                                        l-120-90C255.231-4.37,241,2.626,241,15.02v45.498C123.9,68.267,31,166.001,31,285.02C31,409.093,131.928,512,256,512--}}
{{--                                        s225-102.907,225-226.98C481,243.038,469.135,201.905,446.709,166.059z"></path>--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                        </svg>--}}
{{--                                                                        </a>--}}
{{--                                                                    </div>--}}
{{--                                                                    <a href="javascript:void(0)"--}}
{{--                                                                       class="btn btn-solid btn-sm btnSubmit"--}}
{{--                                                                       onclick="CheckCaptcha();">place order</a>--}}
{{--                                                                </div>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)"
                                       class="btn btn-solid btn-sm previous action-button-previous">{{__('btns.previous')}}</a>
                                    <button class="btn btn-solid btn-sm" type="submit">{{__('btns.place order')}}</button>
                                </fieldset>

                            </form>
                        </div>
                    @else
                        <div class="alert alert-danger">

                            <button class="btn btn-outline-danger-2x">{{__('messages.no_item')}}</button>
                            <div class="col-12">
                                <a href="{{route('shop.index')}}"
                                   class="btn btn-normal">{{__('btns.continue shopping')}}</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--order tracking end-->
    {{--    <!-- checkout end -->--}}

@endsection
@section('extra-js')

{{--    <script src="{{asset('js/captcha.js')}}"></script>--}}
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{asset('js/stripe.js')}}"></script>

    <script src="{{asset('js/order-tracking.js')}}"></script>

    <!-- range sldier -->
    <script src="{{asset('/js/ion.rangeSlider.js')}}"></script>
    <script src="{{asset('/js/rangeslidermain.js')}}"></script>

@endsection
