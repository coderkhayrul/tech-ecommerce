@extends('layouts.app')

@section('content')
    @php
        $setting = DB::table('settings')->first();
        $charge = $setting->shipping_charge;
        $vat = $setting->vat;
        $cart = Cart::content();
    @endphp
    <style>
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
