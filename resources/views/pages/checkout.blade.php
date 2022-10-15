@extends('layouts.app')

@section('content')
    @php
        $setting = DB::table('settings')->first();
        $charge = $setting->shipping_charge;
        $vat = $setting->vat;
    @endphp
    @include('layouts.menubar')

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart_container">
                        <div class="cart_title">Checkout</div>
                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach ($cart as $row)
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image"><img src="{{ asset($row->options->image) }}"
                                                alt=""></div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
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
                                                @if (Session::has('coupon'))
                                                    <div class="cart_item_text">{{ $row->qty }}</div>
                                                @else
                                                    <br>
                                                    <form action="{{ route('update.cart.item', $row->rowId) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="row d-flex">
                                                            <input class="form-control mr-2" style="width:60px;"
                                                                type="number" pattern="[0-9]" name="qty"
                                                                value="{{ $row->qty }}" placeholder="Quantity">
                                                            <button type="submit" class="btn btn-sm btn-success"><i
                                                                    class="fas fa-check-square"></i></button>
                                                        </div>
                                                    </form>
                                                @endif
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">${{ $row->price }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Total</div>
                                                <div class="cart_item_text">${{ $row->price * $row->qty }}</div>
                                            </div>
                                            @if (Session::has('coupon'))
                                            @else
                                                <div class="cart_item_total cart_info_col">
                                                    <div class="cart_item_title">Action</div>

                                                    <div class="cart_item_text">
                                                        <a href="{{ route('remove.cart', $row->rowId) }}"
                                                            class="btn btn-sm btn-danger">x</a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="order_total_content mt-2">
                            @if (Session::has('coupon'))
                            @else
                                <h5 style="margin-left: 20px;">Apply Coupon</h5>
                                <form action="{{ route('apply.coupon') }}" method="POST">
                                    @csrf
                                    <div class="form-group col-lg-4">
                                        <input type="text" class="form-control" name="coupon"
                                            placeholder="Enter Your Coupon" required>
                                        <button type="submit" class="btn btn-danger mt-2">Submit</button>
                                    </div>
                                </form>
                            @endif


                            <ul class="list-group col-lg-4" style="float: right;">
                                @if (Session::has('coupon'))
                                    <li class="list-group-item">SubTotal :
                                        <span style="float: right;">${{ Session::get('coupon')['balance'] }}</span>
                                    </li>
                                    <li class="list-group-item">Coupon : ({{ Session::get('coupon')['name'] }})
                                        <a href="{{ route('coupon.remove') }}" class="btn btn-sm btn-danger">X</a>
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
                </div>
            </div>

            <div class="cart_buttons">
                <button type="button" class="button cart_button_clear">All Cancel</button>
                <a href="{{ route('payment.step') }}" class="button cart_button_checkout">Final Step</a>
            </div>
        </div>
    </div>
@endsection
