@extends('layouts.frontend')
@section('extra-css')
    <style>
        /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
        .StripeElement {
            background-color: white;
            height: 40px;
            padding: 10px 12px;
            border-radius: 4px;
            border: 1px solid transparent;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
    <!-- easy-responsive-tabs -->
    <link rel="stylesheet" href="{{asset('css/creditly.css')}}" type="text/css" media="all"/>
@endsection


@section('content')

    <!-- checkout start -->
    <section class="checkout-second section-big-py-space b-g-light">
        <div class="custom-container" id="grad1">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class=" checkout-box">
                        <div class="checkout-header">
                            <h2>chekout your product</h2>
                            <h4>Fill all form field to go to next step</h4>
                        </div>
                        <div class="checkout-body ">
                            <form class="checkout-form" action="{{route('checkout.store')}}">
                                <!-- chek menu bar -->
                                <ul class="menu-bar">
                                    <li class="active" id="account">
                                        <div class="icon">
                                            <svg viewBox="-64 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="m336 192h-16v-64c0-70.59375-57.40625-128-128-128s-128 57.40625-128 128v64h-16c-26.453125 0-48 21.523438-48 48v224c0 26.476562 21.546875 48 48 48h288c26.453125 0 48-21.523438 48-48v-224c0-26.476562-21.546875-48-48-48zm-229.332031-64c0-47.0625 38.269531-85.332031 85.332031-85.332031s85.332031 38.269531 85.332031 85.332031v64h-170.664062zm0 0"/>
                                            </svg>
                                        </div>

                                        Billing Information
                                    </li>
                                    <li id="personal">
                                        <div class="icon">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                                 xml:space="preserve"><g>
                                                    <g>
                                                        <path
                                                            d="M255.999,0c-74.443,0-135,60.557-135,135s60.557,135,135,135s135-60.557,135-135S330.442,0,255.999,0z"/>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M478.48,398.68C438.124,338.138,370.579,302,297.835,302h-83.672c-72.744,0-140.288,36.138-180.644,96.68l-2.52,3.779V512h450h0.001V402.459L478.48,398.68z"/>
                                                    </g>
                                                </g></svg>
                                        </div>
                                        Shipping
                                    </li>
                                    <li id="payment">
                                        <div class="icon">
                                            <svg enable-background="new 0 0 512 512" viewBox="0 0 512 512"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path
                                                        d="m512 163v-27c0-30.928-25.072-56-56-56h-400c-30.928 0-56 25.072-56 56v27c0 2.761 2.239 5 5 5h502c2.761 0 5-2.239 5-5z"/>
                                                    <path
                                                        d="m0 205v171c0 30.928 25.072 56 56 56h400c30.928 0 56-25.072 56-56v-171c0-2.761-2.239-5-5-5h-502c-2.761 0-5 2.239-5 5zm128 131c0 8.836-7.164 16-16 16h-16c-8.836 0-16-7.164-16-16v-16c0-8.836 7.164-16 16-16h16c8.836 0 16 7.164 16 16z"/>
                                                </g>
                                            </svg>
                                        </div>

                                        Payment
                                    </li>
                                    <li id="confirm">
                                        <div class="icon">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 width="352.62px" height="352.62px" viewBox="0 0 352.62 352.62"
                                                 style="enable-background:new 0 0 352.62 352.62;" xml:space="preserve"><g>
                                                    <path
                                                        d="M337.222,22.952c-15.912-8.568-33.66,7.956-44.064,17.748c-23.867,23.256-44.063,50.184-66.708,74.664c-25.092,26.928-48.348,53.856-74.052,80.173c-14.688,14.688-30.6,30.6-40.392,48.96c-22.032-21.421-41.004-44.677-65.484-63.648c-17.748-13.464-47.124-23.256-46.512,9.18c1.224,42.229,38.556,87.517,66.096,116.28c11.628,12.24,26.928,25.092,44.676,25.704c21.42,1.224,43.452-24.48,56.304-38.556c22.645-24.48,41.005-52.021,61.812-77.112c26.928-33.048,54.468-65.485,80.784-99.145C326.206,96.392,378.226,44.983,337.222,22.952z M26.937,187.581c-0.612,0-1.224,0-2.448,0.611c-2.448-0.611-4.284-1.224-6.732-2.448l0,0C19.593,184.52,22.653,185.132,26.937,187.581z"/>
                                                </g></svg>
                                        </div>

                                        Finish
                                    </li>
                                </ul>

                                <!-- chekout information -->
                                <div class="checkout-fr-box">
                                    <div class="form-card">
                                        <h3 class="form-title">Billing Information</h3>
                                        <div class="form-group">
                                            <input type="email" name="billing_email" placeholder="billing_email"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="billing_name" placeholder="billing_name"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="billing_address" placeholder="billing_address"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="billing_city" placeholder="billing_city"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="billing_province" placeholder="billing_province"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="billing_postalcode"
                                                   placeholder="billing_postalcode" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="pwd" placeholder="Password"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="billing_phone" placeholder="billing_phone"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <button type="button" name="next" class=" btn btn-normal next action-button">next
                                    </button>
                                </div>
                                <!-- Shipping methods -->
                                <div class="checkout-fr-box">
                                    <div class="form-card">
                                        <h3 class="form-title">Shipping Methods</h3>

                                        <table class="table">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th class="jsgrid-header-cell"> Shipping Address</th>
                                                <th class="jsgrid-header-cell"> Delivery Time</th>
                                                <th class="jsgrid-header-cell"> Delivery Charge</th>
                                                <th class="jsgrid-header-cell"> choose</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($shipping_methods as $method)
                                            <tr>
                                                <th scope="row">{{$method->shipping_address}}</th>
                                                <th scope="row">{{$method->delivery_time}}</th>
                                                <th scope="row">{{$method->delivery_charge}}</th>
                                                <th scope="row"><input type="radio" name="shipping_method" value="{{$method->id}}"></th>
                                            </tr>
                                            @empty
                                                <div class="alert btn btn-outline-danger">Sorry, There is not shipping methods avaliable</div>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="button" name="previous" class="previous btn btn-normal ">previous
                                    </button>
                                    <button type="button" name="next" class=" btn btn-normal next action-button">next
                                    </button>
                                </div>
                                <!-- Payment methods -->
                                <div class="checkout-fr-box">
                                    <div class="form-card">
                                        <h3 class="form-title">Payment Information</h3>
                                        <ul class="payment-info">
                                            <li>
                                                <img src="{{asset('/images/checkout/payment-mathod/1.png')}}" alt=""
                                                     class="payment-mathod">
                                            </li>
                                            <li>
                                                <img src="{{asset('images/checkout/payment-mathod/2.png')}}" alt=""
                                                     class="payment-mathod">
                                            </li>
                                            <li>
                                                <img src="{{asset('images/checkout/payment-mathod/3.png')}}" alt=""
                                                     class="payment-mathod">
                                            </li>
                                            <li>
                                                <img src="{{asset('images/checkout/payment-mathod/4.png')}}" alt=""
                                                     class="payment-mathod">
                                            </li>
                                        </ul>


                                        <div class="controls">
                                            <label class="control-label">Name on Card</label>
                                            <input class="billing-address-name form-control" type="text" name="name_on_card"
                                                   placeholder="John Smith">
                                        </div>
                                        <label for="card-element">
                                            Credit or debit card
                                        </label>
                                        <div id="card-element">
                                            <div class="credit-card-wrapper">
                                                <div class="first-row form-group"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" name="previous" class="previous btn btn-normal ">previous
                                    </button>
                                    <button type="button" name="next" class=" btn btn-normal next action-button">next
                                    </button>
                                </div>

                                <div class="checkout-fr-box">
                                    <div class="form-card">
                                        <div class="payment-success">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 344.963 344.963"
                                                 style="enable-background:new 0 0 344.963 344.963;"
                                                 xml:space="preserve"><g>
                                                    <path
                                                        d="M321.847,86.242l-40.026-23.11l-23.104-40.02h-46.213l-40.026-23.11l-40.026,23.11H86.239l-23.11,40.026L23.11,86.242v46.213L0,172.481l23.11,40.026v46.213l40.026,23.11l23.11,40.026h46.213l40.02,23.104l40.026-23.11h46.213l23.11-40.026l40.026-23.11v-46.213l23.11-40.026l-23.11-40.026V86.242H321.847z M156.911,243.075c-3.216,3.216-7.453,4.779-11.671,4.72c-4.219,0.06-8.455-1.504-11.671-4.72l-50.444-50.444c-6.319-6.319-6.319-16.57,0-22.889l13.354-13.354c6.319-6.319,16.57-6.319,22.889,0l25.872,25.872l80.344-80.35c6.319-6.319,16.57-6.319,22.889,0l13.354,13.354c6.319,6.319,6.319,16.57,0,22.889L156.911,243.075z"/>
                                                </g></svg>
                                            <h2>payment successful !</h2>
                                        </div>
                                        <button type="button" name="previous" class="previous btn btn-normal ">previous
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- checkout end -->

@endsection
@section('extra-js')

    <!-- Checkout js-->
    <script src="{{asset('js/checkout.js')}}"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <!-- range sldier -->
    <script src="{{asset('/js/ion.rangeSlider.js')}}"></script>
    <script src="{{asset('/js/rangeslidermain.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>

        // Create a Stripe client.
        var stripe = Stripe('pk_test_w9RckSgb0LVeeOCHeRT1aZ9S');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function (event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });


        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>
@endsection
