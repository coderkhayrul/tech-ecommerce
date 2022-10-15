@extends('layouts.app')

@section('content')
    @php
        $setting = DB::table('settings')->first();
        $charge = $setting->shipping_charge;
        $vat = $setting->vat;
        $cart = Cart::content();
    @endphp
    <style>
        /* Variables */
        /* * {
                                                                                                                                                                                                    box-sizing: border-box;
                                                                                                                                                                                                } */

        /* body {
                                                                                                                                                                                                    font-family: -apple-system, BlinkMacSystemFont, sans-serif;
                                                                                                                                                                                                    font-size: 16px;
                                                                                                                                                                                                    -webkit-font-smoothing: antialiased;
                                                                                                                                                                                                    display: flex;
                                                                                                                                                                                                    justify-content: center;
                                                                                                                                                                                                    align-content: center;
                                                                                                                                                                                                    height: 100vh;
                                                                                                                                                                                                    width: 100vw;
                                                                                                                                                                                                } */

        /* form {
                                                                                                                                                                                                width: 30vw;
                                                                                                                                                                                                min-width: 500px;
                                                                                                                                                                                                align-self: center;
                                                                                                                                                                                                box-shadow: 0px 0px 0px 0.5px rgba(50, 50, 93, 0.1),
                                                                                                                                                                                                    0px 2px 5px 0px rgba(50, 50, 93, 0.1), 0px 1px 1.5px 0px rgba(0, 0, 0, 0.07);
                                                                                                                                                                                                border-radius: 7px;
                                                                                                                                                                                                padding: 40px;
                                                                                                                                                                                            } */

        input {
            border-radius: 6px;
            margin-bottom: 6px;
            padding: 12px;
            border: 1px solid rgba(50, 50, 93, 0.1);
            height: 44px;
            font-size: 16px;
            width: 100%;
            background: white;
        }

        .result-message {
            line-height: 22px;
            font-size: 16px;
        }

        .result-message a {
            color: rgb(89, 111, 214);
            font-weight: 600;
            text-decoration: none;
        }

        .hidden {
            display: none;
        }

        #card-error {
            color: rgb(105, 115, 134);
            text-align: left;
            font-size: 13px;
            line-height: 17px;
            margin-top: 12px;
        }

        #card-element {
            border-radius: 4px 4px 0 0;
            padding: 12px;
            border: 1px solid rgba(50, 50, 93, 0.1);
            height: 44px;
            width: 100%;
            background: white;
        }

        #payment-request-button {
            margin-bottom: 32px;
        }

        /* Buttons and links */
        button {
            background: #5469d4;
            color: #ffffff;
            font-family: Arial, sans-serif;
            border-radius: 0 0 4px 4px;
            border: 0;
            padding: 12px 16px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            display: block;
            transition: all 0.2s ease;
            box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
            width: 100%;
        }

        button:hover {
            filter: contrast(115%);
        }

        button:disabled {
            opacity: 0.5;
            cursor: default;
        }

        /* spinner/processing state, errors */
        .spinner,
        .spinner:before,
        .spinner:after {
            border-radius: 50%;
        }

        .spinner {
            color: #ffffff;
            font-size: 22px;
            text-indent: -99999px;
            margin: 0px auto;
            position: relative;
            width: 20px;
            height: 20px;
            box-shadow: inset 0 0 0 2px;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
        }

        .spinner:before,
        .spinner:after {
            position: absolute;
            content: "";
        }

        .spinner:before {
            width: 10.4px;
            height: 20.4px;
            background: #5469d4;
            border-radius: 20.4px 0 0 20.4px;
            top: -0.2px;
            left: -0.2px;
            -webkit-transform-origin: 10.4px 10.2px;
            transform-origin: 10.4px 10.2px;
            -webkit-animation: loading 2s infinite ease 1.5s;
            animation: loading 2s infinite ease 1.5s;
        }

        .spinner:after {
            width: 10.4px;
            height: 10.2px;
            background: #5469d4;
            border-radius: 0 10.2px 10.2px 0;
            top: -0.1px;
            left: 10.2px;
            -webkit-transform-origin: 0px 10.2px;
            transform-origin: 0px 10.2px;
            -webkit-animation: loading 2s infinite ease;
            animation: loading 2s infinite ease;
        }

        @-webkit-keyframes loading {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes loading {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @media only screen and (max-width: 600px) {
            form {
                width: 80vw;
            }
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/contact_styles.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/contact_responsive.css">
    @include('layouts.menubar')
    <div class="contact_form" style="padding-top: 20px;">
        <div class="custon-container" style="margin-left: 5rem; margin-right: 5rem;">
            <div class="row">
                {{-- Product Information --}}
                <div class="col-lg-7" style="border: 1px solid rgb(221, 220, 220); padding: 20px; border-radius: 20px">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center text-primary" style="margin-bottom: 20px;">
                            Cart Product
                        </div>

                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach ($cart as $key => $row)
                                    {{-- @dd($loop->index + 1); --}}
                                    @if ($loop->index == 0)
                                        <li class="cart_item clearfix">
                                            <div class="cart_item_image text-center">
                                                <img src="{{ asset($row->options->image) }}" alt=""
                                                    style="width: 100px; height: 100px">
                                            </div>
                                            <div
                                                class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                <div class="cart_item_name cart_info_col">
                                                    <div class="cart_item_title">Name</div>
                                                    <div class="cart_item_text">{{ $row->name }}</div>
                                                </div>
                                                @if ($row->options->color == null)
                                                @else
                                                    <div class="cart_item_color cart_info_col">
                                                        <div class="cart_item_title">Color</div>
                                                        <div class="cart_item_text">{{ $row->options->color }}</div>
                                                    </div>
                                                @endif
                                                @if ($row->options->size == null)
                                                @else
                                                    <div class="cart_item_color cart_info_col">
                                                        <div class="cart_item_title">Size</div>
                                                        <div class="cart_item_text">{{ $row->options->size }}</div>
                                                    </div>
                                                @endif
                                                <div class="cart_item_quantity cart_info_col">
                                                    <div class="cart_item_title">Quantity</div>
                                                    <div class="cart_item_text">{{ $row->qty }}</div>
                                                </div>
                                                <div class="cart_item_price cart_info_col">
                                                    <div class="cart_item_title">Price</div>
                                                    <div class="cart_item_text">${{ $row->price }}</div>
                                                </div>

                                                <div class="cart_item_total cart_info_col">
                                                    <div class="cart_item_title">Total</div>
                                                    <div class="cart_item_text">${{ $row->price * $row->qty }}</div>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                    @if ($loop->index >= 1)
                                        <li class="cart_item clearfix">
                                            <div class="cart_item_image text-center">
                                                <img src="{{ asset($row->options->image) }}" alt=""
                                                    style="width: 100px; height: 100px">
                                            </div>
                                            <div
                                                class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                <div class="cart_item_name cart_info_col">
                                                    <div class="cart_item_text">{{ $row->name }}</div>
                                                </div>
                                                @if ($row->options->color == null)
                                                @else
                                                    <div class="cart_item_color cart_info_col">
                                                        <div class="cart_item_text">{{ $row->options->color }}</div>
                                                    </div>
                                                @endif
                                                @if ($row->options->size == null)
                                                @else
                                                    <div class="cart_item_color cart_info_col">
                                                        <div class="cart_item_text">{{ $row->options->size }}</div>
                                                    </div>
                                                @endif
                                                <div class="cart_item_quantity cart_info_col">
                                                    <div class="cart_item_text">{{ $row->qty }}</div>
                                                </div>
                                                <div class="cart_item_price cart_info_col">
                                                    <div class="cart_item_text">${{ $row->price }}</div>
                                                </div>

                                                <div class="cart_item_total cart_info_col">
                                                    <div class="cart_item_text">${{ $row->price * $row->qty }}</div>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <ul class="list-group col-lg-4 pr-0 mt-2" style="float: right;">
                            @if (Session::has('coupon'))
                                <li class="list-group-item">SubTotal :
                                    <span style="float: right;">${{ Session::get('coupon')['balance'] }}</span>
                                </li>
                                <li class="list-group-item">Coupon : ({{ Session::get('coupon')['name'] }})
                                    <span style="float: right;">${{ Session::get('coupon')['discount'] }}</span>
                                </li>
                            @else
                                <li class="list-group-item">SubTotal :
                                    <span style="float: right;">${{ Cart::subtotal() }}</span>
                                </li>
                                <li class="list-group-item">Coupon :
                                    <span style="float: right;">$0</span>
                                </li>
                            @endif
                            <li class="list-group-item">Shiping Charge :
                                <span style="float: right;">${{ $charge }}</span>
                            </li>
                            <li class="list-group-item">Vat :
                                <span style="float: right;">${{ $vat }}</span>
                            </li>
                            @if (Session::has('coupon'))
                                <li class="list-group-item">Total :
                                    <span
                                        style="float: right;">${{ Session::get('coupon')['balance'] + $charge + $vat }}</span>
                                </li>
                            @else
                                <li class="list-group-item">Total :
                                    <span style="float: right;">${{ Cart::subtotal() + $charge + $vat }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

                {{-- Slipping Address --}}
                <div class="col-lg-5" style="border: 1px solid rgb(221, 220, 220); padding: 20px; border-radius: 20px">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center text-primary" style="margin-bottom: 20px;">
                            Stripe Payment
                        </div>
                        <hr>
                        <br>
                        <form action="{{ route('stripe.charge') }}" method="post" id="payment-form">
                            @csrf
                            <div class="form-row">
                                <label for="card-element">
                                    Credit or debit card
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display Element errors. -->
                                <div id="card-errors" role="alert"></div>
                                {{-- Order Info --}}
                                <input type="hidden" name="shipping" value="{{ $charge }}">
                                <input type="hidden" name="vat" value="{{ $vat }}">
                                <input type="hidden" name="total" value="{{ Cart::subtotal() + $charge + $vat }}">
                                {{-- Shipping Info --}}
                                <input type="hidden" name="ship_name" value="{{ $data['name'] }}">
                                <input type="hidden" name="ship_email" value="{{ $data['email'] }}">
                                <input type="hidden" name="ship_phone" value="{{ $data['phone'] }}">
                                <input type="hidden" name="ship_address" value="{{ $data['address'] }}">
                                <input type="hidden" name="ship_city" value="{{ $data['city'] }}">
                                <input type="hidden" name="payment_type" value="{{ $data['payment'] }}">
                            </div>
                            <br>
                            <button>Submit Payment</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>

    <script>
        // Set your publishable key: remember to change this to your live publishable key in production
        // See your keys here: https://dashboard.stripe.com/apikeys
        var stripe = Stripe(
            'pk_test_51IyMkAJ1VeIVckU3ER3pqiQv7Kvbq4MfX0vkh3qErtSVp6k369oo3srrwgl2cEEQEM5MOECzYBagQvljgXpLCeOu00Zj9pJCPv'
        );
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        var style = {
            base: {
                // Add your base input styles here. For example:
                fontSize: '16px',
                color: '#32325d',
            },
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {
            style: style
        });

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element')

        // Create a token or display an error when the form is submitted.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the customer that there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

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
