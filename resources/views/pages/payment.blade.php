@extends('layouts.app')

@section('content')
    @php
        $setting = DB::table('settings')->first();
        $charge = $setting->shipping_charge;
        $vat = $setting->vat;
    @endphp
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
                            Shipping Address
                        </div>
                        <hr>
                        <form action="{{ route('payment.prosess') }}" method="POST" class="text-center">
                            @csrf
                            <div class="form-group">
                                <label for="fullName" style="float: left;">Full Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Enter Your Full Name" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone" style="float: left;">Phone Number</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" placeholder="Enter Your Phone Number" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email" style="float: left;">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" placeholder="Enter Your Email" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address" style="float: left;">Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" id=""
                                    placeholder="Enter Your Address"></textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="city" style="float: left;">City</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror"
                                    name="city" placeholder="Enter Your City" required>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="contact_form_title text-center">Payment By
                                <div class="form-group">
                                    <ul class="logo_list">
                                        <li>
                                            <input type="radio" name="payment" value="stripe">
                                            <img src="{{ asset('frontend/images/mastercard.png') }}" alt=""
                                                style="width: 100px; height: 60px;">

                                            <input type="radio" name="payment" value="paypal">
                                            <img src="{{ asset('frontend/images/paypal.png') }}" alt=""
                                                style="width: 100px; height: 60px;">

                                            <input type="radio" name="payment" value="oncash">
                                            <img src="{{ asset('frontend/images/delivery.jpg') }}" alt=""
                                                style="width: 100; height: 60px;">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" class="button contact_submit_button">Pay Now</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>
@endsection
